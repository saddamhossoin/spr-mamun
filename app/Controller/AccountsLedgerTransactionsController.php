<?php
App::uses('AppController', 'Controller');
/**
 * AccountsLedgerTransactions Controller
 *
 * @property AccountsLedgerTransaction $AccountsLedgerTransaction
 * @property PaginatorComponent $Paginator
 */
class AccountsLedgerTransactionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	  public function trialBalance(){
	 
		$this->loadModel('AccountsHead');
		$trialbalances = $this->AccountsHead->query("SELECT `account_head_id` ,(select title from `mayasoftbd_accounts_heads` where id=`account_head_id`)AccountName ,(sum(case `debit_credit` when '1' then -`amount` else `amount` end))Balance FROM `mayasoftbd_accounts_ledger_transactions` group by `account_head_id`,AccountName");
		$this->set('trialbalances',$trialbalances);
		$this->set('page_titles','Trial Balance');
		
		
		}
	
	
	 //=======================Balance Sheet Report code Start Here=============================//	 
	  
      public function income_statement(){
	 
		$this->loadModel('AccountsHead');
		
		//===================== Income Start Here ==================
		$Income = $this->AccountsHead->find('first',array('conditions'=>array('AccountsHead.id'=>8)));
 		$incomeid = $this->AccountsHead->find('list', array(
    		'conditions' => array(
									'AccountsHead.lft >=' => $Income['AccountsHead']['lft'] , 
									'AccountsHead.rght <=' => $Income['AccountsHead']['rght'] ,
									'AccountsHead.is_posted'=>1
								)));
								
		 $incomeid = implode(",", array_keys($incomeid));
 
		$Income_Heads = $this->AccountsHead->query("SELECT `account_head_id` ,(select title from `mayasoftbd_accounts_heads` where id=`account_head_id`)AccountName ,(sum((case `debit_credit` when '1' then -`amount` else `amount` end))*(-1))Balance FROM `mayasoftbd_accounts_ledger_transactions` where `account_head_id` in ($incomeid) group by `account_head_id`,AccountName");


		//========================== Expense Start Here ============================
		$Expense = $this->AccountsHead->find('first',array('conditions'=>array('AccountsHead.id'=>9)));
 		$Expenseid = $this->AccountsHead->find('list', array(
    		'conditions' => array(
									'AccountsHead.lft >=' => $Expense['AccountsHead']['lft'] , 
									'AccountsHead.rght <=' => $Expense['AccountsHead']['rght'] ,
									'AccountsHead.is_posted'=>1
								)));
							 
								
		 $Expenseid = implode(",", array_keys($Expenseid));


		$expenses = $this->AccountsHead->query("SELECT `account_head_id` ,(select title from `mayasoftbd_accounts_heads` where id=`account_head_id`)AccountName ,(sum((case `debit_credit` when '1' then -`amount` else `amount` end))*(-1))Balance FROM `mayasoftbd_accounts_ledger_transactions` where `account_head_id` in ($Expenseid) group by `account_head_id`,AccountName");
											
						$this->set('Income_Heads' , $Income_Heads); 
						$this->set('expenses',$expenses);
			 
		  
		  
	  
	  $this->set('page_titles','Balance Sheet Report');
	  }
		  
	//=======================Balance Sheet Report code End Here=============================//
	

