<div class="dashboardContent">
 <?php 
    echo $this->Html->css(array('common/select2')); 
	echo $this->Html->script(array('common/select2'));
?> 
	<div id="client_BuyCard">
 		<span class="BuyCard_mail">
 		<?php echo "Welcome   ".$this->session->read('Auth.User.email_address'); ?>
		</span>
		<span class="BuyCard_logout"> |
 <?php echo $this->Html->link(__('Logout'), array('controller'=>'Users','action' => 'logout'),array('class'=>'link_edit action_link'));  ?>
		 </span>
 </div>
 
<div id="client_deshboard">
 <div class="ajax_status" style="display:none;">
			<img src="<?php echo $this->request->webroot?>img/circle.gif" alt="Checking..." />
		</div>   
	<ul>
    <li><a href="#tabs-1">Buy</a></li>
    <li><a href="#tabs-2">Purchase</a></li>
    <li><a href="#tabs-3">Setting</a></li>
    </ul>
	
    <div id="tabs-1">
        
		    <div id="buy">
                <ul>
                <li><a href="#tabs-10">Choose amount / method</a></li>
                <li><a href="#tabs-11">Billing Info</a></li>
                <li><a href="#tabs-12">Overview</a></li>
                <li><a href="#tabs-13">Card Info</a></li>
                </ul>
				
				<?php echo $this->Form->create('BuyCard');?>
                    <div id="tabs-10">
                    <div class="balance_show">
                        <div class="show_title">Select credit amount</div>
                    <?php 
                          $attributes = array(
                            'legend' => false,
                            'value' => false,
							'class'=>'required',
                         );
                        echo $this->Form->radio('card_balance_id',$cardbalances, $attributes);
                    ?>
                    </div>
                    <div class="Payemnt_show">
                    <div class="show_title">Select payment method</div>
                    <?php 
                    //array(1=>'Paypal', 2=>'Visa', 3=>'Master Card', 4=>'Discover' , 5=>'American Express');
                        $paymentTypes = array(1=>'', 2=>'', 3=>'', 4=>'' , 5=>'');
                          $attributes = array(
                            'legend' => false,
                            'value' => false,
							'class'=>'required',
                         );
                        echo $this->Form->radio('payment_method',$paymentTypes, $attributes);
                    ?>
                    </div>
                    <div class="button_show">
					<input type="button" value="Next" id="first_step"/>
                     </div>
                    <div class="clr" style="clear:both"></div>
                    </div>
					<div id="tabs-11">
						<div class="lefttabs-11">
					  <div id="WrapperBuyCardfirstname" class="microcontroll">
 					<?php echo $this->Form->label('BuyCard.firstname', __('First Name'.': <span class="star">*</span>', true) ); ?>
					<?php echo $this->Form->input('BuyCard.firstname',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'required'  ));?>
					</div>
					<div id="WrapperBuyCardlastname" class="microcontroll">
					<?php echo $this->Form->label('BuyCard.lastname', __('Last Name'.': <span class="star">*</span>', true) ); ?>
					<?php echo $this->Form->input('BuyCard.lastname',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'required'  ));?>
					</div>
					<div id="WrapperBuyCardlastname" class="microcontroll">
					<?php echo $this->Form->label('BuyCard.lastname', __('Phone'.': <span class="star">&nbsp;</span>', true) ); ?>
					<?php echo $this->Form->input('BuyCard.phone',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>''  ));?>
					</div>
					<div id="WrapperBuyCardlastname" class="microcontroll">
					<?php echo $this->Form->label('BuyCard.address', __('Address'.': <span class="star">&nbsp;</span>', true) ); ?>
					<?php echo $this->Form->input('BuyCard.address',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>''  ));?>
					</div>
					</div>
						<div class="righttabs-11">
					<div id="WrapperBuyCardfirstname" class="microcontroll">
						<?php echo $this->Form->label('BuyCard.country', __('Country'.': <span class="star">*</span>', true) ); ?>
					<?php echo $this->Form->select('BuyCard.country',  $country, array('div'=>false,'label'=>false, 'empty'=>'-- Please Select Country --', 'class'=>'required select2as'));?>
					</div>
						<div id="WrapperBuyCardlastname" class="microcontroll">
						<?php echo $this->Form->label('BuyCard.state', __('State'.': <span class="star">*</span>', true) ); ?>
						<?php echo $this->Form->input('BuyCard.state',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'required'  ));?>
					</div>
					<div id="WrapperBuyCardlastname" class="microcontroll">
						<?php echo $this->Form->label('BuyCard.city', __('City'.': <span class="star">&nbsp;</span>', true) ); ?>
						<?php echo $this->Form->input('BuyCard.city',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>''  ));?>
					</div>
					<div id="WrapperBuyCardlastname" class="microcontroll">
						<?php echo $this->Form->label('BuyCard.zipcode', __('Zip'.': <span class="star">&nbsp;</span>', true) ); ?>
						<?php echo $this->Form->input('BuyCard.zipcode',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>''  ));?> 
							</div>
			 	</div>
                <div class="clr"></div>
					<div class="button_area">	  
						
						<?php
						if(!empty($this->request->data['BuyCard']['lastname'])){
							 
						  echo $this->Form->button('Update',array( 'class'=>'button', 'id'=>'btn_BuyCard_add'));
						  echo $this->Form->button('Continue',array( 'class'=>'button', 'id'=>'btn_BuyCard_add1'));
							}
						else{
						  echo $this->Form->button('Save',array( 'class'=>'submit', 'id'=>'btn_BuyCard_add'));
						   echo $this->Form->button('Cancel',array('type'=>'reset','name'=>'reset','id'=>'Cancel'));
						  }?>
					 
 </div> 		
					</div>
			 			<?php echo $this->Form->end();?>
				 <div id="tabs-12">
				
				 </div>
			 	 <div id="tabs-13">
                 
			 	 </div>
				 
             </div>
       <div class="clr" style="clear:both"></div>
    
	</div>
	 
