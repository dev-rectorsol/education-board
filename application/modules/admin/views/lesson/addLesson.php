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

<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Add Lesson</a></li>
                             
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad addcoursepro">
                                                    <form action="<?php echo base_url('admin/Lesson/Add')?>" method="POST" >
                                                        <div class="row">
                                                          
                                                                <div class="form-group">
                                                                <label class="login2">Lesson Name</label>
                                                                    <input name="name" type="text" class="form-control" placeholder="Lesson Name">
                                                                </div>
                                                               
                                                                 <div class="form-group">
                                                                 <label class="login2">Lesson Description</label>
                                                                    <textarea name="description" id="summernote1" >Add a Description here</textarea>
                                                                </div>
                                                                 <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="payment-adress"><input type="hidden"
															name="<?php echo $this->security->get_csrf_token_name();?>"
															value="<?php echo $this->security->get_csrf_hash();?>">
                                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        
                                                            
                                                        </div>
                                                       
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>