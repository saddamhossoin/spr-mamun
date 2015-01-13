<?php
App::uses('AppController', 'Controller');
/**
 * PosSaleReturnDetails Controller
 *
 * @property PosSaleReturnDetail $PosSaleReturnDetail
 * @property PaginatorComponent $Paginator
 */
class PosSaleReturnDetailsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

function filtercondition($data=null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'PosSaleReturnDetail');
 		return $conditionarray;	
	}
    

	function index($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('PosSaleReturnDetailSearch');
            $this->Session->write( 'PosSaleReturnDetailSearch', $this->request->data );
        }
         if( $this->Session->check( 'PosSaleReturnDetailSearch' ) ){
              $this->request->data = $this->Session->read( 'PosSaleReturnDetailSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'PosSaleReturnDetailSearch' );
			$this->PosSaleReturnDetail->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('PosSaleReturnDetail.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'PosSaleReturnDetail'),
					'order' =>$this->Filter->sortoption($this->request->data,  'PosSaleReturnDetail'),
        		);

    
		$this->PosSaleReturnDetail->recursive = 0;
		$this->set('posSaleReturnDetails', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'PosSaleReturnDetail List'); 
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pos sale return detail', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('posSaleReturnDetail', $this->PosSaleReturnDetail->read(null, $id));
         $this->set('page_titles', 'PosSaleReturnDetail View'); 
	}

	function add() {
    if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			$this->PosSaleReturnDetail->create();
			if ($this->PosSaleReturnDetail->save($this->request->data)) {
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
      }
		$posSaleReturns = $this->PosSaleReturnDetail->PosSaleReturn->find('list');
		$posProducts = $this->PosSaleReturnDetail->PosProduct->find('list');
		$posSaleDetails = $this->PosSaleReturnDetail->PosSaleDetail->find('list');
		$this->set(compact('posSaleReturns', 'posProducts', 'posSaleDetails'));
	   $this->set('page_titles', 'New PosSaleReturnDetail'); 

	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid pos sale return detail', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->PosSaleReturnDetail->save($this->request->data)) {
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
			$this->request->data = $this->PosSaleReturnDetail->read(null, $id);
		}
		$posSaleReturns = $this->PosSaleReturnDetail->PosSaleReturn->find('list');
		$posProducts = $this->PosSaleReturnDetail->PosProduct->find('list');
		$posSaleDetails = $this->PosSaleReturnDetail->PosSaleDetail->find('list');
		$this->set(compact('posSaleReturns', 'posProducts', 'posSaleDetails'));
     $this->set('page_titles', 'Update PosSaleReturnDetail'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pos sale return detail', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PosSaleReturnDetail->delete($id)) {
			$this->Session->setFlash(__('Pos sale return detail deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pos sale return detail was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}}
