<?php
class PosPurchaseDetailsController extends AppController {

	var $name = 'PosPurchaseDetails';
   var $components = array( 'RequestHandler', 'Filter');
    function filtercondition($data=null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'PosPurchaseDetail');
 		return $conditionarray;	
	}
    
	function index($yes = null) {
    
    	if( ! empty( $this->request->data ) ){
            $this->Session->delete('PosPurchaseDetailSearch');
            $this->Session->write( 'PosPurchaseDetailSearch', $this->request->data );
        }
         if( $this->Session->check( 'PosPurchaseDetailSearch' ) ){
              $this->request->data = $this->Session->read( 'PosPurchaseDetailSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'PosPurchaseDetailSearch' );
			$this->PosPurchaseDetail->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('PosPurchaseDetail.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'PosPurchaseDetail'),
					'order' =>$this->Filter->sortoption($this->request->data,  'PosPurchaseDetail'),
        		);

    
		$this->PosPurchaseDetail->recursive = 0;
		$this->set('posPurchaseDetails', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'PosPurchaseDetail List'); 
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pos purchase detail', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('posPurchaseDetail', $this->PosPurchaseDetail->read(null, $id));
         $this->set('page_titles', 'PosPurchaseDetail View'); 
	}

	function add() {
    if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			$this->PosPurchaseDetail->create();
			if ($this->PosPurchaseDetail->save($this->request->data)) {
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
      }
		$posPurchases = $this->PosPurchaseDetail->PosPurchase->find('list');
		$posBrands = $this->PosPurchaseDetail->PosBrand->find('list');
		$posProducts = $this->PosPurchaseDetail->PosProduct->find('list');
		$posPcategories = $this->PosPurchaseDetail->	PosPcategory->find('list');
		$this->set(compact('posPurchases', 'posBrands', 'posProducts', 'posPcategories'));
	   $this->set('page_titles', 'Add New PosPurchaseDetail'); 

	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid pos purchase detail', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->PosPurchaseDetail->save($this->request->data)) {
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
			$this->request->data = $this->PosPurchaseDetail->read(null, $id);
		}
		$posPurchases = $this->PosPurchaseDetail->PosPurchase->find('list');
		$posBrands = $this->PosPurchaseDetail->PosBrand->find('list');
		$posProducts = $this->PosPurchaseDetail->PosProduct->find('list');
		$posPcategories = $this->PosPurchaseDetail->	PosPcategory->find('list');
		$this->set(compact('posPurchases', 'posBrands', 'posProducts', 'posPcategories'));
     $this->set('page_titles', 'Update PosPurchaseDetail'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pos purchase detail', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PosPurchaseDetail->delete($id)) {
			$this->Session->setFlash(__('Pos purchase detail deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pos purchase detail was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
