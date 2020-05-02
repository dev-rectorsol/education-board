

<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
		<div class="container-fluid">
				<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="sparkline13-list">
										<div class="sparkline13-hd">
												<div class="main-sparkline13-hd">
														<h1>All <span class="table-project-n">Student</span> Table</h1>
														<div class="add-product">
															<a href="<?php echo base_url('admin/student/'); ?>">Add New</a>
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
														<table id="table" data-toggle="table" data-pagination="true" data-search="true"
																  data-click-to-select="true" data-toolbar="#toolbar">
																<thead>
																	<tr>
																		<th data-field="state" data-checkbox="true"></th>
																		<th>Name</th>
																		<th>Email / Phone</th>
																		<th></th>
																		<th>Course</th>
																		<th>Date</th>
																		<th>Status</th>
																		<th data-field="action">Action</th>
																	</tr>
																</thead>
																<tbody>
																	<?php foreach($users as $value):
																			if (isJson($value['details'])) {
																				$details = json_decode($value['details']);
																			}
																		?>
																		<tr>
																			<td></td>
																			<td><?php echo $value['name']; ?></td>
																			<td><?php echo !empty($value['email']) ? $value['email'] : $value['phone'] ?></td>
																			<td><?php echo isset($details->city) ? $details->city : ''; ?></td>
																			<td><?php echo isset($details->request_course) ? $details->request_course : '';  ?></td>
																			<td><?php echo my_date_show($value['joindate']) ?></td>
																			<td><?php echo $value['name'] ?></td>
																			<td>
																				<button type="button" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
																				<button type="button" onclick="delete_detail(<?php echo $value['logid'] ?>)" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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
				window.location = "<?php echo base_url()?>admin/student/delete/" + id;
			}

		}
	}
</script>
