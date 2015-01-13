<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Dashboard - Client</title>


		<!--basic styles-->
         <?php echo $this->Html->css(array('client/bootstrap-responsive.min','client/bootstrap.min','client/font-awesome.min','client/ace.min','client/ace-responsive.min','client/ace-skins.min','client/client_layout')); ?>


		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

	<body>
		<div class="navbar">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a href="<?php echo $this->Html->url('/');?>" class="brand">
						<small>
							<?php echo $this->Html->image("wpage/spr/logo.png", array("class"=>"logo","alt" => "" ,"width"=>"170","height"=>"60","border"=>"0"));?>
						</small>
					</a><!--/.brand-->

					<ul class="nav ace-nav pull-right">

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<?php 
							if($this->Session->read('Auth.User.image')==null){
								echo $this->Html->image("client/avatar2.png", array("alt" => "Alex's Avatar","width"=>"" ,"height"=>""),array('class' => 'av-user-photo'));
										}
							else {
							echo $this->Html->image("../".$this->Session->read('Auth.User.image'), array());
							}
						?>
								
								
								<span class="user-info">
									<small>Welcome,</small>
								 <?php echo $this->Session->read('Auth.User.firstname');?> <?php echo $this->Session->read('Auth.User.lastname');?>
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
								<li>
									<a href="<?php echo $this->request->webroot?>users/client_profile_setting/<?php echo $this->Session->read('Auth.User.id');?>">
										<i class="icon-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="<?php echo $this->request->webroot?>users/client_profile/<?php echo $this->Session->read('Auth.User.id');?>">
										<i class="icon-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo $this->request->webroot?>users/logout">
										<i class="icon-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul><!--/.ace-nav-->
				</div><!--/.container-fluid-->
			</div><!--/.navbar-inner-->
		</div>

		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<div class="sidebar" id="sidebar">
				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-small btn-success">
							<i class="icon-signal"></i>
						</button>

						<button class="btn btn-small btn-info">
							<i class="icon-pencil"></i>
						</button>

						<button class="btn btn-small btn-warning">
							<i class="icon-group"></i>
						</button>

						<button class="btn btn-small btn-danger">
							<i class="icon-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!--#sidebar-shortcuts-->

				<ul class="nav nav-list">
					<li class="active">
						<a href="<?php echo $this->Html->url('/users/userdashboard');?>">
							<i class="icon-dashboard"></i>
							<span class="menu-text"> Dashboard </span>
						</a>
					</li>

					<li>
						<a href="<?php echo $this->Html->url('/ServiceDeviceInfos/client_service');?>">
							<i class="icon-text-width"></i>
							<span class="menu-text"> Services </span>
						</a>
					</li>

					<li>
						<a href="<?php echo $this->Html->url('/Orders/client_order_list');?>" class="dropdown-toggle">
							<i class="icon-desktop"></i>
							<span class="menu-text"> Orders </span>

							
						</a>

					</li>

					<li>
						<a href="<?php echo $this->Html->url('/PosSales/client_sales_list');?>">
							<i class="icon-list"></i>
							<span class="menu-text"> Sales </span>
						</a>
					</li>

					
				</ul><!--/.nav-list-->

				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
						<li>
							<i class="icon-home home-icon"></i>
							<a href="<?php echo $this->Html->url('/');?>">Home</a>

							<span class="divider">
								<i class="icon-angle-right arrow-icon"></i>
							</span>
						</li>
						<li class="active">&nbsp;</li>
						
						 <?php echo $this->Html->link(__('Dashboard', true), array('controller'=>'users','action' => 'userdashboard'),array('class'=>'')); ?>
						
					</ul><!--.breadcrumb-->

					
				</div>

				<div class="page-content">
					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->
							
							  <?php  echo $this->fetch('content');?>

							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div>
				<!--/.page-content-->

			
			</div><!--/.main-content-->
			
			
			
			
			
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>

		

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]>-->

		

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		

		<!--page specific plugin scripts-->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
			

		<?php echo $this->Html->script(array('client/jquery-ui-1.10.3.custom.min','client/bootstrap.min','client/jquery.ui.touch-punch.min','client/jquery.slimscroll.min','client/jquery.sparkline.min','client/jquery.flot.min','client/jquery.flot.pie.min','client/jquery.flot.resize.min','client/ace-elements.min','client/ace.min'));?>
		
		
		
	
		
		
		

		<!--ace scripts-->

		

		<!--inline scripts related to this page-->
		
		
		<div id="footer">
		<p><?php echo $this->Html->link("HOME",array('controller'=>'#','action'=>'#')); ?> |<?php echo $this->Html->link("ABOUT US",array('controller'=>'#','action'=>'#')); ?>| <?php echo $this->Html->link("PRODUCTS",array('controller'=>'#','action'=>'#')); ?> | <?php echo $this->Html->link("SERVICES",array('controller'=>'ServiceServices','action'=>'front_service_view')); ?>| <?php echo $this->Html->link("SUPPORT",array('controller'=>'#','action'=>'#')); ?> | <?php echo $this->Html->link("REVIEWS",array('controller'=>'#','action'=>'#')); ?>| <?php echo $this->Html->link("CONTACTS",array('controller'=>'#','action'=>'#')); ?><br/>
		  <span>Copyright &copy; SPR</span>. Designed by <a href="http://www.mayasoftbd.com" target="_blank">MayasoftBD.com</a></p>
	  </div>




		
	</body>
</html>

