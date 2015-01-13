 <label for="MenuAction">Action: <span class="star">*</span></label>
 <?php  echo $this->Form->select('Permission.action',$controlleractions, array('escape' => false, 'multiple'=>'multiple' ));?>