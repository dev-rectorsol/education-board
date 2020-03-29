<?php include('layout/header.php'); ?>

<body>
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center custom-login">
				<h3>Registration</h3>
				<p>This is the best app ever!</p>
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
                    <div class="panel-body">
                        <form action="<?php echo base_url('Register/Signup')?>" method="POST">
                            <div class="row">
                                 
                                <div class="form-group col-lg-12">
                                    <label>Email/Mobile</label>
                                    <input class="form-control" id="username" name="username" placeholder= "Email or Mobile">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                
                                
                               
                            </div>
                            <div class="text-center">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                                <button type="submit" class="btn btn-success loginbtn">Register</button>
                                <button class="btn btn-default">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
				<p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
			</div>
		</div>   
    </div>
    <?php include('layout/js.php'); ?>
	<?php include('layout/footer.php'); ?>
