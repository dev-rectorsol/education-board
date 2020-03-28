<?php include('layout/header.php'); ?>

<body>
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="error-pagewrap">
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
								<strong>Faild!</strong> <?php echo $this->session->flashdata('failed') ?>.
							</div>
						<?php endif; ?>
						<form action="<?php echo base_url('authentication')?>" Method="POST">
							<div class="form-group">
								<label class="control-label" for="username">Username</label>
								<input type="text" required="" value="" name="username" id="username" class="form-control">
							</div>
							<div class="form-group">
								<label class="control-label" for="password">Password</label>
								<input type="password" required="" value="" name="password" id="password" class="form-control">
							</div>
							<div class="checkbox login-checkbox">
								<label>
									<input type="checkbox" class="i-checks"> Remember me </label>
								<p class="help-block small">(if this is a private computer)</p>
							</div>
							<button class="btn btn-success btn-block loginbtn">Login</button>

						</form>
					</div>
				</div>
			</div>
			<div class="text-center login-footer">
				<p>Copyright © 2018. All rights reserved. Template by <a href="https://rectorsol.com/">Rector Sol</a></p>
			</div>
		</div>
	</div>
	<?php include('layout/footer.php'); ?>
