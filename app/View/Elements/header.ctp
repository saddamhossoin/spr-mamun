<header>
    <div class="adsense-toogle"><span class="icon-plus"></span></div>
    <div class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="">
		  <?php echo $this->Html->image("wpage/logo.png", array("alt" => "logo"));?>
	 	  </a> </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
            <li class="active">
			<?php echo $this->Html->link(__('Home'), array('controller'=>'Pages','action' => 'home'));?>
			 </li>
            <li> 
			<?php echo $this->Html->link(__('Features'), array('controller'=>'Pages','action' => 'features'));?>
			</li>
            <li> <?php echo $this->Html->link(__('Call Rates'), array('controller'=>'Pages','action' => 'call_rate'));?>
		 	 </li>
            <li>
			 <?php echo $this->Html->link(__('How It Works'), array('controller'=>'Pages','action' => 'how_it_works'));?>
		  	</li>
            <li>	 <?php echo $this->Html->link(__('FAQ'), array('controller'=>'Pages','action' => 'faq'));?>
		 	</li>
            <li>
			 <?php echo $this->Html->link(__('CONTACT'), array('controller'=>'Pages','action' => 'contact_us'));?>
		 </li>
          </ul>
        </div>
        <!--/.nav-collapse --> 
      </div>
    </div>
 </header>