<div style="font-family:HelveticaNeue,Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:16px">  <br><br> <div><div>
            <div>
                <div><font size="2">
                        Avete ricevuto la notifica da SolutionPointRoma perché sei un utente registrato o voi o un altro<br>
                        utente registrato ha chiesto alcune informazioni per voi dal nostro negozio.<br><br><br>

                        Caro <?=$shopDetails['Order']['first_name'].' '.$shopDetails['Order']['last_name']; ?> ,<br><br>
                        Il suo ordine è in stato di elaborazione.<br>
                        In allegato troverà il riepilogo del suo ordine.<br>
                        Riceverà un’email di notifica quando il suo ordine verrà evaso. Grazie per l’attesa.<br><br><br>

                    </font>
                </div>
                <div><b>Dettagli Ordine: </b>
                </div><div>
                    <br>
                </div><table cellspacing="0" cellpadding="0" style="width:650px;background-color:#ffffff">
                    <tbody><tr>
                        <td>
                            <table cellspacing="0" cellpadding="0" style="width:100%;border:none">
                                <tbody><tr>
                                    <td style="width:100%;">
                                        <table width="100%" cellspacing="0" cellpadding="2">
                                            <tbody><tr>
                                                <td valign="top">
                                                    <strong style="font-size:28px;text-transform:uppercase">
                                                        <b>SOLUTION POINT ROMA</b><br>
                                                        <span style="font-size:16px;text-transform:uppercase">Proforma Invoice</span></strong>
                                                    <br>

                                                    <p style="font-size: 11px;"> Solution Point Roma di Md Mamun Mia<br>
                                                        Reparto ordini online<br>
                                                        Via dei fulvi, 14 00174 Roma (RM) – Italy</p><br><br><br>
                                                    <strong> Numero Ordine:</strong> #<?=$shopDetails['Order']['id']?> <br>
                                                    <strong>  Numero Invoice:</strong> #<?=$shopDetails['Order']['id']?> <br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign="bottom" align="right">
                                                    <table width="100%" cellspacing="0" cellpadding="2">
                                                        <tbody><tr>
                                                            <td valign="top" width="50%">Modalità pagamento:<?=$shopDetails['Order']['payment_type']?></td>
                                                            <td valign="top">Modalità consegna:<?=$shopDetails['Order']['choice']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top" >Telefono: +39 0660672975</td>
                                                            <td valign="top">WebSite:  www.solutionpointroma.org</td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top">Email: solutionpointroma@yahoo.com	</td>
                                                            <td valign="top">Email assistenza: sprassistenza@gmail.com	</td>

                                                        </tr>
                                                        </tbody>
                                                    </table>



                                                </td>
                                            </tr>
                                            </tbody></table>
                                    </td>
                                </tr>
                                </tbody></table>
                            <hr style="border:0px none;border-bottom:2px solid #58595b;margin:2px 0px 17px 0px;padding:0px;min-height:0px">

                            <table cellspacing="0" cellpadding="0" style="width:45%;border:0px none;margin-bottom:15px">
                                <tbody>
                                <tr>
                                    <td nowrap=""><strong>Nome:</strong></td>
                                    <td><?=$shopDetails['Order']['first_name'].' '.$shopDetails['Order']['last_name']; ?> </td>
                                </tr>
                                <tr>
                                    <td><strong>Azienda:</strong></td>
                                    <td><?=$user_info['companyname']; ?> </td>
                                </tr>
                                <tr>
                                    <td><strong>Codice fiscale:</strong></td>
                                    <td><?=$shopDetails['Order']['billing_tex_code']?></td>
                                </tr>
                                <tr>
                                    <td><strong>Telefono:</strong></td>
                                    <td><?=$user_info['phone']?></td>
                                </tr>
                                <tr>
                                    <td><strong>Fax:</strong></td>
                                    <td><?=$user_info['companyfax']?></td>
                                </tr>
                                <tr>
                                    <td><strong>E-mail:</strong></td>
                                    <td><a target="_blank" href="<?=$user_info['email_address']?>"><?=$user_info['email_address']?></a></td>
                                </tr>

                                </tbody></table>
                            <table cellspacing="0" cellpadding="0" style="width:100%;border:0px none;margin-bottom:30px">
                                <tbody><tr>
                                    <td style="width:45%;height:25px"><strong>Indirizzo di fatturazione</strong></td>
                                    <td width="10%">&nbsp;</td>
                                    <td style="width:45%;height:25px"><strong>Indirizzo di spedizione</strong></td>
                                </tr>

                                <tr>
                                    <td>
                                        <table cellspacing="0" cellpadding="0" style="width:100%;border:none">
                                            <tbody><tr>
                                                <td><strong>Indirizzo:</strong> </td>
                                                <td> <?=$shopDetails['Order']['billing_address']?><br></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Città:</strong> </td>
                                                <td><?=$shopDetails['Order']['billing_city']?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Stato:</strong> </td>
                                                <td><?=$shopDetails['Order']['billing_state']?></td>
                                            </tr>

                                            <tr>
                                                <td><strong>Zip / CAP:</strong> </td>
                                                <td><?=$shopDetails['Order']['billing_zip']?></td>
                                            </tr>
                                            </tbody></table>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody><tr>
                                                <td><strong>Nome:</strong> </td>
                                                <td><?=$shopDetails['Order']['first_name'].' '.$shopDetails['Order']['last_name']; ?></td>
                                            </tr>

                                            <tr>
                                                <td><strong>Indirizzo:</strong> </td>
                                                <td> <?=$shopDetails['Order']['shipping_address']?><br></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Città:</strong> </td>
                                                <td><?=$shopDetails['Order']['shipping_city']?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Stato:</strong> </td>
                                                <td><?=$shopDetails['Order']['shipping_state']?></td>
                                            </tr>

                                            <tr>
                                                <td><strong>Zip / CAP:</strong> </td>
                                                <td><?=$shopDetails['Order']['shipping_zip']?></td>
                                            </tr>
                                            </tbody></table>
                                    </td>
                                </tr>
                                </tbody></table>
                            <div style="font-size:14px;font-weight:bold;text-align:center">Prodotti ordinati</div>
                            <table width="100%" cellspacing="0" cellpadding="3" border="1">
                                <tbody><tr>
                                    <th width="60" bgcolor="#cccccc">SPR</th>
                                    <th bgcolor="#cccccc">Prodotto</th>
                                    <th width="150" nowrap="" bgcolor="#cccccc" align="center">Articolo di prezzo</th>
                                    <th width="60" bgcolor="#cccccc">Quantità</th>
                                    <th width="60" bgcolor="#cccccc">Totale</th>
                                </tr>

                                <?php foreach($shopDetails['OrderItem'] as $orderItem){?>
                                    <tr>
                                        <td align="center">SPR-<?=$orderItem['pos_product_id']?> </td>
                                        <td> <span style="font-size:11px"> <?=$orderItem['name']?></span></td>
                                        <td nowrap="" align="right"><span>€<?=$orderItem['price']?></span>&nbsp;&nbsp;</td>
                                        <td align="center"><?=$orderItem['quantity']?></td>
                                        <td nowrap="" align="right"><span>€<?=$orderItem['subtotal']?></span></td>
                                    </tr>

                                <?php }?>


                                </tbody></table>
                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tbody><tr>
                                    <td style="padding-right:3px;height:20px;width:100%;text-align:right"><strong>Subtotale:</strong></td>
                                    <td style="white-space:nowrap;padding-right:5px;height:20px;text-align:right"><span>€ <?=$shopDetails['Order']['subtotal']?></span></td>
                                </tr>
                                <tr>
                                    <td style="padding-right:3px;height:20px;width:100%;text-align:right"><strong>Spese di spedizione:</strong></td>
                                    <td style="white-space:nowrap;padding-right:5px;height:20px;text-align:right"><span>€ <?=$shopDetails['Order']['shippingCost']?></span></td>
                                </tr>
                                <tr>
                                    <td style="padding-right:3px;height:20px;width:100%;text-align:right"><strong>Modalità di pagamento sovrapprezzo:</strong></td>
                                    <td style="white-space:nowrap;padding-right:5px;height:20px;text-align:right"><span>€ <?=$shopDetails['Order']['payment_charge']?></span></td>
                                </tr>
                                <tr>
                                    <td style="padding-right:3px;height:20px;width:100%;text-align:right"><strong>IVA:</strong></td>
                                    <td style="white-space:nowrap;padding-right:5px;height:20px;text-align:right"><span>€ <?=$shopDetails['Order']['iva']?></span></td>
                                </tr>


                                <tr>
                                    <td style="padding-right:3px;height:25px;background:#cccccc none;width:100%;text-align:right"><strong>Totale:</strong></td>
                                    <td style="white-space:nowrap;padding-right:5px;height:25px;background:#cccccc none;text-align:right"><strong><span>€ <?php  echo (float)$shopDetails['Order']['payment_charge']+(float)$shopDetails['Order']['shippingCost']+(float)$shopDetails['Order']['subtotal']+(float)$shopDetails['Order']['iva']; ?></span></strong></td>
                                </tr>
                                <tr>

                                </tr>
                                </tbody></table>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;padding-top:30px;font-size:12px">

                        </td>
                    </tr>
                    </tbody></table>


            </div><div class="yj6qo"></div><div class="adL">

            </div></div><div class="adL"><br><br></div></div><div class="adL">  </div></div>

<?php
//die();
//pr($user_info);
//pr($shopDetails);die();?>