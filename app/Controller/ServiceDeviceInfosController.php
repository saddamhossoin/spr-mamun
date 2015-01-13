<?php 

App::uses('AppController', 'Controller');
 App::uses('BarcodeHelper','Vendor');  
/**
 * ServiceDeviceInfos Controller  
 *
 * @property ServiceDeviceInfo $ServiceDeviceInfo
 * @property PaginatorComponent $Paginator
 */
class ServiceDeviceInfosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('RequestHandler','Paginator','Session', 'Email', 'Cookie','ImageUploader');
	 
	 
	function filtercondition( $data = null )
	 {
		 $this->request->data = $data;
		
 		 $conditionarray = '';
 		 $conditionarray .= $this->Filter->gfilter($data,'ServiceDeviceInfo');
 		 
		   if(!empty($this->request->data['ServiceDevice']['name']))
				{
 					if(!empty($conditionarray)){$conditionarray .= " AND ";}
					$conditionarray .= 'ServiceDevice.name like \'%'.$this->request->data['ServiceDevice']['name']."%'";		
 			 }
			  if(!empty($this->request->data['User']['email_address']))
				{
 					if(!empty($conditionarray)){$conditionarray .= " AND ";}
					$conditionarray .= 'User.email_address like \'%'.$this->request->data['User']['email_address']."%'";		
 			 }
 			
 			if(!empty($this->request->data['ServiceDevice']['pos_brand_id']))
				{
 					if(!empty($conditionarray)){$conditionarray .= " AND ";}
				$conditionarray .= 'ServiceDevice.pos_brand_id ='.$this->request->data['ServiceDevice']['pos_brand_id'];		
  			 }
 			  if(!empty($this->request->data['ServiceDevice']['pos_pcategory_id']))
				{
 					if(!empty($conditionarray)){$conditionarray .= " AND ";}
				    $conditionarray .= 'ServiceDevice.pos_pcategory_id = '.$this->request->data['ServiceDevice']['pos_pcategory_id'] ;		
  			 }
			  if(!empty($this->request->data['ServiceDeviceInfo']['serial_no']))
				{
 					if(!empty($conditionarray)){$conditionarray .= " AND ";}
					$conditionarray .= 'ServiceDeviceInfo.serial_no like \'%'.$this->request->data['ServiceDeviceInfo']['serial_no']."%'";		
 			 }
			  if(!empty($this->request->data['ServiceDeviceInfo']['status']))
				{
 					if(!empty($conditionarray)){$conditionarray .= " AND ";}
				    $conditionarray .= 'ServiceDeviceInfo.status = '.$this->request->data['ServiceDeviceInfo']['status'] ;		
  			 }
			 
			
			 
		   // pr( $conditionarray);die();
		
		 return $conditionarray;	
	}
    

	function index($yes = null) {
		
    
    	if( ! empty( $this->data ) ){
            $this->Session->delete('ServiceDeviceInfoSearch');
            $this->Session->write( 'ServiceDeviceInfoSearch', $this->data );
        }
         if( $this->Session->check( 'ServiceDeviceInfoSearch' ) ){
              $this->data = $this->Session->read( 'ServiceDeviceInfoSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ServiceDeviceInfoSearch' );
			
			$this->ServiceDeviceInfo->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('ServiceDeviceInfo.modified'=>'desc'),
 		);
			$this->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->data , 'ServiceDeviceInfo'),
					'order' =>$this->Filter->sortoption($this->data,  'ServiceDeviceInfo'),
        		);
		  
    
		$this->ServiceDeviceInfo->recursive = 0;
	
	 	// pr($this->paginate());
		$this->set('serviceDeviceInfos', $this->paginate());
		
		$this->loadModel('PosProduct');
		$posBrands = $this->PosProduct->PosBrand->find('list',array('order'=>'name asc'));
		$posPcategories = $this->PosProduct->PosPcategory->find('list',array('order'=>'name asc'));

	 
		$this->set(compact('posBrands', 'posPcategories' ));	
		
		$this->set('sortoption',array());
        $this->set('page_titles', 'SERVICE RECIVE LIST'); 
	}
	
	function view_servie_image( $id = null){
		if (!$id) {
				$this->Session->setFlash(__('Invalid service device info', true));
				$this->redirect(array('action' => 'index'));
			}
			//==================== For service Device Recive Image ================
			$this->ServiceDeviceInfo->recursive = -1;
			$service_recive  = $this->ServiceDeviceInfo->find('first',array('fields'=>array('id','screenimage'),'conditions'=>array('ServiceDeviceInfo.id'=> $id)));
		 
 				$this->set("serviceDeviceInfo", $service_recive );
 		 
			
			//==================== For Assment Image ================
			$this->loadModel('Assesment');
			$this->Assesment->recursive = -1;
			$assesmentinfo  = $this->Assesment->find('first',array('fields'=>array('id','asscheckImage'),'conditions'=>array('Assesment.service_device_info_id'=> $id)));
		// pr($assesmentinfo  );
			if(!empty($assesmentinfo ['Assesment']['asscheckImage'])){
				$this->set("assesmentinfo", $assesmentinfo );
 			}

			//==================== For Tech Image ================
			$this->loadModel('AssesmentApproveNote');
			$this->AssesmentApproveNote->recursive = -1;
			$AssesmentApproveNote  = $this->AssesmentApproveNote->find('first',array('fields'=>array('id','screenimage'),'conditions'=>array('AssesmentApproveNote.service_device_info_id'=> $id)));
		  
			if(!empty($AssesmentApproveNote ['AssesmentApproveNote']['screenimage'])){
				$this->set("AssesmentApproveNote", $AssesmentApproveNote );
 			}
 			
			$this->set('page_titles', 'ServiceDeviceInfo View'); 
	}
	
	
	function view_servie_note( $id = null){
		if (!$id){
					$this->Session->setFlash(__('Invalid service device info', true));
					$this->redirect(array('action' => 'index'));
				}
			//==================== For Assisment Not ================
 			$this->loadModel('Assesment');
			$this->Assesment->recursive = -1;
			$assesmentinfo  = $this->Assesment->find('first',array('fields'=>array('id','note'),'conditions'=>array('Assesment.service_device_info_id'=> $id)));
			// pr($assesmentinfo);
			if(!empty($assesmentinfo ['Assesment']['note'])){
				$this->set("assesmentinfo", $assesmentinfo );
 			}
  			//==================== For Tech Image ================
 			
			$this->loadModel('AssesmentApproveNote');
 			$this->AssesmentApproveNote->unbindModel(array('belongsTo'=>array('ServiceDeviceInfo')));
			$this->AssesmentApproveNote->recursive = 2;
 			$assesmentapproveaote  = $this->AssesmentApproveNote->find('all',array('fields'=>array('id','screenimage','stage_des','notes','user_id','created','User.id','User.firstname','User.lastname'),'conditions'=>array('AssesmentApproveNote.service_device_info_id'=> $id)));
			
			$this->set('assesmentapproveaote', $assesmentapproveaote );
			$this->set('page_titles', 'Note List'); 
	}
	
	function viewcheck_list( $id = null ){
	
	  $this->loadModel('DeviceCheckList');
	  $checklist_names = $this->DeviceCheckList->find('list',array('fields'=>array('id','name'),'conditions'=>array('DeviceCheckList.active'=>1)));
	  
	   $this->loadModel('AssesmentApproveNote');
	   $this->AssesmentApproveNote->recursive = -1;
	   $checklist_note = $this->AssesmentApproveNote->find('first',array('conditions'=>array('AssesmentApproveNote.is_checklist'=>1 , 'AssesmentApproveNote.service_device_info_id'=> $id)));
	   $this->set('checklist_note',$checklist_note);
	   
	   
	  $this->ServiceDeviceInfo->unbindModelAll();
	  
	  $ServiceDeviceCheckdata = $this->ServiceDeviceInfo->find('first',array('fields'=>array('id','checklist'),'conditions'=>array('ServiceDeviceInfo.id'=>$id)));
	  //pr($ServiceDeviceCheckdata );
	   
	  $this->set('checklist_names',$checklist_names);
	  $this->set('ServiceDeviceCheckdata',unserialize($ServiceDeviceCheckdata['ServiceDeviceInfo']['checklist']));
	  
	  $this->set('ids',$id);
 	 $this->set('page_titles', 'Device Check List View'); 
	}
	
	
	function checkStatus() {
 		if (!empty($this->request->data)){
  		  $this->ServiceDeviceInfo->bindModel(array('belongsTo'=>array('PosCustomer'=>array(
										 'className' => 'PosCustomer',
										'foreignKey' => 'pos_customer_id',
										'dependent' => true,
										'type' => 'right', 
										 
 						 ))), false);  
			$this->set('serviceDeviceInfo', $this->ServiceDeviceInfo->find('first',array('conditions'=>array('ServiceDeviceInfo.serial_no'=>$this->request->data['ServiceDeviceInfo']['serial_no']))));
		}
		$this->layout  = 'wpage';
 	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid service device info', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('serviceDeviceInfo', $this->ServiceDeviceInfo->read(null, $id));
         $this->set('page_titles', 'ServiceDeviceInfo View'); 
	}
	
	
	function receive_invoice( $id = null){
	
		 $this->ServiceDeviceInfo->User->unbindModelAll();
	  $this->ServiceDeviceInfo->ServiceDevice->unbindModelAll();
	  $this->ServiceDeviceInfo->ServiceInvoice->unbindModelAll();
	  $this->ServiceDeviceInfo->ServiceDeviceAcessory->unbindModel(array('belongsTo'=>array('ServiceDeviceInfo')));
	  $this->ServiceDeviceInfo->ServiceDeviceDefect->unbindModel(array('belongsTo'=>array('ServiceDeviceInfo')));
	  		
	
	  $this->ServiceDeviceInfo->ServiceDevice->bindModel(array(
	  	'belongsTo'=>array('PosBrand'=>array(
		'className' => 'PosBrand',
		'foreignKey' => 'pos_brand_id',
		'dependent' => false,
		))), false);  
			
			$this->ServiceDeviceInfo->recursive = 2;
		 	$deviceRecive=$this->ServiceDeviceInfo->find('first',array('conditions'=>array('ServiceDeviceInfo.id'=>$id)));
			// pr($deviceRecive);
			$this->set('deviceRecive',$deviceRecive);
			
		$this->set('is_repet',$this->ServiceDeviceInfo->find('first',array('field'=>array('id'),'conditions'=>array('ServiceDeviceInfo.serial_no'=>$deviceRecive['ServiceDeviceInfo']['serial_no'] ,'ServiceDeviceInfo.id !='=>$deviceRecive['ServiceDeviceInfo']['id']  ),'recursive'=>-1)));
		 $this->layout = 'ajax';		
		$this->set('page_titles', 'Receive Invoice');
	}
	
	
	
	
	function previousServiceHistory( $val = null){
	 
	 	$this->paginate  = array('conditions' => array('ServiceDeviceInfo.serial_no' => $val),);
		$this->ServiceDeviceInfo->recursive = 0;
		$this->set('serviceDeviceInfos', $this->paginate());
		$this->loadModel('PosProduct');
		$posBrands = $this->PosProduct->PosBrand->find('list',array('order'=>'name asc'));
		$posPcategories = $this->PosProduct->PosPcategory->find('list',array('order'=>'name asc'));
	 	 
	 
		$this->set(compact('posBrands', 'posPcategories' ));	
		
	}
	
	
	
	  function initial_assesment_list( $yes = null ){
		
    
	 
	$this->loadModel('PosCustomer');	
 		$this->ServiceDeviceInfo->bindModel(  array('belongsTo' => array(
			   'PosCustomer' => array(
					'className' => 'PosCustomer',
					'foreignKey' => 'pos_customer_id',
				//	'conditions' => array($conditionarrayCustomer)
					)
				)
          ) );	
		  
		  
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('ServiceDeviceInfoSearch');
            $this->Session->write( 'ServiceDeviceInfoSearch', $this->request->data );
        }
         if( $this->Session->check( 'ServiceDeviceInfoSearch' ) ){
              $this->request->data = $this->Session->read( 'ServiceDeviceInfoSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ServiceDeviceInfoSearch' );
			$this->ServiceDeviceInfo->recursive = 0;
			$this->paginate  = array(
  				'limit' => '30',
				'order' =>array('ServiceDeviceInfo.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	   
	//pr($this->filtercondition($this->request->data));die();
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data)),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'ServiceDeviceInfo'),
					'order' =>$this->Filter->sortoption($this->request->data,  'ServiceDeviceInfo'),
        		);
				
			
		
				
		$this->ServiceDeviceInfo->recursive =0;
		 	//var_dump($this->paginate());
		$this->set('assessment_lists', $this->paginate());
		//pr($this->paginate());die();
        $this->set('sortoption',array());
		
	
	    $this->set('page_titles', 'Inital Assesment List'); 
	
	}
 	
	
	  function assesment_approve_list( $yes = null ){
		
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('ServiceDeviceApproveSearch');
            $this->Session->write( 'ServiceDeviceApproveSearch', $this->request->data );
        }
         if( $this->Session->check( 'ServiceDeviceApproveSearch' ) ){
              $this->request->data = $this->Session->read( 'ServiceDeviceApproveSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ServiceDeviceApproveSearch' );
			$this->ServiceDeviceInfo->recursive = 0;
			$this->paginate  = array(
			    'conditions' => array('ServiceDeviceInfo.status' =>4),
 				'limit' => '20',
				'order' =>array('ServiceDeviceInfo.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	   
	
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data),'ServiceDeviceInfo.status' =>4),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'ServiceDeviceInfo'),
					'order' =>$this->Filter->sortoption($this->request->data,  'ServiceDeviceInfo'),
        		);
				
			
		$this->loadModel('PosCustomer');	
		
		   
		    $this->ServiceDeviceInfo->bindModel(  array('belongsTo' => array(
			   'PosCustomer' => array(
					'className' => 'PosCustomer',
					'foreignKey' => 'pos_customer_id',
					'type' => 'INNER'
					)
				)
          ) );	
				
		$this->ServiceDeviceInfo->recursive =0;
		$this->set('assessment_lists', $this->paginate());
		//pr($this->paginate());die();
        $this->set('sortoption',array());
      
	
		
	
	    $this->set('page_titles', 'Inital Assesment Approve List'); 
	
	}
	
	
	
	  function technician_complete( $yes = null ){
		
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('ServiceDeviceApproveSearch');
            $this->Session->write( 'ServiceDeviceApproveSearch', $this->request->data );
        }
         if( $this->Session->check( 'ServiceDeviceApproveSearch' ) ){
              $this->request->data = $this->Session->read( 'ServiceDeviceApproveSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ServiceDeviceApproveSearch' );
			$this->ServiceDeviceInfo->recursive = 0;
			$this->paginate  = array(
			    'conditions' => array('ServiceDeviceInfo.status' =>array(5,6)),
 				'limit' => '20',
				'order' =>array('ServiceDeviceInfo.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	   
	
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data),'ServiceDeviceInfo.status' =>array(5,6)),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'ServiceDeviceInfo'),
					'order' =>$this->Filter->sortoption($this->request->data,  'ServiceDeviceInfo'),
        		);
				
			
			$this->loadModel('PosCustomer');	
		
		   
		    $this->ServiceDeviceInfo->bindModel(  array('belongsTo' => array(
			   'PosCustomer' => array(
					'className' => 'PosCustomer',
					'foreignKey' => 'pos_customer_id',
					'type' => 'INNER'
					)
				)
          ) );	
			
				
		$this->ServiceDeviceInfo->recursive =0;
		$this->set('technician_completes', $this->paginate());
		//pr($this->paginate());die();
        $this->set('sortoption',array());
      
	
		
	
	    $this->set('page_titles', 'Technician Complete List'); 
	
	}
	
	
	  function testing_list( $yes = null ){
		
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('ServiceDeviceInfoSearch');
            $this->Session->write( 'ServiceDeviceInfoSearch', $this->request->data );
        }
         if( $this->Session->check( 'ServiceDeviceInfoSearch' ) ){
              $this->request->data = $this->Session->read( 'ServiceDeviceInfoSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ServiceDeviceInfoSearch' );
			$this->ServiceDeviceInfo->recursive = 0;
			$this->paginate  = array(
			    'conditions' => array('ServiceDeviceInfo.status' =>array(6,7)),
 				'limit' => '20',
				'order' =>array('ServiceDeviceInfo.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	   
	
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data),'ServiceDeviceInfo.status' =>array(6,7)),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'ServiceDeviceInfo'),
					'order' =>$this->Filter->sortoption($this->request->data,  'ServiceDeviceInfo'),
        		);
				
			
		$this->loadModel('PosCustomer');	
		
		   
		    $this->ServiceDeviceInfo->bindModel(  array('belongsTo' => array(
			   'PosCustomer' => array(
					'className' => 'PosCustomer',
					'foreignKey' => 'pos_customer_id',
					'type' => 'INNER'
					)
				)
          ) );	
				
		$this->ServiceDeviceInfo->recursive =0;
		$this->set('testing_lists', $this->paginate());
		//pr($this->paginate());die();
        $this->set('sortoption',array());
      
	
		
	
	    $this->set('page_titles', 'Testing List'); 
	
	}
	
	  function delivery_list( $yes = null ){
		
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('ServiceDeviceInfoSearch');
            $this->Session->write( 'ServiceDeviceInfoSearch', $this->request->data );
        }
         if( $this->Session->check( 'ServiceDeviceInfoSearch' ) ){
              $this->request->data = $this->Session->read( 'ServiceDeviceInfoSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ServiceDeviceInfoSearch' );
			$this->ServiceDeviceInfo->recursive = 0;
			$this->paginate  = array(
			    'conditions' => array('ServiceDeviceInfo.status' =>array(8,9)),
 				'limit' => '20',
				'order' =>array('ServiceDeviceInfo.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	   
	
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data),'ServiceDeviceInfo.status' =>array(8,9)),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'ServiceDeviceInfo'),
					'order' =>$this->Filter->sortoption($this->request->data,  'ServiceDeviceInfo'),
        		);
				
			
		$this->loadModel('PosCustomer');	
		
		   
		    $this->ServiceDeviceInfo->bindModel(  array('belongsTo' => array(
			   'PosCustomer' => array(
					'className' => 'PosCustomer',
					'foreignKey' => 'pos_customer_id',
					'type' => 'INNER'
					)
				)
          ) );	
				
		$this->ServiceDeviceInfo->recursive =0;
		$this->set('delivery_lists', $this->paginate());
		//pr($this->paginate());die();
        $this->set('sortoption',array());
      
	
		
	
	    $this->set('page_titles', 'Delivery List'); 
	
	}
	
	  function delivered_list( $yes = null ){
     
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('ServiceDeviceInfoSearch');
            $this->Session->write( 'ServiceDeviceInfoSearch', $this->request->data );
        }
         if( $this->Session->check( 'ServiceDeviceInfoSearch' ) ){
              $this->request->data = $this->Session->read( 'ServiceDeviceInfoSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ServiceDeviceInfoSearch' );
			$this->ServiceDeviceInfo->recursive = 0;
			$this->paginate  = array(
			    'conditions' => array('ServiceDeviceInfo.status' => 9),
 				'limit' => '20',
				'order' =>array('ServiceDeviceInfo.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
 	
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data),'ServiceDeviceInfo.status' => 9),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'ServiceDeviceInfo'),
					'order' =>$this->Filter->sortoption($this->request->data,  'ServiceDeviceInfo'),
        		);
 			
		$this->loadModel('PosCustomer');	
 		    $this->ServiceDeviceInfo->bindModel(  array('belongsTo' => array(
			   'PosCustomer' => array(
					'className' => 'PosCustomer',
					'foreignKey' => 'pos_customer_id',
					'type' => 'INNER'
					)
				)
          ) );	
				
		$this->ServiceDeviceInfo->recursive =0;
		$this->set('delivered_lists', $this->paginate());
		//pr($this->paginate());die();
        $this->set('sortoption',array());
      
	
		
	
	    $this->set('page_titles', 'Delivered List'); 
	
	}
	
	  function client_delevery_list( $yes = null ){
     
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('ServiceDeviceInfoSearch');
            $this->Session->write( 'ServiceDeviceInfoSearch', $this->request->data );
        }
         if( $this->Session->check( 'ServiceDeviceInfoSearch' ) ){
              $this->request->data = $this->Session->read( 'ServiceDeviceInfoSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ServiceDeviceInfoSearch' );
			$this->ServiceDeviceInfo->recursive = 0;
			$this->paginate  = array(
			    'conditions' => array('ServiceDeviceInfo.status' => 8),
 				'limit' => '20',
				'order' =>array('ServiceDeviceInfo.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
 	
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data),'ServiceDeviceInfo.status' => 8),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'ServiceDeviceInfo'),
					'order' =>$this->Filter->sortoption($this->request->data,  'ServiceDeviceInfo'),
        		);
 			
		$this->loadModel('PosCustomer');	
 		    $this->ServiceDeviceInfo->bindModel(  array('belongsTo' => array(
			   'PosCustomer' => array(
					'className' => 'PosCustomer',
					'foreignKey' => 'pos_customer_id',
					'type' => 'INNER'
					)
				)
          ) );	
				
		$this->ServiceDeviceInfo->recursive =0;
		$this->set('delivered_lists', $this->paginate());
		//pr($this->paginate());die();
        $this->set('sortoption',array());
      
	
		
	
	    $this->set('page_titles', 'Delivered List'); 
	
	}
	
	function client_delivered( $id = null  ){
   		   //============================ Read Device Info ====================
  		 if (!empty($this->request->data)) {
 			
			 
			
			 //====================== Save Service Sales ===============
 			 
		 		$serviceDeviceInfoUpdate['id'] = $this->request->data['ServiceInvoice']['service_device_info_id'];
		 		$serviceDeviceInfoUpdate['status'] = 9;
 		 		if($this->ServiceDeviceInfo->save( $serviceDeviceInfoUpdate)){
 				 
				 
				 
				 //======================= Service Accounts Entry =========
				 
				 $this->loadModel('ServiceInvoice');
				 $this->request->data['ServiceInvoice']['status'] = 1;
				 
				 
				if( $this->ServiceInvoice->save($this->request->data['ServiceInvoice'])){
 					$this->loadModel("AccountsLedgerTransaction");
					$jurnalId = $this->AccountsLedgerTransaction->manageJurnalId('SECR');
					
					 $this->ServiceDeviceInfo->recursive = -1;
					 $serviceDeviceInfo = $this->ServiceDeviceInfo->find('first',array('conditions'=>array('ServiceDeviceInfo.id'=>$this->request->data['ServiceInvoice']['service_device_info_id'])));
					 
					$this->loadModel("PosCustomerLedger");	
					$this->request->data['PosCustomerLedger']['payment_mode']=3;
					$this->request->data['PosCustomerLedger']['debit_credit']=2;
					$this->request->data['PosCustomerLedger']['pos_sale_id']=$this->request->data['ServiceInvoice']['service_device_info_id'];
					$this->request->data['PosCustomerLedger']['note']='Service Payment Recive';
					$this->request->data['PosCustomerLedger']['pos_customer_id']=$serviceDeviceInfo['ServiceDeviceInfo']['pos_customer_id'];
					$this->request->data['PosCustomerLedger']['ledger_jurnal_id']='SECR'.$jurnalId;
					$this->request->data['PosCustomerLedger']['account_head_id']=$this->request->data['ServiceInvoice']['account_head_id'] ;
					$this->request->data['PosCustomerLedger']['amount']= $this->request->data['ServiceInvoice']['inventory_total'];
					
 					 $this->PosCustomerLedger->create();
					if($this->PosCustomerLedger->save($this->request->data['PosCustomerLedger'])){	
					//====================== Service Payment Entry ===============
					$this->request->data['PosCustomerLedger']['payment_mode']=3;
					$this->request->data['PosCustomerLedger']['debit_credit']=2;
					$this->request->data['PosCustomerLedger']['pos_sale_id']=$this->request->data['ServiceInvoice']['service_device_info_id'];
					$this->request->data['PosCustomerLedger']['note']='Service Payment Recive';
					$this->request->data['PosCustomerLedger']['pos_customer_id']=$serviceDeviceInfo['ServiceDeviceInfo']['pos_customer_id'];
					$this->request->data['PosCustomerLedger']['ledger_jurnal_id']='SECR'.$jurnalId;
					$this->request->data['PosCustomerLedger']['account_head_id']=$this->request->data['ServiceInvoice']['account_head_id'] ;
					$this->request->data['PosCustomerLedger']['amount']= $this->request->data['ServiceInvoice']['service_total'] - $this->request->data['ServiceInvoice']['discount'];
					
					 $this->PosCustomerLedger->create();
					 $this->PosCustomerLedger->save($this->request->data['PosCustomerLedger']);
					
					
					if(!empty($this->request->data['ServiceInvoice']['discount'])){
					
						$this->request->data['PosCustomerLedger']['payment_mode']=3;
						$this->request->data['PosCustomerLedger']['debit_credit']=2;
						$this->request->data['PosCustomerLedger']['pos_sale_id']=$this->request->data['ServiceInvoice']['service_device_info_id'];
						$this->request->data['PosCustomerLedger']['note']='Service Payment Recive';
						$this->request->data['PosCustomerLedger']['pos_customer_id']=$serviceDeviceInfo['ServiceDeviceInfo']['pos_customer_id'];
						$this->request->data['PosCustomerLedger']['ledger_jurnal_id']='SECR'.$jurnalId;
						$this->request->data['PosCustomerLedger']['account_head_id']=25 ;
						$this->request->data['PosCustomerLedger']['amount']= $this->request->data['ServiceInvoice']['discount'];
						
						 $this->PosCustomerLedger->create();
						 $this->PosCustomerLedger->save($this->request->data['PosCustomerLedger']);
					
					}
					
					
					
					
					
					$InventoryAccountsEntry1 = array('jurnalNumber'=>'SECR'.$jurnalId,
												'debit_credit'=>2,
												'amount'=>$this->request->data['ServiceInvoice']['inventory_total'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$this->request->data['ServiceInvoice']['service_device_info_id'],
												'note'=>'Service Charge Receivable ',
												'account_head_id'=> 15,
												'referance_table'=>'Service Device Info'
 												);
												
												
					$InventoryAccountsEntry2 = array('jurnalNumber'=>'SECR'.$jurnalId,
												'debit_credit'=>1,
												'amount'=>$this->request->data['ServiceInvoice']['inventory_total'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$this->request->data['ServiceInvoice']['service_device_info_id'],
												'note'=>'Service Charge Receivable ',
												'account_head_id'=>$this->request->data['ServiceInvoice']['account_head_id'],
												'referance_table'=>'Service Device Info'
 						);
						
												
					$AccountPayableEntry3 = array('jurnalNumber'=>'SECR'.$jurnalId,
												'debit_credit'=>2,
												'amount'=> $this->request->data['ServiceInvoice']['service_total'] ,
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$this->request->data['ServiceInvoice']['service_device_info_id'],
												'referance_table'=>'Service Charge Recive',
												'account_head_id'=>24,
												'note'=>'Service Reveinue',
 						);
						
						$AccountPayableEntry7 = array('jurnalNumber'=>'SECR'.$jurnalId,
												'debit_credit'=>1,
												'amount'=> ($this->request->data['ServiceInvoice']['service_total'] - $this->request->data['ServiceInvoice']['discount']) ,
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$this->request->data['ServiceInvoice']['service_device_info_id'],
												'referance_table'=>'Service Charge Recive',
												'account_head_id'=> $this->request->data['ServiceInvoice']['account_head_id'],
												'note'=>'Service Reveinue',
 						);	
												
					if(!empty($this->request->data['ServiceInvoice']['discount'])){	
											
					$AccountPayableEntry4 = array('jurnalNumber'=>'SECR'.$jurnalId,
												'debit_credit'=>1,
												'amount'=> $this->request->data['ServiceInvoice']['discount'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$this->request->data['ServiceInvoice']['service_device_info_id'],
												'referance_table'=>'Service Charge Recive',
												'account_head_id'=>25,
												'note'=>'Service Reveinue',
 												);
						$this->AccountsLedgerTransaction->saveTransaction($AccountPayableEntry4);
					}
					
					 
												
												
					
					$this->AccountsLedgerTransaction->saveTransaction($AccountPayableEntry7);
					$this->AccountsLedgerTransaction->saveTransaction($AccountPayableEntry3);
					$this->AccountsLedgerTransaction->saveTransaction($InventoryAccountsEntry1);
 					$this->AccountsLedgerTransaction->saveTransaction($InventoryAccountsEntry2);
					
					echo $this->request->data['ServiceInvoice']['service_device_info_id'];
					Configure::write('debug', 0); 
					$this->autoRender = false;
					exit(); 
					
					
					 
						
					}
				
				}
				
				
				 
				 
 				}
				
					
				
		 }else{
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
		 
		 $this->ServiceDeviceInfo->recursive =2;
		 $serviceDeviceInfo = $this->ServiceDeviceInfo->find('first',array('conditions'=>array('ServiceDeviceInfo.id'=>$id, 'ServiceDeviceInfo.status'=>8)));
		 if(!empty($serviceDeviceInfo)){
		 		$this->set('serviceDeviceInfo', $serviceDeviceInfo);
			}else{
				$this->redirect(array('action' => 'index'));
 			}
 		 }
		 $this->loadModel('AccountsHead');
  		$this->set('accountsHead',$this->AccountsHead->find('list',array('fields'=>array('id','title'),'conditions'=>array('parent_id'=>2 , 'groupid'=>1))));
  		 $this->set('page_titles', 'Service Delivery'); 
		
		}
	
	
	
	  
	 
	
	function checkDeviceSerial( $val = nul ){
		
		$this->ServiceDeviceInfo->recursive = -1;
		
		$findData =  $this->ServiceDeviceInfo->find('all',array('fields'=>array('id','recive_date','user_id'),'conditions'=>array('ServiceDeviceInfo.serial_no' => $val)));
		if(!empty($findData)){
			echo   '1';
		}else{
			echo '0';
		}
		
		
		Configure::write('debug', 0); 
		$this->autoRender = false;
		exit(); 
	}
	
	function uploadImage(){
	
		$this->layout = false;
		
		//pr($this->request->data);die();
		 
		//============================Invoice image========================================//	
			App::uses('Sanitize', 'Utility');
			$output= array();  
			$fileDestination = 'files/upload/serviceinfo';
			$options = array();    
			if(!empty($this->request->data['ServiceDeviceInfo']['screenimage']['name'])){
				try{
					$output = $this->ImageUploader->upload($this->request->data['ServiceDeviceInfo']['screenimage'],$fileDestination,$options);     	}
				catch(Exception $e)
				{ 
					$output = array('bool'=>FALSE,'error_message'=>$e->getMessage());
				} 
				$this->request->data['ServiceDeviceInfoUpdate']['screenimage'] = $output['file_path'];
			}
			
			else{
				$this->request->data['ServiceDeviceInfoUpdate']['screenimage'] ='';
				}
				 
				
				if($this->PosPurchase->save($this->request->data['ServiceDeviceInfoUpdate'])){

				}else{
					echo '2';
				}
				
				Configure::write('debug', 0); 
				$this->autoRender = false;
				exit();  
		//============================Invoice image=======================================//
	}
	//============== Status Change ====================
	function changeStatus( $id = null) {
     if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
  				
 				if ($this->ServiceDeviceInfo->save($this->request->data['ServiceDeviceInfo'])) {
 					// pr($this->request->data);die();
					 echo $this->ServiceDeviceInfo->getLastInsertId();
  				} else {
					 echo "0";
				}
 			  	Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
		$this->set('serId' , $id);
      }
 	}
	
	

	function add() {
     if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
		
		
 		// pr($this->request->data);die();
	//================== New user and current user save ===============
		$this->loadModel('User');
		$this->loadModel('PosCustomer');
		
		$PosCustomerSaveId = '';
 		
		if(!empty($this->request->data['PosCustomer']['pos_customer_id'])){
		 
		 	$user_id  = $this->PosCustomer->find('first',array('conditions'=>array('id'=>$this->request->data['PosCustomer']['pos_customer_id']),'fields'=>array('user_id'),'recursive'=>-1));
			 
			$userdata['User']['id']  = $user_id['PosCustomer']['user_id'];
			$userdata['User']['email_address']=$this->request->data['PosCustomer']['email_address'];
			$userdata['User']['firstname'] = $this->request->data['PosCustomer']['name'];
			$userdata['User']['phone'] = $this->request->data['PosCustomer']['phone'];
			$userdata['User']['piva'] = $this->request->data['PosCustomer']['piva'];
			$userdata['User']['address'] = $this->request->data['PosCustomer']['address'];
			//pr($userdata); die('jewel');
 			
			$userSave = $this->User->save($userdata);
			 
			$this->request->data['PosCustomer']['id'] = $this->request->data['PosCustomer']['pos_customer_id'];
			$this->request->data['PosCustomer']['email'] = $this->request->data['PosCustomer']['email_address'];
			$this->request->data['PosCustomer']['iva'] = $this->request->data['PosCustomer']['piva'];
			$this->request->data['PosCustomer']['mobile'] = $this->request->data['PosCustomer']['phone'];
			
 			$customerSave = $this->PosCustomer->save($this->request->data['PosCustomer']);
			$PosCustomerSaveId = $this->request->data['PosCustomer']['pos_customer_id'] ;
			
 		}else{
			
			$userdata['User']['email_address']=$this->request->data['PosCustomer']['email_address'];
			$userdata['User']['firstname'] = $this->request->data['PosCustomer']['name'];
			$userdata['User']['phone'] = $this->request->data['PosCustomer']['phone'];
			$userdata['User']['piva'] = $this->request->data['PosCustomer']['piva'];
			$userdata['User']['address'] = $this->request->data['PosCustomer']['address'];
			$userdata['User']['active'] = 1;
			$userdata['User']['type_of_user'] = 5;
			$userdata['Group']['group_id'] = 6;
		
			$userSave = $this->User->save($userdata);
			
			$UserSaveId = $this->User->getLastInsertId();
		
			
			$this->request->data['PosCustomer']['user_id'] =$UserSaveId;
			
		    $this->request->data['PosCustomer']['email'] = $this->request->data['PosCustomer']['email_address'];
			$this->request->data['PosCustomer']['iva'] = $this->request->data['PosCustomer']['piva'];
			$this->request->data['PosCustomer']['mobile'] = $this->request->data['PosCustomer']['phone'];
			$this->request->data['PosCustomer']['customer_type'] = 5;
			
			$this->PosCustomer->create();
 			$customerSave = $this->PosCustomer->save($this->request->data['PosCustomer']);
			$PosCustomerSaveId = $this->PosCustomer->getLastInsertId();
			
			
			 //==== mail notification for password Entry Start =====================//
           
        $fu=$this->User->find('first',array('conditions'=>array('User.email_address'=>$userdata['User']['email_address'])));
     	 if($fu)  {
            if($fu['User']['active'])
                    {
                        $key = Security::hash(String::uuid(),'sha512',true);
      					$url = Router::url( array('controller'=>'users','action'=>'reset'), true ).'/'.$key;
                        $ms=$url;
                        $fu['User']['tokenhash']=$key;
            			$this->User->id=$fu['User']['id'];
                        if($this->User->saveField('tokenhash',$fu['User']['tokenhash'])){
       			//============Email================//
               			$this->set('ms', $ms);
       					App::uses('CakeEmail', 'Network/Email');
						$email = new CakeEmail();
						$email->from("info@spr.com")
						->to($userdata['User']['email_address'])
						->subject('[SPR] Please Reset your password')
						->template('default')
						->emailFormat('html')
						->viewVars(array('Your Reset Password link  ' =>$ms))
						->send("Hey, we heard you lost your SPR password.Say it ain't so!<br>Use the following link reset your password:<br><br>".$ms."<br><br>Thanks,<br>
				The Bravelets Team");
										   if ($email->send()) {
         				$this->Session->setFlash(__('Your new password has been sent, please check your inbox', true),'success_message');
               } else {
                     $this->Session->setFlash(__('Failed to send the confirmation email. Please contact the administrator at support@xxx',
true), 'fail_message');
               } 
           //============EndEmail=============//
                        }
                        else{
     					 $this->Session->setFlash(__('Error Generating Reset link', true),'warnning_message');
                  //$this->Session->setFlash("Error Generating Reset link");
                        }
                    }
                    else
                    {
      				$this->Session->setFlash(__('This Account is not Active yet.Check Your mail to activate it', true),'warnning_message');
                     }
                  }
          //==== mail notification for password Entry End =====================//
  		}
 	
		
		if($customerSave){
		
	
			//===================== Save customer Table =================
				$this->request->data['ServiceDeviceInfo']['pos_customer_id'] =  $PosCustomerSaveId;
		
 				$this->request->data['ServiceDeviceInfo']['user_id'] =  $userSave['User']['id'];
				$this->request->data['ServiceDeviceInfo']['status'] =  1;
				$this->request->data['ServiceDeviceInfo']['recive_date'] = date("Y-m-d H:i:s" ,strtotime($this->request->data['ServiceDeviceInfo']['recive_date']));
				$this->request->data['ServiceDeviceInfo']['estimated_date'] = date("Y-m-d H:i:s" ,strtotime($this->request->data['ServiceDeviceInfo']['estimated_date']));
				
				
				//============================Invoice image========================================//	
			App::uses('Sanitize', 'Utility');
			$output= array();  
			$fileDestination = 'files/upload/serviceinfo';
			$options = array();    
			if(!empty($this->request->data['ServiceDeviceInfo']['screenimage']['name'])){
				try{
					$output = $this->ImageUploader->upload($this->request->data['ServiceDeviceInfo']['screenimage'],$fileDestination,$options);     	}
				catch(Exception $e)
				{ 
					$output = array('bool'=>FALSE,'error_message'=>$e->getMessage());
				} 
				$this->request->data['ServiceDeviceInfo']['screenimage'] = $output['file_path'];
			}
			
			else{
				$this->request->data['ServiceDeviceInfo']['screenimage'] ='';
				}
			  
		//============================Invoice image=======================================//
		
		
		
 				$this->ServiceDeviceInfo->create();
				if ($this->ServiceDeviceInfo->save($this->request->data['ServiceDeviceInfo'])) {
					
					$serviceDeviceSaveId = $this->ServiceDeviceInfo->getLastInsertId();
					//==================== Generate Barcode ===============
					$this->add_barcode($this->request->data['ServiceDeviceInfo']['pos_customer_id'] ,$serviceDeviceSaveId , $this->request->data['ServiceDevice']['name']);
					
 					if(!empty($this->request->data['ServiceDeviceAcessory'])){
	
						$this->loadModel('ServiceDeviceAcessory');
					 
						foreach($this->request->data['ServiceDeviceAcessory']['service_acessory_id'] as $key=>$serviceacesoryid){
						
					 
							$acesorySaveData['service_device_info_id'] = $serviceDeviceSaveId;
							$acesorySaveData['service_acessory_id'] = $serviceacesoryid;
							$this->ServiceDeviceAcessory->create();
							$this->ServiceDeviceAcessory->save($acesorySaveData);
						}
					}
					
					if(!empty($this->request->data['ServiceDeviceDefect'])){
	
						$this->loadModel('ServiceDeviceDefect');
					 
						foreach($this->request->data['ServiceDeviceDefect']['service_defect_id'] as $defectid){
							
							$defectSaveData['service_device_info_id'] = $serviceDeviceSaveId;
							$defectSaveData['service_defect_id'] = $defectid;
							$this->ServiceDeviceDefect->create();
							$this->ServiceDeviceDefect->save($defectSaveData);
						}
					}
 					 
					echo $serviceDeviceSaveId;
					 
				 
				} else {
					 echo "Saved Failed.";
				}

			}	
			  	 Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
      }
		$users = $this->ServiceDeviceInfo->User->find('list');
		$serviceDevices = $this->ServiceDeviceInfo->ServiceDevice->find('list');
		$this->set(compact('users', 'serviceDevices'));
		$this->set('page_titles', 'New ServiceDeviceInfo'); 
 
	}
	
	//========================== Generate Barcode ==========================
	
		function add_barcode( $customer_id = null , $invoice_id = null, $device_name = null) {
			
			Configure::write('debug', 0); 
			$this->autoRender = false;
			
 		if (!empty($customer_id ) && !empty($invoice_id ) ) {
 			 
			$barcode=new BarcodeHelper();
 			// Generate Barcode data
 			$barcode->barcode();
			$barcode->setType('C128');
			$barcode->hideCodeType();
			$barcode->setSize(40,120);
 
 			$data_to_encode = "SPR-".sprintf('%05d', $invoice_id);
			$device_name = explode("-",$device_name);
			$barcode->setProductName($device_name[0]); 

			$barcode->setCode($data_to_encode);
			 $br_data['ServiceDeviceInfo']['barcode_no'] = $data_to_encode;
			// Generate filename    
			$maxNumberIt = sprintf('%05d', $invoice_id); 
			   
			$file = 'img/serviceBarcode/SPR-'.$maxNumberIt.'.png';
			//echo $file;
			$br_data['ServiceDeviceInfo']['barcode_file'] = $file;
		
			// Generates image file on server           
			$barcode->writeBarcodeFile($file);
 			$br_data['ServiceDeviceInfo']['id'] = $invoice_id;
			$this->ServiceDeviceInfo->save($br_data);
			return true;
 		}
  	}

	
		
	function recieve( $id = null ){
			
	  $this->ServiceDeviceInfo->User->unbindModelAll();
	  $this->ServiceDeviceInfo->ServiceDevice->unbindModelAll();
	  $this->ServiceDeviceInfo->ServiceInvoice->unbindModelAll();
	  $this->ServiceDeviceInfo->ServiceDeviceAcessory->unbindModel(array('belongsTo'=>array('ServiceDeviceInfo')));
	  $this->ServiceDeviceInfo->ServiceDeviceDefect->unbindModel(array('belongsTo'=>array('ServiceDeviceInfo')));
	  		
	
	  $this->ServiceDeviceInfo->ServiceDevice->bindModel(array(
	  	'belongsTo'=>array('PosBrand'=>array(
		'className' => 'PosBrand',
		'foreignKey' => 'pos_brand_id',
		'dependent' => false,
		))), false);  
			
			$this->ServiceDeviceInfo->recursive = 2;
		 	$deviceRecive=$this->ServiceDeviceInfo->find('first',array('conditions'=>array('ServiceDeviceInfo.id'=>$id)));
			// pr($deviceRecive);
			$this->set('deviceRecive',$deviceRecive);
			
		$this->set('is_repet',$this->ServiceDeviceInfo->find('first',array('field'=>array('id'),'conditions'=>array('ServiceDeviceInfo.serial_no'=>$deviceRecive['ServiceDeviceInfo']['serial_no'] ,'ServiceDeviceInfo.id !='=>$deviceRecive['ServiceDeviceInfo']['id']  ),'recursive'=>-1)));
		 $this->layout = 'ajax';					
	 }
	

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid service device info', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->data)) {
			if ($this->ServiceDeviceInfo->save($this->data)) {
				echo "Successfully Update.";
			} else {
			    echo "Update Failed.";	 
			}
             Configure::write('debug', 0); 
			 $this->autoRender = false;
			 exit();
		}
      }
		if (empty($this->data)) {
			$this->data = $this->ServiceDeviceInfo->read(null, $id);
		}
		$users = $this->ServiceDeviceInfo->User->find('list');
		$serviceDevices = $this->ServiceDeviceInfo->ServiceDevice->find('list');
		$this->set(compact('users', 'serviceDevices'));
     $this->set('page_titles', 'Update ServiceDeviceInfo'); 
	}


    function client_service(){
	
		 $id = $this->Session->read('Auth.User.id');
		   
		  
		   $this->ServiceDeviceInfo->recursive = 0;
		   
		   $this->paginate = array(
					'conditions'=>array('ServiceDeviceInfo.user_id'=>$id),
					'limit' => '20',
					'order' =>array('ServiceDeviceInfo.modified'=>'desc'),
				);
			$this->set('serviceDeviceInfos', $this->paginate('ServiceDeviceInfo'));
			
		
		
		$this->layout = 'client_layout';
	}
	
	
	function client_communication( $yes = null ){
	
	
     
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('ServiceDeviceInfoSearch');
            $this->Session->write( 'ServiceDeviceInfoSearch', $this->request->data );
        }
         if( $this->Session->check( 'ServiceDeviceInfoSearch' ) ){
              $this->request->data = $this->Session->read( 'ServiceDeviceInfoSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ServiceDeviceInfoSearch' );
			$this->ServiceDeviceInfo->recursive = 0;
			$this->paginate  = array(
			    'conditions' => array('ServiceDeviceInfo.status' => array(12,13)),
 				'limit' => '20',
				'order' =>array('ServiceDeviceInfo.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
 	
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data),'ServiceDeviceInfo.status' => array(12,13)),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'ServiceDeviceInfo'),
					'order' =>$this->Filter->sortoption($this->request->data,  'ServiceDeviceInfo'),
        		);
 			
		$this->loadModel('PosCustomer');	
 		    $this->ServiceDeviceInfo->bindModel(  array('belongsTo' => array(
			   'PosCustomer' => array(
					'className' => 'PosCustomer',
					'foreignKey' => 'pos_customer_id',
					'type' => 'INNER'
					)
				)
          ) );	
				
		$this->ServiceDeviceInfo->recursive =0;
		$this->set('client_comms', $this->paginate());
		//pr($this->paginate());die();
        $this->set('sortoption',array());
      
	
		
	
	    $this->set('page_titles', 'Customer Communcation'); 
	
	
	
	
	}
	
	
	function waiting_for_parts( $yes = null ){
	
	
     
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('ServiceDeviceInfoSearch');
            $this->Session->write( 'ServiceDeviceInfoSearch', $this->request->data );
        }
         if( $this->Session->check( 'ServiceDeviceInfoSearch' ) ){
              $this->request->data = $this->Session->read( 'ServiceDeviceInfoSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ServiceDeviceInfoSearch' );
			$this->ServiceDeviceInfo->recursive = 0;
			$this->paginate  = array(
			    'conditions' => array('ServiceDeviceInfo.status' => array(14)),
 				'limit' => '20',
				'order' =>array('ServiceDeviceInfo.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
 	
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data),'ServiceDeviceInfo.status' => array(14)),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'ServiceDeviceInfo'),
					'order' =>$this->Filter->sortoption($this->request->data,  'ServiceDeviceInfo'),
        		);
 			
		$this->loadModel('PosCustomer');	
 		    $this->ServiceDeviceInfo->bindModel(  array('belongsTo' => array(
			   'PosCustomer' => array(
					'className' => 'PosCustomer',
					'foreignKey' => 'pos_customer_id',
					'type' => 'INNER'
					)
				)
          ) );	
				
		$this->ServiceDeviceInfo->recursive =0;
		$this->set('client_comms', $this->paginate());
		//pr($this->paginate());die();
        $this->set('sortoption',array());
      
	
		
	
	    $this->set('page_titles', 'Waiting For Parts'); 
	
	
	
	
	}
	
	
	
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for service device info', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ServiceDeviceInfo->delete($id)) {
			$this->Session->setFlash(__('Service device info deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Service device info was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}}
