<?php
App::uses('AppController', 'Controller');
/**  
 * PosBarcodes Controller
 *
 * @property PosBarcode $PosBarcode
 * @property PaginatorComponent $Paginator
 */
class PosBarcodesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


	function filtercondition($data=null)
	{
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'PosBarcode');
			 
			  
	 	if(!empty($this->request->data['PosProduct']['pos_pcategory_id']))
				{
					if(!empty($conditionarray))
					{
						$conditionarray .= " AND ";
					}
						$conditionarray .= 'PosProduct.pos_pcategory_id ='.$this->request->data['PosProduct']['pos_pcategory_id'];	
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
					 
					 
 			 return $conditionarray;	
	}
	
	function index($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('PosBarcodeSearch');
            $this->Session->write( 'PosBarcodeSearch', $this->request->data );
        }
         if( $this->Session->check( 'PosBarcodeSearch' ) ){
              $this->request->data = $this->Session->read( 'PosBarcodeSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'PosBarcodeSearch' );
			$this->PosBarcode->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('PosBarcode.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'PosBarcode'),
					'order' =>$this->Filter->sortoption($this->request->data,  'PosBarcode'),
        		);

    
		$this->PosBarcode->recursive = 0;
	 //	pr($this->paginate());
		$this->set('barcodes', $this->paginate());
		
        $this->set('sortoption',array());
		$this->loadModel('PosProduct');
		 
		$posProducts = $this->PosProduct->find('list',array('fields'=>array('id','name'),'recursive'=> -1 ));
 		$this->set('posProducts',$posProducts);
		
		$this->set('category',$this->PosProduct->PosPcategory->find('list'));

        $this->set('page_titles', 'PosBarcode List'); 
	}
	
	  
	function DuplicateBarcodeCheck($id= null){
			//if ($this->RequestHandler->isAjax()) {
		 $barcode=$this->PosBarcode->find('first',array('recursive'=>-1,'conditions'=>array('PosBarcode.barcode'=>$id)));
				//pr($barcode);
				if(!empty($barcode)){
					echo 1;
				 }
				else{
					echo 0;
			 	}
				
				Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 	
				
				//}
	}
	  
	  
	function BarcodeSearch( $data = null)
		 {
 			 $conditionarray = '';
			   if(!empty($this->request->data['PosBarcode']['barcode']))
				{
 					if(!empty($conditionarray)){$conditionarray .= " AND ";}
					$conditionarray .= 'PosBarcode.barcode like \'%'.$this->request->data['PosBarcode']['barcode']."%'";		
 			 }
  		return $conditionarray;	
	}
	
	function ProductBaseBarcode($yes = null,$id=null,$order=null){
 	
		if( !empty($this->request->data) ){
		 
		    $this->Session->delete('ProductBarcodeSearch');
            $this->Session->write( 'ProductBarcodeSearch', $this->request->data );
        }
         if( $this->Session->check( 'ProductBarcodeSearch' ) ){
              $this->request->data = $this->Session->read( 'ProductBarcodeSearch' );
           }
 		    $this->paginate  = array(
    	        	'conditions' =>  array($this->BarcodeSearch($this->request->data),'PosBarcode.pos_product_id'=>$id,'PosBarcode.is_sold'=>0));
				
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ProductBarcodeSearch' );
			$this->PosBarcode->recursive = -1;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('PosBarcode.barcode'=>'asc'),
 				'conditions'=>array("PosBarcode.pos_product_id" =>$id,'PosBarcode.is_sold'=>0),
 			);
 			$this->request->data='';
	   }
	 
	   	$this->set('all_barcode', $this->paginate());
		$this->set('order',$order);
  	
	}
	
	 
    
	function sales_barcode($id=null,$quantity= null,$order=null){
 			
		  $this->set('id',$id);
		  $this->set('quantiy',$quantity);
		  $this->set('order',$order);
	 	  
	}
	
	function barcode_remove( $purchase_detail_id = null , $quantity = null   ){
 
 		  $this->set('purchase_detail_id' , $purchase_detail_id);
		  $this->set('quantiy' , $quantity);
	}
	
	//========    This Function used for Sales Return ===============//
	function barcode_return( $sale_detail_id = null , $quantity = null   ){
		  $this->set('sale_detail_id' , $sale_detail_id);
		  $this->set('quantiy' , $quantity);
	}
	
	
	function ProductBaseBarcodeReturn($yes = null,$id=null){
 	
		if( !empty($this->request->data) ){
		 
		    $this->Session->delete('ProductBarcodeSearch');
            $this->Session->write( 'ProductBarcodeSearch', $this->request->data );
        }
         if( $this->Session->check( 'ProductBarcodeSearch' ) ){
              $this->request->data = $this->Session->read( 'ProductBarcodeSearch' );
           }
 		    $this->paginate  = array(
    	        	'conditions' =>  array($this->BarcodeSearch($this->request->data),'PosBarcode.pos_sale_detail_id'=>$id,'PosBarcode.is_sold'=>1));
				
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ProductBarcodeSearch' );
			$this->PosBarcode->recursive = -1;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('PosBarcode.barcode'=>'asc'),
 				'conditions'=>array("PosBarcode.pos_sale_detail_id" =>$id,'PosBarcode.is_sold'=>1),
 			);
 			$this->request->data='';
	   }
	  
	   	$this->set('all_barcode', $this->paginate());
  	
	}
	
	//========= End of Sales Return =====================//
	
	function ProductBaseBarcodeRemove($yes = null,$id=null){
 	
		if( !empty($this->request->data) ){
		 
		    $this->Session->delete('ProductBarcodeSearch');
            $this->Session->write( 'ProductBarcodeSearch', $this->request->data );
        }
         if( $this->Session->check( 'ProductBarcodeSearch' ) ){
              $this->request->data = $this->Session->read( 'ProductBarcodeSearch' );
           }
 		    $this->paginate  = array(
    	        	'conditions' =>  array($this->BarcodeSearch($this->request->data),'PosBarcode.pos_purchase_detail_id'=>$id,'PosBarcode.is_sold'=>0));
				
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'ProductBarcodeSearch' );
			$this->PosBarcode->recursive = -1;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('PosBarcode.barcode'=>'asc'),
 				'conditions'=>array("PosBarcode.pos_purchase_detail_id" =>$id,'PosBarcode.is_sold'=>0),
 			);
 			$this->request->data='';
	   }
	 
	 
	   	$this->set('all_barcode', $this->paginate());
  	
	}
	
	
	

	

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid barcode', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('barcode', $this->PosBarcode->read(null, $id));
         $this->set('page_titles', 'PosBarcode View'); 
	}

	function add() {
    if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			$this->PosBarcode->create();
			if ($this->PosBarcode->save($this->request->data)) {
				 echo "Successfully Saved.";
			} else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		}
      }
		$posProducts = $this->PosBarcode->PosProduct->find('list');
		$this->set(compact('posProducts'));
	   $this->set('page_titles', 'New PosBarcode'); 

	}
	
	
	
	
	

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid barcode', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->PosBarcode->save($this->request->data)) {
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
			$this->request->data = $this->PosBarcode->read(null, $id);
		}
		$posProducts = $this->PosBarcode->PosProduct->find('list');
		$this->set(compact('posProducts'));
     $this->set('page_titles', 'Update PosBarcode'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for barcode', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PosBarcode->delete($id)) {
			$this->Session->setFlash(__('PosBarcode deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('PosBarcode was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}}
