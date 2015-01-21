<?php 
class PosSalesController extends AppController {

	var $name = 'PosSales'; 
   var $components = array( 'RequestHandler', 'Filter');
   
   function reportpage(){
   }
   
    function filtercondition($data=null)
		 {  
 			 $conditionarray = '';
			 $conditionarray .= $this->Filter->gfilter($data,'PosSale');
			 
			 if(!empty($this->request->data['PosSale']['pos_customer_id']))
				{
					if(!empty($conditionarray)) 
					{
						$conditionarray .= " AND ";
					}
						$conditionarray .= 'PosSale.pos_customer_id ='.$this->request->data['PosSale']['pos_customer_id'];	
 			 }
			 
 		return $conditionarray;	
	}
  	function index($yes = null , $is_report = null) {
    $this->loadModel('PosCustomer');
	$suppliername=$this->PosCustomer->find('list');
	$this->set('suppliername',$suppliername);
    	if( ! empty( $this->request->data ) ){
            $this->Session->delete('PosSaleSearch');
            $this->Session->write( 'PosSaleSearch', $this->request->data );
        }
         if( $this->Session->check( 'PosSaleSearch' ) ){
              $this->request->data = $this->Session->read( 'PosSaleSearch' );
           }
	  if($yes == 'yes')
	   {
			$this->Session->delete( 'PosSaleSearch' );
			$this->PosSale->recursive = 0;
			$this->paginate  = array(
 				'limit' => '20',
				'order' =>array('PosSale.modified'=>'desc'),
 			);
			$this->request->data='';
	   }
	    $this->paginate  = array(
    	        	'conditions' =>  array($this->filtercondition($this->request->data) ),
		            'limit' => $this->Filter->searchlimit($this->request->data , 'PosSale'),
					'order' =>$this->Filter->sortoption($this->request->data,  'PosSale'),
        		);

    
		$this->PosSale->recursive = 0;
		$this->set('posSales', $this->paginate());
        $this->set('sortoption',array());
        $this->set('page_titles', 'List of Sale'); 
  		if($is_report == 'yes'){
 		$this->layout  = 'wcreport';
		$this->render('/PosSales/indexprint');
	}
}
	
	
	
	function view($id = null , $report=null) {
	
 		if(!$id) {
 			$this->Session->setFlash(__('Invalid pos sale', true));
			$this->redirect(array('action' => 'index'));
 		 }
		 
		 $this->PosSale->recursive = -1;
		 $item = $this->PosSale->find('first', array('conditions'=>array('PosSale.id'=>$id),'fields'=>array('fattura_no')));
		
		if(is_null($item['PosSale']['fattura_no'])){
			
			$queryResult = $this->PosSale->query("SELECT MAX(fattura_no) +1 as topnumber  from mayasoftbd_pos_sales");
			   
			   if(is_null($queryResult[0][0]['topnumber'])){$queryResult[0][0]['topnumber'] = 1;}
			 
			$queryResult1 = $this->PosSale->query("UPDATE  mayasoftbd_pos_sales set fattura_no =".$queryResult[0][0]['topnumber']."  WHERE id =".$id);
			 
			
	 
		}
	
		 $this->PosSale->recursive = 2;
		 
		$this->loadModel('PosCustomer');
		$this->loadModel('PosCustomerLedger');
		$this->PosCustomer->unbindModelAll();
		$this->PosCustomerLedger->unbindModelAll();
 		
		$this->loadModel('PosSaleDetail');
		
		$this->PosSaleDetail->unbindModelAll();
		$this->PosSaleDetail->bindModel(  array('belongsTo' => array(
							'PosProduct' => array(
							'className' => 'PosProduct',
							'foreignKey' => 'pos_product_id',
							'type' => 'INNER'
							),
							'PosBarcode' => array(
							'className' => 'PosBarcode',
							'foreignKey' => 'pos_sale_detail_id',
							'type' => 'INNER'
							) 
						)
				) );
			    $this->PosSaleDetail->bindModel(  array('hasMany' => array(
									'PosBarcode' => array(
									'className' => 'PosBarcode',
									'foreignKey' => 'pos_sale_detail_id',
                                    'type' => 'INNER'
                                    ) 
                                )
               ) );
			   
			   	$this->PosSale->bindModel( array('hasMany' => array(
                              		'PosCustomerLedger' => array(
									'className' => 'PosCustomerLedger',
									'foreignKey' => 'pos_sale_id',
									'conditions'=>array('debit_credit'=>2),
                                    'type' => 'INNER'
                                    ) 
                                )
               ) );
			   
		
		 $this->set('posSale', $this->PosSale->read(null, $id));
         $this->set('page_titles', 'Sale View'); 
	 	 $this->loadModel('AccountsHead');
		 $this->set('accountsheads',$this->AccountsHead->find('list'));
		 $this->set('reportheading',"Sales Invoice ");
		// 
		 
		 
		 switch ($report) {
		case "ddt_report":
			 $this->render('/PosSales/ddt_report');
			  $this->layout="ajax";
			break;
		case "order_report":
			 $this->render('/PosSales/order_report');
			break;
		case "recepit_report":
			 $this->render('/PosSales/recepit_report');
			break;
		case "estimate_report":
			 $this->render('/PosSales/estimate_report');
			break;
		default:
			 $this->render('/PosSales/view');
			 $this->layout="invoice";
 			}
		
 	 
	}
	
	
	function invoice_view($id = null , $report=null) {
 		if(!$id) {
 			$this->Session->setFlash(__('Invalid pos sale', true));
			$this->redirect(array('action' => 'index'));
		 }

		
		$this->PosSale->recursive = 2;
		$this->loadModel('PosSaleDetail');
		
		$this->PosSaleDetail->unbindModelAll();
		$this->PosSaleDetail->bindModel(  array('belongsTo' => array(
							'PosProduct' => array(
							'className' => 'PosProduct',
							'foreignKey' => 'pos_product_id',
							'type' => 'INNER'
							),
							'PosBarcode' => array(
							'className' => 'PosBarcode',
							'foreignKey' => 'pos_sale_detail_id',
							'type' => 'INNER'
							) 
						)
				) );
			    $this->PosSaleDetail->bindModel(  array('hasMany' => array(
									'PosBarcode' => array(
									'className' => 'PosBarcode',
									'foreignKey' => 'pos_sale_detail_id',
                                    'type' => 'INNER'
                                    ) 
                                )
               ) );
			   
			   	$this->PosSale->bindModel( array('hasMany' => array(
                              		'PosCustomerLedger' => array(
									'className' => 'PosCustomerLedger',
									'foreignKey' => 'pos_sale_id',
									'conditions'=>array('debit_credit'=>2),
                                    'type' => 'INNER'
                                    ) 
                                )
               ) );
		
		 $this->set('posSale', $this->PosSale->read(null, $id));
         $this->set('page_titles', 'Sale View'); 
	 	 $this->loadModel('AccountsHead');
		 $this->set('accountsheads',$this->AccountsHead->find('list'));
		 $this->set('reportheading',"Sales Invoice ");
		// 
			  switch ($report) {
		case "ddt_report":
			 $this->render('/PosSales/ddt_report');
			  $this->layout="ajax";
			break;
		case "order_report":
			 $this->render('/PosSales/order_report');
			break;
		case "recepit_report":
			 $this->render('/PosSales/recepit_report');
			break;
		case "estimate_report":
			 $this->render('/PosSales/estimate_report');
			break;
		default:
			 $this->render('/PosSales/invoice_view');
			 $this->layout="invoice";
 		}
		
 		}
		
	
	
 	 
	
	
	
