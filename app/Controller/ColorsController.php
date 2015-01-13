<?php
App::uses('AppController', 'Controller');
/**
 * Colors Controller
 *
 * @property Color $Color
 * @property PaginatorComponent $Paginator
 */
class ColorsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

function filtercondition($data=null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'Color');
 		return $conditionarray;	
	}
    

	function index($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('ColorSearch');
            $this->Session->write( 'ColorSearch', $this->request->data );
        }
         if( $this->Session->check( 'ColorSearch' ) ){
              $this->request->data = $this->Session->read( 'ColorSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ColorSearch' );
			$this->Color->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('Color.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'Color'),
					'order' =>$this->Filter->sortoption($this->request->data,  'Color'),
        		);

    
		$this->Color->recursive = 0;
		$this->set('colors', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'Color List'); 
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid color', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('color', $this->Color->read(null, $id));
         $this->set('page_titles', 'Color View'); 
	}

	function add() {
    if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			$this->Color->create();
			if ($this->Color->save($this->request->data)) {
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
      }
	   $this->set('page_titles', 'New Color'); 

	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid color', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->Color->save($this->request->data)) {
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
			$this->request->data = $this->Color->read(null, $id);
		}
     $this->set('page_titles', 'Update Color'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for color', true) );
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Color->delete($id)) {
			$this->Session->setFlash(__('Color deleted', true) );
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Color was not deleted', true) );
		$this->redirect(array('action' => 'index'));
	}}
