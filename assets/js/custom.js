$(function(){

	$(document).bind('keypress', function(e) {
        if(e.keyCode==13){
             $('#loginBtn').trigger('click');
         }
    });
    
	$('#loginBtn').click(function(){
		var loading = '<i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Loading';
		var btn = $(this);
		btn.html(loading);
		var postObject = new Object();
		postObject.email = $('#email').val();
		postObject.password = $('#password').val();
		var error = [];
		if(!postObject.email){
			error.push('Please enter valid email address.');
		}
		if(!postObject.password){
			error.push('Please enter your password.');
		}

		if(error.length == 0){
			url = baseUrl+'/api/authenticate';
			//url = 'https://api.test.hotelbeds.com/hotel-api/1.0/status';
	        $.ajax({
	            url: url,
	            type: 'POST',
	            data: postObject,
	            success: function (response) {
	            	var data = JSON.parse(response);
	            	if(typeof data.error == 'undefined'){
	            		btn.addClass('btn-success');
	            		btn.html('<i class="bx bx-check-double font-size-16 align-middle me-2"></i> Logged in');
	            		displayAlert(data.message,'success',baseUrl+'/dashboard');	
	            	} else{
	            		btn.html('Login');
	            		displayAlert(data.message,'danger');
	            	}
	            },
	            error: function (response) {
	            	btn.html('Login');
	            	var data = JSON.parse(response);
	            	displayAlert(data.message,'danger');
	            }
	        });
		} else{
			btn.html('Login');
			var errors = '';
			$(error).each(function(i,e){
				errors +=e+'<br/>';
			});
			displayAlert(errors,'danger');
		}

	});


	function displayAlert(msg,type,redirect = ''){//success, danger, warning, info
		var html = '<div class="alert alert-'+type+' alert-dismissible fade show" role="alert">'+msg +' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
		$('.alertMsgBox').html(html);
		$('.alertMsgBox').show();
		setTimeout(function(){
			$('.alertMsgBox').hide();
			if(redirect!=''){
				window.location = redirect;
			}
		},3000);
	}
});