$(function () {
	
	

	$(document).ready(function(){
		
		$.ajaxSetup({ cache: true });
		$.getScript('//connect.facebook.net/en_UK/all.js', function(){
			FB.init({
				appId      : '217608864916653',
				channelUrl :  base_url + '/channel',
				status     : true,
				cookie     : true,
				xfbml      : true,
				oauth	   : true
			}); 

			// $('#loginbutton,#feedbutton').removeAttr('disabled');
    		//FB.getLoginStatus(updateStatusCallback);
  		});

		

	});

	

	

	// $("#slideshow > div:gt(0)").hide();
	// setInterval(function() { $('#slideshow > div:first').fadeOut(1000).next().fadeIn(1000).end().appendTo('#slideshow');},  3000);

	
	$(document).on('click','[name="attempt-login"]', function(){

		var formdata = {
			'username' : $('form[name="loginform"] input[name="emailaddress"]').val(),
			'password' : $('form[name="loginform"] input[name="password"]').val()
		}

		$('#loginform').removeClass('invalidlogin');

		console.log(formdata);

		if(formdata['username'] == null || formdata['password'] == null)
		{

		}
		else
		{
			$.ajax ({
				type: "POST",
				url: base_url+"auth/k_login",	
				data: formdata,		
				cache: false,
				success: function (data) {	
					trapdata = $.parseJSON(data);
					console.log(trapdata);
					if($.trim(trapdata.status) == 1)
					{
						console.log('Status 200');
						$('[name="k-connect-modal"]').hide();
						$('[name="k-connect-profile"]').show();
						$('[name="fullname"]').html(trapdata.response.kid);
						$('[name="register-button"]').data('logged-in',trapdata.response.kid);
						$('[name="workshop-register-button"]').data('logged-in',trapdata.response.kid);
						$('[name="team-workshop-register-button"]').data('logged-in',trapdata.response.kid);
						$('[name="attachment_registration"]').html("<p>Refresh Page to know status.</p>");
						console.log(trapdata.response.email);
						$('#login').modal('hide');
					}
					else if($.trim(trapdata.status) == 2)
					{
						$('[ name="login-message"]').html(trapdata.response);
						$('#loginform').addClass('invalidlogin');
						console.log('Invalid');
					}
					else
					{
						console.log('Status 401');	
					}
					
					console.log("Edit Category Form Intiated");
				},		
				error: function() {
					console.log("Edit Category Form Failed");
				}
			});
		}
	});
	

	
	

	
	

	
		

	$(document).on('click','[name="close-button"]',function(){
		console.log('Close');
		$('#loginModal').modal('hide');
		$('#registerModal').modal('hide');
		$('#workshopModal').modal('hide');
		$('#teamWorkshopModal').modal('hide');
		$('#saModal').modal('hide');
	});

	$(document).on('click','[name="attempt-logout"]',function(){
		console.log("Logout");
		var formdata = {
			'logout_prototype' : 1
		};

		$.ajax ({
				type: "POST",
				url: base_url+"auth/k_logout",	
				data: formdata,		
				cache: false,
				success: function (data) {	
					trapdata = $.parseJSON(data);
					console.log(trapdata)
					if($.trim(trapdata.status) == 1)
					{
						$('[name="k-connect-profile"]').hide();
						$('[name="k-connect-modal"]').show();
						$('.k-login-button').show();
						console.log('Logged Out');
						
					}
					else
					{
						console.log('Status 401');	
					}
							
					console.log("Edit Category Form Intiated");
				},		
				error: function() {
					console.log("Edit Category Form Failed");
				}
			});
	});

	$(document).on('click','[name="attempt-register-hospitality"]',function(){
		var formdata = {
			'kid' : $('[name="registerhospitality"] [name="kid"]').val(),
			'arrivaldate' : $('[name="registerhospitality"] [name="dateofarrival"]').val(),
			'arrivaltime' : $('[name="registerhospitality"] [name="timeofarrival"]').val(),
			'arrivalmedian' : $('[name="registerhospitality"] [name="arrivalmedian"]').val(),
			'departuredate' : $('[name="registerhospitality"] [name="dateofdeparture"]').val(),
			'departuretime' : $('[name="registerhospitality"] [name="timeofdeparture"]').val(),
			'departuremedian' : $('[name="registerhospitality"] [name="departuremedian"]').val(),
			'city' : $('[name="registerhospitality"] [name="city"]').val()
		};

		console.log(formdata);

		if(formdata['departuredate'] < formdata['arrivaldate'])
		{
			alert('Departure Date is less than Arrival Date');
		}
		else if(formdata['departuredate'] == "" || formdata['arrivaldate'] == "" || formdata['arrivalmedian'] == "" || formdata['departuremedian'] == "" || formdata['departuretime'] == "" || formdata['arrivaltime'] == "" || formdata['city'] == "")
		{
			alert('Required Fields are empty');
		}
		else
		{
			$.ajax ({
				type: "POST",
				url: base_url+"k_hospitality_register",	
				data: formdata,		
				cache: false,
				success: function(data) {	
					console.log(data);
					var trapdata = $.parseJSON(data);
					if(trapdata.status == 1)
					{
						$('[name="registerhospitality"]').html(trapdata.response.message);
		
					}
					else if(trapdata.status == 2)
					{
						$('[name="registerhospitality"]').html(trapdata.response.message);
		
					}
					else
					{
						console.log(trapdata.response.message);
					}
				},		
				error: function() {
					console.log("Edit Category Form Failed");
				}
			});
		}
	})

	$(document).on('click','[name="attempt-facebook"]',function(){
		KFBLogin();
		console.log("FB");
	});

	

	$(document).on('click','[name="profile-type"]', function(){
		var formdata = {
			'profile-name' : $(this).data('user-type')
		}
		console.log(formdata);

		if(formdata['profile-name'] == 1)
		{
			$('[name="student-info"]').show();
			$('[name="school-info"]').hide();	
			profiletype = 1;
		}
		else if(formdata['profile-name'] == 2)
		{
			$('[name="student-info"]').hide();
			$('[name="school-info"]').show();
			profiletype = 2;				
		}
	});


	$(document).on('click','[name="attempt-save-profile"]',function(){

		var type = $('[name="profile-type"]').data('user-type');
		if($.trim(profiletype) == 1) {
			var formdata = {
				'fullname' : $('form[name="profile-update"] input[name="fullname"]').val(),
				'semester' : $('form[name="profile-update"] select[name="semester"]').val(),
				'gender' : $('form[name="profile-update"] select[name="gender-type"]').val(),
				'type' : profiletype,
				'institution' :  $('form[name="profile-update"] input[name="institution"]').val(),
				'contactnumber' :   $('form[name="profile-update"] input[name="contactnumber"]').val(),
				'degree' :   $('form[name="profile-update"] input[name="degree"]').val(),
				'course' :   $('form[name="profile-update"] input[name="course"]').val(),
				'kid' : $('form[name="profile-update"] input[name="kid"]').val()
			}
		} else {
			var formdata = {
				'fullname' : $('form[name="profile-update"] input[name="fullname"]').val(),
				'semester' : $('form[name="profile-update"] select[name="class"]').val(),
				'gender' : $('form[name="profile-update"] select[name="gender-type"]').val(),
				'type' : profiletype,
				'institution' :  $('form[name="profile-update"] input[name="school"]').val(),
				'contactnumber' :   $('form[name="profile-update"] input[name="contactnumber"]').val(),
				'kid' : $('form[name="profile-update"] input[name="kid"]').val()
			}
		}
		

		console.log(formdata);

		$.ajax ({
				type: "POST",
				url: base_url+"k_profile_update",	
				data: formdata,		
				cache: false,
				success: function (data) {	
					var trapdata = $.parseJSON(data);
					if(trapdata.status == 1)
					{
						$('[name="profile-update-message"]').html(trapdata.response.message).fadeOut(5000);
		
					}
					else if(trapdata.status == 2)
					{
						$('[name="profile-update-message"]').html(trapdata.response.message).fadeOut(5000);
		
					}
					else
					{
						console.log(trapdata.response.message);
					}
				},		
				error: function() {
					console.log("Edit Category Form Failed");
				}
			});
	});
	
});



