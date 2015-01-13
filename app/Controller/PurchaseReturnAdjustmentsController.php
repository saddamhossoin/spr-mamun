<?php
App::uses('AppController', 'Controller');
/**
 * PurchaseReturnAdjustments Controller
 *
 * @property PurchaseReturnAdjustment $PurchaseReturnAdjustment
 * @property PaginatorComponent $Paginator
 */
class PurchaseReturnAdjustmentsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

function filtercondition($data=null)  
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'PurchaseReturnAdjustment');
			 
			 if(!empty($this->request->data['PurchaseReturnAdjustment']['purchase_id']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
					$conditionarray .= 'PurchaseReturnAdjustment.purchase_id like \'%'.$this->request->data['PurchaseReturnAdjustment']['purchase_id']."%'";		
					
			 }
			 
			 if(!empty($this->request->data['PurchaseReturnAdjustment']['purchase_return_id']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
					$conditionarray .= 'PurchaseReturnAdjustment.purchase_return_id like \'%'.$this->request->data['PurchaseReturnAdjustment']['purchase_return_id']."%'";		
					
			 }
			 
			  if(!empty($this->request->data['PurchaseReturnAdjustment']['pay_type']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
						$conditionarray .= 'PurchaseReturnAdjustment.pay_type ='.$this->request->data['PurchaseReturnAdjustment']['pay_type'];	
			 }
			 
 		return $conditionarray; 	
	}  
    

	function index($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('PurchaseReturnAdjustmentSearch');
            $this->Session->write( 'PurchaseReturnAdjustmentSearch', $this->request->data );
        }
         if( $this->Session->check( 'PurchaseReturnAdjustmentSearch' ) ){
              $this->request->data = $this->Session->read( 'PurchaseReturnAdjustmentSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'PurchaseReturnAdjustmentSearch' );
			$this->PurchaseReturnAdjustment->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('PurchaseReturnAdjustment.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'PurchaseReturnAdjustment'),
					'order' =>$this->Filter->sortoption($this->request->data,  'PurchaseReturnAdjustment'),
        		);

    
		$this->PurchaseReturnAdjustment->recursive = 0;
		$this->set('purchaseReturnAdjustments', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'PurchaseReturnAdjustment List'); 
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid purchase return adjustment', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('purchaseReturnAdjustment', $this->PurchaseReturnAdjustment->read(null, $id));
         $this->set('page_titles', 'PurchaseReturnAdjustment View'); 
	}

	function add() {
     if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			$this->PurchaseReturnAdjustment->create();
			if ($this->PurchaseReturnAdjustment->save($this->request->data)) {
			$lastReturnId=$this->PurchaseReturnAdjustment->getLastInsertId(); 
			
				$this->loadModel('AccountsLedgerTransaction');
  				
				$jurnalId = $this->AccountsLedgerTransaction->manageJurnalId('PRR');
		 		$this->request->data['PosSupplierLedger']['payment_mode']=3;
				$this->request->data['PosSupplierLedger']['debit_credit']=1;
				$this->request->data['PosSupplierLedger']['pos_purchase_id']=$lastReturnId;
				$this->request->data['PosSupplierLedger']['note']=$this->request->data['PurchaseReturnAdjustment']['note'];
				$this->request->data['PosSupplierLedger']['pos_supplier_id']=$this->request->data['PurchaseReturnAdjustment']['pos_supplier_id'];
 				 $this->request->data['PosSupplierLedger']['ledger_jurnal_id']='RP'.$jurnalId;
				$this->request->data['PosSupplierLedger']['amount']=$this->request->data['PurchaseReturnAdjustment']['recive_amount'];
				$this->request->data['PosSupplierLedger']['account_head_id']=13;
 			
				$this->loadModel('PosSupplierLedger');
				$this->PosSupplierLedger->create();
				if($this->PosSupplierLedger->save($this->request->data['PosSupplierLedger'])){
  				
				//===================== Inventrory Accounts Entry  =================
  				$InventoryAccountsEntry = array('jurnalNumber'=>'PRR'.$jurnalId,
												'debit_credit'=>2,
												'amount'=>$this->request->data['PurchaseReturnAdjustment']['return_amount'],
												'note'=>$this->request->data['PurchaseReturnAdjustment']['note'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$lastReturnId,
												'referance_table'=>'Purchase Return Recive',
												'account_head_id'=>19,
  												);
				 
				if($this->AccountsLedgerTransaction->saveTransaction($InventoryAccountsEntry)){
			
					$pay_type = '';
 					if($this->request->data['PurchaseReturnAdjustment']['pay_type'] == 1){
						$pay_type = 3;
					}else{
						$pay_type = 13;
					}
 				 $AccountPayableEntry = array('jurnalNumber'=>'PRR'.$jurnalId,
												'debit_credit'=>1,
												'amount'=>$this->request->data['PurchaseReturnAdjustment']['recive_amount'],
												'note'=>$this->request->data['PurchaseReturnAdjustment']['note'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$lastReturnId,
												'referance_table'=>'Purchase Return Recive',
												'account_head_id'=>$pay_type,
 												);
				
				if($this->AccountsLedgerTransaction->saveTransaction($AccountPayableEntry)){
					
				
					if($this->request->data['PurchaseReturnAdjustment']['return_amount'] >= $this->request->data['PurchaseReturnAdjustment']['recive_amount']){
					$amount = $this->request->data['PurchaseReturnAdjustment']['return_amount'] - $this->request->data['PurchaseReturnAdjustment']['recive_amount'];
					
					 $BadDebitExpense = array('jurnalNumber'=>'PRR'.$jurnalId,
												'debit_credit'=>1,
												'amount'=>$amount,
												'note'=>$this->request->data['PurchaseReturnAdjustment']['note'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$lastReturnId,
												'referance_table'=>'Purchase Return Recive',
												'account_head_id'=>28,
 										);
							if($this->AccountsLedgerTransaction->saveTransaction($BadDebitExpense)){
								echo $lastReturnId;
 							}
						}
						
  					}
				}
			}
				 
			} else {
				 echo "Saved Failed.";
			}
             Configure::write('debug', 0); 
			 	$this->autoRender = false;
			 	exit(); 
		}
       }
		//$purchases = $this->PurchaseReturnAdjustment->PosPurchase->find('list');
		//$purchaseReturns = $this->PurchaseReturnAdjustment->PosPurchaseReturn->find('list');
		//$this->set(compact('purchases', 'purchaseReturns'));
	   $this->set('page_titles', 'Purchase Return Adjustment'); 

	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid purchase return adjustment', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->PurchaseReturnAdjustment->save($this->request->data)) {
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
			$this->request->data = $this->PurchaseReturnAdjustment->read(null, $id);
		}
		$purchases = $this->PurchaseReturnAdjustment->Purchase->find('list');
		$purchaseReturns = $this->PurchaseReturnAdjustment->PurchaseReturn->find('list');
		$this->set(compact('purchases', 'purchaseReturns'));
     $this->set('page_titles', 'Update PurchaseReturnAdjustment'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for purchase return adjustment', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PurchaseReturnAdjustment->delete($id)) {
			$this->Session->setFlash(__('Purchase return adjustment deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Purchase return adjustment was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}}
