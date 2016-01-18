<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        
        <!-- Facebook sharing information tags -->
        <meta property="og:title" content="*|MC:SUBJECT|*" />
        
        <title>*|MC:SUBJECT|*</title>
		
	</head>
    <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="background:#CCCCCC;">
    	<center>
        	<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable" style="background:#F2f2f2; border:1px solid #CCCCCC;">
            	<tr>
                	<td align="center" valign="top" style="padding-top:20px;">
                    	<table border="0" cellpadding="0" cellspacing="0" width="800" id="templateContainer" style="background:#ffffff;">
                        	<tr>
                            	<td align="center" valign="top">
                                    <!-- // Begin Template Header \\ -->
                                	<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateHeader">
                                        <tr>
										
									     	<td class="headerContent1">
                                            
                                     <div style="font-size:30px; margin-left:6px; color:black; padding:15px;">N&deg;_______</div>
									
											
									<div style=" width:240px; padding:12px; border:1px solid #000000; margin-left:22px;">
                                          <div style=" font-weight:bold; font-size:17px; font-family:'Times New Roman', Times, serif; margin-right:15px;">
										   CUSTOMER INFO
										   </div>
										   
										   <div style=" font-weight:normal; font-size:15px; font-family:'Times New Roman', Times, serif; margin-right:15px;">
										   Nome :&nbsp;<?php echo $posSale['PosCustomer']['name'];?>
										   </div>
										   
										   <div style="font-weight:normal; font-size:15px; font-family:'Times New Roman', Times, serif; margin-right:15px;">
										  Cognome :&nbsp;<?php echo $posSale['PosCustomer']['contactname'];?>
										   </div>
										   <div style="font-weight:normal; font-size:15px; font-family:'Times New Roman', Times, serif; margin-right:15px;">
										   Azienda :&nbsp;<?php echo $posSale['PosCustomer']['address'];?>
										   </div>
										   <div style="font-weight:normal; font-size:15px; font-family:'Times New Roman', Times, serif; margin-right:15px;">
										  CF/P.IVA :&nbsp;<?php echo $posSale['PosCustomer']['iva'];?>
										   </div>
										   <div style=" font-weight:normal; font-size:15px; font-family:'Times New Roman', Times, serif; margin-right:15px;">
										  indirizzo :&nbsp;<?php echo $posSale['PosCustomer']['address'];?>
										   </div>
										   <div style=" font-weight:normal; font-size:15px; font-family:'Times New Roman', Times, serif; margin-right:15px;">
										 E-mail :&nbsp;<?php echo $posSale['PosCustomer']['email'];?>
										   </div>
										   <div style="font-weight:normal; font-size:15px; font-family:'Times New Roman', Times, serif; margin-right:15px;">
										 Telefono :&nbsp;<?php echo $posSale['PosCustomer']['tnt'];?>
										   </div>
										   </div>
                                            
                                            </td>
											
											
                                            <td class="headerContent">
                                            
                                            <div style="font-size:30px; color:#336699; padding:15px; text-decoration:underline;"> PreCall</div>
                                            <div style="height:2px; background:#000000; width:100%">&nbsp;</div>
                                            
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // End Template Header \\ -->
                                </td>
                            </tr>
                        	<tr>
                            	<td align="center" valign="top">
                                    <!-- // Begin Template Body \\ -->
                                	<table border="0" cellpadding="0" cellspacing="0" width="800" id="templateBody" >
                                    	<tr>
                                            <td valign="top">
                                
                                                <!-- // Begin Module: Standard Content \\ -->
                                                <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td valign="top" class="bodyContent">
                                                            <div mc:edit="std_content00">
                                                                <h4 class="h4">Thank you for Purchase!</h4>
                                                              <p>Dear
														   <?php echo $_SESSION['Auth']['User']['firstname'];?></p>
                                                              
                                                              <h4 class="h4">Card  Details</h4>
                                                              <ul>
                                                                <li><strong>Card number:</strong><?php echo $cardinfo['Card']['card_num'];?></li>
																<?php /*?><li><strong>Last Name:</strong><?php echo $cardinfo['User']['lastname'];?></li><?php */?>
																<li><strong>Card Password:</strong><?php echo $cardinfo['Card']['password'];?></li>
																<li><strong>Card Amount :</strong><?php echo $cardinfo['Card']['balance'];?></li>
																
                                                              </ul>
									 

<div class="Payemnt_show">
<div class="show_title" style="font-weight:bold">Payment Info</div>

 <?php 	if($cardinfo['BuyCard']['payment_method'] != 1){?>
             <div class="BuyCardPaymentMethod<?php echo $cardinfo['BuyCard']['payment_method']; ?>">&nbsp;</div>
			 
 		<?php }
		else if($cardinfo['BuyCard']['payment_method'] == 1){?>
              <div class="BuyCardPaymentMethod<?php echo $cardinfo['BuyCard']['payment_method']; ?>">&nbsp;</div>
		<?php } ?>
 <br />        
