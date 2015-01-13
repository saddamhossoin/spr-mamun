<?php
App::uses('AppController', 'Controller');
/**
 * ServiceDevices Controller
 *
 * @property ServiceDevice $ServiceDevice
 * @property PaginatorComponent $Paginator
 */
class ServiceDevicesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator'); 
	
	
	//======================== Service Assign Device with Price ==================
	
	function service_add_device	( $id = null){
	  
	  if ($this->RequestHandler->isAjax()) {
 		if (!empty($this->request->data)) {
			// pr($this->request->data['ServiceDevicesService']);die();
			$this->loadModel('ServiceDevicesService');
 			if(!array_key_exists('id',$this->request->data['ServiceDevicesService'])){
				$this->ServiceDevicesService->create();
			}
 			if ($this->ServiceDevicesService->save($this->request->data['ServiceDevicesService'])) {
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
		
      }
		
 		$this->loadModel('ServiceService');
 		$this->set('deviceId',$id);
		   $this->layout = 'ajax';
	}
	
	
	//======================== Get Parent Product for  add Device from Product ================
	
	function parentProductListCondition( $data = null)
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
			 
 		return $conditionarray;	
	}
	
	function parentProductList( $yes = null  ){
		$this->loadModel('PosProduct');
 
 		if( !empty($this->request->data) ){
            $this->Session->delete('ServiceDeviceProductSearch');
            $this->Session->write( 'ServiceDeviceProductSearch', $this->request->data );
        }
         if( $this->Session->check( 'ServiceDeviceProductSearch' ) ){
              $this->request->data = $this->Session->read( 'ServiceDeviceProductSearch' );
           }
	
		//============= Already Device filter from list ==============
		$deviceProductlists = $this->ServiceDevice->find('list',array('fields'=>array('id','pos_product_id'),'conditions'=>array('ServiceDevice.pos_product_id !=0' )));  
		
		 $deviceProductlists = implode(", ", $deviceProductlists);
 		 
		 if(empty($deviceProductlists)){
		 	$deviceProductlists = 0;
		 }
		 
 		 $this->paginate  = array('conditions' =>  array($this->parentProductListCondition($this->request->data),' PosProduct.pos_type_id = 1','PosProduct.id NOT IN('.$deviceProductlists.')'  ),'limit'=>9999,'order' =>array('PosProduct.name'=>'asc'));
 	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ServiceDeviceProductSearch' );
			$this->PosProduct->recursive = 0;
			$this->paginate  = array(
 				'limit' => '9999',
				'order' =>array('PosProduct.name'=>'asc'),
 				'conditions'=>array("PosProduct.pos_type_id = 1",'PosProduct.id NOT IN('.$deviceProductlists.')'),
 			);
 			$this->request->data='';
	   }
  		$this->loadModel('PosProduct');
	
		
		 
 		$this->set('posProducts', $this->paginate('PosProduct'));
  	}

	//================ Add service Device from product ====================
	
	function addServiceFromProduct( $popup = null )  {
    if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			$this->ServiceDevice->create();
			if ($this->ServiceDevice->save($this->request->data)) {
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
		
      }
	  
		  $brands=$this->ServiceDevice->PosBrand->find('list',array('order'=>'name asc'));
		  $categories=$this->ServiceDevice->PosPcategory->find('list',array('order'=>'name asc'));
		  $this->set(compact('brands','categories'));
		  $this->set('page_titles', 'Service Device From Product'); 
 	   
	 }
 

	//============== Device Added From Service Info ==============
 	public function addDeviceFormServicePage() {
 	if (!empty($this->request->data)) {
			$this->ServiceDevice->create();
			if ($this->ServiceDevice->save($this->request->data)) {
				 $this->ServiceDevice->recursive = 0;
				 $response = $this->ServiceDevice->find('first',array('fields'=>array('ServiceDevice.name','PosPcategory.name','PosBrand.name'),'conditions'=>array('ServiceDevice.id'=>$this->ServiceDevice->id)));
 				echo json_encode($response);
 			} else {
				 echo "0";
			}
            Configure::write('debug', 0); 
			$this->autoRender = false;
			exit(); 
		}
 	  
	 $brand=$this->ServiceDevice->PosBrand->find('list');
	  $type=$this->ServiceDevice->PosPcategory->find('list');
	  
	  $this->set(compact('brand','type'));
 	}
 
	//====================== Get Email list if Find ===============
	public function getDeviceDetails($id = null) {
          if ($id != null) {
 			$this->layout = 'ajax';
			$response = array();
			$this->autoRender = false;
 			$this->ServiceDevice->recursive = 0;
			$response = $this->ServiceDevice->find( 'first', array('fields'=>array('PosBrand.name','PosPcategory.name'),'conditions' => array('ServiceDevice.id' => $id)));
 			echo json_encode($response);
 			exit();
        }	
	}

	//====================== Get Email list if Find ===============
	public function getDeviceList($search_data = null) {
          if ($search_data != null) {
 			$this->layout = 'ajax';
			$response = array();
 			$this->ServiceDevice->recursive = 0;
			$response = $this->ServiceDevice->find( 'all', array('fields'=>array('ServiceDevice.id','ServiceDevice.name','PosBrand.name','PosPcategory.name'),'conditions' => array('ServiceDevice.name like \'%'.$search_data."%'"),'order'=>array('ServiceDevice.name'=>'asc')) );
 			echo json_encode($response);
 			$this->autoRender = false;
			exit();
        }	
	}

	function filtercondition($data=null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'ServiceDevice');
			  if(!empty($data['ServiceDevice']['pos_brand_id']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
				 		$conditionarray .= 'ServiceDevice.pos_brand_id ='.$data['ServiceDevice']['pos_brand_id'];	
			  }
			 
			 if(!empty($data['ServiceDevice']['pos_pcategory_id']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
			 	$conditionarray .= 'ServiceDevice.pos_pcategory_id ='.$data['ServiceDevice']['pos_pcategory_id'];	
			  }
			
			 if(!empty($data['ServiceDevice']['name']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
					$conditionarray .= 'ServiceDevice.name like \'%'.$data['ServiceDevice']['name']."%'";		
		 	 }
 		return $conditionarray;	
	}
 
	function index($yes = null,$is_report=null) {
    
    	if( ! empty( $this->data ) ){
            $this->Session->delete('ServiceDeviceSearch');
            $this->Session->write( 'ServiceDeviceSearch', $this->data );
        }
         if( $this->Session->check( 'ServiceDeviceSearch' ) ){
              $this->data = $this->Session->read( 'ServiceDeviceSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ServiceDeviceSearch' );
			$this->ServiceDevice->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('ServiceDevice.modified'=>'desc'),
 			);
			$this->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->data) ),
		            'limit' => $this->Filter->searchlimit($this->data , 'ServiceDevice'),
					'order' =>$this->Filter->sortoption($this->data,  'ServiceDevice'),
        		);

    
		$this->ServiceDevice->recursive = -1;
		$this->set('serviceDevices', $this->paginate());
        $this->set('sortoption',array());
		
	  $brand=$this->ServiceDevice->PosBrand->find('list');
	  $type=$this->ServiceDevice->PosPcategory->find('list');
	  $this->set(compact('brand','type'));
	  
	   if($is_report == 'yes'){
	   $this->set('reportheading',"Service Device List");
 		$this->layout  = 'wcreport';
		$this->render('/ServiceDevices/invoice');
	   }
	   
	  $this->set('page_titles', 'Service Device List'); 
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid service device', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('serviceDevice', $this->ServiceDevice->read(null, $id));
	    $this->set('page_titles', 'ServiceDevice View'); 
	}
 
	function add($popup=null) {
    if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			$this->ServiceDevice->create();
			if ($this->ServiceDevice->save($this->request->data)) {
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
		
      }
	  $brand=$this->ServiceDevice->PosBrand->find('list',array('order'=>'name asc'));
	  $type=$this->ServiceDevice->PosPcategory->find('list',array('order'=>'name asc'));
	  $this->set(compact('brand','type'));
	  $this->set('page_titles', 'New Service Device'); 
	 
	   if(isset($popup)){
				 $this->render('/ServiceDevices/popup_add');
		 }
	 }
 
	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid service device', true));
			$this->redirect(array('action' => 'index'));
		}
		
         if ($this->RequestHandler->isAjax()) {	
		 
		if (!empty($this->request->data)) {
			
			if ($this->ServiceDevice->save($this->request->data)) {
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
			$this->ServiceDevice->recursive = 0;
			$this->request->data = $this->ServiceDevice->read(null, $id);
		//	pr($this->request->data );
 		}
		
	   $brand=$this->ServiceDevice->PosBrand->find('list');
	  $type=$this->ServiceDevice->PosPcategory->find('list');
	  
	  $this->set(compact('brand','type'));
		
     $this->set('page_titles', 'Update ServiceDevice'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for service device', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ServiceDevice->delete($id)) {
			$this->Session->setFlash(__('Service device deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Service device was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}}
