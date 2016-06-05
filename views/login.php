<?php
include_once("header.php");
include_once("navbar.php");
?>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
			<div class="panel panel-primary">
  				<div class="panel-heading">
    				<h3 class="panel-title">Login</h3>
 				</div>
  				<div class="panel-body">
					<form>
						<div class="form-group">
							<label for="inputEmail">Email address</label>
							<input type="email" class="form-control" id="inputEmail" placeholder="Email">
						</div>
						<div class="form-group">
							<label for="inputPassword">Password</label>
							<input type="password" class="form-control" id="inputPassword" placeholder="Password">
						</div>
						<div class="checkbox">
							<label>
							  <input type="checkbox"> Remember me
							</label>
						</div>
						<button type="submit" class="btn btn-default">Sign in</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once("footer.php") ?>