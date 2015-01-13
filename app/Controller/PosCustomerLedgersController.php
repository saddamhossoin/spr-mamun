<?php
App::uses('AppController', 'Controller');
/**
 * PosCustomerLedgers Controller
 *
 * @property PosCustomerLedger $PosCustomerLedger
 * @property PaginatorComponent $Paginator
 */
class PosCustomerLedgersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

function filtercondition($data=null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'PosCustomerLedger');
	  if(!empty($this->request->data['PosCustomerLedger']['payment_mode']))
			{
				if(!empty($conditionarray))
				{
					$conditionarray .= " AND ";
				}
					$conditionarray .= 'PosCustomerLedger.payment_mode ='.$this->request->data['PosCustomerLedger']['payment_mode'];	
				
		 }
		if(!empty($this->request->data['PosCustomerLedger']['pos_customer_id']))
			{
				if(!empty($conditionarray))
				{
					$conditionarray .= " AND ";
				}
					$conditionarray .= 'PosCustomerLedger.pos_customer_id ='.$this->request->data['PosCustomerLedger']['pos_customer_id'];	
		 }
 		return $conditionarray;	
	}
    

	function index($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('PosCustomerLedgerSearch');
            $this->Session->write( 'PosCustomerLedgerSearch', $this->request->data );
        }
         if( $this->Session->check( 'PosCustomerLedgerSearch' ) ){
              $this->request->data = $this->Session->read( 'PosCustomerLedgerSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'PosCustomerLedgerSearch' );
			$this->PosCustomerLedger->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('PosCustomerLedger.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'PosCustomerLedger'),
					'order' =>$this->Filter->sortoption($this->request->data,  'PosCustomerLedger'),
        		);

    
		$this->PosCustomerLedger->recursive = 0;
		$this->set('posCustomerLedgers', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'CustomerLedger List'); 
		$this->loadModel('PosCustomer');
		$this->set('poscustomers',$this->PosCustomer->find('list'));
	}
	
	function invoice($id = null){
		$this->PosCustomerLedger->recursive =0;
		$customer_ledgers=$this->PosCustomerLedger->find('all',array('conditions'=>array('PosCustomerLedger.pos_customer_id'=>$id),'order' =>array('PosCustomerLedger.modified'=>'desc')));
		$this->set('customer_ledgers',$customer_ledgers);
		$this->layout  = 'wcreport';
		$this->set('reportheading','Customer Ledger List');
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pos customer ledger', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('posCustomerLedger', $this->PosCustomerLedger->read(null, $id));
         $this->set('page_titles', 'PosCustomerLedger View'); 
	}

	function add() {
		
		$this->loadModel('AccountsLedgerTransaction');
    if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			//pr($this->request->data);die();
			
			
			$jurnalId = $this->AccountsLedgerTransaction->manageJurnalId('CP');
			
			if($this->request->data['PosCustomerLedger']['accounthead'] !=3){
					$this->request->data['PosCustomerLedger']['check_number']=$this->request->data['PosCustomerLedger']['check_number'];	
					$this->request->data['PosCustomerLedger']['check_date']=$this->request->data['PosCustomerLedger']['check_date'];	
				  }
			
				$this->request->data['PosCustomerLedger']['payment_mode']=2;
				$this->request->data['PosCustomerLedger']['pos_customer_id']=$this->request->data['PosCustomerLedger']['pos_customer_id'];
				$this->request->data['PosCustomerLedger']['debit_credit']=2;
 				$this->request->data['PosCustomerLedger']['amount']=$this->request->data['PosCustomerLedger']['payamount'];
				$this->request->data['PosCustomerLedger']['ledger_jurnal_id']='CP'.$jurnalId;
				$this->request->data['PosCustomerLedger']['account_head_id']=$this->request->data['PosCustomerLedger']['accounthead'];
				
				if($this->request->data['PosCustomerLedger']['accounthead']==3){
					$this->request->data['PosCustomerLedger']['cashOrcheck']=2;
					}else{
					$this->request->data['PosCustomerLedger']['cashOrcheck']=1;
						}
				$this->PosCustomerLedger->create();
				if ($this->PosCustomerLedger->save($this->request->data)) {
					
						$lid = $this->PosCustomerLedger->getLastInsertId();	
						
		         //================Supplier payment AC========================//
		   
		    $bankarray = array();
				if($this->request->data['PosCustomerLedger']['accounthead'] !=3){
					
						$bankarray['check_number']=$this->request->data['PosCustomerLedger']['check_number'];	
						$bankarray['check_date']=$this->request->data['PosCustomerLedger']['check_date'];	
					}
				
				$CPPaymentDebit = array('jurnalNumber'=>'CP'.$jurnalId,
												'debit_credit'=>1,
												'amount'=>$this->request->data['PosCustomerLedger']['payamount'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$lid,
												'referance_table'=>'Customer Payment',
												'account_head_id'=>$this->request->data['PosCustomerLedger']['accounthead'],
 					
												);
												
				 if( $this->request->data['PosCustomerLedger']['accounthead'] == 3 ){
					$CPPaymentDebit['cashOrcheck'] = 2;
				}else{
					$CPPaymentDebit['cashOrcheck'] = 1;
					}
			if($this->AccountsLedgerTransaction->saveTransaction(array_merge($CPPaymentDebit,$bankarray))){
				
				  $bankarray = array();
				if($this->request->data['PosCustomerLedger']['accounthead'] !=3){
					
						$bankarray['check_number']=$this->request->data['PosCustomerLedger']['check_number'];	
						$bankarray['check_date']=$this->request->data['PosCustomerLedger']['check_date'];	
					}
				
				$CPPaymentCredit = array('jurnalNumber'=>'CP'.$jurnalId,
												'debit_credit'=>2,
												'amount'=>$this->request->data['PosCustomerLedger']['payamount'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$lid,
												'referance_table'=>'Customer Payment',
												'account_head_id'=>15,
 					
												);
												
				 if( $this->request->data['PosCustomerLedger']['accounthead'] == 3 ){
					$CPPaymentCredit['cashOrcheck'] = 2;
				}else{
					$CPPaymentCredit['cashOrcheck'] = 1;
					}
			 if($this->AccountsLedgerTransaction->saveTransaction(array_merge($CPPaymentCredit,$bankarray))){}
												
								}	
				
				
			
			
		 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
				 
				 }
			
			
			
			
			
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
		
		  
	   
      }
		$posCustomers = $this->PosCustomerLedger->PosCustomer->find('list');
		$this->set(compact('posCustomers'));
		
		
		
	    $this->set('AccountsHeadlists', $this->AccountsLedgerTransaction->AccountsHead->find('list',array('conditions'=>array('parent_id'=>2 ,'groupid'=>1),'Order'=>array('title'=>'asc'))));
		
	   $this->set('page_titles', 'New  Customer Ledger'); 
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid pos customer ledger', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->PosCustomerLedger->save($this->request->data)) {
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
			$this->request->data = $this->PosCustomerLedger->read(null, $id);
		}
		$posCustomers = $this->PosCustomerLedger->PosCustomer->find('list');
		$this->set(compact('posCustomers'));
     $this->set('page_titles', 'Update PosCustomerLedger'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pos customer ledger', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PosCustomerLedger->delete($id)) {
			 $this->setFlashMessage(__('Customer Ledger deleted', 'multidelete'));
		 	 $this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pos customer ledger was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}}
