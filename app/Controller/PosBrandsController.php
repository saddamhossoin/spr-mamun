<?php class PosBrandsController extends AppController {

	var $name = 'PosBrands';
   var $components = array( 'RequestHandler', 'Filter','ImageUploader');
   
   
   
    function brand_list( $type = null , $slug = null ){
		 
		 
		  $conditionarray = '';
 			  if(!empty($type) && $type == 'Type')
				{
 				$this->loadModel('PosProduct');	
				$this->PosProduct->unbindModelAll();
 				$this->PosProduct->bindModel(array(
					'belongsTo' => array(
						'PosBrand' => array(
						'className' => 'PosBrand',
						'foreignKey' => 'pos_brand_id',
						'conditions' => '',
						'fields' => '',
						'order' => ''
					),
					'PosType' => array(
						'className' => 'PosType',
						'foreignKey' => 'pos_type_id',
						'conditions' => '',
						'fields' => '',
						'order' => ''
					),
					)
				));
 				$this->PosProduct->recursive =0;
 				$this->set('posProducts',$this->PosProduct->find('all',array('fields'=>array('PosBrand.id','PosBrand.name','PosBrand.image','PosType.id','PosType.name','PosType.image','PosType.slug','PosProduct.id','PosProduct.pos_brand_id','PosBrand.slug'),'conditions'=>array('PosType.slug' =>$slug),'group'=>array('PosProduct.pos_brand_id')))); 
			}
			else{
				$this->redirect(array('controller'=>'Pages','action' => 'home'));
			}
	  		$this->layout='wpage'; 
	 }
	 
	 
	function getBrands(){
		$posBrands = $this->PosBrand->find('all',array('fields'=>array('id','name','slug'),'order'=>'name asc','recursive'=> -1));
		return $posBrands;
		
		
	}
   
    function filtercondition($data=null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'PosBrand');
 	
		if(empty($this->request->data['PosBrand']['ShowPerPage']))
			{
				$this->request->data['PosBrand']['ShowPerPage']='20';
			}
			else{
				$this->request->data['PosBrand']['ShowPerPage'];
			}
			
 			if(!empty($this->request->data['PosBrand']['name']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
					$conditionarray .= 'PosBrand.name like \'%'.$this->request->data['PosBrand']['name']."%'";		
					
			 }
			 
			 
		
		return $conditionarray;	
	}
     
	function productlistbybrand($id=null){
	$this->layout  = 'wcreport';
	$this->loadModel('PosProduct');
	
	$this->PosProduct->bindModel(array('hasMany' => array( 
		'PosStock' => array( 
			'className' => 'PosStock', 
			'foreignKey' => 'pos_product_id', 
			'type' => 'INNER', 
			'fields'=>array('id','quantity'),
		 	) 
		) 
	)
	);
	
	$products=$this->PosProduct->find('all',array(
			'conditions' =>  array('PosProduct.pos_brand_id'=>$id ),
		            'limit' => 1000,
					'order' =>array('PosProduct.name asc')));

	$this->set('posProducts', $products);
	$this->set('page_titles','List of all Products');
	//pr($products);
	
	}
	function checkFieldDuplicate($model = null , $field = null , $fieldval = null , $id = null){
			$this->loadModel("$model");
		if(!empty($id)){

		  		$already_product=$this->$model->find('first',array('fields'=>array('id',"$field"),'recursive'=>-1,'conditions'=>array("$model.id !="=>$id,"$model.$field"=>$fieldval)));
	 	 	}
		else{
	 			 $already_product=$this->$model->find('first',array('fields'=>array('id',"$field"),'recursive'=>-1,'conditions'=>array("$model.$field"=>$fieldval)));
	  		}
 	  	  if(!empty($already_product[$model][$field])){
				 echo '1';
				}
		   else{
				echo '0';
			}
			Configure::write('debug', 0); 
			$this->autoRender = false;
			exit();
	  
	  
 	 }
	
	
	

	function index($yes = null,$is_report=null) {
    
    	if( ! empty( $this->request->data ) ){
            $this->Session->delete('PosBrandSearch');
            $this->Session->write( 'PosBrandSearch', $this->request->data );
        }
         if( $this->Session->check( 'PosBrandSearch' ) ){
              $this->request->data = $this->Session->read( 'PosBrandSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'PosBrandSearch' );
			$this->PosBrand->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('PosBrand.name'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'PosBrand'),
					'order' =>$this->Filter->sortoption($this->request->data,  'PosBrand'),
        		);

    
		$this->PosBrand->recursive = 0;
		$this->set('posBrands', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', ' Brand List'); 
		
		if($is_report == 'report'){
			$this->layout  = 'wcreport';
			$this->set('reportheading','Brand List');
 			$this->render('/PosBrands/brandlist');


		}
		
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pos brand', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('posBrand', $this->PosBrand->read(null, $id));
         $this->set('page_titles', ' Brand View'); 
  
  }


 
	function add( $popup = null) {
		
    if ($this->RequestHandler->isAjax()) {
 
 	 	if (!empty($this->request->data)) {
					 App::uses('Sanitize', 'Utility');
				$output= array();  
				$fileDestination = 'img/PosBrands';
				$options = array();    
				if(!empty($this->request->data['PosBrand']['image']['name'])){
					try{
						$output = $this->ImageUploader->upload($this->request->data['PosBrand']['image'],$fileDestination,$options);     			
					}
					catch(Exception $e)
					{ 
						$output = array('bool'=>FALSE,'error_message'=>$e->getMessage());
					} 
					$this->request->data['PosBrand']['image'] = $output['file_path'];
				}
				
				else{
					$this->request->data['PosBrand']['image'] ='';
					} 
					
			 //========================= Create Slug =====================//
			if(empty($this->request->data['PosBrand']['slug'])){
				$this->request->data['PosBrand']['slug'] = $this->PosBrand->createSlug($this->request->data['PosBrand']['name']);
			}
			//========================= End Create Slug =================//	

			$this->PosBrand->create();
 		if ($this->PosBrand->save($this->request->data)) {

		 	if(isset($popup)){
					echo $this->PosBrand->getLastInsertId();
				}else{
					echo "Successfully Saved.";
				}
 			}
		else {
				 echo "Saved Failed.";
			 }
			 
            	Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
		if(isset($popup)){
				$this->layout  = 'ajax';
		 		$this->render('/PosBrands/popup_add');
		 }
      }
	   $this->set('page_titles', 'Add New Brand'); 
 	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid pos brand', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		 
 		if (!empty($this->request->data)) {
			 App::uses('Sanitize', 'Utility');
			$output= array();  
			$fileDestination = 'img/PosBrands';
			$options = array();    
			if(!empty($this->request->data['PosBrand']['image']['name'])){
			try{
				$output = $this->ImageUploader->upload($this->request->data['PosBrand']['image'],$fileDestination,$options);     			
				}
				catch(Exception $e)
				{ 
					$output = array('bool'=>FALSE,'error_message'=>$e->getMessage());
				} 
				$this->request->data['PosBrand']['image'] = $output['file_path'];
			}
			else{
					unset($this->request->data['PosBrand']['image']);
				} 
			
			//========================= Create Slug =====================//
			if(empty($this->request->data['PosBrand']['slug'])){
				$this->request->data['PosBrand']['slug'] = $this->PosBrand->createSlug($this->request->data['PosBrand']['name']);
			}
			//========================= End Create Slug =================//
			
			
			if ($this->PosBrand->save($this->request->data)) {
				echo "Successfully Update.";
				//$this->redirect(array('action' => 'index'));
		 	} else {
			    echo "Update Failed.";	 
			}
             Configure::write('debug', 0); 
			 $this->autoRender = false;
			 exit();
		}
      }
		if (empty($this->request->data)) {
			$this->request->data = $this->PosBrand->read(null, $id);
		}
     $this->set('page_titles', 'Update  Brand'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pos brand', true));
			$this->redirect(array('action'=>'index'));
		}
		//$datas = $this->PosBrand->read(null, $id);
		$this->loadModel('PosProduct');
		$datas = $this->PosProduct->find('first' , array('conditions'=>array('PosProduct.pos_brand_id'=>$id),'recursive'=> -1));
	 
		if(empty($datas)){
		
		if ($this->PosBrand->delete($id)){
			
			if(!empty($datas['PosBrand']['image'])){
				unlink($datas['PosBrand']['image']);
			 }
			$this->setFlashMessage(__('Pos brand deleted', 'multidelete'));
			$this->redirect(array('action'=>'index'));
		}
		$this->setFlashMessage(__('Pos brand was not deleted', 'warnning_message'));
		$this->redirect(array('action' => 'index'));
	}
		else{
			 $this->set('datas',$datas);
			 $this->set('page_titles', 'Delete  Brand'); 	
		}
	}
	
	
	 function slug_edit(){
		$this->PosBrand->recursive=0;
		$prs=$this->PosBrand->find('all',array('fields'=>array('id','name')));
		//pr($prs);
	foreach($prs as $pr){
		//========================= Create Slug =====================
		 $this->request->data['PosBrand']['slug'] = $this->PosBrand->createSlug($pr['PosBrand']['name'],$pr['PosBrand']['id']);
		//========================= End Create Slug =================
		//pr($this->request->data['PosBrand']['slug']); 
	    //pr($this->request->data); die();
 			  $this->request->data['PosBrand']['id']=$pr['PosBrand']['id'];
			 $this->PosBrand->save($this->request->data['PosBrand']);
			
	        }
	}
}