<div id="tabs-2"> 
	 <div class="flexigrid" style="width: 100%;"> 
<div class="tDiv">
  <div class="tDiv2"> 
  </div>
  <div style="clear: both;"></div>
</div>

<div class="bDiv" style="height: auto;">
<div class="hDiv">
  <div class="hDivBox">
    <table cellspacing="0" cellpadding="0" class="purchaselist">
      <thead >
        <tr> 
			<th align="left" ><div style=" width: 100px;"><?php echo 'Date';?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo 'Card Num.';?></div></th>
 			<th align="left" ><div style=" width: 120px;"><?php echo 'Password';?></div></th>
            <th align="left" ><div style=" width: 100px;"><?php echo 'Balance';?></div></th>
 			<th align="left" ><div style=" width: 120px;"><?php echo 'Payment';?></div></th>
			<th align="left" ><div style=" width: 100px;"><?php echo "Status";?></div></th>
 		    <th align="left" ><div style=" width: 105px;" class="link_text"><?php echo 'Link';?></div></th>
        </tr>
      </thead>
    </table>
  </div>
</div>
 
  <table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3">
      <tbody>
<?php
 
 //pr($buyCards);
 
    $i = 0;
	foreach ($buyCards as $buyCard):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		// print_r($buyCard);
	?>
	<tr id='<?php echo 'row_'.$buyCard['BuyCard']['id'];?>'  <?php echo $class;?>>
  
  <td align='left'><div style='width: 100px;' class='alistname'><?php echo $this->time->niceshort($buyCard['Card']['created']) ; ?>&nbsp;</div></td>
	  
  <td align='left'><div style='width: 100px;' class='alistname'><?php echo $buyCard['Card']['card_num'] ; ?>&nbsp;</div></td>
	 
		<td align='left'><div style='width: 100px;' class='alistname'><?php echo $buyCard['Card']['password']; ?>&nbsp;</div></td> 
        
    <td align='left'><div style='width: 100px;' class='alistname'><?php echo "$ ".$cardbalances[$buyCard['BuyCard']['card_balance_id']]; ?>&nbsp;</div></td>
		 
		<?php $payment_method=array(1=>'Paypal', 2=>'Visa', 3=>'Master Card', 4=>'Discover' , 5=>'American Express'); ?>
		<td align='left'><div style='width: 120px;' class='alistname'><?php echo $payment_method[$buyCard['BuyCard']['payment_method']]; ?>&nbsp;</div></td>
        
        <?php $status=array(1=>'Not Bought', 2=>'Bought'); ?>
		
		<td align='left'><div style='width: 120px;' class='alistname'><?php echo $status[$buyCard['BuyCard']['status']]; ?>&nbsp;</div></td>
		
 		 
		<td class="actions">
<div style='width: 105px;' class='alistname link_link'>		
<?php echo $this->Html->link(__('View', true), array('controller'=>'BuyCards','action' => 'view', $buyCard['BuyCard']['id']),array('class'=>'buycard_view link_view action_link')); ?>
	 	</div></td>
	</tr>
<?php endforeach; ?>
    </table>
    </div> 
</div> 

</div>
<div id="tabs-3">
<div class="users form">

