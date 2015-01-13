<?php  
class PosStocksController extends AppController {
	
	var $name = 'PosStocks';
	var $components = array( 'RequestHandler', 'Filter');
	
	function filtercondition($data=null)
	{ 
		 
		 $conditionarray = '';
			if(!empty($this->request->data['PosProduct']['name']))
			{
				if(!empty($conditionarray))
				{
					$conditionarray .= " AND ";
				}
				$conditionarray .= 'PosProduct.name like \'%'.$this->request->data['PosProduct']['name']."%'";		
				
		 }
			
 			if(!empty($this->request->data['PosProduct']['pos_brand_id']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
						$conditionarray .= 'PosProduct.pos_brand_id ='.$this->request->data['PosProduct']['pos_brand_id'];	
					
			 }
	 	if(!empty($this->request->data['PosProduct']['pos_pcategory_id']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
						$conditionarray .= 'PosProduct.pos_pcategory_id ='.$this->request->data['PosProduct']['pos_pcategory_id'];	
			 }
			 if(!empty($this->request->data['PosProduct']['pos_type_id']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
						$conditionarray .= 'PosProduct.pos_type_id ='.$this->request->data['PosProduct']['pos_type_id'];	
			 }
		if(!empty($this->request->data['PosProduct']['status']))
			{
				if(!empty($conditionarray))
				{
					$conditionarray .= " AND ";
				}
					$conditionarray .= 'PosProduct.status ='.$this->request->data['PosProduct']['status'];	
		 }
		// pr($conditionarray);die();
		 
		return $conditionarray;	
	}
	
	function index($yes = null , $is_report = null) {
		
		$this->loadModel('PosProduct');
		if( ! empty( $this->request->data ) ){
			$this->Session->delete('PosStockSearch');
			$this->Session->write( 'PosStockSearch', $this->request->data );
		}
		if( $this->Session->check( 'PosStockSearch' ) ){
			$this->request->data = $this->Session->read( 'PosStockSearch' );
		}
		if($yes == 'yes')
		{
			$this->Session->delete( 'PosStockSearch' );
			$this->PosProduct->recursive =1;
			$this->paginate  = array(
				'limit' => '20',
				'order' =>array('PosProduct.modified'=>'desc'),
				);
			$this->request->data='';
			
	 	}
		
		
		$this->paginate  = array('conditions' =>  array($this->filtercondition($this->request->data)));
  		
	   $this->PosProduct->unbindModel(array('hasMany'=>array('PosCompatibility','PosBarcode','Productmod','PosProductColor')));
		$this->PosProduct->recursive = 1;		
 		$this->set('posStocks', $this->paginate('PosProduct'));
		
		$this->set('category',$this->PosProduct->PosPcategory->find('list'));
		$this->set('brand',$this->PosProduct->PosBrand->find('list'));
		$this->set('posTypes',$this->PosProduct->PosType->find('list',array('order'=>'id asc')));
		
		$this->set('sortoption',array());
		$this->set('page_titles','Stock List');
	if($is_report == 'yes'){
				//Configure::write('debug', 0); 
				$this->autoRender = false;
				//exit();
			 
		 	$this->layout  = 'wcreport';
			$this->set('reportheading','Stock List');
			$this->render('/PosStocks/stocklist');
		}
	}
	function distribute($id=null){
		$this->set('id',$id);
		$this->loadModel('PosShop');
		$this->PosShop->recursive=-1;
		$shoplists=$this->PosShop->find('list');
		$this->set('shoplists',$shoplists);
	 	//pr($this->request->data);
		//die();
		 
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pos stock', true));
			$this->redirect(array('action' => 'index'));
		}
		
		
		$posStock=$this->PosStock->read(null, $id);
		$this->set('posStock',$posStock);
		
		$this->loadModel('PosPurchaseDetail');
		$this->loadModel('PosPurchase');
		
		$this->PosPurchaseDetail->recursive = 2;
		$this->PosPurchaseDetail->unbindModelAll();
	  
		$this->PosPurchaseDetail->bindModel(array('belongsTo'=>array('PosPurchase')));
		$this->PosPurchase->unbindModel(array('hasMany'=>array('PosPurchaseDetail','PosPurchaseReturn'))); 
		
		$stock_purchases = $this->PosPurchaseDetail->find('all',array('conditions'=>array('pos_product_id'=> $posStock['PosStock']['pos_product_id'])));
		$this->set('stock_purchases',$stock_purchases);
		$this->loadModel('PosSale');
		$this->loadModel('PosSaleDetail');
		$this->PosSaleDetail->recursive = 2;
		$this->PosSaleDetail->unbindModelAll();
	  
		$this->PosSaleDetail->bindModel(array('belongsTo'=>array('PosSale')));
		$this->PosSale->unbindModel(array('hasMany'=>array('PosSaleDetail','PosSaleReturn'))); 
		$this->PosSale->bindModel(array('belongsTo'=>array('PosCustomer')));
		$stock_sales = $this->PosSaleDetail->find('all',array('conditions'=>array('PosSaleDetail.pos_product_id'=> $posStock['PosStock']['pos_product_id'])));
	   $this->set('stock_sales',$stock_sales);
	  
	    $this->loadModel('PosSaleReturnDetail');
		$this->PosSaleReturnDetail->recursive = 0;
	    $sales_returns = $this->PosSaleReturnDetail->find('all',array('conditions'=>array('PosSaleReturnDetail.pos_product_id'=>$posStock['PosStock']['pos_product_id']))); 
		$this->set('sales_returns',$sales_returns);
		
		$this->loadModel('PosPurchaseReturnDetail');
		$this->PosPurchaseReturnDetail->recursive = 0;
	    $purchase_returns = $this->PosPurchaseReturnDetail->find('all',array('conditions'=>array('PosPurchaseReturnDetail.pos_product_id'=>$posStock['PosStock']['pos_product_id']))); 
		$this->set('purchase_returns',$purchase_returns);
		
		
		
		
		
		$this->set('page_titles', 'PosStock View'); 
	}
	
	//===================== check quantity and price ==========
	function checkQuantity($id = null) {
		
		$this->PosStock->recursive = -1;
		$posStocks = $this->PosStock->find('first',array('conditions'=>array('pos_product_id'=> $id),'fields'=>array('quantity','last_sales')));
		echo json_encode($posStocks);
		Configure::write('debug', 0); 
		$this->autoRender = false;
		exit();
		
	}

	function add() {
		if ($this->RequestHandler->isAjax()) {
			
			 $productid = $this->PosStock->find('first', array( 'conditions' => array('PosStock.pos_product_id' => $this->request->data['PosStock']['pos_product_id'])));
			
			// pr($productid['PosStock']['pos_product_id']);
			 if (!empty($productid)) { 
					$this->PosStock->query("UPDATE `mayasoftbd_pos_stocks` SET `quantity`= `quantity`+ ".$this->request->data['PosStock']['quantity']." where pos_product_id = ".$productid['PosStock']['pos_product_id']);
					
					//$this->PosStock->updateAll(array('PosStock.quantity' =>'PosStock.quantity'.+$this->request->data['PosStock']['quantity']),array('PosStock.pos_product_id'=>$productid['PosStock']['pos_product_id']));
					
					 echo "Successfully  Update";
			     }
			 else{
				   $this->PosStock->create();
			 if($this->PosStock->save($this->request->data)){
				  echo "Successfully  Save";
				  }
				   Configure::write('debug', 0); 
				   $this->autoRender = false;
				   exit(); 
			 } 
 	 		
		}
		$posProducts = $this->PosStock->PosProduct->find('list');
		$this->set(compact('posProducts'));
		$this->set('page_titles', 'Add New PosStock'); 

	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid pos stock', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->RequestHandler->isAjax()) {	
			if (!empty($this->request->data)) {
				if ($this->PosStock->save($this->request->data)) {
					echo "Successfully Update.";
				} else {
					echo "Update Failed.";	 
				}
				Configure::write('debug', 0); 
				$this->autoRender = false;
				exit();
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->PosStock->read(null, $id);
		}
		$posProducts = $this->PosStock->PosProduct->find('list');
		$this->set(compact('posProducts'));
		$this->set('page_titles', 'Update PosStock'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pos stock', true));
			$this->redirect(array('action'=>'index'));
		}
		//if ($this->PosStock->delete($id)) {
		//	$this->Session->setFlash(__('Pos stock deleted', true));
		//	$this->redirect(array('action'=>'index'));
		//}
		$this->Session->setFlash(__('Pos stock was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
