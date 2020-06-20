
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<form id="addClass"  action="<?php echo base_url('admin/classroom/add')?>" method="POST">
			<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<div class="product-status-wrap drp-lst">

							<h4>Add Class Room</h4>

							<div class="form-group">
								<label class="login2">Course Name</label>
								<select class="select2_demo_2 form-control" name="course_id" id="classCourseName" required>
									<option>Type course name ...</option>
								</select>
							</div>

							<div class="form-group">
								<label class="login2">Add Students</label>
								<select class="select2_demo_2 form-control" name="users[]" id="studentInClssRoom" required  multiple="multiple" placeholder="Select Students ... ">
								</select>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="product-status-wrap drp-lst">
							<div class="payment-adress">
								<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
								<button type="submit" name="submit" value="publish" class="btn btn-primary pull-right ">Publish</button>
							</div>
						</div>
					</div>
			</div>
		</form>
		</div>
	</div>
</div>
