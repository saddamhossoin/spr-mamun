<?php
App::uses('AppController', 'Controller');
/**
 * AssesmentServices Controller
 *
 * @property AssesmentService $AssesmentService
 * @property PaginatorComponent $Paginator
 */
class AssesmentServicesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	function filtercondition($data=null)
	{
		$conditionarray = '';
		$conditionarray .= $this->Filter->gfilter($data,'AssesmentService');
		return $conditionarray;	
	}
    

	function index($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('AssesmentServiceSearch');
            $this->Session->write( 'AssesmentServiceSearch', $this->request->data );
        }
         if( $this->Session->check( 'AssesmentServiceSearch' ) ){
              $this->request->data = $this->Session->read( 'AssesmentServiceSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'AssesmentServiceSearch' );
			$this->AssesmentService->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('AssesmentService.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'AssesmentService'),
					'order' =>$this->Filter->sortoption($this->request->data,  'AssesmentService'),
        		);

    
		$this->AssesmentService->recursive = 0;
		$this->set('assesmentServices', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'AssesmentService List'); 
	}
	
	function assesmentServiceServiceListfiltercondition( $data = null)
		 {
 			 $conditionarray = '';
			  if(!empty($this->request->data['ServiceService']['name']))
				{
 					if(!empty($conditionarray)){$conditionarray .= " AND ";}
					$conditionarray .= 'ServiceService.name like \'%'.$this->request->data['ServiceService']['name']."%'";		
 			 }
    			 
 		return $conditionarray;	
	}
	
	function assesmentServiceServiceList( $yes = null , $assesment_id = null){
		 
		$this->loadModel('Assesment');
		$this->Assesment->recursive = 0;
		
		$assesment = $this->Assesment->find('first',array('fields'=>array('Assesment.id','ServiceDeviceInfo.service_device_id'),'conditions'=>array('Assesment.id'=>$assesment_id)));
		 
	 
	 	if( !empty($this->request->data) ){
			//pr($this->request->data);die();
            $this->Session->delete('AssesmentServiceServiceSearch');
            $this->Session->write( 'AssesmentServiceServiceSearch', $this->request->data );
        }
	 	if( $this->Session->check( 'AssesmentServiceServiceSearch' ) ){
              $this->request->data = $this->Session->read( 'AssesmentServiceServiceSearch' );
           }
 		 
	 	 		
	  	if($yes == 'yes'){	
			$this->Session->delete('AssesmentServiceServiceSearch');
			$this->AssesmentService->recursive = 0;
			 $this->paginate  = array(
 		 	    'limit' => '1000',
		 		'order' =>array('ServiceService.name'=>'asc'),
   		 	);
			$this->request->data='';
	      }
		  
 	   $this->paginate  = array(
		'limit' => '1000',
		'order' =>array('ServiceService.name'=>'asc'),
		'conditions'=>$this->assesmentServiceServiceListfiltercondition($this->request->data),
	);
	 // pr($this->paginate);die();
	  
	 	$this->loadModel('ServiceService');
		$this->ServiceService->unbindModel(array('hasMany'=>array('ServiceDevicesService'))); 
		
		 $this->ServiceService->bindModel( array('hasOne' =>array(
		'ServiceDevicesService' =>
		   array('className' => 'ServiceDevicesService',
			'foreignKey' => 'service_service_id' ,
			'conditions'=>array(' ServiceDevicesService.service_device_id ='.$assesment['ServiceDeviceInfo']['service_device_id']),
				 
				)
			)
		)); 
		// pr($this->paginate('ServiceService'));die();
 		$this->set('ServiceServices', $this->paginate('ServiceService'));
	   
	    $this->set('alreadyAssesServices',$this->AssesmentService->find('list',array('fields'=>array('id','service_service_id'),'conditions'=>array('assesment_id'=>$assesment_id))));
 
  		$this->set('assesments',$assesment);
	  
	 }

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid assesment service', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('assesmentService', $this->AssesmentService->read(null, $id));
         $this->set('page_titles', 'AssesmentService View'); 
	}

	function add( $assesment_id = null ) {
	
 	 			 
	if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			$this->AssesmentService->create();
			if ($this->AssesmentService->save($this->request->data)) {
				
				$this->layout = 'ajax';
				$save_id = $this->AssesmentService->getLastInsertId();
				$response = array();
				$this->autoRender = false;
				$this->AssesmentService->recursive = 1;
				$response = $this->AssesmentService->find( 'first', array(  'conditions' => array('AssesmentService.id' => $save_id)));
				
				 
				
				echo json_encode($response);
				//pr($response);
				exit();
				
			} else {
				 echo "0";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
      }
 	    $this->set('assesment_id',$assesment_id);
 	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid assesment service', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->AssesmentService->save($this->request->data)) {
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
			$this->request->data = $this->AssesmentService->read(null, $id);
		}
		$assesments = $this->AssesmentService->Assesment->find('list');
		$this->set(compact('assesments'));
     $this->set('page_titles', 'Update AssesmentService'); 
	}

	function delete($id = null) {
		if (!$id) {
			echo '0';
		}
		if ($this->AssesmentService->delete($id)) {
			echo '1';
		}
		 Configure::write('debug', 0); 
		 $this->autoRender = false;
		 exit();
	}}
