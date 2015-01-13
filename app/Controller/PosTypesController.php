<?php
App::uses('AppController', 'Controller');
/**
 * PosTypes Controller
 *
 * @property PosType $PosType
 * @property PaginatorComponent $Paginator
 */

class PosTypesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('RequestHandler', 'Filter', 'ImageUploader');
	
	function getTypes(){
	
		$posTypes = $this->PosType->find('all',array('fields'=>array('id','name','slug'),'order'=>'name asc'));
		return $posTypes;
		
	}

function filtercondition($data=null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'PosType');
 		return $conditionarray;	
	}
    

	function index($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('PosTypeSearch');
            $this->Session->write( 'PosTypeSearch', $this->request->data );
        }
         if( $this->Session->check( 'PosTypeSearch' ) ){
              $this->request->data = $this->Session->read( 'PosTypeSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'PosTypeSearch' );
			$this->PosType->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('PosType.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'PosType'),
					'order' =>$this->Filter->sortoption($this->request->data,  'PosType'),
        		);

    
		$this->PosType->recursive = 0;
		$this->set('posTypes', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'PosType List'); 
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pos type', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('posType', $this->PosType->read(null, $id));
         $this->set('page_titles', 'PosType View'); 
	}

	function add() {
    if ($this->RequestHandler->isAjax()) {
		 App::uses('Sanitize', 'Utility');
		$output= array();  
		$fileDestination = 'img/PosTypes';
		$options = array();    
		if(!empty($this->request->data['PosType']['image']['name'])){
			try{
				$output = $this->ImageUploader->upload($this->request->data['PosType']['image'],$fileDestination,$options);     			
			}
			catch(Exception $e)
			{ 
				$output = array('bool'=>FALSE,'error_message'=>$e->getMessage());
			} 
			$this->request->data['PosType']['image'] = $output['file_path'];
		}
		
		else{
			unset($this->request->data['PosType']['image']);
			} 
							
		if (!empty($this->request->data)) {
			//print_r($this->request->data);die();
			
			 //========================= Create Slug =====================//
			if(empty($this->request->data['PosType']['slug'])){
				$this->request->data['PosType']['slug'] = $this->PosType->createSlug($this->request->data['PosType']['name']);
			}
			//========================= End Create Slug =================//
			
			$this->PosType->create();
			if ($this->PosType->save($this->request->data)) {
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
      }
	   $this->set('page_titles', 'New PosType'); 

	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid pos type', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		  App::uses('Sanitize', 'Utility');
		$output= array();  
		$fileDestination = 'img/PosTypes';
		$options = array();    
		if(!empty($this->request->data['PosType']['image']['name'])){
			try{
				$output = $this->ImageUploader->upload($this->request->data['PosType']['image'],$fileDestination,$options);     			
			}
			catch(Exception $e)
			{ 
				$output = array('bool'=>FALSE,'error_message'=>$e->getMessage());
			} 
			$this->request->data['PosType']['image'] = $output['file_path'];
		}
		
		else{
			$this->request->data['PosType']['image'] ='';
			} 
			
			
		if (!empty($this->request->data)) {
			
						
			//========================= Create Slug =====================//
			if(empty($this->request->data['PosType']['slug'])){
				$this->request->data['PosType']['slug'] = $this->PosType->createSlug($this->request->data['PosType']['name']);
			}
			//========================= End Create Slug =================//
			
 			if ($this->PosType->save($this->request->data)) {
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
			$this->request->data = $this->PosType->read(null, $id);
		}
     $this->set('page_titles', 'Update PosType'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pos type', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PosType->delete($id)) {
			$this->Session->setFlash(__('Pos type deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pos type was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	 function slug_edit(){
		$this->PosType->recursive=0;
		$prs=$this->PosType->find('all',array('fields'=>array('id','name')));
		//pr($prs);
		foreach($prs as $pr){
		//========================= Create Slug =====================
		 $this->request->data['PosType']['slug'] = $this->PosType->createSlug($pr['PosType']['name'],$pr['PosType']['id']);
		//========================= End Create Slug =================
		//pr($this->request->data['PosProduct']['slug']); 
	    //pr($this->request->data); die();
 			  $this->request->data['PosType']['id']=$pr['PosType']['id'];
			 $this->PosType->save($this->request->data['PosType']);
			
	        }
	}
	
	
	}
