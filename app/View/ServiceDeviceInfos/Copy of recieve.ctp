<style type="text/css">
.myTable { width:100%;background-color:#FFF;border-collapse:collapse; border:1px solid #000; }
.myTable th{ _background-color: #9CC;color:white;width:50%; }
.myTable td, .myTable th { padding:5px;_border:1px solid #000; }
.myTable tr { border:1px solid #000; }
.heading_table{ width:100%;_background-color: #999;border-collapse:collapse; }
.heading_table1{ width:100%;_background-color: #999;border-collapse:collapse; margin-top:-40px; }
.first_td{ width:50%;}
.first_tr{font-size: 21px;font-weight: bold;}
.sec_tr{font-size: 11px;font-weight: bold;}
.sec_td{font-size:12px;font-weight:bold;}
.first_td1{width:40px;}
.first_td2{font-size:12px;font-weight:bold;}
.sec_table{width:100%;}
.thir_table{width:100%;}
.first_td3{font-size:12px;font-weight:bold;}
.cell3{font-size:14px;}
.cell4{width:17px;}
.cell_hr{width:200px;}
.heading_table tr { border:0px;}
.heading_table1 tr{ border:0px;}
tr.tr_border{border: 0; }
#invoice{
	height:auto !important;
	}
 </style>


<table class="myTable">

 <?php  

  if(!empty($deviceRecive)){ ?>
  
    <tr>
        <td colspan="2">
            <span class='dialogreporttitle'></span>
            <span class='Print_Button'>
                <span class='print_img'>&nbsp;&nbsp;</span> &nbsp;Print
            </span>
        </td>
    </tr>
    <tr>
        <td class="first_td">
            <table class="heading_table">
                <tr class="first_tr">
                    <td>TAGLIANDO N</td>
                    <td><?php echo $deviceRecive['ServiceDeviceInfo']['serial_no'];?>/<?php echo date("Y");?></td>
                </tr>
                <tr class="sec_tr">
                    <td colspan="2">Solution Point Romma</td>
                </tr>
                <tr class="sec_tr">
                    <td colspan="2">VIA DEI FULVI 14-00174-ROMA-RM</td>
                </tr>
                <tr class="sec_tr">
                    <td colspan="2">TEL: 0660672975 .MOB:3283205866--</td>
                </tr>
                <tr class="sec_tr">
                    <td colspan="2">Sito: www.solutionpointroma.it - Email:</td>
                </tr>
                <tr class="sec_tr">
                    <td colspan="2">DAL LUN-SAB 9:30-13:00 15:30-19:30</td>
                </tr>
            </table>
        </td>
        <td  class="first_td0">
            <table class="heading_table1">
                <tr>
                    <td class="first_td1">Marca:</td>
                    <td class="sec_td"><?php echo $deviceRecive['ServiceDevice']['PosBrand']['name'];?></td>
                </tr>
                <tr>
                    <td class="first_td1">Mod:</td>
                    <td class="sec_td"><?php 
					
					if(!empty($deviceRecive['ServiceDevice']['PosPcategory'])){
						echo $deviceRecive['ServiceDevice']['PosPcategory']['name'];
						
						}
					?></td>
                </tr>
                <tr>
                    <td class="first_td1">Prodotto:</td>
                    <td class="sec_td"><?php echo $deviceRecive['ServiceDevice']['name'];?></td>
                </tr>
                <tr>
                    <td class="first_td1">Matricola:</td>
                    <td class="sec_td"><?php echo $deviceRecive['ServiceDeviceInfo']['serial_no'];?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="sec_table">
            <table>
                <tr>
                    <td>Nominativo :</td>
                    <td class="first_td2">STAR ACQUABULLICANTE - TOR PIGNATTARA---</td>
                </tr>
                <tr>
                    <td>Telefono :</td>
                    <td class="first_td2"><?php echo $deviceRecive['User']['phone'];?></td>
                </tr>
                <tr>
                    <td>Email :</td>
                    <td class="first_td2"><?php echo $deviceRecive['User']['email_address'];?></td>
                </tr>
            </table>
        </td>
        <td>
            <table class="thir_table">
                <tr>
                    <td class="third_tr_td">Difetto dichiarato:</td>
                    <td class="first_td3">
					<?php
 	if(!empty($deviceRecive['ServiceDeviceDefect'])){
 		foreach($deviceRecive['ServiceDeviceDefect'] as $defectlist){
    		echo $ServiceDeviceDefects[$defectlist['service_defect_id']] ." , ";
			}
		}else{
 			echo 'Defect not mention!!!';
		}?>
        </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table class="">
                <tr>
                    <td class="">Data Acc:</td>
                    <td class="first_td3"><?php echo   date("j-n-Y H:i",strtotime($deviceRecive['ServiceDeviceInfo']['recive_date']));?></td>
                    <td class="">Consegna Prev.</td>
                </tr>
            </table>
        </td>
        <td>
            <table class="">
                <tr>
                    <td class="third_tr_td">Accessori:</td>
                    <td class="first_td3">
					<?php
	  
					if(!empty($deviceRecive['ServiceDeviceAcessory'])){
						foreach($deviceRecive['ServiceDeviceAcessory'] as $accesorylist){
							echo $ServiceDeviceAcessories[$accesorylist['service_acessory_id']] ." , ";
							}
						}else{
							echo 'Acessory not mention!!!';
		}?>
		
		</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <table class="">
                <tr>
                    <td class="cell3">Preventivo: SI  Garanzia:-</td>
                    <td class="cell4">&nbsp;</td>
                    <td class="cell3">Rivenditore:</td>
                    <td class="cell4">&nbsp;</td>
                    <td class="cell3">Data ACQ.</td>
                    <td class="cell4">&nbsp;</td>
                    <td class="cell3">Scon.Fisc/FT:</td>
                    <td class="cell4">&nbsp;</td>
                    <td class="cell3">Ddt:</td>
                    <td class="cell4">&nbsp;</td>
                </tr>
                <tr>
                    <td class="cell3">Note:</td>
                    <td class="cell4">&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2">
         CLAUSOLE: 1) I lavori effettuati con ia presente nota sono gerantiti per un periodo di mesi; 2) Tutte ie eventual sprese di spedizione o transfermento sono e carico del clients I lavori effettuati con ia presente nota sono gerantiti per un periodo di mesi; 3) Tutte ie eventual sprese di spedizione o transfermento sono e carico del clientsI lavori effettuati con ia presente nota sono gerantiti per un periodo di mesi; 4) Tutte ie eventual sprese di spedizione o transfermento sono e carico del clientsI lavori effettuati con ia presente nota sono gerantiti per un periodo di mesi; 5) Tutte ie eventual sprese di spedizione o transfermento sono e carico del clients ;4) Tutte ie eventual sprese di spedizione o transfermento sono e carico del clientsI lavori effettuati con ia presente nota sono gerantiti per un periodo di mesi; 5) Tutte ie eventual sprese di spedizione o transfermento sono e carico del clients4) Tutte ie eventual sprese di spedizione o transfermento sono e carico del clientsI lavori effettuati con ia presente nota sono gerantiti per un periodo di mesi; 5) Tutte ie eventual sprese di spedizione o transfermento sono e carico del clients
        </td>
    </tr>
    <tr class="tr_border">
        <td colspan="2">
            <table class="">
                <tr>
                    <td class="cell3">II Preventivo sara emesso superato I'importo di EURO</td>
                    <td class="cell3">0,00+IVA</td>
                    <td class="cell3">FIRMA(accetto tutte le clausole)</td>
                </tr>
                <tr>
                    <td class="cell3" colspan="2">Se respinto verranno addebitati &nbsp;&nbsp;&nbsp;&nbsp;+IVA</td>
                    <td class="cell3">
                        <hr>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
         CLAUSOLE: 1) I lavori effettuati con ia presente nota sono gerantiti per un periodo di mesi; 2) Tutte ie eventual sprese di spedizione o transfermento sono e carico del clients I lavori effettuati con ia presente nota sono gerantiti per un periodo di mesi; 3) Tutte ie eventual sprese di spedizione o transfermento sono e carico del clientsI lavori effettuati con ia presente nota sono gerantiti per un periodo di mesi; 
        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class="tr_border">
            <td colspan="2">
                <table class="thir_table">
                    <tr>
                        <td class="cell3" colspan="3">II Preventivo sara emesso superato I'importo di EURO</td>
                    </tr>
                    <tr>
                        <td class="cell3" colspan="2">Se respinto verranno addebitati &nbsp;&nbsp;&nbsp;&nbsp;+IVA</td>
                        <td class="cell_hr">
                            <hr>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
<?php }else{ 
		echo "<span class='nodata'>There is no data</span>";
	}?>
        </table>


<script type="text/javascript" >
	$(function(){
	 $(".Print_Button").on('click',function(e){
		 $('.Print_Button').html('');
		 Popup($("#invoice").html());
		$('.Print_Button').html("<span class='print_img'>&nbsp;&nbsp;</span> &nbsp;Print");
	 });
    });
</script>
 
 
