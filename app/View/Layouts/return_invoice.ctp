<html>
<head>
<title>Report For SPR</title>
<?php echo $this->Html->css(array('module/PosSales/report'));?>
<?php echo $this->Html->css(array('common/common','common/rounded','ui/ui.base','themes/black_rose/ui','common/reportgrid' ,'module/'.Inflector::singularize($this->params['controller']).'/'.Inflector::singularize($this->params['action'])   )); 
 	//echo $this->Html->css(array('common/report'));
 ?>	
</head>

<body>
<div class="full_div_report_wrapper">

<div class="sec_div_wrapper">

<div class="company_title_div">

        <div class="logo_div">
       			
                 <span class='Print_Button'><span class='print_img'>&nbsp;&nbsp;</span> &nbsp;Print</span>
        </div>
        
        <div class="company_title">
        
          
            <div class="title_div_logo"><h2 style="font-weight:bold; font-size:25px; text-decoration:underline">RETURN FATTURA</h2></div>
             <div class="title_logo_right"><?php  echo $this->Html->image('wpage/spr/logo.png', array("alt" => "No Image","width"=>"230" ,"height"=>"80","border"=>"0",'url' => array('controller' => '#', 'action' =>'#')));?></div>
        
        </div>
        
        
</div>

<?php echo $content_for_layout;?> 


<div class="reviewer_div">

<table width="700" border="0"   class="reviewer_table" cellspacing="0" cellpadding="0">
          <tbody>
          
            <tr>
              <td height="20" width="50%" class="captionBorderBelow" > &nbsp;<b>Printed Date</b></td>
              <td height="20" width="50%" class="captionBorderBelow" >&nbsp;<b>Prepared By</b></td>
            </tr>
            
            <tr>
              <td height="30" width="50%" class="captionLeft" >&nbsp;<span>
             <?php echo date("F j, Y, g:i a");?>
              
              </span></td>
              <td height="30" width="50%" class="captionLeft" >
              
                  
                    <?php echo $this->Session->read('Auth.User.firstname');?> <?php echo $this->Session->read('Auth.User.lastname');?>
              
              
              
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
