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
											<?php if ($this->session->flashdata('status')): ?>
													<div class="alert alert-success alert-mg-b">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<strong>Done!</strong> <?php echo $this->session->flashdata('massege') ?> wait a moment <img src="<?php echo base_url('assets/images/preloder-0.2s-200px.svg') ?>" alt class="header-profile-icon">.
													</div>
											<?php endif; ?>

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
