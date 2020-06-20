<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="sparkline13-list">
					<div class="sparkline13-hd">
						<div class="main-sparkline13-hd">
							<h1>Class <span class="table-project-n">Room</span> List</h1>
							<div class="add-product">
								<a class="Primary mg-b-10" href="<?php echo base_url('admin/classroom/new') ?>">Add Class Room</a>
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
										<th>All students</th>
										<th>Status</th>
										<th>Type</th>
										<th>Created</th>
										<th data-field="action">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($classroom as $value): ?>
									<tr>
										<td></td>
										<td><?php echo $value['name']; ?></td>
										<td>
											<?php echo $value['students']; ?>
										</td>
										<td>
											<?php if ($value['is_publish']): ?>
											<span>OPEN</span>
											<?php else: ?>
											<span>CLOSE</span>
											<?php endif; ?>
										</td>
										<td><?php echo ucfirst($value['course_type']); ?></td>
										<td><?php echo my_date_show($value['created']) ?></td>
										<td class="">
											<a href="<?php echo base_url('admin/classroom/edit/').$value['course_id']; ?>"> <button type="button" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> </a>
											<a href="<?php echo base_url('admin/classroom/curriculum/').$value['course_id']; ?>">
												<button type="button" class="btn btn-default" name="button">Add student</button>
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
<script>
	function delete_detail(id) {
		var del = confirm("Do you want to Delete");
		if (del == true) {
			var sureDel = confirm("Are you sure want to delete");
			if (sureDel == true) {
				window.location = "<?php echo base_url()?>admin/course/delete/" + id;
			}
		}
	}
</script>
