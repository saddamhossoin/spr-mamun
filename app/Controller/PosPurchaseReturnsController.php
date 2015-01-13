<?php 
class PosPurchaseReturnsController extends AppController {
    
   var $name = 'PosPurchaseReturns'; 
   var $components = array( 'RequestHandler', 'Filter');
    function filtercondition($data=null)  
		 { 
			 $conditionarray = '';  
			 $conditionarray .= $this->Filter->gfilter($data,'PosPurchaseReturn');
	
		if(!empty($this->request->data['PosPurchaseReturn']['pos_supplier_id']))
		{
			if(!empty($conditionarray))
			{
				$conditionarray .= " AND ";
			}
			$conditionarray .= 'PosPurchase.pos_supplier_id ='.$this->request->data['PosPurchaseReturn']['pos_supplier_id'];	
		} 
		
		if(!empty($this->request->data['PosPurchaseReturn']['pos_purchase_id']))
		{
			if(!empty($conditionarray))
			{
				$conditionarray .= " AND ";
			}
			$conditionarray .= 'PosPurchase.id ='.$this->request->data['PosPurchaseReturn']['pos_purchase_id'];	
		} 
	 
		return $conditionarray;	
	}
     
 
	function index($yes = null) {
	
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('PosPurchaseReturnSearch');
            $this->Session->write( 'PosPurchaseReturnSearch', $this->request->data );
        }
         if( $this->Session->check( 'PosPurchaseReturnSearch' ) ){
              $this->request->data = $this->Session->read( 'PosPurchaseReturnSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'PosPurchaseReturnSearch' );
			$this->PosPurchaseReturn->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('PosPurchaseReturn.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'PosPurchaseReturn'),
					'order' =>$this->Filter->sortoption($this->request->data,  'PosPurchaseReturn'),
        		);

        
		$this->PosPurchaseReturn->bindModel(array('belongsTo'=>array('PosPurchase','PosProduct','PosPurchaseDetail','PosSupplier')));
		
		$this->PosPurchaseReturn->bindModel(array('hasMany'=>array('PosPurchaseReturnDetail')));
		
		$this->PosPurchaseReturn->recursive = 2;
		$this->set('posPurchaseReturns', $this->paginate());
		
        $this->set('sortoption',array());
        $this->set('page_titles', 'PosPurchaseReturn List'); 
	
	
	
	
	
	/*
	
    
    	if( ! empty( $this->request->data ) ){
            $this->Session->delete('PosPurchaseReturnSearch');
            $this->Session->write( 'PosPurchaseReturnSearch', $this->request->data );
        }
         if( $this->Session->check( 'PosPurchaseReturnSearch' ) ){
              $this->request->data = $this->Session->read( 'PosPurchaseReturnSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'PosPurchaseReturnSearch' );
			$this->PosPurchaseReturn->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('PosPurchaseReturn.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	   
		//==================New purchase Return ========================//
		 
		$this->loadModel('PosPurchaseReturn');
		$this->paginate  = array(
			'PosPurchaseReturn'=>array(
				'conditions' =>  array($this->filtercondition($this->request->data) ),
				'limit' => 10,
				'order' =>$this->Filter->sortoption($this->request->data,'PosPurchaseReturn'),'recursive'=>0));  
		
		$this->PosPurchaseReturn->recursive = 0;
		$this->set('posPurchaseReturns', $this->paginate('PosPurchaseReturn'));
		pr($this->paginate('PosPurchaseReturn'));
		$this->loadModel('PosBrand');
		$this->loadModel('PosPcategory');
	 	$posPurchases= $this->PosPurchaseReturn->PosPurchase->find('list');
		$posSupplier = $this->PosPurchaseReturn->PosSupplier->find('list');
	 	$posProducts = $this->PosPurchaseReturn->PosProduct->find('list');
	 	$posPurchaseDetails = $this->PosPurchaseReturn->PosPurchaseDetail->find('list');
		$this->set(compact('posPurchases', 'posSupplier', 'posProducts', 'posPurchaseDetails'));
		//==================End of Purchase Return ========================//
  	    $this->set('sortoption',array());
        $this->set('page_titles', ' Purchase Return List'); 
		
			if($is_report == 'report'){
			$this->layout  = 'wcreport';
			$this->render('/PosPurchaseReturns/indexprint');
			}
		
		//pr($this->paginate('PosPurchase'));
		
		
	 
	 
	 */
	 }
	 
	function full_return( $id = null ){
 	 
	 if(!empty($this->request->data)){ 
  		//=================== Start Save Purchase Return ============ 
		$this->PosPurchaseReturn->create();
		if ($this->PosPurchaseReturn->save($this->request->data['PosPurchaseReturn'])) {
 		 
 				$lastReturnId=$this->PosPurchaseReturn->getLastInsertId(); 
 				//================ Start Save Purchase Return Details =============
 				$this->loadModel('PosPurchaseReturnDetail');
				
				foreach($this->request->data['PosPurchaseReturnDetail'] as $datas){
				
				if(!empty($datas['quantity'])){
					
					$datas['pos_purchase_return_id'] = $lastReturnId;
  					//=================== Start Save Purchase Return Details ===============
					
					$this->PosPurchaseReturnDetail->create();
					if($this->PosPurchaseReturnDetail->save( $datas )){
					 					
					//=================== Start Update Stock ===============	
 						$this->loadModel('PosStock');
						$this->PosStock->updateAll(array('PosStock.quantity' =>'PosStock.quantity'."-".$datas['quantity']),array('PosStock.pos_product_id'=>$datas['pos_product_id']));
						
					//=================== End Update Stock ===============	
					
					//=================== Start Update Free_Quantity ===============	
						
						$this->loadModel('PosPurchaseDetail');
						$this->PosPurchaseDetail->updateAll(array('PosPurchaseDetail.free_quantity' =>'PosPurchaseDetail.free_quantity'."-".$datas['quantity']),array('PosPurchaseDetail.id'=>$datas['pos_purchase_detail_id']));
						
					//=================== End Update Free_Quantity ===============				
				
					//=================== Start Barcode Delete  ===============	
						
 					if(isset($datas['PosBarcode'])){
						$this->loadModel('PosBarcode');
						foreach($datas['PosBarcode'] as $barcode){
								$this->PosBarcode->deleteAll(array('PosBarcode.barcode'=>$barcode),false);
							}
						}	
 					//=================== End Barcode Delete  ===============	
				 	
					//============== Accounts Entry =======================
					
					//================== Supplier Ledger Entry ======================
 				
				$this->loadModel('AccountsLedgerTransaction');
  				
				$jurnalId = $this->AccountsLedgerTransaction->manageJurnalId('RP');
		 		$this->request->data['PosSupplierLedger']['payment_mode']=3;
				$this->request->data['PosSupplierLedger']['debit_credit']=2;
				$this->request->data['PosSupplierLedger']['pos_purchase_id']=$lastReturnId;
				$this->request->data['PosSupplierLedger']['note']=$this->request->data['PosPurchaseReturn']['note'];
				$this->request->data['PosSupplierLedger']['pos_supplier_id']=$this->request->data['PosPurchaseReturn']['pos_supplier_id'];
 				 $this->request->data['PosSupplierLedger']['ledger_jurnal_id']='RP'.$jurnalId;
				$this->request->data['PosSupplierLedger']['amount']=$this->request->data['PosPurchaseReturn']['total_price'];
				$this->request->data['PosSupplierLedger']['account_head_id']=13;
 			
				$this->loadModel('PosSupplierLedger');
				$this->PosSupplierLedger->create();
				if($this->PosSupplierLedger->save($this->request->data['PosSupplierLedger'])){
 
 			//===================== Inventrory Accounts Entry  =================
				
 				$InventoryAccountsEntry = array('jurnalNumber'=>'RP'.$jurnalId,
												'debit_credit'=>2,
												'amount'=>$this->request->data['PosPurchaseReturn']['total_price'],
												'note'=>$this->request->data['PosPurchaseReturn']['note'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$lastReturnId,
												'referance_table'=>'Purchase Return',
												'account_head_id'=>14,
												'Note'=>'Purchase Return Inventory'
 												);
				 
				if($this->AccountsLedgerTransaction->saveTransaction($InventoryAccountsEntry)){
 
 				 $AccountPayableEntry = array('jurnalNumber'=>'RP'.$jurnalId,
												'debit_credit'=>1,
												'amount'=>$this->request->data['PosPurchaseReturn']['total_price'],
												'note'=>$this->request->data['PosPurchaseReturn']['note'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$lastReturnId,
												'referance_table'=>'Purchase Return Recive',
												'account_head_id'=>19,
 												);
				
				if($this->AccountsLedgerTransaction->saveTransaction($AccountPayableEntry)){
					echo $lastReturnId;
  				
 					}
				}
			}
					//==================== End Accounts Entry ============	
  					}
					//=================== Start Save Purchase Return Details ===============	
				}
			}
			//================ Start Save Purchase Return Details =============
 		}
 			Configure::write('debug', 0); 
			$this->autoRender = false;
			exit();
		//=================== End Save Purchase Return ============
    }
	 
	 	 $this->loadModel('PosPurchaseDetail');
		$this->PosPurchaseDetail->unbindModelAll();
		
	 	$this->loadModel('PosPurchaseDetail');
 	    $this->PosPurchaseDetail->bindModel(array(
				'hasOne' => array(
					'PosStock' => array(
					'className' =>'PosStock',
					'foreignKey' => false,
					'conditions' => array('PosPurchaseDetail.pos_product_id = PosStock.pos_product_id'))),
				'hasMany' => array(
					'PosPurchaseReturnDetail'=> array(
					'className' =>'PosPurchaseReturnDetail',
					'foreignKey' => 'pos_purchase_detail_id')),
				'belongsTo'=> array(
					'PosProduct'=> array(
					'className' =>'PosProduct',
					'foreignKey' => 'pos_product_id')),
				)
			); 
		
 		//=================== Optimize Default Relation mapping ============
		$this->loadModel('PosSupplier');
		$this->PosSupplier->unbindModelAll();
		$this->loadModel('PosPurchaseReturn');
		$this->PosPurchaseReturn->unbindModelAll();
		//=================== Optimize Default  Relation mapping ============
 		//==================== Almost Return Manage =====================
		 $this->PosPurchaseReturn->bindModel(array(
				'hasMany' => array('PosPurchaseReturnDetail' => array(
				'className' =>'PosPurchaseReturnDetail',
				'foreignKey' => 'pos_purchase_return_id',
			 )))); 
    	 //==================== Almost Return Manage =====================
  	    //================== Read Purchase Information  ===============
		$this->loadModel('PosPurchase'); 
		$purchaseInfo=$this->PosPurchase->find("first", array('conditions' =>array("PosPurchase.id"=>$id),'recursive'=> 2));
	    $this->set('purchaseInfo',$purchaseInfo);
 		$this->set('page_titles', 'Purchase Return'); 
		//================== Read Purchase Information  ===============
 	}



	function view( $id = null ) {
	
	
	
		if (!$id) {
			$this->Session->setFlash(__('Invalid pos purchase return', true));
			$this->redirect(array('action' => 'index'));
		}
		
		$this->PosPurchaseReturn->unbindModel(array('belongsTo'=>array('PosProduct','PosPurchaseDetail','PosPurchase')));
		$this->PosPurchaseReturn->recursive = 2;
		
		
		$PurchaseReturn = $this->PosPurchaseReturn->find('first',array('conditions'=>array('PosPurchaseReturn.id'=> $id)));
		 $this->set('PurchaseReturn', $PurchaseReturn); 
		 
		 
	    $this->loadModel('AccountsHead');
		$this->set('accountsheads',$this->AccountsHead->find('list'));
		
		$this->layout = 'return_invoice';
        $this->set('page_titles', 'Pos PurchaseReturn View'); 
		
		
	}

	function add() {
    if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data))
		//pr($this->request->data);die();
		 {
			$this->PosPurchaseReturn->create();
			if ($this->PosPurchaseReturn->save($this->request->data)) {
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
      }
		$posPurchases = $this->PosPurchaseReturn->PosPurchase->find('list');
		$this->set(compact('posPurchases'));
		
		
		$supplierlist=$this->PosPurchaseReturn->PosSupplier->find('list',array('fields'=>'PosSupplier.name'));
		$this->set('supplierlist',$supplierlist);
		
		
		
		$this->loadModel('PosPurchase');
		
		
		$purchasereturns=$this->PosPurchase->find('all',array('conditions'=>array('PosPurchase.pos_supplier_id'=>$this->request->data['PosPurchase']['pos_supplier_id']),'recursive'=>2));
		$this->set('purchasereturns',$purchasereturns);
		//pr($purchasereturns);
		
		$purchasereturns= $this->PosPurchase->find('all',array('conditions'=>array('PosPurchase.id'=>$this->request->data['PosPurchase']['id']),'recursive'=>2)); 
		$this->set('purchasereturns',$purchasereturns);
		//pr($purchasereturns);
		
		
	   $this->set('page_titles', 'Add New Purchase Return'); 

	}
	
	
	
	function purchasereturn($yes = null){
	
	if( ! empty( $this->request->data ) ){
			$this->Session->delete('PosPurchaseReturnSearch');
			$this->Session->write( 'PosPurchaseReturnSearch', $this->request->data );
		}
		if( $this->Session->check( 'PosPurchaseReturnSearch' ) ){
			$this->request->data = $this->Session->read( 'PosPurchaseReturnSearch' );
		}
		if($yes == 'yes')
		{
			$this->Session->delete( 'PosPurchaseReturnSearch' );
			$this->PosPurchaseReturn->recursive = 0;
			$this->paginate  = array(
				'limit' => '5',
				'order' =>array('PosPurchaseReturn.modified'=>'desc'),
				);
			$this->request->data='';
		}
		$this->loadModel('PosPurchase');
		
		$this->paginate  = array(
			'PosPurchase'=>array(
				'conditions' =>  array($this->filtercondition($this->request->data) ),
				'limit' => 5,
				'order' =>$this->Filter->sortoption($this->request->data,'PosPurchase'),'recursive'=>2));  
 
		$posPurchases = $this->PosPurchaseReturn->PosPurchase->find('list');
		$this->set(compact('posPurchases'));
		$supplierlist=$this->PosPurchaseReturn->PosSupplier->find('list');
		$this->set(compact('supplierlist'));
 	 	$this->PosPurchase->recursive=2;
		$purchasereturns = $this->paginate('PosPurchase');
		$this->set('purchasereturns',$purchasereturns);
	   $this->set('page_titles', 'Purchase Return'); 

	
	}
	
	
	function returndetail($id=null){
	
	
		
		//pr($purchasedetails);
		//==========================Below this code for save form=====================================//	

		if(!empty($this->request->data['PosPurchaseReturn'])){
		   
		      foreach($this->request->data['PosPurchaseReturn'] as $data){
				 $salesreturn['PosPurchaseReturn']['pos_purchase_id'] =$data['pos_purchase_id'];
				 $salesreturn['PosPurchaseReturn']['pos_purchase_detail_id'] =$data['pos_purchase_detail_id'];
				 $salesreturn['PosPurchaseReturn']['pos_supplier_id'] =$data['pos_supplier_id'];
				 $salesreturn['PosPurchaseReturn']['pos_product_id'] =$data['pos_product_id'];
				 $salesreturn['PosPurchaseReturn']['quantity'] =$data['quantity'];
				 $this->PosPurchaseReturn->create();
				 if($this->PosPurchaseReturn->save($salesreturn)){
				   	$this->loadModel('PosStock');
					$this->PosStock->updateAll(array('PosStock.quantity' =>'PosStock.quantity'."-".$salesreturn['PosPurchaseReturn']['quantity']),array('PosStock.pos_product_id'=>$salesreturn['PosPurchaseReturn']['pos_product_id']));
		 	 	 }
		       }
		 	    $this->redirect(array('action' => 'index')); 
		   }
		
		$this->loadModel('PosPurchaseDetail');
	    $info=$this->PosPurchaseDetail->find('first',array('conditions'=>array('PosPurchaseDetail.id'=>$id),'recursive'=>-1));
		$this->set(compact('info'));
		
		$this->loadModel('PosPurchaseReturn');
	    $this->PosPurchaseDetail->bindModel(array('hasMany' => array('PosPurchaseReturn'=> array('className' =>'PosPurchaseReturn','foreignKey' => 'pos_purchase_detail_id')))); 
	    $purchasedetails=$this->PosPurchaseDetail->find("all", array('conditions' =>array("PosPurchaseDetail.pos_purchase_id"=>$id)));
	    $this->set('purchasedetails',$purchasedetails);
		
		
		
	//==========================Below this code for save form=====================================//	

	   $this->set('page_titles', 'Purchase Return'); 
	}
  
	
	function supplierproduct($id=null){
		 $this->loadModel('PosPurchase');
		//$this->PosPurchaseReturn->recursive=0;
	    $supplierproduct=$this->PosPurchase->find('all',array('conditions'=>array('PosPurchase.id'=>$id)));
		$this->set('supplierproduct',$supplierproduct);
	//	pr($supplierproduct);
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid pos purchase return', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->PosPurchaseReturn->save($this->request->data)) {
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
			$this->request->data = $this->PosPurchaseReturn->read(null, $id);
		}
		$posPurchases = $this->PosPurchaseReturn->PosPurchase->find('list');
		$this->set(compact('posPurchases'));
     $this->set('page_titles', 'Update PosPurchaseReturn'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pos purchase return', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PosPurchaseReturn->delete($id)) {
			$this->Session->setFlash(__('Pos purchase return deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pos purchase return was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
} 