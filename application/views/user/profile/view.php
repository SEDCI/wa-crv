	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<h2><?php echo $title; ?></h2>
<?php echo $alert; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-user icon"></span>Information</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-4">
								<p>Username:</p>
							</div>
							<div class="col-xs-8">
								<p><?php echo $user['username']; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<p>Name:</p>
							</div>
							<div class="col-xs-8">
								<p><?php echo $user['first_name'].' '.$user['last_name']; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<p>E-mail Address:</p>
							</div>
							<div class="col-xs-8">
								<p><?php echo $user['email']; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<p>Company Name:</p>
							</div>
							<div class="col-xs-8">
								<p><?php echo $user['company']; ?></p>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12 text-right">
								<a class="btn btn-primary" href="profile/edit">Edit Profile</a>
								<a class="btn btn-primary" href="profile/changepassword">Change Password</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
			</div>
		</div>
	</div>
