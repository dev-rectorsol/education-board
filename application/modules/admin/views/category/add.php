

		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="product-status-wrap drp-lst">
								<form action="<?php echo base_url('admin/category/add')?>" method="POST">
									<h4>Add Category </h4>
									<div class="form-group">
										<label for="">Name</label>
										<input name="name" type="text" class="form-control" placeholder="Name" required>
									</div>
									<div class="form-group">
										<label for="">Parent</label>
										<select name="parent" class="form-control">
											<option selected value="">none</option>
											<?php foreach ($category as $value): ?>
											<option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="form-group">
										<label for="">Display Icon</label>
										<button type="button" id='addIcon' class="btn btn-primary" name="button">Add Icon</button>
										<div id="icon_view"></div>
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
										<h1>Category <span class="table-project-n">Data</span> List </h1>
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
													<th>Parent</th>
													<th>Icon</th>
													<th data-field="action">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($category as $value): ?>
												<tr>
													<td></td>
													<td><?php echo $value['name'] ?></td>
													<td>
														<?php if ($value['parent'] != null): ?>
														<span><?php echo $this->common_model->select_category_name_by_id($value['parent']); ?></span>
														<?php else: ?>
														<span>Root</span>
														<?php endif; ?>
													</td>
													<td>
														<span class="<?php echo $value['icon'] ?>"></span>
													</td>
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

<style media="screen">
#icon_view{
	display: none;
	height: 156px;
	overflow-y: scroll;
	overflow-x: hidden;
}
</style>
		<script>
			function delete_detail(id) {
				var del = confirm("Do you want to Delete");
				if (del == true) {
					var sureDel = confirm("Are you sure want to delete");
					if (sureDel == true) {
						window.location = "<?php echo base_url()?>admin/category/delete/" + id;
					}

				}
			}
		</script>

		<script type="text/javascript">
			$(document).ready(function(){
				$('#addIcon').on('click', function(){
					$.ajax({
						url:'<?php echo base_url('admin/category/icons') ?>',
						type: 'POST',
			      success: function(response){
			        $("#icon_view").show().html(response);
			      }
					});
				});
			});
		</script>
