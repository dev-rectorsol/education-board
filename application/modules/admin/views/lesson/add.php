
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						<form action="<?php echo base_url('admin/lesson/add')?>" method="POST">
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
								<div class="product-status-wrap drp-lst">
									<h4>Add Lesson</h4>
									<div class="form-group">
										<label class="login2">Lesson Name</label>
										<input name="name" type="text" class="form-control" placeholder="Lesson Name">
									</div>
									<div class="form-group">
										<label class="login2">Lesson Description</label>
										<textarea name="description" id="summernote1">Add a Description here</textarea>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="product-status-wrap drp-lst">
									<span id="addfeaturepreview"></span>
									<button id="removepreview" type="button" class="btn btn-link hide">remove</button>
									<button id="addlectureimage" type="button" class="btn btn-link" name="button">Add Video file</button>
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
