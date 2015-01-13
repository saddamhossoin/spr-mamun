<?php
class PosSupplierPurchasesController extends AppController {

	var $name = 'PosSupplierPurchases';
   var $components = array( 'RequestHandler', 'Filter');
    function filtercondition($data=null)    
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'PosSupplierPurchase');
 		return $conditionarray;	
	}
    

	function index($yes = null) {
    
    	if( ! empty( $this->request->data ) ){
            $this->Session->delete('PosSupplierPurchaseSearch');
            $this->Session->write( 'PosSupplierPurchaseSearch', $this->request->data );
        }
         if( $this->Session->check( 'PosSupplierPurchaseSearch' ) ){
              $this->request->data = $this->Session->read( 'PosSupplierPurchaseSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'PosSupplierPurchaseSearch' );
			$this->PosSupplierPurchase->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('PosSupplierPurchase.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'PosSupplierPurchase'),
					'order' =>$this->Filter->sortoption($this->request->data,  'PosSupplierPurchase'),
        		);

    
		$this->PosSupplierPurchase->recursive = 0;
		$this->set('posSupplierPurchases', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'PosSupplierPurchase List'); 
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pos supplier purchase', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('posSupplierPurchase', $this->PosSupplierPurchase->read(null, $id));
         $this->set('page_titles', 'PosSupplierPurchase View'); 
	}

	function add() {
    if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			$this->PosSupplierPurchase->create();
			if ($this->PosSupplierPurchase->save($this->request->data)) {
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
      }
		$posSuppliers = $this->PosSupplierPurchase->PosSupplier->find('list');
		$posProducts = $this->PosSupplierPurchase->PosProduct->find('list');
		$this->set(compact('posSuppliers', 'posProducts'));
	   $this->set('page_titles', 'Add New PosSupplierPurchase'); 

	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid pos supplier purchase', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->PosSupplierPurchase->save($this->request->data)) {
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
			$this->request->data = $this->PosSupplierPurchase->read(null, $id);
		}
		$posSuppliers = $this->PosSupplierPurchase->PosSupplier->find('list');
		$posProducts = $this->PosSupplierPurchase->PosProduct->find('list');
		$this->set(compact('posSuppliers', 'posProducts'));
     $this->set('page_titles', 'Update PosSupplierPurchase'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pos supplier purchase', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PosSupplierPurchase->delete($id)) {
			$this->Session->setFlash(__('Pos supplier purchase deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pos supplier purchase was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	 function viewgride($id){
			$this->set('page_titles', 'Add New Product in Barcode'); 
			$this->PosSupplierPurchase->recursive = -1;
			$posSuppliers = $this->PosSupplierPurchase->PosSupplier->find('list');
			$posProducts = $this->PosSupplierPurchase->PosProduct->find('list');
			$this->set(compact('posSuppliers', 'posProducts'));
		 		}
	
	function productlist($id){
	
				//$product=$this->PosSupplierPurchase->PosProduct->find('first',array('conditions'=>array('PosSupplier.id'=>$id)));
				//$this->set(compact('product'));

	
	}
}
