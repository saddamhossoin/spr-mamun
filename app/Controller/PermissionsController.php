<?php
App::uses('AppController', 'Controller');
/**
 * Permissions Controller
 *
 * @property Permission $Permission
 * @property ControllerListComponent $ControllerList
 */
class PermissionsController extends AppController {
		var $name = 'Permissions';

   public $components = array('ControllerList');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		
		$this->Permission->recursive = 1;
		 
		$this->set('permissions1', $this->paginate());
		$groups = $this->Permission->Group->find('list');
		$this->set('groups',$groups);
		$this->set('sortoption',array('name'=>'name'));
		//$createdBies = $this->Permission->CreatedBy->find('list');
		//$modifiedBies = $this->Permission->ModifiedBy->find('list');
		$this->set(compact(  'createdBies', 'modifiedBies'));
		$this->set('page_titles', 'Permission List');
		
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Permission->id = $id;
		if (!$this->Permission->exists()) {
			throw new NotFoundException(__('Invalid permission'));
		}
		$this->set('permission', $this->Permission->read(null, $id));
	}
	
	/**
	 * Search functionality
	 * 
	 */
	public function search() {
			
		$filter_condition = '';
		
		if(empty($this->request->data))
		{
			$filter_condition = " 1 ";
		}
		else 
		{	
			//debug($this->request->data); die();
 			extract($this->request->data['Permission']);
  			$filter_condition =  ($name!='') ? " Permission.name='$name'  " : '';
			//$filter_condition =  ($this->request->data['Group']['Group']!='') ? " Group.id=".$this->request->data['Group']['Group'] : '';
 		}
 			//$this->Permission->recursive = 0;
		$this->paginate = array('conditions'=>"$filter_condition");
		$this->set('permissions', $this->paginate());
			
		$groups = $this->Permission->Group->find('list');
		$this->set('groups',$groups);
		$this->render('index');

	}
	
	/**
	 * Set permission to single item
	 * 
	 * @param int $id
	 */
	public function singlepermission($id){
		$this->set('permission',$this->Permission->read(null, $id));
 	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			foreach($this->request->data['Permission']['action']  as $datas){
				$datasfull['Permission']['sortname'] = $this->request->data['Permission']['sortname'];
  				$datasfull['Permission']['name'] = Inflector::underscore($this->request->data['Permission']['controller']).':'.$datas ;
				$datasfull['Group'] = $this->request->data['Group'];
				
  				$this->Permission->create();
	     		$this->Permission->save($datasfull)  ;
			 }
			 
			 echo "Successfully saved. ";
			 $this->autoRender = false;
		}
		
		$this->set('controllers', $this->ControllerList->getcontrollerlist());
		$groups = $this->Permission->Group->find('list');
		$this->set(compact('groups'));
		$this->set('page_titles', 'Add Permission');
	}
	
	public function actionlist($controllername) {
		$this->layout='ajax';
 
 	 	if ($controllername) {
	  		$controlleractions['*'] ='All';
	 		$controlleractions =array_merge($controlleractions, $this->ControllerList->getactionlist($controllername));
	 		$this->set('controlleractions',$controlleractions);
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
	
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid Permission', true));
			$this->redirect(array('action' => 'index'));
		}
		 if (!empty($this->request->data )) {
			$this->Permission->query("DELETE FROM mayasoftbd_groups_permissions WHERE permission_id =".$this->request->data['Permission']['id']);
		
			foreach($this->request->data['Permission']['action']  as $datas){
  				
				$datasfull['Permission']['sortname'] = $this->request->data['Permission']['sortname'];
				$datasfull['Permission']['id'] = $this->request->data['Permission']['id'];
				$datasfull['Permission']['name'] = Inflector::underscore($this->request->data['Permission']['controller']).':'.$datas ;
				$datasfull['Group'] = $this->request->data['Group'];
   				//$this->Permission->create();
	     		$this->Permission->save($datasfull)  ;
				 
			 }
			 
			echo "successfully Upadted. ";
			$this->autoRender = false;
		 } 
	 
		 else {
		 
			$this->request->data = $this->Permission->read(null, $id);
	 	
	 
		$this->set('controllers', $this->ControllerList->getcontrollerlist());
		$groups = $this->Permission->Group->find('list');
		$controller = explode(":",$this->request->data['Permission']['name']);
	 	$this->request->data['Permission']['controller'] = Inflector::camelize($controller[0]);
		$this->request->data['Permission']['action'] = $controller[1];
		
		
	 if ($controller[0]) {
	 	 $controlleractions['*'] ='All';
		 $controlleractions =array_merge($controlleractions, $this->ControllerList->getactionlist(Inflector::camelize($controller[0])));
	 	$this->set('controlleractions',$controlleractions);
		}
		$this->set(compact('groups'));
		$this->set('page_titles', 'Edit Permission');
		}
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
		$this->Permission->id = $id;
		if (!$this->Permission->exists()) {
			throw new NotFoundException(__('Invalid permission'));
		}
		if ($this->Permission->delete()) {
			$this->setFlashMessage(__('Permission deleted'), 'info');
			$this->redirect(array('action' => 'index'));
		}
		$this->setFlashMessage(__('Permission was not deleted'), 'warning');
		$this->redirect(array('action' => 'index'));
	}
	
	public function checkname($conditions, $other) {
		$conditions = $conditions.":".$other;
 		$this->layout ='ajax';
		Configure::write('debug',0) ;  
		
		if (!empty($conditions)) {
				ereg("(.*)'(.*)'",$conditions,$lists);
				if($lists[2]=='') {
					echo '2';
				} else {
				$u=$this->Permission->hasAny($conditions);
				echo $u;
 				}
		} else {
				echo '1';
		}  
		
		$this->render('/Elements/ajaxblank');
  	}
}
