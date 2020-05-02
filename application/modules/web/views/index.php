<?php include 'layout/css.php'; ?>
<div id="wrapper"
<?php if(!check()): ?>
 uk-toggle="target: #modal-sections"
<?php endif; ?>
>
	<!-- Header Container
				================================================== -->
	<header class="header <?php echo isset($homeSlider) ? 'header-transparent uk-light' : 'uk-sticky'; ?>" uk-sticky="top:20 ; cls-active:header-sticky; <?php echo isset($homeSlider) ? 'cls-inactive: uk-light' : ''; ?>">

		<div class="container">
			<nav uk-navbar>

				<!-- left Side Content -->
				<div class="uk-navbar-left">

					<span class="btn-mobile" uk-toggle="target: #wrapper ; cls: mobile-active"></span>



					<!-- logo -->
					<a href="<?php echo base_url(); ?>" class="logo">
						<img src="<?php echo base_url()?>/assets/images/logo-dark.svg" alt="">
						<span> Courseplus</span>
					</a>

					<!-- breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?php echo base_url(); ?>"> Dashboard </a></li>
							<?php if(isset($breadcrumbs)):
																	?>
							<?php foreach ($breadcrumbs as $key => $value):?>
							<?php if (count($breadcrumbs) == ($key + 1)): ?>
							<li><?php echo substr($value['name'], 0, 40); ?></li>
							<?php else: ?>
							<li><a href="<?php echo $value['url']; ?>"> <?php echo $value['name']; ?> </a></li>
							<?php endif; ?>
							<?php endforeach; ?>
							<?php endif; ?>
						</ul>
					</nav>


				</div>


				<!--  Right Side Content   -->

				<div class="uk-navbar-right">

					<div class="header-widget">

						<!-- User icons close mobile-->
						<span class="icon-feather-x icon-small uk-hidden@s" uk-toggle="target: .header-widget ; cls: is-active"> </span>
						<!-- profile-icon-->

						<a href="#" class="header-widget-icon profile-icon">
							<?php if(check()): ?>
							<?php if ($this->session->userdata('thumb') != ""): ?>
							<img src="<?php echo base_url() . $this->session->userdata('thumb'); ?>" alt="" class="header-profile-icon">
							<?php else: ?>
							<img src="<?php echo base_url()?>assets/images/avatars/default.png" alt="" class="header-profile-icon">
							<?php endif; ?>
							<?php else: ?>
							<img src="<?php echo base_url()?>assets/images/avatars/default.png" alt="" class="header-profile-icon">
							<?php endif; ?>
						</a>

						<div uk-dropdown="pos: top-right ;mode:click" class="dropdown-notifications small">
							<?php if(check()): ?>

							<!-- User Name / Avatar -->
							<a href="<?php echo base_url() ?>">

								<div class="dropdown-user-details">
									<div class="dropdown-user-avatar">
										<?php if ($this->session->userdata('thumb') != ""): ?>
										<img src="<?php echo base_url() . $this->session->userdata('thumb'); ?>" alt="">
										<?php else: ?>
										<img src="<?php echo base_url()?>assets/images/avatars/default.png" alt="">
										<?php endif; ?>
									</div>
									<div class="dropdown-user-name">
										<?php echo $this->session->userdata('username'); ?> <span>Students</span>
									</div>
								</div>

							</a>

							<!-- User menu -->

							<ul class="dropdown-user-menu">
								<li><a href="<?php echo base_url('authentication/logout') ?>">
										<i class="icon-feather-log-out"></i> Sing Out</a>
								</li>
							</ul>

							<?php else: ?>
							<!-- User Name / Avatar -->
							<a href="#">

								<div class="dropdown-user-details">
									<div class="dropdown-user-avatar">
										<img src="<?php echo base_url()?>assets/images/avatars/default.png" alt="">
									</div>
									<div class="dropdown-user-name">
										Guest <span>Students</span>
									</div>
								</div>

							</a>

							<!-- User menu -->

							<ul class="dropdown-user-menu">
								<li>
									<a href="#">
										<i class="icon-feather-help-circle"></i> Help
									</a>
								</li>
								<li><a href="<?php echo base_url('authentication') ?>">
										<i class="icon-feather-log-in"></i> Sing In</a>
								</li>
							</ul>

							<?php endif; ?>

						</div>


					</div>



					<!-- icon search-->
					<a class="uk-navbar-toggle uk-hidden@s" uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="#">
						<i class="uil-search icon-small"></i>
					</a>

					<!-- User icons -->
					<a href="#" class="uil-user icon-small uk-hidden@s" uk-toggle="target: .header-widget ; cls: is-active">
					</a>


				</div>
				<!-- End Right Side Content / End -->


			</nav>

		</div>
		<!-- container  / End -->

	</header>

	<!-- overlay seach on mobile-->
	<div class="nav-overlay uk-navbar-left uk-position-relative uk-flex-1 bg-grey uk-light p-2" hidden style="z-index: 10000;">
		<div class="uk-navbar-item uk-width-expand" style="min-height: 60px;">
			<form class="uk-search uk-search-navbar uk-width-1-1">
				<input class="uk-search-input" type="search" placeholder="Search..." autofocus>
			</form>
		</div>
		<a class="uk-navbar-toggle" uk-close uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="#"></a>
	</div>

	<!-- search overlay-->
	<div id="searchbox">

		<div class="search-overlay"></div>

		<div class="search-input-wrapper">
			<div class="search-input-container">
				<div class="search-input-control">
					<span class="icon-feather-x btn-close uk-animation-scale-up" uk-toggle="target: #searchbox; cls: is-active"></span>
					<div class=" uk-animation-slide-bottom">
						<input type="text" name="search" autofocus required>
						<p class="search-help">Type the name of the Course and book you are looking for</p>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- side nav-->
	<div class="side-nav uk-animation-slide-left-medium">


		<div class="side-nav-bg"></div>

		<!-- logo -->
		<div class="logo uk-visible@s">
			<a href="<?php echo base_url('home'); ?>">
				<i class=" uil-graduation-hat"></i>
			</a>
		</div>

		<ul>
			<li>
				<a href="#"> <i class="uil-play-circle"></i> </a>
				<div class="side-menu-slide">
					<div class="side-menu-slide-content">
						<ul data-simplebar>
							<?php $category = $this->common_model->select('category');
																foreach ($category as $value):

															?>
							<li>
								<a href="<?php echo base_url('courses'); ?>"> <i class="<?php echo !empty($value['icon']) ? $value['icon'] : 'uil-brush-alt' ?>" style="font-size: larger"></i> <?php echo ucfirst($value['name']); ?> </a>
							</li>
							<?php endforeach; ?>
					</div>
				</div>
			</li>
			<li>
				<!-- Paths-->
				<a href="<?php echo base_url('paths'); ?>"> <i class="uil-rss-interface"></i> <span class="tooltips">
						Paths</span></a>
			</li>
			<li>
				<!-- Blog-->
				<a href="<?php echo base_url('blogs'); ?>"> <i class="uil-file-alt"></i> <span class="tooltips"> Blogs </span></a>
			</li>
			<li>
				<!-- book -->
				<a href="<?php echo base_url('courses'); ?>"> <i class="uil-book-alt"></i> <span class="tooltips"> Courser </span> </a>
			</li>
			<li>
				<a href="#" uk-toggle="target: #searchbox; cls: is-active"><i class="uil-search-alt"></i></a>
			</li>

		</ul>
		<ul class="uk-position-bottom">
			<li>
				<!-- Lunch information box -->
				<a href="#">
					<i class="uil-paint-tool"></i>
				</a>
				<div uk-drop="pos: right-bottom ;mode:click ; offset: 10;animation: uk-animation-slide-right-small">
					<div class="uk-card-default rounded p-0">
						<h5 class="mb-0 p-3 px-4  bg-light"> Night mode</h5>
						<div class="p-3 px-4">
							<p>Turns the light surfaces of the page dark, creating an experience ideal for night.
							</p>
							<div class="uk-flex">
								<p class="uk-text-small text-muted">DARK THEME </p>
								<!-- night mode button -->
								<span href="#" id="night-mode" class="btn-night-mode">
									<label class="btn-night-mode-switch">
										<span class="uk-switch-button"></span>
									</label>
								</span>
							</div>

						</div>
					</div>
				</div>

			</li>
			<li>
				<a href="#">
					<span class="icon-feather-user"></span>
				</a>
				<div uk-drop="pos: right-bottom ;mode:click ; offset: 10;animation: uk-animation-slide-right-small">
          <?php if(check()): ?>
          <div class="uk-card-default rounded p-0">
						<a href="<?php echo base_url() ?>" class="p-0">

							<div class="dropdown-user-details">
								<div class="dropdown-user-avatar">
                  <?php if ($this->session->userdata('thumb') != ""): ?>
                  <img src="<?php echo base_url() . $this->session->userdata('thumb'); ?>" alt="">
                  <?php else: ?>
                  <img src="<?php echo base_url()?>assets/images/avatars/default.png" alt="">
                  <?php endif; ?>
								</div>
								<div class="dropdown-user-name">
										<?php echo $this->session->userdata('username'); ?> <span>Students</span>
								</div>
							</div>

						</a>
            <ul class="dropdown-user-menu">
              <li><a href="<?php echo base_url('authentication/logout') ?>">
                  <i class="icon-feather-log-out"></i> Sing Out</a>
              </li>
            </ul>
					</div>
          <?php endif; ?>
				</div>
			</li>
		</ul>
	</div>
	<!-- content -->


	<!-- Main Page container Start here -->
	<?php echo $main_content; ?>




	<div id="modal-sections" uk-modal="" class="uk-modal" style="">
		<div class="uk-modal-dialog">
			<button class="uk-modal-close-default uk-icon uk-close" type="button" uk-close=""><svg width="14" height="14" viewBox="0 0 14 14" data-svg="close-icon">
					<line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line>
					<line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line>
				</svg></button>
			<div class="uk-modal-header">
				<h2 class="uk-modal-title">Join Kalka Ias Zone</h2>
			</div>
			<form action="<?php echo base_url('authentication/register/subscribe'); ?>" method="post">
				<div class="uk-modal-body">
					<div class="uk-margin"> <input class="uk-input uk-form-danger uk-form-width-medium" type="text" name="fullname" placeholder="Your Name" required> </div>
					<div class="uk-margin"> <input class="uk-input uk-form-danger uk-form-width-medium" type="text" name="username"  placeholder="Email or Phone" required> </div>
					<div class="uk-margin"> <input class="uk-input uk-form-danger uk-form-width-medium" type="text" name="city" placeholder="city" required> </div>
					<div class="uk-margin">
						<textarea class="uk-textarea" rows="2" name="course" style="min-height: 60px;" placeholder="What Course Do You Want To Study?" required></textarea>
					</div>
          <div class="uk-width-expand@s">
            <p> Already have an account <a href="<?php echo base_url('authentication') ?>">Sign In</a></p>
          </div>
				</div>
				<div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-default small uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary small" type="submit">Save</button>
				</div>
			</form>
		</div>
	</div>

</div>


<?php include 'layout/footer.php';?>
