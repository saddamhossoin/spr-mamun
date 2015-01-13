<?php
App::uses('AppController', 'Controller');
/**
 * DeviceCheckLists Controller
 *
 * @property DeviceCheckList $DeviceCheckList
 * @property PaginatorComponent $Paginator
 */
class DeviceCheckListsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

function filtercondition($data=null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'DeviceCheckList');
 			 
			 if(!empty($this->request->data['DeviceCheckList']['name']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
					$conditionarray .= 'DeviceCheckList.name like \'%'.$this->request->data['DeviceCheckList']['name']."%'";		
 			 }
			 
			 
			if(!empty($this->request->data['DeviceCheckList']['active']))
			{
				if(!empty($conditionarray))
				{
					$conditionarray .= " AND ";
				}
					$conditionarray .= 'DeviceCheckList.active ='.$this->request->data['DeviceCheckList']['active'];	
		 }
		// pr($conditionarray);
			 
 		return $conditionarray;	
	}
    

	function index($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('DeviceCheckListSearch');
            $this->Session->write( 'DeviceCheckListSearch', $this->request->data );
        }
         if( $this->Session->check( 'DeviceCheckListSearch' ) ){
              $this->request->data = $this->Session->read( 'DeviceCheckListSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'DeviceCheckListSearch' );
			$this->DeviceCheckList->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('DeviceCheckList.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'DeviceCheckList'),
					'order' =>$this->Filter->sortoption($this->request->data,  'DeviceCheckList'),
        		);

    
		$this->DeviceCheckList->recursive = 0;
		$this->set('deviceCheckLists', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'Device Check List'); 
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid device check list', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('deviceCheckList', $this->DeviceCheckList->read(null, $id));
         $this->set('page_titles', 'DeviceCheckList View'); 
	}

	function add() {
    if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			$this->DeviceCheckList->create();
			if ($this->DeviceCheckList->save($this->request->data)) {
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
      }
	   $this->set('page_titles', 'New DeviceCheckList'); 

	}
	
	
	function checklist( $serviceId = null) {
		if (!$serviceId && empty($this->request->data)) {
			
		}
		
	  $this->loadModel('ServiceDeviceInfo');
   
    // if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
 			$this->ServiceDeviceInfo->create();
			    $this->request->data['ServiceDeviceInfo']['status']=11;
				$dataarray = array();
				  foreach($this->request->data['DeviceCheckList'] as $key => $complete_check_lists){
					  foreach($complete_check_lists as $txtkey => $val){
						  if($val == 1){
							  $dataarray[$key][$txtkey] = $val;
					  	 }
					  }
					}
				
				$this->request->data['ServiceDeviceInfo']['checklist'] =  serialize($dataarray);	
			 
			if ($this->ServiceDeviceInfo->save( $this->request->data['ServiceDeviceInfo'])) {
			
			if(!empty($this->request->data['ServiceDeviceInfo']['note'])){
			
				$this->request->data['AssesmentApproveNote']['user_id'] = $this->Auth->user('id');
				$this->request->data['AssesmentApproveNote']['notes'] =$this->request->data['ServiceDeviceInfo']['note'];
				$this->request->data['AssesmentApproveNote']['service_device_info_id'] =$this->request->data['ServiceDeviceInfo']['id'];
				$this->request->data['AssesmentApproveNote']['stage_des'] = 'Tech Check';
				$this->request->data['AssesmentApproveNote']['is_checklist'] =1;
				
					$this->loadModel('AssesmentApproveNote');
					//pr($this->request->data['AssesmentApproveNote']);
					$this->AssesmentApproveNote->create();
					if ($this->AssesmentApproveNote->save($this->request->data['AssesmentApproveNote'])) {
						echo "1";
					}else {
						echo "0";
					}
				}else{
				echo '10';
				}
			}else{
					echo '0';
				}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}else{
			 $device_check_lists = $this->DeviceCheckList->find('all',array( 'conditions'=>array('DeviceCheckList.active'=>1)));
	 		 $this->set('device_check_lists',$device_check_lists);
			 $this->set('ids',$serviceId);
			 
			 
			 
			 $this->loadModel('ServiceInvoice');
			  $this->ServiceInvoice->unbindModelAll();
			   $this->loadModel('ServiceDeviceAcessory');
			  $this->ServiceDeviceAcessory->unbindModelAll();
			   $this->loadModel('ServiceDeviceDefect');
			  $this->ServiceDeviceDefect->unbindModelAll();
			  
			  $this->loadModel('ServiceAcessory');
			$this->set('ServiceDeviceAcessories',$this->ServiceAcessory->find('list'));
			$this->loadModel('ServiceDefect');
			$this->set('ServiceDeviceDefects',$this->ServiceDefect->find('list'));
			  
			  $this->ServiceDeviceInfo->recursive =2;
 	        $this->set('serviceDeviceInfo',$this->ServiceDeviceInfo->find('first',array('conditions'=>array('ServiceDeviceInfo.id'=>$serviceId))));
	
		}
    //  }
	  
	   $this->set('page_titles', 'New DeviceCheck List'); 

	}
	
	function test_assign_checklist( $serviceId = null) {
		if (!$serviceId && empty($this->request->data)) {
				echo "Wrong Service id.";
		}
		
	  $this->loadModel('ServiceDeviceInfo');
   
     if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			
 			$this->ServiceDeviceInfo->create();
				$dataarray = array();
				  foreach($this->request->data['DeviceCheckList'] as $key => $complete_check_lists){
					  foreach($complete_check_lists as $txtkey => $val){
						  if($val == 1){
							  $dataarray[$key][$txtkey] = $val;
					  	 }
					  }
					}
 				$this->request->data['ServiceDeviceInfo']['test_checklist'] =  serialize($dataarray);	
 			if ($this->ServiceDeviceInfo->save($this->request->data['ServiceDeviceInfo'])) {
			 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}else{
 			 $this->set('ids',$serviceId);
  		  	$checklist_names = $this->DeviceCheckList->find('list',array('fields'=>array('id','name'),'conditions'=>array('DeviceCheckList.active'=>1)));
			
			
			
			
			
 		  $this->ServiceDeviceInfo->unbindModelAll();
 		  $this->set('checklist_names',$checklist_names);
		  
		   $ServiceDeviceCheckdata = $this->ServiceDeviceInfo->find('first',array('fields'=>array('id','checklist','test_checklist'),'conditions'=>array('ServiceDeviceInfo.id'=>$serviceId)));
		   
		  $this->set('ServiceDeviceCheckdata',unserialize($ServiceDeviceCheckdata['ServiceDeviceInfo']['checklist']));
		  $this->set('ServiceDeviceCheckdatatest',unserialize($ServiceDeviceCheckdata['ServiceDeviceInfo']['test_checklist']));
 	
		 }
      }
	  
	   $device_check_lists = $this->DeviceCheckList->find('all',array( 'conditions'=>array('DeviceCheckList.active'=>1)));
	   $this->set('device_check_lists',$device_check_lists);
	  
	   $this->set('page_titles', 'New Test Check List'); 

	}
	
	
	
	function comparigm_checklist( $serviceId = null) {
		if (!$serviceId && empty($this->request->data)) {
			 die();
		}
		
	  $this->loadModel('ServiceDeviceInfo');
   
     if ($this->RequestHandler->isAjax()) {	
		
 			 $this->set('ids',$serviceId);
  		  	$checklist_names = $this->DeviceCheckList->find('list',array('fields'=>array('id','name'),'conditions'=>array('DeviceCheckList.active'=>1)));
			
 		  $this->ServiceDeviceInfo->unbindModelAll();
 		  $this->set('checklist_names',$checklist_names);
		  
		   $ServiceDeviceCheckdata = $this->ServiceDeviceInfo->find('first',array('fields'=>array('id','checklist','test_checklist'),'conditions'=>array('ServiceDeviceInfo.id'=>$serviceId)));
		   
		  $this->set('ServiceDeviceCheckdata',unserialize($ServiceDeviceCheckdata['ServiceDeviceInfo']['checklist']));
		  $this->set('ServiceDeviceCheckdatatest',unserialize($ServiceDeviceCheckdata['ServiceDeviceInfo']['test_checklist']));
		   $device_check_lists = $this->DeviceCheckList->find('all',array( 'conditions'=>array('DeviceCheckList.active'=>1)));
		   $this->set('device_check_lists',$device_check_lists);
	   
	      }
	  
	   $this->set('page_titles', 'New Test Check List'); 

	}




	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid device check list', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->DeviceCheckList->save($this->request->data)) {
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
			$this->request->data = $this->DeviceCheckList->read(null, $id);
		}
     $this->set('page_titles', 'Update DeviceCheckList'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for device check list', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->DeviceCheckList->delete($id)) {
			$this->Session->setFlash(__('Device check list deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Device check list was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}}
