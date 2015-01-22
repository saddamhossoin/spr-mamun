<?php 

class PosProductsController extends AppController { 
 	//var $name = 'PosProducts'; 
   var $components = array( 'RequestHandler', 'Filter','ImageUploader');
   public $helpers = array('Html', 'Form' ,'Js', 'Time', 'Text' );
    
       
   	function searchregisterfiltercondition($data=null){
 		 	$this->request->data = $data['data'];
   			$searchregisterarray = '';
			 
			if(!empty($this->request->data['PosProduct']['name']))
			{
 				if(!empty($searchregisterarray)){$searchregisterarray .= " AND ";}
				$searchregisterarray .= 'PosProduct.name like \'%'.$this->request->data['PosProduct']['name']."%'";		
 			}
 			
 			if(!empty($this->request->data['PosProduct']['pos_brand_id']))
			{
 				if(!empty($searchregisterarray)){$searchregisterarray .= " AND ";}
				$searchregisterarray .= 'PosProduct.pos_brand_id ='.$this->request->data['PosProduct']['pos_brand_id'];		
  			}
 			if(!empty($this->request->data['PosProduct']['pos_pcategory_id']))
			{
 				if(!empty($searchregisterarray)){$searchregisterarray .= " AND ";}
			    $searchregisterarray .= 'PosProduct.pos_pcategory_id = '.$this->request->data['PosProduct']['pos_pcategory_id'] ;		
  			}
			   
			 // pr($this->request->data);
  		// pr($searchregisterarray);die();
			return $searchregisterarray;	
	}
	
	 function unique_product($brand=null,$category=null,$product=null,$id=null){
		if(!empty($id)){
		  $already_product=$this->PosProduct->find('first',array('fields'=>array('id','name'),'recursive'=>-1,'conditions'=>array('PosProduct.id !='=>$id,'PosProduct.pos_brand_id'=>$brand,'PosProduct.pos_pcategory_id'=>$category,'PosProduct.name'=>$product)));
	 	 	}
			else{
	  $already_product=$this->PosProduct->find('first',array('fields'=>array('id','name'),'recursive'=>-1,'conditions'=>array('PosProduct.pos_brand_id'=>$brand,'PosProduct.pos_pcategory_id'=>$category,'PosProduct.name'=>$product)));
	  			}
				
	  	  if(!empty($already_product['PosProduct']['name'])){
				 echo "1";
			}
		  else{
				echo "0";
			}
	    Configure::write('debug', 0); 
				$this->autoRender = false;
				exit();
	 }
	 
	  function unique_product_barcode($barcode=null , $id=null){
		if(!empty($id)){

		  $already_product1=$this->PosProduct->PosBarcode->find('first',array('fields'=>array('PosBarcode.pos_product_id','PosBarcode.barcode','PosBarcode.status'),'recursive'=>-1,'conditions'=>array('PosBarcode.pos_product_id !='=>$id,'PosBarcode.barcode'=>$barcode,'PosBarcode.status'=>1)));
		   
	 	 	}
			else{
			
	  $already_product1=$this->PosProduct->PosBarcode->find('first',array('fields'=>array('PosBarcode.barcode','PosBarcode.status'),'recursive'=>-1,'conditions'=>array('PosBarcode.barcode'=>$barcode,'PosBarcode.status'=>1)));
  	  			}
 	  	  if(!empty($already_product1['PosBarcode']['barcode'])){
				 echo "1";
			}
		  else{
				echo "0";
			}
	    Configure::write('debug', 0); 
				$this->autoRender = false;
				exit();
	 }
	 
	  
	 function shop( $type = null , $slug = null ){
		 $conditionarray = '';
 
 			if(!empty($type) && $type == 'Brand')
			{
 				$conditionarray .= "PosBrand.slug = '".$slug."' and PosProduct.pos_type_id = 1  and PosProduct.status != 2";
	   			$options =array( 'conditions' => $conditionarray , 'order' =>'PosProduct.name asc','limit'=>999); 
  			 }
			 
			$this->PosProduct->recursive = 0;
			$this->paginate = $options;
 	 		$this->set('posProducts', $this->paginate());
	  		$this->layout='wpage';
			 
			
	}
	
	
	 function product_type_view( $slug = null ){
		if(!empty($slug)){
 			$this->loadModel('PosCompatibility');
 			$this->set('front_view_products', $this->PosCompatibility->find('all',array('conditions'=>array('PosProduct.slug'=>$slug))));
	}
		$this->layout='wpage'; 
		//pr($front_view_products);
	 }
	  
