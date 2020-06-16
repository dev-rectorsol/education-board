
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						<form id="updateStudent" action="<?php echo base_url('admin/student/update')?>" method="POST">
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
								<div class="product-status-wrap drp-lst">

									<h4>Edit Student (<?php echo $user->logid; ?>) </h4>
									<div class="form-group">
										<label class="login2">Student name</label>
										<input name="name" type="text" class="form-control" placeholder="Student Name" required value="<?php echo $user->name; ?>">
									</div>

									<div class="form-group">
										<label class="login2">Email Adderess</label>
										<input name="email" type="text" class="form-control" placeholder="example@email.com" required value="<?php echo $user->email; ?>">
									</div>

									<div class="form-group">
										<label class="login2">Phone</label>
										<input name="phone" type="text" class="form-control" placeholder="40100 54932" required value="<?php echo $user->phone; ?>">
									</div>
									<div class="form-group">
										<label class="login2">Bio</label>
										<textarea name="content" id="summernote1"><?php echo isset($meta->bio) ? $meta->bio: "about the student...";   ?></textarea>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="product-status-wrap drp-lst">
									<div class="form-group">
										<label class="login2">Change Password</label>
										<input name="password" id="password" type="password" class="form-control" placeholder="Password">
									</div>
									<span class="missmatch"></span>
									<div class="form-group res-mg-t-15">
										<label class="login2">Role</label>
										<select class="select2_demo_2 form-control" name='role' data-placeholder="Choose a Category...">
											<option value="">Select User Role</option>
											<option value="2" selected>Student</option>
											<option value="1">Admin</option>
										</select>
									</div>
									<div class="form-group res-mg-t-15">
										<label class="login2">City</label>
										<select id="__city_select" class="select2_demo_2 form-control" name='city' data-placeholder="Choose a City...">
											<option><?php echo isset($meta->city) ? $meta->city: "Type City Name ...";   ?></option>
										</select>
									</div>
									<div class="form-group res-mg-t-15">
										<label class="login2">States</label>
										<select id="__states_select" class="select2_demo_2 form-control" name='states' data-placeholder="Choose a Category...">
											<option><?php echo isset($meta->states) ? $meta->states: "Type State Name ...";   ?></option>
										</select>
									</div>
									<div class="form-group res-mg-t-15">
										<label>Join Date: <?php echo my_date_show($user->joindate); ?></label>
									</div>
									<div class="payment-adress">
										<input type="hidden" name="user_id" value="<?php echo $user->logid; ?>">
										<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
										<button type="submit" name='submit' id="submit" value="save" class="btn btn-primary ">Update</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
