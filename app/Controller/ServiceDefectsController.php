<?php
App::uses('AppController', 'Controller');
/**
 * ServiceDefects Controller
 *
 * @property ServiceDefect $ServiceDefect
 * @property PaginatorComponent $Paginator
 */
class ServiceDefectsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	
	
	function parentServiceDefectCondition( $data = null)
		 {
 			 $conditionarray = '';
			   if(!empty($this->request->data['ServiceDefect']['name']))
				{
 					if(!empty($conditionarray)){$conditionarray .= " AND ";}
					$conditionarray .= 'ServiceDefect.name like \'%'.$this->request->data['ServiceDefect']['name']."%'";		
 			 }
  		return $conditionarray;	
	}
	

	function parentServiceDefectList( $yes = null  ){
 	
		if( !empty($this->request->data) ){
			 
            $this->Session->delete('ServiceDefectSearch');
            $this->Session->write( 'ServiceDefectSearch', $this->request->data );
        }
         if( $this->Session->check( 'ServiceDefectSearch' ) ){
              $this->request->data = $this->Session->read( 'ServiceDefectSearch' );
           }
 		    $this->paginate  = array(
    	        	'conditions' =>  array($this->parentServiceDefectCondition($this->request->data),' ServiceDefect.status = 1' ),);
				
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ServiceDefectSearch' );
			$this->ServiceDefect->recursive = -1;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('ServiceDefect.name'=>'asc'),
 				'conditions'=>array("ServiceDefect.status" => 1),
 			);
 			$this->request->data='';
	   }
	   
  		$this->set('serviceDefects', $this->paginate());
  	}

		
		

function filtercondition($data=null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'ServiceDefect');
 		return $conditionarray;	
	}
    

	function index($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('ServiceDefectSearch');
            $this->Session->write( 'ServiceDefectSearch', $this->request->data );
        }
         if( $this->Session->check( 'ServiceDefectSearch' ) ){
              $this->request->data = $this->Session->read( 'ServiceDefectSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ServiceDefectSearch' );
			$this->ServiceDefect->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('ServiceDefect.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'ServiceDefect'),
					'order' =>$this->Filter->sortoption($this->request->data,  'ServiceDefect'),
        		);

    
		$this->ServiceDefect->recursive = 0;
		$this->set('serviceDefects', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'Service Defect List'); 
	}

	function view($id = null) {
		 $this->loadModel('ServiceDevice');
		 $this->loadModel('PosPcategory');
		 $this->loadModel('ServiceDeviceDefect');
		 
		

		if (!$id) {
			$this->Session->setFlash(__('Invalid service defect', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('serviceDefect', $this->ServiceDefect->read(null, $id));
		
		
		 //=================Defect Wishe device show======================//
		  $this->ServiceDeviceDefect->ServiceDeviceInfo->unbindModel(array('belongsTo'=>array('User'),'hasOne'=>array('ServiceInvoice','Assesment'),'hasMany'=>array('ServiceDeviceAcessory','ServiceDeviceDefect')));
		  
		   $this->ServiceDeviceDefect->unbindModel(array('belongsTo'=>array('ServiceDefect')));
		   
		  $this->ServiceDeviceDefect->ServiceDeviceInfo->ServiceDevice->unbindModel(array('hasMany'=>array('ServiceDeviceInfo')));
		   
		 $this->ServiceDeviceDefect->recursive =3;
 		 $defect_devices = $this->ServiceDeviceDefect->find('all',array('conditions'=>array('ServiceDeviceDefect.service_defect_id'=>$id))); 
 		 $this->set('defect_devices',$defect_devices);
		 
		 
		 //=================Defect Wishe device show======================//
		 
		
		
         $this->set('page_titles', 'ServiceDefect View'); 
	}

	function add() {
    if ($this->RequestHandler->isAjax()) {	
	
		if (!empty($this->request->data)) {
			$this->ServiceDefect->create();
			if ($this->ServiceDefect->save($this->request->data)) {
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
     }
	   $this->set('page_titles', 'New ServiceDefect'); 

	}
	
	 function adddefectpage() {
		if ($this->RequestHandler->isAjax()) {	
		
			if (!empty($this->request->data)) {
				$this->ServiceDefect->create();
				if ($this->ServiceDefect->save($this->request->data)) {
					 echo  $this->ServiceDefect->getLastInsertId();
				} else {
					 echo "Saved Failed.";
				}
				Configure::write('debug', 0); 
					$this->autoRender = false;
					exit(); 
			}
		 }
		   $this->set('page_titles', 'New ServiceDefect'); 

	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid service defect', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->ServiceDefect->save($this->request->data)) {
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
			$this->request->data = $this->ServiceDefect->read(null, $id);
		}
     $this->set('page_titles', 'Update Service Defect'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for service defect', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ServiceDefect->delete($id)) {
			$this->Session->setFlash(__('Service defect deleted','multidelete'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Service defect was not deleted','warnning_message'));
		$this->redirect(array('action' => 'index'));
	}}
