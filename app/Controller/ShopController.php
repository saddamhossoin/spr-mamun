<?php
App::uses('AppController', 'Controller');
class ShopController extends AppController {

//////////////////////////////////////////////////

	public $components = array(
		'Cart',
		'Paypal',
		'AuthorizeNet'
	);

//////////////////////////////////////////////////

	public $uses = 'PosProduct';

//////////////////////////////////////////////////

	public function beforeFilter() {
		parent::beforeFilter();
		$this->disableCache();
		//$this->Security->validatePost = false;
	}

//////////////////////////////////////////////////

	public function clear() {
		$this->Cart->clear();
		$this->Session->setFlash('All item(s) removed from your shopping cart', 'flash_error');
		return $this->redirect('/');
	}

//////////////////////////////////////////////////

	public function add() {
		if ($this->request->is('post')) {
 			$id = $this->request->data['PosProduct']['id'];
			$quantity = $this->request->data['PosProduct']['quantity'];
 			$product = $this->Cart->add($id, 1);
		}
		if(!empty($product)) {
			$this->Session->setFlash($product['PosProduct']['name'] . ' was added to your shopping cart.', 'flash_success');
		} else {
			$this->Session->setFlash('Unable to add this product to your shopping cart.', 'flash_error');
		}
		$this->redirect($this->referer());
	}

//////////////////////////////////////////////////

	public function itemupdate() {
 				 
 
		if ($this->request->is('ajax')) {
			 
 			$id = $this->request->data['PosProduct']['id'];
			//pr($this->request->data);die();
		  $this->Cart->add($this->request->data['PosProduct']['id'], $this->request->data['PosProduct']['quantity']);
		}
			$cart = $this->Session->read('Shop');
		   //pr($cart);
			echo $cart['Order']['quantity'];
			echo json_encode($cart);
			$this->autoRender = false;
	}

//////////////////////////////////////////////////

	public function update() {
		$this->Cart->update($this->request->data['PosProduct']['id'], 1);
	}

//////////////////////////////////////////////////

	public function remove($id = null) {
		$product = $this->Cart->remove($id);
		if(!empty($product)) {
			$this->Session->setFlash($product['PosProduct']['name'] . ' was removed from your shopping cart', 'flash_error');
		}
		return $this->redirect(array('action' => 'cart'));
	}

//////////////////////////////////////////////////

	public function cartupdate() {
		if ($this->request->is('post')) {
			foreach($this->request->data['PosProduct'] as $key => $value) {
				$p = explode('-', $key);
				$p = explode('_', $p[1]);
				$this->Cart->add($p[0], $value, $p[1]);
			}
			$this->Session->setFlash('Shopping Cart is updated.', 'flash_success');
		}
		return $this->redirect(array('action' => 'cart'));
	}

//////////////////////////////////////////////////

	public function cart() {
		$shop = $this->Session->read('Shop');
		//pr($shop);
 		if(!$shop['Order']['total']) {
			$this->redirect(array('controller'=>'PosProducts','action'=>'shop'));
		}
	    $this->layout = 'wpage';
		$shop = $this->Session->read('Shop');
		$this->set(compact('shop'));
		
		//pr($shop);
		
		/*$ids = '';
		foreach($shop['OrderItem'] as $idsa){
			$ids .= $idsa['product_item_id'].' ,';
		}
		$ids = substr($ids, 0, -1);
		$this->loadModel('Productmod');
		$this->set('itemimage',$this->Productmod->find("list",array("fields"=>array("id","image"),"conditions"=>array("id in($ids)"))));
		*/
		
	}

//////////////////////////////////////////////////

	public function googlecheckout() {
		$this->helpers[] = 'Google';
		$shop = $this->Session->read('Shop');
		$this->set(compact('shop'));
	}

//////////////////////////////////////////////////

