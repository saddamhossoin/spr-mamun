<?php $modelsname =Inflector::singularize(Inflector::camelize( $this->request->params['controller']));

	// pr($modelsname);
	 ?>
	 
	 <script type="text/javascript" >
	  $(function() {
        $( "#<?php echo $modelsname;?>Modified").datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat:"dd-mm-yy"
        });
		 $( "#<?php echo $modelsname;?>Modified1").datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat:"dd-mm-yy"
        });
    });
  	 </script>
	 
<div id="Wrapper<?php echo $modelsname;?>Description" class="microcontroll">
			<?php echo $this->Form->label($modelsname.'.modified', __('Date'.': <span class="star"></span>') ); ?>
 			<?php echo $this->Form->input($modelsname.'.modified',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35 ,'class'=>'filtermodified' ));?>
			<?php echo $this->Form->label($modelsname.'.modified1', __(' To Date'.': <span class="star"></span>'),array('id'=>'modified1') ); ?>
			 <?php echo $this->Form->input($modelsname.'.modified1',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35 ,'class'=>'filtermodified' ));?>
			<?php //if($this->Session->read('groupname')=='Admin' || $this->Session->read('groupname')=='SuperAdmin'){?>
			 <?php //echo $this->Form->label($modelsname.'.modifyedby', __('User'.': <span class="star"></span>'),array('id'=>'filtermodifyedby') ); ?>
 			<?php 
 			//echo $this->Form->select($modelsname.'.modifyedby', $userlists, array('div'=>false,'label'=>false, 'empty'=>'- Select User -', 'class'=>'filtermodifyby select2as'));}?>
			
			<?php  echo $this->Form->label($modelsname.'.showperpage', __('Per Page'.': <span class="star"></span>'),array('id'=>'filtershowperpage') ); ?>
 			<?php  echo $this->Form->input($modelsname.'.ShowPerPage',array('type'=>'text','div'=>false,'label'=>false, 'size'=>35  ,'class'=>'filtershowperpage'));?>
			
			<?php //echo $this->Form->label($modelsname.'.sortby', __('Sort By'.': <span class="star"></span>'),array('id'=>'filtersortby') ); ?>
			
			<?php 
 			//echo $this->Form->select($modelsname.'.sortby', $sortoption, array('div'=>false,'label'=>false,'empty'=>'- Select Title -', 'class'=>'select2as filtersortby1')); ?>
			<?php 
 			//echo $this->Form->select($modelsname.'.sortoption',  array('ASC'=>'ASC','DESC'=>'DESC')  ,array('div'=>false,'label'=>false, 'empty'=>false, 'class'=>'select2as filtersortby')); ?>
			
	 		<span class="instruction"></span>
			<span class="example"></span>
			<span class="message"></span>
	 	</div>
		<style>
		#WrapperProjectDescription label:first-child {
			width:40px !important;
		}
		#ProjectSortby{
			width:100px !important;
		}

		#ProjectModifyedby{
			width:120px !important;
		}
		#ProjectShowPerPage{
			width:50px !important;
		}
		
		</style>