// JavaScript Document
jQuery(function($){ 
 //======================= Start Add Script =====================				
 	 $('#ChoicedegreeName').click(function(){
 		//========================== Validation Check ========
  		
		if($('#ChoicedegreeName').val()=='Civil engineering' || $('#ChoicedegreeName').val()=='Structural Engineering'  ){
 			window.location = 'http://localhost/cakephp/authjob/users/addinfo';
			}
			else{
				 alert( $('#ChoicedegreeName').val()+' Is not valid');
			}
		 });
});
//==================== End Add Script =========================