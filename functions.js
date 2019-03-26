			$(document).ready(function(){
				
				passwordValidation = false;
				emailValidation =false;

				$("#next-1").click(function(){
					
					if (passwordValidation && emailValidation) {
						
						$("#secondStep").show();
						$("#firstStep").hide();
						$("#2ndstep").addClass("active");
					
					}

				});

				$('#signup').validate();

					$('#password').on('blur', function() {
					if ($('#password').val().length >= 4) {
						$("#passwordError").hide();
						passwordValidation = true;
					} else {
						$('#passwordError').html('Password must have at least 4 chracters').css('color', 'red');
						$("#passwordError").show();
						passwordValidation = false;
					}
				});

				$("#prev-1").click(function(){

					$("#firstStep").show();
					$("#secondStep").hide();
					$("#2ndstep").removeClass("active");
				
				});
	
			});

			function validateEmail(email) 
			{
			var re = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
			return re.test(email);
			}

			$(document).ready(function(){
				$("#email").change(function() {
				var email = $("#email").val();
				if(validateEmail(email)){
					emailValidation = true;
					$("#emailError").html('Checking availability...');
					$.ajax({ 
					type: "POST", 
					url: "check.php", 
					data: "email=" +email,
					dataType: 'text',
						success: function(msg){
							if(msg == 'OK'){

							$('#next-1').removeAttr('disabled');
							$("#emailError").hide();
							$("#emailError").html('Valid email');

							} else {
							
							$('#next-1').attr('disabled','disabled');
							$("#emailError").show();	
							$("#emailError").html(msg);
						}
						}

					});
				} else {
					$("#emailError").html('<font color="red">' + 'Enter valid email</font>');
					$("#emailError").show();
					emailValidation = false;

				}
				});
			});

			$(document).ready(function() {
				$('#signup').on('submit', function (e) {
					e.preventDefault();

					nameValidation = false;
					cityValidation = false;
					phoneValidation = false;
					
					var firstname = $("#firstname").val();
					var lastname = $("#lastname").val();

					var e = document.getElementById("city");
					var city = e.options[e.selectedIndex].value;

					var phone = $("#phone").val();

					if ((firstname == '') || (lastname == '')) {
						$('#nameError').html('Name is required').css('color', 'red');
						$("#nameError").show();
						nameValidation = false;
					} else {
						$("#nameError").hide();
						nameValidation = true;
					}

					if (city == 'City') {
						$('#cityError').html('City is required').css('color', 'red');
						$("#cityError").show();
						cityValidation = false;

					} else {
						$("#cityError").hide();
						cityValidation = true;
					}

					if ((phone.length != 10) && (!isNaN(phone))) {
						$('#phoneError').html('Phone number must contain 10 digits').css('color', 'red');
						$("#phoneError").show();
						phoneValidation = false;	

					} else {
						$("#phoneError").hide();
						phoneValidation = true;	

					}
					
					if (nameValidation && cityValidation && phoneValidation) {
					$.ajax({
						type: 'post',
						url: 'signup.php',
						data: $('#signup').serialize(),
						success: function () {
							$("#finish").show();
							$("#secondStep").hide();
							$("#3rdstep").addClass("active");
						}
						});
					}
				});
			});

			$("#finishbtn").click(function(){

				document.location.reload(true);

			});

			function logoutck() {
          var r = confirm("Do you really want to log out?");
          if (r) {
            window.location.href = 'logout.php'
          }
      }

			$(document).ready(function() {
            $('#login').on('click', function() {
				
                var email = $("#loginEmail").val();
				var password = $("#loginPassword").val();

				if (email == '' || password == '') {
					$('#loginError').html('All fields are required');
					$("#loginError").show();

				} else {

					$.ajax({
						url: 'login.php',
						method: 'POST',
						data: {
							login:1,
							emailPHP: email,
							passwordPHP: password
						},
						success: function (response) {

							if(response == 'OK'){
							$("#loginError").hide();
							document.location.reload(true);

							} else {

							$('#loginError').html('Incorrect email or password');
							$("#loginError").show();
							}	
						},
						dataType: 'text'
					});

				}
            });

				$("#searchButton").click(function(){
						window.location.href = "search.php";
				});


      });

      