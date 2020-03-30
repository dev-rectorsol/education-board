<?php include('layout/css.php'); ?>
<!-- Start Left menu area -->
<div class="left-sidebar-pro">
	<nav id="sidebar" class="">
		<div class="sidebar-header">
			<a href="index.html"><img class="main-logo" src="<?php echo base_url('assets')?>/img/logo/logo.png" alt="" /></a>
			<strong><a href="index.html"><img src="<?php echo base_url('assets')?>/img/logo/logosn.png" alt="" /></a></strong>
		</div>
		<div class="left-custom-menu-adp-wrap comment-scrollbar">
			<nav class="sidebar-nav left-sidebar-menu-pro">
				<ul class="metismenu" id="menu1">
					<li class="active">
						<a href="<?php echo base_url('board/dashboard') ?>">
							<span class="educate-icon educate-home icon-wrap"></span>
							<span class="mini-click-non">Dashboard</span>
						</a>
					</li>
					
					<!-- Courses -->
					<li>
						<a class="has-arrow" href="" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Courses</span></a>
						<ul class="submenu-angle" aria-expanded="false">
							<li><a title="All Courses" href="<?php echo base_url('admin/Course/ViewCourse')?>"><span class="mini-sub-pro">All Courses List </span></a></li>
							<li><a title="All Courses" href="<?php echo base_url('admin/Course/ViewCourseGrid')?>"><span class="mini-sub-pro">My Class Room</span></a></li>

							
						</ul>
					</li>
					
					<!-- library -->
					<li>
						<a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Library</span></a>
						<ul class="submenu-angle" aria-expanded="false">
							<li><a title="All Library" href="library-assets.html"><span class="mini-sub-pro">Library Assets</span></a></li>
							
						</ul>
					</li>
					<!-- Profile -->
					<li>
						<a class="has-arrow" href="all-students.html" aria-expanded="false"><span class="educate-icon educate-student icon-wrap"></span> <span class="mini-click-non">Profile</span></a>
						<ul class="submenu-angle" aria-expanded="false">
							
							<li><a title="Edit Students" href="edit-student.html"><span class="mini-sub-pro">Edit Profile</span></a></li>
						
						</ul>
					</li>
					<!-- Events -->
					<li>
						<a title="Landing Page" href="events.html" aria-expanded="false"><span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Event</span></a>
					</li>
					<li>
						<a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-department icon-wrap"></span> <span class="mini-click-non">Live Class</span></a>
						
					</li>
					<li>
						<a class="has-arrow" href="mailbox.html" aria-expanded="false"><span class="educate-icon educate-settings icon-wrap"></span> <span class="mini-click-non">Support</span></a>
						<ul class="submenu-angle" aria-expanded="false">
							<li><a title="Aim" href="<?php echo base_url('admin/Aim')?>"><span class="mini-sub-pro">Order History</span></a></li>
							<li><a title="View Mail" href="<?php echo base_url('admin/Category')?>"><span class="mini-sub-pro">Terms and Conditions</span></a></li>
						</ul>
					</li>


				</ul>
			</nav>
		</div>
	</nav>
