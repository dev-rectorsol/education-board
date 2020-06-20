		<div class="breadcome-area">
		    <div class="container-fluid">
		        <div class="row">
		            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                <div class="breadcome-list">
		                    <div class="row">
		                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                            <div class="breadcome-heading">
		                                <form role="search" class="sr-input-func">
		                                    <input type="text" placeholder="Search..." class="search-int form-control">
		                                    <a href="#"><i class="fa fa-search"></i></a>
		                                </form>
		                            </div>
		                        </div>
		                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                            <ul class="breadcome-menu">
		                                <li><a href="#">Home</a> <span class="bread-slash">/</span>
		                                </li>
		                                <li><span class="bread-blod"><?php echo	$page ?></span>
		                                </li>
		                            </ul>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		</div>
		<div class="container-fluid">

		    <div class="row">
		        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		            <div class="row">

		                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                    <div class="product-status-wrap drp-lst">
		                        <div class="widget-content nopadding">
		                            <div class="form-group ">
		                                <label class="control-label ">Name</label>

		                                <input type="text" class="form-control" name="name"
		                                    value="<?php echo $course[0]['name'] ?>" id="required">

		                            </div>
		                            <div class="form-group">
		                                <label class="control-label ">Description</label>

		                                <textarea name="description"
		                                    class="summernote6"><?php echo $course[0]['description'] ?></textarea>


		                            </div>
		                        </div>
		                        
		                    </div>
		                    <div id="<?php echo $course[0]['course_id'] ; ?>" class="modal   fade" role="dialog">
		                        <div class="modal-dialog" role="document ">
		                            <div class="modal-content">
		                                <form class="form-horizontal" method="post"
		                                    action="<?php echo base_url('admin/Course/AddSubject/').$course[0]['course_id'] ?>">
		                                    <div class="modal-header header-color-modal bg-color-1 ">
		                                        <h6 class="modal-title">Add Subject</h6>
		                                        <div class="modal-close-area modal-close-df">
		                                            <a class="close" data-dismiss="modal" href="#"><i
		                                                    class="fa fa-close"></i></a>
		                                        </div>
		                                    </div>
		                                    <div class="modal-body">
		                                        <div class="widget-content ">
		                                            <div class="form-group ">
		                                                <label class="control-label ">Course Name</label>

		                                                <input type="text" class="form-control" disabled='true' name="name"
		                                                    value="<?php echo $course[0]['name'] ?>">

		                                            </div>
		                                            <div class="form-group ">
		                                                <label class="control-label ">Add Subject</label>
		                                                <select class="form-control select2_demo_2 " name='subject[]'
		                                                    style="width: 100%;" data-placeholder="Choose a subject..."
		                                                    multiple="multiple">
		                                                    <?php foreach($subject as $row){ ?>
		                                                    <option value="<?php echo $row['subject_id'] ?>">
		                                                        <?php echo $row['name'] ?> </option>
		                                                    <?php } ?>
		                                                </select>

		                                            </div>

		                                        </div>
		                                    </div>
		                                    <div class="modal-footer">
		                                        <input type="hidden"
		                                            name="<?php echo $this->security->get_csrf_token_name();?>"
		                                            value="<?php echo $this->security->get_csrf_hash();?>">
		                                        <input type="submit" value="Add Subject" class="btn btn-primary">
		                                        <a data-dismiss="modal" class="btn" href="#">Cancel</a>
		                                    </div>
		                                </form>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                        <div class="row">

		                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <div class="product-status-wrap drp-lst">
                           
                           <p>
                           <table>
                           <caption>
										 <h4 >Subject List</h4>
									</caption>
									<tr>
										<th>S.No</th>
										<th>Id</th>

										<th>Name</th>
										
										<th>Setting</th>
									</tr>
									<?php 
							$str=array('primary','info','warning','success','danger');
							  $j=1;
							foreach($sub as $row) { $i=array_rand($str);?>
									<tr><td> <?php echo $j ?></td>
                                    <td> <?php echo $row['id'] ?></td>
                                    <td><span class="label label-<?php echo $str[$i] ?>">#<?php echo $row['name'] ?></span></td>
                                    <td> 
											<a title="Trash" class="pd-setting-ed"
												onclick="delete_detail(<?php echo $row['id'] ;?>)"><i class="fa fa-trash-o"
													aria-hidden="true"></i></a></td>
                                    </tr>
                                    <?php   $j++ ; 
                                } ?>

                                </table>
								</p>
                           <a data-target="<?php echo '#'.$course[0]['course_id']; ?>" class="btn btn-primary"
		                            data-toggle="modal" data-original-title="Add">Add Subject</a>                                     
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
						window.location = "<?php echo base_url()?>admin/Course/DeleteSubject/" + id;
					}

				}
			}
		</script>