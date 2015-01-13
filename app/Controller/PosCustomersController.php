<?php class PosCustomersController extends AppController {
  
   var $name = 'PosCustomers'; 
   var $components = array( 'RequestHandler', 'Filter');
   var $helpers=array('Time'); 

    function filtercondition($data=null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'PosCustomer');
			
		if(!empty($this->request->data['PosCustomer']['name']))
			{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
					$conditionarray .= 'PosCustomer.name like \'%'.$this->request->data['PosCustomer']['name']."%'";		
					
			 }
		
		if(!empty($this->request->data['PosCustomer']['email']))
			{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
					$conditionarray .= 'PosCustomer.email like \'%'.$this->request->data['PosCustomer']['email']."%'";		
					
			 }
			 
			 
			 
		if(!empty($this->request->data['PosCustomer']['customer_type']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
						$conditionarray .= 'PosCustomer.customer_type ='.$this->request->data['PosCustomer']['customer_type'];	
					
			 }

 
 		return $conditionarray;	
	}
    

	function index($yes = null , $is_report = null) {
    
    	if( ! empty( $this->request->data) ){
            $this->Session->delete('PosCustomerSearch');
            $this->Session->write( 'PosCustomerSearch', $this->request->data );
        }
         if( $this->Session->check( 'PosCustomerSearch' ) ){
              $this->request->data = $this->Session->read( 'PosCustomerSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'PosCustomerSearch' );
			$this->PosCustomer->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('PosCustomer.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'PosCustomer'),
					'order' =>$this->Filter->sortoption($this->request->data,  'PosCustomer'),
        		);

    
		$this->PosCustomer->recursive = 0;
		 
		$this->set('posCustomers', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'List of Customer '); 
	   if($is_report == 'yes'){
 		$this->layout  = 'wcreport';
		$this->render('/pos_customers/customerlist');
		  }
	
	}
	

	function invoice($id=null){
			$this->loadModel("PosSale");
			$invoices=$this->PosSale->find("all", array('conditions' =>array("PosSale.pos_customer_id"=>$id)));
			$this->set("invoices",$invoices);
			$this->loadModel("PosBrand");
			$this->set("brand",$this->PosBrand->find("list"));
			$this->loadModel("PosProduct");
			$this->set("product",$this->PosProduct->find("list",array("fields"=>array("id","name"))));
			$this->loadModel("PosPcategory");
			$this->set("category",$this->PosPcategory->find("list"));
			$posCustomer=$this->PosCustomer->find('first',array('conditions'=>array('PosCustomer.id'=>$id)));
			
			 $this->loadModel('PosSale');
		 $totalsales=$this->PosSale->find('all',array('conditions'=>array('PosSale.pos_customer_id'=>$id)));
		 $this->set('totalsales',$totalsales);
			
			$this->loadModel('ServiceDeviceInfo');
		  $this->ServiceDeviceInfo->recursive = -1;
		  $totalservices=$this->ServiceDeviceInfo->find('all',array('conditions'=>array('ServiceDeviceInfo.pos_customer_id'=>$id)));		  
		  $this->set('totalservices',$totalservices);
		  
		  
		 //pr($posCustomer);
        $this->set('page_titles', " Inovice List of ".$posCustomer['PosCustomer']['name']); 
 	}


	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pos customer', true));
			$this->redirect(array('action' => 'index'));
		}
		 $this->set('posCustomer', $this->PosCustomer->read(null, $id));
         $this->set('page_titles', 'View of Customer'); 
		 $this->loadModel('PosSale');
		 $totalsales=$this->PosSale->find('all',array('conditions'=>array('PosSale.pos_customer_id'=>$id)));
		 $this->set('totalsales',$totalsales);
		  //pr($totalsales);
		   $this->loadModel('PosCustomerLedger');
		  
		   $customer_ledgers=$this->PosCustomerLedger->query("select `account_head_id`, (SELECT `title` FROM `mayasoftbd_accounts_heads` WHERE `id`=`account_head_id`)AccountName, sum((case `debit_credit` when '1' then -`amount` else `amount` end))Balance from mayasoftbd_pos_customer_ledgers where `pos_customer_id`= ' $id ' group by 'account_head_id',AccountName");
         
		  $this->set('customer_ledgers',$customer_ledgers);
		 // pr($customer_ledgers);
		  
		  
		  $this->PosCustomerLedger->recursive = -1;
		  $customer_heads=$this->PosCustomerLedger->find('all',array('conditions'=>array('PosCustomerLedger.pos_customer_id'=>$id)));
		  $this->set('customer_heads',$customer_heads);
		  
		  $this->loadModel('ServiceDeviceInfo');
		  $this->ServiceDeviceInfo->recursive = -1;
		  $totalservices=$this->ServiceDeviceInfo->find('all',array('conditions'=>array('ServiceDeviceInfo.pos_customer_id'=>$id)));		  
		  $this->set('totalservices',$totalservices);
		  
		  //pr($customer_heads);
	
	
	}

	function add() {
    if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
				//=========================User Add Start================//
					$userdata['User']['email_address']=$this->request->data['PosCustomer']['email'];
					$userdata['User']['firstname'] = $this->request->data['PosCustomer']['name'];
					$userdata['User']['phone'] = $this->request->data['PosCustomer']['mobile'];
		 			$userdata['User']['piva'] = $this->request->data['PosCustomer']['iva'];
					$userdata['User']['address'] = $this->request->data['PosCustomer']['address'];
					$userdata['User']['companyname'] = $this->request->data['PosCustomer']['companyname'];
					$userdata['User']['type_of_user'] = $this->request->data['PosCustomer']['customer_type'];
					//$userdata['User']['type_of_user'] = 4;
					$userdata['User']['active'] = 1;
					$userdata['Group']['group_id'] = 6;
					
						$this->loadModel('User');
						$this->User->create();
						$this->User->save($userdata);
						$userid=$this->User->getLastInsertId();
					$this->request->data['PosCustomer']['user_id']= $userid;
					
				//{==== mail notification for password Entry Start =====================//
										 
				  	/*$fu=$this->User->find('first',array('conditions'=>array('User.email_address'=>$userdata['User']['email_address'])));
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
								->send("Hey, we heard you lost your SolutionPointRoma password.Say it ain't so!<br>Use the following link reset your password:<br><br>".$ms."<br><br>Thanks,<br>
The SolutionPointRoma Team");
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
						*/
						
		   			 //==== mail notification for password Entry End =====================}//
					 
				//=========================User Add End================//	
		 
		 	$this->PosCustomer->create();
			if ($this->PosCustomer->save($this->request->data)) {
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
      }
	   
	 // pr($cat_type);
  	  $this->set('page_titles', 'Add New Customer'); 

	}
	//====================== exist_email_check() used for customer add,===============
	function exist_email_check($email=null,$id= null){
		if(empty($id)){
			$already_customer = $this->PosCustomer->find('first',array('conditions'=>array('PosCustomer.email'=>$email)));
		}
		else{
		 	$already_customer = $this->PosCustomer->find('first',array('conditions'=>array('PosCustomer.id !='=>$id,'PosCustomer.email'=>$email)));
		}
		 
		if(!empty($already_customer))
			{
				echo 1;
			}
		else{
				echo 0;
			}
			
				Configure::write('debug', 0); 
				$this->autoRender = false;
				exit();
			
	}
	

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid pos customer', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			//=========================User Add Start================//
					$userdata['User']['email_address']=$this->request->data['PosCustomer']['email'];
					$userdata['User']['firstname'] = $this->request->data['PosCustomer']['name'];
					$userdata['User']['phone'] = $this->request->data['PosCustomer']['mobile'];
		 			$userdata['User']['piva'] = $this->request->data['PosCustomer']['iva'];
					$userdata['User']['address'] = $this->request->data['PosCustomer']['address'];
					$userdata['User']['companyname'] = $this->request->data['PosCustomer']['companyname'];
					$userdata['User']['type_of_user'] = $this->request->data['PosCustomer']['customer_type'];
					//$userdata['User']['type_of_user'] = 4;
					$userdata['User']['active'] = 1;
					$this->loadModel('User');
					if(empty($this->request->data['PosCustomer']['user_id'])){
						 	$userdata['Group']['group_id'] = 6;
							$this->User->create();
							$this->User->save($userdata);
							$userid=$this->User->getLastInsertId();
							$this->request->data['PosCustomer']['user_id']= $userid;
							
					}
					else{
							$userdata['User']['id']= $this->request->data['PosCustomer']['user_id'];
							$this->User->save($userdata);
					}
				   	
					
				//{==== mail notification for password Entry Start =====================//
										 
				  	/*$fu=$this->User->find('first',array('conditions'=>array('User.email_address'=>$userdata['User']['email_address'])));
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
								->send("Hey, we heard you lost your SolutionPointRoma password.Say it ain't so!<br>Use the following link reset your password:<br><br>".$ms."<br><br>Thanks,<br>
The SolutionPointRoma Team");
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
						*/
						
		   			 //==== mail notification for password Entry End =====================}//
					 
				//=========================User Add End================//	
			
		
		
			if ($this->PosCustomer->save($this->request->data)) {
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
			$this->request->data = $this->PosCustomer->read(null, $id);
		}
		//pr($this->request->data);
	   
     $this->set('page_titles', 'Update Customer'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pos customer', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->loadModel('PosSale');
		$this->loadModel('PosCustomerLedger');
		
	 $is_purchase = $this->PosSale->find('first',array('conditions'=>array('PosSale.pos_customer_id' => $id),'recursive'=> -1));
 		 $is_ledger = $this->PosCustomerLedger->find('first',array('conditions'=>array('PosCustomerLedger.pos_customer_id' => $id),'recursive'=> -1));
 	 
	 
	 	if(!empty($is_purchase)){
			$this->setFlashMessage(__('Sorry Customer is not deleted. His has sales data. ', 'warnning_message'));
			$this->redirect(array('action'=>'index'));
		
		}else if(!empty($is_ledger)){
			
			$this->setFlashMessage(__('Sorry Customer is not deleted. His has accounts data.', 'warnning_message'));
			$this->redirect(array('action'=>'index'));
		}else{
			if ($this->PosCustomer->delete($id)) {
				$this->setFlashMessage(__('Customer deleted', 'multidelete'));
				$this->redirect(array('action'=>'index'));
			}
		}
		 $this->setFlashMessage(__('Customer  was not deleted', 'multidelete'));
		 $this->redirect(array('action' => 'index'));
	}
}
