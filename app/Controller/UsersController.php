<?php
App::uses('AppController', 'Controller');
/**  
 * Users Controller
 * 
 * @property User $User
 * @property SessionComponent $Session
 * @property EmailComponent $Email 
 * @property CookieComponent $Cookie
 */
class UsersController extends AppController {
    /**
    * Helpers
    *  
    * @var array
    */
   
	public $helpers = array('Captcha', 'Country' => array("cache" => array('time' => "-7 days",'key' => 'country')));
   /**
    * Components
    *
    * @var array
    */
	public $components = array( 'Email', 'Cookie'  ); 
	//var $components = array('Captcha'=>array('jquerylib'=>true));//'Captcha'
	//=============  Get Info For Serverice Info ==================

	public function getUserInfo($id = null) {
          if ($id != null) {
 			$this->layout = 'ajax';
 			$this->autoRender = false;
			$response = array();
 			$this->User->recursive = -1;
			$response = $this->User->find( 'first', array('fields'=>array('email_address','name','phone','piva','address'),'conditions' => array('User.id ='.$id)) );
 			echo json_encode($response);
 			
			exit();
		}
     }
	 
	
	//====================== Get Email list if Find ===============
	public function getEmailList($search_data = null) {
         
		  if ($search_data != null) {
 			$this->layout = 'ajax';
			$response = array();
 			$this->User->recursive = -1;
			$response = $this->User->find( 'all', array('fields'=>array('id','email_address','name'),'conditions' => array('User.email_address like \'%'.$search_data."%'"),'order'=>array('email_address'=>'asc')) );
  			echo json_encode($response);
 			$this->autoRender = false;
			exit();
        }	
		
	}
	//====================== Get Mobile list if Find ===============
	public function getMobileList($search_data = null) {
         
		  if ($search_data != null) {
 			$this->layout = 'ajax';
			$response = array();
 			$this->User->recursive = -1;
			$response = $this->User->find( 'all', array('fields'=>array('id','phone','name'),'conditions' => array('User.phone like \'%'.$search_data."%'"),'order'=>array('phone'=>'asc')) );
  			echo json_encode($response);
 			$this->autoRender = false;
			exit();
        }	
		
	}
	
	//====================== Get User list if Find ===============
	public function getUserNameList($search_data = null) {
         
		  if ($search_data != null) {
 			$this->layout = 'ajax';
			$response = array();
 			$this->User->recursive = -1;
			$response = $this->User->find( 'all', array('fields'=>array('id','phone','name'),'conditions' => array('User.name like \'%'.$search_data."%'"),'order'=>array('name'=>'asc')) );
  			echo json_encode($response);
 			$this->autoRender = false;
			exit();
        }	
		
	}
	
  
	public function filtercondition($data=null)
	{
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'User');
  			