	function device_accessories($slug = null){
		
		if(!empty($slug)){
			
 			/*$this->loadModel('PosCompatibility');
			$this->PosCompatibility->unbindModelAll();
 			$this->PosCompatibility->bindModel(array('belongsTo'=>array(
			 'PosProduct' => array(
					'className' => 'PosProduct',
					'foreignKey' => 'com_product_id',
					'type' => 'INNER'
					),
 				)
  			));
  			*/
			
			$this->PosProduct->unbindModelAll();
			$this->PosProduct->bindModel(array('hasMany'=>array(
			 'PosCompatibility' => array(
					'className' => 'PosCompatibility',
					'foreignKey' => 'com_product_id',
					'type' => 'INNER'
					),
 			)));
			 
		 
			 
 			//======================= Get Product Details ================ 
			$this->PosProduct->recursive = 1;
 			$type_products = $this->PosProduct->find('first',array('conditions'=>array('PosProduct.slug'=>$slug)));
			
			//pr($type_products);
			
			if($type_products['PosProduct']['pos_type_id'] !=1){
 					$this->Session->setFlash(__('Invalid product', true));
					$this->redirect(array('controller'=>'Pages','action' => 'home'));
  			 }
			 
			$this->set('type_products', $type_products );
 			
			//pr($type_products);
			//================== Get Compitable Product with Stock ==========
			$this->PosProduct->unbindModelAll();
			$this->PosProduct->bindModel(array('hasOne'=>array(
			'PosStock' => array(
				'className' => 'PosStock',
				'foreignKey' => 'pos_product_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
				)
 			)));
			
			$compitableProductItem ='';
			if(!empty($type_products['PosCompatibility'])){
				 $compitable_items = array();
				 foreach($type_products['PosCompatibility'] as $compitalbleItem ){
					$compitable_items[] = $compitalbleItem['pos_product_id'];					
				}
				
				
				$compitableProductItem =  $this->PosProduct->find('all',array('conditions'=>array('PosProduct.id in('.implode(',' ,$compitable_items).')'),'recursive'=>0));
 				
				$this->set('compitableProductItem',$compitableProductItem);
				
			}
			
			//pr($compitableProductItem);
			$this->loadModel('PosCompatibility');
			
			
			if(!empty($compitableProductItem)){
				
			$comproduct_compitalbe_ids = array();
			foreach($compitableProductItem as $key=>$val){
				$comproduct_compitalbe_ids[] =$val['PosProduct']['id'] ;
			 }
			
			
			//pr($comproduct_compitalbe_ids);
			 
			$product_compitalbilty = $this->PosCompatibility->find('all',array('fields'=>array('PosCompatibility.pos_product_id','ComPosProduct.name'),'conditions'=>array('PosCompatibility.pos_product_id in ('.implode(',' ,$comproduct_compitalbe_ids).')')));
			
			$final_compitable_list = array();
			foreach($product_compitalbilty as $keys=>$vala){
				$final_compitable_list[$vala['PosCompatibility']['pos_product_id']][] = $vala['ComPosProduct']['name'];
			 }
			
			
			$this->set('final_compitable_list',$final_compitable_list);
			
			}
 		   	 
 	    } 
 		 $this->layout='wpage'; 
	 }
	 
	 
	 function solid_device( $slug = null ){
		 
		 $this->PosProduct->unbindModelAll();
			$this->PosProduct->bindModel(array('hasOne'=>array(
			'PosStock' => array(
				'className' => 'PosStock',
				'foreignKey' => 'pos_product_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
				)
 			)));
		 
		if(!empty($slug)){
 			$this->set('solid_products', $this->PosProduct->find('first',array('conditions'=>array('PosProduct.slug'=>$slug,'PosProduct.pos_type_id'=>1),'recursive'=>0)));
			
	       }
		 
		 $this->layout='wpage'; 
		 }
	 
	 
	 
	 function slug_edit(){
		$this->PosProduct->recursive=0;
		$prs=$this->PosProduct->find('all',array('fields'=>array('id','name')));
		//pr($prs);
		foreach($prs as $pr){
			//========================= Create Slug =====================
			 $this->request->data['PosProduct']['slug'] = $this->PosProduct->createSlug($pr['PosProduct']['name'],$pr['PosProduct']['id']);
			//========================= End Create Slug =================
			//pr($this->request->data['PosProduct']['slug']); 
			//pr($this->request->data); die();
				  $this->request->data['PosProduct']['id']=$pr['PosProduct']['id'];
				 $this->PosProduct->save($this->request->data['PosProduct']);
				
				}
	}
	
     function filtercondition($data=null) {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'PosProduct');
 		
 				
			