<?php if($cardinfo['BuyCard']['payment_method'] != 1){
	
	echo 'Authorization : ' . $cardinfo['BuyCard']['authorization'].'<br /><br />';
	echo 'transaction : ' . $cardinfo['BuyCard']['transaction'] .'<br /><br />'; 
	
	  }else{
	echo 'Token : ' . $cardinfo['BuyCard']['token'] .'<br /><br />';
	echo 'PayerID : ' . $cardinfo['BuyCard']['PayerID'] .'<br /><br />'; 
	
	  }?>
</div>



<p><strong>Thanks again for your support! </strong></p>
<p><em> The PreCall </em><br />
  <br />
</p>
                                                          </div>
														</td>
                                                    </tr>
                                                    <tr>
                                                    	<td align="center" valign="top" style="padding-top:0;">
                                                        	<table border="0" cellpadding="15" cellspacing="0" class="templateButton">
                                                            	<tr>
                                                                	<td valign="middle" class="templateButtonContent" style=" background:#4A7296; -webkit-border-radius: 10px; -moz-border-radius: 10px; border-radius: 10px;">
                                                                    	<div mc:edit="std_content01">
                                                                        	<a href="http://www.precall.co.uk/" target="_blank" style="color:#ffffff; font-weight:bold;"> Precall Calling Card Service </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- // End Module: Standard Content \\ -->
                                                
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // End Template Body \\ -->
                                </td>
                            </tr>
                        	<tr>
                            	<td align="center" valign="top">
                                    <!-- // Begin Template Footer \\ -->
                                	<table border="0" cellpadding="10" cellspacing="0" width="600" id="templateFooter">
                                    	<tr>
                                        	<td valign="top" class="footerContent">
                                            
                                                <!-- // Begin Module: Transactional Footer \\ -->
                                                <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td valign="top">
                                                            <div mc:edit="std_footer">
																<em>Copyright &copy; PreCall LLC, All rights reserved.</em>
																<br />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- // End Module: Transactional Footer \\ -->
                                            
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // End Template Footer \\ -->
                                </td>
                            </tr>
                        </table>
                        <br />
                    </td>
                </tr>
            </table>
        </center>
    </body>
	<style type="text/css">
			/* Client-specific Styles */
			#outlook a{padding:0;} /* Force Outlook to provide a "view in browser" button. */
			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */
			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */

			/* Reset Styles */
			body{margin:0; padding:0;}
			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}
			table td{border-collapse:collapse;}
			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}

			/* Template Styles */

			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COMMON PAGE ELEMENTS /\/\/\/\/\/\/\/\/\/\ */

			/**
			* @tab Page
			* @section background color
			* @tip Set the background color for your email. You may want to choose one that matches your company's branding.
			* @theme page
			*/
			body, #backgroundTable{
	/*@editable*/ background-color:#eeebe3;				
			}

			/**
			* @tab Page
			* @section email border
			* @tip Set the border for your email.
			*/
			#templateContainer{
				/*@editable*/ border: 1px solid #DDDDDD;
			}

			/**
			* @tab Page
			* @section heading 1
			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
			* @style heading 1
			*/
			h1, .h1{
	/*@editable*/ color:#666;
	display:block;
	/*@editable*/ font-family:Georgia, "Times New Roman", Times, serif;
	/*@editable*/ font-size:34px;
	/*@editable*/ font-weight:normal;
	/*@editable*/ line-height:100%;
	margin-top:0;
	margin-right:0;
	margin-bottom:10px;
	margin-left:0;
	/*@editable*/ text-align:left;
			}

			/**
			* @tab Page
			* @section heading 2
			* @tip Set the styling for all second-level headings in your emails.
			* @style heading 2
			*/
			h2, .h2{
				/*@editable*/ color:#202020;
				display:block;
				/*@editable*/ font-family:Georgia, "Times New Roman", Times, serif;
				/*@editable*/ font-size:30px;
				/*@editable*/ font-weight:bold;
				/*@editable*/ line-height:100%;
				margin-top:0;
				margin-right:0;
				margin-bottom:10px;
				margin-left:0;
				/*@editable*/ text-align:left;
			}

			/**
			* @tab Page
			* @section heading 3
			* @tip Set the styling for all third-level headings in your emails.
			* @style heading 3
			*/
			h3, .h3{
				/*@editable*/ color:#202020;
				display:block;
				/*@editable*/ font-family:Georgia, "Times New Roman", Times, serif;
				/*@editable*/ font-size:26px;
				/*@editable*/ font-weight:bold;
				/*@editable*/ line-height:100%;
				margin-top:0;
				margin-right:0;
				margin-bottom:10px;
				margin-left:0;
				/*@editable*/ text-align:left;
			}

			/**
			* @tab Page
			* @section heading 4
			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
			* @style heading 4
			*/
			h4, .h4{

	/*@editable*/ color: #7b9fc1;
	display: block;
	/*@editable*/ font-family: Georgia, "Times New Roman", Times, serif;
	/*@editable*/ font-size: 22px;
	/*@editable*/ font-weight: normal;
	/*@editable*/ line-height: 100%;
	margin-top: 0;
	margin-right: 0;
	margin-bottom: 10px;
	margin-left: 0;
	/*@editable*/ text-align: left;
			}

			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: HEADER /\/\/\/\/\/\/\/\/\/\ */

			/**
			* @tab Header
			* @section header style
			* @tip Set the background color and border for your email's header area.
			* @theme header
			*/
			#templateHeader{
	/*@editable*/ background-color: #FFFFFF;
	/*@editable*/ border-bottom: 3px solid #372b1b;
			}

			/**
			* @tab Header
			* @section header text
			* @tip Set the styling for your email's header text. Choose a size and color that is easy to read.
			*/
			.headerContent{
	/*@editable*/ color: #202020;
	/*@editable*/ font-family: Arial;
	/*@editable*/ font-size: 34px;
	/*@editable*/ font-weight: bold;
	/*@editable*/ line-height: 100%;
	/*@editable*/ padding: 10px;
	/*@editable*/ vertical-align: middle;
			}

			/**
			* @tab Header
			* @section header link
			* @tip Set the styling for your email's header links. Choose a color that helps them stand out from your text.
			*/
			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{
				/*@editable*/ color:#336699;
				/*@editable*/ font-weight:normal;
				/*@editable*/ text-decoration:underline;
			}

			#headerImage{
				height:auto;
				max-width:600px !important;
			}

			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: MAIN BODY /\/\/\/\/\/\/\/\/\/\ */

			/**
			* @tab Body
			* @section body style
			* @tip Set the background color for your email's body area.
			*/
			#templateContainer, .bodyContent{
				/*@editable*/ background-color:#FFFFFF;
			}

			/**
			* @tab Body
			* @section body text
			* @tip Set the styling for your email's main content text. Choose a size and color that is easy to read.
			* @theme main
			*/
			.bodyContent div{
				/*@editable*/ color:#505050;
				/*@editable*/ font-family:Georgia, "Times New Roman", Times, serif;
				/*@editable*/ font-size:14px;
				/*@editable*/ line-height:150%;
				/*@editable*/ text-align:left;
			}

			/**
			* @tab Body
			* @section body link
			* @tip Set the styling for your email's main content links. Choose a color that helps them stand out from your text.
			*/
			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{
				/*@editable*/ color:#336699;
				/*@editable*/ font-weight:normal;
				/*@editable*/ text-decoration:underline;
			}

			/**
			* @tab Body
			* @section button style
			* @tip Set the styling for your email's button. Choose a style that draws attention.
			*/
			.templateButton{
				-moz-border-radius:3px;
				-webkit-border-radius:3px;
				/*@editable*/ background-color:#abd3f6;
				/*@editable*/ border:0;
				border-collapse:separate !important;
				border-radius:3px;
			}

			/**
			* @tab Body
			* @section button style
			* @tip Set the styling for your email's button. Choose a style that draws attention.
			*/
			.templateButton, .templateButton a:link, .templateButton a:visited, /* Yahoo! Mail Override */ .templateButton a .yshortcuts /* Yahoo! Mail Override */{
				/*@editable*/ color:#4a7295;
				/*@editable*/ font-family:Arial;
				/*@editable*/ font-size:15px;
				/*@editable*/ font-weight:bold;
				/*@editable*/ letter-spacing:-.5px;
				/*@editable*/ line-height:100%;
				text-align:center;
				text-decoration:none;
			}

			.bodyContent img{
				display:inline;
				height:auto;
			}

			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: FOOTER /\/\/\/\/\/\/\/\/\/\ */

			/**
			* @tab Footer
			* @section footer style
			* @tip Set the background color and top border for your email's footer area.
			* @theme footer
			*/

			#templateFooter{
				/*@editable*/ background-color:#FFFFFF;
				/*@editable*/ border-top:0;
			}

			/**
			* @tab Footer
			* @section footer text
			* @tip Set the styling for your email's footer text. Choose a size and color that is easy to read.
			* @theme footer
			*/
			.footerContent div{
				/*@editable*/ color:#707070;
				/*@editable*/ font-family:Arial;
				/*@editable*/ font-size:12px;
				/*@editable*/ line-height:125%;
				/*@editable*/ text-align:center;
			}

			/**
			* @tab Footer
			* @section footer link
			* @tip Set the styling for your email's footer links. Choose a color that helps them stand out from your text.
			*/
			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{
				/*@editable*/ color:#336699;
				/*@editable*/ font-weight:normal;
				/*@editable*/ text-decoration:underline;
			}

			.footerContent img{
				display:inline;
			}

			/**
			* @tab Footer
			* @section utility bar style
			* @tip Set the background color and border for your email's footer utility bar.
			* @theme footer
			*/
			#utility{
				/*@editable*/ background-color:#FFFFFF;
				/*@editable*/ border:0;
			}

			/**
			* @tab Footer
			* @section utility bar style
			* @tip Set the background color and border for your email's footer utility bar.
			*/
			#utility div{
				/*@editable*/ text-align:center;
			}

			#monkeyRewards img{
				max-width:190px;
			}
		</style>
</html>