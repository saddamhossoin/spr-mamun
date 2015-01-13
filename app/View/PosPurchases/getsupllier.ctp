<style type="text/css">
#iva_info{
	font-weight:bold;
	}
#image {
     float: left;
     width: 100px;
	 margin:3px;
}
#getsullier{
	width:99%;
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
        <td id="name">Name:</td>
		 <td> <?php echo $suppliers['PosSupplier']['name'];?></td>
        </tr>
		<tr>
        <td id="name" style="font-weight:bold">IVA:</td>
		<td style="font-weight:bold"><?php echo $suppliers['PosSupplier']['iva'];?></td>
        </tr>
        <tr>
        <td id="address">Address:</td>
		 <td><?php echo $suppliers['PosSupplier']['address'];?></td>
        </tr><tr>
        <td id="mobile">Mobile:</td>
		 <td><?php echo $suppliers['PosSupplier']['mobile'];?></td>
        </tr>
      <!--  <tr id="due"><td>Supplier Due:</td>
        </tr>-->
        </table>
     </div>
    
      
      
      
  
      
      
      
      
      
      
      
      
 