 			if(!empty($this->request->data['PosProduct']['pos_brand_id']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
						$conditionarray .= 'PosProduct.pos_brand_id ='.$this->request->data['PosProduct']['pos_brand_id'];	
					
			 }
	 	if(!empty($this->request->data['PosProduct']['pos_pcategory_id']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
						$conditionarray .= 'PosProduct.pos_pcategory_id ='.$this->request->data['PosProduct']['pos_pcategory_id'];	
			 }
			 if(!empty($this->request->data['PosProduct']['pos_type_id']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
						$conditionarray .= 'PosProduct.pos_type_id ='.$this->request->data['PosProduct']['pos_type_id'];	
			 }
		if(!empty($this->request->data['PosProduct']['status']))
			{
				if(!empty($conditionarray))
				{
					$conditionarray .= " AND ";
				}
					$conditionarray .= 'PosProduct.status ='.$this->request->data['PosProduct']['status'];	
		 }
		 
 		 
		   if(!empty($this->request->data['PosBarcode']['barcode']))
			{
				$this->loadModel('PosBarcode');
				$barcodes = $this->PosBarcode->find('all',array('fields'=>array('pos_product_id','barcode'),'conditions'=>array("PosBarcode.barcode like '%".$this->request->data['PosBarcode']['barcode']."%'"),'group'=>array('pos_product_id'),'recursive'=>-1));
				
			foreach($barcodes as $key => $val){
				$barcodeids .= $val['PosBarcode']['pos_product_id'] .',';
			}
			 
				$barcodeids = substr($barcodeids, 0, -1);
			
			if(!empty($conditionarray))
			{
				$conditionarray .= " AND ";
			}
		
			 if(!empty($barcodeids)){
				$conditionarray .= "PosProduct.id in(".$barcodeids.")";	
			 }else{
				$conditionarray .= "PosProduct.id in(0)";	
			 }
		 }  
		 
		 if(!empty($this->request->data['PosProduct']['name']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
					
					//$conditionarray .= ' PosProduct.name like \'%'.$this->request->data['PosProduct']['name']."%'";
					  $conditions ='';
					  $_SESSION['HighlightText']='';
					  $search_terms = explode(' ', $this->request->data['PosProduct']['name']);
					  
				    	 foreach($search_terms as $search_term){

				     		if(strlen($search_term) != 0){	
													
							  $conditions .= ' PosProduct.name like \'%'.$search_term."%' AND";
							  $_SESSION['HighlightText'][] = $search_term; 
							 
							}
	
							 // $conditions[] = array('PosProduct.name Like' =>'%'.$search_term.'%');
							  
 					 	 }
						
 							  $conditionarray .= substr($conditions, 0, strrpos($conditions, " "));
  					 }
					 
					 
			if(!empty($this->request->data['PosProduct']['box_no']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
				 	  $conditionarray  .= " PosProduct.box_no = '".$this->request->data['PosProduct']['box_no'] ."'";
 				}	 
	 // pr($conditionarray);die();
	 	return $conditionarray;	
	}
     
	 function index($yes = null , $is_report = null) {
 	 
    	if( ! empty( $this->request->data ) ){
            $this->Session->delete('PosProductSearch');
            $this->Session->write( 'PosProductSearch', $this->request->data );
        }
         if( $this->Session->check( 'PosProductSearch' ) ){
              $this->request->data = $this->Session->read( 'PosProductSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'PosProductSearch' );
			$this->PosProduct->recursive = 0;
			$this->paginate  = array(
				'limit' => '20',
				'order' =>array('PosProduct.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	  
      $this->paginate  = array(
    	        	 'fields'=>array('PosProduct.id','PosProduct.name','PosProduct.image','PosProduct.status','PosProduct.box_no','PosProduct.pos_brand_id','PosProduct.pos_pcategory_id','PosProduct.modified','PosBrand.id','PosBrand.name','PosType.id','PosType.name','PosPcategory.id','PosPcategory.name','PosStock.id','PosStock.pos_product_id','PosStock.quantity','PosStock.last_sales'),
					 'conditions' =>  array($this->filtercondition($this->request->data) ),
		             'limit' => $this->Filter->searchlimit($this->request->data , 'PosProduct'),
					 'order' =>$this->Filter->sortoption($this->request->data,  'PosProduct'),
					 
        		); 

		
	 $this->PosProduct->unbindModel(array('hasMany'=>array('PosCompatibility','Productmod','PosProductColor' ),'belongsTo'=>array('PosBrand','PosType','PosPcategory'),'hasOne'=>array('PosStock') ));
	 
	 	 $this->PosProduct->bindModel(array('belongsTo'=>array('PosBrand'=>array(
		 'className' => 'PosBrand',
			'foreignKey' => 'pos_brand_id',
 			 'type' => 'INNER',
 		 ),'PosType'=>array(
		 'className' => 'PosType',
			'foreignKey' => 'pos_type_id',
 			 'type' => 'INNER',
 		 ),'PosPcategory'=>array(
		 'className' => 'PosPcategory',
			'foreignKey' => 'pos_pcategory_id',
 			 'type' => 'INNER',
 		 )),'hasOne'=>array('PosStock'=>array(
		 'className' => 'PosStock',
			'foreignKey' => 'pos_product_id',
 			 'type' => 'INNER',
 		 )) ));

		  
 		
		 
		 $this->PosProduct->recursive = 1;
	// pr($this->paginate());
		 
 		$this->set('posProducts', $this->paginate());
		$this->set('category',$this->PosProduct->PosPcategory->find('list',array('order'=>'name asc')));
		$this->set('brand',$this->PosProduct->PosBrand->find('list',array('order'=>'name asc')));
		$this->set('posTypes',$this->PosProduct->PosType->find('list',array('order'=>'id asc')));
 		$this->set('colors',$this->PosProduct->PosProductColor->Color->find('list',array('order'=>'name asc')));
	 
        $this->set('sortoption',array());
        $this->set('page_titles', 'List of Products'); 
		
		
		if($is_report == 'yes'){
			$this->layout  = 'wcreport';
			$this->set('reportheading','Product List');
			//$this->set('modelname','PosProduct');
			//$this->set('conditionarray',$this->Session->read( 'PosProductSearch' ));
		
 			$this->render('/PosProducts/productlist');
		}
	 
	}
	
	
	
	 function filtercondition_re_order_list($data=null) {
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'PosProduct');
 		
 				
			
 			if(!empty($this->request->data['PosProduct']['pos_brand_id']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
						$conditionarray .= 'PosProduct.pos_brand_id ='.$this->request->data['PosProduct']['pos_brand_id'];	
					
			 }
	 	if(!empty($this->request->data['PosProduct']['pos_pcategory_id']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
						$conditionarray .= 'PosProduct.pos_pcategory_id ='.$this->request->data['PosProduct']['pos_pcategory_id'];	
			 }
			 if(!empty($this->request->data['PosProduct']['pos_type_id']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
						$conditionarray .= 'PosProduct.pos_type_id ='.$this->request->data['PosProduct']['pos_type_id'];	
			 }
		if(!empty($this->request->data['PosProduct']['status']))
			{
				if(!empty($conditionarray))
				{
					$conditionarray .= " AND ";
				}
					$conditionarray .= 'PosProduct.status ='.$this->request->data['PosProduct']['status'];	
		 }
		 
 		 
		   if(!empty($this->request->data['PosBarcode']['barcode']))
			{
				$this->loadModel('PosBarcode');
				$barcodes = $this->PosBarcode->find('all',array('fields'=>array('pos_product_id','barcode'),'conditions'=>array("PosBarcode.barcode like '%".$this->request->data['PosBarcode']['barcode']."%'"),'group'=>array('pos_product_id'),'recursive'=>-1));
				
			foreach($barcodes as $key => $val){
				$barcodeids .= $val['PosBarcode']['pos_product_id'] .',';
			}
			 
				$barcodeids = substr($barcodeids, 0, -1);
			
			if(!empty($conditionarray))
			{
				$conditionarray .= " AND ";
			}
		
			 if(!empty($barcodeids)){
				$conditionarray .= "PosProduct.id in(".$barcodeids.")";	
			 }else{
				$conditionarray .= "PosProduct.id in(0)";	
			 }
		 }  
		 
		 if(!empty($this->request->data['PosProduct']['name']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
					
					//$conditionarray .= ' PosProduct.name like \'%'.$this->request->data['PosProduct']['name']."%'";
					  $conditions ='';
					  $_SESSION['HighlightText']='';
					  $search_terms = explode(' ', $this->request->data['PosProduct']['name']);
					  
				    	 foreach($search_terms as $search_term){

				     		if(strlen($search_term) != 0){	
													
							  $conditions .= ' PosProduct.name like \'%'.$search_term."%' AND";
							  $_SESSION['HighlightText'][] = $search_term; 
							 
							}
	
							 // $conditions[] = array('PosProduct.name Like' =>'%'.$search_term.'%');
							  
 					 	 }
						
 							  $conditionarray .= substr($conditions, 0, strrpos($conditions, " "));
  					 }
	 
	// pr($conditionarray);die();
	 	return $conditionarray;	
	}
	
	function re_order_list( $yes = null ,  $is_report = null){
	
	if( ! empty( $this->request->data ) ){
            $this->Session->delete('PosProductReOrderSearch');
            $this->Session->write( 'PosProductReOrderSearch', $this->request->data );
        }
         if( $this->Session->check( 'PosProductReOrderSearch' ) ){
              $this->request->data = $this->Session->read( 'PosProductReOrderSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'PosProductReOrderSearch' );
			$this->PosProduct->recursive = 0;
			$this->paginate  = array(
			 	'conditions' =>  array($this->filtercondition_re_order_list($this->request->data), 'PosStock.quantity >= PosProduct.reorder' ),
				'limit' => '20',
				'order' =>array('PosBrand.name'=>'asc'),
 			);
			$this->request->data='';
	   }
	  
      $this->paginate  = array(
    	        	 'fields'=>array('PosProduct.id','PosProduct.name','PosProduct.image','PosProduct.status','PosProduct.pos_brand_id','PosProduct.pos_pcategory_id','PosProduct.modified','PosProduct.reorder','PosBrand.id','PosBrand.name','PosType.id','PosType.name','PosPcategory.id','PosPcategory.name','PosStock.id','PosStock.pos_product_id','PosStock.quantity','PosStock.last_sales'),
					 'conditions' =>  array($this->filtercondition_re_order_list($this->request->data), 'PosStock.quantity >= PosProduct.reorder' ),
		             'limit' => $this->Filter->searchlimit($this->request->data , 'PosProduct'),
					 'order' =>array('PosBrand.name'=>'asc'),
					 
        		); 
//pr($this->paginate);die();
		
	 $this->PosProduct->unbindModel(array('hasMany'=>array('PosCompatibility','Productmod','PosProductColor' ),'belongsTo'=>array('PosBrand','PosType','PosPcategory'),'hasOne'=>array('PosStock') ));
	 
	 	 $this->PosProduct->bindModel(array('belongsTo'=>array('PosBrand'=>array(
		 'className' => 'PosBrand',
			'foreignKey' => 'pos_brand_id',
 			 'type' => 'INNER',
 		 ),'PosType'=>array(
		 'className' => 'PosType',
			'foreignKey' => 'pos_type_id',
 			 'type' => 'INNER',
 		 ),'PosPcategory'=>array(
		 'className' => 'PosPcategory',
			'foreignKey' => 'pos_pcategory_id',
 			 'type' => 'INNER',
 		 )),'hasOne'=>array('PosStock'=>array(
		 'className' => 'PosStock',
			'foreignKey' => 'pos_product_id',
 			 'type' => 'INNER',
 		 )) ));

		  
 		
		 
		 $this->PosProduct->recursive = 1;
	// pr($this->paginate());
		 
 		$this->set('posProducts', $this->paginate());
		$this->set('category',$this->PosProduct->PosPcategory->find('list',array('order'=>'name asc')));
		$this->set('brand',$this->PosProduct->PosBrand->find('list',array('order'=>'name asc')));
		$this->set('posTypes',$this->PosProduct->PosType->find('list',array('order'=>'id asc')));
 		$this->set('colors',$this->PosProduct->PosProductColor->Color->find('list',array('order'=>'name asc')));
	 
        $this->set('sortoption',array());
        $this->set('page_titles', 'Re-Order List'); 
		
		
		if($is_report == 'yes'){
			$this->layout  = 'wcreport';
			$this->set('reportheading','Product List');
			//$this->set('modelname','PosProduct');
			//$this->set('conditionarray',$this->Session->read( 'PosProductSearch' ));
		
 			$this->render('/PosProducts/productlist');
		}
		
	}
	 
	 function view($id = null) {
	 
		if (!$id) {
			$this->Session->setFlash(__('Invalid pos product', true));
			$this->redirect(array('action' => 'index'));
		}
 		  
		 $posproduct=$this->PosProduct->find('first',array('conditions'=>array('PosProduct.id'=>$id)));
 		 
		 if($posproduct['PosProduct']['pos_type_id'] == 1){
			$this->loadModel('PosCompatibility');
			$this->PosCompatibility->unbindModelAll();
			$this->PosCompatibility->bindModel(array(
						'belongsTo'=>array('PosProduct'=>array(
						'className' => 'PosProduct',
						'foreignKey' => 'pos_product_id'
					)
			
				)
			));
		    $this->PosCompatibility->recursive = 2;
			$this->PosProduct->unbindModel(array('hasMany'=>array('PosCompatibility','PosProductColor','PosBarcode','Productmod')));
			$this->set('comProducts',$this->PosCompatibility->find('all',array('conditions'=>array('PosCompatibility.com_product_id'=>$id)))); 
			 
		 }
		 
		 
		 $this->loadModel('Color');
		 $this->set('colors',$this->Color->find('list'));
	  	 $this->set('posProduct',$posproduct);
		 
         $this->set('page_titles', 'View of  Product'); 
	 	 
	}
	
	 function checksolidproduct($id = null){
	
		  /// if ($this->RequestHandler->isAjax()) {	
		  	$solid=$this->PosProduct->find('first',array('fields'=>array('id'),'recursive'=>-1,'conditions'=>array('PosProduct.id'=>$id,'PosProduct.pos_type_id'=>1)));
		 
			 if(!empty($solid)){
				echo '1';
			 }
			 else {
				echo '0';
			 }
			    Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		// }
	 }
	 
	 
	  function checkbarcode($id = null){
	
		    if ($this->RequestHandler->isAjax()) {	
 		   	$barcode_product=$this->PosProduct->find('first',array('recursive'=>1,'conditions'=>array('PosProduct.id'=>$id)));
 				   //pr($barcode_product);
 				
				echo json_encode($barcode_product); 
				  
 			 	Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
	 		 }
		 
	 }
	 
	  
	 
	  
	 function add( ) {
		$this->PosProduct->recursive = 1;
 	    if ($this->request->is('ajax')) {
		  if (!empty($this->request->data)) {
		  
		//  pr($this->request->data); die('anwar');
			App::uses('Sanitize', 'Utility');
			$output= array();  
			$fileDestination = 'img/PosProducts';
			$options = array();    
			if(!empty($this->request->data['PosProduct']['image']['name'])){
				try{
					$output = $this->ImageUploader->upload($this->request->data['PosProduct']['image'],$fileDestination,$options);     			
				}
				catch(Exception $e)
				{ 
					$output = array('bool'=>FALSE,'error_message'=>$e->getMessage());
				} 
				$this->request->data['PosProduct']['image'] = $output['file_path'];
			}
			
			else{
				$this->request->data['PosProduct']['image'] ='';
				} 
				
		    //========================= Create Slug =====================//
			if(empty($this->request->data['PosProduct']['slug'])){
				$this->request->data['PosProduct']['slug'] = $this->PosProduct->createSlug($this->request->data['PosProduct']['name']);
			}
			//========================= End Create Slug =================//
						
						//pr($this->request->data['PosProductColor']); die('anwar');
						
			$this->request->data['PosBarcode']['barcode'] = preg_replace('/[^A-Za-z0-9\-]/', '',$this->request->data['PosBarcode']['barcode']);
						
	  		$this->PosProduct->create();
			if ($this->PosProduct->save($this->request->data)) {
					$productid=$this->PosProduct->getLastInsertId();
				 
				 	$productcolor['pos_product_id']=$productid;
					if(!empty($this->request->data['PosProductColor']['color_id'])){
					foreach($this->request->data['PosProductColor']['color_id'] as $color){
							$productcolor['color_id']=$color;
							$this->loadModel('PosProductColor');
							$this->PosProductColor->create();
							$this->PosProductColor->save($productcolor);
					 }
					}
				 
				  	
 					$stock['PosStock']['pos_product_id']=$productid;
					$stock['PosStock']['last_purchase'] = $this->request->data['PosProduct']['purchaseprice'];
					$stock['PosStock']['last_sales'] = $this->request->data['PosProduct']['salesprice'];
					 
					$this->loadModel('PosStock');
					$this->PosStock->create();
				if($this->PosStock->save($stock))
				{
				 
				  if($this->request->data['PosProduct']['pos_type_id'] != 1){
							$this->loadModel('PosBarcode');
							$barcode['PosBarcode']['pos_product_id']=$productid;
							$barcode['PosBarcode']['status'] = 1;
							$barcode['PosBarcode']['barcode']=$this->request->data['PosBarcode']['barcode'];
							$this->PosBarcode->create();
							$this->PosBarcode->save($barcode);
						} 
				 
				 if(!empty($this->request->data['PosCompatibility'])){
						$this->loadModel('PosCompatibility');
						foreach($this->request->data['PosCompatibility'] as $pckey=>$pcVal){
						$this->PosCompatibility->create();
						$this->request->data['PosCompatibility']['pos_product_id'] = $productid;
							$this->request->data['PosCompatibility']['com_product_id'] = $pckey;
							$this->PosCompatibility->save($this->request->data['PosCompatibility']);
						}
				}
					
					 echo "Successfully Saved.";
 					
				}
				
				} else {
				 echo "Saved Failed.";
			}
				Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		  }
		 
 	  }
	  
	  	 $posProducts=$this->PosProduct->find('list');
		$posBrands = $this->PosProduct->PosBrand->find('list',array('order'=>'name asc'));
		$posPcategories = $this->PosProduct->PosPcategory->find('list',array('order'=>'name asc'));
	 	$posTypes = $this->PosProduct->PosType->find('list',array('order'=>'id asc'));
		$this->loadModel('Color');
		$posProductcolors=$this->Color->find('list');
		$this->set(compact('posBrands', 'posPcategories','posTypes','posProducts','posProductcolors'));
	  	$this->set('page_titles', 'Add New Product'); 
	 }
	 
	function popup_add( $type = null ) {
	
	  if ($this->request->is('ajax')) {
		  if (!empty($this->request->data)) {
			   	App::uses('Sanitize', 'Utility');
				$output= array();  
				$fileDestination = 'img/PosProducts';
				$options = array();    
				if(!empty($this->request->data['PosProduct']['image']['name'])){
					try{
						$output = $this->ImageUploader->upload($this->request->data['PosProduct']['image'],$fileDestination,$options);     			
					}
					catch(Exception $e)
					{ 
						$output = array('bool'=>FALSE,'error_message'=>$e->getMessage());
					} 
					$this->request->data['PosProduct']['image'] = $output['file_path'];
				}
				
				else{
					$this->request->data['PosProduct']['image'] ='';
					} 
					
				//========================= Create Slug =====================//
				if(empty($this->request->data['PosProduct']['slug'])){
					$this->request->data['PosProduct']['slug'] = $this->PosProduct->createSlug($this->request->data['PosProduct']['name']);
				}
				//========================= End Create Slug =================//
				$this->request->data['PosBarcode']['barcode'] = preg_replace('/[^A-Za-z0-9\-]/', '',$this->request->data['PosBarcode']['barcode']);			
				$this->PosProduct->create();
				if ($this->PosProduct->save($this->request->data)) {
					$productid=$this->PosProduct->getLastInsertId();
				
			//============== Product Save From Service ================
			if(!empty($this->request->data['callType']['name']) && $this->request->data['callType']['name'] == 'service'){
				$this->loadModel('ServiceDevice');
				$this->request->data['ServiceDevice']['name'] =$this->request->data['PosProduct']['name'];
				$this->request->data['ServiceDevice']['pos_pcategory_id'] =$this->request->data['PosProduct']['pos_pcategory_id'];
				$this->request->data['ServiceDevice']['pos_brand_id'] =$this->request->data['PosProduct']['pos_brand_id'];
				$this->request->data['ServiceDevice']['pos_product_id'] = $productid;
				$this->ServiceDevice->create();
				if ($this->ServiceDevice->save($this->request->data['ServiceDevice'])) {
						$serviceId=$this->ServiceDevice->getLastInsertId();
				}
			}
				
				
						
					 	
						$productcolor['pos_product_id']=$productid;
						if(!empty($this->request->data['PosProductColor']['color_id'])){
							foreach($this->request->data['PosProductColor']['color_id'] as $color){
									$productcolor['color_id']=$color;
									$this->loadModel('PosProductColor');
									$this->PosProductColor->create();
									$this->PosProductColor->save($productcolor);
							 }
						}
						$stock['PosStock']['pos_product_id']=$productid;
						$stock['PosStock']['last_purchase'] = $this->request->data['PosProduct']['purchaseprice'];
						$stock['PosStock']['last_sales'] = $this->request->data['PosProduct']['salesprice'];
						 
						$this->loadModel('PosStock');
						$this->PosStock->create();
					if($this->PosStock->save($stock))
					{
					
							if($this->request->data['PosProduct']['pos_type_id'] != 1){
								$this->loadModel('PosBarcode');
								$barcode['PosBarcode']['pos_product_id']=$productid;
								$barcode['PosBarcode']['status'] = 1;
								$barcode['PosBarcode']['barcode']=$this->request->data['PosBarcode']['barcode'];
								$this->PosBarcode->create();
								$this->PosBarcode->save($barcode);
							}
					
						if(!empty($this->request->data['PosCompatibility'])){
							$this->loadModel('PosCompatibility');
							foreach($this->request->data['PosCompatibility'] as $pckey=>$pcVal){
							$this->PosCompatibility->create();
							$this->request->data['PosCompatibility']['pos_product_id'] = $productid;
								$this->request->data['PosCompatibility']['com_product_id'] = $pckey;
								$this->PosCompatibility->save($this->request->data['PosCompatibility']);
							}
					}
					 
					 $product_info=$this->PosProduct->find('first',array('conditions'=>array('PosProduct.id'=>$productid)));
					 
					  if(!empty($this->request->data['callType']['name']) && $this->request->data['callType']['name'] == 'service'){
						  $product_info['callType']['name'] = 'service';
						  $product_info['callType']['id'] = $serviceId;
					  }else{
						  $product_info['callType']['name'] = 'product';
					  }
					  
					  echo json_encode($product_info); 
						 
					}
					
					} else {
					 echo "Saved Failed.";
				}
					Configure::write('debug', 0); 
					$this->autoRender = false;
					exit(); 
		 }
	 	  else{
			  	$posProducts=$this->PosProduct->find('list');
				$posBrands = $this->PosProduct->PosBrand->find('list',array('order'=>'name asc'));
				$posPcategories = $this->PosProduct->PosPcategory->find('list',array('order'=>'name asc'));
				if($type =='service'){
					$posTypes['1'] = 'Solid Device'; 
				}else{
					$posTypes = $this->PosProduct->PosType->find('list',array('order'=>'id asc'));
				}
				$this->loadModel('Color');
				$posProductcolors=$this->Color->find('list');
				$this->set(compact('posBrands', 'posPcategories','posTypes','posProducts','posProductcolors'));
				$this->set('page_titles', 'Add New Product');
				$this->set('callType',$type);
		  }
		     
		 
 	  }
		
		 }
	
	 
	
	
	 function edit($id = null) {
 		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid pos product', true));
			$this->redirect(array('action' => 'index'));
		}
          
		//if ($this->request->is('ajax')) {
   			 if (!empty($this->request->data)) {
		 	// pr($this->request->data);die();
		 	App::uses('Sanitize', 'Utility');
					$output= array();  
					$fileDestination = 'img/PosProducts';
					$options = array();    
					if(!empty($this->request->data['PosProduct']['image']['name'])){
						try{
							$output = $this->ImageUploader->upload($this->request->data['PosProduct']['image'],$fileDestination,$options);     			
						}
						catch(Exception $e)
						{ 
							$output = array('bool'=>FALSE,'error_message'=>$e->getMessage());
						} 
						$this->request->data['PosProduct']['image'] = $output['file_path'];
					}
					
					else{
						  unset($this->request->data['PosProduct']['image']);
						} 
						
			//========================= Create Slug =====================//
			if(empty($this->request->data['PosProduct']['slug'])){
				$this->request->data['PosProduct']['slug'] = $this->PosProduct->createSlug($this->request->data['PosProduct']['name']);
			}
			$this->request->data['PosBarcode']['barcode'] = preg_replace('/[^A-Za-z0-9\-]/', '',$this->request->data['PosBarcode']['barcode']);
			//========================= End Create Slug =================//
		 	if ($this->PosProduct->save($this->request->data)) {
			
			 		//==================== Update Device ===========
						$this->loadModel('ServiceDevice');
						$is_service_device = $this->ServiceDevice->find('first',array('conditions'=>array('ServiceDevice.pos_product_id'=>$this->request->data['PosProduct']['id']),'recursive'=>-1));
					
					    if(!empty($is_service_device)){
  							$this->ServiceDevice->updateAll(array(
							'ServiceDevice.name' => '"'.$this->request->data['PosProduct']['name'].'"',
							'ServiceDevice.pos_pcategory_id' =>$this->request->data['PosProduct']['pos_pcategory_id'],
							'ServiceDevice.pos_brand_id' =>$this->request->data['PosProduct']['pos_brand_id']),						
							
							array('ServiceDevice.pos_product_id'=>$this->request->data['PosProduct']['id']));
 						}
 					
						$productid=$this->request->data['PosProduct']['id'];
					 	$productcolor['pos_product_id']=$productid;
						 $this->loadModel('PosProductColor');
						if(!empty($this->request->data['PosProductColor']['color_id'])){ 
					 	$this->PosProductColor->deleteAll(array('PosProductColor.pos_product_id'=>$productid),false);
			   
			   		  foreach($this->request->data['PosProductColor']['color_id'] as $color)
					  {
							$productcolor['color_id']=$color;
						 	$this->PosProductColor->create();
							$this->PosProductColor->save($productcolor);
					 }
					 }
 					  	$stock['PosStock']['id']=$this->request->data['PosStock']['id'];
						$stock['PosStock']['pos_product_id']=$this->request->data['PosProduct']['id'];
						$stock['PosStock']['last_purchase'] = $this->request->data['PosProduct']['purchaseprice'];
						$stock['PosStock']['last_sales'] = $this->request->data['PosProduct']['salesprice'];
				  		$this->loadModel('PosStock');
					if($this->PosStock->save($stock))
					{
 						 if($this->request->data['PosProduct']['pos_type_id'] != 1){
								$this->loadModel('PosBarcode');
									if(!empty($this->request->data['PosBarcode']['id'])){
										$barcode['PosBarcode']['id']=$this->request->data['PosBarcode']['id'];
									}
									else{
										$this->PosBarcode->create();
									}
								$this->PosBarcode->deleteAll(array('PosBarcode.pos_product_id'=>$productid,'PosBarcode.status'=>1),false);
			   
						 		$barcode['PosBarcode']['pos_product_id']=$productid;
								$barcode['PosBarcode']['status'] = 1;
								$barcode['PosBarcode']['barcode']=$this->request->data['PosBarcode']['barcode'];
								$this->PosBarcode->save($barcode);
					  }else{
						  	$this->loadModel('PosBarcode');
						  $this->PosBarcode->deleteAll(array('PosBarcode.pos_product_id'=>$productid,'PosBarcode.status'=>1),false);
					  }
				 	 	
				 	if(!empty($this->request->data['PosCompatibility'])){
						$this->loadModel('PosCompatibility');
						$this->PosCompatibility->deleteAll(array('PosCompatibility.pos_product_id'=>$this->request->data['PosProduct']['id']),false);
						foreach($this->request->data['PosCompatibility'] as $pckey=>$pcVal){
 						$this->PosCompatibility->create();
						$this->request->data['PosCompatibility']['pos_product_id'] = $this->request->data['PosProduct']['id'];
						$this->request->data['PosCompatibility']['com_product_id'] = $pckey;
						$this->PosCompatibility->save($this->request->data['PosCompatibility']);
						
						}
						
					$this->redirect(array('action'=>'index'));
				}else{
					$this->loadModel('PosCompatibility');
					$this->PosCompatibility->deleteAll(array('PosCompatibility.pos_product_id'=>$this->request->data['PosProduct']['id']),false);
						
			 		$this->redirect(array('action' => 'index'));
				}
				
				} 
			else {
			    echo "Update Failed.";	 
				}
				 Configure::write('debug', 0); 
				 $this->autoRender = false;
				 exit();
		}
      	 
	  
	  
	   }
	 	// }
		if (empty($this->request->data)) {
			 
			$this->request->data = $this->PosProduct->read(null, $id);
		 	
			//pr($this->request->data);
			
		 }
		$posProducts=$this->PosProduct->find('list');
		$posBrands = $this->PosProduct->PosBrand->find('list',array('order'=>'name asc'));
		$posPcategories = $this->PosProduct->PosPcategory->find('list',array('order'=>'id asc'));
	 	$posTypes = $this->PosProduct->PosType->find('list',array('order'=>'name asc'));
		$this->loadModel('Color');
		$posProductcolors=$this->Color->find('list');
		$this->set(compact('posBrands', 'posPcategories','posTypes','posProducts','posProductcolors'));
     	$this->set('page_titles', 'Update Product'); 
	 
	
	}
	
	 function clean__() {

		$clean_id = '';
		$productslists = $this->PosProduct->find('list',array('conditions'=>array('PosProduct.pos_type_id !=1')));
		 
 		foreach($productslists as $id=>$val){
		if ($this->PosProduct->delete($id)) {
			
			$this->loadModel('PosCompatibility');
			$this->PosCompatibility->deleteAll(array('PosCompatibility.pos_product_id'=>$id),false);
			
			$this->loadModel('PosStock');
			$this->PosStock->deleteAll(array('PosStock.pos_product_id'=>$id),false);
			
			$this->loadModel('PosBarcode');
			$this->PosBarcode->deleteAll(array('PosBarcode.pos_product_id'=>$id),false);
			$this->loadModel('PosProductColor');
			$this->PosProductColor->deleteAll(array('PosProductColor.pos_product_id'=>$id),false);
			$datas = $this->PosProduct->read(null, $id);
			
			if(!empty($datas['PosProduct']['image'])){
				unlink($datas['PosProduct']['image']);
			 }
			 echo $id;
			 
			}
		}
		 $this->autoRender = false;
 		Configure::write('debug', 0); 
 		exit();
		
	}

	 function delete($id = null) {
 		if (!$id) {
			$this->Session->setFlash(__('Invalid id for   product', true),'warnning_message');
			$this->redirect(array('action'=>'index'));
		}
		$this->loadModel('PosPurchaseDetail');
		$datas = $this->PosPurchaseDetail->find('first' , array('conditions'=>array('PosPurchaseDetail.pos_product_id'=>$id),'recursive'=> -1));
	 
		if(empty($datas)){
 		
		if ($this->PosProduct->delete($id)) {
			
			$this->loadModel('PosCompatibility');
			$this->PosCompatibility->deleteAll(array('PosCompatibility.pos_product_id'=>$id),false);
			
			$this->loadModel('PosStock');
			$this->PosStock->deleteAll(array('PosStock.pos_product_id'=>$id),false);
			
			$this->loadModel('PosBarcode');
			$this->PosBarcode->deleteAll(array('PosBarcode.pos_product_id'=>$id),false);
			
			$this->loadModel('PosProductColor');
			$this->PosProductColor->deleteAll(array('PosProductColor.pos_product_id'=>$id),false);

			
			if(!empty($datas['PosProduct']['image'])){
				unlink($datas['PosProduct']['image']);
			 }
				$this->setFlashMessage('Product deleted Success','default',array ('class' => 'success-flash flash'));
				$this->redirect(array('action' => 'index'));
			}
				$this->setFlashMessage('Product was not deleted','default',array ('class' => 'error-flash flash'));
				$this->redirect(array('action' => 'index'));
		}
 			else{
				$this->Session->setFlash(__('Product have purchase and more. You are not able to remove.'), 'warnning_message');
				$this->redirect(array('action'=>'index'));
			}
		}
	
 	 
	function getProductInfo( $id = null){
		$this->autoRender = false;
		$this->PosProduct->recursive = 0;
		return $this->PosProduct->read(null, $id) ;
		Configure::write('debug', 0); 
		exit();
	}
	
	
	 function deleteimage($modelname = null ,$fieldname = null, $id = null){
	  		$this->loadModel($modelname);
 		 	$this->$modelname->id = $id;
			if (!$this->$modelname->exists()) {
				throw new NotFoundException(__('Invalid product'));
			}
			$datas = $this->$modelname->read(null, $id);
 			unlink($datas[$modelname][$fieldname]);
			
			/*if($modelname =='ProductImage' || $modelname =='ProductItemImage'){
			
			if ($this->$modelname->delete()) {
				echo 1;
				}
			}else{*/
 				$dataupdate['id'] = $id;
				$dataupdate[$fieldname] = '';
				if($this->$modelname->Save($dataupdate)){
					echo 1;
				}else{
					echo 0;
				}
 			//} 
 			$this->autoRender =false;
			$this->layout = 'ajax';
 	  }
	 
}
	 