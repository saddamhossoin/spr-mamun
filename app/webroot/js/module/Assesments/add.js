jQuery(function($){ 

var dialogOptAssesment = {
		title:'Assesment',
		autoOpen: false,
		height: 'auto',
		width: 750,
		modal: true,
		//draggable:true,
 	    
	  dialogClass: 'objectdetailsdialog',
	};
	
	$("#invoice3").dialog(dialogOptAssesment);
	
//===================== View Image ================
	$("#view_Service_Image").on('click',function(e){
		e.preventDefault();
  		var device_info_id = $(this).attr("title");
 		var ulrs =siteurl+"ServiceDeviceInfos/view_servie_image/"+device_info_id;
			$("#invoice3").load(ulrs, [], function(){
			$("#invoice3").dialog("open");
			 
 		});
  
	});
	
	$("#view_Service_Note").on('click',function(e){
		e.preventDefault();
   		var device_info_id = $(this).attr("title");
 		var ulrs =siteurl+"ServiceDeviceInfos/view_servie_note/"+device_info_id;
			$("#invoice3").load(ulrs, [], function(){
			$("#invoice3").dialog("open");
  		});
	});


//===================== Accounts Panel Calculation =============
 
 var dialogOptstempleteGeneralLists = {
		title:'Assesment',
		autoOpen: false,
		height: 600,
		width: 750,
		modal: true,
		//draggable:true,
 	    close: function(){
						location.href = siteurl+'Users/chiefdashboard';
						},
	  dialogClass: 'objectdetailsdialog',
	};
	
	$("#invoice1").dialog(dialogOptstempleteGeneralLists);
 
 //==================invoice popup =====================//
	
	//===================Invoice pop up end ==================//
	
//==================== Assesment Service Remove ========================
	function blueBtnClickedService(event){
		event.preventDefault();
	 	var ids= $(this).attr('id');
		  var id= ids.split('_');
		   $.ajax({
				type: "GET",
				url:siteurl+"AssesmentServices/delete/"+id[1],
				success: function(response){
					 
  					if(response == '1'){
					 
						$("#AssesmentServiceTr_"+id[1]).remove();
					 	$('.ajax_status').hide(); 
						$('.ajax-save-message').hide().html('Assesment Service Delete.').fadeIn(); 
						service_total();
						
					}else{
						$('.ajax_status').hide(); 
						$('.ajax-save-message').hide().html('Assesment Service Delete Faild.').fadeIn(); 
 					}
			 
				}
				}); 
	

	};
 
	$(".reciveDeviceAssementService").on('click', '.AssesmentServiceRemove', blueBtnClickedService);
   
  
//===================== Start Assesment Service Add Popup ===================

	var dialogOptstempleteGeneralLists = {
		title:'Add Inventory',
		autoOpen: false,
		height: 550,
		width: 795,
		modal: true,
		//draggable:true,
		//close: CloseFunction,
		dialogClass: 'objectdetailsdialog',
	};
	
	$("#invoice").dialog(dialogOptstempleteGeneralLists);
	
	var dialogOptstempleteGeneralListsa = {
		title:'Add Service',
		autoOpen: false,
		height: 550,
		width: 795,
		modal: true,
		//draggable:true,
		//close: CloseFunction,
		dialogClass: 'objectdetailsdialog',
	};
	
	$("#invoice2").dialog(dialogOptstempleteGeneralListsa);
 	
	$("#add_Service").on('click',function(e){
		e.preventDefault();
  		var assesment_id = $("#AssesmentId").val();
		var ulrs =siteurl+"AssesmentServices/add/"+assesment_id;
			$("#invoice2").load(ulrs, [], function(){
			$("#invoice2").dialog("open");
			//add_inventory
			$(".assesment_id").val($(".reciveDeviceAssesmentContent #AssesmentId").val());
 		});
  
	});
	
	//=================Assesment add ===================//
	$("#btn_full_Assesment_add").on('click',function(e){
			e.preventDefault();
		
			
 	if( $('#ServiceInvoiceAddForm').valid()) {
		 	 var data=$('#ServiceInvoiceAddForm').serialize();
			 $('.ajax_status').fadeIn();
			 $('.overlaydiv').fadeIn();
			 
 		{
		$.ajax({
				type: "POST",
				url:siteurl+"ServiceInvoices/add",
				data:data,
				success: function(response){
					
 					  //alert(response);
				  if(response){
					var ulrs =siteurl+"Assesments/recieve/"+response;
					$("#invoice1").load(ulrs, [], function(){
														   
					$("#invoice1").dialog("open");
					 $('.ajax_status').fadeOut();
			 		$('.overlaydiv').fadeOut();
					});
			  	}
				 
				
	 		}
				}); 
		}
	}
  
	});
	//=================Assesment End ===================//
	
	
	 var dialogOptstempleteGeneralList5 = {
		title:'Assign Technician',
		autoOpen: false,
		height: 300	,
		width: 455,
		modal: true,
		draggable:true,
 	    ////close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice5").dialog(dialogOptstempleteGeneralList5);
	
	 
	 var dialogOptstempleteGeneralLists = {
		title:'Assesment',
		autoOpen: false,
		height: 600,
		width: 750,
		modal: true,
		//draggable:true,
 	    close: function(){
						//location.href = siteurl+'Users/chiefdashboard';
						},
	  dialogClass: 'objectdetailsdialog',
	};
	
	$("#invoice1").dialog(dialogOptstempleteGeneralLists);
	
	$("#btn_full_Assesment_add_approve").on('click',function(e){
			e.preventDefault();
		
			
 	if( $('#ServiceInvoiceAddForm').valid()) {
		 	 var data=$('#ServiceInvoiceAddForm').serialize();
			 $('.ajax_status').fadeIn();
			 $('.overlaydiv').fadeIn();
			 
 		{
		$.ajax({
				type: "POST",
				url:siteurl+"ServiceInvoices/add",
				data:data,
				success: function(response){
					
					var ulrs =siteurl+"AssesmentApproveNotes/add/"+response+"/yes";
		 			$("#invoice5").load(ulrs, [], function(){
						$("#invoice5").dialog("open");
					});
					
 					  //alert(response);
				  if(response){
					var ulrs =siteurl+"Assesments/recieve/"+response;
					$("#invoice1").load(ulrs, [], function(){
														   
					$("#invoice1").dialog("open");
					
						 $('.ajax_status').fadeOut();
			 			 $('.overlaydiv').fadeOut();
						 
					});
			  	}
				 
				
	 		}
				}); 
		}
	}
  
	});
 				
//================ Assesment Inventory Remove ===================//
 	function blueBtnClicked(event){
		event.preventDefault();
	 	var ids= $(this).attr('id');
		  var id= ids.split('_');
		   $.ajax({
				type: "GET",
				url:siteurl+"AssesmentInventories/delete/"+id[1],
				success: function(response){
 					if(response == '1'){
						$("#AssesmentInventoryTr_"+id[1]).remove();
					 	$('.ajax_status').hide(); 
						$('.ajax-save-message').hide().html('Assesment Inventory Delete.').fadeIn(); 
						inventory_total();
					}else{
						$('.ajax_status').hide(); 
						$('.ajax-save-message').hide().html('Assesment Inventory Delete Faild.').fadeIn(); 
 					}
 				}
				}); 
  	}

 
$(".reciveDeviceAssementInventory").on('click', '.AssesmentInventoryRemove', blueBtnClicked);
   
  //================== Assesment add ======================//
  
  	  $('#AssesmentAddForm').ajaxForm({
				beforeSubmit: function(){
 					if($('#AssesmentAddForm').valid()){
  						 	$(".overlaydiv").fadeIn(1000);
    					}else{
						return false;
					}
				 },
			   success: function(response) {
  					 $('.ajax_status').hide(); 
					$('.ajax-save-message').hide().html("Successfully Saved").fadeIn(); 
					if(response != '0'){
					 $.ajax({
								type: "GET",
								url:siteurl+"Assesments/view/"+response,
								success: function(response1){
									$(".reciveDeviceAssementInventory").fadeIn();
									$(".reciveDeviceAssementService").fadeIn();
									$(".reciveDeviceAssesmentInvoice").fadeIn();
									$(".reciveDeviceAssesmentInvoice").fadeIn();
									$('.overlaydiv').hide(); 
									$('.reciveDeviceAssesmentContent').html(response1);
									$(".button_area").show();
							}
						}); 
					}else{
						$('.overlaydiv').hide(); 
						$('.ajax-save-message').hide().html('Assesment save failed.').fadeIn(); 
					} 
					
 				} 
			});

  
 	 //==================Assesment add end====================//

	//===================== Start Inventory Popup ===============
	var dialogOptstempleteGeneralLists = {
		title:'Add Inventory',
		autoOpen: false,
		height: 550,
		width: 795,
		modal: true,
		//draggable:true,
		//close: CloseFunction,
		dialogClass: 'objectdetailsdialog',
	};
	$("#invoice").dialog(dialogOptstempleteGeneralLists);
	
	$("#add_inventory").on('click',function(e){
		e.preventDefault();
  		var assesment_id = $("#AssesmentId").val();
		  
		var ulrs =siteurl+"AssesmentInventories/add/"+assesment_id;
			$("#invoice").load(ulrs, [], function(){
			$("#invoice").dialog("open");
			//add_inventory
			
			$(".assesment_id").val($(".reciveDeviceAssesmentContent #AssesmentId").val());
 		});
  
	});
	//=================================================================
	
	
	
	
	//===================== View Check list Popup ===============
	var dialogOptstempleteGeneralListss = {
		title:'View Check List',
		autoOpen: false,
		height: 400,
		width: 600,
		modal: true,
		//draggable:true,
		//close: CloseFunction,
		dialogClass: 'objectdetailsdialog',
	};
	$("#invoice7").dialog(dialogOptstempleteGeneralListss);
	
	$("#view_checklist").on('click',function(e){
		e.preventDefault();
  		
		 var service_info_id = $("#ServiceDeviceInfo_id").html();
		 	 
		var ulrs =siteurl+"ServiceDeviceInfos/viewcheck_list/"+service_info_id;
			$("#invoice7").load(ulrs, [], function(){
			$("#invoice7").dialog("open");
			//add_inventory
			
			
 		});
  
	});
	//======================View Check list Popup end ===============================
	
	
	
	
	//===================== View Check list Popup ===============
	var dialogOptstempleteGeneralListss = {
		title:'View Check List',
		autoOpen: false,
		height: 400,
		width: 600,
		modal: true,
		//draggable:true,
		//close: CloseFunction,
		dialogClass: 'objectdetailsdialog',
	};
	$("#invoice7").dialog(dialogOptstempleteGeneralListss);
	
	$("#view_checklist").on('click',function(e){
		e.preventDefault();
  		
		 var service_info_id = $("#ServiceDeviceInfo_id").html();
		 	 
		var ulrs =siteurl+"ServiceDeviceInfos/viewcheck_list/"+service_info_id;
			$("#invoice7").load(ulrs, [], function(){
			$("#invoice7").dialog("open");
			//add_inventory
			
			
 		});
  
	});
	//======================View Check list Popup end ===============================
	
	
				
	//======================= Start Update Assesment ==================
	 $("#btn_Assesment_edit").on('click',function(e){
												   
		 e.preventDefault();
 			var urls =$(this).attr('href');
			  $.ajax({
				type: "GET",
				url:urls,
				success: function(response){
					$('.ajax_status').hide(); 
 					$('.reciveDeviceAssesmentContent').html(response);
 				}
				});
			 });
	//======================= End Update Assesment ==================

 	//========================== Assesment Delivery date =============
 
	 $( "#AssesmentDeliveryDate").datetimepicker({
			 dateFormat:"yy-mm-dd",
			timeFormat: "hh:mm:ss"
			});
	 
	 
	 
	 $("#ServiceInvoicePayment").on('keypress',function(){
			total();
	  });
	 
	
	$("#ServiceInvoiceIsAssesmentVat0").on('click',function(){
			$("#ServiceInvoiceTotal").val($("#ServiceInvoiceSubTotal").val());
			$("#ServiceInvoiceVat").val('0');
	  });
	 $("#ServiceInvoiceIsAssesmentVat1").on('click',function(){
			var tax_calculate_val = ((parseFloat($("#ServiceInvoiceSubTotal").val())*22)/100);
			 $("#ServiceInvoiceVat").val(tax_calculate_val.toFixed(2));
			 $("#ServiceInvoiceTotal").val((parseFloat($("#ServiceInvoiceSubTotal").val()) + tax_calculate_val).toFixed(2) );
	  });


	 
	 
	//=======================btn hide code start==============================// 
		  $(".save_btn_receive").on('click',function(e){
			$(".save_approve_btn_receive").hide();
		  });
		  $(".save_approve_btn").on('click',function(e){
			$(".save_approve_btn_receive").hide();
		  });
	//===========================btn hide code end==========================// 
		
	 
		 		
 	});
///============================Jquery end =============================//
	    
 function inventory_total(){
		var InventoryTotalAmount = 0;
	  	if($('.inventorytotalpriceli').length !=0){		 
		 	$('.inventorytotalpriceli').each(function(index) {
													  
		 			InventoryTotalAmount = InventoryTotalAmount + parseFloat($(this).html());
					$("#ServiceInvoiceInventoryTotal").val(InventoryTotalAmount.toFixed(2));
			 	}); 
			} 
			else{
				$("#ServiceInvoiceInventoryTotal").val(InventoryTotalAmount.toFixed(2));
				}
				 
				sub_total();
		}

 function service_total(){
		 var ServiceTotalAmount = 0;
	if($('.servicetotalpriceli').length !=0){		 
				
				 $('.servicetotalpriceli').each(function(index) {
						 ServiceTotalAmount = ServiceTotalAmount + parseFloat($(this).html());
						$("#ServiceInvoiceServiceTotal").val(ServiceTotalAmount.toFixed(2));
				  }); 
			}
			else{
				$("#ServiceInvoiceServiceTotal").val(ServiceTotalAmount.toFixed(2));
				}
				 
	 		 sub_total();	
	}
	
 function sub_total(){
	var inventoy=parseFloat($("#ServiceInvoiceInventoryTotal").val());
	
	
	var service=parseFloat($("#ServiceInvoiceServiceTotal").val());
	//alert(parseFloat($("#ServiceInvoiceInventoryTotal").val()));
	
				if(inventoy ==""  || isNaN(inventoy)){
					 inventoy =0;
				}
				if(service =="" || isNaN(service)){
					 service =0;
			}
		 
	
			 	 var subtotal=parseFloat(inventoy+service);
				 $("#ServiceInvoiceSubTotal").val(subtotal.toFixed(2));
				 
				 var tax =parseFloat($("#ServiceInvoiceHiddenvat").val());
				 var total_tax=parseFloat((subtotal*tax)/100);
				 $("#ServiceInvoiceVat").val(total_tax.toFixed(2));
				 
	     		 var total_withvat=parseFloat(subtotal+total_tax);
				  $("#ServiceInvoiceTotal").val(total_withvat.toFixed(2));
				   
				  
	 }
	 
 
		
 function total(){
	 	var due= $("#ServiceInvoicePayableAmount").val() - $("#ServiceInvoicePayment").val();
	  	 	if(due >= 0){
	 			 $("#ServiceInvoiceDue").val(due.toFixed(2));
				}
		 
		}
