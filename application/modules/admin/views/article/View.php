

<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
		<div class="container-fluid">
				<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="sparkline13-list">
										<div class="sparkline13-hd">
												<div class="main-sparkline13-hd">
														<h1>Projects <span class="table-project-n">Data</span> Table</h1>
														<div class="add-product">
															<a href="<?php echo base_url('admin/Article/'); ?>">Add New</a>
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
																		<th>Title</th>
																		<th>Category</th>
																		<th>Status</th>
																		<th>Created</th>
																		<th>Date</th>
																		<th data-field="action">Action</th>
																	</tr>
																</thead>
																<tbody>
																	<?php foreach ($articles as $value): ?>
																		<tr>
																			<td></td>
																			<td><?php echo $value['title'] ?></td>
																			<td><?php ?></td>
																			<td>
																				<?php if ($value['is_publish']): ?>
																					<span>Publish</span>
																				<?php else: ?>
																					<button class="btn btn-default">Draft</button>
																				<?php endif ?>
																			</td>
																			<td><?php echo $value['name'] ?></td>
																			<td><?php echo my_date_show($value['created_at']) ?></td>
																			<td>
																				<a href="<?php echo base_url('admin/article/edit/').$value['postid']; ?>"> <button type="button" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> </a>
																				<button type="button" onclick="delete_detail('<?php echo $value['postid'] ?>')" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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
				window.location = "<?php echo base_url()?>admin/Article/Delete/" + id;
			}

		}
	}
</script>
