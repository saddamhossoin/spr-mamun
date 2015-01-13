<?php
App::uses('AppController', 'Controller');
/**
 * ServiceServices Controller
 *
 * @property ServiceService $ServiceService
 * @property PaginatorComponent $Paginator
 */
class ServiceServicesController extends AppController {

/** 
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
 	
	//=============================== Service list for add device ==============
	
	function filtercondition($data=null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'ServiceService');
 			 
			 if(!empty($data['ServiceService']['name']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
					$conditionarray .= 'ServiceService.name like \'%'.$data['ServiceService']['name']."%'";		
		 	 }
	 
	 	return $conditionarray;	
	}
   
    
	function serviceListForAssignDevice( $yes = null , $deviceId = null ) {
    
    	if( ! empty( $this->request->data ) ){
            $this->Session->delete('ServiceServiceDeviceSearch');
            $this->Session->write( 'ServiceServiceDeviceSearch', $this->request->data );
        }
         if( $this->Session->check( 'ServiceServiceDeviceSearch' ) ){
              $this->request->data = $this->Session->read( 'ServiceServiceDeviceSearch' );
           }
	    if($yes == 'yes')
	   		{
				$this->Session->delete( 'ServiceServiceDeviceSearch' );
				$this->ServiceService->recursive = 0;
				$this->paginate  = array(
					'limit' => '1020',
					'order' =>array('ServiceService.name'=>'asc'),
				);
				$this->request->data='';
			}
			
	   	else if($yes != 'yes' && !empty($this->request->data) )
		{
 	  		  $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => '1020',
					'order' =>array('ServiceService.name'=>'asc'),
         		);
	    }
	    
		$this->ServiceService->recursive = 0;

		$this->loadModel('ServiceDevicesService');
		$this->set('deviceservicelists',$this->ServiceDevicesService->find('all',array('fields'=>array('id','service_service_id','service_device_id','price'),'conditions'=>array('service_device_id'=>$deviceId))));
 		$this->set('serviceServices', $this->paginate());
       $this->set('deviceId', $deviceId);
	   
	   $this->layout = 'ajax';
 		 
	}	
	
 	function index($yes = null,$is_report = null) {
    
    	if( ! empty( $this->request->data ) ){
            $this->Session->delete('ServiceServiceSearch');
            $this->Session->write( 'ServiceServiceSearch', $this->request->data );
        }
         if( $this->Session->check( 'ServiceServiceSearch' ) ){
              $this->request->data = $this->Session->read( 'ServiceServiceSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ServiceServiceSearch' );
			$this->ServiceService->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('ServiceDevice.name'=>'asc'),
 			);
			$this->request->data='';
	   }else if($yes != 'yes' && !empty($this->request->data) ){
 	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'ServiceService'),
					'order' =>array('ServiceDevice.name'=>'asc'),
         		);
	   }

	    
		$this->ServiceService->recursive = 0;
		// pr($this->paginate);die();
 		$this->set('serviceServices', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'Service  List');
 		
		if($is_report == 'report')
			{
			$this->layout  = 'wcreport';
			$this->set('reportheading','Service List');
			$this->render('/ServiceServices/indexprint');
			}
		
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid service service', true));
			$this->redirect(array('action' => 'index'));
		}
		
		$this->ServiceService->recursive = 2;
		$this->set('serviceService', $this->ServiceService->find('first',array('conditions'=>array('ServiceService.id'=>$id))));
        $this->set('page_titles', 'ServiceService View'); 
	}
	
	function front_service_view(){
	
		$this->loadModel('ServiceDevice');
		
		  $this->ServiceDevice->unbindModelAll();
		  $this->ServiceDevice->bindModel(  array('hasMany' => array(
                              		'ServiceDevicesService' => array(
									'className' => 'ServiceDevicesService',
									'foreignKey' => 'service_device_id',
                                    'type' => 'INNER'
                                    ) 
                                )
               ) );
			   
	 	$this->ServiceDevice->recursive = 1;
		$service_devices = $this->ServiceDevice->find('all');
		
		$this->loadModel('ServiceService');
		 
		$this->set('servicelists',$this->ServiceService->find('list'));
		
		$this->set('service_devices', $service_devices);
		$this->layout  = 'wpage';
	}
	
	
	
	//======================= Service Name Checkking -------------------------
	 function unique_service( $serviceName=null , $id=null ){
			if(!empty($id)){
					$already_product=$this->ServiceService->find('first',array('fields'=>array('id','name'),'recursive'=>-1,'conditions'=>array('ServiceService.id !='=>$id,'ServiceService.name'=>$serviceName)));
				}
				else{
				  $already_product=$this->ServiceService->find('first',array('fields'=>array('id','name'),'recursive'=>-1,'conditions'=>array('ServiceService.name'=>$serviceName)));
			}
			if(!empty($already_product['ServiceService']['name'])){
				 echo "1";
			}
			else{
				echo "0";
			}
			Configure::write('debug', 0); 
			$this->autoRender = false;
			exit();
		 }
		 
	function add() {
    if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			$this->ServiceService->create();
			if ($this->ServiceService->save($this->request->data)) {
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
      }
 	   $this->set('page_titles', 'New Service'); 

	}

	function edit($id = null) {
		
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid service service', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->ServiceService->save($this->request->data)) {
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
			$this->request->data = $this->ServiceService->read(null, $id);
			$this->loadModel('ServiceDevice');
 		}
     $this->set('page_titles', 'Update ServiceService'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for service service', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ServiceService->delete($id)) {
			$this->Session->setFlash(__('Service service deleted','warnning_message'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Service service was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function getServiceInfo( $id = null){
		$this->loadModel('ServiceDevicesService');
		$this->autoRender = false;
		 
		return $this->ServiceDevicesService->find('first',array('conditions'=>array('ServiceDevicesService.service_service_id'=>$id)));
		Configure::write('debug', 0); 
		exit();
 	}	
}
