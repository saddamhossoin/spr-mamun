<?php 
class PosPurchasesController extends AppController {

  var $name = 'PosPurchases';
   var $components = array( 'RequestHandler', 'Filter','ControllerList','ImageUploader');
   
    function filtercondition($data=null)
	 {  
		 $conditionarray = '';
		 $conditionarray .= $this->Filter->gfilter($data,'PosPurchase');
		 
		if(!empty($this->request->data['PosPurchase']['pos_supplier_id']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
			 	$conditionarray .= 'PosPurchase.pos_supplier_id ='.$this->request->data['PosPurchase']['pos_supplier_id'];	
 			 }
			 if(!empty($this->request->data['PosPurchase']['manual_invoice_id']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
			 	$conditionarray .= 'PosPurchase.manual_invoice_id like \'%'.$this->request->data['PosPurchase']['manual_invoice_id']."%'";	
 			 }
			 
		return $conditionarray;	
	}
	
 
	
  	function index($yes = null  , $is_report = null) {
   		
		$this->loadModel('PosSupplier');
		$suppliername=$this->PosSupplier->find('list');
		$this->set('suppliername',$suppliername);
	 	
		if( ! empty( $this->request->data ) ){
            $this->Session->delete('PosPurchaseSearch');
            $this->Session->write( 'PosPurchaseSearch', $this->request->data );
        }
         if( $this->Session->check( 'PosPurchaseSearch' ) ){
              $this->request->data = $this->Session->read( 'PosPurchaseSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'PosPurchaseSearch' );
			$this->PosPurchase->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('PosPurchase.created'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' =>20,
					'order' =>array('PosPurchase.created'=>'desc'),
        );
				
// pr($this->paginate);die();
		$this->PosPurchase->recursive = 0;
		$this->set('posPurchases', $this->paginate());
        $this->set('sortoption',array());
	    $this->set('page_titles', 'List of Purchase'); 
	
		if($is_report == 'report'){
			$this->set('reportheading','Purchase List');
			$this->render('/PosPurchases/indexprint');
			$this->layout  = 'wcreport';
	 	}
	}
	
	
	function viewas($id = null) {
	if (!$id) {
			$this->Session->setFlash(__('Invalid pos purchase', true));
 		}
		$this->PosPurchase->recursive = 2;
		$this->loadModel('PosPurchaseDetail');
		$this->PosPurchaseDetail->unbindModelAll();
		
		$this->loadModel('PosSupplier');
		$this->PosSupplier->unbindModelAll();
		$this->PosSupplier->bindModel(
				array('hasMany'=>array( 
				'PosSupplierLedger' => array(
				'className' => 'PosSupplierLedger',
				'foreignKey' => 'pos_supplier_id',
				'conditions'=>array('PosSupplierLedger.payment_mode'=>1 , 'PosSupplierLedger.pos_purchase_id'=>$id ,'PosSupplierLedger.note'=>'Payment' ),
				'type' => 'INNER'
			))));
		
		$this->PosPurchase->unbindModel(array('hasMany'=>array('PosPurchaseReturn')));
		
 		$this->PosPurchaseDetail->bindModel(  array('belongsTo' => array(
                              		'PosProduct' => array(
									'className' => 'PosProduct',
									'foreignKey' => 'pos_product_id',
                                    'type' => 'INNER'
                                    ),
                                 )
               ) );
			    $this->PosPurchaseDetail->bindModel(  array('hasMany' => array(
									'PosBarcode' => array(
									'className' => 'PosBarcode',
									'foreignKey' => 'pos_purchase_detail_id',
                                    'type' => 'INNER'
                                    ) 
                                )
               ) );
		
 		 $this->set('purchase', $this->PosPurchase->find('first',array('conditions'=>array('PosPurchase.id'=> $id))));
 		 $this->loadModel('AccountsHead');
		 $this->set('accountsheads',$this->AccountsHead->find('list'));
         $this->set('page_titles','Purchase View');
		 

  }

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pos purchase', true));
 		}
		$this->PosPurchase->recursive = 2;
		$this->loadModel('PosPurchaseDetail');
		$this->PosPurchaseDetail->unbindModelAll();
		
		$this->loadModel('PosSupplier');
		$this->PosSupplier->unbindModelAll();
		$this->PosSupplier->bindModel(
				array('hasMany'=>array( 
				'PosSupplierLedger' => array(
				'className' => 'PosSupplierLedger',
				'foreignKey' => 'pos_supplier_id',
				'conditions'=>array('PosSupplierLedger.payment_mode'=>1 , 'PosSupplierLedger.pos_purchase_id'=>$id ,'PosSupplierLedger.note'=>'Payment' ),
				'type' => 'INNER'
			))));
		
		$this->PosPurchase->unbindModel(array('hasMany'=>array('PosPurchaseReturn')));
		
 		$this->PosPurchaseDetail->bindModel(  array('belongsTo' => array(
                              		'PosProduct' => array(
									'className' => 'PosProduct',
									'foreignKey' => 'pos_product_id',
                                    'type' => 'INNER'
                                    ),
                                 )
               ) );
			    $this->PosPurchaseDetail->bindModel(  array('hasMany' => array(
									'PosBarcode' => array(
									'className' => 'PosBarcode',
									'foreignKey' => 'pos_purchase_detail_id',
                                    'type' => 'INNER'
                                    ) 
                                )
               ) );
		
 		 $this->set('purchase', $this->PosPurchase->find('first',array('conditions'=>array('PosPurchase.id'=> $id))));
         $this->set('reportheading','Purchase Invoice');
		 $this->loadModel('AccountsHead');
		 $this->set('accountsheads',$this->AccountsHead->find('list'));
		 $this->layout = 'invoice';

  }
   function checkInvoiceId($id = null , $supplierid = null){
 		    if ($this->RequestHandler->isAjax()) {	
 		   		$manual_invoice=$this->PosPurchase->find('first',array('fields'=>array('id'),'recursive'=>-1,'conditions'=>array('PosPurchase.manual_invoice_id'=>$id ,'PosPurchase.pos_supplier_id'=>$supplierid )));
 				   if(empty($manual_invoice)){
				   		echo '1';
				   }else{
				   		echo '0';
				   }
 				 
  			 	Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
	 		 }
 	 }
  
 	function barcode( $quantity = null , $productid = null){
			
			$this->set('quantities',$quantity);
			$this->set('productid',$productid);
			
		
	
		}
	
	function uploadImage(){
	
		$this->layout = false;
		
		//pr($this->request->data);die();
		 
		//============================Invoice image========================================//	
			App::uses('Sanitize', 'Utility');
			$output= array();  
			$fileDestination = 'files/upload/purchase';
			$options = array();    
			if(!empty($this->request->data['PosPurchase']['invoice_image']['name'])){
				try{
					$output = $this->ImageUploader->upload($this->request->data['PosPurchase']['invoice_image'],$fileDestination,$options);     	}
				catch(Exception $e)
				{ 
					$output = array('bool'=>FALSE,'error_message'=>$e->getMessage());
				} 
				$this->request->data['PosPurchaseUpdate']['invoice_image'] = $output['file_path'];
			}
			
			else{
				$this->request->data['PosPurchaseUpdate']['invoice_image'] ='';
				}
				 
				
				if($this->PosPurchase->save($this->request->data['PosPurchaseUpdate'])){

				}else{
					echo '2';
				}
				
				Configure::write('debug', 0); 
				$this->autoRender = false;
				exit();  
		//============================Invoice image=======================================//
	}
	
	function add() {
	 	 
 	  if ($this->RequestHandler->isAjax()) {
	  	
			$this->loadModel("PosPurchaseDetail");
	 	if (!empty($this->request->data)) {
		
 			
		 //==================== Shifting data ==========================
		$this->request->data['PosPurchase']['totalprice']=$this->request->data['PosPurchaseAmount']['totalprice'];
		$this->request->data['PosPurchase']['payamount']=$this->request->data['PosPurchaseAmount']['payamount'];
		$this->request->data['PosPurchase']['tax']=$this->request->data['PosPurchaseAmount']['tax'];
		$this->request->data['PosPurchase']['discount']=$this->request->data['PosPurchaseAmount']['discount'];
		$this->request->data['PosPurchase']['payable_amount']=$this->request->data['PosPurchaseAmount']['payable_amount'];
		$this->request->data['PosPurchase']['is_tax']=$this->request->data['PosPurchaseAmount']['is_tax'];
		$this->request->data['PosPurchase']['transport']=$this->request->data['PosPurchaseAmount']['transport'];
		$this->request->data['PosPurchase']['others_fee']=$this->request->data['PosPurchaseAmount']['others_fee'];
		 
		
		//================= Start Purchase Save Here ===================
 		  	$this->PosPurchase->create();
			if ($this->PosPurchase->save($this->request->data)) {
				
				$lid = $this->PosPurchase->getLastInsertId();	
		//================= Start Purchase Details Here ================
		
				foreach($this->request->data['PosPurchaseDetail'] as $pddatas){
					
					$pddatas ['pos_purchase_id'] = $lid;
					$pddatas ['free_quantity'] = $pddatas['quantity'];
				//========== Start Save Purchase Details ===============	
 					$this->PosPurchaseDetail->create();
					if($this->PosPurchaseDetail->save($pddatas)){
					
						$Last_save_purchase_detail_id = $this->PosPurchaseDetail->getLastInsertId();
					
					//==== Start Barcode Save Here ======================
						$this->loadModel('PosBarcode');
						if(!empty($pddatas['PosBarcode'])){
						
						//==================== Save Barcode =================
							foreach($pddatas['PosBarcode'] as $barcode_val)
								{
									$barcode_value['pos_product_id'] = $pddatas['pos_product_id'];
									$barcode_value['pos_pcategory_id'] = $pddatas['pos_pcategory_id'];
									
									$barcode_value['pos_purchase_detail_id'] =$Last_save_purchase_detail_id;
									$barcode_value['status'] = 2;
									$barcode_value['barcode']=preg_replace('/[^A-Za-z0-9\-]/', '',$barcode_val);
									$this->PosBarcode->create();
									$this->PosBarcode->save($barcode_value);
							}
						//==================== Save End Barcode =================
					}
				 	//=============== Start Stock Update =====================
					
					$this->loadModel('PosStock');
		 	 		$this->PosStock->updateAll(array('PosStock.quantity' =>'PosStock.quantity'."+".$pddatas['quantity'],'PosStock.last_purchase' =>$pddatas['price'],'PosStock.last_sales' =>$pddatas['salesprice']),array('PosStock.pos_product_id'=>$pddatas['pos_product_id']));
 				 	
					}
				}
 					
		 //================== Start Account Entry Details ================
			
			//============== Ledger Table Entry =========================
			
			//============== Inventory Entry =============
				$this->loadModel('AccountsLedgerTransaction');
				$this->loadModel("PosSupplierLedger");
 				 
			//	pr($this->request->data);			die();
			
			//================== Supplier Ledger Entry ======================
  				$jurnalId = $this->AccountsLedgerTransaction->manageJurnalId('PV');
				$this->request->data['PosSupplierLedger']['payment_mode']=1;
				$this->request->data['PosSupplierLedger']['debit_credit']=1;
				$this->request->data['PosSupplierLedger']['pos_purchase_id']=$lid;
				$this->request->data['PosSupplierLedger']['note']='Inventory';
				$this->request->data['PosSupplierLedger']['pos_supplier_id']=$this->request->data['PosPurchase']['pos_supplier_id'];
 				 $this->request->data['PosSupplierLedger']['ledger_jurnal_id']='PV'.$jurnalId;
				$this->request->data['PosSupplierLedger']['amount']=$this->request->data['PosPurchaseAmount']['payable_amount'];
				$this->request->data['PosSupplierLedger']['account_head_id']=13;
 				
				$this->PosSupplierLedger->create();
				if($this->PosSupplierLedger->save($this->request->data['PosSupplierLedger'])){
 
 			//===================== Inventrory Accounts Entry  =================
			
 								//Other Cost entry 
				$other_transport = 0;				
				if($this->request->data['PosPurchaseAmount']['transport'] > 0){
				
				$InventoryPurchaseTransport = array('jurnalNumber'=>'PV'.$jurnalId,
												'debit_credit'=>1,
												'amount'=>$this->request->data['PosPurchaseAmount']['transport'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$lid,
												'referance_table'=>'Purchase',
												'account_head_id'=>28,
 											);
					$this->AccountsLedgerTransaction->saveTransaction($InventoryPurchaseTransport);
					$other_transport = $this->request->data['PosPurchaseAmount']['transport'];
				}							
				//Transport Cost Entry	
				if($this->request->data['PosPurchaseAmount']['others_fee'] > 0){
				$InventoryPurchaseOther = array('jurnalNumber'=>'PV'.$jurnalId,
												'debit_credit'=>1,
												'amount'=>$this->request->data['PosPurchaseAmount']['others_fee'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$lid,
												'referance_table'=>'Purchase',
												'account_head_id'=>29,
 												);
												
					$this->AccountsLedgerTransaction->saveTransaction($InventoryPurchaseOther);
					$other_transport = $other_transport + $this->request->data['PosPurchaseAmount']['others_fee'];
					}
												
					$InventoryAccountsEntry = array('jurnalNumber'=>'PV'.$jurnalId,
												'debit_credit'=>1,
												'amount'=>($this->request->data['PosPurchaseAmount']['payable_amount']-$other_transport),
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$lid,
												'referance_table'=>'Purchase',
												'account_head_id'=>14,
 												);
							
				 
				if($this->AccountsLedgerTransaction->saveTransaction($InventoryAccountsEntry)){
 				 $AccountPayableEntry = array('jurnalNumber'=>'PV'.$jurnalId,
												'debit_credit'=>2,
												'amount'=>$this->request->data['PosPurchaseAmount']['payable_amount'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$lid,
												'referance_table'=>'Purchase',
												'account_head_id'=>13,
 												);
				
				if($this->AccountsLedgerTransaction->saveTransaction($AccountPayableEntry)){
 				
					}
				}
			}
 			
			//============== A/C Payable Entry if purchase time payment is made  =============
  				
			  if($this->request->data['PosPurchaseAmount']['payamount'] > 0){
		 
		 	 //======================= Supplier Payment =============
			 $this->request->data['PosSupplierLedger']['cashOrcheck']=	$this->request->data['PosPurchaseAmount']['accountHead'];
				
 				if($this->request->data['PosSupplierLedger']['cashOrcheck'] !=3){
				
 					$this->request->data['PosSupplierLedger']['check_number']=$this->request->data['PosPurchaseAmount']['check_number'];	
					$this->request->data['PosSupplierLedger']['check_date']=$this->request->data['PosPurchaseAmount']['check_date'];	
				}
				
			$this->request->data['PosSupplierLedger']['payment_mode']=1;
			$this->request->data['PosSupplierLedger']['debit_credit']=2;
			$this->request->data['PosSupplierLedger']['pos_purchase_id']=$lid;
			$this->request->data['PosSupplierLedger']['note']='Payment';
			$this->request->data['PosSupplierLedger']['pos_supplier_id']=$this->request->data['PosPurchase']['pos_supplier_id'];
			$this->request->data['PosSupplierLedger']['ledger_jurnal_id']='PV'.$jurnalId;
			$this->request->data['PosSupplierLedger']['amount']=$this->request->data['PosPurchaseAmount']['payamount'];
			$this->request->data['PosSupplierLedger']['account_head_id']=$this->request->data['PosPurchaseAmount']['accountHead'];
			
			$this->PosSupplierLedger->create();
			if($this->PosSupplierLedger->save($this->request->data['PosSupplierLedger'])){		 	
 		  
		  //================= AC Payment Debit Entry =============
		  
		     $jurnalId = $this->AccountsLedgerTransaction->manageJurnalId('SP');
			 $ACPaymentDebit = array('jurnalNumber'=>'SP'.$jurnalId,
												'debit_credit'=>1,
												'amount'=>$this->request->data['PosPurchaseAmount']['payamount'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$lid,
												'referance_table'=>'Purchase',
												'account_head_id'=>13,
 												);
  		 
			if($this->AccountsLedgerTransaction->saveTransaction($ACPaymentDebit)){
			$bankarray = array();
			if($this->request->data['PosPurchaseAmount']['accountHead'] !=3){
				
 					$bankarray['check_number']=$this->request->data['PosPurchaseAmount']['check_number'];	
					$bankarray['check_date']=$this->request->data['PosPurchaseAmount']['check_date'];	
				}
 				
			 $ACPaymentDebit = array('jurnalNumber'=>'SP'.$jurnalId,
												'debit_credit'=>2,
												'amount'=>$this->request->data['PosPurchaseAmount']['payamount'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$lid,
												'referance_table'=>'Purchase',
												'account_head_id'=>$this->request->data['PosPurchaseAmount']['accountHead'],
 												);
			
	 
					if($this->AccountsLedgerTransaction->saveTransaction(array_merge($ACPaymentDebit,$bankarray))){
 					}
				}
				
			}
			
		 
		 
		 }  
  				  echo $lid;
				  unset($_SESSION['Category']);
			} else {
				 echo "Saved Failed.";
				 unset($_SESSION['Category']);
			}
            	Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
		
      }
	    
		
		
 		$this->loadModel('PosPcategory');
		$this->set('category',$category=$this->PosPcategory->find('list',array('order'=>'name')));
 		
		$this->loadModel('PosBrand');
		$this->set('brand',$this->PosBrand->find('list',array('fields'=>array('id','name'),'order'=>'name')));
		
		$this->loadModel('AccountsHead');
 
		$this->set('accountsHead',$this->AccountsHead->find('list',array('fields'=>array('id','title'),'conditions'=>array('parent_id'=>2 , 'groupid'=>1))));
 		
		$posSuppliers = $this->PosPurchase->PosSupplier->find('list',array('order'=>'name'));
		$this->set(compact('posSuppliers'));
		$this->set('page_titles', 'Add New Purchase'); 
		
		//=========== Unset Barcode Session ==========
		unset($_SESSION['Product']);
   	}
	
 
	function edit($id = null) {
 	 	if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid pos purchase', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
	  	if (!empty($this->request->data)) {
		 		if ($this->PosPurchase->save($this->request->data)) {
				
			////============== Supplier Ledger ================
			$this->loadModel("PosSupplierLedger");
			$this->PosSupplierLedger->deleteAll(array('PosSupplierLedger.reference_id'=>$id,'PosSupplierLedger.reference_name'=>'PosPurchases'),false);
	 	  	$this->request->data['PosSupplierLedger']=$this->request->data['PosPurchase'];
			$this->request->data['PosSupplierLedger']['payment_mode']=1;
			$this->PosSupplierLedger->create();
			$this->PosSupplierLedger->save($this->request->data['PosSupplierLedger']);
			///================ Supplier Ledger ============
				$this->PosPurchase->PosPurchaseDetail->recursive = -1;
				$read_pur_details = $this->PosPurchase->PosPurchaseDetail->find('all',array('conditions'=>array('PosPurchaseDetail.pos_purchase_id'=>$id)));
			//==========for cashbook==========	 
		
			 	$cashbook=$this->PosPurchase->find('first',array('conditions'=>array('PosPurchase.id'=>$id)));
			  	$this->loadModel('PosCashBook'); 
				 $this->loadModel('PosStock');
		 		$this->PosCashBook->deleteAll(array('PosCashBook.reference_id'=>$id,'PosCashBook.reference_name'=>'PosPurchases'),false);
	 	  		$this->request->data['PosCashBook']['reference_name']='PosPurchases';
				$this->request->data['PosCashBook']['title']='Purchase Payment';
				$this->request->data['PosCashBook']['reference_id']=$cashbook['PosPurchase']['id'];
				$this->request->data['PosCashBook']['debit']=$cashbook['PosPurchase']['payamount'];	 
						$this->PosCashBook->create();
						 $this->PosCashBook->save($this->request->data['PosCashBook']);
				//======================== 
		 	 	foreach($read_pur_details as $read_pur_detail){
				
				//$this->PosPurchase->PosPurchaseDetail->query("UPDATE `jewel_pos_stocks` SET `quantity`= `quantity`- ".$read_pur_detail['PosPurchaseDetail']['quantity']." where pos_product_id = ".$read_pur_detail['PosPurchaseDetail']['pos_product_id']);
				
				$this->PosStock->updateAll(array('PosStock.quantity' =>'PosStock.quantity'."-".$read_pur_detail['PosPurchaseDetail']['quantity']),array('PosStock.pos_product_id'=>$read_pur_detail['PosPurchaseDetail']['pos_product_id']));
				
				
				$this->PosPurchase->PosPurchaseDetail->delete($read_pur_detail['PosPurchaseDetail']['id']);
				}
				
				foreach($this->request->data['PosPurchaseDetail'] as $pddatas){
				$pddatas ['pos_purchase_id'] = $id;
				$this->PosPurchase->PosPurchaseDetail->create();
				if($this->PosPurchase->PosPurchaseDetail->save($pddatas)){
				
				//$this->PosPurchase->PosPurchaseDetail->query("UPDATE `jewel_pos_stocks` SET `quantity`= `quantity`+ ".$pddatas['quantity']." where pos_product_id = ".$pddatas['pos_product_id']);
				
				$this->PosStock->updateAll(array('PosStock.quantity' =>'PosStock.quantity'."+".$pddatas['quantity']),array('PosStock.pos_product_id'=>$pddatas['pos_product_id']));
				}
				}
			 
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
			$this->request->data = $this->PosPurchase->read(null, $id);
 		}
					
		$this->loadModel('PosPcategory');
		 $this->set('category',$category=$this->PosPcategory->find('list'));
		
	 	$this->PosPurchase->recursive = -1;
		$this->set('purchaseid',$this->PosPurchase->find('first',array('fields' => array( 
		'MAX(PosPurchase.id) as id'),)));
	 
		$this->loadModel('PosBrand');
		$brand=$this->PosBrand->find('list',array('fields'=>array('id','name')));
		$this->set('brand',$brand); 
		
		$posSuppliers = $this->PosPurchase->PosSupplier->find('list');
		$this->set(compact('posSuppliers'));
		$this->loadModel('PosProduct');
		
		$PosProducts = $this->PosProduct->find('list');
		$this->set(compact('PosProducts'));
     	$this->set('page_titles', 'Update Purchase'); 
	 
	}
	
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pos purchase', true));
			$this->redirect(array('action'=>'index'));
		}
		
		$is_deletable = $this->PosPurchase->query("SELECT * FROM `mayasoftbd_pos_purchase_details` WHERE `pos_purchase_id` =".$id." AND `quantity` <> `free_quantity` OR `sales_return_quantity` <>0");
		if(empty($is_deletable)){
		
		$this->PosPurchase->recursive = 2;
		$this->loadModel('PosPurchaseDetail');
		$this->PosPurchaseDetail->unbindModelAll();
		
		$this->loadModel('PosSupplier');
		$this->PosSupplier->unbindModelAll();
		$this->PosSupplier->bindModel(
				array('hasMany'=>array( 
				'PosSupplierLedger' => array(
				'className' => 'PosSupplierLedger',
				'foreignKey' => 'pos_supplier_id',
				'conditions'=>array('PosSupplierLedger.payment_mode'=>1 , 'PosSupplierLedger.pos_purchase_id'=>$id  ),
				'type' => 'INNER'
			))));
 		$this->PosPurchase->unbindModel(array('hasMany'=>array('PosPurchaseReturn')));
  		$this->PosPurchaseDetail->bindModel(  array('hasMany' => array(
				'PosBarcode' => array(
				'className' => 'PosBarcode',
				'foreignKey' => 'pos_purchase_detail_id',
				'type' => 'INNER'
					) 
				)
			)
		);
		
 		 $purchase =  $this->PosPurchase->find('first',array('conditions'=>array('PosPurchase.id'=> $id)));
		  
		 
		 foreach($purchase['PosPurchaseDetail'] as $pddatas){
 				//========== Remove Purchase Details ===============	
 					if($this->PosPurchaseDetail->deleteAll(array('PosPurchaseDetail.id'=>$pddatas['id']),false)){
 					//==== Remove Barcode   Here ======================
						$this->loadModel('PosBarcode');
						if(!empty($pddatas['PosBarcode'])){
						
						//==================== Remove Barcode =================
							foreach($pddatas['PosBarcode'] as $barcode_val)
							{
								
								 if( $this->PosBarcode->deleteAll(array('PosBarcode.id'=>$pddatas['id']),false)){
								 	
								 }else{
								 	echo "Barcode Remove Failed";
								 }
							}
						//==================== Remove End Barcode =================
					}
				 	//=============== Start Stock Update =====================
 					$this->loadModel('PosStock');
		 	 		$this->PosStock->updateAll(array('PosStock.quantity' =>'PosStock.quantity'."-".$pddatas['quantity']),array('PosStock.pos_product_id'=>$pddatas['pos_product_id']));
 				 	
					}else{
						echo 'Purchase Details Remove failed';
					}
				}
				
				$this->loadModel('AccountsLedgerTransaction');
				$this->loadModel("PosSupplierLedger");	
				
				if( $this->PosSupplierLedger->deleteAll(array('PosSupplierLedger.pos_purchase_id'=>$purchase['PosPurchase']['id']),false)){
 				 }else{
					echo "Supplier Ledger Remove Failed";
				 }
				 
				 if( $this->AccountsLedgerTransaction->deleteAll(array('AccountsLedgerTransaction.referance_table'=>'Purchase','AccountsLedgerTransaction.referance_table_id'=>$purchase['PosPurchase']['id']),false)){
 				 }else{
					echo "Accounts Ledger Transaction Remove Failed";
				 }
				 
 				if( $this->PosPurchase->delete($id)){
					echo "Purchase Removed";
				}else{
					echo "Purchase Remove Failed";
				}
   			}
			
			Configure::write('debug', 0); 
			$this->autoRender = false;
			exit();
 		} 
	
	function productstatus($id=null){
 		$this->loadModel('PosStock');
		$productstatus=$this->PosStock->find('first',array('fields'=>array('PosProduct.pos_type_id','last_sales  as salesprice' ,'last_purchase as purchaseprice','quantity as in_stock'),'conditions'=>array('PosStock.pos_product_id'=>$id)));
		 echo json_encode($productstatus); 
		Configure::write('debug', 0); 
		$this->autoRender = false;
		exit();
 		}
	
	function getproduct($cat = null  ,$brand = null){
		Configure::write('debug', 0); 
		$this->autoRender = false;
		
		$this->loadModel('PosProduct');
		$product=$this->PosProduct->find('list',array('fields'=>array('name'),'conditions'=>array('PosProduct.pos_pcategory_id'=>$cat,'PosProduct.pos_brand_id'=>$brand),'order'=>array('name'=>'asc'),'recursive'=>-1));
		 
		$this->set('lists',$product);
		$this->render('/Elements/ajax/ajaxlist');
		
		
	}
  	function getsupllier($id=null){
		 $this->loadModel('PosSupplier');
		 $supplier=$this->PosSupplier->find('first',array('conditions'=>array('PosSupplier.id'=>$id)));
		 $this->set('suppliers',$supplier);
		 
	}
	 
	
}
