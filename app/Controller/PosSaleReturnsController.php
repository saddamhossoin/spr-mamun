<?php   
class PosSaleReturnsController extends AppController {
	
	var $name = 'PosSaleReturns';
	var $components = array( 'RequestHandler', 'Filter');
	function filtercondition($data=null)
	{ 
		 
		$conditionarray = '';
		
			 // $conditionarray .= $this->Filter->gfilter($data,'PosSaleReturn');
			
			 /*	if(!empty($this->request->data['PosSale']['pos_customer_id']))
		{
			if(!empty($conditionarray))
			{
				$conditionarray .= " AND ";
			}
			$conditionarray .= 'PosSaleDetail.pos_customer_id ='.$this->request->data['PosSale']['pos_customer_id'];	
		}*/ 
	
		if(!empty($this->request->data['PosSale']['id']))
		{
			if(!empty($conditionarray))
			{
				$conditionarray .= " AND ";
			}
				$conditionarray .= 'PosSale.id ='.$this->request->data['PosSale']['id'];	
		} 
		
		if(!empty($this->request->data['PosSaleReturn']['pos_customer_id']))
		{
			if(!empty($conditionarray))
			{
				$conditionarray .= " AND ";
			}
			$conditionarray .= 'PosSale.pos_customer_id ='.$this->request->data['PosSaleReturn']['pos_customer_id'];	
		} 
		
		
		return $conditionarray;	 
	}
	