///////////////////////// LOAD - START //////////////////////////////////////////////////

function loadscripts()
{
	var scriptpath = base_url+'assets/scripts/';

	var scriptfiles = new Array(); 
		scriptfiles.push("jquery.min.js");
		scriptfiles.push("jquery.cookie.js");
		scriptfiles.push("jquery.pjax.js");
		scriptfiles.push("bootstrap.min.js");
		scriptfiles.push("jquery.tickertype.js");
		scriptfiles.push("responsiveslides.min.js");

		console.log(scriptfiles);

	var scriptfileslength = scriptfiles.length;

}

///////////////////////// LOAD - END ////////////////////////////////////////////////////




///////////////////////// FACEBOOK - START //////////////////////////////////////////////

function KFBLogin()
{
	FB.login(function(response) {
		if (response.authResponse) {
        	KFBStore();
        	console.log('User Store Login');
        } else {
        	 console.log('User cancelled login or did not fully authorize.');
    	}
	},{scope: 'email'});
}


function KFBLogout()
{
	FB.logout(function(response) {
		
	});
}

function KFBStore()
{
	FB.api('/me', function(response) {
       	
       	var formdata = {
       		'fullname' : response.name,
       		'email' : response.email,
       		'username' : response.email
       	}

       	console.log(formdata);

       	$.ajax ({
				type: "POST",
				url: base_url+"auth/k_fb",	
				data: formdata,		
				cache: false,
				success: function (data) {
					trapdata = $.parseJSON(data);
					console.log(trapdata);
					if($.trim(trapdata.status) == 1)
					{
						$('[name="k-connect-modal"]').hide();
						$('[name="k-connect-profile"]').show();
						$('[name="fullname"]').html(trapdata.response.kid);
						$('[name="register-button"]').data('logged-in',trapdata.response.kid);
						$('[name="workshop-register-button"]').data('logged-in',trapdata.response.kid);
						$('[name="team-workshop-register-button"]').data('logged-in',trapdata.response.kid);
						$('[name="attachment_registration"]').html("<p>Refresh Page to know status.</p>");
						console.log(trapdata.response.email);
						$('#loginModal').modal('hide');

					}
					else if($.trim(trapdata.status) == 2)
					{
						$('[ name="login-message"]').html(trapdata.response);
						$('#loginform').addClass('invalidlogin');
						console.log('Invalid');
					}
					else
					{
						console.log('Status 401');	
					}
							
					console.log("FB Login Intiated");
				},		
				error: function() {
					console.log("Failed");
				}
			});
    });
}


//////////////////////// FACEBOOK - END ////////////////////////////////////////////////