<?php
App::uses('AppController', 'Controller');
/**
 * AssesmentInventories Controller
 *
 * @property AssesmentInventory $AssesmentInventory
 * @property PaginatorComponent $Paginator
 */
class AssesmentInventoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	function filtercondition($data=null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'AssesmentInventory');
 			 return $conditionarray;	
		}
    

	function index($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('AssesmentInventorySearch');
            $this->Session->write( 'AssesmentInventorySearch', $this->request->data );
        }
         if( $this->Session->check( 'AssesmentInventorySearch' ) ){
              $this->request->data = $this->Session->read( 'AssesmentInventorySearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'AssesmentInventorySearch' );
			$this->AssesmentInventory->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('AssesmentInventory.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'AssesmentInventory'),
					'order' =>$this->Filter->sortoption($this->request->data,  'AssesmentInventory'),
        		);

    
		$this->AssesmentInventory->recursive = 0;
		$this->set('assesmentInventories', $this->paginate());
        $this->set('page_titles', 'AssesmentInventory List'); 
	}
	

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid assesment inventory', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('assesmentInventory', $this->AssesmentInventory->read(null, $id));
         $this->set('page_titles', 'AssesmentInventory View'); 
	}

	function add( $assesment_id = null) {
	
 	 	$this->layout ='ajax';
 	//  if ($this->RequestHandler->isAjax()) {	
 
		if (!empty($this->request->data)) {
		//print_r($this->request->data);die();
			$this->AssesmentInventory->create();
			if ($this->AssesmentInventory->save($this->request->data)) {
 				$this->layout = 'ajax';
				$save_id = $this->AssesmentInventory->getLastInsertId();
				$response = array();
				$this->autoRender = false;
				$this->AssesmentInventory->recursive = 2;
				$response = $this->AssesmentInventory->find( 'first', array(  'conditions' => array('AssesmentInventory.id' => $save_id)));
			  //pr($response);die('anwar');
			  	echo json_encode($response);
				
				exit();
 			} else {
				 echo "0";
			}
            	Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
		 	$this->set('assesment_id',$assesment_id);
    //  }
 	 		$this->loadModel('PosPcategory');
			$this->loadModel('PosBrand');
			$this->set('category',$this->PosPcategory->find('list',array('order'=>array('name'=>'asc'))));
			$this->set('brand',$this->PosBrand->find('list',array('order'=>array('name'=>'asc'))));
		
	}
 
	
	function assesmentInProListfiltercondition( $data = null)
		 {
 			 $conditionarray = '';
			   if(!empty($this->request->data['PosProduct']['name']))
				{
 					if(!empty($conditionarray)){$conditionarray .= " AND ";}
					$conditionarray .= 'PosProduct.name like \'%'.$this->request->data['PosProduct']['name']."%'";		
 			 }
 			
 			if(!empty($this->request->data['PosProduct']['pos_brand_id']))
				{
 					if(!empty($conditionarray)){$conditionarray .= " AND ";}
					$conditionarray .= 'PosProduct.pos_brand_id ='.$this->request->data['PosProduct']['pos_brand_id'];		
  			 }
 			  if(!empty($this->request->data['PosProduct']['pos_pcategory_id']))
				{
 					if(!empty($conditionarray)){$conditionarray .= " AND ";}
				    $conditionarray .= 'PosProduct.pos_pcategory_id = '.$this->request->data['PosProduct']['pos_pcategory_id'] ;		
  			 }
		//	 pr($conditionarray);die();
			 
 		return $conditionarray;	
	}
	

	function assesmentInventoryProductList( $yes = null , $assesment_id = null ){
 	
		 if( !empty($this->request->data) ){
            $this->Session->delete('AssesmentInventoryProductSearch');
            $this->Session->write( 'AssesmentInventoryProductSearch', $this->request->data );
        }
         if( $this->Session->check( 'AssesmentInventoryProductSearch' ) ){
              $this->request->data = $this->Session->read( 'AssesmentInventoryProductSearch' );
           }
		   
		    $conditionsArray =  array($this->assesmentInProListfiltercondition($this->request->data),'PosProduct.status'=>1,'PosProduct.status'=>3 );
			
				
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'AssesmentInventoryProductSearch' );
			$this->AssesmentInventory->recursive = 0;
			$conditionsArray  = array(
 				'limit' => '20',
				'order' =>array('PosProduct.name'=>'asc'),
 				'conditions'=>array('PosProduct.status !=1'),
 			);
 	   } 	   
	   
	   
 		$this->loadModel('PosCompatibility');
		$this->loadModel('PosProduct');
		
		$asses_service_product_id = $this->PosCompatibility->query("SELECT `mayasoftbd_service_devices`.`pos_product_id` FROM mayasoftbd_assesments JOIN mayasoftbd_service_device_infos ON mayasoftbd_service_device_infos.id= mayasoftbd_assesments.service_device_info_id JOIN mayasoftbd_service_devices ON mayasoftbd_service_devices.id=mayasoftbd_service_device_infos.service_device_id where mayasoftbd_assesments.id =".$assesment_id);	
			
	  	// pr($this->assesmentInProListfiltercondition($this->request->data));die();
		
		$com_product_id = $this->PosCompatibility->find('list',array('fields'=>array('PosCompatibility.pos_product_id'),'conditions'=>array('PosCompatibility.com_product_id'=>$asses_service_product_id[0]['mayasoftbd_service_devices']['pos_product_id']))) ; 
		//pr($com_product_id);die('jewle');
		if(!empty($com_product_id)){
	 		$com_product_id = implode($com_product_id,',');
 			$this->set('posProducts',$this->PosProduct->find('all',array('conditions'=>array("PosProduct.id  IN ($com_product_id)",$this->assesmentInProListfiltercondition($this->request->data) ))));
		}
		
		$this->set('alreadyAssesProducts',$this->AssesmentInventory->find('list',array('fields'=>array('id','pos_product_id'),'conditions'=>array('AssesmentInventory.assesment_id'=>$assesment_id))));
 		
		$this->set('assesment_id',$assesment_id);
	}
 
	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid assesment inventory', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->AssesmentInventory->save($this->request->data)) {
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
			$this->request->data = $this->AssesmentInventory->read(null, $id);
		}
		$posProducts = $this->AssesmentInventory->PosProduct->find('list');
		$assesments = $this->AssesmentInventory->Assesment->find('list');
		$this->set(compact('posProducts', 'assesments'));
     $this->set('page_titles', 'Update AssesmentInventory'); 
	}

	function delete($id = null) {
		if (!$id) {
			echo '0';
		}
		if ($this->AssesmentInventory->delete($id)) {
			echo '1';
		}
		 Configure::write('debug', 0); 
		 $this->autoRender = false;
		 exit();
	}}
