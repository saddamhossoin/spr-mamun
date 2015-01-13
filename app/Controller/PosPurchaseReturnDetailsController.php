<?php
App::uses('AppController', 'Controller');
/**
 * PosPurchaseReturnDetails Controller
 *
 * @property PosPurchaseReturnDetail $PosPurchaseReturnDetail
 * @property PaginatorComponent $Paginator
 */
class PosPurchaseReturnDetailsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

function filtercondition($data=null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'PosPurchaseReturnDetail');
 		return $conditionarray;	
	}
    

	function index($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('PosPurchaseReturnDetailSearch');
            $this->Session->write( 'PosPurchaseReturnDetailSearch', $this->request->data );
        }
         if( $this->Session->check( 'PosPurchaseReturnDetailSearch' ) ){
              $this->request->data = $this->Session->read( 'PosPurchaseReturnDetailSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'PosPurchaseReturnDetailSearch' );
			$this->PosPurchaseReturnDetail->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('PosPurchaseReturnDetail.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'PosPurchaseReturnDetail'),
					'order' =>$this->Filter->sortoption($this->request->data,  'PosPurchaseReturnDetail'),
        		);

    
		$this->PosPurchaseReturnDetail->recursive = 0;
		$this->set('posPurchaseReturnDetails', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'PosPurchaseReturnDetail List'); 
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pos purchase return detail', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('posPurchaseReturnDetail', $this->PosPurchaseReturnDetail->read(null, $id));
         $this->set('page_titles', 'PosPurchaseReturnDetail View'); 
	}

	function add() {
    if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			$this->PosPurchaseReturnDetail->create();
			if ($this->PosPurchaseReturnDetail->save($this->request->data)) {
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
      }
		$posPurchaseReturns = $this->PosPurchaseReturnDetail->PosPurchaseReturn->find('list');
		$posProducts = $this->PosPurchaseReturnDetail->PosProduct->find('list');
		$posPurchaseDetails = $this->PosPurchaseReturnDetail->PosPurchaseDetail->find('list');
		$this->set(compact('posPurchaseReturns', 'posProducts', 'posPurchaseDetails'));
	   $this->set('page_titles', 'New PosPurchaseReturnDetail'); 

	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid pos purchase return detail', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->PosPurchaseReturnDetail->save($this->request->data)) {
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
			$this->request->data = $this->PosPurchaseReturnDetail->read(null, $id);
		}
		$posPurchaseReturns = $this->PosPurchaseReturnDetail->PosPurchaseReturn->find('list');
		$posProducts = $this->PosPurchaseReturnDetail->PosProduct->find('list');
		$posPurchaseDetails = $this->PosPurchaseReturnDetail->PosPurchaseDetail->find('list');
		$this->set(compact('posPurchaseReturns', 'posProducts', 'posPurchaseDetails'));
     $this->set('page_titles', 'Update PosPurchaseReturnDetail'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pos purchase return detail', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PosPurchaseReturnDetail->delete($id)) {
			$this->Session->setFlash(__('Pos purchase return detail deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pos purchase return detail was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}}
