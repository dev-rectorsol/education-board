<?php include('layout/header.php'); ?>


		<!-- Content
    ================================================== -->
    <div uk-height-viewport class="uk-flex uk-flex-middle">
        <div class="uk-width-2-3@m uk-width-1-2@s m-auto rounded">
            <div class="uk-child-width-1-2@m uk-grid-collapse bg-gradient-grey" uk-grid>

                <!-- column one -->
                <div class="uk-margin-auto-vertical uk-text-center uk-animation-scale-up p-3 uk-light">
                    <i class=" uil-graduation-hat icon-large"></i>
                    <h3 class="mb-4"> कालका <br> IAS Z<img src="<?php echo base_url('assets/images/logos/goal.svg') ?>" alt="" class="header-profile-icon">NE</h3>
                    <p></p>
                </div>

                <!-- column two -->
                    <div class="uk-card-default p-5 rounded">
											<?php if ($this->session->flashdata()): ?>
												<?php if($this->session->flashdata('status')): ?>
													<div class="alert alert-success alert-mg-b">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<strong>Done!</strong> <?php echo $this->session->flashdata('massege') ?> wait a moment <img src="<?php echo base_url('assets/images/preloder-0.2s-200px.svg') ?>" alt class="header-profile-icon">.
														<?php redirect(base_url(), 'refresh'); ?>
													</div>

												<?php else: ?>
												<div class="alert alert-danger alert-mg-b">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">×</span>
													</button>
													<strong>Failed!</strong> <?php echo $this->session->flashdata('massege') ?>.
												</div>
											<?php endif; ?>
											<?php endif; ?>
                        <div class="mb-4 uk-text-center">
                            <h3 class="mb-0"> Create new Account</h3>
                            <p class="my-2">Login to manage your account.</p>
                        </div>

                    <form class="uk-child-width-1-1 uk-grid-small" uk-grid action="<?php echo base_url('authentication/register/Signup')?>" method="POST">

                        <div>
                            <div class="uk-form-group">
                                <label class="uk-form-label"> Name</label>
                                <div class="uk-position-relative w-100">
                                    <span class="uk-form-icon">
                                        <i class="icon-feather-user"></i>
                                    </span>
                                    <input class="uk-input" type="text" name="fullname" placeholder="Full name">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="uk-form-group">
                                <label class="uk-form-label"> Email or Phone</label>

                                <div class="uk-position-relative w-100">
                                    <span class="uk-form-icon">
                                        <i class="icon-feather-mail"></i>
                                    </span>
                                    <input class="uk-input" type="text" id="username" name="username" placeholder= "Email or Mobile">
                                </div>

                            </div>
                        </div>

                        <div class="uk-width-1-2@s">
                            <div class="uk-form-group">
                                <label class="uk-form-label"> Password</label>

                                <div class="uk-position-relative w-100">
                                    <span class="uk-form-icon">
                                        <i class="icon-feather-lock"></i>
                                    </span>
                                    <input class="uk-input" type="password" name="password" placeholder="********">
                                </div>

                            </div>
                        </div>
                        <div class="uk-width-1-2@s">
                            <div class="uk-form-group">
                                <label class="uk-form-label"> Confirm password</label>

                                <div class="uk-position-relative w-100">
                                    <span class="uk-form-icon">
                                        <i class="icon-feather-lock"></i>
                                    </span>
                                    <input class="uk-input" type="password" name="re-password" placeholder="********">
                                </div>

                            </div>
                        </div>

                        <div>
                            <div class="mt-4 uk-flex-middle uk-grid-small" uk-grid>
                                <div class="uk-width-expand@s">
                                    <p> Already have an account <a href="<?php echo base_url('authentication') ?>">Sign In</a></p>
                                </div>
                                <div class="uk-width-auto@s">
																	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                    <input type="submit" class="btn btn-default" value="Join Now"></input>
                                </div>
                            </div>
                        </div>

                    </form>
                </div><!--  End column two -->

            </div>
        </div>
    </div>
		<div class="text-center login-footer">
			<p>Copyright © <?php echo date("Y"); ?>. All rights reserved. Develeped By <a href="https://rectorsol.com/">RectorSol</a></p>
		</div>
    <!-- Content -End
    ================================================== -->
	<?php include('layout/footer.php'); ?>
