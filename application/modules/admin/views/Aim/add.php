

		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="product-status-wrap drp-lst">
								<form action="<?php echo base_url('admin/Aim/Add')?>" method="POST">
									<h4>Add Aim </h4>
									<div class="form-group">
										<input name="name" type="text" class="form-control" placeholder="Aim Title">
									</div>
									<div class="payment-adress">
										<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
										<button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
									</div>


								</form>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="sparkline13-list">
								<div class="sparkline13-hd">
									<div class="main-sparkline13-hd">
										<h1>Aim <span class="table-project-n">Data</span> List</h1>
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
													<th data-field="action">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($aim as $value): ?>
												<tr>
													<td></td>
													<td><?php echo $value['title'] ?></td>
													<td>
														<a href="#"> <button type="button" class="btn btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> </a>
														<button type="button" onclick="delete_detail('<?php echo $value['id']; ?>')" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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
		</div>



		<script>
			function delete_detail(id) {
				var del = confirm("Do you want to Delete");
				if (del == true) {
					var sureDel = confirm("Are you sure want to delete");
					if (sureDel == true) {
						window.location = "<?php echo base_url()?>admin/aim/delete/" + id;
					}

				}
			}
		</script>
