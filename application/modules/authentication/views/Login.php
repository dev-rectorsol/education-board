<?php include('layout/header.php'); ?>

	<!-- <div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>PLEASE LOGIN TO APP</h3>
				<p>This is the best app ever!</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
					<div class="panel-body">
						<?php if ($this->session->flashdata()): ?>
							<div class="alert alert-danger alert-mg-b">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
								<strong>Failed!</strong> <?php echo $this->session->flashdata('failed') ?>.
							</div>
						<?php endif; ?>
						<form action="<?php echo base_url('authentication')?>" Method="POST">
							<div class="form-group">
								<label class="control-label" for="username">Email/Phone</label>
								<input type="text" required="" value="" name="username" id="username" class="form-control" placeholder="email or phone">
							</div>
							<div class="form-group">
								<label class="control-label" for="password">Password</label>
								<input type="password" required="" value="" name="password" id="password" class="form-control" placeholder="Password">
							</div>
							<div class="checkbox login-checkbox">
								<label>
									<input type="checkbox" class="i-checks"> Remember me </label>
								<p class="help-block small"><a class="pull-right" href="<?php echo base_url('forget')?>">forget password</a></p>

							</div>
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
							<button class="btn btn-success btn-block loginbtn" type="submit">Login</button>
							<a class="btn btn-default btn-block" href="<?php echo base_url('join')?>">Register</a>
						</form>
					</div>
				</div>
			</div>
			<div class="text-center login-footer">
				<p>Copyright © <?php echo date("Y"); ?>. All rights reserved. Develeped By <a href="https://rectorsol.com/">RectorSol</a></p>
			</div>
		</div>
	</div> -->

	<!-- Content
	================================================== -->
	<div uk-height-viewport="expand: true" class="uk-flex uk-flex-middle">
			<div class="uk-width-1-3@m uk-width-1-2@s m-auto">
					<div class="uk-card-default p-5 rounded">
						<?php if ($this->session->flashdata()): ?>
							<div class="alert alert-danger alert-mg-b">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
								<strong>Failed!</strong> <?php echo $this->session->flashdata('failed') ?>.
							</div>
						<?php endif; ?>
							<div class="mb-4 uk-text-center">
									<h3 class="mb-0"> Welcome back</h3>
									<p class="my-2">Login to manage your account.</p>
							</div>
							<form action="<?php echo base_url('authentication')?>" Method="POST">

									<div class="uk-form-group">
											<label class="uk-form-label"> Email / Phone</label>

											<div class="uk-position-relative w-100">
													<span class="uk-form-icon">
															<i class="icon-feather-mail"></i>
													</span>
													<input class="uk-input" type="text" required="" value="" name="username" id="username" placeholder="email or phone">
											</div>

									</div>

									<div class="uk-form-group">
											<label class="uk-form-label"> Password</label>

											<div class="uk-position-relative w-100">
													<span class="uk-form-icon">
															<i class="icon-feather-lock"></i>
													</span>
													<input class="uk-input" type="password" required="" value="" name="password" id="password" placeholder="**************">
											</div>

									</div>

									<div class="mt-4 uk-flex-middle uk-grid-small" uk-grid>
											<div class="uk-width-expand@s">
													<p> Dont have account <a href="<?php echo base_url('join')?>">Sign up</a></p>
											</div>
											<div class="uk-width-auto@s">
												<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
													<button type="submit" class="btn btn-default">Get Started</button>
											</div>
									</div>

							</form>
					</div>
			</div>
	</div>
	<div class="text-center login-footer">
		<p>Copyright © <?php echo date("Y"); ?>. All rights reserved. Develeped By <a href="https://rectorsol.com/">RectorSol</a></p>
	</div>
	<?php include('layout/footer.php'); ?>
