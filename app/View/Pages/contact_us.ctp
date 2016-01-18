<!--=======  page-overview ============ ===-->
<?php //echo $this->Html->script(array('http://maps.google.com/maps/api/js?sensor=true')); ?>
<?php  echo $this->Html->script(array('module/Pages/contact_us')); ?> 
<?php echo $this->Html->css(array('module/Pages/contact_us' )); 
 echo $this->Html->script(array('common/form','common/jquery.validate'));?>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script>
var map;
function initialize() {
  var mapOptions = {
    zoom: 10,
    center: new google.maps.LatLng(41.8633006, 12.547736900000018)
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>

  <section id="page-overview">
    <div class="container">
      <h3><span>Contatti</span></h3>
      <div class="clearfix"></div>
       <div class="contact_us_container">
	      <div class="leftpane">
               <div class="title_text">Dove ci troviamo</div>
              <br />
          		<div id="map-canvas"  ></div>
                 <br />
                    <div class="title_text">Contattaci via Email</div>
                   <div>
                   <br />
                   <form id="contactUs">
                  <table>
                      <tbody>
                      <tr>
                          <td><label>Nome</label></td>
                          <td><input name="name" placeholder="Type Here" class="required"></td>
                      </tr>
                      <tr>
                          <td><label>Email</label></td>
                          <td><input name="email" type="email" placeholder="Type Here" class="required email"></td>
                      </tr>
                      <tr>
                          <td><label>Messaggio</label></td>
                          <td><textarea name="message" placeholder="Type Here" class="required"></textarea></td>
                      </tr>
                      <tr>
                          <td colspan="2" align="center"><input id="submit" name="submit" type="submit" value="Submit"></td>
                      </tr>
                       </tbody>
                   </table>
                  </form>
                 <br />
                    </div>
			</div>
           <div class="rightpane"> 
              <div class="address"> 
                <div class="title_text">Indirizzo</div>
                <div class="address_area">
                <span class="tilecontac">Sede</span><br />
               Solution Point Roma - SPR<br />
               Via dei fulvi, 14<br />
               00174 Roma (RM) - ITALY<br /><br />
                </div>
              </div>
            <br />
            <div class="numbers">
                <div class="title_text">Contatti</div>
                <div class="numbers_area"> 
                <span class="tilecontac">Email</span><br />
                Commerciale : solutionpointroma@yahoo.it<br />
                Assistenza :sprassistenza@gmail.com<br />
                <br />
                <span class="tilecontac">Telefono</span><br />
                 <?php echo $this->Html->image("wpage/whatsapp.png", array("class"=>"","alt" => "Mobile" ,"width"=>"16","height"=>"16" ));?> &nbsp; &nbsp; +39 06 60672975<br />
                 <br />
                <span class="tilecontac"> WhatsApp </span><br />
                 <?php echo $this->Html->image("wpage/contactphone.png", array("class"=>"","alt" => "Mobile" ,"width"=>"16","height"=>"16"));?>&nbsp; &nbsp;+39 3283205866
                </div>
            </div>
          	<br />
       </div>
     </div>



    </div>
  </section>

  <div class="clearfix"></div>
 