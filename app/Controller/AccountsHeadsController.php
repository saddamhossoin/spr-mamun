<?php
App::uses('AppController', 'Controller');
/**
 * AccountsHeads Controller
 *
 * @property AccountsHead $AccountsHead
 */
class AccountsHeadsController extends AppController {
 /**
 * index method
 *
 * @return void
 */
  public function filtercondition($data=null)
	{
 			 $conditionarray = '';
  			if(!empty($this->request->data['AccountsHead']['parent_id']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
					$conditionarray .= "AccountsHead.parent_id =".$this->request->data['AccountsHead']['parent_id']." OR AccountsHead.id =".$this->request->data['AccountsHead']['parent_id'];		
					
			 }
			 if(!empty($this->request->data['AccountsHead']['title']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
					$conditionarray .= 'AccountsHead.title like \'%'.$this->request->data['AccountsHead']['title']."%'";		
					
			 }
				 
		return $conditionarray;	
	}
 
	public function index($yes = null) {
	
 	
 	if( ! empty( $this->data ) ){
            $this->Session->delete('AccountsHeadsearch');
            $this->Session->write( 'AccountsHeadsearch', $this->request->data );
        }
         if( $this->Session->check( 'AccountsHeadsearch' ) ){
              $this->request->data = $this->Session->read( 'AccountsHeadsearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'AccountsHeadsearch' );
			$this->request->data = array();
 			$this->AccountsHead->recursive = 0;
			 $this->paginate  = array(
 		             'limit' => 30,
				 	'order' =>array('AccountsHead.lft'=>' asc') ,
        		);
 	   }
	   
 	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->Session->read( 'AccountsHeadsearch' )) ),
		             'limit' => 50,
				 	'order' =>array('AccountsHead.lft'=>' asc') ,
        		);
		 
			 
    
		$this->AccountsHead->recursive = 0;
		$this->set('AccountsHeads', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'AccountsHead List'); 
		$this->set('AccountsHeadlists', $this->AccountsHead->findList('superlist',array('fields'=>array('id','title'),'conditions'=>array('parent_id'=>0),'separator'=>' -- ')));
		$this->set('parentlists', $this->AccountsHead->find('list',array('fields'=>array('id','title'),'conditions'=>array('parent_id'=>0))));
 		
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->AccountsHead->id = $id;
		if (!$this->AccountsHead->exists()) {
			throw new NotFoundException(__('Invalid AccountsHead'));
		}
		$this->set('AccountsHead', $this->AccountsHead->read(null, $id));
         $this->set('page_titles', 'View AccountsHead'); 
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
 		if ($this->request->is('post')) {
			$this->AccountsHead->create();
			if ($this->AccountsHead->save($this->request->data)) {
				echo "The data has been saved";
			} else {
				 echo "Saved Failed.";
			}
 		 
        Configure::write('debug', 0); 
		$this->autoRender = false;
		exit();
		}
		$this->set('AccountsHeadlists', array('0'=>'Parent') + $this->AccountsHead->generateTreeList(null, null, null, '____'));
   	 $this->set('page_titles', 'New AccountsHead'); 
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->AccountsHead->id = $id;
		if (!$this->AccountsHead->exists()) {
			throw new NotFoundException(__('Invalid AccountsHead'));
		}
 
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AccountsHead->save($this->request->data)) {
				$this->redirect(array('action' => 'index')); 
			} else {
  			}
             
		}
		  else {
			$this->request->data = $this->AccountsHead->read(null, $id);
		}
 			
			$this->set('AccountsHeadlists', array('0'=>'Parent') + $this->AccountsHead->generateTreeList(null, null, null, '____'));
			$this->set('page_titles', 'Edit AccountsHead'); 
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
		$this->AccountsHead->id = $id;
		if (!$this->AccountsHead->exists()) {
			throw new NotFoundException(__('Invalid AccountsHead'));
		}
		if ($this->AccountsHead->delete()) {
			$this->setFlashMessage(__('AccountsHead deleted'), 'info');
			$this->redirect(array('action' => 'index'));
		}
		$this->setFlashMessage(__('AccountsHead was not deleted'), 'error');
		$this->redirect(array('action' => 'index'));
	}
	
	
	function move($id = null, $direction = 'down'){
		if($direction == 'down'){
			$this->AccountsHead->moveDown(intval($id) , 1);
		} else {
			$this->AccountsHead->moveUp(intval($id) , 1);
		}
		$this->redirect(array('action'=>'index'));
	}
	
	//======================= Service Name Checkking -------------------------
	 function uniqueHead( $HeadName=null , $id=null ){
			if(!empty($id)){
					$already_product=$this->AccountsHead->find('first',array('fields'=>array('id','title'),'recursive'=>-1,'conditions'=>array('AccountsHead.id !='=>$id,'AccountsHead.title'=>$HeadName)));
				}
				else{
				  $already_product=$this->AccountsHead->find('first',array('fields'=>array('id','title'),'recursive'=>-1,'conditions'=>array('AccountsHead.title'=>$HeadName)));
			}
			if(!empty($already_product['AccountsHead']['title'])){
				 echo "1";
			}
			else{
				echo "0";
			}
			Configure::write('debug', 0); 
			$this->autoRender = false;
			exit();
		 }
		 
		 
	
}
