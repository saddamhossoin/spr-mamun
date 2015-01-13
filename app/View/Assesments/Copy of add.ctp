<?php  //pr($serviceDeviceInfo);?>
<div class="assesments form assmentadd">
 <?php echo $this->Form->create('Assesment');?>
<?php echo $this->Form->input('Assesment.service_device_info_id',array('type'=>'hidden','div'=>false  ));?>

<div class="reciveDeviceContact reciveDevice">
<div class="blocktitleinfo"> Service Information</div>
  <div class="rdcontent_left">
  <table  class="assesmentSDIGrid">
 <thead>
  <tr>
    <td colspan="2" class="headingtag">User Details&nbsp;</td>
    <td colspan="2" class="headingtag">Device Details&nbsp;</td>
    <td colspan="2" class="headingtag">Defect Details&nbsp;</td>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td>Email&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['User']['email_address'];?>&nbsp;</td>
    <td>Type&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['ServiceDevice']['DeviceType']['name'];?>&nbsp;</td>
    <td>Defects&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['defect_state'];?>&nbsp;</td>
  </tr>
  <tr>
    <td>Name&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['User']['name'];?>&nbsp;</td>
    <td>Brand&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['ServiceDevice']['DeviceBrand']['name'];?>&nbsp;</td>
    <td>Acessories&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['acessories'];?>&nbsp;</td>

  </tr>
   <tr>
    <td>Phone&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['User']['phone'];?>&nbsp;</td>
    <td>Model&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['ServiceDevice']['DeviceModel']['name'];?>&nbsp;</td>
    <td>Rec. Date&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['recive_date'];?>&nbsp;</td>

  </tr>
   <tr>
    <td>P.IVA&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['User']['piva'];?>&nbsp;</td>
    <td>Name&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['ServiceDevice']['name'];?>&nbsp;</td>
    <td>Est. Date&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['estimated_date'];?>&nbsp;</td>

  </tr>
   <tr>
    <td>Address&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['User']['address'];?>&nbsp;</td>
    <td>Serial&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['serial_no'];?>&nbsp;</td>
    <td>Description&nbsp;</td>
    <td><?php echo $serviceDeviceInfo['ServiceDeviceInfo']['description'];?>&nbsp;</td>

  </tr>
  </tbody>
</table>
  </div>
 	<div class="clr"></div>
 </div>
 
 
