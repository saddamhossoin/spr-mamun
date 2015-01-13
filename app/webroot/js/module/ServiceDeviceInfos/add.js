jQuery(function($){
				
	//======================Add Products pop up============//
			 var popup_product_add = {
				title:'Add Product As Device',
				autoOpen: false,
				height: 430,
				width: 1100,
				modal: true,
				draggable:true,
				 close: function (e, ui) { $("#invoice5").dialog("close");  },
			  dialogClass: 'objectdetailsdialog',
			};
			$("#invoice7").dialog(popup_product_add);
			
			$("#addNewDeviceAsProduct").on('click',function(e){
					e.preventDefault(); 
					$('.overlaydiv').fadeIn(); 
					
					var ulrs =siteurl+"PosProducts/popup_add/service";
					$("#invoice7").load(ulrs, [], function(){
					$("#invoice7").dialog("open");
					$('.overlaydiv').fadeOut();
				 	}); 
			});

 		var labelval;
	
//=================add New Defect Window====================//

 var dialogOptstempleteGeneralList6 = {
		title:'Previous Service History',
		autoOpen: false,
		height: 460,
		width: 'auto',
		modal: true,
		draggable:true,
 	    ////close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice6").dialog(dialogOptstempleteGeneralList6);
	
	$("#showSerialInfo").on('click',function(e){
		 	e.preventDefault(); 
			var val = $(this).attr('title');
 			var ulrs =siteurl+"ServiceDeviceInfos/previousServiceHistory/"+val;
		 	$("#invoice6").load(ulrs, [], function(){
			$("#invoice6").dialog("open");
		});
			 
	});
	
	
	
	
	
//======================= Find is this device is come first or not =============
$("#ServiceDeviceInfoSerialNo").on('focusout',function(){
	
	var val = $(this).val();
	$(".overlaydiv").fadeIn(1000);
		$.ajax({
				type: "GET",
				url:siteurl+"ServiceDeviceInfos/checkDeviceSerial/"+val,
				success: function(response1){
				if(response1 == 0){
					$("#showSerialInfo").fadeOut();
					$("#showSerialInfo").attr("title","");
					$(".overlaydiv").fadeOut(1000);
				}else{
					$(".overlaydiv").fadeOut(1000);
					$("#showSerialInfo").fadeIn();
					$("#showSerialInfo").attr("title",val);
				}
				 }
			});
	});
 
 
 
 

//=================== Databack up and Phone backup =============
$("#ServiceDeviceInfoIsSimPcLock10").on('click',function(e){
 	$("#ServiceDeviceInfoIsSimPcLockDiv").html("");
 });
$("#ServiceDeviceInfoIsSimPcLock11").on('click',function(e){
 	 	$("#ServiceDeviceInfoIsSimPcLockDiv").html("<input type='text' id='ServiceDeviceInfoIsSimPcLock' class='required' name='data[ServiceDeviceInfo][is_sim_pc_Lock]'>");
  });

$("#ServiceDeviceInfoIsPhoneBlock10").on('click',function(e){
 	$("#ServiceDeviceInfoIsPhoneBlockDiv").html("");
 });
$("#ServiceDeviceInfoIsPhoneBlock11").on('click',function(e){
 	 	$("#ServiceDeviceInfoIsPhoneBlockDiv").html("<input type='text' id='ServiceDeviceInfoIsPhoneBlock' class='required' name='data[ServiceDeviceInfo][is_phone_block]'>");
  });


 

//=================add New Defect Window====================//

 var dialogOptstempleteGeneralList4 = {
		title:'Add Acessories ',
		autoOpen: false,
		height: 460,
		width: 550,
		modal: true,
		draggable:true,
 	    ////close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice2").dialog(dialogOptstempleteGeneralList4);
	
	$("#addNewDeviceAcessories").on('click',function(e){
		 	e.preventDefault(); 
 			var ulrs =siteurl+"ServiceAcessories/addDeviceInfo";
		 	$("#invoice2").load(ulrs, [], function(){
			$("#invoice2").dialog("open");
		});
			 
	});

	 var dialogOptstempleteGeneralList3 = {
		title:'Add Acessories Name',
		autoOpen: false,
		height: 160,
		width: 480,
		modal: true,
		draggable:true,
 	    ////close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice3").dialog(dialogOptstempleteGeneralList3);
	
	$("#addAcessories").on('click',function(e){
		 	e.preventDefault(); 
		 
			var ulrs =siteurl+"ServiceAcessories/addAcessories";
		 	$("#invoice3").load(ulrs, [], function(){
			$("#invoice3").dialog("open");
		});
			 
	});
 
	
	//======================= Device Defect Grid Remove =============
	function blueBtnClickedDefectDelete(event){
		event.preventDefault();
 		var ids= $(this).attr('id');
		var id= ids.split('_');
  		$(".DeviceDefectsGridTr_"+id[1]).remove();
   	};
 
	$("#deviceDefectsAddingListGrid").on('click', '.popup_remove_link', blueBtnClickedDefectDelete);

//======================= Device Accesory Grid Remove =============
	function blueBtnClickedAccesoryDelete(event){
		event.preventDefault();
 		var ids= $(this).attr('id');
		var id= ids.split('_');
  		$(".DeviceAccesoryGridTr_"+id[1]).remove();
   	};
 
	$("#deviceAccesorryAddingListGrid").on('click', '.popup_remove_link_ac', blueBtnClickedAccesoryDelete);
 

//=================add Defect Namw====================//
	 var dialogOptstempleteGeneralList1 = {
		title:'Add Defects ',
		autoOpen: false,
		modal: true,
		draggable:true,
		height: 510,
		width: 530,
 	    ////close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice4").dialog(dialogOptstempleteGeneralList1);
	
	$("#addNewDefect").on('click',function(e){
		 	e.preventDefault(); 
			var ulrs =siteurl+"ServiceDeviceDefects/add/yes";
		 	$("#invoice4").load(ulrs, [], function(){
			$("#invoice4").dialog("open");
		});
			 
	});
	//=====================================//
	
	//=================add New Defect====================//
	 var dialogOptstempleteGeneralList2 = {
		title:'Device Defects',
		autoOpen: false,
		height: 210,
		width: 450,
		modal: true,
		draggable:true,
 	    ////close: CloseFunction,
	  dialogClass: 'objectdetailsdialog',
	};
	$("#invoice5").dialog(dialogOptstempleteGeneralList2);
	
	$("#addDefect").on('click',function(e){
		 	e.preventDefault(); 
			var ulrs =siteurl+"ServiceDefects/addDefectPage/yes";
		 	$("#invoice5").load(ulrs, [], function(){
			$("#invoice5").dialog("open");
		});
			 
	});
	//=====================================//

 //====================== Add New Device PopUp===================
	 var addNewDeviceDialog = {
		title:'Add New Device',
		autoOpen: false,
		height: 400,
		width: 450,
		modal: true,
		  
		//draggable:true,
 	  //  //close: CloseFunction,
	  dialogClass: 'addNewDevicesDialog',
	};
	   
	
	 $("#addNewDevice").on('click',function(e){
 		e.preventDefault();
 		 $("#popupdiv").dialog(addNewDeviceDialog);
 		      var ulrs =siteurl+"ServiceDevices/addDeviceFormServicePage/";
 			 $("#popupdiv").load(ulrs, [], function(){
			 $("#popupdiv").dialog("open");
			$(".select2as").select2();
			
		 });
	}); 
	   

//====================== Find Device ===================
	$("#ServiceDeviceName").autocomplete({
		  minLength: 3,
		   search  : function(){$(".ajax_status").fadeIn();},
		   open    : function(){$(".ajax_status").fadeOut();},
			source: function( request, response ) {
				$("#showDeviceDetails").fadeOut();
				var cid=$('#ServiceDeviceName').val();
 				$.post(siteurl+"ServiceDevices/getDeviceList/"+cid, function(data) {
					 
 					response( $.map( data, function( item ) {
					return {
						label: item.ServiceDevice.name + " - " +item.PosBrand.name+ " - " +item.PosPcategory.name,
						value: item.ServiceDevice.id
					 }
	                }));
					
				}, 'json');
			},
			 
			select: function( event, ui ) {
 				$("#ServiceDeviceInfoServiceDeviceId").val(ui.item.value);
				$("#ServiceDeviceName").val(ui.item.label);
				 $(".overlaydiv").fadeIn(1000);
				$.get( siteurl+"ServiceDevices/getDeviceDetails/"+ui.item.value, function( data ) {
 				
				var obj = jQuery.parseJSON( data);	
				
				$("#SDDType").html(obj.PosPcategory.name);
				$("#SDDBrand").html(obj.PosBrand.name);
 				$("#showDeviceDetails").fadeIn();
				 $(".overlaydiv").fadeOut(1000);
			});
 				return false;
 			},
			focus: function( event, ui ) {
 				return false;
			}
		});
/* ===================== Find Client ==================*/
	$("#PosCustomerEmailAddress").autocomplete({
		  minLength: 3,
		   search  : function(){$(".ajax_status").fadeIn();},
		   open    : function(){$(".ajax_status").fadeOut();},
 			source: function( request, response ) {
 				var cname=$('#PosCustomerEmailAddress').val();
 				$.post(siteurl+"PosSales/customerlist/"+cname, function(data) {
					  
 					response( $.map( data, function( item ) {
					return {
						label: item.PosCustomer.email,
						value: item.PosCustomer.id,
						text:item.PosCustomer
					 }
	                }));
					
				}, 'json');
			},
			 
			select: function( event, ui ) {
 				$("#PosCustomerPosCustomerId").val(ui.item.value);
				$("#PosCustomerEmailAddress").val(ui.item.label);
				$("#PosCustomerPhone").val(ui.item.text.mobile);
				$("#PosCustomerName").val(ui.item.text.name);
				$("#PosCustomerPiva").val(ui.item.text.iva);
				$("#PosCustomerAddress").val(ui.item.text.address);
			   $("#ajax_status").fadeOut();
			  	return false;
 			},
			focus: function( event, ui ) {
				 
 				return false;
			}
		});
 	//===================== Find Client By Phone Number ===============	
 	$("#PosCustomerPhone").autocomplete({
		  minLength: 4,
		   search  : function(){$(".ajax_status").fadeIn();},
		   open    : function(){$(".ajax_status").fadeOut();},
			source: function( request, response ) {
				 
				var cphone=$('#PosCustomerPhone').val();
 				$.post(siteurl+"PosSales/customerlist/"+cphone+"/mobile", function(data) {
					 
 					response( $.map( data, function( item ) {
					return {
						label: item.PosCustomer.mobile,
						value: item.PosCustomer.id,
						text:item.PosCustomer
					 }
	                }));
					
				}, 'json');
			},
			 
			select: function( event, ui ) {
 				$("#PosCustomerPosCustomerId").val(ui.item.value);
				$("#PosCustomerEmailAddress").val(ui.item.text.email);
				$("#PosCustomerPhone").val(ui.item.text.mobile);
				$("#PosCustomerName").val(ui.item.text.name);
				$("#PosCustomerPiva").val(ui.item.text.iva);
				$("#PosCustomerAddress").val(ui.item.text.address);
			   $("#ajax_status").fadeOut();
			  	return false;
 			},
			focus: function( event, ui ) {
 				return false;
			}
		});
  //===================== Find client By Name =========================
  
   //====================== Find Customer Mail  ===================
	$("#PosCustomerPiva").autocomplete({
		  minLength: 3,
		   search  : function(){$(".ajax_status").fadeIn();},
		   open    : function(){$(".ajax_status").fadeOut();},
			source: function( request, response ) {
				 
				var cname=$('#PosCustomerPiva').val();
 				$.post(siteurl+"PosSales/customerlist/"+cname+"/iva", function(data) {
					 
 					response( $.map( data, function( item ) {
					return {
						label: item.PosCustomer.iva,
						value: item.PosCustomer.id,
						text:item.PosCustomer
					 }
	                }));
					
				}, 'json');
			},
			 
			select: function( event, ui ) {
 				$("#PosCustomerPosCustomerId").val(ui.item.value);
				$("#PosCustomerEmailAddress").val(ui.item.text.email);
				$("#PosCustomerPhone").val(ui.item.text.mobile);
				$("#PosCustomerName").val(ui.item.text.name);
				$("#PosCustomerPiva").val(ui.item.text.iva);
				$("#PosCustomerAddress").val(ui.item.text.address);
			   $("#ajax_status").fadeOut();
			  	return false;
 			},
			focus: function( event, ui ) {
 				return false;
			}
		});
	//=======================================Customer End Information=================================// 
	
	//====================== Find Customer Mail  ===================
	$("#PosCustomerName").autocomplete({
		  minLength: 3,
		   search  : function(){$(".ajax_status").fadeIn();},
		   open    : function(){$(".ajax_status").fadeOut();},
			source: function( request, response ) {
				 
				var cname=$('#PosCustomerName').val();
 				$.post(siteurl+"PosSales/customerlist/"+cname+"/name", function(data) {
					 
 					response( $.map( data, function( item ) {
					return {
						label: item.PosCustomer.name+"  "+item.PosCustomer.email,
						value: item.PosCustomer.id,
						text:item.PosCustomer
					 }
	                }));
					
				}, 'json');
			},
			 
			select: function( event, ui ) {
 				$("#PosCustomerPosCustomerId").val(ui.item.value);
				$("#PosCustomerEmailAddress").val(ui.item.text.email);
				$("#PosCustomerPhone").val(ui.item.text.mobile);
				$("#PosCustomerName").val(ui.item.text.name);
				$("#PosCustomerPiva").val(ui.item.text.iva);
				$("#PosCustomerAddress").val(ui.item.text.address);
			   $("#ajax_status").fadeOut();
			  	return false;
 			},
			focus: function( event, ui ) {
 				return false;
			}
		});
		 
	
	//======================receive device popup=================// 
/* var dialogOptstempleteGeneralLists = {
		title:'Recieve Device',
		autoOpen: false,
		height: 600,
		width: 750,
		modal: true,
		 beforeClose: function() {
             window.location = window.location.pathname;
        },
		//draggable:true,
 	    //close: CloseFunction,
	  dialogClass: 'objectdetailsdialog1',
	};
	$("#invoice").dialog(dialogOptstempleteGeneralLists);
 		
		$("#report").on('click',function(e){
			e.preventDefault();
 			var ulrs =siteurl+"PosPurchases/index/no/report";
			$("#invoice").load(ulrs, [], function(){
			$("#invoice").dialog("open");
			});
 		);
		*/
//======================= Recieve Device pop up end============

//======================= Start Add Script =====================	
  var invoiceReload = {
		title:'Recieve Device',
		autoOpen: false,
		height: 540,
		width: 450,
		modal: true,
		 beforeClose: function() {
             window.location = window.location.pathname;
        },
		//draggable:true,
 	    //close: CloseFunction,
	  dialogClass: 'invoiceReload',
	};
	$("#invoiceReload").dialog(invoiceReload);
	
 //============================ Save & Service =================			
 	//===================== Ajax Submit =================
			 $('#ServiceDeviceInfoAddForm').ajaxForm({
				beforeSubmit: function(){
					 
					if($('#ServiceDeviceInfoAddForm').valid()){
						
						if($.trim($("#deviceDefectsAddingListGrid").html()) == ''){
							 $.alert.open('Please Select Defect!!!'); 
							 return false;
						}
						else if( $("#ServiceDeviceInfoServiceDeviceId").val() ==''){
							 $.alert.open("Please Select Device");
							  return false;
						}
						else{
 								$(".overlaydiv").fadeIn(1000);
								return true;
 						}
						
 					}else{
						return false;
					}
				},
			   success: function(response1) {
 				   response1 = parseInt(response1);
  					$('.ajax_status').hide(); 
					$('.ajax-save-message').hide().html("Successfully Saved").fadeIn(); 
					if(response1){
 						var ulrs =siteurl+"ServiceDeviceInfos/recieve/"+response1;
 						$("#invoiceReload").load(ulrs, [], function(){
							$("#invoiceReload").dialog("open");
							$(".overlaydiv").fadeOut(1000);
 							//window.location.href= siteurl+"ServiceDeviceInfos/add";
						});
 					}
  				} 
			});
 	
});