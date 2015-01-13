<?php
class CartComponent extends Component {

//////////////////////////////////////////////////

	public $components = array('Session');

//////////////////////////////////////////////////

	public $controller;

//////////////////////////////////////////////////

	public function __construct(ComponentCollection $collection, $settings = array()) {
		$this->controller = $collection->getController();
		parent::__construct($collection, array_merge($this->settings, (array)$settings));
	}

//////////////////////////////////////////////////

	public function startup(Controller $controller) {
		//$this->controller = $controller;
	}

//////////////////////////////////////////////////

	public $maxQuantity = 99;

//////////////////////////////////////////////////

	public function add($id, $quantity = 1, $productmodId = null) {

	

		if($productmodId) {
			$productmod = ClassRegistry::init('Productmod')->find('first', array(
				'recursive' => -1,
				'conditions' => array(
					'Productmod.id' => $productmodId,
					'Productmod.pos_product_id' => $id,
				)
			));
			$product['PosProduct']['weight'] = 1;
			 
			
		}

		if(!is_numeric($quantity)) {
			$quantity = 1;
		}

		$quantity = abs($quantity);

		if($quantity > $this->maxQuantity) {
			$quantity = $this->maxQuantity;
		}

		if($quantity == 0) {
			$this->remove($id);
			return;
		}

		/*$product = $this->controller->PosProduct->find('first', array(
			'recursive' => -1,
			'conditions' => array(
				'PosProduct.id' => $id
			)
		));*/
		$product = $this->controller->PosProduct->PosStock->find('first', array(
			'recursive' => 1,
			'conditions' => array(
				'PosStock.pos_product_id' => $id
			)
		));
		//pr($product);
		//pr($product_stock);die();
		
		
		if(empty($product)) {
			return false;
		}

		 if($this->Session->check('Shop.OrderItem.' . $id . '.PosProduct.productmod_name')) {
			$productmod['Productmod']['id'] = $this->Session->read('Shop.OrderItem.' . $id . '.PosProduct.productmod_id');
			$productmod['Productmod']['name'] = $this->Session->read('Shop.OrderItem.' . $id . '.PosProduct.productmod_name');
			$productmod['Productmod']['price'] = $this->Session->read('Shop.OrderItem.' . $id . '.PosStock.price');

		} 

		if(isset($productmod)) {
			$product['PosProduct']['productmod_id'] = $productmod['Productmod']['id'];
			$product['PosProduct']['productmod_name'] = $productmod['Productmod']['name'];
			$product['PosProduct']['price'] = $productmod['Productmod']['price'];
			$productmodId = $productmod['Productmod']['id'];
			$data['productmod_id'] = $product['PosProduct']['productmod_id'];
			$data['productmod_name'] = $product['PosProduct']['productmod_name'];
		} else {
			$product['PosProduct']['productmod_id'] = '';
			$product['PosProduct']['productmod_name'] = '';
			$productmodId = 0;
			$data['productmod_id'] = '';
			$data['productmod_name'] = '';
		}

		$data['pos_product_id'] = $product['PosProduct']['id'];
		$data['name'] = $product['PosProduct']['name'];
		$data['weight'] = $product['PosProduct']['weight'];
		$data['price'] = $product['PosStock']['last_sales'];
		$data['quantity'] = $quantity;
		$data['subtotal'] = sprintf('%01.2f', $product['PosStock']['last_sales'] * $quantity);
		$data['totalweight'] = sprintf('%01.2f', $product['PosProduct']['weight'] * $quantity);
		$data['PosProduct'] = $product['PosProduct'];
		$this->Session->write('Shop.OrderItem.' . $id . '_' . $productmodId, $data);
		$this->Session->write('Shop.Order.shop', 1);

		$this->Cart = ClassRegistry::init('Cart');

		$cartdata['Cart']['sessionid'] = $this->Session->id();
		$cartdata['Cart']['quantity'] = $quantity;
		$cartdata['Cart']['pos_product_id'] = $product['PosProduct']['id'];
		$cartdata['Cart']['name'] = $product['PosProduct']['name'];
		$cartdata['Cart']['weight'] = $product['PosProduct']['weight'];
		$cartdata['Cart']['weight_total'] = sprintf('%01.2f', $product['PosProduct']['weight'] * $quantity);
		$cartdata['Cart']['price'] = $product['PosStock']['last_sales'];
		$cartdata['Cart']['subtotal'] = sprintf('%01.2f', $product['PosStock']['last_sales'] * $quantity);

		$existing = $this->Cart->find('first', array(
			'recursive' => -1,
			'conditions' => array(
				'Cart.sessionid' => $this->Session->id(),
				'Cart.pos_product_id' => $product['PosProduct']['id'],
			)
		));
		if($existing) {
			$cartdata['Cart']['id'] = $existing['Cart']['id'];
		} else {
			$this->Cart->create();
		}
		
		$this->Cart->save($cartdata, false);

		$this->cart();

		return $product;
	}

//////////////////////////////////////////////////

	public function remove($id) {
		if($this->Session->check('Shop.OrderItem.' . $id)) {
			$product = $this->Session->read('Shop.OrderItem.' . $id);
			$this->Session->delete('Shop.OrderItem.' . $id);

			ClassRegistry::init('Cart')->deleteAll(
				array(
					'Cart.sessionid' => $this->Session->id(),
					'Cart.pos_product_id' => $id,
				),
				false
			);

			$this->cart();
			return $product;
		}
		return false;
	}

//////////////////////////////////////////////////

	public function cart() {
		$shop = $this->Session->read('Shop');
		$quantity = 0;
		$weight = 0;
		$subtotal = 0;
		$total = 0;
		$order_item_count = 0;

		if (count($shop['OrderItem']) > 0) {
			foreach ($shop['OrderItem'] as $item) {
				$quantity += $item['quantity'];
				$weight += $item['totalweight'];
				$subtotal += $item['subtotal'];
				$total += $item['subtotal'];
				$order_item_count++;
			}
			$d['order_item_count'] = $order_item_count;
			$d['quantity'] = $quantity;
			$d['weight'] = sprintf('%01.2f', $weight);
			$d['subtotal'] = sprintf('%01.2f', $subtotal);
			$d['total'] = sprintf('%01.2f', $total);
			$this->Session->write('Shop.Order', $d + $shop['Order']);
			return true;
		}
		else {
			$d['quantity'] = 0;
			$d['weight'] = 0;
			$d['subtotal'] = 0;
			$d['total'] = 0;
			$this->Session->write('Shop.Order', $d + $shop['Order']);
			return false;
		}
	}

//////////////////////////////////////////////////

	public function clear() {
		ClassRegistry::init('Cart')->deleteAll(array('Cart.sessionid' => $this->Session->id()), false);
		$this->Session->delete('Shop');
	}

//////////////////////////////////////////////////

}
