<!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->

    <!-- Start Header Top
    ============================================= -->
    <div class="top-bar-area address-two-lines bg-dark text-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 address-info">
                    <div class="info box">
                        <ul>
                            <li>
                                <span><i class="fas fa-map"></i> Address</span>California, TX 70240
                            </li>
                            <li>
                                <span><i class="fas fa-envelope-open"></i> Email</span>Info@gmail.com
                            </li>
                            <li>
                                <span><i class="fas fa-phone"></i> Contact</span>+123 456 7890
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="user-login text-right col-md-4">
                    <a href="<?php echo base_url('join') ?>">
                        <i class="fas fa-edit"></i> Register
                    </a>
                    <a href="<?php echo base_url('authentication') ?>">
                        <i class="fas fa-user"></i> Login
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top -->

    <!-- Header
    ============================================= -->
    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-sticky bootsnav">

            <!-- Start Top Search -->
            <div class="container">
                <div class="row">
                    <div class="top-search">
                        <div class="input-group">
                            <form action="#">
                                <input type="text" name="text" class="form-control" placeholder="Search">
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Top Search -->

            <div class="container">

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" style="color: #002147;" href="<?php echo base_url('home') ?>">
                        <img src="<?php echo base_url('assets')?>/img/logo/logo_trans_black.png" class="logo" alt="Logo">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                        <li class="dropdown">
                            <a href="<?php echo base_url('about') ?>" class="active">About Us</a>
                        </li>
                        <!-- <li class="dropdown megamenu-fw">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <ul class="dropdown-menu megamenu-content" role="menu">
                                <li>
                                    <div class="row">
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">Gallery</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="gallery-2-colum.html">Gallery Two Colum</a></li>
                                                    <li><a href="gallery-3-colum.html">Gallery Three Colum</a></li>
                                                    <li><a href="gallery-4-colum.html">Gallery Four Colum</a></li>
                                                    <li><a href="gallery-6-colum.html">Gallery Six Colum</a></li>
                                                </ul>
                                            </div>
                                        </div>end col-3
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">Advisor</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="advisor-carousel.html">Advisor Carousel</a></li>
                                                    <li><a href="advisor-2-colum.html">Advisor Two Colum</a></li>
                                                    <li><a href="advisor-3-colum.html">Advisor Three Colum</a></li>
                                                    <li><a href="advisor-carousel-2.html">Advisor Carousel Two</a></li>
                                                </ul>
                                            </div>
                                        </div>end col-3
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">User Pages</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="profile.html">Profile</a></li>
                                                    <li><a href="edit-profile.html">Edit Profile</a></li>
                                                    <li><a href="login.html">login</a></li>
                                                    <li><a href="register.html">register</a></li>
                                                </ul>
                                            </div>
                                        </div>end col-3
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">Other Pages</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="about-us.html">About Us</a></li>
                                                    <li><a href="faq.html">Faq</a></li>
                                                    <li><a href="pricing-table.html">Pricing Table</a></li>
                                                    <li><a href="contact.html">Contact</a></li>
                                                    <li><a href="404.html">Error Page</a></li>
                                                </ul>
                                            </div>
                                        </div>end col-3
                                    </div>end row
                                </li>
                            </ul>
                        </li> -->
                        <li class="dropdown">
                            <a href="<?php echo base_url('courses') ?>" class="active">Courses</a>
                        </li>
                        <li class="dropdown">
                            <a href="<?php echo base_url('faq')?>" class="active">faq</a>
                        </li>
                        <li class="dropdown">
                            <a href="<?php echo base_url('event') ?>" class="active">Event</a>
                        </li>
                        <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Blog</a>
                            <ul class="dropdown-menu">
                                <li><a href="blog-standard.html">Blog Standard</a></li>
                                <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                <li><a href="blog-single-standard.html">Single Standard</a></li>
                                <li><a href="blog-single-left-sidebar.html">Single Left Sidebar</a></li>
                                <li><a href="blog-single-right-sidebar.html">Single Right Sidebar</a></li>
                            </ul>
                        </li> -->
                        <li>
                            <a href="<?php echo base_url('contact') ?>">contact</a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>

        </nav>
        <!-- End Navigation -->

    </header>
    <!-- End Header -->

    <!-- Start Login Form
    ============================================= -->
    <form action="#" id="login-form" class="mfp-hide white-popup-block">
        <div class="col-md-4 login-social">
            <h4>Login with social</h4>
            <ul>
                <li class="facebook">
                    <a href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="twitter">
                    <a href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="linkedin">
                    <a href="#">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-8 login-custom">
            <h4>login to your registered account!</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <input class="form-control" placeholder="Email*" type="email">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <input class="form-control" placeholder="Password*" type="text">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <label for="login-remember"><input type="checkbox" id="login-remember">Remember Me</label>
                    <a title="Lost Password" href="#" class="lost-pass-link">Lost your password?</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <button type="submit">
                        Login
                    </button>
                </div>
            </div>
            <p class="link-bottom">Not a member yet? <a href="#">Register now</a></p>
        </div>
    </form>
    <!-- End Login Form -->

    <!-- Start Register Form
    ============================================= -->
    <form action="#" id="register-form" class="mfp-hide white-popup-block">
        <div class="col-md-4 login-social">
            <h4>Register with social</h4>
            <ul>
                <li class="facebook">
                    <a href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="twitter">
                    <a href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="linkedin">
                    <a href="#">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-8 login-custom">
            <h4>Register a new account</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <input class="form-control" placeholder="Email*" type="email">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <input class="form-control" placeholder="Username*" type="text">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <input class="form-control" placeholder="Password*" type="text">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <input class="form-control" placeholder="Repeat Password*" type="text">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <button type="submit">
                        Sign up
                    </button>
                </div>
            </div>
            <p class="link-bottom">Are you a member? <a href="#">Login now</a></p>
        </div>
    </form>
    <!-- End Register Form -->
