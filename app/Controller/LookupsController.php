<?php
App::uses('AppController', 'Controller');
/**
 * Lookups Controller
 *
 * @property Lookup $Lookup
 */
class LookupsController extends AppController {

  
/**
 * index method
 *
 * @return void
 */
  public function filtercondition($data=null)
	{
 			 $conditionarray = '';
			// pr($data);
 			if(!empty($this->request->data['Lookup']['parent_id']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
					$conditionarray .= "Lookup.parent_id =".$this->request->data['Lookup']['parent_id']." OR Lookup.id =".$this->request->data['Lookup']['parent_id'];		
					
			 }
			 if(!empty($this->request->data['Lookup']['title']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
					$conditionarray .= 'Lookup.title like \'%'.$this->request->data['Lookup']['title']."%'";		
					
			 }
				 
		return $conditionarray;	
	}
 
	public function index($yes = null) {
	
 	
 	if( ! empty( $this->data ) ){
            $this->Session->delete('LookupSearch');
            $this->Session->write( 'LookupSearch', $this->request->data );
        }
         if( $this->Session->check( 'LookupSearch' ) ){
              $this->request->data = $this->Session->read( 'LookupSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'LookupSearch' );
			$this->request->data = array();
 			$this->Lookup->recursive = 0;
			 $this->paginate  = array(
 		             'limit' => 30,
				 	'order' =>array('Lookup.lft'=>' asc') ,
        		);
 	   }
	   
 	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->Session->read( 'LookupSearch' )) ),
		             'limit' => 50,
				 	'order' =>array('Lookup.lft'=>' asc') ,
        		);
		 
			 
    
		$this->Lookup->recursive = 0;
		$this->set('lookups', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'Lookup List'); 
		$this->set('lookuplists', $this->Lookup->findList('superlist',array('fields'=>array('id','title','list_refference'),'conditions'=>array('parent_id'=>0),'separator'=>' -- ')));
		$this->set('parentlists', $this->Lookup->find('list',array('fields'=>array('id','title'),'conditions'=>array('parent_id'=>0))));
 		
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Lookup->id = $id;
		if (!$this->Lookup->exists()) {
			throw new NotFoundException(__('Invalid lookup'));
		}
		$this->set('lookup', $this->Lookup->read(null, $id));
         $this->set('page_titles', 'View Lookup'); 
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
 		if ($this->request->is('post')) {
			$this->Lookup->create();
			if ($this->Lookup->save($this->request->data)) {
				echo "The data has been saved";
			} else {
				 echo "Saved Failed.";
			}
 		 
        Configure::write('debug', 0); 
		$this->autoRender = false;
		exit();
		}
		$this->set('lookuplists', array('0'=>'Parent') + $this->Lookup->findList('superlist',array('fields'=>array('id','title','list_refference'),'separator'=>' -- ')));
   	 $this->set('page_titles', 'New Lookup'); 
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Lookup->id = $id;
		if (!$this->Lookup->exists()) {
			throw new NotFoundException(__('Invalid lookup'));
		}
       

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Lookup->save($this->request->data)) {
				$this->redirect(array('action' => 'index')); 
			} else {
			
				 
			}
             
		}
		  else {
			$this->request->data = $this->Lookup->read(null, $id);
		}
				$this->set('lookuplists', array('0'=>'Parent') + $this->Lookup->find('superlist',array('fields'=>array('id','title','list_refference'),'conditions'=>array('parent_id'=>0),'separator'=>' -- ')));

     $this->set('page_titles', 'Edit Lookup'); 
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
		$this->Lookup->id = $id;
		if (!$this->Lookup->exists()) {
			throw new NotFoundException(__('Invalid lookup'));
		}
		if ($this->Lookup->delete()) {
			$this->setFlashMessage(__('Lookup deleted'), 'info');
			$this->redirect(array('action' => 'index'));
		}
		$this->setFlashMessage(__('Lookup was not deleted'), 'error');
		$this->redirect(array('action' => 'index'));
	}
	
	
	function move($id = null, $direction = 'down'){
		if($direction == 'down'){
			$this->Lookup->moveDown(intval($id) , 1);
		} else {
			$this->Lookup->moveUp(intval($id) , 1);
		}
		$this->redirect(array('action'=>'index'));
	}
}
