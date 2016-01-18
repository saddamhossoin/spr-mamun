<meta property="og:title" content="<?php echo  $posProduct['PosProduct']['name'] ; ?>" />
<meta property="og:description" content='<?php echo substr($posProduct['PosProduct']['description'],0,130); ?>' />
<meta property="og:image" content='<?php  echo $this->Html->image('../'.$posProduct['PosProduct']['image'], array("alt" => $posProduct['PosProduct']['name'],"border"=>"0"  ));?>' />
<?php //pr($posProduct);die();?>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=themostbeautifulwebsite" async="async"></script>
<div class="item">
	<div class="overlaydivsmallpurchase" style="display: none;">&nbsp;</div>
	<div class="product_name_main"><?php echo  $posProduct['PosProduct']['name'] ; ?></div>
	<div class="img_name_full_div">
		<div class="leftItem">

			<?php if(!empty($posProduct['PosProduct']['image'])) {?>
				<div class="zoom">
					<div class="small">
						<?php  echo $this->Html->image('../'.$posProduct['PosProduct']['image'], array("alt" => $posProduct['PosProduct']['name'],"border"=>"0"  ));?>
					</div>
				</div>
			<?php }else{?>
				<?php  echo $this->Html->image('/img/wpage/noimage.jpg', array("alt" =>$posProduct['PosProduct']['name'],"width"=>"78" ,"height"=>"58","border"=>"0"));  }?>
		</div>
	</div>
	<div class="description_grid">
		<p>

			<?php

			$cartval = 0;

			if( isset($cartdata) && array_key_exists($posProduct['PosProduct']['id'],$cartdata)){
				$cartval = $cartdata[$posProduct['PosProduct']['id']];
			}

			echo  $posProduct['PosProduct']['description'] ; ?>
		</p>
		<div class="price_qty_div">
			<span class="price_span pricetxt"  > &#8364; <?php  echo $posProduct['PosProduct']['online_price']."<span> + iva</span>";?></span>                                 <span class="price_span">
 							  <?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'add'),'id'=>'ShopCard_'.$posProduct['PosProduct']['id'])); ?>
				<?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $posProduct['PosProduct']['id'])); ?>
				<input type='button' value='-' class='qtyminus' id="btnqtyminus_<?php echo $posProduct['PosProduct']['id'];?>" field='quandtity' />
                                    <input type='text' name='data[PosProduct][quantity]' value=<?php echo $cartval;?>  id="qtyplus_<?php echo $posProduct['PosProduct']['id'];?>" class='qty' />
                           <input type='button' value='+' class='qtyplus'  id="btnqtyplus_<?php echo $posProduct['PosProduct']['id'];?>" field='quantity' />
				</form>

                                </span>
			</br>



		</div>

	</div>




	<div style="clear:both;"
	<div class="hole_btn">
                                 <span class="des_btn_span"><?php //$titletag = implode(',',$final_compitable_list[$comProduct['PosProduct']['id']]);

									 // echo $this->Form->button('Compatibility', array('class'=>'add','title'=>$titletag));

									// echo $this->Form->button(__("Compatibility"), array('id'=>$posProduct['PosProduct']['id'],'class'=>'add','title'=>$posProduct['PosProduct']['name'])); ?></span>
                                 <span class="des_btn_span">
                                  <?php if($posProduct['PosStock']['quantity'] > 0){?>
									  <?php echo $this->Form->button(__("Available"),array('class'=>'available_btn')); ?>
								  <?php } else {?> <?php echo $this->Form->button(__("Out Of Stock"),array('class'=>'out_of_stock')); ?>
								  <?php }?>
                                 </span>

		<?php if($posProduct['PosStock']['quantity'] > 0){?>
			<span class="des_btn_span"><?php echo $this->Form->button(__("Add to Cart"),array('class' => 'addtocart','id'=> $posProduct['PosProduct']['id'])); ?></span>
		<?php }else{?>
			<span class="des_btn_span" style="display:none"><?php echo $this->Form->button(__("Add to Cart"),array('class' => 'addtocart','id'=> $posProduct['PosProduct']['id'])); ?></span>
		<?php }

		?>
		<!-- Go to www.addthis.com/dashboard to customize your tools -->
		<span class="addthis_native_toolbox" style="float: left; margin-left: 25px;"></span>
	</div>


	<?php echo $this->Form->end(); ?>

