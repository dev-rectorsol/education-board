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
						<div class="alert-wrap2 shadow-inner wrap-alert-b">
							<?php if ($this->session->flashdata()):?>
							<?php if($this->session->flashdata('status')): ?>
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
								<strong>Success!</strong> <?php echo $this->session->flashdata('msg'); ?>
							</div>
							<?php else: ?>

							<div class="alert alert-danger alert-mg-b">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
								<strong>Danger!</strong> <?php echo $this->session->flashdata('msg'); ?>
							</div>

							<?php endif; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		<div class="container-fluid">

			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

					<div class="row">
						<form action="<?php echo base_url('admin/Article/save')?>" method="POST">
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
								<div class="product-status-wrap drp-lst">

									<h4>Add Article </h4>
									<div class="form-group">
										<label class="login2">Article name</label>
										<input name="name" type="text" class="form-control" placeholder="Article Name" required>
									</div>

									<div class="form-group">
										<label class="login2">Article content</label>
										<textarea name="content" id="summernote1" required>Add a content here</textarea>
									</div>


								</div>
							</div>

							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="product-status-wrap drp-lst">
									<span id="addfeaturepreview">
									</span>
									<button id="removepreview" type="button" class="btn btn-link hide">remove</button>
									<button id="addfeatureimage" type="button" class="btn btn-link" name="button">Add feature image</button>
									<div class="form-group">
										<label class="login2">Slug</label>
										<input name="slug" type="text" class="form-control" placeholder="slug">
									</div>
									<div class="form-group res-mg-t-15">
										<label class="login2">Course Tag</label>
										<select class="select2_demo_2 form-control" name='tag[]' data-placeholder="Choose a Tags..." multiple="multiple">
											<?php foreach($tag as $row){ ?>
											<option value="<?php echo $row['title'] ?>"> <?php echo $row['title'] ?> </option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group res-mg-t-15">
										<label class="login2">Course Category</label>
										<select class="select2_demo_2 form-control" name='category[]' data-placeholder="Choose a Category..." multiple="multiple">
											<?php foreach($category as $row){ ?>
											<option value="<?php echo $row['name'] ?>"> <?php echo $row['name'] ?> </option>
											<?php } ?>
										</select>
									</div>
									<div class="payment-adress">
										<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
										<button type="submit" name='submit' value="save" class="btn btn-primary ">SAVE</button>
										<button type="submit" name="submit" value="publish" class="btn btn-primary pull-right ">Publish</button>

									</div>


								</div>
							</div>

						</form>
					</div>


				</div>
			</div>

		</div>


		<script>
			function publish($id) {
				var val1 = $("form").serialize();
				$.ajax({
					type: "POST",
					url: "insert.php",
					data: val1,
					success: function(result) {
						alert(result);
					}
				});
			}
		</script>
