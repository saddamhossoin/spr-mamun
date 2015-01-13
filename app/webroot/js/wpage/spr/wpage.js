$(document).ready(function(){

//==================Is Check Start=============//
			$('#forgetpassword').click(function(){
				alert('jj');
        if($(this).is(':checked')){
            $('#firstTableID').show();
            $('#secondTableID').hide();
        }
        else{
            $('#firstTableID').hide();
        }
    });
	
});