			if(!empty($this->request->data['User']['firstname']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
					$conditionarray .= 'User.firstname like \'%'.$this->request->data['User']['firstname']."%'";		
					
			 }
				 
		return $conditionarray;	
	}
   /**
    * index method
    *
    * @return void
    */
	public function index($yes = null) {
		
		if( ! empty( $this->request->data ) ){
		    $this->Session->delete('userSearch');
            $this->Session->write( 'userSearch', $this->request->data );
       	 }
         if( $this->Session->check( 'userSearch' ) ){
             $this->request->data = $this->Session->read( 'userSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'userSearch' );
 			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('Group.name'=>'ASC'),
 			);
			//$this->request->data='';
	   }
  			$this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'User'),
					'order' =>array('Group.name asc'),
        		);
				//pr($this->request->data);
			//pr($this->paginate());	
	 	$this->LoadModel('Group');
	 	$this->User->Group->unbindModel(array('hasAndBelongsToMany' => array('Permission')));
		$this->User->recursive = 1;
		 
		$this->set('users', $this->paginate('Group'));
		$this->set('sortoption',array('name'=>'name'));
		$this->set('page_titles', 'User List'); 
 
	}
	
	/**
	 * Define allowed action without loging in
	 * @see AppController::beforeFilter()
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add', 'checkusername', 'logout');
	}

   /**
    * view method
    *
    * @param string $id
    * @return void
    */
	public function view($id = null) {
	 
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$user = $this->User->read(null, $id);
			//pr($user);
		$this->set('user',$user);
		$this->loadModel('Group');
		$this->set('Permissions',$this->Group->find('first',array('conditions'=>$user['Group'][0]['id'])));
		$this->set('user', $this->User->read(null, $id));
		$this->set('page_titles', 'User View'); 
	}
	
	
	function captcha(){
		 $this->autoRender = false;
                $this->layout='ajax';
                if(!isset($this->Captcha))        { //if Component was not loaded throug $components array()
                        $this->Captcha = $this->Components->load('Captcha', array(
                                'width' => 150,
                                'height' => 50,
                                'theme' => 'random', //possible values : default, random ; No value means 'default'
                        )); //load it
                        }
                $this->Captcha->create();
	}
	
	
	public function login_popup(){
		
		 $this->Captcha = $this->Components->load('Captcha', array('captchaType'=>'image', 'jquerylib'=>true, 'modelName'=>'User', 'fieldName'=>'captcha'));
		if ($this->request->is('post')) {
			if(!empty($this->request->data))	{
				$this->autoRender = false;
				$this->layout = 'ajax';
			 
			$this->User->setCaptcha($this->Captcha->getVerCode()); //getting from component and passing to model to make proper validation check
			$this->User->set($this->request->data);
			 if($this->User->validates()){		
			if ($this->Auth->login()) {
				$this->setFlashMessage(__('Login Success'), 'success');
				echo '1';
 			} }
			else{
				 $errorArray = $this->validateErrors($this->User);
 								if(isset( $errorArray)){
									echo $errorArray['captcha'][0];
			}
		}
		}
		}
		
		$this->layout =  'ajax';
	}
	
	public function user_registration(){
   	
 	 $this->Captcha = $this->Components->load('Captcha', array('captchaType'=>'image', 'jquerylib'=>true, 'modelName'=>'User', 'fieldName'=>'captcha'));
			 
 		if(!empty($this->request->data))	{
  			$this->User->set($this->request->data);
			
	   	if ($this->request->is('post')) {
					$userinfo_array = $this->request->data;
					 
					$this->User->setCaptcha($this->Captcha->getVerCode()); //getting from component and passing to model to make proper validation check
					$this->User->set($this->request->data);
 					
					 if($this->User->validates()){
						$this->User->create();
						
						$this->request->data['User']['type_of_user'] = 3;
						$this->request->data['User']['active'] = 1;
						
						if ($this->User->save($this->request->data)) {
							
							 
 
 							  App::uses('CakeEmail', 'Network/Email');
									$email = new CakeEmail();
									$email->from("saddamhossoin@gmail.com")
									//->to($this->request->data['User']['email_address'])
									->to("saddamhossoin@gmail.com")
									->subject('Success Mail')
									->template('userregistration')
									->emailFormat('html')
									->viewVars(array('userinfo_array' => $userinfo_array))
									->send();  
								 
								if ($this->Auth->login()) {
  									echo '1';
  								} 
							
							
							$this->redirect(array('controller'=>'Users','action'=>'online_user_dashboard'));
							} 
				 	 }
				else {
							 $errorArray = $this->validateErrors($this->User);
 								if(isset( $errorArray)){
									echo $errorArray['captcha'][0];
 						 }
 				}
				$this->autoRender = false;
     			exit();
	   		}
  	   }
	   
	 
	
	}
	 
	/**
	 * View client
	 * 
	 * @param int $id
	 */
	public function viewclient( $id = null ) {
		if (!$id) {
			$this->setFlashMessage(__('Invalid User.'), 'warning');
			$this->redirect(array('action'=>'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

   /**
    * add method
    *
    * @return void
    */
	public function add() {
	
	if ($this->request->is('ajax')) {
		if ($this->request->is('post')) {
		  		$password=$this->request->data['User']['password'];
		 	$this->User->create();
		 	if ($this->User->save($this->request->data)) {
			  		 echo 'Success :: Add new user '. $this->request->data['User']['email_address']; 
					$this->setFlashMessage(__('The User has been saved'), 'success');
					$userinfo_array=$this->request->data;
					 	
						App::uses('CakeEmail', 'Network/Email');
						$email = new CakeEmail();
						$email->from("info@spr.com")
						->to($this->request->data['User']['email_address'])
						->subject('Successfully User Create')
						->template('userregistration')
						->emailFormat('html')
						->viewVars(array('userinfo_array' => $userinfo_array,'password'=>$password))
						->send();
						
			 	  
			} else {
			 		if($this->User->validates()) {
					  $this->autoRender = false;
				  }
				  else {
					 $errorArray = $this->validateErrors($this->User);
				 		if(isset( $errorArray)){
							echo $errorArray['userpassword']."<br />";
							echo $errorArray['email_address'];
					 }
				  }
		 	
			}
			
				 Configure::write('debug', 0); 
				 $this->autoRender = false;
			 	 exit();
		}
	}
		$this->set('grouplist', $this->User->Group->find('list'));
	 	$this->set('page_titles', 'Add New User'); 
	}
	
	/**
	 * For auto generating password
	 * 
	 * @param int $length - Length of the desired password. Defaults to 8.
	 */
	public function generatePassword ($length = 8){
		// inicializa variables
		$password = "";
		$i = 0;
		$possible = "0123456789bcdfghjkmnpqrstvwxyzJEWEL"; 
		
		// agrega random
		while ($i < $length){
			$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
			
			if (!strstr($password, $char)) { 
				$password .= $char;
				$i++;
			}
		}
		return $password; 
	}	

   /**
    * edit method
    *
    * @param string $id
    * @return void
    */
	public function edit($id = null) {
 		if ($this->request->is('ajax')) {
		if (!empty($this->request->data) && $this->request->is('post') || $this->request->is('put')) {
		
 			if ($this->User->save($this->request->data, false)) {
			        echo 'Success :: Update User'; 
			}
			 else {
				echo "error";
			}
 		} 
		$this->autoRender = false;
				exit(); 
	}
		else {
			$this->request->data = $this->User->read(null, $id);
				}
		//$groups = $this->User->Group->find('list');
		$this->LoadModel('GroupsUser');
		$this->set('grouplist', $this->User->Group->find('list',array('fields' => array('id','name')),array('conditions'=>array('Group.id'=>'GroupsUser.group_id'))));
		//$this->set(compact('groups'));
		$this->set('page_titles', 'Edit User'); 
	}
	
	/**
	 * Add info method
	 */
	 
	
	public function choicedegree() {
		$this->layout='default'; 

		if ($this->request->is('ajax')) {
			if ($this->request->is('post')) {
				$this->User->create();
				
				// Generate Random Password 
				$passwordval=$this->generatePassword();
				$this->request->data['User']['password']=Security::hash($passwordval,null,true);
				//$this->request->data['User']['createdby']=$this->Auth->user('id'); 
				$this->request->data['Group']['Group'][0]='4d36e784-9360-414c-bffb-0978c506def9';
				
			 	if ($this->User->save($this->request->data)) {
					$this->User->Group->create();
					$this->User->Group->save($this->request->data);
					$this->request->data['User']['id']= $this->User->getLastInsertId(); 
					$this->sendEmail($this->request->data,$passwordval);
					echo '<h1 style="padding-top:70px;">Thank you!</h1><br /><p>Please check your email and click on the link provided in the email in order to activate your account.</p><br /> Click here to <a href="/users/login">Login</a>'; 
				}
				else {
					if($this->User->validates()) {
						$this->autoRender = false;
				  	}
				  	else {
						$errorArray = $this->validateErrors($this->User);
						
				  		if(isset( $errorArray)) {
							echo $errorArray['email_address'] ."<br />";
					 	}
				 	}
				}
 				$this->autoRender = false;
				exit();  
			} 
		}
 		if (empty($this->request->data)) {
			// Start for listing the group 
			$this->set('grouplist', $this->User->Group->find('list'));
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->setFlashMessage(__('User deleted'), 'info');
			$this->redirect(array('action' => 'index'));
		}
		$this->setFlashMessage(__('User was not deleted'), 'warning');
		$this->redirect(array('action' => 'index'));
	}
	
	/**
	 * This is the login handler action
	 */
    public function login() {
		if ($this->request->is('post')) {
 			if ($this->Auth->login()) {
				$this->redirect(array('action' => 'admindashboard'));
			} else {
				$this->setFlashMessage(__('Invalid username or password, try again'), 'error');
			}
		}
	$this->layout = 'login';
	}
	 
 	/**
	 * Logout is handled here
	 */
	
 	public function logout() {
	    $this->Session->destroy();
		$this->redirect($this->Auth->logout());
	}
	
 	
 	/**
	 * Checks if the email address is already registered or not
	 * 
	 * @param email $email
	 */
	public function checkusername($email = null) {
		 
		Configure::write('debug', 0);
			$this->autoRender=false;
		 	if ($this->request->is('ajax')) {
			$conditions = array("User.email_address" =>$email);
			$query=$this->User->find('first', array('conditions' => $conditions));
			if(strlen($email)==0){
				echo 1;
			}
			else if(strlen($email)<5){
				echo 2;
			}
			else if(!empty($query)){
				echo 3;
			}
			else{
				echo 4;
				}
		 }
	}
	 
 	
	/**
	 * This is the dashboard, user area home.
	 */
	public function admindashboard() {
		    if($this->Session->read('groupname') == 'SuperAdmin'){
				$this->redirect(array('action' => 'dashboard'));
			}
		   else if($this->Session->read('groupname') == 'Admin'){
				$this->redirect(array('action' => 'dashboard'));
			}
		  else if($this->Session->read('groupname') == 'Chief_Tech'){
				$this->redirect(array('action' => 'chiefdashboard'));
			}
		 else if($this->Session->read('groupname') == 'Technician'){
				$this->redirect(array('controller'=>'Assesments','action' => 'techdashboard'));
			}
		 else if($this->Session->read('groupname') == 'Client'){
				$this->redirect(array('action' => 'userdashboard'));
			}
		 else if($this->Session->read('groupname') == 'Customer'){
				$this->redirect(array('action' => 'userdashboard'));
			}
		 else if($this->Session->read('groupname') == 'Front_User'){
				$this->redirect(array('action' => 'userdashboard'));
			}
		 
		 	
			else{
				$this->redirect(array('controller'=>'Users','action' => 'logout'));
				//$this->Session->setFlash(__('Invalid username or password, try again'),'fail_message');
			}
		 
	}
	function chiefdashboard(){
	
	$id = $this->Auth->user('id');
	$this->loadModel('ServiceDeviceInfo');
 	$this->loadModel('DeviceCheckList');
 
		  
	
    $this->ServiceDeviceInfo->recursive =0;
	
	$response = $this->ServiceDeviceInfo->find('all',
	array(	'fields'=>array('ServiceDeviceInfo.id','ServiceDeviceInfo.status','ServiceDeviceInfo.is_urgent','ServiceDeviceInfo.serial_no','ServiceDeviceInfo.recive_date','ServiceDeviceInfo.estimated_date','ServiceDevice.name','User.name'),
			'conditions'=> array('ServiceDeviceInfo.status'=>array(1,3,11,7,8))));
	//pr($response);
	 
	$this->set('serviceDeviceInfoLists', $response);
 
	$this->set('page_titles', 'Chief Dashboard'); 
 	}
	
	function techdashboard(){
	$id = $this->Auth->user('id');
	$this->loadModel('ServiceDeviceInfo');

	$response = $this->ServiceDeviceInfo->find('all',array(	'fields'=>array('ServiceDeviceInfo.id','ServiceDeviceInfo.serial_no','ServiceDeviceInfo.recive_date','ServiceDeviceInfo.estimated_date','ServiceDevice.name','User.name'),'conditions'=> array('ServiceDeviceInfo.status'=>1)) );
	
	 
	$this->set('serviceDeviceInfoLists', $response);
	$this->set('page_titles', 'Technician Dashboard'); 
	
	
	}
	
	
	function intial_assesment(){
			$id = $this->Auth->user('id');
			$this->loadModel('ServiceDeviceInfo');
		
			$response = $this->ServiceDeviceInfo->find('all',
			array(	'fields'=>array('ServiceDeviceInfo.id','ServiceDeviceInfo.status','ServiceDeviceInfo.serial_no','ServiceDeviceInfo.recive_date','ServiceDeviceInfo.estimated_date','ServiceDevice.name','User.name'),
					'conditions'=> array('ServiceDeviceInfo.status'=>1)) );
			
			 
			$this->set('serviceDeviceInfoLists', $response);
			
	
	       $this->set('page_titles', 'Intial Assesment'); 
	}
	
	public function dashboard() {
		$this->set('page_titles', 'Welcome to Dashboard'); 
		$this->set('toolbar', '0'); 
	}
	
	public function userdashboard() {
	    
	  
		
	
		$this->set('page_titles', 'Client Dashboard'); 
		$this->layout = 'client_layout';
	}
	

	
	
	/**
	 * Handles email sending fucntionality
	 * 
	 * @param  $datas
	 * @param  $pass
	 */
	public function sendEmail($datas, $pass) { 
		//================ User Email Send ================= 
		//debug($datas); die();
		$this->set('datas',$datas );
		$this->set('pass',$pass);
		$this->Email->from =  'saddamhossoin@yahoo.com' ; 
		$this->Email->layout = 'default';
		$this->Email->template = 'addinfouser';
		$this->Email->sendAs = 'html';
		$this->Email->subject ='A new reply is posted ';
		$this->Email->to = $datas['User']['email_address'];
		$this->Email->send(); 
		
		//================= Admin Email Send ===============
		$this->set('message',$datas);
		$this->Email->from =  'saddamhossoin@yahoo.com' ; 
		$this->Email->layout = 'default';
		$this->Email->template = 'addinfoadmin';
		$this->Email->sendAs = 'html';
		$this->Email->subject ='A new reply is posted ';
		$this->Email->to = 'saddamhossoin@gmail.com';
		$this->Email->send(); 	
	} 
	
	/**
	 * Handles user activation
	 * 
	 * @param  $activationcode
	 * @param  $id
	 */
	public function activate($activationcode,$id) {
		//$this->User->recursive = -1;
		$this->pageTitle = ' - User Account Activation - ';
		$this->layout = 'default';
		$user = $this->User->find(array('User.id' => $id));
		$this->User->id = $user['User']['id'];
		//die($user['User']['active']);
		
		if($user['User']['active'] == '1'){
			$this->setFlashMessage(__('TXT_MESSAGE_ALREADY_ACTIVATED'));
			$this->set('invalidkey',2);
		} else {
			$user['User']['active'] = 1;
			if(!empty($user)){
				if(!empty($user) && $user['User']['password']==$activationcode){
					if (!empty($user) && $this->User->saveField('active', 1)) {
						$this->setFlashMessage(__('TXT_MESSAGE_USER_STATUS_RESET'));
					}
				}else{
					$this->setFlashMessage(__('TXT_MESSAGE_ALREADY_ACTIVATED'));
				}
			}
			else
			 {
				$this->setFlashMessage(__('TXT_MESSAGE_INVALID_ACTIVATION_KEY'));
				$this->set('invalidkey',1);
				//$this->setFlashMessage('User NOT activated');
			 }
		}
	}
	
	public function myaccount() {
		$id=$this->Auth->user('id');
		
		if (!$id) {
			$this->setFlashMessage(__('Invalid User.'), 'warning');
			$this->redirect(array('action'=>'index'));
		}
		
		$this->set('user', $this->User->read(null, $id));
		$this->set('page_titles', 'My Profile'); 
	}
	
	/**
	 * Handles password forget action
	 */
 
 //=================User satatus active inactive===============//
 
    public function user_status($id=null){
		   
		   	$ustatus = $this->User->find('first',array('conditions'=> array('User.id'=>$id)));
		 	
			$this->set('ustatus',$ustatus);
			
			if($ustatus['User']['active']==1){
				
 			 $this->User->updateAll(array('User.active' =>0),array('User.id'=>$id));
			 
			}
			else if($ustatus['User']['active']==0)
		 	{
				$this->loadModel('PosCustomer');
				$exist_customer = $this->PosCustomer->find('first',array('recursive'=>-1,'conditions'=>array('PosCustomer.email'=>$ustatus['User']['email_address'])));
				 
				$this->request->data['PosCustomer']['email'] = $ustatus['User']['email_address'];
				$this->request->data['PosCustomer']['name'] = $ustatus['User']['firstname'];
				$this->request->data['PosCustomer']['mobile'] = $ustatus['User']['phone'];
				$this->request->data['PosCustomer']['iva'] = $ustatus['User']['piva'];
				$this->request->data['PosCustomer']['address'] = $ustatus['User']['address'];
				$this->request->data['PosCustomer']['user_id'] = $ustatus['User']['id'];
				$this->request->data['PosCustomer']['customer_type'] = $ustatus['User']['type_of_user'];
				
				if(empty($exist_customer)){
					$this->PosCustomer->create();
				 }
				else{
					$this->request->data['PosCustomer']['id'] = $exist_customer['PosCustomer']['id'];
				}
			 		$this->PosCustomer->save($this->request->data['PosCustomer']);
				
								
				 $this->User->updateAll(array('User.active' =>1),array('User.id'=>$id));
				 
				 		/* App::uses('CakeEmail', 'Network/Email');
									$email = new CakeEmail();
									$email->from("matiur1000@yahoo.com")
									->to($ustatus['User']['email_address'])
									->subject('Success Mail')
									->template('userregistration')
									->emailFormat('html')
									->send(); */
									
				}
			
	 		$this->autoRender = false;
	 		exit();
 	}
	
  //=================User satatus active inactive===============//
  
  //=========================Online User dashboard===============//
    public function online_user_dashboard(){
	  $this->layout="wpage";
	}
  //======================================================//
  
  //=================online User list=========================//
   
   public function online_user($yes = null){
	   
			if( ! empty( $this->request->data ) ){
				$this->Session->delete('userSearch');
				$this->Session->write( 'userSearch', $this->request->data );
			 }
			 if( $this->Session->check( 'userSearch' ) ){
				 $this->request->data = $this->Session->read( 'userSearch' );
			   }
		  if($yes == 'yes')
		   {
				$this->Session->delete( 'userSearch' );
				$this->paginate  = array(
					'limit' => '20',
					'order' =>array('Group.name'=>'ASC'),
				);
				//$this->request->data='';
		   }
				$this->paginate  = array(
						'conditions' =>  array($this->filtercondition($this->request->data) ),
						'limit' => $this->Filter->searchlimit($this->request->data , 'User'),
						'order' =>array('Group.name asc'),
					);
					//pr($this->request->data);
				//pr($this->paginate());	
			$this->LoadModel('Group');
			$this->User->Group->unbindModel(array('hasAndBelongsToMany' => array('Permission')));
			$this->User->recursive = 1;
			 
			$this->set('users', $this->paginate('Group'));
			$this->set('sortoption',array('name'=>'name'));
			$this->set('page_titles', 'Online User List'); 
 	}
  //=================online User list=========================//
	 
 
  //=================online User login=========================//
   function minilogin() {
	 if ($this->request->is('ajax')) {
	 if ($this->request->is('post')) {
           if ($this->Auth->login()) {
			   echo '1';
			   $this->autoRender = false;
 			 
			
			$this->autoRender = false;
				}
			}
		  $this->layout = 'ajax';
		 }
		  
   }
   
   
   

 
 //=================online User login=========================//
 
 //==================Client  Profile====================//
 
 	function client_profile( $id = null ){
	
	
	    $this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$user = $this->User->read(null, $id);
			//pr($user);
		$this->set('user',$user);
		$this->loadModel('Group');
		$this->set('Permissions',$this->Group->find('first',array('conditions'=>$user['Group'][0]['id'])));
		$this->set('user', $this->User->read(null, $id));
	
	
	
	
	 $this->layout = 'client_layout';
	}

 //==================Client Profile====================//
 
 
  //==================Client Profile Setting====================//
 
 	function client_profile_setting( $id = null ){
	
	
	 // if ($this->request->is('ajax')) {
		if (!empty($this->request->data) && $this->request->is('post') || $this->request->is('put')) {
		
 			if ($this->User->save($this->request->data, false)) {
			        echo 'Success :: Update User'; 
			}
			 else {
				echo "error";
			}
 		} 
		
	//}
		else {
			$this->request->data = $this->User->read(null, $id);
				}
		//$groups = $this->User->Group->find('list');
		$this->LoadModel('GroupsUser');
		$this->set('grouplist', $this->User->Group->find('list',array('fields' => array('id','name')),array('conditions'=>array('Group.id'=>'GroupsUser.group_id'))));
		//$this->set(compact('groups'));
		
		
	
	
	 $this->layout = 'client_layout';
	}

 //==================Client Profile Setting====================//

	 
    
//===================forget password anwar===================///
	function forgetpwd(){
		
		//$this->layout = 'ajax';
	     $this->User->recursive=0;
		 //if ($this->RequestHandler->isAjax()) {
		 	//pr($this->request->data);
        if(!empty($this->request->data))
        {
            if(empty($this->request->data['User']['email_address']))
            {
                $this->Session->setFlash(__('Please Provide Your Email Adress that You used to Register with Us', true),'warnning_message');
             }
            else
            {
                $email=$this->request->data['User']['email_address'];
                $fu=$this->User->find('first',array('conditions'=>array('User.email_address'=>$email)));
               //pr($fu); die();
			    if($fu)
                {
             //debug($fu);
                    if($fu['User']['active'])
                    {
                        $key = Security::hash(String::uuid(),'sha512',true);
						$url = Router::url( array('controller'=>'users','action'=>'reset'), true ).'/'.$key;
                        $ms=$url;
              			//	$ms=wordwrap($ms,1000);
                       
                        $fu['User']['tokenhash']=$key;
					    $this->User->id=$fu['User']['id'];
						 
                        if($this->User->saveField('tokenhash',$fu['User']['tokenhash'])){
						 
							echo 1;
						
						// debug($fu['User']);die();
  			       //============Email================//
				           /* SMTP Options */
						 	$this->set('ms', $ms);
							 App::uses('CakeEmail', 'Network/Email');
								$email = new CakeEmail();
								$email->from("rupom_a@yahoo.com")
								->to($this->request->data['User']['email_address'])
								->subject('[Precall] Please Reset your password')
								->template('default')
								->emailFormat('html')
								->viewVars(array('Your Reset Password link  ' =>$ms))
								->send("Hey, we heard you lost your Precalls password.Say it ain't so!<br>Use the following link reset your password:<br><br>".$ms."<br><br>Thanks,<br>
The Precalls Team");
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
              
            //  $this->Session->setFlash('This Account is not Active yet.Check Your mail to activate it');
                    }
                }
                else
                {
					echo 0;
					//$this->Session->setFlash(__('Email does Not Exist',true), 'fail_message');		
                  //  $this->Session->setFlash('Email does Not Exist');
                }
            }
        }
    	//}
		
	$this->layout='wpage';
	}
//=======================end forget password=================//

//================reset password================//
	  function reset($token=null){ 
	
	 	$this->User->recursive=-1;
		if ($this->RequestHandler->isAjax()) {
	 	if ($this->request->is('post') || $this->request->is('put')) {
		        if(!empty($this->request->data)){
    				 $this->User->id =  $this->request->data['User']['id'];
                         if($this->User->saveField('password',$this->request->data['User']['password']))
                        {  
                        	echo 1;
							//$this->redirect(array('/'));
						}
						else{
						
							echo 2;
							//$this->Session->setFlash(__('Password Updated Failed! Please try again.',true), 'fail_message');		
                  			//	 $this->Session->setFlash('Password Updated Failed! Please try again.');
 						}
                 }
		 		}
				 }
		else{
         if(!empty($token)){
			 $u=$this->User->findBytokenhash($token);
            	if($u){
		    		 $this->request->data = $u;
				}
            	else
            		{
        			$this->Session->setFlash(__('Token Corrupted,,Please Retry.the reset link work only for once.',true), 'fail_message');		
           			}
				}
				else
				{	 	}
			}
			 
		 	 	$this->layout = 'wpage';

   	} 
  
//==============end reset password==================//
	

	
	
}
