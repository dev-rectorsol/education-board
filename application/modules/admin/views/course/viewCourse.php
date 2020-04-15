
		<!-- Static Table Start -->
		<div class="data-table-area mg-b-15">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="sparkline13-list">
							<div class="sparkline13-hd">
								<div class="main-sparkline13-hd">
									<h1>Course <span class="table-project-n">Data</span> List</h1>
									<div class="add-product">
										<a href="<?php echo base_url('admin/Course/'); ?>">Add New</a>
									</div>
								</div>
							</div>
							<div class="sparkline13-graph">
								<div class="datatable-dashv1-list custom-datatable-overright">
									<div id="toolbar">
										<select class="form-control dt-tb">
											<option value="">Delete All</option>
											<option value="all">Save To Draft</option>
										</select>
									</div>
									<table id="table" data-toggle="table" data-pagination="true" data-search="true" data-click-to-select="true" data-toolbar="#toolbar">
										<thead>
											<tr>
												<th data-field="state" data-checkbox="true"></th>
												<th>Name</th>
												<th>Category</th>
												<th>Status</th>
												<th>Created</th>
												<th>Date</th>
												<th data-field="action">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($course as $value): ?>
											<tr>
												<td></td>
												<td><?php echo $value['name'] ?></td>
												<td>
													<?php //foreach ($indexcategory as $value): ?>
                      		<?php //echo $this->common_model->select_category_name_by_id($value); ?>
                    			<?php //endforeach; ?>
												</td>
												<td>
													<?php if ($value['is_publish']): ?>
													<span>Publish</span>
													<?php else: ?>
													<span>Draft</span>
													<?php endif; ?>
												</td>
												<td><?php echo $value['name'] ?></td>
												<td><?php echo my_date_show($value['created']) ?></td>
												<td class="">
													<button type="button" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
													<button type="button" onclick="delete_detail(<?php echo $value['course_id'] ?>)" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
													<a href="<?php echo base_url('admin/course/curriculum/').$value['course_id']; ?>">
														<button type="button" class="btn btn-default" name="button">Add Curriculum</button>
													</a>
												</td>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Static Table End -->

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
