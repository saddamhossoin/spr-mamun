<?php
App::uses('AppController', 'Controller');
/**
 * AssesmentApproveNotes Controller
 *
 * @property AssesmentApproveNote $AssesmentApproveNote
 * @property PaginatorComponent $Paginator
 */
class AssesmentApproveNotesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','ImageUploader');

function filtercondition($data=null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'AssesmentApproveNote');
 		return $conditionarray;	
	}
    

	function index($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('AssesmentApproveNoteSearch');
            $this->Session->write( 'AssesmentApproveNoteSearch', $this->request->data );
        }
         if( $this->Session->check( 'AssesmentApproveNoteSearch' ) ){
              $this->request->data = $this->Session->read( 'AssesmentApproveNoteSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'AssesmentApproveNoteSearch' );
			$this->AssesmentApproveNote->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('AssesmentApproveNote.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'AssesmentApproveNote'),
					'order' =>$this->Filter->sortoption($this->request->data,  'AssesmentApproveNote'),
        		);

    
		$this->AssesmentApproveNote->recursive = 0;
		$this->set('assesmentApproveNotes', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'AssesmentApproveNote List'); 
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid assesment approve note', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('assesmentApproveNote', $this->AssesmentApproveNote->read(null, $id));
         $this->set('page_titles', 'AssesmentApproveNote View'); 
	}

	function add( $id = null , $way = null) {
		
    if ($this->RequestHandler->isAjax()) {	
	
	
		if (!empty($this->request->data)) {
			 //pr($this->request->data); die('anwar');
			$this->AssesmentApproveNote->create();
			$this->request->data['AssesmentApproveNote']['stage_des'] = 'Assign Tech';
			if ($this->AssesmentApproveNote->save($this->request->data)) {
				
				
			 //=============service device info  status update=============//
		    $this->loadModel('ServiceDeviceInfo');
			$this->ServiceDeviceInfo->updateAll(array('ServiceDeviceInfo.status' => 4),array('ServiceDeviceInfo.id'=>$this->request->data['AssesmentApproveNote']['service_device_info_id']));
			
			 $this->loadModel('Assesment');
 			$user_info = $this->Assesment->User->find('first',array('fields'=>array('firstname','lastname'),'conditions'=>array('id'=>$this->request->data['AssesmentApproveNote']['user_id']),'recursive'=>-1));
			
 			
 				
		 $this->Assesment->query("Update mayasoftbd_assesments SET tech_id=".$this->request->data['AssesmentApproveNote']['user_id']." , tech_name = '".$user_info['User']['firstname'].' '.$user_info['User']['lastname']."' where service_device_info_id =".$this->request->data['AssesmentApproveNote']['service_device_info_id'] );
			 

			//=============service device info  status update=============//
				 echo $way;
			} else {
				 echo "Saved Failed.";
			}
			
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
				
		}
      }
		
	  
				
		
		
		$this->loadModel('Group');
		$this->loadModel('User');
		
		//=============== Get Tech List ========== 
	 	$this->User->Group->unbindModel(array('hasAndBelongsToMany' => array('Permission')));
		$this->User->recursive = 1;
		$techlists=$this->Group->find('all',array('conditions'=>array('Group.id'=>5)));
		
		$tech_namelist = array();
		foreach($techlists[0]['User'] as $key=>$val){
		 	$tech_namelist[$val['id']] = $val['firstname'];
		}
		$this->set('tech_namelist',$tech_namelist);
		//================== Get Service ID ============
		$this->loadModel('Group');
		
			if(isset($way)){
				$this->set('way', $way);
			}
			else{
				$this->set('way', "no");
			}
		
	  	
		
		$this->set('serviceDeviceInfos' , $id);
		$this->set('page_titles', 'New AssesmentApproveNote'); 

	}
	
	
	function tech_complete_note( $id = null) {
		
		$user_id = $this->Auth->user('id');
		
    if ($this->RequestHandler->isAjax()) {	
	
		if (!empty($this->request->data)) {
			//pr($this->request->data); die('anwar');
			 //============================Assesment image========================================//	
			App::uses('Sanitize', 'Utility');
			$output= array();  
			$fileDestination = 'files/upload/assesmentapproveNote';
			$options = array();    
			if(!empty($this->request->data['AssesmentApproveNote']['screenimage']['name'])){
				try{
					$output = $this->ImageUploader->upload($this->request->data['AssesmentApproveNote']['screenimage'],$fileDestination,$options);     	}
				catch(Exception $e)
				{ 
					$output = array('bool'=>FALSE,'error_message'=>$e->getMessage());
				} 
				$this->request->data['AssesmentApproveNote']['screenimage'] = $output['file_path'];
			}
			
			else{
				$this->request->data['AssesmentApproveNote']['screenimage'] ='';
				}
			 // pr($this->request->data);
		//============================Invoice image=======================================//
			$this->AssesmentApproveNote->create();
			$this->request->data['AssesmentApproveNote']['stage_des'] = 'Tech Working';
			if ($this->AssesmentApproveNote->save($this->request->data)) {
				
			 //=============service device info  status update=============//
		    $this->loadModel('ServiceDeviceInfo');
			$this->ServiceDeviceInfo->updateAll(array('ServiceDeviceInfo.status' => 5),array('ServiceDeviceInfo.id'=>$this->request->data['AssesmentApproveNote']['service_device_info_id']));
			//=============service device info  status update=============//
				 
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
				
		}
      }
		
		//================== Get Service ID ============
	
		$this->set('serviceDeviceInfos' , $id);
		$this->set('user_id' , $user_id);
		$this->set('page_titles', 'New AssesmentApproveNote'); 

	}
	
	
	function tech_checklist( $id = null) {
		
    if ($this->RequestHandler->isAjax()) {	
	
	
		if (!empty($this->request->data)) {
			//pr($this->request->data); die('anwar');
			$this->AssesmentApproveNote->create();
			$this->request->data['AssesmentApproveNote']['stage_des'] = 'Assign Tech';
			if ($this->AssesmentApproveNote->save($this->request->data)) {
				
			 //=============service device info  status update=============//
		    $this->loadModel('ServiceDeviceInfo');
			$this->ServiceDeviceInfo->updateAll(array('ServiceDeviceInfo.status' => 10,'ServiceDeviceInfo.check_tech_id' => $this->request->data['AssesmentApproveNote']['user_id']),array('ServiceDeviceInfo.id'=>$this->request->data['AssesmentApproveNote']['service_device_info_id']));
			//=============service device info  status update=============//
				 
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
				
		}
      }
		
		
		
		$this->loadModel('Group');
		$this->loadModel('User');
		
		//=============== Get Tech List ========== 
	 	$this->User->Group->unbindModel(array('hasAndBelongsToMany' => array('Permission')));
		$this->User->recursive = 1;
		$techlists=$this->Group->find('all',array('conditions'=>array('Group.id'=>5)));
		
		$tech_namelist = array();
		foreach($techlists[0]['User'] as $key=>$val){
		 	$tech_namelist[$val['id']] = $val['firstname'];
		}
		$this->set('tech_namelist',$tech_namelist);
		//================== Get Service ID ============
		$this->loadModel('Group');
	  	
		$this->set('serviceDeviceInfos' , $id);
		$this->set('page_titles', 'New AssesmentApproveNote'); 

	}
	
	




	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid assesment approve note', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->AssesmentApproveNote->save($this->request->data)) {
				echo '1';
			} else {
			    echo '0';	 
			}
             Configure::write('debug', 0); 
			 $this->autoRender = false;
			 exit();
		}
      }
		if (empty($this->request->data)) {
			$this->request->data = $this->AssesmentApproveNote->read(null, $id);
		}
		$this->set('page_titles', 'Update Assesment Approve Note'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for assesment approve note', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->AssesmentApproveNote->delete($id)) {
			$this->Session->setFlash(__('Assesment approve note deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Assesment approve note was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}}
