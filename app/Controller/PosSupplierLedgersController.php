<?php
App::uses('AppController', 'Controller');
	/**
	 * PosSupplierLedgers Controller 
	 * 
	 * @property PosSupplierLedger $PosSupplierLedger
	 * @property PaginatorComponent $Paginator
	 */
class PosSupplierLedgersController extends AppController {

	/**
	 * Components 
	 * 
	 * @var array
	 */
	public $components = array('Paginator');

	function filtercondition($data=null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'PosSupplierLedger');
		 if(!empty($this->request->data['PosSupplierLedger']['payment_mode']))
			{
				if(!empty($conditionarray))
				{
					$conditionarray .= " AND ";
				}
					$conditionarray .= 'PosSupplierLedger.payment_mode ='.$this->request->data['PosSupplierLedger']['payment_mode'];	
				
		 }
		if(!empty($this->request->data['PosSupplierLedger']['pos_supplier_id']))
			{
				if(!empty($conditionarray))
				{
					$conditionarray .= " AND ";
				}
					$conditionarray .= 'PosSupplierLedger.pos_supplier_id ='.$this->request->data['PosSupplierLedger']['pos_supplier_id'];	
		 }
 		return $conditionarray;	
	}
    

	function index($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('PosSupplierLedgerSearch');
            $this->Session->write( 'PosSupplierLedgerSearch', $this->request->data );
        }
         if( $this->Session->check( 'PosSupplierLedgerSearch' ) ){
              $this->request->data = $this->Session->read( 'PosSupplierLedgerSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'PosSupplierLedgerSearch' );
			$this->PosSupplierLedger->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('PosSupplierLedger.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'PosSupplierLedger'),
					'order' =>$this->Filter->sortoption($this->request->data,  'PosSupplierLedger'),
        		);

    
		$this->PosSupplierLedger->recursive = 0;
		$this->set('posSupplierLedgers', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'PosSupplierLedger List'); 
		$this->loadModel('PosSupplier');
		$this->set('possuppliers',$this->PosSupplier->find('list'));
		
		
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pos supplier ledger', true));
			$this->redirect(array('action' => 'index'));
		}
			$this->set('posSupplierLedger', $this->PosSupplierLedger->read(null, $id));
         	$this->set('page_titles', 'PosSupplierLedger View'); 
			 $this->set('accountsheads',$this->AccountsHead->find('list'));
	}
	
	function invoice($id = null){
		$this->PosSupplierLedger->recursive =0;
		$supplier_ledgers=$this->PosSupplierLedger->find('all',array('conditions'=>array('PosSupplierLedger.pos_supplier_id'=>$id),'order' =>array('PosSupplierLedger.modified'=>'desc')));
		$this->set('supplier_ledgers',$supplier_ledgers);
		$this->layout  = 'wcreport';
		$this->set('reportheading','Supplier Ledger List');
	}
	
	

	function add() {
    if ($this->RequestHandler->isAjax()) {	
	
		if (!empty($this->request->data)) {
  				//=========================Supplier paymet====================================//
			$this->loadModel('AccountsLedgerTransaction');
			$jurnalId = $this->AccountsLedgerTransaction->manageJurnalId('SP');
			$this->request->data['PosSupplierLedger']['cashOrcheck'] =	$this->request->data['PosSupplierLedger']['accounthead'];
				
			if($this->request->data['PosSupplierLedger']['accounthead'] !=3){
				$this->request->data['PosSupplierLedger']['check_number']=$this->request->data['PosSupplierLedger']['check_number'];	
				$this->request->data['PosSupplierLedger']['check_date']=$this->request->data['PosSupplierLedger']['check_date'];	
			}
				
		$this->request->data['PosSupplierLedger']['payment_mode']=2;
		$this->request->data['PosSupplierLedger']['debit_credit']=2;
		$this->request->data['PosSupplierLedger']['pos_supplier_id']=$this->request->data['PosSupplierLedger']['pos_supplier_id'];
		$this->request->data['PosSupplierLedger']['ledger_jurnal_id']='SP'.$jurnalId;
		$this->request->data['PosSupplierLedger']['amount']=$this->request->data['PosSupplierLedger']['payamount'];
		$this->request->data['PosSupplierLedger']['account_head_id']=$this->request->data['PosSupplierLedger']['accounthead'];
				
				//=========================Supplier paymet====================================//
				
			$this->PosSupplierLedger->create();
			$this->request->data['PosSupplierLedger']['payment_mode']=2;
			if ($this->PosSupplierLedger->save($this->request->data)) {
		  
		   	$lid = $this->PosSupplierLedger->getLastInsertId();	
		   //=============================Supplier payment AC===================================//
		   
		   $bankarray = array();
				if($this->request->data['PosSupplierLedger']['accounthead'] !=3){
					
						$bankarray['check_number']=$this->request->data['PosSupplierLedger']['check_number'];	
						$bankarray['check_date']=$this->request->data['PosSupplierLedger']['check_date'];	
					}
					
		     
			 $SPPaymentDebit = array('jurnalNumber'=>'SP'.$jurnalId,
												'debit_credit'=>1,
												'amount'=>$this->request->data['PosSupplierLedger']['payamount'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$lid,
												'referance_table'=>'Supplier Payment',
												'account_head_id'=>13,
 					
												);
				 if( $this->request->data['PosSupplierLedger']['accounthead'] == 3 ){
					$SPPaymentDebit['cashOrcheck'] = 2;
				}else{
					$SPPaymentDebit['cashOrcheck'] = 1;
					}
												
			if($this->AccountsLedgerTransaction->saveTransaction(array_merge($SPPaymentDebit,$bankarray))){
				
					
													
			   $bankarray = array();
				if($this->request->data['PosSupplierLedger']['accounthead'] !=3){
					
						$bankarray['check_number']=$this->request->data['PosSupplierLedger']['check_number'];	
						$bankarray['check_date']=$this->request->data['PosSupplierLedger']['check_date'];	
					}
		  
			 $SPPaymentDebit = array('jurnalNumber'=>'SP'.$jurnalId,
												'debit_credit'=>2,
												'amount'=>$this->request->data['PosSupplierLedger']['payamount'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table'=>'Supplier Payment',
												'referance_table_id'=>$lid,
												'account_head_id'=>$this->request->data['PosSupplierLedger']['accounthead'],
 												);
							
		       if( $this->request->data['PosSupplierLedger']['accounthead'] == 3 ){
					$SPPaymentDebit['cashOrcheck'] = 2;
				}else{
					$SPPaymentDebit['cashOrcheck'] = 1;
					}
				if($this->AccountsLedgerTransaction->saveTransaction(array_merge($SPPaymentDebit,$bankarray))){}
												
								}				  
			
					
		 //=============================Supplier payment AC===================================//		
				
				
			
			
					 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
				 
				 }
					
					 //================= AC Payment Debit Entry =============
				 
		 
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
      }
		$posSuppliers = $this->PosSupplierLedger->PosSupplier->find('list');
		$this->set(compact('posSuppliers'));
	   $this->set('page_titles', 'New Supplier Ledger'); 
	   
	   $this->loadModel('AccountsLedgerTransaction');
	   $this->set('AccountsHeadlists', $this->AccountsLedgerTransaction->AccountsHead->find('list',array('conditions'=>array('parent_id'=>2 ,'groupid'=>1),'Order'=>array('title'=>'asc'))));
	  
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid pos supplier ledger', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			$this->request->data['PosSupplierLedger']['payment_mode']=2;
		if ($this->PosSupplierLedger->save($this->request->data)) {
			$this->loadModel('PosCashBook');
			$this->request->data['PosCashBook']['reference_name']='PosSupplierLedgers';
			$this->request->data['PosCashBook']['title']='Supplier Payment';
			$this->request->data['PosCashBook']['reference_id']=$this->request->data['PosSupplierLedger']['id'];
			$this->request->data['PosCashBook']['debit']=$this->request->data['PosSupplierLedger']['payamount'];
	 	if($this->PosCashBook->save($this->request->data['PosCashBook'])){
				echo "Successfully Update.";
			} else {
			    echo "Update Failed.";	 
			}
		}
             Configure::write('debug', 0); 
			 $this->autoRender = false;
			 exit();
		}
      }
		if (empty($this->request->data)) {
			$this->request->data = $this->PosSupplierLedger->read(null, $id);
		}
		$posSuppliers = $this->PosSupplierLedger->PosSupplier->find('list');
		$this->set(compact('posSuppliers'));
     $this->set('page_titles', 'Update PosSupplierLedger'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pos supplier ledger', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PosSupplierLedger->delete($id)) {
			$this->setFlashMessage(__('Supplier Ledger deleted', 'multidelete'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pos supplier ledger was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	}
