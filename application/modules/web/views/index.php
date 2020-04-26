<?php include 'layout/css.php'; ?>
<div id="wrapper">
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

						<?php if(check()): ?>
						<a href="#" class="header-widget-icon" uk-tooltip="title: My Courses ; pos: bottom ;offset:21">
							<i class="uil-youtube-alt"></i>
						</a>

						<!-- courses dropdown List -->
						<div uk-dropdown="pos: top;mode:click;animation: uk-animation-slide-bottom-small" class="dropdown-notifications my-courses-dropdown">

							<!-- notivication header -->
							<div class="dropdown-notifications-headline">
								<h4>Your Courses</h4>
								<a href="#">
									<i class="icon-feather-settings" uk-tooltip="title: Notifications settings ; pos: left"></i>
								</a>
							</div>

							<!-- notification contents -->
							<div class="dropdown-notifications-content" data-simplebar>

								<!-- notiviation list -->
								<ul>
									<li class="notifications-not-read">
										<a href="course-intro.html">
											<span class="notification-image">
												<img src="<?php echo base_url()?>/assets/images/course/1.png" alt=""> </span>
											<span class="notification-text">
												<span class="course-title">Ultimate Web Designer & Web Developer
												</span>
												<span class="course-number">6/35 </span>
												<span class="course-progressbar">
													<span class="course-progressbar-filler" style="width:95%"></span>
												</span>
											</span>

											<!-- option menu -->
											<span class="btn-option">
												<i class="icon-feather-more-vertical"></i>
											</span>
											<div class="dropdown-option-nav" uk-dropdown="pos: bottom-right ;mode : hover">
												<ul>
													<li>
														<span>
															<i class="icon-material-outline-dashboard"></i>
															Course Dashboard</span>
													</li>
													<li>
														<span>
															<i class="icon-feather-video"></i>
															Resume Course</span>
													</li>
													<li>
														<span>
															<i class="icon-feather-x"></i>
															Remove Course</span>
													</li>
												</ul>
											</div>
										</a>

									</li>
									<li>
										<a href="course-intro.html">
											<span class="notification-image">
												<img src="<?php echo base_url()?>/assets/images/course/3.png" alt=""> </span>
											<span class="notification-text">
												<span class="course-title">The Complete JavaScript Course Build Real
													Projects !</span>
												<span class="course-number">6/35 </span>
												<span class="course-progressbar">
													<span class="course-progressbar-filler" style="width:95%"></span>
												</span>
											</span>

											<!-- option menu -->
											<span class="btn-option">
												<i class="icon-feather-more-vertical"></i>
											</span>
											<div class="dropdown-option-nav" uk-dropdown="pos: bottom-right ;mode : hover">
												<ul>
													<li>
														<span>
															<i class="icon-material-outline-dashboard"></i>
															Course Dashboard</span>
													</li>
													<li>
														<span>
															<i class="icon-feather-video"></i>
															Resume Course</span>
													</li>
													<li>
														<span>
															<i class="icon-feather-x"></i>
															Remove Course</span>
													</li>
												</ul>
											</div>

										</a>
									</li>
									<li>
										<a href="course-intro.html">
											<span class="notification-image">
												<img src="<?php echo base_url()?>/assets/images/course/2.png" alt=""> </span>
											<span class="notification-text">
												<span class="course-title">Learn Angular Fundamentals From The
													Beginning</span>
												<span class="course-number">6/35 </span>
												<span class="course-progressbar">
													<span class="course-progressbar-filler" style="width:95%"></span>
												</span>
											</span>

											<!-- option menu -->
											<span class="btn-option">
												<i class="icon-feather-more-vertical"></i>
											</span>
											<div class="dropdown-option-nav" uk-dropdown="pos: bottom-right ;mode : hover">
												<ul>
													<li>
														<span>
															<i class="icon-material-outline-dashboard"></i>
															Course Dashboard</span>
													</li>
													<li>
														<span>
															<i class="icon-feather-video"></i>
															Resume Course</span>
													</li>
													<li>
														<span>
															<i class="icon-feather-x"></i>
															Remove Course</span>
													</li>
												</ul>
											</div>
										</a>
									</li>
									<li>
										<a href="course-intro.html">
											<span class="notification-image">
												<img src="<?php echo base_url()?>/assets/images/course/1.png" alt=""> </span>
											<span class="notification-text">
												<span class="course-title">Ultimate Web Designer & Web Developer
												</span>
												<span class="course-number">6/35 </span>
												<span class="course-progressbar">
													<span class="course-progressbar-filler" style="width:95%"></span>
												</span>
											</span>

											<!-- option menu -->
											<span class="btn-option">
												<i class="icon-feather-more-vertical"></i>
											</span>
											<div class="dropdown-option-nav" uk-dropdown="pos: top-right ;mode : hover">
												<ul>
													<li>
														<span>
															<i class="icon-material-outline-dashboard"></i>
															Course Dashboard</span>
													</li>
													<li>
														<span>
															<i class="icon-feather-video"></i>
															Resume Course</span>
													</li>
													<li>
														<span>
															<i class="icon-feather-x"></i>
															Remove Course</span>
													</li>
												</ul>
											</div>
										</a>
									</li>
								</ul>

							</div>
							<div class="dropdown-notifications-footer">
								<a href="#"> sell all</a>
							</div>
						</div>


						<!-- notificiation icon  -->

						<a href="#" class="header-widget-icon" uk-tooltip="title: Notificiation ; pos: bottom ;offset:21">
							<i class="uil-bell"></i>
							<span>4</span>
						</a>

						<!-- notificiation dropdown -->
						<div uk-dropdown="pos: top-right;mode:click ; animation: uk-animation-slide-bottom-small" class="dropdown-notifications">

							<!-- notivication header -->
							<div class="dropdown-notifications-headline">
								<h4>Notifications </h4>
								<a href="#">
									<i class="icon-feather-settings" uk-tooltip="title: Notifications settings ; pos: left"></i>
								</a>
							</div>

							<!-- notification contents -->
							<div class="dropdown-notifications-content" data-simplebar>

								<!-- notiviation list -->
								<ul>
									<li class="notifications-not-read">
										<a href="#">
											<span class="notification-icon btn btn-soft-danger disabled">
												<i class="icon-feather-thumbs-up"></i></span>
											<span class="notification-text">
												<strong>Adrian Mohani</strong> Like Your Comment On Course
												<span class="text-primary">Javascript Introduction </span>
												<br> <span class="time-ago"> 9 hours ago </span>
											</span>
										</a>
									</li>
									<li>
										<a href="#">
											<span class="notification-icon btn btn-soft-primary disabled">
												<i class="icon-feather-message-circle"></i></span>
											<span class="notification-text">
												<strong>Stella Johnson</strong> Replay Your Comments in
												<span class="text-primary">Programming for Games</span>
												<br> <span class="time-ago"> 12 hours ago </span>
											</span>
										</a>
									</li>
									<li>
										<a href="#">
											<span class="notification-icon btn btn-soft-success disabled">
												<i class="icon-feather-star"></i></span>
											<span class="notification-text">
												<strong>Alex Dolgove</strong> Added New Review In Course
												<span class="text-primary">Full Stack PHP Developer</span>
												<br> <span class="time-ago"> 19 hours ago </span>
											</span>
										</a>
									</li>
									<li class="notifications-not-read">
										<a href="#">
											<span class="notification-icon btn btn-soft-danger disabled">
												<i class="icon-feather-share-2"></i></span>
											<span class="notification-text">
												<strong>Jonathan Madano</strong> Shared Your Discussion On Course
												<span class="text-primary">Css Flex Box </span>
												<br> <span class="time-ago"> Yesterday </span>
											</span>
										</a>
									</li>
								</ul>

							</div>


						</div>


						<!-- Message  -->

						<a href="#" class="header-widget-icon" uk-tooltip="title: Message ; pos: bottom ;offset:21">
							<i class="uil-envelope-alt"></i>
							<!-- <span>1</span> -->
						</a>

						<!-- Message  notificiation dropdown -->
						<div uk-dropdown=" pos: top-right;mode:click" class="dropdown-notifications">

							<!-- notivication header -->
							<div class="dropdown-notifications-headline">
								<h4>Messages</h4>
								<a href="#">
									<i class="icon-feather-settings" uk-tooltip="title: Message settings ; pos: left"></i>
								</a>
							</div>

							<!-- notification contents -->
							<div class="dropdown-notifications-content" data-simplebar>

								<!-- notiviation list -->
								<ul>
									<!-- <li class="notifications-not-read">
																						<a href="#">
																								<span class="notification-avatar">
																										<img src="<?php echo base_url()?>/assets/images/avatars/avatar-2.jpg" alt="">
																								</span>
																								<div class="notification-text notification-msg-text">
																										<strong>Jonathan Madano</strong>
																										<p>Okay.. Thanks for The Answer I will be waiting for your...
																										</p>
																										<span class="time-ago"> 2 hours ago </span>
																								</div>
																						</a>
																				</li>
																				<li>
																						<a href="#">
																								<span class="notification-avatar">
																										<img src="<?php echo base_url()?>/assets/images/avatars/avatar-3.jpg" alt="">
																								</span>
																								<div class="notification-text notification-msg-text">
																										<strong>Stella Johnson</strong>
																										<p> Alex will explain you how to keep the HTML structure and all
																												that...</p>
																										<span class="time-ago"> 7 hours ago </span>
																								</div>
																						</a>
																				</li>
																				<li>
																						<a href="#">
																								<span class="notification-avatar">
																										<img src="<?php echo base_url()?>/assets/images/avatars/avatar-1.jpg" alt="">
																								</span>
																								<div class="notification-text notification-msg-text">
																										<strong>Alex Dolgove</strong>
																										<p> Alia Joseph just joined Messenger! Be the first to send a
																												welcome message..</p>
																										<span class="time-ago"> 19 hours ago </span>
																								</div>
																						</a>
																				</li>
																				<li>
																						<a href="#">
																								<span class="notification-avatar">
																										<img src="<?php echo base_url()?>/assets/images/avatars/avatar-4.jpg" alt="">
																								</span>
																								<div class="notification-text notification-msg-text">
																										<strong>Adrian Mohani</strong>
																										<p> Okay.. Thanks for The Answer I will be waiting for your...
																										</p>
																										<span class="time-ago"> Yesterday </span>
																								</div>
																						</a>
																				</li> -->
								</ul>

							</div>
							<div class="dropdown-notifications-footer">
								<a href="#"> sell all <i class="icon-line-awesome-long-arrow-right"></i> </a>
							</div>
						</div>

						<?php endif; ?>

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
							<a href="<?php echo base_url('profile') ?>">

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
								<li>
									<a href="<?php echo base_url('dashboard') ?>">
										<i class="icon-material-outline-dashboard"></i> Dashboard</a>
								</li>
								<li><a href="#">
										<i class="icon-feather-bookmark"></i> Bookmark </a>
								</li>
								<li><a href="#">
										<i class="icon-feather-settings"></i> Account Settings</a>
								</li>
								<li class="menu-divider">
								<li><a href="#">
										<i class="icon-feather-help-circle"></i> Help</a>
								</li>
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
			<a href="<?php echo base_url() ?>">
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
								<a href="<?php echo base_url(''); ?>"> <i class="<?php echo !empty($value['icon']) ? $value['icon'] : 'uil-brush-alt' ?>" style="font-size: larger"></i> <?php echo ucfirst($value['name']); ?> </a>
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
				<!-- Episodes -->
				<a href="#"> <i class="uil-youtube-alt"></i> <span class="tooltips"> Live Classe</span></a>
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
					<div class="uk-card-default rounded p-0">
						<a href="user-profile.html" class="p-0">

							<div class="dropdown-user-details">
								<div class="dropdown-user-avatar">
									<img src="<?php echo base_url()?>/assets/images/avatars/avatar-2.jpg" alt="">
								</div>
								<div class="dropdown-user-name">
									Richard Ali <span>Students</span>
								</div>
							</div>

						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="#">
									<i class="icon-material-outline-dashboard"></i> Dashboard</a>
							</li>
							<li><a href="user-profile-edit.html">
									<i class="icon-feather-settings"></i> Account Settings</a>
							</li>
							<li><a href="#" class="text-grey">
									<i class="icon-feather-star"></i> Upgrade To Premium</a>
							</li>
							<li class="menu-divider">
							</li>
							<li><a href="#">
									<i class="icon-feather-help-circle"></i> Help</a>
							</li>
							<li><a href="page-login.html">
									<i class="icon-feather-log-out"></i> Sing Out</a>
							</li>
						</ul>
					</div>
				</div>
			</li>
		</ul>
	</div>
	<!-- content -->


	<!-- Main Page container Start here -->
	<?php echo $main_content; ?>

</div>


<?php include 'layout/footer.php';?>
