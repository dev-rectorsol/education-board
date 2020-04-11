<?php include('layout/header.php'); ?>

<body>
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center ps-recovered">
				<h3>Welcome Back </h3>
				<p><?php echo $user->email ?></p>
			</div>
			<div class="content-error">
            <?php if ($this->session->flashdata()): ?>
							<div class="alert alert-danger alert-mg-b">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
								<strong>Failed!</strong> <?php echo $this->session->flashdata('failed') ?>.
							</div>
						<?php endif; ?>
				<div class="hpanel">
                    <div class="panel-body poss-recover">
                        <p>
                            Enter your password to Login.
                        </p>
                        <form action="<?php echo base_url('authentication')?>" Method="POST">
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" required="" value="" name="password" class="form-control" placeholder="your password here">
                                <input type="hidden" name="username" value="<?php echo isset($user->email) ? $user->email : $user->phone; ?>">
                            </div>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                            <button type="submit" class="btn btn-success btn-block">Login</button>
                        </form>
                    </div>
                </div>
			</div>
			<a class="pull-right" href="<?php echo base_url('forget')?>">forget password</a>
			<div class="text-center login-footer">
				<p>Copyright © <?php echo date("Y"); ?>. All rights reserved. Develeped By <a href="https://rectorsol.com/">RectorSol</a></p>
			</div>
		</div>
    </div>
	<?php include('layout/footer.php'); ?>
