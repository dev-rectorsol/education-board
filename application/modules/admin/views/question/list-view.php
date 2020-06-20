

		<!-- Static Table Start -->
		<div class="data-table-area mg-b-15">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="sparkline13-list">
							<div class="sparkline13-hd">
								<div class="main-sparkline13-hd">
									<h1>Question Bank <span class="table-project-n">Data</span></h1>
									<div class="add-product">
										<a href="<?php echo base_url('admin/question/add'); ?>">Add New</a>
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
												<th>Question</th>
												<th>Type</th>
												<th>Mark</th>
												<th>Date</th>
												<th data-field="action">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($questions as $value): ?>
											<tr>
												<td></td>
												<td><?php echo $value['name'] ?></td>
												<td><?php echo $value['title'] ?></td>
												<td><?php echo removeHyphen($value['type']); ?></td>
												<td><?php echo $value['values']; ?></td>
												<td><?php echo my_date_show($value['created']) ?></td>
												<td>
													<a href="<?php echo base_url('admin/question/edit/').$value['qusid']; ?>"> <button type="button" class="btn btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> </a>
													<button type="button" onclick="delete_detail('<?php echo $value['qusid']; ?>')" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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
					window.location = "<?php echo base_url()?>admin/lesson/delete/" + id;
				}
			}
		</script>