<div class="reciveDeviceContact reciveDevice">
<div class="blocktitleinfo"> Assesment</div>
 <div class="rdcontent_left1">
 		<div id="WrapperAssesmentDeliveryDate" class="microcontroll">
		<?php	echo $this->Form->label('Assesment.delivery_date', __('Delivery Date'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('Assesment.delivery_date',array('div'=>false,'type'=>'text','label'=>false,'class'=>'required'));?>
        
    <div id="WrapperAssesmentDescription" class="microcontroll">
	<?php	echo $this->Form->label('Assesment.description', __('Description'.':', true) );?>
	<?php	echo $this->Form->input('Assesment.description',array('div'=>false,'label'=>false,'class'=>'','rows'=>2));?>
		</div>
 		</div>
        </div>
        <div class="rdcontent_right">
         <div id="WrapperAssesmentDescription" class="microcontroll">
	<?php	echo $this->Form->label('Assesment.note', __('Note'.':', true) );?>
	<?php	echo $this->Form->input('Assesment.note',array('div'=>false,'label'=>false,'class'=>'','rows'=>3));?>
		</div>
        </div>
        <div class="clr"></div>
   </div>
 	<div class="clr"></div>
    
    
 <div class="reciveDeviceInvoice reciveDevice">
 	<div class="blocktitleinfo"> Invoice</div>
 		<div class="rdcontent_left1">
 		<?php echo $this->Form->create('AssesmentInventory');?>
		<div id="WrapperAssesmentInventoryAssesmentProduct" class="microcontroll">
 					<?php	echo $this->Form->input('AssesmentInventory.assesment_id',array('type'=>'hidden','div'=>false,'label'=>false,'class'=>'required'));?>
 					<?php echo $this->Form->label('AssesmentInventory.pos_product_id', __('Product'.': <span class="star">*</span>', true) ); ?>
           		   	<?php 
					  echo $this->Form->select('AssesmentInventory.pos_product_id', $posProducts , array('escape' => false,'empty'=>'-Please Select Product-', 'class'=>'required select2as'))?>
            		</div>
		<div id="WrapperAssesmentInventoryAssesmentQuantity" class="microcontroll">
		 
		 <?php	echo $this->Form->label('AssesmentInventory.quantity', __('Quantity'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AssesmentInventory.quantity',array('div'=>false,'label'=>false,'class'=>'required'));?>
        </div>
        <div id="WrapperAssesmentInventoryAssesmentPrice" class="microcontroll">
         <?php	echo $this->Form->label('AssesmentInventory.price', __('Price'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AssesmentInventory.price',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>
        <div id="WrapperAssesmentInventoryAssesmentQuantity" class="microcontroll">
		 
		 <?php	echo $this->Form->label('AssesmentInventory.note', __('Note'.':', true) );?>
		<?php	echo $this->Form->input('AssesmentInventory.note',array('div'=>false,'label'=>false,'class'=>'','rows'=>2));?>
        
		</div>
         <?php echo $this->Form->end();?>
         
         <table class="pdetail">
                  <thead>
                    <th width="200px" style="font-weight:bold">Name</th>
                    <th width="75px" style="font-weight:bold">Quantity</th>
                    <th width="75px" style="font-weight:bold">Price</th>
                    <th width="48px" style="font-weight:bold">Action</th>
                    </tr></thead>
                   
                  <tbody class="productlist">
                   
                    
                  </tbody>
                
                </table>
        </div>
        
        <div class="rdcontent_right">
        <?php echo $this->Form->create('AssesmentService');?>
		 <div id="WrapperAssesmentInventoryAssesmentProduct" class="microcontroll">
 		  <?php	echo $this->Form->input('AssesmentService.assesment_id',array('type'=>'hidden','div'=>false,'label'=>false,'class'=>'required'));?>
 		 <?php echo $this->Form->label('AssesmentService.service_service_id', __('Service'.': <span class="star">*</span>', true) ); ?>
              <?php  echo $this->Form->select('AssesmentService.service_service_id', null , array('escape' => false,'empty'=>'-Please Select Product-', 'class'=>'required select2as'))?>
 		</div>

		 <div id="WrapperAssesmentInventoryAssesmentQuantity" class="microcontroll">
		 
		 <?php	echo $this->Form->label('AssesmentService.quantity', __('Quantity'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AssesmentService.quantity',array('div'=>false,'label'=>false,'class'=>'required'));?>
        </div>
         <div id="WrapperAssesmentInventoryAssesmentPrice" class="microcontroll">
         <?php	echo $this->Form->label('AssesmentService.price', __('Price'.':<span class=star>*</span>', true) );?>
		<?php	echo $this->Form->input('AssesmentService.price',array('div'=>false,'label'=>false,'class'=>'required'));?>
		</div>
         <div id="WrapperAssesmentInventoryAssesmentQuantity" class="microcontroll">
		<?php	echo $this->Form->label('AssesmentService.note', __('Note'.':', true) );?>
		<?php	echo $this->Form->input('AssesmentService.note',array('div'=>false,'label'=>false,'class'=>'','rows'=>2));?>
        
		</div>
         <?php echo $this->Form->end();?>
         
         <table class="pdetail1">
                  <thead>
                    <th width="290px" style="font-weight:bold">Name</th>
                    <th width="75px" style="font-weight:bold">Quantity</th>
                    <th width="75px" style="font-weight:bold">Price</th>
                    <th width="48px" style="font-weight:bold">Action</th>
                    </tr></thead>
                   
                  <tbody class="productlist">
                   <tr>
                    <td>Name</td>
                    <td>Name</td>
                    <td>Name</td>
                    <td>Name</td>


                   </tr>  
                    
                  </tbody>
                
                </table>

		
       
        </div>
        <div class="clr"></div>
        
   </div>
 	<div class="clr"></div>   
    
   	 
<div class="button_area">
		<?php echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_Assesment_add'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));?>
		<?php echo $this->Form->end();?>
</div>
</div>
<style>
.assmentadd {
	background: none repeat scroll 0 0 #F8F8F8;
    padding-top: 15px;
    width: 900px !important;
}
.assmentadd .reciveDevice{
	width:824px !important;
	margin:3px auto;
 	padding:10px;
	box-shadow:0px 0px 3px 0px;
}
.assmentadd .rdcontent_left{
		float:left;
		width:100%;
}
.rdcontent_left1{
		float:left;
		width:49%;
}
.rdcontent_right{
	float:left;
	width:49%;
}
.assesmentSDIGrid{
		width:100%;
		border:1px solid #CCC;
}
.assesmentSDIGrid tr td{
	padding:5px;
	border:1px dotted #CCC;
}
.headingtag{
		color:#006;
		font-family:Verdana, Geneva, sans-serif;
		font-weight:bold;
}
.assesmentSDIGrid thead tr td:nth-child(1)
{
	border-right:1px solid #999 !important;
	
}
.assesmentSDIGrid tr td:nth-child(2) , .assesmentSDIGrid tr td:nth-child(4)
{
	border-right:1px solid #999 !important;
	
}
.assesmentSDIGrid tr td:nth-child(1) , .assesmentSDIGrid tr td:nth-child(3), .assesmentSDIGrid tr td:nth-child(5){
	font-weight:bold;
	width:79px;
	
}
.pdetail th , .pdetail1 th {
    background: url("../img/grid/bg.gif") repeat-x scroll center top #FAFAFA;
    border-color: #CCCCCC #CCCCCC -moz-use-text-color;
    border-style: solid solid none;
    border-width: 1px 1px 0;
    height: 25px;
    padding-bottom: 2px;
    padding-top: 5px;
    position: relative;
    text-align: center;
}
.reciveDeviceInvoice .rdcontent_left1{

  border-right: 1px solid #ccc;
  width: 47% !important;
  margin-right: 22px;
}
.pdetail{
  margin-left: -10px;
}
.pdetail1{
  margin-left: -22px;
  margin-right: -20px;
}
</style>
 
<script type="text/javascript" >
	$(function(){
		
	    $( "#AssesmentDeliveryDate").datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat:"yy-mm-dd",
         });
		 $(".select2as").select2();
		 
		
		 
    });
</script>



