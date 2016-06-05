<?php
include_once("header.php");
include_once("navbar.php");
?>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
			<div class="panel panel-primary">
  				<div class="panel-heading">
					<h3 class="panel-title">Register</h3>
 				</div>
  				<div class="panel-body">
					<form role="form" method="post" action="register" id="registerForm">
						<div class="row">
							<div class="form-group col-sm-6">
								<label>First name</label>
								<input type="text" name="firstname" class="form-control" placeholder="First">
							</div>
							<div class="form-group col-sm-6">
								<label>Last name</label>
								<input type="text" name="lastname" class="form-control" placeholder="Last">
							</div>
						</div>
						<div class="form-group">
							<label for="inputNickname">Nickname</label>
							<input type="text" name="nickname" id="inputNickname" class="form-control" placeholder="Nickname">
						</div>
						<div class="form-group">
							<label for="inputEmail">Email address</label>
							<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email">
						</div>
						<div class="form-group">
							<label for="inputPassword">Password</label>
							<input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
						</div>
						<div class="form-group">
							<label for="inputPassword2">Confirm your password</label>
							<input type="password" name="password2" class="form-control" id="inputPassword2" placeholder="Confirm Password">
						</div>
						<div class="form-group">
							<label for="inputBirthday">Birthday</label>
							<input type="text" name="birthday" class="form-control" id="inputBirthday" placeholder="YYYY/MM/DD">
						</div>
						<div class="form-group">
							<label for="selectGender">Gender</label>
							<select name="gender" id="selectGender" class="form-control">
								<option value="" disabled selected hidden>I am...</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
								<option value="other">Other</option>
							</select>
						</div>
						<button type="submit" name="register" class="btn btn-default">Sign up</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script>
$(document).ready(function() {

	function checkDate(date) {
		var str = date.split("/");
		var d = new Date(date);
		return (d && str[0] >= 1800 && (d.getMonth() + 1) == str[1] && d.getDate() == str[2]);
	}

	$.validator.setDefaults({
		highlight: function(element) {
			$(element).closest('.form-group').addClass('has-error');
		},
		unhighlight: function(element) {
			$(element).closest('.form-group').removeClass('has-error');
		},
		errorElement: 'span',
		errorClass: 'help-block',
		errorPlacement: function(error, element) {
			if(element.parent('.input-group').length) {
				error.insertAfter(element.parent());
			} else {
				error.insertAfter(element);
			}
		}
	});

	$.validator.addMethod("regex", function(value, element, partten) {
		return partten.test(value);
	}, "Your input is invalid.");

	$.validator.addMethod("date2", function(value, element) {
		return checkDate(value);
	}, "Please enter a valid date.");

	$("#registerForm").validate( {
		rules: {
			firstname: {
				required: true
			},
			lastname: {
				required: true
			},
			nickname: {
				required: true,
				maxlength: 16,
				remote: {
					url: "include/validateNick",
					type: "post",
					data: {
						nickname: function() {
							return $("#inputNickname").val();
						}
					}
				}
			},
			email: {
				required: true,
				email: true,
				remote: {
					url: "include/validateEmail",
					type: "post",
					data: {
						nickname: function() {
							return $("#inputEmail").val();
						}
					}
				}
			},
			password: {
				required: true,
				minlength: 6,
				maxlength: 32,
				regex: /^[a-zA-Z0-9_]{6,32}$/
			},
			password2: {
				required: true,
				equalTo: "#inputPassword"
			},
			birthday: {
				required: true,
				date2: true,
				remote: {
					url: "include/validateDate",
					type: "post",
					data: {
						birthday: function() {
							return $("#inputBirthday").val();
						}
					}
				}
			},
			gender: {
				required: true
			}
		},
		messages: {
			nickname: {
				remote: "Your nickname is already taken."
			},
			email: {
				remote: "Your email is already taken."
			},
			password: {
				regex: "Your password can only contain letters and numbers."
			},
			password2: {
				equalTo: "Your password and confirmation password do not match."
			},
			birthday: {
				remote: "Please enter a valid birthday."
			}
		}
	});
});
</script>

<?php include_once("footer.php") ?>