	public function address() {

		$shop = $this->Session->read('Shop');
		if(!$shop['Order']['total']) {
			return $this->redirect('/');
		}

		if ($this->request->is('post')) {
			
			$this->loadModel('PosCustomer');
			$this->loadModel('User');
			$this->loadModel('Order');
						//pr($this->request->data);die();
						
			
			$this->request->data['User']['email_address'] = $this->request->data['Order']['email'];
			
			  if(!empty($this->request->data['Order']['password'])){
				$this->request->data['User']['password'] = $this->request->data['Order']['password'];
			  }
				$this->request->data['User']['firstname'] = $this->request->data['Order']['first_name'];
				$this->request->data['User']['phone'] = $this->request->data['Order']['phone'];
				$this->request->data['User']['address'] = $this->request->data['Order']['billing_address'];
				$this->request->data['User']['zippostalcode'] = $this->request->data['Order']['billing_zip'];
				$this->request->data['User']['city'] = $this->request->data['Order']['billing_city'];
				$this->request->data['User']['country'] = $this->request->data['Order']['billing_country'];
				$this->request->data['User']['type_of_user'] = 3;
 				$this->request->data['User']['active'] = 1;
				$this->request->data['Group']['group_id'] = 6;
				$this->User->create();
				if($this->User->save($this->request->data)){
					
				$this->request->data['PosCustomer']['name'] = $this->request->data['Order']['first_name'];
				$this->request->data['PosCustomer']['contactname'] = $this->request->data['Order']['first_name'];
				$this->request->data['PosCustomer']['address'] = $this->request->data['Order']['billing_address'];
				$this->request->data['PosCustomer']['mobile'] = $this->request->data['Order']['phone'];
				$this->request->data['PosCustomer']['email'] = $this->request->data['Order']['email'];
				$this->request->data['PosCustomer']['customer_type'] = 3;
				$this->request->data['PosCustomer']['user_id'] = $this->User->getLastInsertId(); ;
				
				$this->PosCustomer->create();
				if($this->PosCustomer->save($this->request->data['PosCustomer'])){
					 $this->Auth->login();
					}
				
			}
			
			$this->Order->set($this->request->data);
			if($this->Order->validates()) {
				$order = $this->request->data['Order'];
				//pr($order);
				$order['order_type'] = 'creditcard';
				
				$this->Session->write('Shop.Order', $order + $shop['Order']);
				
				return $this->redirect(array('action' => 'review'));
			} else {
				$this->Session->setFlash('The form could not be saved. Please, try again.', 'flash_error');
			}
		}
		
		
		if(!empty($shop['Order'])) {
			$this->request->data['Order'] = $shop['Order'];
		}
		 $this->layout = 'wpage';

	}

//////////////////////////////////////////////////


//////////////////////////////////////////////////

	public function checkout() {
		
		

		$shop = $this->Session->read('Shop');
		if(!$shop['Order']['total']) {
			return $this->redirect('/');
		}

		if ($this->request->is('post')) {
			$this->loadModel('Order');
						//pr($this->request->data);die();
			$this->Order->set($this->request->data);
			if($this->Order->validates()) {
				$order = $this->request->data['Order'];
				$order['order_type'] = 'creditcard';
				
				$this->Session->write('Shop.Order', $order + $shop['Order']);
				return $this->redirect(array('action' => 'review'));
			} else {
				$this->Session->setFlash('The form could not be saved. Please, try again.', 'flash_error');
			}
		}
		
		if(array_key_exists('Auth',$_SESSION)){
			
			   	$this->loadModel('Order');
				
				$this->Order->recursive = -1;
				$this->request->data = $this->Order->find('first',array('fields'=>array('id','first_name','last_name','email','phone','billing_address','billing_address2','billing_city','billing_zip','billing_state','billing_country','shipping_address','shipping_address2','shipping_city','shipping_zip','shipping_state','shipping_country','Order.created_by','Order.created'),'conditions'=>array('Order.created_by'=>$this->Auth->user('id')),'order'=>'Order.id desc'));
				
				$this->set('order_info',$this->request->data);
				
				
 		   } 
		   
		if(!empty($shop['Order'])) {
			$this->request->data['Order'] = $shop['Order'];
		}
		
		 $this->layout = 'wpage';

	}

//////////////////////////////////////////////////






	public function step1() {
		$paymentAmount = $this->Session->read('Shop.Order.total');
		if(!$paymentAmount) {
			return $this->redirect('/');
		}
		$this->Session->write('Shop.Order.order_type', 'paypal');
		$this->Paypal->step1($paymentAmount);
		 $this->layout = 'wpage';
	}

////////////////////////////////////////
 //////////

	public function step2() {

		$token = $this->request->query['token'];
		$paypal = $this->Paypal->GetShippingDetails($token);

		$ack = strtoupper($paypal['ACK']);
		if($ack == 'SUCCESS' || $ack == 'SUCESSWITHWARNING') {
			$this->Session->write('Shop.Paypal.Details', $paypal);
			return $this->redirect(array('action' => 'review'));
		} else {
			$ErrorCode = urldecode($paypal['L_ERRORCODE0']);
			$ErrorShortMsg = urldecode($paypal['L_SHORTMESSAGE0']);
			$ErrorLongMsg = urldecode($paypal['L_LONGMESSAGE0']);
			$ErrorSeverityCode = urldecode($paypal['L_SEVERITYCODE0']);
			echo 'GetExpressCheckoutDetails API call failed. ';
			echo 'Detailed Error Message: ' . $ErrorLongMsg;
			echo 'Short Error Message: ' . $ErrorShortMsg;
			echo 'Error Code: ' . $ErrorCode;
			echo 'Error Severity Code: ' . $ErrorSeverityCode;
			die();
		}

	}

//////////////////////////////////////////////////

