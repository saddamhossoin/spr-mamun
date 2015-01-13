<?php
App::uses('AppController', 'Controller');
/**
 * ServiceDeviceLogs Controller
 *
 * @property ServiceDeviceLog $ServiceDeviceLog
 * @property PaginatorComponent $Paginator
 */
class ServiceDeviceLogsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

function filtercondition($data=null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'ServiceDeviceLog');
 		return $conditionarray;	
	}
    

	function index($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('ServiceDeviceLogSearch');
            $this->Session->write( 'ServiceDeviceLogSearch', $this->request->data );
        }
         if( $this->Session->check( 'ServiceDeviceLogSearch' ) ){
              $this->request->data = $this->Session->read( 'ServiceDeviceLogSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ServiceDeviceLogSearch' );
			$this->ServiceDeviceLog->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('ServiceDeviceLog.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'ServiceDeviceLog'),
					'order' =>$this->Filter->sortoption($this->request->data,  'ServiceDeviceLog'),
        		);

    
		$this->ServiceDeviceLog->recursive = 0;
		$this->set('serviceDeviceLogs', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'ServiceDeviceLog List'); 
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid service device log', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('serviceDeviceLog', $this->ServiceDeviceLog->read(null, $id));
         $this->set('page_titles', 'ServiceDeviceLog View'); 
	}

	function add() {
    if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			$this->ServiceDeviceLog->create();
			if ($this->ServiceDeviceLog->save($this->request->data)) {
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
      }
	   $this->set('page_titles', 'New ServiceDeviceLog'); 

	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid service device log', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->ServiceDeviceLog->save($this->request->data)) {
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
			$this->request->data = $this->ServiceDeviceLog->read(null, $id);
		}
     $this->set('page_titles', 'Update ServiceDeviceLog'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for service device log', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ServiceDeviceLog->delete($id)) {
			$this->Session->setFlash(__('Service device log deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Service device log was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}}
