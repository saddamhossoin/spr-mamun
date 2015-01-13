<?php
App::uses('AppController', 'Controller');
/**
 * Groups Controller
 *
 * @property Group $Group
 */
class GroupsController extends AppController {

   /**
    * Helpers
    *
    * @var array
    */
   public $helpers = array('Html', 'Form' ,'Js','Time', 'Text');
   
   public function __filtercondition($data=null) {
	 
			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'Group');
			 
			if(empty($this->request->data['Group']['ShowPerPage']))
			{
				$this->request->data['Group']['ShowPerPage']='20';
			}
			else{
				$this->request->data['Group']['ShowPerPage'];
			}
			
 			if(!empty($this->request->data['Group']['name']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
					$conditionarray .= 'Group.name like \'%'.$this->request->data['Group']['name']."%'";		
			 }
		return $conditionarray;	
	}

   /**
    * index method
    *
    * @return void
    */
   public function index($yes = null) {
      if( ! empty( $this->request->data ) ){
         //pr($this->request->data);
         $this->Session->delete('groupSearch');
         $this->Session->write( 'groupSearch', $this->request->data );
      }
      
      if( $this->Session->check( 'groupSearch' ) ){
         $this->request->data = $this->Session->read( 'groupSearch' );
      }
      
      if($yes == 'yes') {
         $this->Session->delete( 'groupSearch' );
         $this->paginate  = array(
 				'limit' => '50',
				'order' =>array('Group.modified'=>'desc'),
         );
         $this->request->data='';
      }
      
	  $this->paginate  = array(
    	        	'conditions' =>  array($this->__filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'Group'),
					'order' =>$this->Filter->sortoption($this->request->data,  'Group'),
					//'group' =>array('company_id'),
        		);
				
	
		//$this->Group->recursive = 0;
		//pr($this->paginate());
		$this->set('groups', $this->paginate());
		$this->set('page_titles','Group List');
      	
		$this->loadModel('User');
		$this->set('userlists',$this->User->find('list',array('fields'=>array('id','name'),'recursive'=>0)));
		$this->set('sortoption',array('name'=>'name'));
	}

   /**
    * view method
    *
    * @param string $id
    * @return void
    */
	public function view($id = null) {
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		$this->set('group', $this->Group->read(null, $id));
	}

   /**
    * add method
    *
    * @return void
    */
	public function add() {
		if ($this->request->is('post')) {
			$this->Group->create();
			if ($this->Group->save($this->request->data)) {
				echo 'Success :: Add new group `'. $this->request->data['Group']['name'].'`'; 
			} else {
				
			 if($this->Group->validates()) {
                  $this->autoRender = false;
              }
              else {
                  $errorArray = $this->validateErrors($this->Group);
 					 
					if(isset( $errorArray)){
						echo "<div class='modelerror'><ul class='modelerror_content'><li>". $errorArray['name']."</li></ul></div>";
				 }
              }
  			
			}
			Configure::write('debug', 0); 
			$this->autoRender = false;
			exit();  
		}
		$Permissions = $this->Group->Permission->find('list');
		$users = $this->Group->User->find('list');
		$this->set(compact('Permissions', 'users'));
		$this->set('page_titles','Group Add');
	}

   /**
    * edit method
    *
    * @param string $id
    * @return void
    */
	public function edit($id = null) {
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Group->save($this->request->data)) {
				$this->setFlashMessage(__('The group has been saved'), 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->setFlashMessage(__('The group could not be saved. Please, try again.'), 'error');
			}
		} else {
			$this->request->data = $this->Group->read(null, $id);
		}
		$Permissions = $this->Group->Permission->find('list');
		$users = $this->Group->User->find('list');
		$this->set(compact('Permissions', 'users'));
	}

   /**
    * delete method
    *
    * @param string $id
    * @return void
    */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->Group->delete()) {
			$this->setFlashMessage(__('Group deleted'), 'info');
			$this->redirect(array('action' => 'index'));
		}
		$this->setFlashMessage(__('Group was not deleted'), 'warning');
		$this->redirect(array('action' => 'index'));
	}
}
