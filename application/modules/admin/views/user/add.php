
		<div class="container-fluid">

			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						<form id="addStudent" action="<?php echo base_url('admin/student/add')?>" method="POST">
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
								<div class="product-status-wrap drp-lst">

									<h4>Add Student </h4>
									<div class="form-group">
										<label class="login2">Student name</label>
										<input name="name" type="text" class="form-control" placeholder="Student Name" required>
									</div>

									<div class="form-group">
										<label class="login2">Email Adderess</label>
										<input name="email" type="text" class="form-control" placeholder="example@email.com" required>
									</div>

									<div class="form-group">
										<label class="login2">Phone</label>
										<input name="phone" type="text" class="form-control" placeholder="40100 54932" required>
									</div>
									<div class="form-group">
										<label class="login2">Bio</label>
										<textarea name="content" id="summernote1">Add a Student Details</textarea>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="product-status-wrap drp-lst">
									<div class="form-group">
										<label class="login2">Password</label>
										<input name="password" id="password" type="password" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<label class="login2">Conform Password</label>
										<input id="confirm_password" onchange="checkPass()" type="text" class="form-control" placeholder="conform Password">
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
											<option>Type City Name ...</option>
										</select>
									</div>
									<div class="form-group res-mg-t-15">
										<label class="login2">States</label>
										<select id="__states_select" class="select2_demo_2 form-control" name='states' data-placeholder="Choose a Category...">
											<option>Type States Name ...</option>
										</select>
									</div>
									<div class="payment-adress">
										<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
										<button type="submit" name='submit' id="submit" value="save" class="btn btn-primary ">SAVE</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script>

		$('#addStudent').on('submit', function(event){
			event.preventDefault();
			var email = $("input[name=email]").val();
			var phone = $("input[name=phone]").val();
			if(email == "" || phone == ""){
				toastr.error('Required!!', 'Email or Phone not Empty');
			}else{
				$.ajax({
					url: '<?php echo base_url('admin/student/check_exist'); ?>',
		      type: 'POST',
					data: {'email' : email, 'phone' : phone},
		      success: function(response){
						var data = JSON.parse(response);
						if (!data.status) {
							$('#addStudent').unbind('submit').submit();
						}else {
							toastr.error('Required!!', data.msg);
						}
		      }
				});
			}
		});
		function checkPass(){
         var pass  = document.getElementById("password").value;
         var rpass  = document.getElementById("confirm_password").value;
        if(pass != rpass){
					console.log(rpass+' '+pass);
            document.getElementById("submit").disabled = true;
            $('.missmatch').html("Password is not matching!! Try Again");
        }else{
            $('.missmatch').html("");
            document.getElementById("submit").disabled = false;
        }
			}
		</script>