	function ddt_report($id = null,$report=null) {
	 
		if(!$id) {
			$this->Session->setFlash(__('Invalid pos sale', true));
			$this->redirect(array('action' => 'index'));
		 }

		
		$this->PosSale->recursive = 2;
		$this->loadModel('PosSaleDetail');
		
		  $this->PosSaleDetail->unbindModelAll();
		  $this->PosSaleDetail->bindModel(  array('belongsTo' => array(
                              		'PosProduct' => array(
									'className' => 'PosProduct',
									'foreignKey' => 'pos_product_id',
                                    'type' => 'INNER'
                                    ),
									'PosBarcode' => array(
									'className' => 'PosBarcode',
									'foreignKey' => 'pos_sale_detail_id',
                                    'type' => 'INNER'
                                    ) 
                                )
               ) );
			    $this->PosSaleDetail->bindModel(  array('hasMany' => array(
									'PosBarcode' => array(
									'className' => 'PosBarcode',
									'foreignKey' => 'pos_sale_detail_id',
                                    'type' => 'INNER'
                                    ) 
                                )
               ) );
		
		 $this->set('posSale', $this->PosSale->read(null, $id));
         $this->set('page_titles', 'Sale View'); 
	 	 $this->loadModel('PosProduct');
		 $this->set('products',$this->PosProduct->find('list'));
		 $this->set('reportheading',"DDT Invoice ");
		 $this->layout="ddt_invoice";
	}

	 

public function customerlist(  $search_data = null , $val=null) {
			
          if ($search_data != null) {
		   	$this->layout = 'ajax';
			$response = array();
			$this->loadModel('PosCustomer');
 			$this->PosCustomer->recursive = -1;
		 switch ($val)	{
			case null:
				 $response = $this->PosCustomer->find( 'all', array('conditions' => array('PosCustomer.email like \'%'.$search_data."%'"),'order'=>array('PosCustomer.email'=>'asc')) );
				  break;
			case "name":
				$response = $this->PosCustomer->find( 'all', array('conditions' => array('PosCustomer.name like \'%'.$search_data."%'"),'order'=>array('PosCustomer.name'=>'asc')) );
				  break;
			case  "mobile":
				 $response = $this->PosCustomer->find( 'all', array('conditions' => array('PosCustomer.mobile like \'%'.$search_data."%'"),'order'=>array('PosCustomer.mobile'=>'asc')) );
				  break;
			case "iva":
				$response = $this->PosCustomer->find( 'all', array('conditions' => array('PosCustomer.iva like \'%'.$search_data."%'"),'order'=>array('PosCustomer.iva'=>'asc')) );
				  break;
			default:
				  echo "0";
				}
			 
 			echo json_encode($response);
 			$this->autoRender = false;
			exit();
        }	
	}

