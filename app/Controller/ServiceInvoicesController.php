<?php
App::uses('AppController', 'Controller');
/**
 * ServiceInvoices Controller
 *
 * @property ServiceInvoice $ServiceInvoice
 * @property PaginatorComponent $Paginator
 */
class ServiceInvoicesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

function filtercondition($data=null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'ServiceInvoice');
 		return $conditionarray;	
	}
    

	function index($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('ServiceInvoiceSearch');
            $this->Session->write( 'ServiceInvoiceSearch', $this->request->data );
        }
         if( $this->Session->check( 'ServiceInvoiceSearch' ) ){
              $this->request->data = $this->Session->read( 'ServiceInvoiceSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ServiceInvoiceSearch' );
			$this->ServiceInvoice->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('ServiceInvoice.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'ServiceInvoice'),
					'order' =>$this->Filter->sortoption($this->request->data,  'ServiceInvoice'),
        		);

    
		$this->ServiceInvoice->recursive = 0;
		$this->set('serviceInvoices', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'ServiceInvoice List'); 
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid service invoice', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('serviceInvoice', $this->ServiceInvoice->read(null, $id));
         $this->set('page_titles', 'ServiceInvoice View'); 
	}

	function add( ) {
	
    if ($this->RequestHandler->isAjax()) {	
			// pr($this->request->data);die();
		if (!empty($this->request->data)) {
			 
			if(empty($this->request->data['ServiceInvoice']['id'])){
				$this->ServiceInvoice->create();
			}
			if ($this->ServiceInvoice->save($this->request->data['ServiceInvoice'])) {
			 	
				 
				 	
		     //=============service device info  status update=============//
		    $this->loadModel('ServiceDeviceInfo');
			$this->ServiceDeviceInfo->updateAll(array('ServiceDeviceInfo.status' =>2),array('ServiceDeviceInfo.id'=>$this->request->data['ServiceInvoice']['service_device_info_id']));
			//=============service device info  status update=============//
			 echo $this->request->data['ServiceInvoice']['service_device_info_id'];
			 
			 	
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
	 	
      }
		$serviceDeviceInfos = $this->ServiceInvoice->ServiceDeviceInfo->find('list');
		$this->set(compact('serviceDeviceInfos'));
	    $this->set('page_titles', 'New ServiceInvoice'); 

	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid service invoice', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->ServiceInvoice->save($this->request->data)) {
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
			$this->request->data = $this->ServiceInvoice->read(null, $id);
		}
		$serviceDeviceInfos = $this->ServiceInvoice->ServiceDeviceInfo->find('list');
		$this->set(compact('serviceDeviceInfos'));
     $this->set('page_titles', 'Update ServiceInvoice'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for service invoice', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ServiceInvoice->delete($id)) {
			$this->Session->setFlash(__('Service invoice deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Service invoice was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}}
