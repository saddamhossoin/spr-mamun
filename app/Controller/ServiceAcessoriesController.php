<?php
App::uses('AppController', 'Controller');
/**
 * ServiceAcessories Controller
 *
 * @property ServiceAcessory $ServiceAcessory
 * @property PaginatorComponent $Paginator
 */
class ServiceAcessoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

function filtercondition($data=null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'ServiceAcessory');
 		return $conditionarray;	
	}
    
	function addDeviceInfo(){
		 
 	}
	
	function parentServiceAccessoryCondition( $data = null)
		 {
 			 $conditionarray = '';
			   if(!empty($this->request->data['ServiceAcessory']['name']))
				{
 					if(!empty($conditionarray)){$conditionarray .= " AND ";}
					$conditionarray .= 'ServiceAcessory.name like \'%'.$this->request->data['ServiceAcessory']['name']."%'";		
 			 }
  		return $conditionarray;	
	}
	function addDeviceInfoList( $yes = null ){
		
			if( !empty($this->request->data) ){
			 
            $this->Session->delete('ServiceAcessorySearch1');
            $this->Session->write( 'ServiceAcessorySearch1', $this->request->data );
        }
         if( $this->Session->check( 'ServiceAcessorySearch1' ) ){
              $this->request->data = $this->Session->read( 'ServiceAcessorySearch1' );
           }
 		    $this->paginate  = array(
    	        	'conditions' =>  array($this->parentServiceAccessoryCondition($this->request->data),' ServiceAcessory.status = 1' ),);
				
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ServiceAcessorySearch1' );
			$this->ServiceAcessory->recursive = -1;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('ServiceAcessory.name'=>'asc'),
 				'conditions'=>array("ServiceAcessory.status" => 1),
 			);
 			$this->request->data='';
	   }
	   
  		$this->set('serviceAcessories', $this->paginate());
	}

	function index($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('ServiceAcessorySearch');
            $this->Session->write( 'ServiceAcessorySearch', $this->request->data );
        }
         if( $this->Session->check( 'ServiceAcessorySearch' ) ){
              $this->request->data = $this->Session->read( 'ServiceAcessorySearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ServiceAcessorySearch' );
			$this->ServiceAcessory->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('ServiceAcessory.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'ServiceAcessory'),
					'order' =>$this->Filter->sortoption($this->request->data,  'ServiceAcessory'),
        		);

    
		$this->ServiceAcessory->recursive = 0;
		$this->set('serviceAcessories', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'Service Acessory List'); 
	}

	function view($id = null) {
		
		 $this->loadModel('ServiceDeviceAcessory');
		 
		if (!$id) {
			$this->Session->setFlash(__('Invalid service acessory', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('serviceAcessory', $this->ServiceAcessory->read(null, $id));
		
		
		
		 
		 //=================ServiceAcessory Wishe device show======================//
		
		  $this->ServiceDeviceAcessory->ServiceDeviceInfo->unbindModel(array('belongsTo'=>array('User'),'hasOne'=>array('ServiceInvoice','Assesment'),'hasMany'=>array('ServiceDeviceAcessory','ServiceDeviceDefect')));
		  
		   $this->ServiceDeviceAcessory->unbindModel(array('belongsTo'=>array('ServiceAcessory')));
		   
		  $this->ServiceDeviceAcessory->ServiceDeviceInfo->ServiceDevice->unbindModel(array('hasMany'=>array('ServiceDeviceInfo')));
		
		
		 $this->ServiceDeviceAcessory->recursive =3;
		 $acessory_devices = $this->ServiceDeviceAcessory->find('all',array('conditions'=>array('ServiceDeviceAcessory.service_acessory_id'=>$id)));
		
		 $this->set('acessory_devices',$acessory_devices);
		 
		 
		 //=================ServiceAcessory Wishe device show======================//
		
		
         $this->set('page_titles', 'ServiceAcessory View'); 
	}
	
	function addAcessories() {
    if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			$this->ServiceAcessory->create();
			if ($this->ServiceAcessory->save($this->request->data)) {
				  echo  $this->ServiceAcessory->getLastInsertId();
			} else {
				 echo "0";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
      }
 	}

	function add() {
    if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			$this->ServiceAcessory->create();
			if ($this->ServiceAcessory->save($this->request->data)) {
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
      }
	   $this->set('page_titles', 'New ServiceAcessory'); 

	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid service acessory', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->ServiceAcessory->save($this->request->data)) {
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
			$this->request->data = $this->ServiceAcessory->read(null, $id);
		}
     $this->set('page_titles', 'Update ServiceAcessory'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for service acessory', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ServiceAcessory->delete($id)) {
			$this->Session->setFlash(__('Service acessory deleted', true),'success_message');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Service acessory was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}}
