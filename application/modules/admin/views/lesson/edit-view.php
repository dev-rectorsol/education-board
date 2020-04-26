
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="row">
        <form action="<?php echo base_url('admin/lesson/update')?>" method="POST">
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="product-status-wrap drp-lst">
              <h4>Edit Lesson</h4>
              <div class="form-group">
                <label class="login2">Lesson Name</label>
                <input name="name" type="text" class="form-control" placeholder="Subject Name" value="<?php echo $data->name; ?>">
              </div>
              <div class="form-group">
                <label class="login2">Lesson Description</label>
                <textarea name="description" id="summernote1"><?php echo $data->description; ?></textarea>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="product-status-wrap drp-lst">
              <?php if (!empty($image)): ?>
                <span id="addfeaturepreview">
                  <img src="<?php echo base_url().$image->thumb; ?>" alt="">
                  <input type="hidden" name="featureImage" value="<?php echo $image->thumb; ?>">
                </span>
                <?php else: ?>
                  <span id="addfeaturepreview">
									</span>
              <?php endif; ?>
              <button id="removepreview" type="button" class="btn btn-link">remove</button>
              <button id="addfeatureimage" type="button" class="btn btn-link" name="button">change feature image</button>

              <div class="form-group">
                <label class="login2">Create Date:</label>
                <span><?php echo my_date_show_time($data->created_at); ?></span>
              </div>
              <div class="form-group">
                <label class="login2">Status:</label>
                <?php if ($data->is_publish): ?>
                  <span>Publish</span>
                <?php else: ?>
                  <span>Save in Draft</span>
                <?php endif; ?>
              </div>
              <div class="form-group">
                <label class="login2">Course Category</label>
                <select class="select2_demo_2 form-control" name='category[]' data-placeholder="Choose a Category..." multiple="multiple">
                  <?php foreach($category as $row){ ?>
                    <?php if(in_array($row['id'], $indexcategory)): ?>
                      <option selected value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?> </option>
                    <?php else: ?>
                      <option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?> </option>
                    <?php endif; ?>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label class="login2">Course Tag</label>
                <select class="select2_demo_2 form-control" name='tag[]' data-placeholder="Choose a Tags..." multiple="multiple">
                  <?php foreach($tag as $row){ ?>
                    <?php if(in_array($row['id'], $indextags)): ?>
                      <option selected value="<?php echo $row['id'] ?>"> <?php echo $row['title'] ?> </option>
                    <?php else: ?>
                      <option value="<?php echo $row['id'] ?>"> <?php echo $row['title'] ?> </option>
                    <?php endif; ?>
                  <?php } ?>
                </select>
              </div>
              <div class="payment-adress">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                <input type="hidden" name="lesson_id" value="<?php echo $data->lesson_id; ?>">
                <?php if ($data->is_publish): ?>
                  <button type="submit" name='submit' value="save" class="btn btn-primary pull-left ">Draft</button>
                <?php else: ?>
                  <button type="submit" name='submit' value="publish" class="btn btn-primary pull-left ">Publish</button>
                <?php endif; ?>
                <button type="submit" name="submit" value="update" class="btn btn-primary">Update</button>
              </div>
            </div>
            <div class="product-status-wrap drp-lst">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="review-content-section">
                    <div class="row">
                    <?php foreach ($video as  $value): ?>
                      <div class="col-lg-12">
                        <div class="hpanel widget-int-shape responsive-mg-b-30">
                          <div class="panel-body">
                            <div class="text-left content-box">
                                <div class="m icon-box">
                                  <video class="afterglow" width="250" height="180">
                                    <source type="video/<?php echo $value['videotype']; ?>" src="<?php echo base_url($value['url']) ?>" />
                                  </video>
                                </div>
                                <p class="small mg-t-box">
                                  <b class="m-b-xs"><?php echo $value['name'] ?></b>
                                  <button type="button" class="btn btn-default pull-right" name="button" onclick="lactureRemove('<?php echo $value['videoid']; ?>')"><i class="fa fa-trash"></i></button>
                                </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
              </div>
              <span id="addlecturepreview"></span>
              <button id="lectureremovepreview" type="button" class="btn btn-link hide">remove</button>
              <button id="addlectureimage" type="button" class="btn btn-link" name="button">Add Video file</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  function lactureRemove(id){
    var del = confirm("Do you want to Remove");
    if (del == true) {
      var sureDel = confirm("Are you sure want to Remove");
      if (sureDel == true) {
        window.location = "<?php echo base_url()?>admin/lesson/lactureRemove/" + id;
      }

    }
  }

</script>
