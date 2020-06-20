
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						<form action="<?php echo base_url('admin/question/save')?>" method="POST">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="product-status-wrap drp-lst">
									<h4>Add Question</h4>
									<div class="form-group">
										<label class="login2">Question Name</label>
										<input name="name" type="text" class="form-control" placeholder="Test Name e.g. NTPC Qus#1">
									</div>
									<div class="form-group">
										<label class="login2">Question</label>
										<textarea name="title" id="summernote1">Add a question here</textarea>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="product-status-wrap drp-lst">
									<div class="payment-adress">
										<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
										<button type="submit" name='submit' value="save" class="btn btn-primary ">SAVE</button>
									</div>
									<hr>
									<div class="form-group">
										<label class="login2">Marks</label>
										<input type="text" class="form-control" name="values" placeholder="Enter Question Marks">
									</div>
									<div class="form-group">
										<label class="login2">Question Type</label>
										<select class="form-control" name="type">
											<option selected>Select Question Type</option>
											<option value="dichotomous">Dichotomous</option>
											<option value="multiple-choice">Multiple Choice</option>
											<option value="open-ended">Open Ended</option>
											<option value="image-question" disabled>Image Question</option>
										</select>
									</div>
									<table class="type multiple-choice" style="display: none;">
												<thead>
													<tr>
														<th width="5%">#</th>
														<th width="10%">Is Currect</th>
														<th width="80%">Multiple Choice</th>
														<th width="5%" ><span class="input-group-btn"><button type="button" class="btn btn-xs btn-success extra-fields"><i class="fa fa-plus" aria-hidden="true"></i></button></span></th>
													</tr>
												</thead>
												<tbody class="option_dynamic">
													<tr class="ques_r">
														<td class="count">1</td>
														<td>
															<div class="form-group">
																	<input name="currect" class="form-control" type="radio" value="1">
															</div>
														</td>
														<td>
															<div class="form-group">
																	<input name="option[]" class="form-control" type="text" placeholder="Enter option here...">
															</div>
														</td>
														<td><button type="button" class="btn-sm btn-danger remove-field"><i class="fa fa-times" aria-hidden="true"></i></button></td>
													</tr>
												</tbody>
											</table>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
