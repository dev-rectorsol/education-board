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
						<?php foreach($course as $row){?>

                       <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="courses-inner res-mg-b-30">
                            <div class="courses-title">
                                <a href="#"><img src="img/courses/1.jpg" alt=""></a>
                                <h2><?php echo $row['name'] ?></h2>
                            </div>
                            <div class="courses-alaltic">
                                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-star"></i></span> <?php echo $row['review_counter'] ?></span>
                               
                             
                            </div>
                            <div class="course-des">
                            <?php echo $row['description'] ?>
                            </div>
                            <div class="product-buttons">
                                <button type="button" class="button-default cart-btn">Read More</button>
                            </div>
                        </div>
                    </div>
					<?php }?>	
					
				</div>
			</div>
		</div>





		</div>
		</div>
		</div>
		<script>
			function delete_detail(id) {
				var del = confirm("Do you want to Delete");
				if (del == true) {
					var sureDel = confirm("Are you sure want to delete");
					if (sureDel == true) {
						window.location = "<?php echo base_url()?>admin/Category/Delete/" + id;
					}

				}
			}
		</script>