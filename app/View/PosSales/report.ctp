<html>
<head>
<title>Report For SPR</title>
<?php echo $this->Html->css(array('module/PosSales/report'));?>
</head>

<body>
<div class="full_div_report_wrapper">

<div class="sec_div_wrapper">

<div class="company_title_div">

        <div class="logo_div">
       			 <?php  echo $this->Html->image('logo.jpg', array("alt" => "No Image","width"=>"78" ,"height"=>"58","border"=>"0",'url' => array('controller' => '#', 'action' =>'#')));?>
        </div>
        
        <div class="company_title">
        
            <h1>SPR</h1>
            <p class="com_full_name">Solution Point Romma</p>
        
        </div>
        
        
</div>
<div class="customer_info_div">

<div class="customer_left_div">
<p> Information according Name</p>

<div class="customer_info_p">
        <p> Matiur Rahman Mozumdar</p>
        <p> Registergericht Augsburg</p>
        <p> Registernummer HRB 19029</p>
        <p> DE813419144</p>
</div>

</div>

<div class="customer_right_div">

	<div class="customer_info_right">
        <p> Matiur Rahman Mozumdar</p>
        <p> Registergericht Augsburg</p>
        <p> Registernummer HRB 19029</p>
        <p> matiur1000@yahoo.com</p>
        <p> DE813419144</p>
    </div>
    
    <div class="customer_info_table">
    
        <table width="300" border="0"   class="customer_table" cellspacing="0" cellpadding="0">
          <tbody>
          
            <tr>
              <th height="20" class="captionMiddleLeft" ><b>ID</b></th>
              <th height="20" class="captionMiddleLeft" ><b>Name</b></th>
            </tr>
            
            <tr>
              <td height="20" class="captionMiddleLeft" >10112203037</td>
              <td height="20" class="captionMiddleLeft" >Samsung</td>
            </tr>
            </tbody>
         </table>
    
    </div>
    

</div>


</div>





<?php echo $content_for_layout;?> 


<div class="reviewer_div">

<table width="730" border="0"   class="reviewer_table" cellspacing="0" cellpadding="0">
          <tbody>
          
            <tr>
              <td height="20" width="50%" class="captionBorderBelow" > &nbsp;<b>Documentar</b></td>
              <td height="20" width="50%" class="captionBorderBelow" >&nbsp;<b>Authority</b></td>
            </tr>
            
            <tr>
              <td height="100" width="50%" class="captionLeft" >&nbsp;<span>
              Solution Point Romma
              
              </span></td>
              <td height="100" width="50%" class="captionLeft" >
              
                    <p class="review_p"> Matiur Rahman Mozumdar</p>
                    <p class="review_p"> Registergericht Augsburg</p>
                    <p class="review_p"> Registernummer HRB 19029</p>
                    <p class="review_p"> matiur1000@yahoo.com</p>
                    <p class="review_p"> DE813419144</p>
              
              
              
              </td>
            </tr>
            </tbody>
 </table>

</div>



</div>
</div>
</body>
</html>



<div style="background:#fff; clear:both;color:#000000; margin-top:25px;" >
  <?php //echo $this->element('sql_dump'); ?>
</div>
<script type="text/javascript" >
	$(function(){
	 $(".Print_Button").on('click',function(e){
		 $('.Print_Button').html('');
		 Popup($("#invoice").html());
		$('.Print_Button').html("<span class='print_img'>&nbsp;&nbsp;</span> &nbsp;Print");
	 });
    });
</script>
