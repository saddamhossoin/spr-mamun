<?php
App::uses('AppController', 'Controller');
/**
 * ServiceDeviceAcessories Controller
 *
 * @property ServiceDeviceAcessory $ServiceDeviceAcessory
 * @property PaginatorComponent $Paginator
 */
class ServiceDeviceAcessoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

function filtercondition($data=null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'ServiceDeviceAcessory');
 		return $conditionarray;	
	}
    

	function index($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('ServiceDeviceAcessorySearch');
            $this->Session->write( 'ServiceDeviceAcessorySearch', $this->request->data );
        }
         if( $this->Session->check( 'ServiceDeviceAcessorySearch' ) ){
              $this->request->data = $this->Session->read( 'ServiceDeviceAcessorySearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ServiceDeviceAcessorySearch' );
			$this->ServiceDeviceAcessory->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('ServiceDeviceAcessory.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'ServiceDeviceAcessory'),
					'order' =>$this->Filter->sortoption($this->request->data,  'ServiceDeviceAcessory'),
        		);

    
		$this->ServiceDeviceAcessory->recursive = 0;
		$this->set('serviceDeviceAcessories', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'ServiceDeviceAcessory List'); 
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid service device acessory', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('serviceDeviceAcessory', $this->ServiceDeviceAcessory->read(null, $id));
         $this->set('page_titles', 'ServiceDeviceAcessory View'); 
	}

	function add() {
    if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			$this->ServiceDeviceAcessory->create();
			if ($this->ServiceDeviceAcessory->save($this->request->data)) {
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
      }
		$serviceDeviceInfos = $this->ServiceDeviceAcessory->ServiceDeviceInfo->find('list');
		$serviceAcessories = $this->ServiceDeviceAcessory->ServiceAcessory->find('list');
		$this->set(compact('serviceDeviceInfos', 'serviceAcessories'));
	   $this->set('page_titles', 'New ServiceDeviceAcessory'); 

	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid service device acessory', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->ServiceDeviceAcessory->save($this->request->data)) {
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
			$this->request->data = $this->ServiceDeviceAcessory->read(null, $id);
		}
		$serviceDeviceInfos = $this->ServiceDeviceAcessory->ServiceDeviceInfo->find('list');
		$serviceAcessories = $this->ServiceDeviceAcessory->ServiceAcessory->find('list');
		$this->set(compact('serviceDeviceInfos', 'serviceAcessories'));
     $this->set('page_titles', 'Update ServiceDeviceAcessory'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for service device acessory', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ServiceDeviceAcessory->delete($id)) {
			$this->Session->setFlash(__('Service device acessory deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Service device acessory was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}}
