<?php
App::uses('AppController', 'Controller');
/**
 * ToolsMenus Controller
 *
 * @property ToolsMenu $ToolsMenu
 * @property PaginatorComponent $Paginator
 */
class ToolsMenusController extends AppController {

/**
 * Components
 *
 * @var array
 */
	var $components = array( 'Paginator','ControllerList','RequestHandler', 'Filter');
	var $helpers = array('Html', 'Form' , 'Time', 'Text' );

	function filtercondition($data=null)
	 {
		 $conditionarray = '';
		 $conditionarray .= $this->Filter->gfilter($data,'ToolsMenu');
		 return $conditionarray;	
	 }
    

	function index($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('ToolsMenuSearch');
            $this->Session->write( 'ToolsMenuSearch', $this->request->data );
        }
         if( $this->Session->check( 'ToolsMenuSearch' ) ){
              $this->request->data = $this->Session->read( 'ToolsMenuSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ToolsMenuSearch' );
			$this->ToolsMenu->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('ToolsMenu.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'ToolsMenu'),
					'order' =>$this->Filter->sortoption($this->request->data,  'ToolsMenu'),
        );
     
		$this->ToolsMenu->recursive = 0;
		$this->set('toolsMenus', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'ToolsMenu List'); 
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid tools menu', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('toolsMenu', $this->ToolsMenu->read(null, $id));
         $this->set('page_titles', 'ToolsMenu View'); 
	}

	function add() {
     if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			$this->ToolsMenu->create();
			if ($this->ToolsMenu->save($this->request->data)) {
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
      }
	   $this->set('page_titles', 'New ToolsMenu'); 
	   $this->set('controllers',$this->ControllerList->getcontrollerlist());
 	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid tools menu', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->ToolsMenu->save($this->request->data)) {
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
			$this->request->data = $this->ToolsMenu->read(null, $id);
		}
	   	$this->set('page_titles', 'Update ToolsMenu'); 
		$this->set('controllers',$this->ControllerList->getcontrollerlist());
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for tools menu', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ToolsMenu->delete($id)) {
			$this->Session->setFlash(__('Tools menu deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Tools menu was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}}
