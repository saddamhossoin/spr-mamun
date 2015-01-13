<?php
App::uses('AppController', 'Controller');
class OrdersController extends AppController {

////////////////////////////////////////////////////////////

	var $components = array( 'RequestHandler', 'Filter');
	
	function filtercondition($data=null)
	 {  
		 $conditionarray = '';
		 $conditionarray .= $this->Filter->gfilter($data,'OrderItem');
		 
		 
		 	if(!empty($this->request->data['Order']['first_name']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
					$conditionarray .= 'Order.first_name like \'%'.$this->request->data['Order']['first_name']."%'";		
					
			 }
			 
			 
			 
			 if(!empty($this->request->data['Order']['status']))
			{
				if(!empty($conditionarray))
				{
					$conditionarray .= " AND ";
				}
					$conditionarray .= 'Order.status ='.$this->request->data['Order']['status'];	
		 }
		 
		 
		 return $conditionarray;	
	}


	public function admin_index() {

		$this->Paginator = $this->Components->load('Paginator');

		$this->Paginator->settings = array(
			'Order' => array(
				'recursive' => -1,
				'contain' => array(
				),
				'conditions' => array(
				),
				'order' => array(
					'Order.created' => 'DESC'
				),
				'limit' => 20,
				'paramType' => 'querystring',
			)
		);
		$orders = $this->Paginator->paginate();
		
		$this->set(compact('orders'));
		
		$this->set('page_titles', 'Order List'); 
	}

///////////////////////////all Order Item Start Code ///////////////////////////////////////

	public function all_order($yes = null){
		
		
		if( ! empty($this->request->data ) ){
            $this->Session->delete('OrderSearch');
            $this->Session->write( 'OrderSearch', $this->request->data );
        }
         if( $this->Session->check( 'OrderSearch' ) ){
              $this->request->data = $this->Session->read( 'OrderSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'OrderSearch' );
			$this->Order->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('OrderSearch.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
		
	   
	   
	   $this->paginate  = array(
	   			'Order'=>array(
				'conditions' =>  array($this->filtercondition($this->request->data) ),
				'limit' => $this->Filter->searchlimit($this->request->data , 'Order'),
				'order' =>$this->Filter->sortoption($this->request->data,  'Order'),
				)
				); 
		
		$this->Order->recursive = 0;
		$this->set('order_lists', $this->paginate('Order'));
		
		$this->set('page_titles', 'All Order'); 
		}
		
		
///////////////////////////all Order Item  End Code ///////////////////////////////////////



///////////////////////////online Order  Start Code ///////////////////////////////////////

   public function online_order( $yes=null){
		
		
		if( ! empty($this->request->data ) ){
            $this->Session->delete('OrderSearch');
            $this->Session->write( 'OrderSearch', $this->request->data );
        }
         if( $this->Session->check( 'OrderSearch' ) ){
              $this->request->data = $this->Session->read( 'OrderSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'OrderSearch' );
			$this->Order->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('OrderSearch.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
		
	   
	   
	   $this->paginate  = array(
	   			'Order'=>array(
				'conditions' =>  array($this->filtercondition($this->request->data) ),
				'limit' => $this->Filter->searchlimit($this->request->data , 'Order'),
				'order' =>$this->Filter->sortoption($this->request->data,  'Order'),
				)
				); 
		
		$this->Order->recursive = 0;
		 
		 $this->set('order_lists', $this->paginate('Order', array('Order.status' => 1)));
		
		 $this->set('page_titles', 'Online Order'); 
	   }
///////////////////////////online Order End Coder ///////////////////////////////////////



///////////////////////////Sales Order Start Code ///////////////////////////////////////

   public function sales_order($yes=null){
	   
		if( ! empty($this->request->data ) ){
            $this->Session->delete('OrderSearch');
            $this->Session->write( 'OrderSearch', $this->request->data );
        }
         if( $this->Session->check( 'OrderSearch' ) ){
              $this->request->data = $this->Session->read( 'OrderSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'OrderSearch' );
			$this->Order->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('OrderSearch.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
		
	   
	   
	   $this->paginate  = array(
	   			'Order'=>array(
				'conditions' =>  array($this->filtercondition($this->request->data) ),
				'limit' => $this->Filter->searchlimit($this->request->data , 'Order'),
				'order' =>$this->Filter->sortoption($this->request->data,  'Order'),
				)
				); 
		
		$this->Order->recursive = 0;
		 
		 $this->set('order_lists', $this->paginate('Order', array('Order.status' => 2)));
		
	   
	   
	   $this->set('page_titles', 'Sales Order'); 
	   }
///////////////////////////Sales Order End Code ///////////////////////////////////////

   public function order_suspend( $yes=null ){
	   
		if( ! empty($this->request->data ) ){
            $this->Session->delete('OrderSearch');
            $this->Session->write( 'OrderSearch', $this->request->data );
        }
         if( $this->Session->check( 'OrderSearch' ) ){
              $this->request->data = $this->Session->read( 'OrderSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'OrderSearch' );
			$this->Order->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('OrderSearch.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
		
	   
	   
	   $this->paginate  = array(
	   			'Order'=>array(
				'conditions' =>  array($this->filtercondition($this->request->data) ),
				'limit' => $this->Filter->searchlimit($this->request->data , 'Order'),
				'order' =>$this->Filter->sortoption($this->request->data,  'Order'),
				)
				); 
		
		$this->Order->recursive = 0;
		 
		 $this->set('order_lists', $this->paginate('Order', array('Order.status' => 3)));
		
	   
	   
	   $this->set('page_titles', 'Suspend Order'); 
	   }



///////////////////////////Suspend Order Start Code ///////////////////////////////////////

    public function suspend_order( $id = null ){
		
 			$this->Order->updateAll(array('Order.status' =>3),array('Order.id'=>$id));
			 
			 $this->redirect(array('controller' => 'Orders', 'action' => 'online_order'));
 	}
///////////////////////////Suspend Order End Code ///////////////////////////////////////



///////////////////////////Sales Order Start Code ///////////////////////

	public function complete_order( $id = null){
	
		
		
		if ($this->RequestHandler->isAjax()) {	
		$this->loadModel("PosSaleDetail");
		if (!empty($this->request->data)) {
			
			// pr($this->request->data);
					
					$this->loadModel('PosSale');
					
					$this->request->data['PosSale']['pos_customer_id']=$this->request->data['Order']['pos_customer_id'];
					$this->request->data['PosSale']['order_id']=$this->request->data['Order']['id'];
					$this->request->data['PosSale']['totalprice']=$this->request->data['Order']['totalamount'];
					$this->request->data['PosSale']['payamount']=$this->request->data['Order']['payamount'];
					$this->request->data['PosSale']['tax']=$this->request->data['Order']['tax'];
					$this->request->data['PosSale']['is_tax']=$this->request->data['Order']['is_tax'];
					$this->request->data['PosSale']['discount']=$this->request->data['Order']['discount'];
					$this->request->data['PosSale']['payable_amount']=$this->request->data['Order']['payable_amount'];
			
					$this->request->data['PosSale']['sales_type']=2;
					
			        $this->Order->updateAll(array('Order.status' =>2),array('Order.id'=>$this->request->data['Order']['id']));
					
				$this->PosSale->create();
				if ($this->PosSale->save($this->request->data)) {
					
								   $lid = $this->PosSale->getLastInsertId();
								   
									$cost_products = 0;
								   
								   foreach($this->request->data['OrderItem'] as $orderItemdata){
											//pr($orderItemdata);
									   
												$this->loadModel('PosBarcode');
												$this->loadModel('PosProduct');
												$this->loadModel("PosPurchaseDetail");
												$this->loadModel("PosSalePurchaseDetail");
												$this->loadModel('PosStock');
											   
											   $orderItemdata['pos_sale_id']=$lid;
											   $orderItemdata['totalprice']=$orderItemdata['subtotal'];
											  
												 //pr($orderItemdata['pos_product_id']);die();
											   $this->PosSaleDetail->create();
											   if($this->PosSaleDetail->save($orderItemdata)){
												 $last_sales_detail_id = $this->PosSaleDetail->getLastInsertId();
													
													
									  if(isset($orderItemdata['PosBarcode'])){
											if(!empty($orderItemdata['PosBarcode'])){
											
										$solid_product_test=$this->PosProduct->find('first',array('recursive'=>-1,'fields'=>array('id','pos_type_id'),'conditions'=>array('PosProduct.id'=>$orderItemdata['pos_product_id'])));
											
											if($solid_product_test['PosProduct']['pos_type_id'] == 1)
												{
												 //==================== Save Barcode =================
												
										  foreach($orderItemdata['PosBarcode'] as $key=>$barcode_val)
														{ 
												 $this->PosBarcode->updateAll(array('PosBarcode.is_sold'=>1,'PosBarcode.pos_sale_detail_id'=>$last_sales_detail_id),array('PosBarcode.barcode'=>$barcode_val,'PosBarcode.pos_product_id'=>$orderItemdata['pos_product_id']));
										
												 $product_detail_id=$this->PosBarcode->find('first',array('recursive'=>-1,'fields'=>array('pos_product_id','pos_purchase_detail_id'),'conditions'=>array('PosBarcode.barcode'=>$barcode_val)));
											  
												 $this->PosPurchaseDetail->updateAll(array('PosPurchaseDetail.free_quantity' =>'PosPurchaseDetail.free_quantity'."-1"),array('PosPurchaseDetail.pos_product_id'=>$product_detail_id['PosBarcode']['pos_product_id'],'PosPurchaseDetail.id'=>$product_detail_id['PosBarcode']['pos_purchase_detail_id']));
												
												$product_purchase_price = $this->PosPurchaseDetail->find('first',array('conditions'=>array('PosPurchaseDetail.id'=>$product_detail_id['PosBarcode']['pos_purchase_detail_id'],'PosPurchaseDetail.pos_product_id'=>$orderItemdata['pos_product_id'])));
												 $cost_products += $product_purchase_price['PosPurchaseDetail']['price'];
											}
											
											
													//==================== Save End Barcode =================
												}		
									 }
												   } 
										else { 
						   
								 $product_quantity = $this->PosPurchaseDetail->find('all',array('recursive'=>-1,'order' => 'PosPurchaseDetail.id ASC','conditions'=>array('PosPurchaseDetail.free_quantity >'=>0,'PosPurchaseDetail.pos_pcategory_id'=>$orderItemdata['pos_pcategory_id'],'PosPurchaseDetail.pos_product_id'=>$orderItemdata['pos_product_id'])));
								 $sales_quantity = $orderItemdata['quantity'];
								 
								// pr($product_quantity);
						 
							 
					 foreach($product_quantity as $val){
						 //========================= without Barcode CGS calculate Start ==============//  
							if($val['PosPurchaseDetail']['free_quantity'] >= $sales_quantity){
							
								$this->PosPurchaseDetail->updateAll(array('PosPurchaseDetail.free_quantity' =>'PosPurchaseDetail.free_quantity'."-".$sales_quantity),array('PosPurchaseDetail.pos_product_id'=>$val['PosPurchaseDetail']['pos_product_id'],'PosPurchaseDetail.id'=>$val['PosPurchaseDetail']['id']));
								$cost_products = $cost_products + ($sales_quantity*$val['PosPurchaseDetail']['price']);
									///==================  For Sale return And Report ===================///
									$sale_purchase['pos_product_id']=$val['PosPurchaseDetail']['pos_product_id'];
									$sale_purchase['pos_sale_detail_id']=$last_sales_detail_id;
									$sale_purchase['pos_purchase_detail_id']=$val['PosPurchaseDetail']['id'];
									$sale_purchase['quantity']=$sales_quantity;
									$sale_purchase['return_quantity']=$sales_quantity;
									$sale_purchase['price']=$val['PosPurchaseDetail']['price'];
	
									$sale_purchase['total_price']=$sales_quantity*$val['PosPurchaseDetail']['price'];
											$this->PosSalePurchaseDetail->create();
											$this->PosSalePurchaseDetail->save($sale_purchase) ;
									///==================  For Sale return And Report ===================///
			//	$this->PosSaleDetail->updateAll(array('PosSaleDetail.cgs'=>$cost_products),array('PosSaleDetail.id'=>$last_sales_detail_id));
								  break ;
								
								}	
							else if($val['PosPurchaseDetail']['free_quantity'] < $sales_quantity){
								$this->PosPurchaseDetail->updateAll(array('PosPurchaseDetail.free_quantity' =>'PosPurchaseDetail.free_quantity'."-".$val['PosPurchaseDetail']['free_quantity']),array('PosPurchaseDetail.pos_product_id'=>$val['PosPurchaseDetail']['pos_product_id'],'PosPurchaseDetail.id'=>$val['PosPurchaseDetail']['id']));
								
								$sales_quantity = $sales_quantity - $val['PosPurchaseDetail']['free_quantity'];
								$cost_products = $cost_products + ($val['PosPurchaseDetail']['free_quantity']*$val['PosPurchaseDetail']['price']); 
						 ///==================  For Sale return And Report ===================///
							$sale_purchase['pos_product_id']=$val['PosPurchaseDetail']['pos_product_id'];
							$sale_purchase['pos_sale_detail_id']=$last_sales_detail_id;
							$sale_purchase['pos_purchase_detail_id']=$val['PosPurchaseDetail']['id'];
							$sale_purchase['quantity']=$val['PosPurchaseDetail']['free_quantity'];
							$sale_purchase['return_quantity']=$val['PosPurchaseDetail']['free_quantity'];
							$sale_purchase['price']=$val['PosPurchaseDetail']['price'];
							$sale_purchase['total_price']=$val['PosPurchaseDetail']['free_quantity']*$val['PosPurchaseDetail']['price'];
							$this->PosSalePurchaseDetail->create();
							$this->PosSalePurchaseDetail->save($sale_purchase) ;
						 ///==================  For Sale return And Report ===================///
						 }	
						 //========================= without Barcode CGS calculate End ================//  
					 }
				  }
				  
								  $this->PosStock->updateAll(array('PosStock.quantity' =>'PosStock.quantity'."-".$orderItemdata['quantity'],'PosStock.last_sales' =>$orderItemdata['price']),array('PosStock.pos_product_id'=>$orderItemdata['pos_product_id']));
								  
								
									   
							}
						 } 
						 
					
					$this->loadModel("PosCustomerLedger");	
					$this->request->data['PosCustomerLedger']['payment_mode']=1;
					$this->request->data['PosCustomerLedger']['debit_credit']=1;
					$this->request->data['PosCustomerLedger']['pos_sale_id']=$lid;
					$this->request->data['PosCustomerLedger']['note']='Inventory';
					$this->request->data['PosCustomerLedger']['pos_customer_id']=$this->request->data['Order']['pos_customer_id'];
					$this->request->data['PosCustomerLedger']['ledger_jurnal_id']='SV1';
					$this->request->data['PosCustomerLedger']['account_head_id']=14;
					$this->request->data['PosCustomerLedger']['amount']=$this->request->data['Order']['payable_amount'];
					
					$this->PosCustomerLedger->create();
					if($this->PosCustomerLedger->save($this->request->data['PosCustomerLedger'])){	
						
				//===================== Inventrory Accounts Entry  ================= //
					$this->loadModel("AccountsLedgerTransaction");
					$jurnalId = $this->AccountsLedgerTransaction->manageJurnalId('SV');
					
					$InventoryAccountsEntry = array('jurnalNumber'=>'SV'.$jurnalId,
													'debit_credit'=>1,
													'amount'=>$this->request->data['Order']['payable_amount'],
													'transaction_date'=>date('Y-m-d H:i:s'),
													'referance_table_id'=>$lid,
													'referance_table'=>'Sales Receivable ',
													'account_head_id'=>15,
													);
					$AccountPayableEntry = array('jurnalNumber'=>'SV'.$jurnalId,
													'debit_credit'=>2,
													'amount'=>$this->request->data['Order']['payable_amount'],
													'transaction_date'=>date('Y-m-d H:i:s'),
													'referance_table_id'=>$lid,
													'referance_table'=>'Sales',
													'account_head_id'=>16,
													);
					$this->AccountsLedgerTransaction->saveTransaction($InventoryAccountsEntry);
					$this->AccountsLedgerTransaction->saveTransaction($AccountPayableEntry);
					 
					 $CGS = array('jurnalNumber'=>'SV'.$jurnalId,
													'debit_credit'=>1,
													'amount'=>$cost_products,
													'transaction_date'=>date('Y-m-d H:i:s'),
													'referance_table_id'=>$lid,
													'referance_table'=>'Cost Of Goods Sold(CGS)',
													'account_head_id'=>17,
													);
					 $Inventory = array('jurnalNumber'=>'SV'.$jurnalId,
													'debit_credit'=>2,
													'amount'=>$cost_products,
													'transaction_date'=>date('Y-m-d H:i:s'),
													'referance_table_id'=>$lid,
													'referance_table'=>'Inventory',
													'account_head_id'=>14,
													);	
					 $this->AccountsLedgerTransaction->saveTransaction($CGS);
					 $this->AccountsLedgerTransaction->saveTransaction($Inventory);
				//===================== Inventrory Accounts Ends  =================	// 
				
				}
				
					if($this->request->data['Order']['payamount'] >0 ){
				
				//============================ Pos Customer Ledger Start ===================================//  	
					$this->request->data['PosCustomerLedger']['payment_mode']=1;
					$this->request->data['PosCustomerLedger']['debit_credit']=2;
					$this->request->data['PosCustomerLedger']['pos_sale_id']=$lid;
					$this->request->data['PosCustomerLedger']['note']='Cash';
					$this->request->data['PosCustomerLedger']['pos_customer_id']=$this->request->data['Order']['pos_customer_id'];
					$this->request->data['PosCustomerLedger']['ledger_jurnal_id']='SV'.$jurnalId;
					$this->request->data['PosCustomerLedger']['amount']=$this->request->data['Order']['payamount'];
					$this->request->data['PosCustomerLedger']['cashOrcheck']=$this->request->data['Order']['accountHead'];
					$this->request->data['PosCustomerLedger']['account_head_id']=3;
					
					  
					if($this->request->data['Order']['accountHead'] !=3){
					
						$this->request->data['PosCustomerLedger']['check_number']=$this->request->data['Order']['check_number'];
						$this->request->data['PosCustomerLedger']['check_date']=$this->request->data['Order']['check_date'];	
					}
				
					$this->PosCustomerLedger->create();
					$this->PosCustomerLedger->save($this->request->data['PosCustomerLedger']);
				//============================= Pos Customer Ledger End ==============================//		
					$jurnalId = $this->AccountsLedgerTransaction->manageJurnalId('CS');
					$ACPaymentDebit = array('jurnalNumber'=>'CS'.$jurnalId,
													'debit_credit'=>2,
													'amount'=>$this->request->data['Order']['payamount'],
													'transaction_date'=>date('Y-m-d H:i:s'),
													'referance_table_id'=>$lid,
													'referance_table'=>'Sales Receivable',
													'account_head_id'=>15,
													);
			 
				 $this->AccountsLedgerTransaction->saveTransaction($ACPaymentDebit); 
						
						$bankarray = array(); 
				if($this->request->data['Order']['accountHead'] !=3){
						$bankarray['check_number']=$this->request->data['Order']['check_number'];	
						$bankarray['check_date']=$this->request->data['Order']['check_date'];	
					}
					
				 $ACPaymentCredit = array('jurnalNumber'=>'CS'.$jurnalId,
													'debit_credit'=>1,
													'amount'=>$this->request->data['Order']['payamount'],
													'transaction_date'=>date('Y-m-d H:i:s'),
													'referance_table_id'=>$lid,
													'referance_table'=>'',
													'account_head_id'=>$this->request->data['Order']['accountHead'],
													);
				 
				$this->AccountsLedgerTransaction->saveTransaction(array_merge($ACPaymentCredit,$bankarray));
					
				}
						 
				  }
					  echo $lid;
				 }
			 else 
			 {
				  echo "Saved Failed.";
				 
				 }
	          Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
		
		
		if (!$id) {
			$this->setFlashMessage(__('Invalid Order. ', 'warnning_message'));
			$this->redirect(array('action' => 'all_order'));
		}
		else{
			$orderStatus = $this->Order->find('first',array('fields'=>array('status'),'conditions'=>array('Order.id'=>$id),'recursive'=>-1));
			
			if($orderStatus['Order']['status'] != 1){
				//$this->setFlashMessage(__('Invalid Order. ', 'warnning_message'));
 				$this->redirect(array('action' => 'all_order'));
			}
			
		}
		
		$this->loadModel('OrderItem');
		
		 $this->OrderItem->unbindModelAll();
		 $this->OrderItem->bindModel(  array('belongsTo' => array(
									'PosProduct' => array(
									'className' => 'PosProduct',
									'foreignKey' => 'pos_product_id',
                                    'type' => 'INNER'
                                    ) 
                                )
               ) );
		
		 $this->OrderItem->bindModel(  array('belongsTo' => array(
									'PosBarcode' => array(
									'className' => 'PosBarcode',
									'foreignKey' => 'pos_product_id',
                                    'type' => 'INNER'
                                    ) 
                                )
               ) );
			  
		$order_info=$this->Order->find('first',array('conditions'=>array('Order.id'=>$id),'recursive'=>2));
		$this->set(compact('order_info'));
		
		$this->loadModel('AccountsHead');
  		$this->set('accountsHead',$this->AccountsHead->find('list',array('fields'=>array('id','title'),'conditions'=>array('parent_id'=>2 , 'groupid'=>1))));
		$this->set('page_titles', 'Sales Order'); 
	}
///////////////////////////Sales Order End Code /////////////////////////






////////////////////online sales invoice ////////////////////////
    public function online_sales_invoice( $id = null,$report=null){
		
		 
		$this->loadModel('PosSaleDetail');
		$this->loadModel('PosSale');
		$this->loadModel('PosProduct');
		
		  $this->PosSaleDetail->unbindModelAll();
		 
			  
		$this->PosSaleDetail->bindModel(
		  array('belongsTo' => array(
				'PosProduct' => array(
				'className' => 'PosProduct',
				'foreignKey' => 'pos_product_id',
				'type' => 'INNER'
			),
		),
		 'hasMany' => array(
			 'PosBarcode' => array(
			 'className' => 'PosBarcode',
			 'foreignKey' => 'pos_sale_detail_id',
			 'type' => 'INNER'
		 	))
		));
		
		
		
		 $this->PosSale->recursive = 2;
		 $this->set('onlineSale', $this->PosSale->find('first',array('conditions'=>array('PosSale.id' => $id))));
         $this->set('page_titles', 'Online Sale View'); 
		 $this->set('reportheading',"Online Sales Invoice ");
		 $this->layout="invoice";
		}
/////////////////////online sales invoice///////////////////////


////////////////////sales invoice ////////////////////////
    public function sales_invoice( $id = null,$report=null){
		
		 
		$this->loadModel('PosSaleDetail');
		$this->loadModel('PosSale');
		$this->loadModel('PosProduct');
		
		  $this->PosSaleDetail->unbindModelAll();
		 
			  
		$this->PosSaleDetail->bindModel(
		  array('belongsTo' => array(
				'PosProduct' => array(
				'className' => 'PosProduct',
				'foreignKey' => 'pos_product_id',
				'type' => 'INNER'
			),
		),
		 'hasMany' => array(
			 'PosBarcode' => array(
			 'className' => 'PosBarcode',
			 'foreignKey' => 'pos_sale_detail_id',
			 'type' => 'INNER'
		 	))
		));
		
		
		
		 $this->PosSale->recursive = 2;
		 $this->set('onlineSale', $this->PosSale->find('first',array('conditions'=>array('PosSale.order_id' => $id))));
         $this->set('page_titles', 'Online Sale View'); 
		 $this->set('reportheading',"Online Sales Invoice ");
		 $this->layout="invoice";
		}
/////////////////////sales invoice///////////////////////


//////////////////////Client Orders list//////////////////////////////////
	
	public function client_order_list(){
	
		$id = $this->Session->read('Auth.User.id');
		   
		  
		   $this->Order->recursive = 1;
		   
		   $this->paginate = array(
					'conditions'=>array('Order.created_by'=>$id),
					'limit' => '20',
					'order' =>array('Order.modified'=>'desc'),
				);
			$this->set('Orders', $this->paginate('Order'));
	
	
	
		$this->layout = 'client_layout';
	}


//////////////////////Client Orders list//////////////////////////////////



////////////////////////////////////////////////////////////

	public function admin_view($id = null) {
		$order = $this->Order->find('first', array(
			'recursive' => 1,
			'conditions' => array(
				'Order.id' => $id
			)
		));
		if (empty($order)) {
			return $this->redirect(array('action'=>'index'));
		}
		$this->set(compact('order'));
	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException('Invalid order');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash('The order has been saved');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The order could not be saved. Please, try again.');
			}
		} else {
			$this->request->data = $this->Order->read(null, $id);
		}
	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException('Invalid order');
		}
		if ($this->Order->delete()) {
			$this->Session->setFlash('Order deleted');
			return $this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash('Order was not deleted');
		return $this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

//////////////////////////Suspen Order////////////////////

	

////////////////////////////////////////////////////////////

}
