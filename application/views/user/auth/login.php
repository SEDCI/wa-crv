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
					<?php echo form_open('auth'); ?>
						<div class="form-group">
							<label for="uname">Username:</label>
							<input type="text" class="form-control" id="uname" name="uname" maxlength="30" />
						</div>
						<div class="form-group">
							<label for="passw">Password:</label>
							<input type="password" class="form-control" id="passw" name="passw" />
						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-danger">Log in</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