</div>
<!-- End Left menu area -->
<!-- Start Welcome area -->
<div class="all-content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="logo-pro">
					<a href="index.html"><img class="main-logo" src="<?php echo base_url('assets')?>/img/logo/logo.png" alt="" /></a>
				</div>
			</div>
		</div>
	</div>
	<div class="header-advance-area">
		<div class="header-top-area">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="header-top-wraper">
							<div class="row">
								<div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
									<div class="menu-switcher-pro">
										<button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
											<i class="educate-icon educate-nav"></i>
										</button>
									</div>
								</div>
								<div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
								</div>
								<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
									<div class="header-right-info">
										<ul class="nav navbar-nav mai-top-nav header-right-menu">
											<li class="nav-item dropdown">
												<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-message edu-chat-pro" aria-hidden="true"></i><span
													  class="indicator-ms"></span></a>
												<div role="menu" class="author-message-top dropdown-menu animated zoomIn">
													<div class="message-single-top">
														<h1>Message</h1>
													</div>
													<ul class="message-menu">
														<li>
															<a href="#">
																<div class="message-img">
																	<img src="<?php echo base_url('assets')?>/img/contact/1.jpg" alt="">
																</div>
																<div class="message-content">
																	<span class="message-date">16 Sept</span>
																	<h2>Advanda Cro</h2>
																	<p>Please done this project as soon possible.</p>
																</div>
															</a>
														</li>
														<li>
															<a href="#">
																<div class="message-img">
																	<img src="<?php echo base_url('assets')?>/img/contact/4.jpg" alt="">
																</div>
																<div class="message-content">
																	<span class="message-date">16 Sept</span>
																	<h2>Sulaiman din</h2>
																	<p>Please done this project as soon possible.</p>
																</div>
															</a>
														</li>
														<li>
															<a href="#">
																<div class="message-img">
																	<img src="<?php echo base_url('assets')?>/img/contact/3.jpg" alt="">
																</div>
																<div class="message-content">
																	<span class="message-date">16 Sept</span>
																	<h2>Victor Jara</h2>
																	<p>Please done this project as soon possible.</p>
																</div>
															</a>
														</li>
														<li>
															<a href="#">
																<div class="message-img">
																	<img src="<?php echo base_url('assets')?>/img/contact/2.jpg" alt="">
																</div>
																<div class="message-content">
																	<span class="message-date">16 Sept</span>
																	<h2>Victor Jara</h2>
																	<p>Please done this project as soon possible.</p>
																</div>
															</a>
														</li>
													</ul>
													<div class="message-view">
														<a href="#">View All Messages</a>
													</div>
												</div>
											</li>
											<li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-bell" aria-hidden="true"></i><span
													  class="indicator-nt"></span></a>
												<div role="menu" class="notification-author dropdown-menu animated zoomIn">
													<div class="notification-single-top">
														<h1>Notifications</h1>
													</div>
													<ul class="notification-menu">
														<li>
															<a href="#">
																<div class="notification-icon">
																	<i class="educate-icon educate-checked edu-checked-pro admin-check-pro" aria-hidden="true"></i>
																</div>
																<div class="notification-content">
																	<span class="notification-date">16 Sept</span>
																	<h2>Advanda Cro</h2>
																	<p>Please done this project as soon possible.</p>
																</div>
															</a>
														</li>
														<li>
															<a href="#">
																<div class="notification-icon">
																	<i class="fa fa-cloud edu-cloud-computing-down" aria-hidden="true"></i>
																</div>
																<div class="notification-content">
																	<span class="notification-date">16 Sept</span>
																	<h2>Sulaiman din</h2>
																	<p>Please done this project as soon possible.</p>
																</div>
															</a>
														</li>
														<li>
															<a href="#">
																<div class="notification-icon">
																	<i class="fa fa-eraser edu-shield" aria-hidden="true"></i>
																</div>
																<div class="notification-content">
																	<span class="notification-date">16 Sept</span>
																	<h2>Victor Jara</h2>
																	<p>Please done this project as soon possible.</p>
																</div>
															</a>
														</li>
														<li>
															<a href="#">
																<div class="notification-icon">
																	<i class="fa fa-line-chart edu-analytics-arrow" aria-hidden="true"></i>
																</div>
																<div class="notification-content">
																	<span class="notification-date">16 Sept</span>
																	<h2>Victor Jara</h2>
																	<p>Please done this project as soon possible.</p>
																</div>
															</a>
														</li>
													</ul>
													<div class="notification-view">
														<a href="#">View All Notification</a>
													</div>
												</div>
											</li>
											<li class="nav-item">
												<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
													<img src="<?php echo base_url('assets')?>/img/product/pro4.jpg" alt="" />
													<span class="admin-name"><?php echo $_SESSION['username']?></span>
													<i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
												</a>
												<ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
													<li><a href="#"><span class="edu-icon edu-home-admin author-log-ic"></span>My Account</a>
													</li>
													<li><a href="#"><span class="edu-icon edu-user-rounded author-log-ic"></span>My Profile</a>
													</li>
													<li><a href="#"><span class="edu-icon edu-money author-log-ic"></span>User Billing</a>
													</li>
													<li><a href="#"><span class="edu-icon edu-settings author-log-ic"></span>Settings</a>
													</li>
													<li><a href="<?php echo base_url('auth/logout')?>"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
													</li>
												</ul>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Mobile Menu start -->
		<div class="mobile-menu-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="mobile-menu">
							<nav id="dropdown">
								<ul class="mobile-menu-nav">
									<li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
									</li>
									<li><a href="#">Event</a></li>
									
									<li><a data-toggle="collapse" data-target="#democrou" href="#">Courses <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
										<ul id="democrou" class="collapse dropdown-header-top">
											<li><a href="all-courses.html">All Courses</a>
											</li>
											<li><a href="<?php echo base_url('admin/Course')?>">My Class Room</a>
											</li>
											
										</ul>
									</li>
									<li><a data-toggle="collapse" data-target="#demolibra" href="#">Library <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
										<ul id="demolibra" class="collapse dropdown-header-top">
											<li><a href="library-assets.html">Library Assets</a>
											</li>
											
										</ul>
									</li>
									<li><a data-toggle="collapse" data-target="#demodepart" href="#">Profile <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
										<ul id="demodepart" class="collapse dropdown-header-top">
											
											<li><a href="edit-department.html">Edit Profile</a>
											</li>
										</ul>
									</li>
									<li><a data-toggle="collapse" data-target="#demo" href="#">Event <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
										
									</li>
									<li><a data-toggle="collapse" data-target="#demo" href="#">Live Class <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
										
									</li>
									<li><a data-toggle="collapse" data-target="#demodepart" href="#">Support <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
										<ul id="demodepart" class="collapse dropdown-header-top">
											<li><a href="departments.html">Order History</a>
											</li>
											<li><a href="add-department.html">Terms and Conditions</a>
											</li>
											
										</ul>
									</li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Mobile Menu end -->
<?php echo	$main_content ?>

<?php include('layout/footer.php'); ?>
