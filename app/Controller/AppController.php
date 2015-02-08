<?php 
/**
 * Application level Controller
 *
 * This file is application-wide controller file. 
 * 
 * @package       app.Controller
 user name : mayasoft
 
 http://mayasoftbd.com:2082/cpsess4983843583/3rdparty/phpMyAdmin/index.php#PMAURL:server=1&target=main.php&token=9c402b2497454273201b3ad9a7957c55
 mayasoft
 CENTOS 6.5
 https://p3plcpnl0344.prod.phx3.secureserver.net:2083/cpsess8741348065/3rdparty/phpMyAdmin/index.php#PMAURL-0:index.php?db=&table=&server=1&target=&lang=en&collation_connection=utf8_general_ci&token=134bd9f720f169d714a3b1f6f014fdd4
 solutionpoint
 mayasoftbd@1A


 */
App::uses('Controller', 'Controller');
App::import('Sanitize');
 
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    private $__js_files = array();
    private $__css_files = array();
    
    public $components = array(
    	'Auth' => array(
            'loginRedirect' => array('controller' => 'users', 'action' => 'admindashboard'),
			'logoutRedirect' =>'/',
            'loginAction' => array('admin' => false, 'controller' => 'users', 'action' => 'login'),
            'authenticate' => array(
                'Form' => array(
                   	'fields' => array('username' => 'email_address', 'password' => 'password'),
    				'userModel' => 'Users.User',
    				'scope' => array('User.active' => 1)
                )
            ),
            'authError' => 'You are not authorized to access that location.',
            'authorize' => array(
	            'all' => array(
	 				'actionPath' => 'controllers/'
	 			), 
	 			'Controller'
	 		), 
			'autoRedirect' => true,
        ),
        'Session', 'RequestHandler','Filter');
        
	public $helpers = array('Html','Form','Session','Time','Menu','Js','Captcha');
   
    public function beforeFilter() {
	
		 
	 $this->Auth->allow(array('admindashboard','user_registration','display','home','forgetpwd','reset','checkusername','captcha','login_popup','captcha','slug_edit','shop','getTypes','getBrands','front_service_view','defect_name','itemupdate','cart','all_order','online_order','sales_order','suspend_order','complete_order','online_sales_invoice','balance_sheet_report','suspend_order','ajax_check_username','user_status','complete_order_online','order_suspend','sales_invoice','checkout','minilogin','device_accessories','address','solid_device','brand_list','review','checklist','client_service','client_sales_list','client_view','client_profile','client_profile_setting','client_communication','waiting_for_parts','invoice_view','send_invoice','barcode_print_product','purchase_barcode','barcode_print_purchase','add_from_product_edit','getProductInfo','checkStatus'));
 		
		if($this->Session->read('groupname')) {
			$groupname=$this->Session->read('groupname');
		}
		else {
		    $this->loadModel('User');
          	$groupname=$this->User->find('all',array('conditions'=>array('id'=>$this->Auth->user('id'))));
          	
	        if(!empty($groupname[0]['Group'][0]['name'])) {
				$groupname=$groupname[0]['Group'][0]['name'];
				$this->Session->write('groupname',$groupname);
			}
		}
	 
		if(!empty($groupname)) {
      	   switch ($groupname) {
              case 'Admin':
                 $this->layout='admin';
                 break;
                 
      		  case 'SuperAdmin':
                 $this->layout='admin';
                 break;
 
 			case 'Customer':
					$this->layout='client_layout';
					break;
       			
              default:
                $this->layout='admin';
          }  
	   }
	   
	   $this->setLayout();
	   $this->loadsession();
    
	
	  //======================== For Menu And All Link Permission  ============
	 //  print_r($this->Session->read('Permissions'));
	  $this->set('permissions',$this->Session->read('Permissions'));
	  $this->set('generalpermit',$this->request->params['controller'].":*");
	  $this->set('actionpermit',$this->request->params['controller'].":".$this->request->params['action']);
	  $this->LoadModel('Lookup');
  
   }
  
   protected function setLayout() {
		
 		if ($this->name == 'CakeError') {
			$this->log ( 'Something broke: write proper log in app_controller.php on line 81' );
			return $this->Session->read ( 'layout.error' );
		}
 			 
		if ( $this->request->params ['controller'] == 'pages' ) {
  			return 'default';
		} 
	}
    /**
     * beforeRender
     * 
     * Application hook which runs after each action but, before the view file is 
     * rendered
     * 
     * @access public 
     */
    public function beforeRender(){
        //If we have an authorised user logged then pass over an array of controllers
        //to which they have index action permission
        if($this->Auth->user()){
            $controllerList = App::objects('controller');
            $permittedControllers = array();
            foreach($controllerList as $controllerItem){
                if($controllerItem <> 'App'){
                    if($this->__permitted($controllerItem,'index')){
                        $permittedControllers[] = $controllerItem;
                    }
                }
            }
        }
        $this->set(compact('permittedControllers'));
    }
	
    /**
     * isAuthorized
     * 
     * Called by Auth component for establishing whether the current authenticated 
     * user has authorization to access the current controller:action
     * 
     * @return true if authorised/false if not authorized
     * @access public
     */
    public function isAuthorized($user = null){ 
        return $this->__permitted(Inflector::camelize($this->name),$this->request->action);
    }
    
    /**
     * __permitted
     * 
     * Helper function returns true if the currently authenticated user has permission 
     * to access the controller:action specified by $controllerName:$actionName
     * @return 
     * @param $controllerName Object
     * @param $actionName Object
     */
    protected function __permitted($controllerName,$actionName){
       
        //Ensure checks are all made lower case
        $controllerName = Inflector::underscore($controllerName);
        $actionName = strtolower($actionName);
        
        //If Permissions have not been cached to session...
        if(!$this->Session->check('Permissions')){
		
            //...then build Permissions array and cache it
            $Permissions = array();
            
            //everyone gets permission to logout
            $Permissions[]='users:logout';
            
            //Import the User Model so we can build up the permission cache
             App::import('Model', 'User');
            $thisUser = new User;
            
            //Now bring in the current users full record along with groups
            $thisGroups = $thisUser->find('first',array('conditions'=>array('User.id' => $this->Auth->user('id'))));
			 
            $thisGroups = $thisGroups['Group'];
             
			 
            foreach($thisGroups as $thisGroup) {
                $thisPermissions = $thisUser->Group->find('first', array('conditions'=>array('Group.id'=>$thisGroup['id'])));
                $thisPermissions = $thisPermissions['Permission'];
                foreach($thisPermissions as $thisPermission){
                    $Permissions[]=$thisPermission['name'];
                }
            }
			 
            //write the Permissions array to session
            $this->Session->write('Permissions',$Permissions);
        } else {
            //...they have been cached already, so retrieve them
            $Permissions = $this->Session->read('Permissions');
        }
        
        //Now iterate through Permissions for a positive match
        foreach($Permissions as $permission){
            if($permission == '*'){
                 return true;//Super Admin Bypass Found
            }
            if($permission == $controllerName.':*'){
                return true;//Controller Wide Bypass Found
            }
            if($permission == $controllerName.':'.$actionName){
                return true;//Specific permission found
            }
        }
        
        return false;
    }
	
	public function loadsession() { 
	
		$_SESSION['tax'] = 22;
		$this->set('tax',$_SESSION['tax']);
		//================ Set User lists ===============
      	if(empty($_SESSION['userlists']))
      	{
      		$userlists = $this->User->find('list',array('fields'=>array('id','firstname')));
        	$_SESSION['userlists'] = $userlists;
      		$this->set('userlists',$userlists); 
      	}
      	else
      	{
       		$this->set('userlists',$_SESSION['userlists']); 
      	}
       
     //  pr($_SESSION['Menulist']);
   		$this->loadModel('Menu');
    	if(empty($_SESSION['Menulist'])){
   			$this->Menu->recursive = -1;
   			$menus = $this->Menu->find('threaded',array('fields'=>array('id','name','parent_id','lft','rght','controller','action','icon_id','url','slug')));
    		$_SESSION['Menulist'] = $menus;
   			 
   			$this->set('menus',$menus); 
   		}
   		else{
   			$this->set('menus',$_SESSION['Menulist']); 
   		}
		
		/*if(empty($_SESSION['ReportMenu'])){
			//$this->Menu->recursive = -1;
			//$reportmenu = $this->Menu->find('all',array('fields'=>array('id','name','controller','action','icon_id','action_extra','slug'),'conditions'=>array('menu_type'=>'reportmenu')));
			//$_SESSION['ReportMenu'] = $reportmenu;
 			//$this->set('menus',$menus); 
		}
		else{
		//	$this->set('reportMenu',$_SESSION['ReportMenu']); 
		}*/
		//==================== Tools Menu =======================
		
		if(empty($_SESSION['ToolsMenu'])){
			$this->loadModel('ToolsMenu');
			$this->ToolsMenu->recursive = -1;
			$toolsmenu = $this->ToolsMenu->find('all',array('order'=>'class desc'));
			$_SESSION['ToolsMenu'] = $toolsmenu;
 		}
		else{
			$this->set('ToolsMenu',$_SESSION['ToolsMenu']); 
		}
		
		if(empty($_SESSION['ToolsClass'])){
			$_SESSION['ToolsClass'] = array('1'=>'Add', '2'=>'Index','3'=>'Report','4'=>'View List','5'=>'Edit','6'=>'Payment');
		} 
		

	 }
	 
	 //================= all number show minimum 8 digit in fornt 0000 =============== 
	 public function digitmix($var = null , $limit=null) {
        $fourDigit = trim($var);
        for ($i=0; $i<=$limit; $i++) {
            if (strlen($fourDigit) < $limit) {$fourDigit = "0".$fourDigit;}
        }
        return $fourDigit;
 	 }
 	 
 	 /**
 	  * This method adds JS files to the <head> element of the output HTML.
 	  * Need to modify layout code to work
 	  * 
 	  * @param array $script_location_list : Array of scripts need to add to the header, multiple calls will append to the list
 	  * @param boolean $output_to_header : If no more JS files are needed to add, set to true to output to the header
 	  */
 	 protected function addJs( array $script_location_list, $output_to_header = true ) {
 	     $this->__js_files = $this->__js_files + $script_location_list;
 	     
 	     if( $output_to_header && count($this->__js_files) > 0 ) {
 	         $this->set('controller_js', $this->__js_files);
 	     }
 	 }
 	 
 	 /**
 	  * This method adds CSS files to the <head> element of the output HTML.
 	  * Need to modify layout code to work
 	  *
 	  * @param array $css_location_list : Array of css need to add to the header, multiple calls will append to the list
 	  * @param boolean $output_to_header : If no more CSS files are needed to add, set to true to output to the header
 	  */
 	 protected function addCss( array $css_location_list, $output_to_header = true ) {
 	     $this->__css_files = $this->__css_files + $css_location_list;
 	      
 	     if( $output_to_header && count($this->__css_files) > 0 ) {
 	         $this->set('controller_css', $this->__css_files);
 	     }
 	 }
 	 
 	 /**
 	  * Sets the flash message to be shown to user on page load.
 	  * 
 	  * @param string $message - Message to be shown
 	  * @param string $type - Type of message. Allowed values: info/success/warning/error.
 	  */
 	 protected function setFlashMessage( $message, $type = 'info' ) {
 	     $allowed_types = array('info', 'success', 'warning', 'error');
 	     
 	     if( !in_array($type, $allowed_types) ) {
 	        $type = 'info';
 	     }
 	     
 	     $class = "flash $type-flash";
 	     $this->Session->setFlash( $message, 'default', array('class' => $class) );
 	 }
	 
 	 protected function dataSecurity( $data ) {
		return 	$cleandata =  Sanitize::paranoid($data ,array(' ','@','`','~','=','-','!','#','$','%','^','&','*','(',')','+','?','.',',','>','<'));
		return 	$cleandata ;
 	     
 	 }
	 
	 /*function uploadFiles($folder, $formdata, $itemId = null) {
	// setup dir names absolute and relative
	$folder_url = WWW_ROOT.$folder;
	$rel_url = $folder;
	
	// create the folder if it does not exist
	if(!is_dir($folder_url)) {
		mkdir($folder_url);
	}
		
	// if itemId is set create an item folder
	if($itemId) {
		// set new absolute folder
		$folder_url = WWW_ROOT.$folder.'/'.$itemId; 
		// set new relative folder
		$rel_url = $folder.'/'.$itemId;
		// create directory
		if(!is_dir($folder_url)) {
			mkdir($folder_url);
		}
	}
	
	// list of permitted file types, this is only images but documents can be added
	$permitted = array('image/gif','image/jpeg','image/pjpeg','image/csv');
	
	// loop through and deal with the files
	foreach($formdata as $file) {
		// replace spaces with underscores
		$filename = str_replace(' ', '_', $file['name']);
		// assume filetype is false
		$typeOK = false;
		// check filetype is ok
		foreach($permitted as $type) {
			if($type == $file['type']) {
				$typeOK = true;
				break;
			}
		}
		
		// if file type ok upload the file
		if($typeOK) {
			// switch based on error code
			switch($file['error']) {
				case 0:
					// check filename already exists
					if(!file_exists($folder_url.'/'.$filename)) {
						// create full filename
						$full_url = $folder_url.'/'.$filename;
						$url = $rel_url.'/'.$filename;
						// upload the file
						$success = move_uploaded_file($file['tmp_name'], $url);
					} else {
						// create unique filename and upload file
						ini_set('date.timezone', 'Europe/London');
						$now = date('Y-m-d-His');
						$full_url = $folder_url.'/'.$now.$filename;
						$url = $rel_url.'/'.$now.$filename;
						$success = move_uploaded_file($file['tmp_name'], $url);
					}
					// if upload was successful
					if($success) {
						// save the url of the file
						$result['urls'][] = $url;
					} else {
						$result['errors'][] = "Error uploaded $filename. Please try again.";
					}
					break;
				case 3:
					// an error occured
					$result['errors'][] = "Error uploading $filename. Please try again.";
					break;
				default:
					// an error occured
					$result['errors'][] = "System error uploading $filename. Contact webmaster.";
					break;
			}
		} elseif($file['error'] == 4) {
			// no file was selected for upload
			$result['nofiles'][] = "No file Selected";
		} else {
			// unacceptable file type
			$result['errors'][] = "$filename cannot be uploaded. Acceptable file types: gif, jpg, png.";
		}
	}
return $result;}
*/

	
}?>