<?php //echo $this->Html->script(array( 'module/user/passwordstrengh')); ?>
<?php echo $this->Form->create('User', array('action'=>'edit'));?>
 		<div id="WrapperUserid" class="microcontroll">
		<?php echo $this->Form->input('User.id',array('type'=>'hidden','div'=>false,'label'=>false,'value'=>$user_info['User']['id']));?>
			
 	 	</div>
		<div id="WrapperUserfirstname" class="microcontroll">
			<?php echo $this->Form->label('User.firstname', __('First Name'.':', true) ); ?>
 			<?php echo $this->Form->input('User.firstname',array('value'=>$user_info['User']['firstname'],'type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'required'  ));?>
   	 	</div>
			<div id="WrapperUserlastname" class="microcontroll">
			<?php echo $this->Form->label('User.lastname', __('Last Name'.':', true) ); ?>
 			<?php echo $this->Form->input('User.lastname',array('value'=>$user_info['User']['lastname'],'type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'required'  ));?>
   	 	</div>
		<div id="WrapperUserphone" class="microcontroll">
			<?php echo $this->Form->label('User.phone', __('Phone'.': ', true) ); ?>
 			<?php echo $this->Form->input('User.phone',array('value'=>$user_info['User']['phone'],'type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'number'  ));?>
   	 	</div>
		   
		<div id="WrapperUserstreetaddress" class="microcontroll">
			<?php echo $this->Form->label('User.streetaddress', __('State Address'.':', true) ); ?>
 			<?php echo $this->Form->input('User.streetaddress',array('value'=>$user_info['User']['streetaddress'],'type'=>'text','div'=>false,'label'=>false, 'size'=>35, 'class'=>'required '));?>
 			
			<div id="username_feedback"></div>
 	 	</div>
		  <div id="emailvalidinfo"  > <span></span> </div>
		  
		<div id="WrapperUserzippostalcode" class="microcontroll">
			<?php echo $this->Form->label('User.zippostalcode', __('Zip Code'.':', true) ); ?>
 			<?php echo $this->Form->input('User.zippostalcode',array('value'=>$user_info['User']['zippostalcode'],'type'=>'text','div'=>false,'label'=>false, 'size'=>35 , 'class'=>'required number' ));?>
		</div>
		
		<div id="WrapperUsercity" class="microcontroll">
			<?php echo $this->Form->label('User.city', __('City '.':', true) ); ?>
 			<?php echo $this->Form->input('User.city',array('value'=>$user_info['User']['city'],'type'=>'text','div'=>false,'label'=>false, 'size'=>35 , 'class'=>'required'));?>
 	 	</div>
		
		<div id="WrapperUsercity" class="microcontroll">
			<?php echo $this->Form->label('User.country', __('Country '.':', true) ); ?>
 			 <?php echo $this->Form->select('User.country',  $country, array('div'=>false,'label'=>false, 'empty'=>'-- Please Select Country --', 'class'=>'required select2as'));?>
 	 	</div>
 	<div class="clr"></div>
 <div class="button_area">	  

 <?php echo $this->Form->button('Update', array( 'class'=>'submit', 'type' => 'submit', 'id'=>'btn_user_edit'));?>
        <?php echo $this->Form->button('Cancel',array('type'=>'button','name'=>'reset','id'=>'Cancel_btn'));?>
 </div>
 <div class="clr"></div>
 <?php echo $this->Form->end();?>
</div>
 
</div>

</div>
 
 </div>
 <div id="user_view"></div>
 <?php if(isset($paypalids) && !empty($paypalids)){?>
	 <script type="text/javascript">
 jQuery(function($){ 
  $( "#buy" ).tabs( );
 	 $( "#buy" ).tabs('option', 'disabled', [0,1,2]);
	 $( "#buy" ).tabs('enable', 3);
 	 $( "#buy" ).tabs( "option", "active", 3 );
 	 $.ajax({
			type: "GET",
			url:siteurl+"Users/cardinfodetails/"+<?php echo $paypalids; ?>,
			success: function(response1){
 				$("#tabs-13").html(response1); 
			 
			}
	});
	 
  });
 </script>
 <?php }else{?>
 
	 <script type="text/javascript">
 jQuery(function($){ 
 
 $( "#buy" ).tabs({ disabled: [1,2 , 3 ] });
 	
	});
 </script>
	 <?php }?>
<style type="text/css">
 .ajax_status  
 {
 	 
        background: none repeat scroll 0 0 #000000;
    border-radius: 5px;
    border-right: 1px solid #323537;
    border-style: solid;
    border-width: 1px;
    box-shadow: 0 2px 15px #000000;
    color: #CCCCCC;
    font-size: 30px;
    height: 100%;
    opacity: 0.62 !important;
    padding-left: 50%;
    padding-top: 25%;
    position: absolute;
    width: 100%;
    z-index: 99999;
  }     
</style>
