<html>
<head>
<title>DDT</title>

<?php echo $this->Html->css(array('module/PosSales/ddt_report'));?>

</head>

<body>
<div id="page-wrap">
  <textarea id="header">DDT</textarea>
  <div id="identity">
    <textarea id="address">SOLUTION POINT ROMA
Via Dei Fulvi, 14
Roma
12134951008

solutionpointroma@yahoo.com</textarea>
    <div id="logo">
      <div id="logohelp"> <br />
        (max width: 540px, max height: 100px) </div>
      <img id="image" src="images/logo.png" alt="logo" /> </div>
  </div>
  <div style="clear:both"></div>
  <div id="customer">
    <table id="meta">
      <tr>
        <td><textarea>Spett.le </textarea></td>
      </tr>
      <tr>
        <td><textarea id="date">Nome Ditta TECNODEVICES</textarea></td>
      </tr>
      <tr>
        <td><div class="due">Indirizzo VIA G.B.MORGAGNI 2</div></td>
      </tr>
      <tr>
        <td><div class="due">CAP CITTA ROMA</div></td>
      </tr>
    </table>
  </div>
  
 <?php /*?> 
  <table id="items">
    <tr class="heading_tr">
      <th class="Documento" rowspan="2">Documento di trasporto</th>
      <th>N. Doc.</th>
      <th>Data Documento</th>
      <th>Codice Fiscale Cliente</th>
      <th>Partita IVA Cliente</th>
      
    </tr>
    
    <tr class="heading_tr">
      <th class="Documento">15</th>
      <th>17/7/2014</th>
      <th></th>
      <th></th>
      
    </tr>
    
    <tr class="heading_tr">
      <th class="Documento" colspan="2">Documento di trasporto</th>
      <th colspan="3">N. Doc.</th>
    </tr>
    <tr class="heading_tr">
      <td class="Documento" colspan="2">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr class="heading_tr">
      <td class="Documento" colspan="1">&nbsp;</td>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr class="heading_tr">
      <th class="Documento" colspan="">Qta</th>
      <th colspan="">Descrizione</th>
      <th colspan="">Descrizione colli</th>
      <th colspan="">Numero colli</th>
      <th colspan="">IVA %</th>
    </tr>
    
    
    
    <tr class="">
      <td class="item-name">10</td>
      <td class="description">Monthly web (Nov. 1 - Nov. 30, 2009)</td>
      <td>$650.00</td>
      <td>1</td>
      <td><span class="price">$650.00</span></td>
    </tr>
    <tr class="">
      <td class="item-name">10</td>
      <td class="description">Monthly web (Nov. 1 - Nov. 30, 2009)</td>
      <td>$650.00</td>
      <td>1</td>
      <td><span class="price">$650.00</span></td>
    </tr>
    <tr class="">
      <td class="item-name">10</td>
      <td class="description">Monthly web (Nov. 1 - Nov. 30, 2009)</td>
      <td>$650.00</td>
      <td>1</td>
      <td><span class="price">$650.00</span></td>
    </tr>
    <tr class="">
      <td class="item-name">10</td>
      <td class="description">Monthly web (Nov. 1 - Nov. 30, 2009)</td>
      <td>$650.00</td>
      <td>1</td>
      <td><span class="price">$650.00</span></td>
    </tr>
    
    <tr class="heading_tr">
      <th class="Documento" colspan="1">destinazione:</th>
      <th colspan="1">vettore:</th>
      <th colspan="3">sottoscrizione alla consegna</th>
    </tr>
    
    <tr class="heading_tr">
      <th class="Documento" colspan="1">VIA CESARE MACCARI 98,00125 ROMA</th>
      <th colspan="1">&nbsp;</th>
      <th colspan="3">&nbsp;</th>
    </tr>
   
    
  </table>
  <?php */?>
  
  <?php echo $content_for_layout;?> 
  
  <div id="terms">
    <h5>Terms</h5>
  </div>
</div>
</body>
</html>

<script type="text/javascript" >
	$(function(){
	 $(".Print_Button").on('click',function(e){
		 $('.Print_Button').html('');
		 Popup($("#invoice").html());
		$('.Print_Button').html("<span class='print_img'>&nbsp;&nbsp;</span> &nbsp;Print");
	 });
    });
</script>