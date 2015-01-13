<?php class PosPcategoriesController extends AppController {

	var $name = 'PosPcategories';
   var $components = array( 'RequestHandler', 'Filter');
    function filtercondition($data=null)
		 {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'PosPcategory');
 			if(empty($this->request->data['PosPcategory']['ShowPerPage']))
			{
				$this->request->data['PosPcategory']['ShowPerPage']='20';
			}
			else{
				$this->request->data['PosPcategory']['ShowPerPage'];
			}
			
 			if(!empty($this->request->data['PosPcategory']['name']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
					$conditionarray .= 'PosPcategory.name like \'%'.$this->request->data['PosPcategory']['name']."%'";		
					
			 }
		
		//print_r($conditionarray);die();
		return $conditionarray;	
	}
    

	function index($yes = null,$is_report = null) {
    
    	if( ! empty( $this->request->data ) ){
            $this->Session->delete('PosPcategorySearch');
            $this->Session->write( 'PosPcategorySearch', $this->request->data );
        }
         if( $this->Session->check( 'PosPcategorySearch' ) ){
              $this->request->data = $this->Session->read( 'PosPcategorySearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'PosPcategorySearch' );
			$this->PosPcategory->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('PosPcategory.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'PosPcategory'),
					'order' =>$this->Filter->sortoption($this->request->data,  'PosPcategory'),
        		);

    
		$this->PosPcategory->recursive = 0;
		$this->set('posPcategories', $this->paginate());
        $this->set('sortoption',array('name'));
        $this->set('page_titles', 'Product category List'); 
		 
		if($is_report == 'report'){
			$this->layout  = 'wcreport';
			$this->set('reportheading','Product List');
 			$this->render('/PosPcategories/categorylist');
		}
		
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
			'conditions' =>  array('PosProduct.pos_pcategory_id'=>$id ),
		            'limit' => 1000,
					'order' =>array('PosProduct.name asc')));
			
	 $this->set('reportheading','Product List');
	$this->set('posPcategories', $products);
	$this->set('page_titles','List of all Products');
	
	}
 
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pos pcategory', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('posPcategory', $this->PosPcategory->read(null, $id));
         $this->set('page_titles', 'Product category View'); 
	}

	function add($popup=null) {
    if ($this->RequestHandler->isAjax()) {	
			
		if (!empty($this->request->data)) {
			
			 //========================= Create Slug =====================//
			if(empty($this->request->data['PosPcategory']['slug'])){
				$this->request->data['PosPcategory']['slug'] = $this->PosPcategory->createSlug($this->request->data['PosPcategory']['name']);
			}
			//========================= End Create Slug =================//
			
			$this->PosPcategory->create();
			if ($this->PosPcategory->save($this->request->data)) {
				if(isset($popup)){
					echo $this->PosPcategory->getLastInsertId();
				}
				else{
					echo "Successfully Saved.";
				}
				 
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
		if(isset($popup)){
				$this->layout  = 'ajax';
		 		$this->render('/PosPcategories/popup_add');
			 }
      }
	   $this->set('page_titles', 'Add New Product category'); 

	}

	function edit($id = null) {
	 	if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid pos pcategory', true));
			$this->redirect(array('action' => 'index'));
		}
         ///if ($this->RequestHandler->isAjax()) {
		 
	 	if (!empty($this->request->data)) {
			
			//========================= Create Slug =====================//
			if(empty($this->request->data['PosPcategory']['slug'])){
				$this->request->data['PosPcategory']['slug'] = $this->PosPcategory->createSlug($this->request->data['PosPcategory']['name']);
			}
			//========================= End Create Slug =================//
			
			if ($this->PosPcategory->save($this->request->data)) {
				echo "Successfully Update.";
				 $this->redirect(array('action'=>'index'));
			} else {
			    echo "Update Failed.";	 
			}
             Configure::write('debug', 0); 
			 $this->autoRender = false;
			 exit();
		}
      
	  
	  
	  //}
		if (empty($this->request->data)) {
			$this->request->data = $this->PosPcategory->read(null, $id);
		}
     $this->set('page_titles', 'Update Product category'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Product category', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->loadModel('PosProduct');
		$datas = $this->PosProduct->find('first' , array('conditions'=>array('PosProduct.pos_pcategory_id'=>$id),'recursive'=> -1));
	 
		if(empty($datas)){
		
		if ($this->PosPcategory->delete($id)) {
			$this->setFlashMessage(__('Product category deleted', 'multidelete'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Product category was not deleted', 'warnning_message'));
		$this->redirect(array('action' => 'index'));
		}
		else{
			 $this->set('datas',$datas);
			 $this->set('page_titles', 'Delete  Category'); 	
		}
	}
	
	
	 function slug_edit(){
	$this->PosPcategory->recursive=0;
	$prs=$this->PosPcategory->find('all',array('fields'=>array('id','name')));
 	//pr($prs);
	foreach($prs as $pr){
		//========================= Create Slug =====================
		 $this->request->data['PosPcategory']['slug'] = $this->PosPcategory->createSlug($pr['PosPcategory']['name'],$pr['PosPcategory']['id']);
		//========================= End Create Slug =================
		//pr($this->request->data['PosProduct']['slug']); 
	    //pr($this->request->data); die();
 			  $this->request->data['PosPcategory']['id']=$pr['PosPcategory']['id'];
			 $this->PosPcategory->save($this->request->data['PosPcategory']);
			
	        }
	}
}