	function index($yes = null) {
	
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('PosSaleReturnSearch');
            $this->Session->write( 'PosSaleReturnSearch', $this->request->data );
        }
         if( $this->Session->check( 'PosSaleReturnSearch' ) ){
              $this->request->data = $this->Session->read( 'PosSaleReturnSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'PosSaleReturnSearch' );
			$this->PosSaleReturn->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('PosSaleReturn.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'PosSaleReturn'),
					'order' =>$this->Filter->sortoption($this->request->data,  'PosSaleReturn'),
        		);

    pr($this->paginate());
	   
	
		$this->PosSaleReturn->recursive = 2;
		$this->set('PosSaleReturns', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'PosSaleReturn List'); 
	
	
	
	
	/*
		
		if( ! empty( $this->request->data ) ){
			$this->Session->delete('PosSaleReturnSearch');
			$this->Session->write( 'PosSaleReturnSearch', $this->request->data );
		}
		if( $this->Session->check( 'PosSaleReturnSearch' ) ){
			$this->request->data = $this->Session->read( 'PosSaleReturnSearch' );
		}
		if($yes == 'yes')
		{
			$this->Session->delete( 'PosSaleReturnSearch' );
			$this->PosSaleReturn->recursive = 0;
			$this->paginate  = array(
				'limit' => '20',
				'order' =>array('PosSaleReturn.modified'=>'desc'),
				);
			$this->request->data='';
		}
		$this->loadModel('PosSale');
		
		$this->paginate  = array(
			'PosSale'=>array(
				'conditions' =>  array($this->filtercondition($this->request->data) ),
				'limit' => 10,
				'order' =>$this->Filter->sortoption($this->request->data,'PosSale'),'recursive'=>1));  
	 	$this->PosSaleReturn->recursive = 0;
		$this->set('posSaleReturns', $this->paginate('PosSale'));
		$this->loadModel('PosBrand');
		$this->loadModel('PosPcategory');
				 // pr($posbrand);
		$posSales = $this->PosSaleReturn->PosSale->find('list');
		$posCustomers = $this->PosSaleReturn->PosCustomer->find('list');
		
		$posProducts = $this->PosSaleReturn->PosProduct->find('list');
		
		$posSaleDetails = $this->PosSaleReturn->PosSaleDetail->find('list');
		$this->set(compact('posSales', 'posCustomers', 'posProducts', 'posSaleDetails','posbrand','poscategory'));
		$this->set('page_titles', 'Add New Sales Return');
		$this->set('sortoption',array());
		$this->set('page_titles', 'Sales Return List'); 
		
	
	*/
	
	}


	function returns($id=null){
		
		$this->set('id',$id);
		$this->loadModel('PosSaleDetail');
		$salesDetails=$this->PosSaleDetail->find('first',array('conditions'=>array('PosSaleDetail.id'=>$id),'recursive'=>0));
		$salesReturnsDetails=$this->PosSaleReturn->find('all',array('conditions'=>array('PosSaleReturn.pos_sale_detail_id'=>$id),'recursive'=>-1));
		$this->loadModel('PosCustomer');
		$posCustomers = $this->PosCustomer->find('list');
		$this->set(compact('salesDetails','salesReturnsDetails','posCustomers'));

	}
	
	 
	
	function full_return($id=null){
	 	
		 if(!empty($this->request->data)){
		 	 	 
 		//=================== Start Save Purchase Return ============ 
				$this->PosSaleReturn->create();
		if ($this->PosSaleReturn->save($this->request->data['PosSaleReturn'])) {
		
 				$lastReturnId=$this->PosSaleReturn->getLastInsertId(); 
 				//================ Start Save Purchase Return Details =============
 				$this->loadModel('PosSaleReturnDetail');
				$cost_products = 0;
				foreach($this->request->data['PosSaleReturnDetail'] as $datas){
				
				if(!empty($datas['quantity'])){
				  	$datas['pos_sale_return_id'] = $lastReturnId;
  					//=================== Start Save Purchase Return Details ===============
				 	$this->PosSaleReturnDetail->create();
					if($this->PosSaleReturnDetail->save( $datas )){
					 					
					//=================== Start Update Stock ===============	
					 	$this->loadModel('PosStock');
					    $this->loadModel('PosSaleDetail');
						$this->loadModel('PosSalePurchaseDetail');
						$this->loadModel('PosPurchaseDetail');
						$this->loadModel('PosBarcode');
						 
			 //=================== End Update Stock ===============	
					
			 //=================== Start Update Free_Quantity ===============	
				 	if($datas['type'] == 0)	{
					 		$product_quantities = $this->PosSalePurchaseDetail->find('all',array('recursive'=>-1,'order' => 'PosSalePurchaseDetail.id ASC','conditions'=>array('PosSalePurchaseDetail.quantity >'=>0,'PosSalePurchaseDetail.pos_sale_detail_id'=>$datas['pos_sale_detail_id'],'PosSalePurchaseDetail.pos_product_id'=>$datas['pos_product_id'])));
							//pr($product_quantities);die('anwar');
							$sales_return_quantity = $datas['quantity'];
					foreach($product_quantities as $product_quantity){
			   //========================= without Barcode sales return CGS calculate Start ==============//  
			 	if($product_quantity['PosSalePurchaseDetail']['quantity'] >= $sales_return_quantity){
						
				 		 	$this->PosPurchaseDetail->updateAll(array('PosPurchaseDetail.free_quantity' =>'PosPurchaseDetail.free_quantity'."+".$sales_return_quantity,'PosPurchaseDetail.sales_return_quantity' =>'PosPurchaseDetail.sales_return_quantity'."+".$sales_return_quantity),array('PosPurchaseDetail.pos_product_id'=>$product_quantity['PosSalePurchaseDetail']['pos_product_id'],'PosPurchaseDetail.id'=>$product_quantity['PosSalePurchaseDetail']['pos_purchase_detail_id']));
					    $cost_products = $cost_products + ($sales_return_quantity*$product_quantity['PosSalePurchaseDetail']['price']);
						 	
							  break ;
						 	
							}	
				else if($product_quantity['PosSalePurchaseDetail']['quantity'] < $sales_return_quantity){
					 
					$this->PosPurchaseDetail->updateAll(array('PosPurchaseDetail.free_quantity' =>'PosPurchaseDetail.free_quantity'."+".$product_quantity['PosSalePurchaseDetail']['quantity'],'PosPurchaseDetail.sales_return_quantity' =>'PosPurchaseDetail.sales_return_quantity'."+".$product_quantity['PosSalePurchaseDetail']['quantity']),array('PosPurchaseDetail.pos_product_id'=>$product_quantity['PosSalePurchaseDetail']['pos_product_id'],'PosPurchaseDetail.id'=>$product_quantity['PosSalePurchaseDetail']['pos_purchase_detail_id']));
					 			
				  $sales_quantity = $sales_quantity - $val['PosPurchaseDetail']['free_quantity'];
				  $cost_products = $cost_products + ($product_quantity['PosSalePurchaseDetail']['quantity']*$product_quantity['PosSalePurchaseDetail']['price']); 
					 
				 	 }	
				 	 //========================= without Barcode sales return CGS calculate End ================// 
				 	 		}
				  	}
					else if($datas['type'] == 1){
					   
						foreach($datas['PosBarcode'] as $barcode_return ){
					 	  						
								$product_detail_id=$this->PosBarcode->find('first',array('recursive'=>-1,'fields'=>array('pos_product_id','pos_purchase_detail_id'),'conditions'=>array('PosBarcode.barcode'=>$barcode_return,'PosBarcode.pos_product_id'=>$datas['pos_product_id'],'PosBarcode.pos_sale_detail_id'=>$datas['pos_sale_detail_id'])));
								
								//pr($product_detail_id);die();
								
								$this->PosBarcode->updateAll(array('PosBarcode.return_count'=>'PosBarcode.return_count'."+1",'PosBarcode.is_sold'=>0,'PosBarcode.pos_sale_detail_id'=>0),array('PosBarcode.pos_sale_detail_id'=>$datas['pos_sale_detail_id'],'PosBarcode.barcode'=>$barcode_return,'PosBarcode.pos_product_id'=>$datas['pos_product_id']));
						 						 			 
						 		$this->PosPurchaseDetail->updateAll(array('PosPurchaseDetail.free_quantity' =>'PosPurchaseDetail.free_quantity'."+1",'PosPurchaseDetail.sales_return_quantity' =>'PosPurchaseDetail.sales_return_quantity'."+1"),array('PosPurchaseDetail.pos_product_id'=>$product_detail_id['PosBarcode']['pos_product_id'],'PosPurchaseDetail.id'=>$product_detail_id['PosBarcode']['pos_purchase_detail_id']));
														
								$product_purchase_price = $this->PosPurchaseDetail->find('first',array('conditions'=>array('PosPurchaseDetail.id'=>$product_detail_id['PosBarcode']['pos_purchase_detail_id'],'PosPurchaseDetail.pos_product_id'=>$datas['pos_product_id'])));
								 $cost_products += $product_purchase_price['PosPurchaseDetail']['price'];
					  		
					 	}
			 		}
						
		    //=================== End Update Free_Quantity ===============	
		 	 
				  
			 				$this->PosSaleDetail->updateAll(array('PosSaleDetail.sales_return_quantity' =>'PosSaleDetail.sales_return_quantity'."+".$datas['quantity']),array('PosSaleDetail.id' =>$datas['pos_sale_detail_id'],'PosSaleDetail.pos_product_id'=>$datas['pos_product_id']));
							
							 $this->PosStock->updateAll(array('PosStock.quantity' =>'PosStock.quantity'."+".$datas['quantity']),array('PosStock.pos_product_id'=>$datas['pos_product_id']));
				 		
 					}
			  	}
			}
	 	}
		
	 
		
				$income_from_sales_return =$this->request->data['PosSaleReturn']['total_price']-$this->request->data['PosSaleReturn']['return_amount'];
	 
				$this->loadModel('AccountsLedgerTransaction');
  				$jurnalId = $this->AccountsLedgerTransaction->manageJurnalId('SR');
		 ///======================Start of customer ledger  Debit Entry  ====================//
			 	$this->request->data['PosCustomerLedger']['payment_mode']=3;
				$this->request->data['PosCustomerLedger']['debit_credit']=1;
				$this->request->data['PosCustomerLedger']['pos_sale_id']=$lastReturnId;
				$this->request->data['PosCustomerLedger']['note']='Cash';
				$this->request->data['PosCustomerLedger']['pos_customer_id']=$this->request->data['PosSaleReturn']['pos_customer_id'];
 				$this->request->data['PosCustomerLedger']['ledger_jurnal_id']='SR'.$jurnalId;
				$this->request->data['PosCustomerLedger']['amount']=$this->request->data['PosSaleReturn']['return_amount'];
				$this->request->data['PosCustomerLedger']['account_head_id']=3;
 			 	$this->loadModel('PosCustomerLedger');
				$this->PosCustomerLedger->create();
				$this->PosCustomerLedger->save($this->request->data['PosCustomerLedger']) ;
	///======================End of customer ledger  Debit Entry  ====================//
		 		
	///======================Start of customer ledger  Credit Entry  ====================//
				$this->request->data['PosCustomerLedger']['payment_mode']=3;
				$this->request->data['PosCustomerLedger']['debit_credit']=2;
				$this->request->data['PosCustomerLedger']['pos_sale_id']=$lastReturnId;
				$this->request->data['PosCustomerLedger']['note']='Inventory';
				$this->request->data['PosCustomerLedger']['pos_customer_id']=$this->request->data['PosSaleReturn']['pos_customer_id'];
 				$this->request->data['PosCustomerLedger']['ledger_jurnal_id']='SR'.$jurnalId;
				$this->request->data['PosCustomerLedger']['amount']=$this->request->data['PosSaleReturn']['total_price'];
				$this->request->data['PosCustomerLedger']['account_head_id']=14;
 			 	$this->loadModel('PosCustomerLedger');
				$this->PosCustomerLedger->create();
				$this->PosCustomerLedger->save($this->request->data['PosCustomerLedger']) ;
	///======================End of customer ledger  Credit Entry  ====================//	
				
	///======================Start of Account Trancsaction ledger  Debit Entry  ====================//
			$SalesReturnDebitEntry = array('jurnalNumber'=>'SR'.$jurnalId,
												'debit_credit'=>1,
												'amount'=>$this->request->data['PosSaleReturn']['total_price'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$lastReturnId,
												'referance_table'=>'Sales Return',
												'account_head_id'=>20,
												'Note'=>'Sales Return'
 												);
	 			$this->AccountsLedgerTransaction->saveTransaction($SalesReturnDebitEntry);
	  ///======================End of Account Trancsaction ledger  Debit Entry  ====================//			 
      ///======================Start of Account Trancsaction ledger  Debit Entry  ====================//
				 		$SalesReturnCreditEntry = array('jurnalNumber'=>'SR'.$jurnalId,
												'debit_credit'=>2,
												'amount'=>$this->request->data['PosSaleReturn']['return_amount'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$lastReturnId,
												'referance_table'=>'Petty Cash ',
												'account_head_id'=>3,
 												);	
				 $this->AccountsLedgerTransaction->saveTransaction($SalesReturnCreditEntry);								
	  ///======================End of Account Trancsaction ledger  Debit Entry  ====================//	
	  ///======================Start of Account Trancsaction ledger CGS Entry  ====================// 	
	 					$SalesReturnDebitCGS = array('jurnalNumber'=>'SR'.$jurnalId,
												'debit_credit'=>1,
												'amount'=>$cost_products,
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$lastReturnId,
												'referance_table'=>'Sales Return',
												'account_head_id'=>14,
 												);	
				 $this->AccountsLedgerTransaction->saveTransaction($SalesReturnDebitCGS);	
				 
				 $SalesReturnCreditCGS = array('jurnalNumber'=>'SR'.$jurnalId,
												'debit_credit'=>2,
												'amount'=>$cost_products,
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$lastReturnId,
												'referance_table'=>'Sales Return',
												'account_head_id'=>17,
 												);	
				 $this->AccountsLedgerTransaction->saveTransaction($SalesReturnCreditCGS);
				 
	  
	   ///======================End of Account Trancsaction ledger CGS Entry  ====================// 	
		  	if($income_from_sales_return>0){
				
						$SalesReturnDebitIncome= array('jurnalNumber'=>'SR'.$jurnalId,
												'debit_credit'=>2,
												'amount'=>$income_from_sales_return,
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$lastReturnId,
												'referance_table'=>'Sales Return',
												'account_head_id'=>21,
 												);	
				 $this->AccountsLedgerTransaction->saveTransaction($SalesReturnDebitIncome);
				 
			 ///==========================Start of credit entry in Customer ledger==================//
					$this->request->data['PosCustomerLedger']['payment_mode']=3;
					$this->request->data['PosCustomerLedger']['debit_credit']=1;
					$this->request->data['PosCustomerLedger']['pos_sale_id']=$lastReturnId;
					$this->request->data['PosCustomerLedger']['note']='Fines and Penalties';
					$this->request->data['PosCustomerLedger']['pos_customer_id']=$this->request->data['PosSaleReturn']['pos_customer_id'];
					$this->request->data['PosCustomerLedger']['ledger_jurnal_id']='SR'.$jurnalId;
					$this->request->data['PosCustomerLedger']['amount']=$income_from_sales_return;
					$this->request->data['PosCustomerLedger']['account_head_id']=22;
					$this->loadModel('PosCustomerLedger');
					$this->PosCustomerLedger->create();
					$this->PosCustomerLedger->save($this->request->data['PosCustomerLedger']) ;
			  ///==========================Start of credit entry in Customer ledger==================//
				 
				
				}  
		 	
			Configure::write('debug', 0); 
			$this->autoRender = false;
			exit();
		//=================== End Save Purchase Return ============
	        
		    }
		   
		   
	 
	 	
		$this->loadModel('PosSaleDetail');
		$this->PosSaleDetail->unbindModelAll();
		
	 	$this->loadModel('PosSaleDetail');
 	    $this->PosSaleDetail->bindModel(array(
				 
				'hasMany' => array(
							'PosSaleReturnDetail'=>array('className' =>'PosSaleReturnDetail','foreignKey' => 'pos_sale_detail_id'),
					      	'PosSalePurchaseDetail'=>array('className' =>'PosSalePurchaseDetail','foreignKey' => 'pos_sale_detail_id'),
					),
				'belongsTo'=> array(
					'PosProduct'=> array(
					'className' =>'PosProduct',
					'foreignKey' => 'pos_product_id')),
				)
			); 
		
		//=================== Optimize Default Relation mapping ============
		$this->loadModel('PosCustomer');
		$this->PosCustomer->unbindModelAll();
		$this->loadModel('PosSaleReturn');
		$this->PosSaleReturn->unbindModelAll();
		//=================== Optimize Default  Relation mapping ============
		
		//==================== Almost Return Manage Start =====================
		 $this->PosSaleReturn->bindModel(array(
				'hasMany' => array('PosSaleReturnDetail' => array(
				'className' =>'PosSaleReturnDetail',
				'foreignKey' => 'pos_sale_return_id',
			 )))); 
    	 //==================== Almost Return Manage End =====================
		
		
 	    //================== Start Sale Information  ===============
		$this->loadModel('PosSale'); 
		$saleInfo=$this->PosSale->find("first", array('conditions' =>array("PosSale.id"=>$id),'recursive'=> 2));
	    $this->set('saleInfo',$saleInfo);
 		$this->set('page_titles', 'Sales Return'); 
		//================== End Sale Information  ===============
		
 	}
	
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pos sale return', true));
			$this->redirect(array('action' => 'index'));
	}
	$this->set('posSaleReturn', $this->PosSaleReturn->read(null, $id));
	$this->set('page_titles', 'PosSaleReturn View'); 
}

	function add() {
		if ($this->RequestHandler->isAjax()) {	
	 	//pr($this->request->data);die();
		if (!empty($this->request->data)) {
			$this->PosSaleReturn->create();
			if ($this->PosSaleReturn->save($this->request->data)) {
 			  $stock=$this->request->data;
			 // pr($stock['PosSaleReturn']['pos_product_id']);
			 $this->loadModel('PosStock');
		 	$this->PosStock->updateAll(array('PosStock.quantity' =>'PosStock.quantity'."+".$stock['PosSaleReturn']['quantity']),array('PosStock.pos_product_id'=>$stock['PosSaleReturn']['pos_product_id']));
			 	echo "Successfully Saved.";
			} else {
				echo "Saved Failed.";
			}
			Configure::write('debug', 0); 
			$this->autoRender = false;
			exit(); 
		}
	  } 
 }

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
		$this->Session->setFlash(__('Invalid pos sale return', true));
		$this->redirect(array('action' => 'index'));
	}
	if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->PosSaleReturn->save($this->request->data)) {
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
		$this->request->data = $this->PosSaleReturn->read(null, $id);
	}
	$posSales = $this->PosSaleReturn->PosSale->find('list');
	$posCustomers = $this->PosSaleReturn->PosCustomer->find('list');
	$posProducts = $this->PosSaleReturn->PosProduct->find('list');
	$posSaleDetails = $this->PosSaleReturn->PosSaleDetail->find('list');
	$this->set(compact('posSales', 'posCustomers', 'posProducts', 'posSaleDetails'));
	$this->set('page_titles', 'Update PosSaleReturn'); 
}

function delete($id = null) {
	if (!$id) {
		$this->Session->setFlash(__('Invalid id for pos sale return', true));
		$this->redirect(array('action'=>'index'));
	}
	if ($this->PosSaleReturn->delete($id)) {
		$this->Session->setFlash(__('Pos sale return deleted', true));
		$this->redirect(array('action'=>'index'));
	}
	$this->Session->setFlash(__('Pos sale return was not deleted', true));
	$this->redirect(array('action' => 'index'));
}
} 