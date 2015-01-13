<?php
App::uses('AppController', 'Controller');
/**
 * PosProductColors Controller
 *
 * @property PosProductColor $PosProductColor
 * @property PaginatorComponent $Paginator
 */
class PosProductColorsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

function filtercondition($data=null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'PosProductColor');
 		return $conditionarray;	
	}
    

	function index($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('PosProductColorSearch');
            $this->Session->write( 'PosProductColorSearch', $this->request->data );
        }
         if( $this->Session->check( 'PosProductColorSearch' ) ){
              $this->request->data = $this->Session->read( 'PosProductColorSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'PosProductColorSearch' );
			$this->PosProductColor->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('PosProductColor.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'PosProductColor'),
					'order' =>$this->Filter->sortoption($this->request->data,  'PosProductColor'),
        		);

    
		$this->PosProductColor->recursive = 0;
		$this->set('posProductColors', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'PosProductColor List'); 
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pos product color', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('posProductColor', $this->PosProductColor->read(null, $id));
         $this->set('page_titles', 'PosProductColor View'); 
	}

	function add() {
    if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			$this->PosProductColor->create();
			if ($this->PosProductColor->save($this->request->data)) {
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
      }
		$posProducts = $this->PosProductColor->PosProduct->find('list');
		$colors = $this->PosProductColor->Color->find('list');
		$this->set(compact('posProducts', 'colors'));
	   $this->set('page_titles', 'New PosProductColor'); 

	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid pos product color', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->PosProductColor->save($this->request->data)) {
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
			$this->request->data = $this->PosProductColor->read(null, $id);
		}
		$posProducts = $this->PosProductColor->PosProduct->find('list');
		$colors = $this->PosProductColor->Color->find('list');
		$this->set(compact('posProducts', 'colors'));
     $this->set('page_titles', 'Update PosProductColor'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pos product color', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PosProductColor->delete($id)) {
			$this->Session->setFlash(__('Pos product color deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pos product color was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}}
