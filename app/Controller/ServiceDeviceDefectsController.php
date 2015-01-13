<?php
App::uses('AppController', 'Controller');
/**
 * ServiceDeviceDefects Controller
 *
 * @property ServiceDeviceDefect $ServiceDeviceDefect
 * @property PaginatorComponent $Paginator
 */
class ServiceDeviceDefectsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

function filtercondition($data=null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'ServiceDeviceDefect');
 		return $conditionarray;	
	}
    

	function index($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('ServiceDeviceDefectSearch');
            $this->Session->write( 'ServiceDeviceDefectSearch', $this->request->data );
        }
         if( $this->Session->check( 'ServiceDeviceDefectSearch' ) ){
              $this->request->data = $this->Session->read( 'ServiceDeviceDefectSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ServiceDeviceDefectSearch' );
			$this->ServiceDeviceDefect->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('ServiceDeviceDefect.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'ServiceDeviceDefect'),
					'order' =>$this->Filter->sortoption($this->request->data,  'ServiceDeviceDefect'),
        		);

    
		$this->ServiceDeviceDefect->recursive = 0;
		$this->set('serviceDeviceDefects', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'Service Device Defect List'); 
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid service device defect', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('serviceDeviceDefect', $this->ServiceDeviceDefect->read(null, $id));
         $this->set('page_titles', 'Service Device Defect View'); 
	}

	function add() {
    if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			$this->ServiceDeviceDefect->create();
			if ($this->ServiceDeviceDefect->save($this->request->data)) {
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
      }
		$serviceDeviceInfos = $this->ServiceDeviceDefect->ServiceDeviceInfo->find('list');
		$serviceDefects = $this->ServiceDeviceDefect->ServiceDefect->find('list');
		$this->set(compact('serviceDeviceInfos', 'serviceDefects'));
	   $this->set('page_titles', 'New ServiceDeviceDefect'); 

	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid service device defect', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->ServiceDeviceDefect->save($this->request->data)) {
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
			$this->request->data = $this->ServiceDeviceDefect->read(null, $id);
		}
		$serviceDeviceInfos = $this->ServiceDeviceDefect->ServiceDeviceInfo->find('list');
		$serviceDefects = $this->ServiceDeviceDefect->ServiceDefect->find('list');
		$this->set(compact('serviceDeviceInfos', 'serviceDefects'));
     $this->set('page_titles', 'Update ServiceDeviceDefect'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for service device defect', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ServiceDeviceDefect->delete($id)) {
			$this->Session->setFlash(__('Service device defect deleted','multidelete'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Service device defect was not deleted', 'warnning_message'));
		$this->redirect(array('action' => 'index'));
	}}