</div>
<div style="float: left; width: 33%; border: 1px solid #f8a51b;margin: 30px 2px 2px 2px; ">
	<div style=" font-size:20px; font-weight: bold;"> Compatibility</div>

	<table cellspacing="0" cellpadding="0" border="0" style="" class="flexme3 comproduct" width="100%">

		<tbody>

		<?php

		$com_item =  $this->requestAction('/PosCompatibilities/compatibality_list_by_product/1070');

		if(!empty($com_item)){
			$i = 0;
			foreach ($com_item as $posProduct):
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
				?>
				<tr <?php echo $class;?>>

					<td align='left' class='alistname' width="10%">
						<?php if(!empty($posProduct['ComPosProduct']['image'])) {?>
							<?php  echo $this->Html->image('../'.$posProduct['ComPosProduct']['image'], array("alt" => "No Image","width"=>"80" ,"height"=>"80","border"=>"0" ));?>

						<?php }else{?>

							<?php  echo $this->Html->image('/img/wpage/noImage.jpg', array("alt" => "No Image","width"=>"80" ,"height"=>"80","border"=>"0"));?>

						<?php }?>
					</td>

					<td align='left' class='alistname' width="90%" style="vertical-align:top"><?php echo  $posProduct['ComPosProduct']['name']; ?>&nbsp;</td>
				</tr>
			<?php endforeach;
		}
		else{
			echo 'No data found';
		}?>
	</table>
	<style>
		.comproduct thead tr td{
			font-size:13px;
			font-weight:bold;
			padding:3px;
			text-align:center;

		}
		.comproduct tr td{
			border:0px solid #f8a51b;
			padding:3px;
		}
		.altrow{
			background:#f2f2f2;
		}
	</style>


</div>

<?php echo $this->Html->css(array('ui-10/jquery-ui-1.10.4.custom.min','module/PosProducts/device_accessories'));
echo $this->Html->script(array('module/Shop/addtocart','wpage/jquery.anythingzoomer.min'));

echo $this->Html->script(array('module/PosProducts/device_accessories'));?>

<script type="text/javascript">
	jQuery(function($){

		$('body').on('click', function (e) {
			/*======================= Zoomer ======================== */
			$('.az-overly').hide();
			$('.az-small').show();

			$('.add').each(function () {
				//the 'is' for buttons that trigger popups
				//the 'has' for icons within a button that triggers a popup
				if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
					$(this).popover('hide');
				}
			});
		});
		/*======================= Zoomer ======================== */
		$(".zoom111").anythingZoomer({
			overlay : true,
			edit: true,
			// If you need to make the left top corner be at exactly 0,0, adjust the offset values below
			offsetX : 0,
			offsetY : 0
		});
		$('.president')
			.bind('click', function(){
				return false;
			})
			.bind('mouseover click', function(){
				var loc = $(this).attr('rel');
				if (loc && loc.indexOf(',') > 0) {
					loc = loc.split(',');
					$('.zoom').anythingZoomer( loc[0], loc[1] );
				}
				return false;
			});

		/*========================== Compatability PopOver ================== */
		$('.add').popover({
			html: true,
			title: function() {
				var titlehed = $(".product_name").html();
				return  titlehed;
			},
			content: function () {

				var ids = $(this).attr('id');
				return details_in_popup(ids);
			},
			placement: function (context, source) {
				var position = $(source).position();

				if (position.left > 515) {
					return "left";
				}

				if (position.left < 515) {
					return "right";
				}

				if (position.bottom >500){
					return "top";
				}
				if (position.bottom <500){
					return "top";
				}

			}
		});
	});
	function details_in_popup(id){
		$.ajax({
			url: siteurl+"PosCompatibilities/compatibality_list_by_product/"+id,
			success: function(response){
				$('#popoverContent').html(response);
			}
		});
		return '<div id="popoverContent">Loading...</div>';
	}




	/*  $( '.add' ).tooltip({
	 track: true
	 });*/


</script>
<style type="text/css">
	.item{
		width: 66%;
		height: auto;
		border: 0px;
		margin-top: 25px;
		float: left;
		border: 1px solid #f8a51b;
	}
	.img_name_full_div{
		width: auto;
		width: 250px;
	}
	.description_grid p{
		min-height: 175px;
		font-size: 12px;
	}
	.product_name_main{
		font-size: 22px;
		font-weight: bold;
	}
	.flash-msg {
		position: absolute;
		right: 10px;
		top: 10px;
		z-index: 10000;
	}
	.alert-success {
		background-color: #DFF0D8;
		border-color: #D6E9C6;
		color: #3C763D;
	}

	.alert {
		border: 1px solid rgba(0, 0, 0, 0);
		border-radius: 4px;
		margin-bottom: 20px;
		padding: 15px;
	}
	body .ui-tooltip {
		border-width:0;
	}

	.ui-tooltip,.arrow:after {
	}

	.ui-tooltip {
		padding:10px;
		color:white;
		border-radius:5px;
		font-family:Verdana, sans-serif;
		font-size:12px;
		text-transform:none;
	}

	.arrow {
		width:70px;
		height:16px;
		position:absolute;
		left:0!important;
		margin-left:-11px;
		top:15% !important;
	}

	.arrow.top {
		top:-16px;
		bottom:auto;
	}

	.arrow.left {
		left:20%;
	}

	.arrow:after {
		content:"";
		position:absolute;
		left:20px;
		top:-20px;
		width:25px;
		height:25px;
		box-shadow:6px 5px 9px -9px black;
		-webkit-transform:rotate(45deg);
		-moz-transform:rotate(45deg);
		-ms-transform:rotate(45deg);
		-o-transform:rotate(45deg);
		tranform:rotate(45deg);
	}

	.arrow.top:after {
		bottom:-20px;
		top:auto;
	}

	.ui-tooltip {
		-ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=70);
		filter:alpha(opacity=70);
		opacity:0.7;
	}
	.popover{
		min-width:410px;
	}
	.description_grid{
		width: 56%;
	}

</style>