function filtercondition($data=null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'AccountsLedgerTransaction');
			 
			  if(!empty($this->request->data['AccountsLedgerTransaction']['account_head_id']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
			 	$conditionarray .= 'AccountsLedgerTransaction.account_head_id ='.$this->request->data['AccountsLedgerTransaction']['account_head_id'];	
 			 }
			 
			 
 		return $conditionarray;	
		
		
		
	}
    
	function generalLedger($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('AccountsLedgerTransactionSearch');
            $this->Session->write( 'AccountsLedgerTransactionSearch', $this->request->data );
        }
         if( $this->Session->check( 'AccountsLedgerTransactionSearch' ) ){
              $this->request->data = $this->Session->read( 'AccountsLedgerTransactionSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'AccountsLedgerTransactionSearch' );
			$this->AccountsLedgerTransaction->recursive = 0;
			$this->paginate  = array(
 				'limit' => '100',
				'order' =>array('AccountsLedgerTransaction.transaction_date'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => 100,
					'order' =>array('AccountsLedgerTransaction.transaction_date'=>'desc' ),
        		);

    
		$this->AccountsLedgerTransaction->recursive = 0;
		$this->set('accountsLedgerTransactions', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'General Ledger'); 
	}

	function index($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('AccountsLedgerTransactionSearch');
            $this->Session->write( 'AccountsLedgerTransactionSearch', $this->request->data );
        }
         if( $this->Session->check( 'AccountsLedgerTransactionSearch' ) ){
              $this->request->data = $this->Session->read( 'AccountsLedgerTransactionSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'AccountsLedgerTransactionSearch' );
			$this->AccountsLedgerTransaction->recursive = 0;
			$this->paginate  = array(
 				'limit' => '100',
				'order' =>array('AccountsLedgerTransaction.transaction_date'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => 100,
					'order' =>array('AccountsLedgerTransaction.transaction_date'=>'desc' ),
        		);

    
		$this->AccountsLedgerTransaction->recursive = 0;
		$this->set('accountsLedgerTransactions', $this->paginate());
        $this->set('sortoption',array());
		
		$this->set('AccountsHeadlists', $this->AccountsLedgerTransaction->AccountsHead->find('list',array('conditions'=>array('is_posted'=>1),'Order'=>array('title'=>'asc'))));
		 
        $this->set('page_titles', 'General Ledger'); 
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid accounts ledger transaction', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('accountsLedgerTransaction', $this->AccountsLedgerTransaction->read(null, $id));
         $this->set('page_titles', 'AccountsLedgerTransaction View'); 
	}

	function add() {
    if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			
			 // pr($this->request->data['AccountsLedgerTransaction']); die();
			
			$jurnalId = $this->AccountsLedgerTransaction->manageJurnalId('JE');
			$i=0;
 			foreach($this->request->data['AccountsLedgerTransaction'] as $jurnaldata){
				
		 
			$InventoryAccountsEntryArray = array('jurnalNumber'=>'JE'.$jurnalId,
												'debit_credit'=>$jurnaldata['debit_credit'],
												'amount'=>$jurnaldata['amount'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table'=>'AccountsLedgerTransaction',
												'account_head_id'=>$jurnaldata['account_head_id'],
 												);
				if(!empty($jurnaldata['manualvoucherNumber'])){
					$InventoryAccountsEntryArray['manualvoucherNumber'] = $jurnaldata['manualvoucherNumber'];
				}
				if(!empty($jurnaldata['check_number'])){
					$InventoryAccountsEntryArray['check_number'] = $jurnaldata['check_number'];
				}
				if(!empty($jurnaldata['check_date'])){
					$InventoryAccountsEntryArray['check_date'] = $jurnaldata['check_date'];
				}
				
				if( $jurnaldata['account_head_id'] == 10 || $jurnaldata['account_head_id'] == 11 || $jurnaldata['account_head_id'] ==12){
					$InventoryAccountsEntryArray['cashOrcheck'] = 1;
				}else{
					$InventoryAccountsEntryArray['cashOrcheck'] = 2;
					}
				
				if($this->AccountsLedgerTransaction->saveTransaction($InventoryAccountsEntryArray)){
					
					
				}
				else{
				}
			}
			
			echo 'Successfully Saved';
			 
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
      }
	   $this->set('page_titles', 'New AccountsLedgerTransaction'); 
	 $this->set('AccountsHeadlists', $this->AccountsLedgerTransaction->AccountsHead->find('list',array('conditions'=>array('is_posted'=>1),'Order'=>array('title'=>'asc'))));


	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid accounts ledger transaction', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->AccountsLedgerTransaction->save($this->request->data)) {
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
			$this->request->data = $this->AccountsLedgerTransaction->read(null, $id);
		}
     $this->set('page_titles', 'Update AccountsLedgerTransaction'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for accounts ledger transaction', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->AccountsLedgerTransaction->delete($id)) {
			$this->Session->setFlash(__('Accounts ledger transaction deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Accounts ledger transaction was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	
	function debit_voucher_cash(){
		//die('jewe');
    if ($this->RequestHandler->isAjax()) {	
	
		if (!empty($this->request->data)) {
			
			 // pr($this->request->data['AccountsLedgerTransaction']);  die();
			 
			 //====================================Cash Voucher Debit Entry start=============================================//
			
			$jurnalId = $this->AccountsLedgerTransaction->manageJurnalId('DVC');
			$i=0;
				
			  $DebitVoucherCashArray = array('jurnalNumber'=>'DVC'.$jurnalId,
									'debit_credit'=>1,
									'amount'=>$this->request->data['AccountsLedgerTransaction']['amount'],
									'transaction_date'=>date('Y-m-d H:i:s'),
									'referance_table'=>'AccountsLedgerTransaction',
									'account_head_id'=>$this->request->data['AccountsLedgerTransaction']['account_head_id'],
									'counter_account_head_id'=>$this->request->data['AccountsLedgerTransaction']['counter_account_head_id'],
									'manualvoucherNumber'=>$this->request->data['AccountsLedgerTransaction']['manualvoucherNumber'],
 												);
												
				if(!empty($this->request->data['AccountsLedgerTransaction']['check_number'])){
					$DebitVoucherCashArray['check_number'] = $this->request->data['AccountsLedgerTransaction']['check_number'];
				}
				if(!empty($this->request->data['AccountsLedgerTransaction']['check_date'])){
					$DebitVoucherCashArray['check_date'] = $this->request->data['AccountsLedgerTransaction']['check_date'];
				}
				
			
			   if( $this->request->data['AccountsLedgerTransaction']['account_head_id'] == 10 || $this->request->data['AccountsLedgerTransaction']['account_head_id'] == 11 || $this->request->data['AccountsLedgerTransaction']['account_head_id'] ==12){
					$DebitVoucherCashArray['cashOrcheck'] = 1;
				}else{
					$DebitVoucherCashArray['cashOrcheck'] = 2;
					}
				
				if($this->AccountsLedgerTransaction->saveTransaction($DebitVoucherCashArray)){
				}
			//====================================Cash Voucher Debit Entry End=============================================//
			
			//====================================Cash Voucher Crdit Entry Start=============================================//
			
			
			   $DebitVoucherCashArray1 = array('jurnalNumber'=>'DVC'.$jurnalId,
										'debit_credit'=>2,
										'amount'=>$this->request->data['AccountsLedgerTransaction']['amount'],
										'transaction_date'=>date('Y-m-d H:i:s'),
										'referance_table'=>'AccountsLedgerTransaction',
										'account_head_id'=>$this->request->data['AccountsLedgerTransaction']['counter_account_head_id'],
										'counter_account_head_id'=>$this->request->data['AccountsLedgerTransaction']['account_head_id'],
										'manualvoucherNumber'=>$this->request->data['AccountsLedgerTransaction']['manualvoucherNumber'],
										);
			
			   
			   if(!empty($this->request->data['AccountsLedgerTransaction']['check_number1'])){
					$DebitVoucherCashArray1['check_number'] = $this->request->data['AccountsLedgerTransaction']['check_number1'];
				}
				if(!empty($this->request->data['AccountsLedgerTransaction']['check_date1'])){
					$DebitVoucherCashArray1['check_date'] = $this->request->data['AccountsLedgerTransaction']['check_date1'];
				}
	           
			    if( $this->request->data['AccountsLedgerTransaction']['account_head_id'] == 10 || $this->request->data['AccountsLedgerTransaction']['account_head_id'] == 11 || $this->request->data['AccountsLedgerTransaction']['account_head_id'] ==12){
					$DebitVoucherCashArray1['cashOrcheck'] = 1;
				}else{
					$DebitVoucherCashArray1['cashOrcheck'] = 2;
					}
			if($this->AccountsLedgerTransaction->saveTransaction($DebitVoucherCashArray1)){
 					}
					
		//====================================Cash Voucher Crdit Entry End=============================================//
					
					echo 'Successfully Saved';
					
				
				
			
			 
            
		}
		Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
    }
	   $this->set('page_titles','Debit Voucher Cash'); 
	 $this->set('AccountsHeadlists', $this->AccountsLedgerTransaction->AccountsHead->find('list',array('conditions'=>array('is_posted'=>1),'Order'=>array('title'=>'asc'))));


	  }
	  
	  
	function credit_voucher_cash(){
    if ($this->RequestHandler->isAjax()) {	
	
		if (!empty($this->request->data)) {
			
			 //====================================Credit Voucher Debit Entry start=============================================//
			
			$jurnalId = $this->AccountsLedgerTransaction->manageJurnalId('CVC');
			$i=0;
				
			  $CreditVoucherCashArray = array('jurnalNumber'=>'CVC'.$jurnalId,
									'debit_credit'=>1,
									'amount'=>$this->request->data['AccountsLedgerTransaction']['amount'],
									'transaction_date'=>date('Y-m-d H:i:s'),
									'referance_table'=>'AccountsLedgerTransaction',
									'account_head_id'=>$this->request->data['AccountsLedgerTransaction']['account_head_id'],
									'counter_account_head_id'=>$this->request->data['AccountsLedgerTransaction']['counter_account_head_id'],
									'manualvoucherNumber'=>$this->request->data['AccountsLedgerTransaction']['manualvoucherNumber'],
 												);
												
				if(!empty($this->request->data['AccountsLedgerTransaction']['check_number'])){
					$CreditVoucherCashArray['check_number'] = $this->request->data['AccountsLedgerTransaction']['check_number'];
				}
				if(!empty($this->request->data['AccountsLedgerTransaction']['check_date'])){
					$CreditVoucherCashArray['check_date'] = $this->request->data['AccountsLedgerTransaction']['check_date'];
				}
				
			
			   if( $this->request->data['AccountsLedgerTransaction']['account_head_id'] == 10 || $this->request->data['AccountsLedgerTransaction']['account_head_id'] == 11 || $this->request->data['AccountsLedgerTransaction']['account_head_id'] ==12){
					$CreditVoucherCashArray['cashOrcheck'] = 1;
				}else{
					$CreditVoucherCashArray['cashOrcheck'] = 2;
					}
				
				if($this->AccountsLedgerTransaction->saveTransaction($CreditVoucherCashArray)){
				}
			//====================================Credit Voucher Debit Entry End=============================================//
			
			//====================================Credit Voucher Credit Entry Start=============================================//
			
			
			   $DebitVoucherCashArray1 = array('jurnalNumber'=>'CVC'.$jurnalId,
										'debit_credit'=>2,
										'amount'=>$this->request->data['AccountsLedgerTransaction']['amount'],
										'transaction_date'=>date('Y-m-d H:i:s'),
										'referance_table'=>'AccountsLedgerTransaction',
										'account_head_id'=>$this->request->data['AccountsLedgerTransaction']['counter_account_head_id'],
										'counter_account_head_id'=>$this->request->data['AccountsLedgerTransaction']['account_head_id'],
										'manualvoucherNumber'=>$this->request->data['AccountsLedgerTransaction']['manualvoucherNumber'],
										);
			
			   
			   if(!empty($this->request->data['AccountsLedgerTransaction']['check_number1'])){
					$DebitVoucherCashArray1['check_number'] = $this->request->data['AccountsLedgerTransaction']['check_number1'];
				}
				if(!empty($this->request->data['AccountsLedgerTransaction']['check_date1'])){
					$DebitVoucherCashArray1['check_date'] = $this->request->data['AccountsLedgerTransaction']['check_date1'];
				}
	           
			    if( $this->request->data['AccountsLedgerTransaction']['account_head_id'] == 10 || $this->request->data['AccountsLedgerTransaction']['account_head_id'] == 11 || $this->request->data['AccountsLedgerTransaction']['account_head_id'] ==12){
					$DebitVoucherCashArray1['cashOrcheck'] = 1;
				}else{
					$DebitVoucherCashArray1['cashOrcheck'] = 2;
					}
			if($this->AccountsLedgerTransaction->saveTransaction($DebitVoucherCashArray1)){
 					}
					
		//====================================Credit Voucher Credit Entry End=============================================//
					
					echo 'Successfully Saved';
					
				
				
			
			 
            
		}
		Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
    }
	   $this->set('page_titles','Debit Voucher Cash'); 
	 $this->set('AccountsHeadlists', $this->AccountsLedgerTransaction->AccountsHead->find('list',array('conditions'=>array('is_posted'=>1),'Order'=>array('title'=>'asc'))));


	  }
	  
	  
	  //=======================Balance Sheet Report code Start Here=============================//	 
	  
      public function balance_sheet_report(){
	 
		$this->loadModel('AccountsHead');
		$assiest = $this->AccountsHead->find('first',array('conditions'=>array('AccountsHead.id'=>1)));
 		$assiest_id = $this->AccountsHead->find('list', array(
    		'conditions' => array(
									'AccountsHead.lft >=' => $assiest['AccountsHead']['lft'] , 
									'AccountsHead.rght <=' => $assiest['AccountsHead']['rght'] ,
									'AccountsHead.is_posted'=>1
								)));
							 
								
		 $assiest_id = implode(",", array_keys($assiest_id));
		 
		 
		  
		 
		$Assest = $this->AccountsHead->query("SELECT `account_head_id` ,(select title from `mayasoftbd_accounts_heads` where id=`account_head_id`)AccountName ,(sum((case `debit_credit` when '1' then -`amount` else `amount` end))*(-1))Balance FROM `mayasoftbd_accounts_ledger_transactions` where `account_head_id` in ($assiest_id) group by `account_head_id`,AccountName");

		
		$libality = $this->AccountsHead->find('first',array('conditions'=>array('AccountsHead.id'=>5)));
 		$libality_id = $this->AccountsHead->find('list', array(
    		'conditions' => array(
									'AccountsHead.lft >=' => $libality['AccountsHead']['lft'] , 
									'AccountsHead.rght <=' => $libality['AccountsHead']['rght'] ,
									'AccountsHead.is_posted'=>1
								)));
							 
								
		 $libality_id = implode(",", array_keys($libality_id));
		 
		
		$Liabilites = $this->AccountsHead->query("SELECT `account_head_id` ,(select title from `mayasoftbd_accounts_heads` where id=`account_head_id`)AccountName ,(sum((case `debit_credit` when '1' then -`amount` else `amount` end))*(-1))Balance FROM `mayasoftbd_accounts_ledger_transactions` where `account_head_id` in ($libality_id) group by `account_head_id`,AccountName");
											
						$this->set('Assest' , $Assest); 
						$this->set('Liabilites',$Liabilites);
			 
		  
		  
	  
	  $this->set('page_titles','Balancec Sheet Report');
	  }
		  
	//=======================Balance Sheet Report code End Here=============================//
	
	
	}