	public function review() {

		$shop = $this->Session->read('Shop');
		//pr($shop);

		if(empty($shop)) {
			return $this->redirect('/');
		}

		if ($this->request->is('post')) {

			$this->loadModel('Order');

			$this->Order->set($this->request->data);
			if($this->Order->validates()) {
				$order = $shop;
				$order['Order']['status'] = 1;

				if($shop['Order']['order_type'] == 'paypal') {
					$paypal = $this->Paypal->ConfirmPayment($order['Order']['total']);
					//debug($resArray);
					$ack = strtoupper($paypal['ACK']);
					if($ack == 'SUCCESS' || $ack == 'SUCCESSWITHWARNING') {
						$order['Order']['status'] = 2;
					}
					$order['Order']['authorization'] = $paypal['ACK'];
					//$order['Order']['transaction'] = $paypal['PAYMENTINFO_0_TRANSACTIONID'];
				}

				if((Configure::read('Settings.AUTHORIZENET_ENABLED') == 1) && $shop['Order']['order_type'] == 'creditcard') {
					$payment = array(
						'creditcard_number' => $this->request->data['Order']['creditcard_number'],
						'creditcard_month' => $this->request->data['Order']['creditcard_month'],
						'creditcard_year' => $this->request->data['Order']['creditcard_year'],
						'creditcard_code' => $this->request->data['Order']['creditcard_code'],
					);
					try {
						$authorizeNet = $this->AuthorizeNet->charge($shop['Order'], $payment);
					} catch(Exception $e) {
						$this->Session->setFlash($e->getMessage());
						return $this->redirect(array('action' => 'review'));
					}
					$order['Order']['authorization'] = $authorizeNet[4];
					$order['Order']['transaction'] = $authorizeNet[6];
				}

				$save = $this->Order->saveAll($order, array('validate' => 'first'));
				if($save) {

					$this->set(compact('shop'));

					/*App::uses('CakeEmail', 'Network/Email');
					$email = new CakeEmail();
					$email->from(Configure::read('Settings.ADMIN_EMAIL'))
						    ->cc(Configure::read('Settings.ADMIN_EMAIL'))
							->to($shop['Order']['email'])
							->subject('Shop Order')
							->template('order')
							->emailFormat('text')
							->viewVars(array('shop' => $shop))
							->send();
							*/
					return $this->redirect(array('action' => 'success'));
				} else {
					$errors = $this->Order->invalidFields();
					$this->set(compact('errors'));
				}
			}
		}

		if(($shop['Order']['order_type'] == 'paypal') && !empty($shop['Paypal']['Details'])) {
			$shop['Order']['first_name'] = $shop['Paypal']['Details']['FIRSTNAME'];
			$shop['Order']['last_name'] = $shop['Paypal']['Details']['LASTNAME'];
			$shop['Order']['email'] = $shop['Paypal']['Details']['EMAIL'];
			$shop['Order']['phone'] = '888-888-8888';
			$shop['Order']['billing_address'] = $shop['Paypal']['Details']['SHIPTOSTREET'];
			$shop['Order']['billing_address2'] = '';
			$shop['Order']['billing_city'] = $shop['Paypal']['Details']['SHIPTOCITY'];
			$shop['Order']['billing_zip'] = $shop['Paypal']['Details']['SHIPTOZIP'];
			$shop['Order']['billing_state'] = $shop['Paypal']['Details']['SHIPTOSTATE'];
			$shop['Order']['billing_country'] = $shop['Paypal']['Details']['SHIPTOCOUNTRYNAME'];

			$shop['Order']['shipping_address'] = $shop['Paypal']['Details']['SHIPTOSTREET'];
			$shop['Order']['shipping_address2'] = '';
			$shop['Order']['shipping_city'] = $shop['Paypal']['Details']['SHIPTOCITY'];
			$shop['Order']['shipping_zip'] = $shop['Paypal']['Details']['SHIPTOZIP'];
			$shop['Order']['shipping_state'] = $shop['Paypal']['Details']['SHIPTOSTATE'];
			$shop['Order']['shipping_country'] = $shop['Paypal']['Details']['SHIPTOCOUNTRYNAME'];

			$shop['Order']['order_type'] = 'paypal';

			$this->Session->write('Shop.Order', $shop['Order']);
		}

		$this->set(compact('shop'));
		 $this->layout = 'wpage';

	}

//////////////////////////////////////////////////

	public function success() {
		$shop = $this->Session->read('Shop');
		$this->Cart->clear();
		if(empty($shop)) {
			return $this->redirect('/');
		}
		$this->set(compact('shop'));
		 $this->layout = 'wpage';
	}
	

//////////////////////////////////////////////////

}
