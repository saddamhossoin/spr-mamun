 
 <div id="Choicedegreename" class="microcontroll">
    <?php echo $this->Form->label('Choicedegree.name', __('What degree you have?'.': <span class="star">*</span>') ); ?>
	 <?php  $options = array('Mechanical Engineering'=>'Mechanical Engineering','Medical Science' => 'Medical Science', 'Information technology' => 'Information technology','Arts' => 'Arts', 'Commerce' => 'Commerce','Civil engineering' => 'Civil engineering', 'Draftsman' => 'Draftsman', 'Structural Engineering' => 'Structural Engineering', 'Others' => 'Others');
		 echo $this->Form->select('Choicedegree.name',$options, array('escape' => false,'size'=>'5','name'=>'view', 'empty'=>null,'class'=>''));	?>
 
    <span class="instruction"></span>
    <span class="example"></span>
    <span class="message"></span>
</div>
