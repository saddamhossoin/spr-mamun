<?php
App::uses('AppController', 'Controller');
/**
 * PosCompatibilities Controller
 *
 * @property PosCompatibility $PosCompatibility
 * @property PaginatorComponent $Paginator
 */
class PosCompatibilitiesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	function parentProductListCondition( $data = null)
		 {
 			 $conditionarray = '';
			   if(!empty($this->request->data['PosCompatibility']['name']))
				{
 					if(!empty($conditionarray)){$conditionarray .= " AND ";}
					$conditionarray .= 'PosProduct.name like \'%'.$this->request->data['PosCompatibility']['name']."%'";		
 			 }
 			
 			if(!empty($this->request->data['PosCompatibility']['pos_brand_id']))
				{
 					if(!empty($conditionarray)){$conditionarray .= " AND ";}
					$conditionarray .= 'PosProduct.pos_brand_id ='.$this->request->data['PosCompatibility']['pos_brand_id'];		
  			 }
 			  if(!empty($this->request->data['PosCompatibility']['pos_pcategory_id']))
				{
 					if(!empty($conditionarray)){$conditionarray .= " AND ";}
				    $conditionarray .= 'PosProduct.pos_pcategory_id = '.$this->request->data['PosCompatibility']['pos_pcategory_id'] ;		
  			 }
			 
 		return $conditionarray;	
	}
	

	function parentProductList( $yes = null  ){
 	
		if( !empty($this->request->data) ){
            $this->Session->delete('PosCompitibilityProductSearch');
            $this->Session->write( 'PosCompitibilityProductSearch', $this->request->data );
        }
         if( $this->Session->check( 'PosCompitibilityProductSearch' ) ){
              $this->request->data = $this->Session->read( 'PosCompitibilityProductSearch' );
           }
 		    $this->paginate  = array(
    	        	'conditions' =>  array($this->parentProductListCondition($this->request->data),' PosProduct.pos_type_id = 1' ),);
				
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'PosCompitibilityProductSearch' );
			$this->PosCompatibility->PosProduct->recursive = 0;
			$this->paginate  = array(
 				'limit' => '200',
				'order' =>array('PosProduct.name'=>'asc'),
 				'conditions'=>array("PosProduct.pos_type_id = 1"),
 			);
 			$this->request->data='';
	   }
  		$this->loadModel('PosProduct');
 		$this->set('posProducts', $this->paginate('PosProduct'));
  	}

 function filtercondition($data=null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'PosCompatibility');
 		return $conditionarray;	
	}
    

	function index($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('PosCompatibilitySearch');
            $this->Session->write( 'PosCompatibilitySearch', $this->request->data );
        }
         if( $this->Session->check( 'PosCompatibilitySearch' ) ){
              $this->request->data = $this->Session->read( 'PosCompatibilitySearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'PosCompatibilitySearch' );
			$this->PosCompatibility->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('PosCompatibility.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'PosCompatibility'),
					'order' =>$this->Filter->sortoption($this->request->data,  'PosCompatibility'),
        		);

    
		$this->PosCompatibility->recursive = 0;
		$this->set('posCompatibilities', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'PosCompatibility List'); 
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pos compatibility', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('posCompatibility', $this->PosCompatibility->read(null, $id));
         $this->set('page_titles', 'PosCompatibility View'); 
	}

	function add() {
    if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			$this->PosCompatibility->create();
			if ($this->PosCompatibility->save($this->request->data)) {
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
      }
		$posProducts = $this->PosCompatibility->PosProduct->find('list');
		$comProducts = $this->PosCompatibility->ComProduct->find('list');
		$this->set(compact('posProducts', 'comProducts'));
	   $this->set('page_titles', 'New PosCompatibility'); 

	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid pos compatibility', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->PosCompatibility->save($this->request->data)) {
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
			$this->request->data = $this->PosCompatibility->read(null, $id);
		}
		$posProducts = $this->PosCompatibility->PosProduct->find('list');
		$comProducts = $this->PosCompatibility->ComProduct->find('list');
		$this->set(compact('posProducts', 'comProducts'));
     $this->set('page_titles', 'Update PosCompatibility'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pos compatibility', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PosCompatibility->delete($id)) {
			$this->Session->setFlash(__('Pos compatibility deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pos compatibility was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}}
