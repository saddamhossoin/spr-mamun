<?php

App::uses('AppController', 'Controller');
 App::uses('BarcodeHelper','Vendor');  
/**
 * Barcodes Controller
 *
 * @property Barcode $Barcode
 * @property PaginatorComponent $Paginator
 */
class BarcodesController extends AppController {  

/**
 * Components
 *
 * @var array  
 */
	public $components = array('Paginator');
	
	function autoBarcodeGenerate(){      
		
		$this->loadModel('PosProduct'); 
		
		$posProducts = $this->PosProduct->find('all',array('fields'=>array('PosProduct.id','PosProduct.name','PosProduct.pos_pcategory_id','PosPcategory.name','PosBrand.name'),'conditions'=>array('PosProduct.pos_type_id != 1'),'recursive'=> 0  ));
	//	pr($posProducts);die();
		
		foreach($posProducts as $key=>$value){
		
 		$maxNumber = $this->Barcode->find('first',array('fields'=>array('MAX(Barcode.id) as maxid'),'conditions'=>array('Barcode.pos_pcategory_id'=>$value['PosProduct']['pos_pcategory_id'])));
			
			$this->request->data['Barcode']['pos_pcategory_id'] = $value['PosProduct']['pos_pcategory_id'];
			$this->request->data['Barcode']['pos_product_id'] = $value['PosProduct']['id'] ;
			$catename = substr($value['PosPcategory']['name'],  0, 3);
 		
			$barcode=new BarcodeHelper();
 			// Generate Barcode data
			
			$barcode->barcode();
			$barcode->setType('C128');
			$barcode->hideCodeType();
			$barcode->setSize(40,214);
 				
 			
			//echo $i;
			$data_to_encode = "SPR$catename".sprintf('%04d', $maxNumber['0']['maxid']);
			$barcode->setProductName($value['PosBrand']['name']. ' ' .$value['PosProduct']['name']); 
			$barcode->setCode($data_to_encode);
			// Generate filename    
			 $this->request->data['Barcode']['barcode'] = $data_to_encode;
			$maxNumberIt = sprintf('%04d', $maxNumber['0']['maxid']);       
			$file = 'img/barcode/SPR'.$catename.''.$maxNumberIt.'.png';
			//echo $file;
			$this->request->data['Barcode']['filename'] = $file;
		
			// Generates image file on server           
			$barcode->writeBarcodeFile($file);
 				
				$this->Barcode->create();
				if ($this->Barcode->save($this->request->data)) {
					$this->loadModel('PosBarcode');
							$barcode1['PosBarcode']['pos_product_id'] = $value['PosProduct']['id'];
							$barcode1['PosBarcode']['status'] = 1;
							$barcode1['PosBarcode']['barcode']=$data_to_encode;
							$this->PosBarcode->create();
							$this->PosBarcode->save($barcode1);
				} else {
					  echo "Saved Failed.";
				}
				 
			 
				
	}	
	Configure::write('debug', 0); 
			$this->autoRender = false;
			exit(); 
	}

	function filtercondition($data=null)
	{
		$conditionarray = '';
		$conditionarray .= $this->Filter->gfilter($data,'Barcode');
		return $conditionarray;	
	}
    

