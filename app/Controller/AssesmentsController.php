<?php
App::uses('AppController', 'Controller');
/**
 * Assesments Controller
 *
 * @property Assesment $Assesment
 * @property PaginatorComponent $Paginator 
 */
class AssesmentsController extends AppController {

/**
 * Components
 * 
 * @var array
 */
	public $components = array('RequestHandler','Paginator','Session', 'Email', 'Cookie','ImageUploader');

	function filtercondition($data=null)
	{
		$conditionarray = '';
		$conditionarray .= $this->Filter->gfilter($data,'Assesment');
		return $conditionarray;	
	}
	function index($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('AssesmentSearch');
            $this->Session->write( 'AssesmentSearch', $this->request->data );
        }
         if( $this->Session->check( 'AssesmentSearch' ) ){
              $this->request->data = $this->Session->read( 'AssesmentSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'AssesmentSearch' );
			$this->Assesment->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('Assesment.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'Assesment'),
					'order' =>$this->Filter->sortoption($this->request->data,  'Assesment'),
        		);
 		$this->Assesment->recursive = 0;
		$this->set('assesments', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'Assesment List'); 
	}
	 

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid assesment', true));
			$this->redirect(array('action' => 'index'));
		}
			$assementviewdata = $this->Assesment->read(null, $id);
			$this->set('assesment', $assementviewdata);
			return $assementviewdata;
			$this->set('page_titles', 'Assesment View'); 
	}
	
	
	
	
	   function is_sms($id = null){
		   
		   }
	
	
		function is_email($id = null){ 
		
		
		
 	   $this->loadModel('ServiceDeviceInfo');
	   $this->loadModel('ServiceDevice');
	   $this->loadModel('ServiceInvoice');
	   $this->ServiceDevice->unbindModelAll();
	  
	   $this->ServiceDevice->bindModel(array('belongsTo' => array(
			   'PosPcategory' => array(
					'className' => 'PosPcategory',
					'foreignKey' => 'pos_pcategory_id',
					'type' => 'INNER'
					),
				'PosBrand' => array(
					'className' => 'PosBrand',
					'foreignKey' => 'pos_brand_id',
					'type' => 'INNER'
					) 
				)
          )); 
	 	$this->ServiceDeviceInfo->bindModel(array('hasMany' => array(
			   'ServiceInvoice' => array(
					'className' => 'ServiceInvoice',
					'foreignKey' => 'service_device_info_id',
					'type' => 'INNER'
					)
				)
          ) ); 
		   
	  
	  $this->ServiceDeviceInfo->recursive =2;
	  $serviceDeviceInfo=$this->ServiceDeviceInfo->find('first',array('conditions'=>array('ServiceDeviceInfo.id'=>$id)));
	 // pr($serviceDeviceInfo);  die('jewel');
 	  $this->set('serviceDeviceInfo',$serviceDeviceInfo);
	 
	 			// ->to($data['User']['email_address'])
	  					 App::uses('CakeEmail', 'Network/Email');
						$email = new CakeEmail();
						$email->from("info@spr.com")
								->to("saddamhossoin@gmail.com")
								->subject('Assesment Invoice')
								->template('assesment_invoice')
								->emailFormat('html')
								->viewVars(array('serviceDeviceInfo' => $serviceDeviceInfo ))
								->send(); 
          }
		  
		  

	function add( $id = null , $technician = null ) {

	    if ($this->RequestHandler->isAjax()) {
 		 if (!empty($this->request->data)) {

 		//  pr($this->request->data); die('anwar');
		  //============================Assesment image========================================//	
			App::uses('Sanitize', 'Utility');
			$output= array();  
			$fileDestination = 'files/upload/assesment';
			$options = array();    
			if(!empty($this->request->data['Assesment']['asscheckImage']['name'])){
				try{
					$output = $this->ImageUploader->upload($this->request->data['Assesment']['asscheckImage'],$fileDestination,$options);     	}
				catch(Exception $e)
				{ 
					$output = array('bool'=>FALSE,'error_message'=>$e->getMessage());
				} 
				$this->request->data['Assesment']['asscheckImage'] = $output['file_path'];
			}
			
			else{
				$this->request->data['Assesment']['asscheckImage'] ='';
				}
			  
		//============================Invoice image=======================================//
		
		
			$this->Assesment->create();
			if ($this->Assesment->save($this->request->data)) {
			  	 echo  $this->Assesment->getLastInsertId();
 			 	} 
			else {
				 echo "0";
			}
			Configure::write('debug', 0); 
			$this->autoRender = false;
			exit(); 
			}
		//}
      }
	  
	  if(isset($technician)){
	 	  $this->render('/Assesments/technician');
	  }
	 
	  
	     $this->set('page_titles', 'New Assesment'); 
	  //============================ Read Device Info ====================
	   $this->loadModel('ServiceDeviceInfo');
	   $this->loadModel('ServiceDevice');
 	   $this->ServiceDevice->unbindModelAll();
	   $this->ServiceDevice->bindModel(  array('belongsTo' => array(
			   'PosPcategory' => array(
					'className' => 'PosPcategory',
					'foreignKey' => 'pos_pcategory_id',
					'type' => 'INNER'
					),
					'PosBrand' => array(
					'className' => 'PosBrand',
					'foreignKey' => 'pos_brand_id',
					'type' => 'INNER'
					) 
				)
          ) );
		  
		
		$this->loadModel('ServiceDeviceAcessory');
		$this->ServiceDeviceAcessory->unbindModelAll();  
		$this->loadModel('ServiceDeviceDefect');
		$this->ServiceDeviceDefect->unbindModelAll();  
		$this->loadModel('ServiceInvoice');
		$this->ServiceInvoice->unbindModelAll(); 
		 
	   
	   $this->ServiceDeviceInfo->recursive =2;
 	  $this->set('serviceDeviceInfo',$this->ServiceDeviceInfo->find('first',array('conditions'=>array('ServiceDeviceInfo.id'=>$id))));
	 
	 $this->loadModel('ServiceDefect');
	 $this->set('ServiceDeviceDefects',$this->ServiceDefect->find('list'));
	 $this->loadModel('ServiceAcessory');
     $this->set('ServiceDeviceAcessories',$this->ServiceAcessory->find('list'));
	 
	 
	  
	 }
	 
	 
	 
	function techdashboard(){
		
			$id = $this->Auth->user('id');
			
			$this->loadModel('ServiceDeviceInfo');
		
 		  $this->ServiceDeviceInfo->bindModel(  array('belongsTo' => array(
			   'PosCustomer' => array(
					'className' => 'PosCustomer',
					'foreignKey' => 'pos_customer_id',
					'type' => 'INNER'
					)
				)
          ) );
			$this->ServiceDeviceInfo->recursive =0;
			 
			
			
	        if($_SESSION['groupname'] =='Technician'){
			 
				$response = $this->ServiceDeviceInfo->find('all',array('conditions'=>array('ServiceDeviceInfo.status'=>array(4,5,10),'Assesment.tech_id'=> $id)));
	 		
				$this->ServiceDeviceInfo->bindModel(  array('belongsTo' => array(
			 		'TechUser' => array(
					'className' => 'User',
					'foreignKey' => false,
					'conditions' => array(' TechUser.id = ServiceDeviceInfo.check_tech_id '),
					 
					), 'PosCustomer' => array(
					'className' => 'PosCustomer',
					'foreignKey' => 'pos_customer_id',
					'type' => 'INNER'
					)
				)
          ) );
		  
		  
		$response_check = $this->ServiceDeviceInfo->find('all',array('conditions'=>array('ServiceDeviceInfo.status'=>array(10),'ServiceDeviceInfo.check_tech_id'=> $id)));
		
				$response = array_merge($response,$response_check);
				
				
				
			}else if($_SESSION['groupname'] =='Admin'){
				$response = $this->ServiceDeviceInfo->find('all',array('conditions'=>array('ServiceDeviceInfo.status'=>array(4,5,10))));
 			}
			$this->set('serviceDeviceInfoLists', $response);
		//	pr($id);
		//  pr($response);
			$this->set('page_titles', 'Technician Dashboard'); 
			
	}
	
	
	function testingdashboard(){
		
			$this->loadModel('ServiceDeviceInfo');
		
			 $this->ServiceDeviceInfo->bindModel(  array('belongsTo' => array(
			   'PosCustomer' => array(
					'className' => 'PosCustomer',
					'foreignKey' => 'pos_customer_id',
					'type' => 'INNER'
					)
				)
          ) );
			
			
			$this->ServiceDeviceInfo->recursive =0;
	        $response = $this->ServiceDeviceInfo->find('all',array('conditions'=>array('ServiceDeviceInfo.status'=>array(6))));
			$this->set('serviceDeviceInfoLists', $response);
			
		 //pr($response);
			$this->set('page_titles', 'Testing Dashboard'); 
	}
	
	
	function devliverydashboard(){
		
			$this->loadModel('ServiceDeviceInfo');
		
			 $this->ServiceDeviceInfo->bindModel(  array('belongsTo' => array(
			   'PosCustomer' => array(
					'className' => 'PosCustomer',
					'foreignKey' => 'pos_customer_id',
					'type' => 'INNER'
					)
				)
          ) );
			
			
			$this->ServiceDeviceInfo->recursive =0;
	        $response = $this->ServiceDeviceInfo->find('all',array('conditions'=>array('ServiceDeviceInfo.status'=>array(7))));
			$this->set('serviceDeviceInfoLists', $response);
			
		 //pr($response);
			$this->set('page_titles', 'Delivery Dashboard'); 
	}
	
	
	
	
	
	
	function techview_assessment( $id = null , $technician=null){
		
		
	  //============================ Read Device Info ====================
	   $this->loadModel('ServiceDeviceInfo');
	   $this->loadModel('ServiceDevice');
	   $this->ServiceDevice->unbindModelAll();
	   $this->ServiceDevice->bindModel(  array('belongsTo' => array(
			   'PosPcategory' => array(
					'className' => 'PosPcategory',
					'foreignKey' => 'pos_pcategory_id',
					'type' => 'INNER'
					),
					'PosBrand' => array(
					'className' => 'PosBrand',
					'foreignKey' => 'pos_brand_id',
					'type' => 'INNER'
					) 
				)
          ) );
		  
		 		$this->loadModel('ServiceDeviceAcessory');
		$this->ServiceDeviceAcessory->unbindModelAll();  
		$this->loadModel('ServiceDeviceDefect');
		$this->ServiceDeviceDefect->unbindModelAll();  
		$this->loadModel('ServiceInvoice');
		$this->ServiceInvoice->unbindModelAll(); 

	   $this->ServiceDeviceInfo->recursive =2;
	   $this->set('serviceDeviceInfo',$this->ServiceDeviceInfo->find('first',array('conditions'=>array('ServiceDeviceInfo.id'=>$id))));
		 
		 $this->loadModel('ServiceDefect');
		 $this->set('ServiceDeviceDefects',$this->ServiceDefect->find('list'));
		  $this->loadModel('ServiceAcessory');
     $this->set('ServiceDeviceAcessories',$this->ServiceAcessory->find('list'));
	 
	   $this->set('page_titles', 'New Assesment'); 
		
		}
		
	
	function testingview_assessment( $id = null , $technician=null){
		
		
	  //============================ Read Device Info ====================
	   $this->loadModel('ServiceDeviceInfo');
	   $this->loadModel('ServiceDevice');
	   $this->ServiceDevice->unbindModelAll();
	   $this->ServiceDevice->bindModel(  array('belongsTo' => array(
			   'PosPcategory' => array(
					'className' => 'PosPcategory',
					'foreignKey' => 'pos_pcategory_id',
					'type' => 'INNER'
					),
					'PosBrand' => array(
					'className' => 'PosBrand',
					'foreignKey' => 'pos_brand_id',
					'type' => 'INNER'
					) 
				)
          ) );
		  
				$this->loadModel('ServiceDeviceAcessory');
		$this->ServiceDeviceAcessory->unbindModelAll();  
		$this->loadModel('ServiceDeviceDefect');
		$this->ServiceDeviceDefect->unbindModelAll();  
		$this->loadModel('ServiceInvoice');
		$this->ServiceInvoice->unbindModelAll(); 
 
	   $this->ServiceDeviceInfo->recursive =2;
	   $this->set('serviceDeviceInfo',$this->ServiceDeviceInfo->find('first',array('conditions'=>array('ServiceDeviceInfo.id'=>$id))));
		 
		 $this->loadModel('ServiceDefect');
		 $this->set('ServiceDeviceDefects',$this->ServiceDefect->find('list'));
		  $this->loadModel('ServiceAcessory');
     $this->set('ServiceDeviceAcessories',$this->ServiceAcessory->find('list'));
	 
	   $this->set('page_titles', 'New Assesment'); 
		
		}
		
	function deliveryview_assessment( $id = null , $technician=null){
		
		
	  //============================ Read Device Info ====================
	   $this->loadModel('ServiceDeviceInfo');
	   $this->loadModel('ServiceDevice');
	   $this->ServiceDevice->unbindModelAll();
	   $this->ServiceDevice->bindModel(  array('belongsTo' => array(
			   'PosPcategory' => array(
					'className' => 'PosPcategory',
					'foreignKey' => 'pos_pcategory_id',
					'type' => 'INNER'
					),
					'PosBrand' => array(
					'className' => 'PosBrand',
					'foreignKey' => 'pos_brand_id',
					'type' => 'INNER'
					) 
				)
          ) );
		  
		$this->loadModel('ServiceDeviceAcessory');
		$this->ServiceDeviceAcessory->unbindModelAll();  
		$this->loadModel('ServiceDeviceDefect');
		$this->ServiceDeviceDefect->unbindModelAll();  
		$this->loadModel('ServiceInvoice');
		$this->ServiceInvoice->unbindModelAll(); 
	 
		
		 
		
		
 
	   $this->ServiceDeviceInfo->recursive =2;
	   $this->set('serviceDeviceInfo',$this->ServiceDeviceInfo->find('first',array('conditions'=>array('ServiceDeviceInfo.id'=>$id))));
		 
		 $this->loadModel('ServiceDefect');
		 $this->set('ServiceDeviceDefects',$this->ServiceDefect->find('list'));
		 $this->loadModel('ServiceAcessory');
        $this->set('ServiceDeviceAcessories',$this->ServiceAcessory->find('list'));
	 
	   $this->set('page_titles', 'Delivery'); 
		
		}
	
	
	function re_assessment( $id = null){
			 
			if (!$id && empty($this->request->data)) {
			
				$this->Session->setFlash(__('Invalid assesment', true));
				$this->redirect(array('action' => 'index'));
			}
			if(!empty($this->request->data)){
			
				if(!empty($this->request->data['AssesmentApproveNote']['notes'])){
					$this->loadModel('AssesmentApproveNote');
					$this->AssesmentApproveNote->create();
					$this->request->data['AssesmentApproveNote']['user_id'] = $this->Auth->user('id');
					$this->request->data['AssesmentApproveNote']['stage_des'] = 'Re-Assesment';
					$this->AssesmentApproveNote->save($this->request->data);
				 }
 				 $this->loadModel('ServiceDeviceInfo');
				 $this->ServiceDeviceInfo->updateAll(array('ServiceDeviceInfo.status' => 3),array('ServiceDeviceInfo.id'=>$this->request->data['AssesmentApproveNote']['service_device_info_id']));

					echo '1';
				 Configure::write('debug', 0); 
				 $this->autoRender = false;
				 exit();
				 
				 
				// $this->redirect(array('controller' => 'Assesments', 'action' => 'techdashboard'));
			}else{
				$this->set('id_re_assement',$id);
				
			 }
		}
		function re_service( $id = null){
		   
		   	if (!$id && empty($this->request->data)) {
			
				$this->Session->setFlash(__('Invalid assesment', true));
				$this->redirect(array('action' => 'index'));
			}
			if(!empty($this->request->data)){
			
				if(!empty($this->request->data['AssesmentApproveNote']['notes'])){
					$this->loadModel('AssesmentApproveNote');
					$this->AssesmentApproveNote->create();
					$this->request->data['AssesmentApproveNote']['user_id'] = $this->Auth->user('id');
					$this->request->data['AssesmentApproveNote']['stage_des'] = 'Re-Service';
					$this->AssesmentApproveNote->save($this->request->data);
				 }
  				 $this->loadModel('ServiceDeviceInfo');
				 $this->ServiceDeviceInfo->updateAll(array('ServiceDeviceInfo.status' => 5),array('ServiceDeviceInfo.id'=>$this->request->data['AssesmentApproveNote']['service_device_info_id']));

				 echo '1';
				 Configure::write('debug', 0); 
				 $this->autoRender = false;
				 exit();
				 
				 
				// $this->redirect(array('controller' => 'Assesments', 'action' => 'techdashboard'));
			}else{
				$this->set('id_re_assement',$id);
				
			 }
		   
		   
 		 
			 
			 
		}
		
		
	function testing_status( $id = null ){
		 
			if (!$id && empty($this->request->data)) {
			
				$this->Session->setFlash(__('Invalid assesment', true));
				$this->redirect(array('action' => 'index'));
			}
			if(!empty($this->request->data)){
			
				if(!empty($this->request->data['AssesmentApproveNote']['notes'])){
					$this->loadModel('AssesmentApproveNote');
					$this->AssesmentApproveNote->create();
					$this->request->data['AssesmentApproveNote']['user_id'] = $this->Auth->user('id');
					$this->request->data['AssesmentApproveNote']['stage_des'] = 'Test Complete';
					$this->AssesmentApproveNote->save($this->request->data);
				 }
  				 $this->loadModel('ServiceDeviceInfo');
				 $this->ServiceDeviceInfo->updateAll(array('ServiceDeviceInfo.status' => 7),array('ServiceDeviceInfo.id'=>$this->request->data['AssesmentApproveNote']['service_device_info_id']));

				 echo '1';
				 Configure::write('debug', 0); 
				 $this->autoRender = false;
				 exit();
 			}else{
				$this->set('id_re_assement',$id);
 			 }
 		}
		
	function delivery_status( $id = null ){
		 
			$this->loadModel('ServiceDeviceInfo');
		    $this->ServiceDeviceInfo->updateAll(array('ServiceDeviceInfo.status' => 8),array('ServiceDeviceInfo.id'=>$id));
			 
			$this->redirect(array('controller' => 'Assesments', 'action' => 'devliverydashboard'));
		
		}
	
	
	function delivered_status( $id = null ){
		 
			$this->loadModel('ServiceDeviceInfo');
		    $this->ServiceDeviceInfo->updateAll(array('ServiceDeviceInfo.status' => 9),array('ServiceDeviceInfo.id'=>$id));
			 
			$this->redirect(array('controller' => 'Assesments', 'action' => 'devliverydashboard'));
		
		}
	
	
	
	function assesment_complete( $id = null ){
			//	pr(empty($this->request->data));die('jwel');
			if (!$id && empty($this->request->data)) {
			
				$this->Session->setFlash(__('Invalid assesment', true));
				$this->redirect(array('action' => 'index'));
			}
			if(!empty($this->request->data)){
			
				if(!empty($this->request->data['AssesmentApproveNote']['notes'])){
					$this->loadModel('AssesmentApproveNote');
					$this->AssesmentApproveNote->create();
					$this->request->data['AssesmentApproveNote']['user_id'] = $this->Auth->user('id');
					$this->request->data['AssesmentApproveNote']['stage_des'] = 'Service Complete';
					$this->AssesmentApproveNote->save($this->request->data);
				 }
 				
					$this->loadModel('ServiceDeviceInfo');
		   			$this->ServiceDeviceInfo->updateAll(array('ServiceDeviceInfo.status' => 6),array('ServiceDeviceInfo.id'=>$this->request->data['AssesmentApproveNote']['service_device_info_id']));
				
				echo '1';
				 Configure::write('debug', 0); 
				 $this->autoRender = false;
				 exit();
				 
			}else{
				$this->set('id_re_assement',$id);
				
			 }
 		}
		
	
	 function assessment_delivered( $id = null, $technician=null ){
	  
   		   //============================ Read Device Info ====================
	   $this->loadModel('ServiceDeviceInfo');
  	   $this->ServiceDeviceInfo->ServiceDevice->unbindModelAll();
 	   $this->ServiceDeviceInfo->ServiceDevice->bindModel(  array('belongsTo' => array(
			   'PosPcategory' => array(
					'className' => 'PosPcategory',
					'foreignKey' => 'pos_pcategory_id',
					'type' => 'INNER'
					),
					'PosBrand' => array(
					'className' => 'PosBrand',
					'foreignKey' => 'pos_brand_id',
					'type' => 'INNER'
					) 
				)
          ) );
		   $this->ServiceDeviceInfo->ServiceInvoice->unbindModelAll();
		   $this->ServiceDeviceInfo->ServiceDeviceDefect->unbindModel(array('belongsTo'=>array('ServiceDeviceInfo')));
		   $this->ServiceDeviceInfo->ServiceDeviceAcessory->unbindModel(array('belongsTo'=>array('ServiceDeviceInfo')));
		   $this->ServiceDeviceInfo->Assesment->unbindModel(array('belongsTo'=>array('ServiceDeviceInfo')));
		   $this->ServiceDeviceInfo->User->unbindModel(array('hasAndBelongsToMany'=>array('Group')));
			
 		
		
		 
			 
		 if (!empty($this->request->data)) {
		
		  $this->ServiceDeviceInfo->unbindModel(array('hasMany'=>array('ServiceDeviceAcessory','ServiceDeviceDefect' ),'hasOne'=>array(' '),'belongsTo'=>array('ServiceDevice','User')));
		 	$this->ServiceDeviceInfo->recursive =3;
			$serviceDeviceInfo = $this->ServiceDeviceInfo->find('first',array('conditions'=>array('ServiceDeviceInfo.id'=>$id)));
 			
 		 	//==================== Checking Stock is available =================
			 foreach($serviceDeviceInfo['Assesment']['AssesmentInventory'] as $pddatas){
			 	
 				$val_query = $this->Assesment->query("SELECT  `id` , `pos_product_id` , `quantity` FROM `mayasoftbd_pos_stocks` WHERE `pos_product_id` =".$pddatas['pos_product_id']." AND `quantity` >=".$pddatas['quantity']);
				if(empty($val_query)){
					 
					$this->Session->setFlash(__("Product ID: ".$pddatas['pos_product_id']." is not available stock."), 'error_message');
					$this->redirect(array('action'=>'assessment_delivered',$id));
					return;
				}	
			 }
 		 
 			//======================== End checking Stock =====================
			 
			 
			 
			
			 //====================== Save Service Sales ===============
 			 $this->loadModel('PosSale');
			 $PosSalesData['PosSale']['sales_type']=3;
			 $PosSalesData['PosSale']['pos_customer_id'] = $serviceDeviceInfo['ServiceDeviceInfo']['pos_customer_id'];
			 $PosSalesData['PosSale']['order_id'] = $serviceDeviceInfo['ServiceDeviceInfo']['id'];
		  	 $PosSalesData['PosSale']['totalprice'] = $serviceDeviceInfo['ServiceInvoice']['inventory_total'];
		
		 		$serviceDeviceInfoUpdate['id'] = $serviceDeviceInfo['ServiceDeviceInfo']['id'];
		 		$serviceDeviceInfoUpdate['status'] = 8;
				$serviceDeviceInfoUpdate['final_note'] = $this->request->data['ServiceDeviceInfo']['final_note'];
				
		 		if($this->ServiceDeviceInfo->save( $serviceDeviceInfoUpdate)){
				 
		 	
					$this->PosSale->create();
					if ($this->PosSale->save( $PosSalesData['PosSale'])) {
  			 		
					$salid = $this->PosSale->getLastInsertId();
					
					$cost_products = 0;
					
					foreach($serviceDeviceInfo['Assesment']['AssesmentInventory'] as $pddatas){
  						
						$this->loadModel('PosSaleDetail');
						
  						$sales_details['PosSaleDetail'] ['pos_sale_id'] = $salid;
						$sales_details['PosSaleDetail'] ['pos_product_id'] = $pddatas['pos_product_id'];
						$sales_details['PosSaleDetail'] ['pos_brand_id'] =$pddatas['PosProduct']['pos_brand_id'];
						$sales_details['PosSaleDetail'] ['pos_pcategory_id'] =$pddatas['PosProduct']['pos_pcategory_id'];
						$sales_details['PosSaleDetail'] ['quantity'] =$pddatas['quantity'];
						$sales_details['PosSaleDetail'] ['price'] =$pddatas['price'];
						$sales_details['PosSaleDetail'] ['totalprice'] =$pddatas['quantity'] * $pddatas['price'] ;
						
 	 				 	$this->PosSaleDetail->create();
						if($this->PosSaleDetail->save($sales_details['PosSaleDetail'])){
					 
						$last_sales_detail_id = $this->PosSaleDetail->getLastInsertId();
 					
		 				 
					   $this->loadModel('PosPurchaseDetail');
					   $this->loadModel('PosSalePurchaseDetail');
					   
		 			
					 $product_quantity = $this->PosPurchaseDetail->find('all',array('recursive'=>-1,'order' => 'PosPurchaseDetail.id ASC','conditions'=>array('PosPurchaseDetail.free_quantity >'=>0,'PosPurchaseDetail.pos_pcategory_id'=>$pddatas['PosProduct']['pos_pcategory_id'],'PosPurchaseDetail.pos_product_id'=>$pddatas['pos_product_id'])));
					 
					 $sales_quantity = $pddatas['quantity'];
					 
					//================== Update Free Quantity ===================	 
					 foreach($product_quantity as $val){
				 	 //========================= without Barcode CGS calculate Start ==============//  
						if($val['PosPurchaseDetail']['free_quantity'] >= $sales_quantity){
						
				 		 	$this->PosPurchaseDetail->updateAll(array('PosPurchaseDetail.free_quantity' =>'PosPurchaseDetail.free_quantity'."-".$sales_quantity),array('PosPurchaseDetail.pos_product_id'=>$val['PosPurchaseDetail']['pos_product_id'],'PosPurchaseDetail.id'=>$val['PosPurchaseDetail']['id']));
							
					 		$cost_products = $cost_products + ($sales_quantity*$val['PosPurchaseDetail']['price']);
							 
								///==================  For Sale return And Report ===================///
								$sale_purchase['pos_product_id']=$val['PosPurchaseDetail']['pos_product_id'];
								$sale_purchase['pos_sale_detail_id']=$last_sales_detail_id;
								$sale_purchase['pos_purchase_detail_id']=$val['PosPurchaseDetail']['id'];
								$sale_purchase['quantity']=$sales_quantity;
								$sale_purchase['return_quantity']=$sales_quantity;
								$sale_purchase['price']=$val['PosPurchaseDetail']['price'];
								$sale_purchase['total_price']=$sales_quantity * $val['PosPurchaseDetail']['price'];
							 
										$this->PosSalePurchaseDetail->create();
									 	$this->PosSalePurchaseDetail->save($sale_purchase) ;
										  
								///==================  For Sale return And Report ===================///
	 
							  break ;
						 	
							}	
					 	else if($val['PosPurchaseDetail']['free_quantity'] < $sales_quantity){
					 	 	$this->PosPurchaseDetail->updateAll(array('PosPurchaseDetail.free_quantity' =>'PosPurchaseDetail.free_quantity'."-".$val['PosPurchaseDetail']['free_quantity']),array('PosPurchaseDetail.pos_product_id'=>$val['PosPurchaseDetail']['pos_product_id'],'PosPurchaseDetail.id'=>$val['PosPurchaseDetail']['id']));
							
					 		$sales_quantity = $sales_quantity - $val['PosPurchaseDetail']['free_quantity'];
							$cost_products = $cost_products + ($val['PosPurchaseDetail']['free_quantity']*$val['PosPurchaseDetail']['price']); 
					 ///==================  For Sale return And Report ===================///
						$sale_purchase['pos_product_id']=$val['PosPurchaseDetail']['pos_product_id'];
						$sale_purchase['pos_sale_detail_id']=$last_sales_detail_id;
						$sale_purchase['pos_purchase_detail_id']=$val['PosPurchaseDetail']['id'];
						$sale_purchase['quantity']=$val['PosPurchaseDetail']['free_quantity'];
						$sale_purchase['return_quantity']=$val['PosPurchaseDetail']['free_quantity'];
						$sale_purchase['price']=$val['PosPurchaseDetail']['price'];
						$sale_purchase['total_price']=$val['PosPurchaseDetail']['free_quantity']*$val['PosPurchaseDetail']['price'];
						
						$this->PosSalePurchaseDetail->create();
						$this->PosSalePurchaseDetail->save($sale_purchase) ;
					 ///==================  For Sale return And Report ===================///
				 	 }	
				 	 //========================= without Barcode CGS calculate End ================//  
			  	 }
 		 		 }
				
				 		$this->loadModel("PosStock");
 				  		$this->PosStock->updateAll(array('PosStock.quantity' =>'PosStock.quantity'."-".$pddatas['quantity']),array('PosStock.pos_product_id'=>$pddatas['pos_product_id']));
					
			
			}
			
			 //========= Service Device Service Status Update code start=========//
			  $this->loadModel('AssesmentService');
			 
			 foreach($serviceDeviceInfo['Assesment']['AssesmentService'] as $serviceData){
 		 		$this->AssesmentService->updateAll(array('AssesmentService.status' => 1),array('AssesmentService.id'=>$serviceData['id'] ));
			}
			
			//======================  Service Accounts Entry =======================
			$this->loadModel("AccountsLedgerTransaction");
 			$jurnalId = $this->AccountsLedgerTransaction->manageJurnalId('SER');
			
				$this->loadModel("PosCustomerLedger");	
			 	$this->request->data['PosCustomerLedger']['payment_mode']=1;
				$this->request->data['PosCustomerLedger']['debit_credit']=1;
				$this->request->data['PosCustomerLedger']['pos_sale_id']=$serviceDeviceInfo['Assesment']['id'];
				$this->request->data['PosCustomerLedger']['note']='Service';
				$this->request->data['PosCustomerLedger']['pos_customer_id']=$PosSalesData['PosSale']['pos_customer_id'];
 				$this->request->data['PosCustomerLedger']['ledger_jurnal_id']='SER'.$jurnalId;
				$this->request->data['PosCustomerLedger']['account_head_id']=24;
				$this->request->data['PosCustomerLedger']['amount']= $serviceDeviceInfo['ServiceInvoice']['service_total'];
				
				
 				
				 $this->PosCustomerLedger->create();
				if($this->PosCustomerLedger->save($this->request->data['PosCustomerLedger'])){	
				
					$InventoryAccountsEntry = array('jurnalNumber'=>'SER'.$jurnalId,
												'debit_credit'=>1,
												'amount'=>$serviceDeviceInfo['ServiceInvoice']['service_total'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$serviceDeviceInfo['Assesment']['id'],
												'note'=>'Service Charge Receivable ',
												'account_head_id'=>24,
												'referance_table'=>'Assesment service'
 												);
				$AccountPayableEntry = array('jurnalNumber'=>'SER'.$jurnalId,
												'debit_credit'=>2,
												'amount'=>$serviceDeviceInfo['ServiceInvoice']['service_total'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$serviceDeviceInfo['Assesment']['id'],
												'referance_table'=>'Assesment service',
												'account_head_id'=>23,
												'note'=>'Service Reveinue',
 												);
				$this->AccountsLedgerTransaction->saveTransaction($InventoryAccountsEntry);
				$this->AccountsLedgerTransaction->saveTransaction($AccountPayableEntry);
				
				
				}
				
				
				
			  //==================== Inventory Account Entry =======================
			  
			  $this->loadModel("AccountsLedgerTransaction");
 			  $jurnalId = $this->AccountsLedgerTransaction->manageJurnalId('SV');
				
				$this->loadModel("PosCustomerLedger");	
			 	$this->request->data['PosCustomerLedger']['payment_mode']=1;
				$this->request->data['PosCustomerLedger']['debit_credit']=1;
				$this->request->data['PosCustomerLedger']['pos_sale_id']=$salid;
				$this->request->data['PosCustomerLedger']['note']='Inventory';
				$this->request->data['PosCustomerLedger']['pos_customer_id']=$PosSalesData['PosSale']['pos_customer_id'];
 				$this->request->data['PosCustomerLedger']['ledger_jurnal_id']='SV'.$jurnalId;
				$this->request->data['PosCustomerLedger']['account_head_id']=14;
				$this->request->data['PosCustomerLedger']['amount']= $serviceDeviceInfo['ServiceInvoice']['inventory_total'];
				
				 $this->PosCustomerLedger->create();
				if($this->PosCustomerLedger->save($this->request->data['PosCustomerLedger'])){	
					
			//===================== Inventrory Accounts Entry  ================= //
  				
				$InventoryAccountsEntry = array('jurnalNumber'=>'SV'.$jurnalId,
												'debit_credit'=>1,
												'amount'=>$serviceDeviceInfo['ServiceInvoice']['inventory_total'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$salid,
												'note'=>'Sales Receivable',
												'account_head_id'=>15,
												'referance_table'=>'sales'
 												);
				$AccountPayableEntry = array('jurnalNumber'=>'SV'.$jurnalId,
												'debit_credit'=>2,
												'amount'=>$serviceDeviceInfo['ServiceInvoice']['inventory_total'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$salid,
												'referance_table'=>'sales',
												'account_head_id'=>16,
												'note'=>'Sales',
 												);
				$this->AccountsLedgerTransaction->saveTransaction($InventoryAccountsEntry);
				$this->AccountsLedgerTransaction->saveTransaction($AccountPayableEntry);
				 
				 $CGS = array('jurnalNumber'=>'SV'.$jurnalId,
												'debit_credit'=>1,
												'amount'=>$cost_products,
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$salid,
												'note'=>'Cost Of Goods Sold(CGS)',
												'account_head_id'=>17,
												'referance_table'=>'sales'
 												);
				 $Inventory = array('jurnalNumber'=>'SV'.$jurnalId,
												'debit_credit'=>2,
												'amount'=>$cost_products,
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$salid,
												'note'=>'Inventory',
												'account_head_id'=>14,
												'referance_table'=>'sales'
 												);	
				 $this->AccountsLedgerTransaction->saveTransaction($CGS);
				 $this->AccountsLedgerTransaction->saveTransaction($Inventory);
			//===================== Inventrory Accounts Ends  =================	// 
						$this->Session->setFlash(__("Service delivery successfully complete."), 'success_message');
 						$this->redirect(array('controller'=>'Users','action' => 'chiefdashboard'));
					
					 	
					}
						
			    
			 
		 
		 		}
				}
				
					
				
		 }else{
		 
		 $this->ServiceDeviceInfo->recursive =2;
		 $serviceDeviceInfo = $this->ServiceDeviceInfo->find('first',array('conditions'=>array('ServiceDeviceInfo.id'=>$id, 'ServiceDeviceInfo.status'=>7)));
		 if(!empty($serviceDeviceInfo)){
		 		$this->set('serviceDeviceInfo', $serviceDeviceInfo);
			}else{
				$this->redirect(array('action' => 'index'));
 			}
 		 }
  		 $this->set('page_titles', 'Service Delivery'); 
		
		}
 	
	 function recieve($id = null){
	 
	   $this->layout  = 'wcreport';
	   $this->set('reportheading','Assesment');
	   $this->loadModel('ServiceDeviceInfo');
	   $this->loadModel('ServiceDevice');
	   $this->loadModel('ServiceInvoice');
	   $this->ServiceDevice->unbindModelAll();
	   $this->ServiceDevice->bindModel(array('belongsTo' => array(
			   'PosPcategory' => array(
					'className' => 'PosPcategory',
					'foreignKey' => 'pos_pcategory_id',
					'type' => 'INNER'
					),
				'PosBrand' => array(
					'className' => 'PosBrand',
					'foreignKey' => 'pos_brand_id',
					'type' => 'INNER'
					) 
				)
          )); 
	 	$this->ServiceDeviceInfo->bindModel(array('hasMany' => array(
			   'ServiceInvoice' => array(
					'className' => 'ServiceInvoice',
					'foreignKey' => 'service_device_info_id',
					'type' => 'INNER'
					)
				)
          ) ); 
		   /*$this->ServiceInvoice->unbindModel(array('belongsTo' => array(
			  'ServiceDeviceInfo' => array(
				'className' => 'ServiceDeviceInfo',
				'foreignKey' => 'service_device_info_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
					)
			)),true); */
	  
	  $this->ServiceDeviceInfo->recursive =2;
	  $serviceDeviceInfo=$this->ServiceDeviceInfo->find('first',array('conditions'=>array('ServiceDeviceInfo.id'=>$id)));
 	  $this->set('serviceDeviceInfo',$serviceDeviceInfo);
	  
	 			// ->to($data['User']['email_address'])
	  					/*App::uses('CakeEmail', 'Network/Email');
						$email = new CakeEmail();
						$email->from("info@spr.com")
								->to("rupom934106@gmail.com")
								->subject('Assesment Invoice')
								->template('assesment_invoice')
								->emailFormat('html')
								->viewVars(array('serviceDeviceInfo' => $serviceDeviceInfo,'reportheading'=>'Assesment','tax'=>$_SESSION['tax']))
								->send();*/
	 
	  }
	  
	  
	
	 

	function edit($id = null) {
		//print_r($this->request->data);
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid assesment', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
 		//============================Invoice image=======================================//
		
		if (!empty($this->request->data)) {
		 //============================Assesment image========================================//	
			App::uses('Sanitize', 'Utility');
			$output= array();  
			$fileDestination = 'files/upload/assesment';
			$options = array();    
			if(!empty($this->request->data['Assesment']['asscheckImage']['name'])){
				try{
					$output = $this->ImageUploader->upload($this->request->data['Assesment']['asscheckImage'],$fileDestination,$options);     	}
				catch(Exception $e)
				{ 
					$output = array('bool'=>FALSE,'error_message'=>$e->getMessage());
				} 
				$this->request->data['Assesment']['asscheckImage'] = $output['file_path'];
			}
			
			else{
				unset($this->request->data['Assesment']['asscheckImage'] );
				}
			if ($this->Assesment->save($this->request->data)) {
				echo  $this->request->data['Assesment']['id'];
			} else {
			    echo "0";	 
			}
             Configure::write('debug', 0); 
			 $this->autoRender = false;
			 exit();
		}
      }
		if (empty($this->request->data)) {
			$this->request->data = $this->Assesment->read(null, $id);
		}
     $this->set('page_titles', 'Update Assesment'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for assesment', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Assesment->delete($id)) {
			$this->Session->setFlash(__('Assesment deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Assesment was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}}
