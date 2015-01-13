<?php
App::uses('AppController', 'Controller');

/**
 * Menus Controller
 *
 * @property Menu $Menu
 * @property ControllerListComponent $ControllerList
 * @property RequestHandler $RequestHandler
 * @property Filter $Filter
 */
class MenusController extends AppController {


		var $name = 'Menus';
		var $helpers = array('Html', 'Form' , 'Time', 'Text' );

 		var $components = array( 'ControllerList','RequestHandler', 'Filter');

	function menulist() {
		$this->Menu->recursive = 0;
 		$this->set('menus',$this->Menu->find('threaded'));
		$this->render('/elements/layout/topmenulist');
	}
		//======================Start of filter function===========================//
		function filtercondition($data=null)
			{
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'Menu');

			if(!empty($this->request->data['Menu']['name']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
				$conditionarray .= 'Menu.name like \'%'.$this->request->data['Menu']['name']."%'";		
 			 }
 		
		return $conditionarray;	
	}
	
	function move($id = null, $direction = 'down'){
		
		if($direction == 'down'){
			$this->Menu->moveDown(intval($id));
		} else {
			$this->Menu->moveUp(intval($id));
		}
		$this->redirect(array('action'=>'index'));
	}
	
	function recover(){
		$this->Menu->recover($this->Menu);
		$this->redirect(array('action'=>'index'));
	}

	//======================End of filter function===========================//
	function index($yes = null) {
	 
  	if( ! empty( $this->request->data ) ){
			//pr($this->request->data);
            $this->Session->delete('menuSearch');
            $this->Session->write( 'menuSearch', $this->request->data );
        }
         if( $this->Session->check( 'menuSearch' ) ){
              $this->request->data = $this->Session->read( 'menuSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'menuSearch' );
			$this->Menu->recursive = 0;
			$conditionarr = array(
 				'limit' => '920',
				'order' =>array('Menu.parent_id asc'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $conditionarr  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => 920
         		); 
				 $menuslist = array();
		$menuslists = $this->Menu->find('all');
		foreach($menuslists as $menuslista ){
			$menuslist[$menuslista['Menu']['id']] = $menuslista;
		}		
  		$this->set('menuslist', $menuslist); 
 		$this->set('sortoption',array('name'=>'name'));
		$this->set('page_titles', 'Menu List'); 
  		 $this->set('manuarray',$this->Menu->generateTreeList(null,null, null, '<span class=menusep>|- </span>'));
   	}



	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid menu', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('menu', $this->Menu->read(null, $id));
	}

	function add() {
	 	 
			if (!empty($this->request->data)) {
			$this->Menu->create();
 			if($this->request->data['Menu']['nolink']==1)
			{$this->request->data['Menu']['url'] = '#';}
			else{$this->request->data['Menu']['url']=$this->request->data['Menu']['controller'].'/'.$this->request->data['Menu']['action'].'/'.$this->request->data['Menu']['action_extra']; }
 			//pr($this->request->data['Group']);
			if(is_array($this->request->data['Group']))
			{
				foreach($this->request->data['Group']['group_id'] as $key=>$Val){
					$this->request->data['Menu']['user_id'] .= $key.',';
				}
			}
 			if ($this->Menu->save($this->request->data)) {
				$this->redirect(array('action' => 'add')); 

  			} else {
			echo 'Failed :: Add new Menu ';
 			}
 		}
		$this->set('parentMenus', array(''=>'Root Menu') + $this->Menu->generateTreeList(null, null, null, '____'));
 		$this->set('controllers',$this->ControllerList->getcontrollerlist());
		$this->loadModel('Group');
		$this->set('grouplist', $this->Group->find('list'));
 		$this->set('page_titles', 'Add New Menu'); 
 	}

 	function actionlist($controllername) {
	 $this->layout='ajax';
	 if ($controllername) {
	  //$controlleractions['*'] ='All';
	 $controlleractions =  $this->ControllerList->getactionlist(Inflector::camelize($controllername));
	// print_r($controlleractions);die();
	 	$this->set('lists',$controlleractions);
		$this->render('/Elements/ajax/ajaxlist');
		}
		}
	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid menu', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			$this->Menu->create();
			 //pr($this->request->data);die();
			if($this->request->data['Menu']['nolink']==1)
			{$this->request->data['Menu']['url'] = '#';}
			else{$this->request->data['Menu']['url']=$this->request->data['Menu']['controller'].'/'.$this->request->data['Menu']['action'].'/'.$this->request->data['Menu']['action_extra']; }
			if ($this->Menu->save($this->request->data)) {
				$this->redirect(array('action' => 'index','yes')); 

  			} else {
			echo 'Failed :: Add new Menu ';
 			}
			 
		}
		$this->set('parentMenus', array(''=>'Root Menu') + $this->Menu->generateTreeList(null, null, null, '____'));
 		$this->set('controllers',$this->ControllerList->getcontrollerlist());
		 
		$this->set('page_titles', 'Edit Menu'); 
		if (empty($this->request->data)) {
			$this->request->data = $this->Menu->read(null, $id);
		}
		
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for menu', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Menu->delete($id)) {
			$this->Session->setFlash(__('Menu deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Menu was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>