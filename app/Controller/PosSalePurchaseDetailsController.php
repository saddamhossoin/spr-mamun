<?php
App::uses('AppController', 'Controller');
/**
 * PosSalePurchaseDetails Controller
 *
 * @property PosSalePurchaseDetail $PosSalePurchaseDetail
 * @property PaginatorComponent $Paginator
 */
class PosSalePurchaseDetailsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

function filtercondition($data=null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'PosSalePurchaseDetail');
 		return $conditionarray;	
	}
    

	function index($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('PosSalePurchaseDetailSearch');
            $this->Session->write( 'PosSalePurchaseDetailSearch', $this->request->data );
        }
         if( $this->Session->check( 'PosSalePurchaseDetailSearch' ) ){
              $this->request->data = $this->Session->read( 'PosSalePurchaseDetailSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'PosSalePurchaseDetailSearch' );
			$this->PosSalePurchaseDetail->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('PosSalePurchaseDetail.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'PosSalePurchaseDetail'),
					'order' =>$this->Filter->sortoption($this->request->data,  'PosSalePurchaseDetail'),
        		);

    
		$this->PosSalePurchaseDetail->recursive = 0;
		$this->set('posSalePurchaseDetails', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'PosSalePurchaseDetail List'); 
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pos sale purchase detail', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('posSalePurchaseDetail', $this->PosSalePurchaseDetail->read(null, $id));
         $this->set('page_titles', 'PosSalePurchaseDetail View'); 
	}

	function add() {
    if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			$this->PosSalePurchaseDetail->create();
			if ($this->PosSalePurchaseDetail->save($this->request->data)) {
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
      }
		$posPurchaseDetails = $this->PosSalePurchaseDetail->PosPurchaseDetail->find('list');
		$posSaleDetails = $this->PosSalePurchaseDetail->PosSaleDetail->find('list');
		$posProducts = $this->PosSalePurchaseDetail->PosProduct->find('list');
		$this->set(compact('posPurchaseDetails', 'posSaleDetails', 'posProducts'));
	   $this->set('page_titles', 'New PosSalePurchaseDetail'); 

	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid pos sale purchase detail', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->PosSalePurchaseDetail->save($this->request->data)) {
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
			$this->request->data = $this->PosSalePurchaseDetail->read(null, $id);
		}
		$posPurchaseDetails = $this->PosSalePurchaseDetail->PosPurchaseDetail->find('list');
		$posSaleDetails = $this->PosSalePurchaseDetail->PosSaleDetail->find('list');
		$posProducts = $this->PosSalePurchaseDetail->PosProduct->find('list');
		$this->set(compact('posPurchaseDetails', 'posSaleDetails', 'posProducts'));
     $this->set('page_titles', 'Update PosSalePurchaseDetail'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pos sale purchase detail', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PosSalePurchaseDetail->delete($id)) {
			$this->Session->setFlash(__('Pos sale purchase detail deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pos sale purchase detail was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}}