	function cgs( $sales_id = null) {
   
		$this->loadModel("PosSaleDetail");
		$this->loadModel("PosPurchaseDetail");
		$this->loadModel("PosCustomer");
		$this->PosSaleDetail->unbindModelAll();
		$this->PosCustomer->unbindModelAll();
 		$this->PosSaleDetail->bindModel(  array('belongsTo' => array(
                              		'PosProduct' => array(
									'className' => 'PosProduct',
									'foreignKey' => 'pos_product_id',
                                    'type' => 'INNER'
                                    ),
								
                                )
               ) );
		
		
		$saledetails = 	$this->PosSale->find('first',array('conditions'=>array('PosSale.id'=>$sales_id),'recursive'=>2 ));
		
		 
		
		
		foreach($saledetails['PosSaleDetail'] as $salesDetail){
		 
		
		 if($salesDetail['PosProduct']['pos_type_id'] == 1)
		 {
		   pr($salesDetail['PosProduct']['pos_type_id']);
 			
			if($solid_product_test['PosProduct']['pos_type_id'] == 1)
				{
				 //==================== Save Barcode =================
 
 					$product_detail_id=$this->PosBarcode->find('first',array('recursive'=>-1,'fields'=>array('pos_product_id','pos_purchase_detail_id'),'conditions'=>array('PosBarcode.barcode'=>$barcode_val)));
			  
				 	$this->PosPurchaseDetail->updateAll(array('PosPurchaseDetail.free_quantity' =>'PosPurchaseDetail.free_quantity'."-1"),array('PosPurchaseDetail.pos_product_id'=>$product_detail_id['PosBarcode']['pos_product_id'],'PosPurchaseDetail.id'=>$product_detail_id['PosBarcode']['pos_purchase_detail_id']));
				
					$product_purchase_price = $this->PosPurchaseDetail->find('first',array('conditions'=>array('PosPurchaseDetail.id'=>$product_detail_id['PosBarcode']['pos_purchase_detail_id'],'PosPurchaseDetail.pos_product_id'=>$pddatas['pos_product_id'])));
				 $cost_products += $product_purchase_price['PosPurchaseDetail']['price'];
				 

				}		
					 
			 	}
		 else
			{ 
		   
		 $product_quantity = $this->PosPurchaseDetail->find('all',array('recursive'=>-1,'order' => 'PosPurchaseDetail.id ASC','conditions'=>array('PosPurchaseDetail.free_quantity >'=>0,'PosPurchaseDetail.pos_pcategory_id'=>$pddatas['pos_pcategory_id'],'PosPurchaseDetail.pos_product_id'=>$pddatas['pos_product_id'])));
		 $sales_quantity = $pddatas['quantity'];
		 
			 
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
					$sale_purchase['total_price']=$sales_quantity*$val['PosPurchaseDetail']['price'];
							$this->PosSalePurchaseDetail->create();
							$this->PosSalePurchaseDetail->save($sale_purchase) ;
					///==================  For Sale return And Report ===================///
	//	$this->PosSaleDetail->updateAll(array('PosSaleDetail.cgs'=>$cost_products),array('PosSaleDetail.id'=>$last_sales_detail_id));
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
		}
	
	$this->set('posSale',$saledetail);
   	}
	  

	function add() {
     if ($this->RequestHandler->isAjax()) {	
	 /* $this->request->data =array('PosSale' => array(
            'pos_customer_id' => 58,
            'user_id' => 201,
            'email_address' => "saddamhossoin1@gmail.com",
            'name' => "jowel Test",
            'phone' => "01554319208",
            'companyname' => "",
            'purchase_date' => "2015-01-19 01:01:47",
            'piva' => "4037",
            'address' => "Address",
        ),

    'PosSaleAmount' => array
        (
            'totalprice' => 2302.50,
            'tax' => 0.00,
            'is_tax' => 1,
            'discount' => 324.00,
            'transport' => 0.00,
            'others_fee' => 0.00,
            'payable_amount' => 1978.50,
            'payamount' => 1900.00,
            'accountHead' => 3,
        ),

    'PosSaleDetail' => array
        (
            '3240' => array
                (
                    'pos_product_id' => 3240,
                    'pos_brand_id' => 18,
                    'pos_pcategory_id' => 27,
                    'quantity' => 1,
                    'price' => 199,
                    'totalprice' => 199,
                    'PosBarcode' => array
                        (
                            '0' => "SPRSMA-3240-0004",
                            '1' => "SPRSMA-3240-0005",
                            '2' => "SPRSMA-3240-0006"
                        )

                ),

            '3254' => array
                (
                    'pos_product_id' => 3254,
                    'pos_brand_id' => 18,
                    'pos_pcategory_id' => 27,
                    'quantity' => 1,
                    'price' => 105,
                    'totalprice' => 105,
                    'PosBarcode' => array
                        (
                            '0' => "SPRSMA-3254-0006"
                        )

                ),

            '3157' => array
                (
                    'pos_product_id' => 3157,
                    'pos_brand_id' => 18,
                    'pos_pcategory_id' => 27,
                    'quantity' => 1,
                    'price' => 399,
                    'totalprice' => 399,
                    'PosBarcode' => array
                        (
                            '0' => "SPRSMA-3157-0001",
                            '1' => "SPRSMA-3157-0002",
                            '2' => "SPRSMA-3157-0003",
                            '7' => "SPRSMA-3157-0005",
                        )

                ),

            '1974' => array
                (
                    'pos_product_id' => 1974,
                    'pos_brand_id' => 19,
                    'pos_pcategory_id' => 21,
                    'quantity' => 5,
                    'price' => 0.9,
                    'totalprice' => 4.5,
                )
         )
         );*/
		$this->loadModel("PosSaleDetail");
		 if (!empty($this->request->data)) {
		 			
					$userdata['User']['email_address']=$this->request->data['PosSale']['email_address'];
					$userdata['User']['firstname'] = $this->request->data['PosSale']['name'];
					$userdata['User']['phone'] = $this->request->data['PosSale']['phone'];
		 			$userdata['User']['piva'] = $this->request->data['PosSale']['piva'];
					$userdata['User']['address'] = $this->request->data['PosSale']['address'];
					$userdata['User']['companyname'] = $this->request->data['PosSale']['companyname'];
					$userdata['User']['type_of_user'] = 4;
					$userdata['User']['active'] = 1;
		  	
				
				
				$this->loadModel('PosCustomer');
				$this->request->data['PosCustomer']['email'] = $this->request->data['PosSale']['email_address'];
				$this->request->data['PosCustomer']['name'] = $this->request->data['PosSale']['name'];
				$this->request->data['PosCustomer']['mobile'] = $this->request->data['PosSale']['phone'];
				$this->request->data['PosCustomer']['iva'] = $this->request->data['PosSale']['piva'];
				$this->request->data['PosCustomer']['address'] = $this->request->data['PosSale']['address'];
				$this->request->data['PosCustomer']['companyname'] = $this->request->data['PosSale']['companyname'];
				$this->request->data['PosCustomer']['user_id'] = $this->request->data['PosSale']['user_id'];
				$this->request->data['PosCustomer']['customer_type'] = $userdata['User']['type_of_user'];
				//$this->request->data['PosCustomer'][''] = $this->request->data['PosSale'][''];
				
				
					$this->loadModel('User');
					$this->request->data['PosCustomer'];
				//{================New customer Add start======================		
				 if(empty($this->request->data['PosSale']['pos_customer_id'])){
				 
				 		//{=================Already customer check start======================//
				 			$already_user = $this->User->find('first',array('recursive'=>-1,'conditions'=>array('User.email_address'=>$userdata['User']['email_address'])));
				 		//=================Already customer check End======================}//
						
						 //{==================== New Customer User Registration Start =============================//
						 if(empty($already_user)){
						 	 if(empty($this->request->data['PosCustomer']['user_id'])){
								$userdata['Group']['group_id'] = 6;
						 	 	$this->User->create();
								$this->User->save($userdata);
								$userid=$this->User->getLastInsertId();
								$this->request->data['PosCustomer']['user_id']= $userid;
		 						//{==== mail notification for password Entry Start =====================//
										 
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
								->viewVars(array('Your Reset Password link  ' =>$ms));
								 
                         	 if ($email->send("Hey, we heard you lost your SolutionPointRoma password.Say it ain't so!<br>Use the following link reset your password:<br><br>".$ms."<br><br>Thanks,<br>The SolutionPointRoma Team")) {
							 $successa = 1;
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
				//==== mail notification for password Entry End =====================}//
			}
		}
						 //==================== Customer User Registration End =============================}//
						 
						//{=============== Edit User Registration Start User but Not customer =========================//
						 elseif(!empty($already_user)){
								$userdata['User']['id'] = $already_user['User']['id'];
						 	 	$this->User->save($userdata);
						 		$this->request->data['PosCustomer']['user_id']=  $already_user['User']['id'];
					 	 }
				 		  //==================== Customer User Registration End =============================}//
						 
			 	  				$this->PosCustomer->create();
								$this->PosCustomer->save($this->request->data['PosCustomer']);
								$this->request->data['PosSale']['pos_customer_id']=$this->PosCustomer->getLastInsertId(); 
					  }
				  //==================== New Customer End =============================}//
				
				//{================Edit customer  start======================			   
				if(!empty($this->request->data['PosSale']['pos_customer_id'])){
				
				 //{=================Already customer check start======================//
				 	$already_user = $this->User->find('first',array('recursive'=>-1,'conditions'=>array('User.email_address'=>$userdata['User']['email_address'])));
				 		//=================Already customer check End======================}//
				 
					 	 //{==================== New Customer User Registration Start =============================//
						 if(empty($already_user)){
						 	 if(empty($this->request->data['PosCustomer']['user_id'])){
								$userdata['Group']['group_id'] = 6;
						 	 	$this->User->create();
								$this->User->save($userdata);
								$userid=$this->User->getLastInsertId();
								$this->request->data['PosCustomer']['user_id']= $userid;
		 						//{==== mail notification for password Entry Start =====================//
										 
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
								->viewVars(array('Your Reset Password link  ' =>$ms));
                          	 if ($email->send("Hey, we heard you lost your SolutionPointRoma password.Say it ain't so!<br>Use the following link reset your password:<br><br>".$ms."<br><br>Thanks,<br>The SolutionPointRoma Team")) {
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
		   			 //==== mail notification for password Entry End =====================}//
					  		 }
							 
							 if(!empty($this->request->data['PosCustomer']['user_id'])){
								 $userdata['User']['id'] = $this->request->data['PosCustomer']['user_id'];
								$this->User->save($userdata);
								 $this->request->data['PosCustomer']['user_id']=$this->request->data['PosCustomer']['user_id'];
		 						//{==== mail notification for password Entry Start =====================//
										 
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
								->viewVars(array('Your Reset Password link  ' =>$ms));
								 
                         	 if ($email->send("Hey, we heard you lost your SolutionPointRoma password.Say it ain't so!<br>Use the following link reset your password:<br><br>".$ms."<br><br>Thanks,<br>The SolutionPointRoma Team")) {
					  	
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
						 
						
		   			 //==== mail notification for password Entry End =====================}//
					  		 }
							 
							 
						 }
						 //==================== Customer User Registration End =============================}//
						 
						 //{==================== Edit User Registration Start User but Not customer =============================//
						 elseif(!empty($already_user)){
								$userdata['User']['id'] = $already_user['User']['id'];
						 	 	$this->User->save($userdata);
						 		$this->request->data['PosCustomer']['user_id']=  $already_user['User']['id'];
					 	 }
				 		  //==================== Customer User Registration End =============================}//
							  
						 		$this->request->data['PosCustomer']['id']=$this->request->data['PosSale']['pos_customer_id'];
								$this->PosCustomer->save($this->request->data['PosCustomer']);
				 
					  }
				 //==================== Edit Customer End =============================}//	  
		   	
				
			//	  pr($this->request->data); die('anwar');
			$this->request->data['PosSale']['totalprice']=$this->request->data['PosSaleAmount']['totalprice'];
			$this->request->data['PosSale']['payamount']=$this->request->data['PosSaleAmount']['payamount'];
			$this->request->data['PosSale']['tax']=$this->request->data['PosSaleAmount']['tax'];
			$this->request->data['PosSale']['discount']=$this->request->data['PosSaleAmount']['discount'];
			$this->request->data['PosSale']['payable_amount']=$this->request->data['PosSaleAmount']['payable_amount'];
			$this->request->data['PosSale']['is_tax']=$this->request->data['PosSaleAmount']['is_tax'];
			$this->request->data['PosSale']['sales_type']=1;
		 
 				$this->PosSale->create();
			if ($this->PosSale->save($this->request->data)) {
			
			
				//---------------------------------------------///
						$lastid=$this->PosSale->getLastInsertId(); 
		  	 	/////////-----------------------------------/////////////////
			 		$lid = $this->PosSale->getLastInsertId();
					
					$cost_products = 0;
				 		
			 foreach($this->request->data['PosSaleDetail'] as $pddatas){
			 
					$this->loadModel('PosBarcode');
					$this->loadModel('PosProduct');
				 	$this->loadModel("PosPurchaseDetail");
				 	$this->loadModel("PosSalePurchaseDetail");
					$this->loadModel('PosStock');

					$pddatas ['pos_sale_id'] = $lid;
					
					//============= for barcode Sales ==============
					
					//pr($pddatas);die();
					if(array_key_exists("PosBarcode",$pddatas)){
						$pddatas ['quantity'] = count($pddatas['PosBarcode']);
					}

				 	$this->PosSaleDetail->create();
					if($this->PosSaleDetail->save($pddatas)){
					 	$last_sales_detail_id = $this->PosSaleDetail->getLastInsertId();
				 		
						if(isset($pddatas['PosBarcode'])){
							if(!empty($pddatas['PosBarcode'])){
		 					
						$solid_product_test=$this->PosProduct->find('first',array('recursive'=>-1,'fields'=>array('id','pos_type_id'),'conditions'=>array('PosProduct.id'=>$pddatas['pos_product_id'])));
							
							if($solid_product_test['PosProduct']['pos_type_id'] == 1)
								{
								 //==================== Save Barcode =================
								
						 foreach($pddatas['PosBarcode'] as $key=>$barcode_val)
										{ 
							 	 $this->PosBarcode->updateAll(array('PosBarcode.is_sold'=>1,'PosBarcode.pos_sale_detail_id'=>$last_sales_detail_id),array('PosBarcode.barcode'=>$barcode_val,'PosBarcode.pos_product_id'=>$pddatas['pos_product_id']));
						
								$product_detail_id=$this->PosBarcode->find('first',array('recursive'=>-1,'fields'=>array('pos_product_id','pos_purchase_detail_id'),'conditions'=>array('PosBarcode.barcode'=>$barcode_val)));
							  
								 $this->PosPurchaseDetail->updateAll(array('PosPurchaseDetail.free_quantity' =>'PosPurchaseDetail.free_quantity'."-1"),array('PosPurchaseDetail.pos_product_id'=>$product_detail_id['PosBarcode']['pos_product_id'],'PosPurchaseDetail.id'=>$product_detail_id['PosBarcode']['pos_purchase_detail_id']));
								
								$product_purchase_price = $this->PosPurchaseDetail->find('first',array('conditions'=>array('PosPurchaseDetail.id'=>$product_detail_id['PosBarcode']['pos_purchase_detail_id'],'PosPurchaseDetail.pos_product_id'=>$pddatas['pos_product_id'])));
								 $cost_products += $product_purchase_price['PosPurchaseDetail']['price'];
						 	}
							
		//$this->PosSaleDetail->updateAll(array('PosSaleDetail.cgs'=>$cost_products),array('PosSaleDetail.id'=>$last_sales_detail_id));
							
							
									//==================== Save End Barcode =================
								}		
					 }
			 	}
		 	 	else { 
					   
		 			 $product_quantity = $this->PosPurchaseDetail->find('all',array('recursive'=>-1,'order' => 'PosPurchaseDetail.id ASC','conditions'=>array('PosPurchaseDetail.free_quantity >'=>0,'PosPurchaseDetail.pos_pcategory_id'=>$pddatas['pos_pcategory_id'],'PosPurchaseDetail.pos_product_id'=>$pddatas['pos_product_id'])));
					 $sales_quantity = $pddatas['quantity'];
					 
						 
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
								$sale_purchase['total_price']=$sales_quantity*$val['PosPurchaseDetail']['price'];
										$this->PosSalePurchaseDetail->create();
									 	$this->PosSalePurchaseDetail->save($sale_purchase) ;
								///==================  For Sale return And Report ===================///
		//	$this->PosSaleDetail->updateAll(array('PosSaleDetail.cgs'=>$cost_products),array('PosSaleDetail.id'=>$last_sales_detail_id));
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
				 
				  		 $this->PosStock->updateAll(array('PosStock.quantity' =>'PosStock.quantity'."-".$pddatas['quantity'],'PosStock.last_sales' =>$pddatas['price']),array('PosStock.pos_product_id'=>$pddatas['pos_product_id']));
					 	
					}
						
			  }
			 
			  
			  	$this->loadModel("PosCustomerLedger");	
			 	$this->request->data['PosCustomerLedger']['payment_mode']=1;
				$this->request->data['PosCustomerLedger']['debit_credit']=1;
				$this->request->data['PosCustomerLedger']['pos_sale_id']=$lid;
				$this->request->data['PosCustomerLedger']['note']='Inventory';
				$this->request->data['PosCustomerLedger']['pos_customer_id']=$this->request->data['PosSale']['pos_customer_id'];
 				$this->request->data['PosCustomerLedger']['ledger_jurnal_id']='SV1';
				$this->request->data['PosCustomerLedger']['account_head_id']=14;
				$this->request->data['PosCustomerLedger']['amount']=$this->request->data['PosSaleAmount']['payable_amount'];
				
			 $this->PosCustomerLedger->create();
				if($this->PosCustomerLedger->save($this->request->data['PosCustomerLedger'])){	
					
			//===================== Inventrory Accounts Entry  ================= //
				$this->loadModel("AccountsLedgerTransaction");
				$jurnalId = $this->AccountsLedgerTransaction->manageJurnalId('SV');
 				
				$InventoryAccountsEntry = array('jurnalNumber'=>'SV'.$jurnalId,
												'debit_credit'=>1,
												'amount'=>$this->request->data['PosSaleAmount']['payable_amount'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$lid,
												'note'=>'Sales Receivable',
												'account_head_id'=>15,
												'referance_table'=>'sales'
 												);
				$AccountPayableEntry = array('jurnalNumber'=>'SV'.$jurnalId,
												'debit_credit'=>2,
												'amount'=>$this->request->data['PosSaleAmount']['payable_amount'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$lid,
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
												'referance_table_id'=>$lid,
												'note'=>'Cost Of Goods Sold(CGS)',
												'account_head_id'=>17,
												'referance_table'=>'sales'
 												);
				 $Inventory = array('jurnalNumber'=>'SV'.$jurnalId,
												'debit_credit'=>2,
												'amount'=>$cost_products,
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$lid,
												'note'=>'Inventory',
												'account_head_id'=>14,
												'referance_table'=>'sales'
 												);	
				 $this->AccountsLedgerTransaction->saveTransaction($CGS);
				 $this->AccountsLedgerTransaction->saveTransaction($Inventory);
			//===================== Inventrory Accounts Ends  =================	// 
			
			}
			  
			    if($this->request->data['PosSale']['payamount'] >0 ){
			
			//============================ Pos Customer Ledger Start ===================================//  	
				$this->request->data['PosCustomerLedger']['payment_mode']=1;
				$this->request->data['PosCustomerLedger']['debit_credit']=2;
				$this->request->data['PosCustomerLedger']['pos_sale_id']=$lid;
				$this->request->data['PosCustomerLedger']['note']='Cash';
				$this->request->data['PosCustomerLedger']['pos_customer_id']=$this->request->data['PosSale']['pos_customer_id'];
 				$this->request->data['PosCustomerLedger']['ledger_jurnal_id']='SV'.$jurnalId;
				$this->request->data['PosCustomerLedger']['amount']=$this->request->data['PosSaleAmount']['payamount'];
				
				$this->request->data['PosCustomerLedger']['account_head_id']=$this->request->data['PosSaleAmount']['accountHead'];
				
				if($this->request->data['PosSaleAmount']['accountHead'] !=3){
				
 					$this->request->data['PosCustomerLedger']['check_number']=$this->request->data['PosSaleAmount']['check_number'];	
					$this->request->data['PosCustomerLedger']['check_date']=$this->request->data['PosSaleAmount']['check_date'];
					$this->request->data['PosCustomerLedger']['cashOrcheck']=2;
 				} 
				else{
									$this->request->data['PosCustomerLedger']['cashOrcheck']=1;
				}
 			
			 	$this->PosCustomerLedger->create();
				$this->PosCustomerLedger->save($this->request->data['PosCustomerLedger']);
			//============================= Pos Customer Ledger End ==============================//		
				$jurnalId = $this->AccountsLedgerTransaction->manageJurnalId('CS');
			    $ACPaymentDebit = array('jurnalNumber'=>'CS'.$jurnalId,
												'debit_credit'=>2,
												'amount'=>$this->request->data['PosSaleAmount']['payamount'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$lid,
												'note'=>'Sales Receivable',
												'account_head_id'=>15,
												'referance_table'=>'sales'
 												);
  		 
			 $this->AccountsLedgerTransaction->saveTransaction($ACPaymentDebit); 
			 		
					$bankarray = array(); 
			if($this->request->data['PosSaleAmount']['accountHead'] !=3){
				 	$bankarray['check_number']=$this->request->data['PosSaleAmount']['check_number'];	
					$bankarray['check_date']=$this->request->data['PosSaleAmount']['check_date'];	
				}
 				
			 $ACPaymentCredit = array('jurnalNumber'=>'CS'.$jurnalId,
												'debit_credit'=>1,
												'amount'=>$this->request->data['PosSaleAmount']['payamount'],
												'transaction_date'=>date('Y-m-d H:i:s'),
												'referance_table_id'=>$lid,
												'referance_table'=>'sales',
												'account_head_id'=>$this->request->data['PosSaleAmount']['accountHead'],
 												);
			 
			$this->AccountsLedgerTransaction->saveTransaction(array_merge($ACPaymentCredit,$bankarray));
				
			}
			
			
			}
			       //============Email================//
				          	//$this->set('ms', $ms);
							
				
				echo $lastid;
				$this->PosSale->send_invoice( $lastid );
								
			
			   	    //============EndEmail=============//
					
			
			    
			} 
			
			
		
			else {
				 echo "Saved Failed.";
			}
            Configure::write('debug', 0); 
				$this->autoRender = false;
				exit(); 
		
		
		 }
     
	 	  
		 
		$this->loadModel('PosCustomer');
		$poscustomers = $this->PosCustomer->find('list');
		$this->set(compact('poscustomers'));
		
		
		$this->loadModel('PosProduct');
		$posProducts = $this->PosProduct->find('list',array('fields'=>array('id','name'),'recursive'=> -1 ));
 		$this->set('posProducts',$posProducts);
	  
	  	$this->set('page_titles', 'Add New Sale'); 
	 	$this->loadModel('AccountsHead');
  		$this->set('accountsHead',$this->AccountsHead->find('list',array('fields'=>array('id','title'),'conditions'=>array('parent_id'=>2 , 'groupid'=>1))));
			
		
		/*$this->loadModel('PosPcategory');
		$this->set('category',$category=$this->PosPcategory->find('list'));
		$this->loadModel('PosBrand');
		$brand=$this->PosBrand->find('list',array('fields'=>array('id','name')));
		$this->set('brand',$brand);*/
		
	 	
		 /*$this->loadModel('PosQuotationSale');
		 $QuotationSalelists=$this->PosQuotationSale->find('all',array('fields'=>array('PosQuotationSale.id','PosCustomer.name','PosQuotationSale.purchase_date')));
	 		 $quationlists= array();
	 foreach($QuotationSalelists as $QuotationSalelist){
	 	$quationlists[$QuotationSalelist['PosQuotationSale']['id']] =$QuotationSalelist['PosCustomer']['name'] ." - ".$QuotationSalelist['PosQuotationSale']['purchase_date']; 		}
		 $this->set('QuotationSalelist',$quationlists);*/
		 
	   
			
	    
 	}
 
 
	function send_invoice( $id=null ){
	
	/////////////////////////////////////////////////
	$this->PosSale->recursive = 2;
		$this->loadModel('PosSaleDetail');
		
		$this->PosSaleDetail->unbindModelAll();
		$this->PosSaleDetail->bindModel(  array('belongsTo' => array(
							'PosProduct' => array(
							'className' => 'PosProduct',
							'foreignKey' => 'pos_product_id',
							'type' => 'INNER'
							),
							'PosBarcode' => array(
							'className' => 'PosBarcode',
							'foreignKey' => 'pos_sale_detail_id',
							'type' => 'INNER'
							) 
						)
				) );
			    $this->PosSaleDetail->bindModel(  array('hasMany' => array(
									'PosBarcode' => array(
									'className' => 'PosBarcode',
									'foreignKey' => 'pos_sale_detail_id',
                                    'type' => 'INNER'
                                    ) 
                                )
               ) );
			   
			   	$this->PosSale->bindModel( array('hasMany' => array(
                              		'PosCustomerLedger' => array(
									'className' => 'PosCustomerLedger',
									'foreignKey' => 'pos_sale_id',
									'conditions'=>array('debit_credit'=>2),
                                    'type' => 'INNER'
                                    ) 
                                )
               ) );
		
		 $posSale = $this->PosSale->read(null, $id);
         $this->set('page_titles', 'Sale View'); 
	 	 $this->loadModel('AccountsHead');
		 $this->set('accountsheads',$this->AccountsHead->find('list'));
		
	
	////////////////////////////////////////////////////////////
	 $this->set('posSale', $posSale); 
  
		 App::uses('CakeEmail', 'Network/Email');
				$email = new CakeEmail();
				$email->from("info@spr.com")
				->to("saddamhossoin@gmail.com")
				->subject('[SPR] Invoice')
				->template('sales_invoice')
				->emailFormat('html')
				->viewVars(array('posSale'=>$posSale));
			 if ($email->send("")) { 	
				$this->Session->setFlash(__('Your Sale Invoice has been sent, please check your inbox', true),'success_message');
			} else {
				$this->Session->setFlash(__('Failed to send the confirmation email. Please contact the administrator at support@xxx',true), 'fail_message');
			} 
	}
	 
	 
	function quoteid($id=null){
	
	   $this->loadModel('PosProduct');
		$posProducts = $this->PosProduct->find('list');
		$this->set(compact('posProducts'));
		
	 	$this->loadModel('PosBrand');
		$brand=$this->PosBrand->find('list',array('fields'=>array('id','name')));
		$this->set('brand',$brand);
		
		$this->loadModel('PosCustomer');
		$poscustomers = $this->PosCustomer->find('list');
	 
	 	$this->set(compact('poscustomers'));
	  	$this->loadModel('PosPcategory');
		$this->set('category',$category=$this->PosPcategory->find('list'));
	 	$this->loadModel('PosQuotationSale');
		$QuotationSalelist=$this->PosQuotationSale->find('list');
		$this->set('QuotationSalelist',$QuotationSalelist);
	 	
	 	$this->loadModel('PosProduct');
		$posProducts = $this->PosProduct->find('list');
		$this->set(compact('posProducts'));
	  
		$this->PosSale->recursive = -1;
		$this->set('saleid',$this->PosSale->find('first',array('fields' => array( 
		'MAX(PosSale.id) as id'),)));
		   
	 	$PosQuotationSale=$this->PosQuotationSale->find('first',array('conditions'=>array('PosQuotationSale.id'=>$id)));
		$this->set('PosQuotationSale',$PosQuotationSale);
		 //pr($PosQuotationSale);
		 
		$this->loadModel('PosQuotationSale');
	 	$QuotationSalelists=$this->PosQuotationSale->find('all',array('fields'=>array('PosQuotationSale.id','PosCustomer.name','PosQuotationSale.purchase_date')));
		
		 $quationlists= array();
		 foreach($QuotationSalelists as $QuotationSalelist){
		 $quationlists[$QuotationSalelist['PosQuotationSale']['id']] =$QuotationSalelist['PosCustomer']['name'] ." - ".$QuotationSalelist['PosQuotationSale']['purchase_date']; 
		}
		 $this->set('QuotationSalelist',$quationlists);
	  
		
		
		
   	}
	 	
		function edit($id = null) { 
		//pr($this->request->data);	 
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid pos Sales', true));
			$this->redirect(array('action' => 'index'));
		}
         if ($this->RequestHandler->isAjax()) {	
	 	if (!empty($this->request->data)) {
		 		if ($this->PosSale->save($this->request->data)) {
			 	//==========for cashbook==========	 
		  	$cashbook=$this->PosSale->find('first',array('conditions'=>array('PosSale.id'=>$id)));
			  	$this->loadModel('PosCashBook'); 
				$this->loadModel('PosStock');
		 		$this->PosCashBook->deleteAll(array('PosCashBook.reference_id'=>$id,'PosCashBook.reference_name'=>'PosSales'),false);
	 	  		$this->request->data['PosCashBook']['reference_name']='PosSales';
				$this->request->data['PosCashBook']['title']='Purchase Payment';
				$this->request->data['PosCashBook']['reference_id']=$cashbook['PosSale']['id'];
				$this->request->data['PosCashBook']['debit']=$cashbook['PosSale']['payamount'];	 
						$this->PosCashBook->create();
						 $this->PosCashBook->save($this->request->data['PosCashBook']);
				//======================== 
			 $this->PosSale->PosSaleDetail->recursive = -1;
			$read_pur_details = $this->PosSale->PosSaleDetail->find('all',array('conditions'=>array('PosSaleDetail.pos_sale_id'=>$id)));
		 	 foreach($read_pur_details as $read_pur_detail){
				
				//$this->PosSale->PosSaleDetail->query("UPDATE `jewel_pos_stocks` SET `quantity`= `quantity`- ".$read_pur_detail['PosSaleDetail']['quantity']." where pos_product_id = ".$read_pur_detail['PosSaleDetail']['pos_product_id']);
				
				$this->PosStock->updateAll(array('PosStock.quantity' =>'PosStock.quantity'."-".$read_pur_detail['PosSaleDetail']['quantity']),array('PosStock.pos_product_id'=>$read_pur_detail['PosSaleDetail']['pos_product_id']));
				
				$this->PosSale->PosSaleDetail->delete($read_pur_detail['PosSaleDetail']['id']);
				}
				foreach($this->request->data['PosSaleDetail'] as $pddatas){
				$pddatas ['pos_sale_id'] = $id;
				$this->PosSale->PosSaleDetail->create();
				if($this->PosSale->PosSaleDetail->save($pddatas)){
					
				//$this->PosSale->PosSaleDetail->query("UPDATE `jewel_pos_stocks` SET `quantity`= `quantity`+ ".$pddatas['quantity']." where pos_product_id = ".$pddatas['pos_product_id']);
				
				$this->PosStock->updateAll(array('PosStock.quantity' =>'PosStock.quantity'."+".$pddatas['quantity']),array('PosStock.pos_product_id'=>$pddatas['pos_product_id']));
			 	
				}
				}
			 
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
			$this->request->data = $this->PosSale->read(null, $id);
			//pr($this->request->data);
 		}
					
		$this->loadModel('PosPcategory');
		 $this->set('category',$category=$this->PosPcategory->find('list'));
		
	 	$this->PosSale->recursive = -1;
		$this->set('purchaseid',$this->PosSale->find('first',array('fields' => array( 
		'MAX(PosSale.id) as id'),)));
	 
		$this->loadModel('PosBrand');
		$brand=$this->PosBrand->find('list',array('fields'=>array('id','name')));
		$this->set('brand',$brand); 
		
		$posSuppliers = $this->PosSale->PosCustomer->find('list');
		$this->set(compact('posSuppliers'));
		$this->loadModel('PosProduct');
		$PosProducts = $this->PosProduct->find('list');
		$this->set(compact('PosProducts'));
     $this->set('page_titles', 'Update Purchase'); 
	
	
	///
	 }
 	function delete($id = null) {
	 	if (!$id) {
			$this->Session->setFlash(__('Invalid id for pos purchase', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PosSale->delete($id)) {
	 	$this->PosSale->PosSaleDetail->deleteAll(array('PosSaleDetail.pos_sale_id'=>$id),false);
		$this->loadModel('PosCashBook');
		$this->PosCashBook->deleteAll(array('PosCashBook.reference_id'=>$id),false);
			$this->Session->setFlash(__('Pos Sales deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pos sales was not deleted', true));
		$this->redirect(array('action' => 'index'));
 ///
	}
	
	function productstatus($id=null){
		$this->loadModel('PosProduct');
		$this->set('productstatus',$this->PosProduct->find('first',array('fields'=>array('salesprice','purchaseprice','in_stock'),'conditions'=>array('PosProduct.id'=>$id))));
		//$this->render('/elements/ajax/ajaxlist');
	//	$this->layout="blank";
		}
	
	
	function getproduct($cat=null,$brand=null){
		$this->loadModel('PosProduct');
		$product=$this->PosProduct->find('list',array('fields'=>array('name'),'conditions'=>array('PosProduct.pos_pcategory_id'=>$cat,'PosProduct.pos_brand_id'=>$brand)));
		$this->set('lists',$product);
		$this->render('/elements/ajax/ajaxlist');
	}
  	function getcustomer($id=null){
		 $this->loadModel('PosCustomer');
		 $customer=$this->PosCustomer->find('first',array('conditions'=>array('PosCustomer.id'=>$id)));
		 $this->set('customers',$customer);
		}
		
		
	function report(){
		
		//$this->layout = 'wcreport';
		
		}
	
	function client_sales_list(){
	
	
	
	 $id = $this->Session->read('Auth.User.id');
	 
	     $this->loadModel('PosCustomer');
		 $customer = $this->PosCustomer->find('first',array('conditions'=>array('PosCustomer.user_id'=>$id))); 
		 $this->set($customer,'customer');
		 
		 $this->PosSale->recursive = 2;
		$this->loadModel('PosSaleDetail');
		
		   $this->PosSale->unbindModel(array('belongsTo'=>array('PosCustomer')));
		  $this->PosSaleDetail->unbindModelAll();
		  $this->PosSaleDetail->bindModel(  array('belongsTo' => array(
                              		'PosProduct' => array(
									'className' => 'PosProduct',
									'foreignKey' => 'pos_product_id',
                                    'type' => 'INNER'
                                    ),
                                )
               ) );
		  
		  
		   
		   $this->paginate = array(
					'conditions'=>array('PosSale.pos_customer_id'=>$customer['PosCustomer']['id']),
					'limit' => '20',
					'order' =>array('PosSale.modified'=>'desc'),
				);
			$this->set('PosSales', $this->paginate('PosSale'));
	
	
	
		$this->layout = 'client_layout';
	}
	
	
	function client_view($id = null) {
 		if(!$id) {
 			$this->Session->setFlash(__('Invalid pos sale', true));
			$this->redirect(array('action' => 'index'));
		 }

		
		$this->PosSale->recursive = 2;
		$this->loadModel('PosSaleDetail');
		
		$this->PosSaleDetail->unbindModelAll();
		$this->PosSaleDetail->bindModel(  array('belongsTo' => array(
							'PosProduct' => array(
							'className' => 'PosProduct',
							'foreignKey' => 'pos_product_id',
							'type' => 'INNER'
							),
							'PosBarcode' => array(
							'className' => 'PosBarcode',
							'foreignKey' => 'pos_sale_detail_id',
							'type' => 'INNER'
							) 
						)
				) );
			    $this->PosSaleDetail->bindModel(  array('hasMany' => array(
									'PosBarcode' => array(
									'className' => 'PosBarcode',
									'foreignKey' => 'pos_sale_detail_id',
                                    'type' => 'INNER'
                                    ) 
                                )
               ) );
			   
			   /*	$this->PosSale->bindModel( array('hasMany' => array(
                              		'PosCustomerLedger' => array(
									'className' => 'PosCustomerLedger',
									'foreignKey' => 'pos_sale_id',
									'conditions'=>array('debit_credit'=>2),
                                    'type' => 'INNER'
                                    ) 
                                )
               ) );
			   */
		
		 $this->set('posSale', $this->PosSale->read(null, $id));
		 
		 
		$this->layout = 'client_layout';
 	 
	}
	
	
	
	
}
