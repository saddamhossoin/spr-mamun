<style type="text/css">
#iva_info{
	font-weight:bold;
	}
 
#getsullier{
	width:435px;
 	height:85px;
	float:left;
}
#getsullier div{
	padding:3px;
 }
.id_display
{
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:11px;
	}
#WrapperPosPurchaseSupplieriva label{
	font-weight:bold;}

</style>
 
  <div id="getsullier">
  
  <table id="supplier">
        <tr>
        <td id="name">Customer Name:</td>
		 <td> <?php echo $customers['PosCustomer']['name'];?></td>
        </tr>
		<tr>
        <td id="name" style="font-weight:bold">IVA:</td>
		<td style="font-weight:bold"><?php echo $customers['PosCustomer']['iva'];?></td>
        </tr>
        <tr>
        <td id="address">Customer Address:</td>
		 <td><?php echo $customers['PosCustomer']['address'];?></td>
        </tr><tr>
        <td id="mobile">Customer Mobile:</td>
		 <td><?php echo $customers['PosCustomer']['mobile'];?></td>
        </tr>
      <!--  <tr id="due"><td>Supplier Due:</td>
        </tr>-->
        </table>
  
  
   
     </div>
       
      
      
  
      
      
      
      
      
      
      
      
 