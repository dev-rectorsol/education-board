		<div class="breadcome-area">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="breadcome-list">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="breadcome-heading">
										<form role="search" class="sr-input-func">
											<input type="text" placeholder="Search..." class="search-int form-control">
											<a href="#"><i class="fa fa-search"></i></a>
										</form>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<ul class="breadcome-menu">
										<li><a href="#">Home</a> <span class="bread-slash">/</span>
										</li>
										<li><span class="bread-blod"><?php echo	$page ?></span>
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
    
   <div class="contacts-area mg-b-15">
   	<div class="container-fluid">
   		<div class="row"><div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
		   <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 res-mg-t-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Enrolled Courses</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right sp-cn-r"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-success">1500</span></li>
                            </ul>
                        </div>       
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Page Views</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right graph-two-ctn"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-purple">3000</span></li>
                            </ul>
                        </div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						 <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Unique Visitor</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <li class="text-right graph-three-ctn"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-info">5000</span></li>
                            </ul>
                        </div>
						</div>
   			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
   				<div class="student-inner-std res-mg-b-30">
   					
   					<div class="student-dtl">
   						<h2><?php echo $_SESSION['username']?></h2>
   						<p class="dp"><b>Email:</b><?php echo $_SESSION['email']?></p>
   						<p class="dp-ag"><b>Phone:</b><?php echo $_SESSION['phone']?></p>
						<a href="">Update Profile</a>
   					</div>
   				</div>
   			</div>
   		</div>
   	</div>
   </div>
	
	
	
	