	function index($yes = null) {
    
    	if( ! empty($this->request->data ) ){
            $this->Session->delete('BarcodeSearch');
            $this->Session->write( 'BarcodeSearch', $this->request->data );
        }
         if( $this->Session->check( 'BarcodeSearch' ) ){
              $this->request->data = $this->Session->read( 'BarcodeSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'BarcodeSearch' );
			$this->Barcode->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('Barcode.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'Barcode'),
					'order' =>$this->Filter->sortoption($this->request->data,  'Barcode'),
					'group'=>array('lot_number')
        		);
    
		$this->Barcode->recursive = 0;
		//pr($this->paginate());
		$this->set('barcodes', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'Barcode List'); 
	}
	function _view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid barcode', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('barcode', $this->Barcode->read(null, $id));
         $this->set('page_titles', 'Barcode View'); 
	}
	
	
	 function barcode_print_product( $barcodeVal = null) {
	 // pr($barcodeVal);die();
 		if (!$barcodeVal) {
			$this->Session->setFlash(__('Invalid barcode', true));
			$this->redirect(array('action' => 'index'));
		}
		$singlebarcodes = $this->Barcode->find('first',array('conditions'=>array('ltrim(rtrim(Barcode.barcode))'=>$barcodeVal),'recursive'=>-1));
		 
 		$this->set('singlebarcodes',$singlebarcodes);
 	}
	
	 function barcode_print_purchase ( $barcodeval = null ) {
	 
		
		$barcodes = $this->Barcode->find('first',array('conditions'=>array('Barcode.barcode'=>$barcodeval),'recursive'=>-1));
		$lot_numbers = $this->Barcode->find('all',array('conditions'=>array('Barcode.lot_number'=>$barcodes['Barcode']['lot_number']),'recursive'=>-1));
		
		$this->set('barcodes',$barcodes);
		//pr($barcodes);
		
		$this->set('lot_numbers',$lot_numbers);
		
		
 	}
	

	function view($id = null) {
 		if (!$id) {
			$this->Session->setFlash(__('Invalid barcode', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('barcodes', $this->Barcode->find('all',array('conditions'=>array('Barcode.lot_number'=>$id))));
         $this->set('page_titles', 'Barcode View'); 
	}
	
	
    function bulkprint($id = null) {
 		if (!$id) {
			$this->Session->setFlash(__('Invalid barcode', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('barcodes', $this->Barcode->find('all',array('conditions'=>array('Barcode.lot_number'=>$id),'recursive'=>-1,'limit'=>100)));
        $this->set('page_titles', 'Barcode View'); 
	}
	
	
   	function add_from_product_edit( $product_id = null , $cat_id = null , $cat_nmae = null,  $product_name = null , $brand_name = null) {
 		if (!empty($cat_id ) && !empty($product_name ) ) {
 		 
			$this->loadModel('PosProduct');
		  
 			$maxNumber = $this->Barcode->find('first',array('fields'=>array('MAX(Barcode.id) as maxid '),'conditions'=>array('Barcode.pos_pcategory_id'=>$cat_id)));
		 
  		    $catename = substr($cat_nmae,  0, 3);
			
			
			$this->request->data['Barcode']['pos_pcategory_id'] = $cat_id;
  		
			$barcode=new BarcodeHelper();
 			// Generate Barcode data
			
			$barcode->barcode();
			$barcode->setType('C128');
			$barcode->hideCodeType();
			$barcode->setSize(40,210);
			
  			$this->loadModel('PosBarcode');
			
			$exiting_barcode = $this->PosBarcode->find('first',array('fields'=>array('PosBarcode.barcode'),'conditions'=>array('PosBarcode.pos_product_id'=>$product_id),'recursive'=>-1));
			//  var_dump($exiting_barcode);die();
			if(empty($exiting_barcode['PosBarcode']['barcode'])){
				
				$data_to_encode = "SPR$catename".sprintf('%04d', $maxNumber['0']['maxid']+1);
				$maxNumberIt = sprintf('%04d', $maxNumber['0']['maxid']+1); 
				$file = 'img/barcode/SPR'.$catename.''.$maxNumberIt.'.png';
				$this->Barcode->create();
			}else{
			
				$data_to_encode = $exiting_barcode['PosBarcode']['barcode'];
				$file = 'img/barcode/'.trim($exiting_barcode['PosBarcode']['barcode']).'.png';
				
				$edit_id = $this->Barcode->find('first',array('fields'=>array('id'),'conditions'=>array('Barcode.barcode'=>$exiting_barcode['PosBarcode']['barcode'])));
				
				$this->request->data['Barcode']['id'] = $edit_id ['Barcode']['id'];
			}
			
 			
			$barcode->setProductName($brand_name. ' ' .$product_name); 
 			$barcode->setCode($data_to_encode);
			$this->request->data['Barcode']['barcode'] = preg_replace('/[^A-Za-z0-9\-]/', '',  $data_to_encode);
 		 
			$this->request->data['Barcode']['filename'] = $file;
		
			// Generates image file on server           
			    $barcode->writeBarcodeFile($file);
 				
			//	pr($this->request->data);die();
				if ($this->Barcode->save($this->request->data)) {
					 echo $data_to_encode;
 					 //echo ;
				} else {
					 echo "0";
				}
 			Configure::write('debug', 0); 
			$this->autoRender = false;
			exit(); 
  		}
	}
 
	
	function add_from_product( $cat_id = null , $cat_nmae = null,  $product_name = null , $brand_name = null) {
	
 		if (!empty($cat_id ) && !empty($product_name ) ) {
 		 
			$this->loadModel('PosProduct');
		  
 			$maxNumber = $this->Barcode->find('first',array('fields'=>array('MAX(Barcode.id) as maxid'),'conditions'=>array('Barcode.pos_pcategory_id'=>$cat_id)));
			
 			$this->request->data['Barcode']['pos_pcategory_id'] = $cat_id;
 			
			$catename = substr($cat_nmae,  0, 3);
 		
			$barcode=new BarcodeHelper();
 			// Generate Barcode data
			
			$barcode->barcode();
			$barcode->setType('C128');
			$barcode->hideCodeType();
			$barcode->setSize(40,210);
 
 			$data_to_encode = "SPR$catename".sprintf('%04d', $maxNumber['0']['maxid']+1);
			$barcode->setProductName($brand_name. ' ' .$product_name); 

			$barcode->setCode($data_to_encode);
			$this->request->data['Barcode']['barcode'] = preg_replace('/[^A-Za-z0-9\-]/', '', $data_to_encode); 
			// Generate filename    
			$maxNumberIt = sprintf('%04d', $maxNumber['0']['maxid']+1); 
			   
			$file = 'img/barcode/SPR'.$catename.''.$maxNumberIt.'.png';
			//echo $file;
			$this->request->data['Barcode']['filename'] = $file;
		
			// Generates image file on server           
			$barcode->writeBarcodeFile($file);
 				 
				$this->Barcode->create();
				if ($this->Barcode->save($this->request->data)) {
					 echo $data_to_encode;
 					 //echo ;
				} else {
					 echo "0";
				}
			Configure::write('debug', 0); 
			$this->autoRender = false;
			exit(); 
		}
 
	}
	
 function purchase_barcode( $product_id = null , $quantity = null   ) {
		$this->loadModel('PosProduct');
		$this->loadModel('PosBarcode');
  
  		$lotNumber_purchase = $this->Barcode->find('first',array('fields'=>array('max(Barcode.lot_number) as maxlot')));
   		$posProducts = $this->PosProduct->find('first',array('fields'=>array('PosProduct.id','PosProduct.name','PosProduct.pos_pcategory_id','PosPcategory.name','PosBrand.name'),'conditions'=>array('PosProduct.id' => $product_id),'recursive'=> 0  ));
       	$maxNumber = $this->Barcode->find('first',array('fields'=>array('count(Barcode.id) as maxid' ),'conditions'=>array( 'Barcode.pos_product_id'=>$posProducts['PosProduct']['id'])));
   
		$catename = substr($posProducts['PosPcategory']['name'],  0, 3);
		$barcode=new BarcodeHelper();
		// Generate Barcode data
   
		$barcode->barcode();
		$barcode->setType('C128');
		$barcode->hideCodeType();
		$barcode->setSize(40,210);
		
		$return_array = array();
		 
   for($i = 1; $i < $quantity+1  ; $i++){
 	   
	  
	   $data_to_encode = "SPR$catename-".$posProducts['PosProduct']['id']."-".sprintf('%04d', $maxNumber['0']['maxid']+$i);
 	   $barcode->setProductName($posProducts['PosBrand']['name']. ' ' .$posProducts['PosProduct']['name']); 
	   $barcode->setCode($data_to_encode);
	   // Generate filename    
	   $maxNumberIt = sprintf('%04d', $maxNumber['0']['maxid']+$i);       
	   $file = 'img/barcode/SPR'.$catename.'-'.$posProducts['PosProduct']['id'].'-'.$maxNumberIt.'.png';
 	   
	   // Generates image file on server           
		  $barcode->writeBarcodeFile($file);
		 $this->request->data['Barcode']['barcode'] = preg_replace('/[^A-Za-z0-9\-]/', '', $data_to_encode);
		$this->request->data['Barcode']['filename'] = $file;
		$this->request->data['Barcode']['pos_pcategory_id'] = $posProducts['PosProduct']['pos_pcategory_id'];
		$this->request->data['Barcode']['pos_product_id'] = $posProducts['PosProduct']['id'];
		$this->request->data['Barcode']['lot_number'] = $lotNumber_purchase[0]['maxlot']+1;
		 
		 
   		$this->Barcode->create();
    
		if ($this->Barcode->save($this->request->data)) {
		  $return_array[$i] = $data_to_encode;
		
		} else {
			echo "Fail Barcode Purchase";
		}
   }
     echo json_encode($return_array);
             
   Configure::write('debug', 0); 
   $this->autoRender = false;
   exit(); 
   
   

   }
	
	function add() {
  		
		if (!empty($this->request->data)) {
 		 
			$this->loadModel('PosProduct');
		 	$product= $this->PosProduct->find('first',array('conditions'=>array('PosProduct.id'=>$this->request->data['Barcode']['pid']),'recursive'=>1));
 			$maxNumber = $this->Barcode->find('first',array('fields'=>array('MAX(Barcode.id) as maxid'),'conditions'=>array('Barcode.pos_pcategory_id'=>$product['PosProduct']['pos_pcategory_id'])));
			
			$this->request->data['Barcode']['pos_pcategory_id'] = $product['PosProduct']['pos_pcategory_id'];
			$this->request->data['Barcode']['pos_product_id'] = $this->request->data['Barcode']['pid'] ;
			$catename = substr($product['PosPcategory']['name'],  0, 3);
 		
			$barcode=new BarcodeHelper();
 			// Generate Barcode data
			
			$barcode->barcode();
			$barcode->setType('C128');
			$barcode->hideCodeType();
			$barcode->setSize(40,210);
 				
			for($i = 1; $i < $this->request->data['Barcode']['number']+1; $i++){
			
			//echo $i;
			$data_to_encode = "SPR$catename".sprintf('%04d', $maxNumber['0']['maxid']+$i);
			$barcode->setProductName($value['PosBrand']['name']. ' ' .$value['PosProduct']['name']); 
			$barcode->setCode($data_to_encode);
			// Generate filename    
			$maxNumberIt = sprintf('%04d', $maxNumber['0']['maxid']+$i);       
			$file = 'img/barcode/SPR'.$catename.''.$maxNumberIt.'.png';
			//echo $file;
			$this->request->data['Barcode']['filename'] = $file;
		
			// Generates image file on server           
			$barcode->writeBarcodeFile($file);
 				
				$this->Barcode->create();
				if ($this->Barcode->save($this->request->data)) {
					// echo ",SPR_RIC".$maxNumberIt.".png";
 					 //echo ;
				} else {
					// echo "Saved Failed.";
				}
			}
			
			$this->redirect(array('action'=>'bulkprint',$this->request->data['Barcode']['lot_number'])); 
            
			Configure::write('debug', 0); 
			$this->autoRender = false;
			exit(); 
		}
     
		$this->loadModel('PosProduct');
		$posProducts = $this->PosProduct->find('list',array('fields'=>array('id','name'),'recursive'=> -1 ));
 		$this->set('posProducts',$posProducts);
		
	   $this->set('page_titles', 'New Barcode');
	   $this->loadModel('PosPcategory');
	   $this->set('lotNumber',$this->Barcode->find('first',array('fields'=>array('max(Barcode.lot_number) as maxlot'))));
	   $this->set('posPcategories',$this->PosPcategory->find('list',array('order'=>'name asc'))); 

	}
	
	
	

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid barcode', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
		if (!empty($this->request->data)) {
			if ($this->Barcode->save($this->request->data)) {
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
			$this->request->data = $this->Barcode->read(null, $id);
		}
     $this->set('page_titles', 'Update Barcode'); 
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for barcode', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Barcode->delete($id)) {
			$this->Session->setFlash(__('Barcode deleted', true));
			$this->redirect(array('action'=>'index'));
		}
			$this->Session->setFlash(__('Barcode was not deleted', true));
			$this->redirect(array('action' => 'index'));
		}
	}
