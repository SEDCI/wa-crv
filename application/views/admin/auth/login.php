	<div class="container login-form">
		<div class="row">
			<div class="col-sm-12 text-center">
				<img src="<?php echo base_url('img/sedc_logo.png'); ?>" width="350">
			</div>
		</div>
		<br />
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<?php echo $validation_errors; ?>
				<div class="well">
					<?php echo form_open('admin/auth'); ?>
						<div class="form-group">
							<label for="adminuser">Username:</label>
							<input type="text" class="form-control" id="adminuser" name="adminuser" maxlength="20" />
						</div>
						<div class="form-group">
							<label for="adminpass">Password:</label>
							<input type="password" class="form-control" id="adminpass" name="adminpass" />
						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-danger">Log in</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
