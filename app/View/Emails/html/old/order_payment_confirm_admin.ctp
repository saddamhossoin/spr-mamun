<div style="font-family:HelveticaNeue,Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:16px"> <div dir="ltr"> <font size="2" face="Arial"> Il Martedì 15 Settembre 2015 19:08, "<a target="_blank" href="mailto:sales@solutionpointroma.org">sales@solutionpointroma.org</a>" &lt;<a target="_blank" href="mailto:sales@solutionpointroma.org">sales@solutionpointroma.org</a>&gt; ha scritto:<br> </font> </div>  <br><br> <div><div>
            <div>
                <div><font size="2">
                        Avete ricevuto la notifica da <a target="_blank" href="http://www.solutionpointroma.org/" rel="nofollow">Solution Point Roma - SPR</a> perché sei un utente registrato o voi o un altro utente registrato ha chiesto alcune informazioni per voi dal nostro negozio.
                    </font>
                </div><div>Cari <?=$shopDetails['Order']['first_name'].' '.$shopDetails['Order']['last_name']; ?>,
                </div><div>Grazie per il vostro ordine.
                    Torna presto a trovarci!
                </div><div><b>Fattura:</b>
                </div><div>
                    <br>
                </div><table cellspacing="0" cellpadding="0" style="width:650px;background-color:#ffffff">
                    <tbody><tr>
                        <td>
                            <table cellspacing="0" cellpadding="0" style="width:100%;border:none">
                                <tbody><tr>
                                    <td style="vertical-align:top;padding-top:30px">
                                        <img alt="" src="?ui=2&amp;ik=17fb88eb27&amp;view=fimg&amp;th=14fd28e995a1616b&amp;attid=0.1&amp;disp=emb&amp;attbid=ANGjdJ_k6JeJ_VYjaVSkoVu9PrKzicgKd2Jsr0ATw8EE70mDbfnwsNpOp9BClNDfSxmigvjGN5Nkqi_dmzly5nQbjh66ASLr0lFCCf9OYTQiQPB5n-rdg10Oi-FLifw&amp;sz=s0-l75-ft&amp;ats=1444420123139&amp;rm=14fd28e995a1616b&amp;zw&amp;atsh=1" class="CToWUd">
                                    </td>
                                    <td style="width:100%;padding-left:30px">
                                        <table width="100%" cellspacing="0" cellpadding="2">
                                            <tbody><tr>
                                                <td valign="top">
                                                    <strong style="font-size:28px;text-transform:uppercase">Proforma Invoice</strong>
                                                    <br>
                                                    <br>
                                                    <strong>Data:</strong> <?=date('d-m-Y h:m:s');?><br>
                                                    <strong>Invoice number:</strong> #<?=$shopDetails['Order']['id']?><br>
                                                    <strong>PO Number/Reference:</strong> <br>
                                                    <strong>Lo stato degli ordini:</strong> Payment Complete
                                                    <br>
                                                    <strong>Modalità di pagamento:</strong> <?=$shopDetails['Order']['payment_type']?><br>
                                                    <strong>Metodo di consegna:</strong><?=$shopDetails['Order']['choice']?>
                                                </td>
                                                <td valign="bottom" align="right">
                                                    <strong>Solution Point Roma - SPR</strong><br>
                                                    Via dei fulvi, 14</br>
                                                    00174 Roma (RM) - ITALY</br>
                                                    Commerciale : solutionpointroma@yahoo.com</br>
                                                    Assistenza :sprassistenza@gmail.com</br>
                                                    TELEFONO :+39 06 60672975

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
                                    <th width="60" bgcolor="#cccccc">SKU</th>
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
                                    <td style="white-space:nowrap;padding-right:5px;height:20px;text-align:right"><span>€<?=$shopDetails['Order']['subtotal']?></span></td>
                                </tr>
                                <tr>
                                    <td style="padding-right:3px;height:20px;width:100%;text-align:right"><strong>Spese di spedizione:</strong></td>
                                    <td style="white-space:nowrap;padding-right:5px;height:20px;text-align:right"><span>€<?=$shopDetails['Order']['shippingCost']?></span></td>
                                </tr>
                                <tr>
                                    <td style="padding-right:3px;height:20px;width:100%;text-align:right"><strong>Modalità di pagamento sovrapprezzo:</strong></td>
                                    <td style="white-space:nowrap;padding-right:5px;height:20px;text-align:right"><span>€<?=$shopDetails['Order']['payment_charge']?></span></td>
                                </tr>


                                <tr>
                                    <td style="padding-right:3px;height:25px;background:#cccccc none;width:100%;text-align:right"><strong>Totale:</strong></td>
                                    <td style="white-space:nowrap;padding-right:5px;height:25px;background:#cccccc none;text-align:right"><strong><span>€<?php  echo (float)$shopDetails['Order']['payment_charge']+(float)$shopDetails['Order']['shippingCost']+(float)$shopDetails['Order']['subtotal']; ?></span></strong></td>
                                </tr>
                                <tr>
                                    <td width="100%" height="20" align="right" colspan="2"><b> Nota: </b> Questo ordine è esentasse</td>
                                </tr>
                                </tbody></table>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;padding-top:30px;font-size:12px">
                            Grazie per il tuo acquisto!
                        </td>
                    </tr>
                    </tbody></table>
                <hr size="1" noshade="">
                Grazie per aver utilizzato
                il nostro sistema commerciale
                <div><font size="2">
                        Solution Point Roma - SPR<br>Telefono: +39 06 60672975<br>URL:   <a target="_blank" href="http://www.solutionpointroma.org/" rel="nofollow">www.solutionpointroma.org</a></font></div></div><div class="yj6qo"></div><div class="adL">

            </div></div><div class="adL"><br><br></div></div><div class="adL">  </div></div>

<?php
//pr($user_info);
//pr($shopDetails);die();?>