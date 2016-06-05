<?php
include_once("header.php");
?>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Create Tables</h3>
				</div>
				<div class="panel-body">
					<form role="form" action="install" method="post">
						<table class="table">
							<thead>
								<tr>
									<th style="width: 70%">Table</th>
									<th class="text-center">Status</th>
								</tr>
							</thead>
							<tbody>
								<?php $install->showTableStatus("users") ?>
							</tbody>
						</table>
						<button type="submit" name="submitButton" class="btn btn-default">Create</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>