<?php class PosSuppliersController extends AppController {
 	var $name = 'PosSuppliers';
   	var $components = array( 'RequestHandler', 'Filter');
    function filtercondition( $data = null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->
			 Filter->gfilter($data,'PosSupplier');
			 if(!empty($this->request->data['PosSupplier']['name']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
					$conditionarray .= 'PosSupplier.name like \'%'.$this->request->data['PosSupplier']['name']."%'";		
					
			 }
			  if(!empty($this->request->data['PosSupplier']['mobile']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
					$conditionarray .= 'PosSupplier.mobile like \'%'.$this->request->data['PosSupplier']['mobile']."%'";		
					
			 }
			  if(!empty($this->request->data['PosSupplier']['email']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
					$conditionarray .= 'PosSupplier.email like \'%'.$this->request->data['PosSupplier']['email']."%'";		
					
			 }
			  if(!empty($this->request->data['PosSupplier']['iva']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
					$conditionarray .= 'PosSupplier.iva like \'%'.$this->request->data['PosSupplier']['iva']."%'";		
					
			 }
			 
			 
 		return $conditionarray;	
	}
    	function invoice($id=null){
			$this->loadModel("PosPurchase");
			$invoices=$this->PosPurchase->find("all", array('conditions' =>array("PosPurchase.pos_supplier_id"=>$id)));
			$this->set("invoices",$invoices);
			$this->loadModel("PosBrand");
			$this->set("brand",$this->PosBrand->find("list"));
			$this->loadModel("PosProduct");
			$this->set("product",$this->PosProduct->find("list",array("fields"=>array("id","name"))));
			$this->loadModel("PosPcategory");
			$this->set("category",$this->PosPcategory->find("list"));
			$posSupplier=$this->PosSupplier->find('first',array('conditions'=>array('PosSupplier.id'=>$id)));
			
 				 $this->loadModel('PosPurchase');
				 $totalpurchses = $this->PosPurchase->find('all',array('conditions'=>array('PosPurchase.pos_supplier_id'=>$id)));
				 $this->set('totalpurchses',$totalpurchses);
 		 
        $this->set('page_titles', " Invoice List of ".$posSupplier['PosSupplier']['name']); 

 }
	 

	function index($yes = null) {
    
    	if( ! empty( $this->request->data ) ){
            $this->Session->delete('PosSupplierSearch');
            $this->Session->write( 'PosSupplierSearch', $this->request->data );
        }
         if( $this->Session->check( 'PosSupplierSearch' ) ){
              $this->request->data = $this->Session->read( 'PosSupplierSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'PosSupplierSearch' );
			$this->PosSupplier->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('PosSupplier.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'PosSupplier'),
					'order' =>$this->Filter->sortoption($this->request->data,  'PosSupplier'),
        		);
		 
		$this->PosSupplier->unbindModelAll();
		$this->PosSupplier->bindModel(  array('hasMany' => array(
							'PosSupplierLedger' => array(
							'className' => 'PosSupplierLedger',
							'foreignKey' => 'pos_supplier_id',
							'limit'=>1
 							) 
						)
				) );
		 
		$this->PosSupplier->recursive = 1;
		$this->set('posSuppliers', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'List of Supplier'); 
	}

	function view($id = null) {
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid pos supplier', true));
			$this->redirect(array('action' => 'index'));
		}
		
		$this->set('posSupplier', $this->PosSupplier->read(null,$id));
		
		 $this->loadModel('AccountsHead');
		 $this->loadModel('PosSupplierLedger');
		  
		 $supplier_ledgers = $this->PosSupplierLedger->query("select `account_head_id`, (SELECT `title` FROM `mayasoftbd_accounts_heads` WHERE `id`=`account_head_id`)AccountName, sum((case `debit_credit` when '1' then -`amount` else `amount` end))Balance from mayasoftbd_pos_supplier_ledgers where `pos_supplier_id`= ' $id ' group by 'account_head_id',AccountName");
         
		 $this->set('supplier_ledgers',$supplier_ledgers);
		 
		
		 //pr($supplier_ledgers);
		  $this->set('accountsheads',$this->AccountsHead->find('list'));
		
		 
		$this->set('page_titles', 'Supplier View'); 
	}

	function add() {
    if ($this->RequestHandler->isAjax()) {	
	 if (!empty($this->request->data)) {
	 	  // print_r($this->request->data);die(); 
	
			$this->PosSupplier->create();
			if ($this->PosSupplier->save($this->request->data)) {
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		
      }
	  }
		   $this->set('page_titles', 'Add New  Supplier'); 

	
	}
	

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid pos supplier', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->PosSupplier->save($this->request->data)) {
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
			$this->request->data = $this->PosSupplier->read(null, $id);
		}
	  $this->set('page_titles', 'Update PosSupplier'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pos supplier', true));
			$this->redirect(array('action'=>'index'));
		}
		
		$this->loadModel('PosPurchase');
		$this->loadModel('PosSupplierLedger');
		
		$is_purchase = $this->PosPurchase->find('first',array('conditions'=>array('PosPurchase.pos_supplier_id' => $id),'recursive'=> -1));
 		$is_ledger = $this->PosSupplierLedger->find('first',array('conditions'=>array('PosSupplierLedger.pos_supplier_id' => $id),'recursive'=> -1));
 	 
	 	if(!empty($is_purchase)){
			$this->setFlashMessage(__('Sorry Supplier is not deleted. His has purchase data. ', 'warnning_message'));
			$this->redirect(array('action'=>'index'));
		
		}else if(!empty($is_ledger)){
			
			$this->setFlashMessage(__('Sorry Supplier is not deleted. His has accounts data.', 'warnning_message'));
			$this->redirect(array('action'=>'index'));
		}else{
			
			if ($this->PosSupplier->delete($id)) {
				$this->setFlashMessage(__('Pos supplier deleted', 'multidelete'));
				$this->redirect(array('action'=>'index'));
			}
		}
		 
		$this->setFlashMessage(__('Pos supplier was not deleted', 'warnning_message'));
		$this->redirect(array('action' => 'index'));
	}
} 