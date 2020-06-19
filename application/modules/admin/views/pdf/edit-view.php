
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="row">
        <form action="<?php echo base_url('admin/pdf/update')?>" method="POST">
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="product-status-wrap drp-lst">
              <h4>Edit Pdf</h4>
              <div class="form-group">
                <label class="login2">PDF Name</label>
                <input name="name" type="text" class="form-control" placeholder="PDF Lesson Name" value="<?php echo $data->name; ?>">
              </div>
              <div class="form-group">
                <label class="login2">Slug</label>
                <input name="slug" type="text" class="form-control" placeholder="slug" value="<?php echo $data->slug; ?>">
              </div>
              <div class="form-group">
                <label class="login2">Document Description</label>
                <textarea name="description" id="summernote1"><?php echo $data->description; ?></textarea>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="product-status-wrap drp-lst">
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
              <hr>
              <div class="form-group res-mg-t-15">
                <label class="login2">Add PDF File</label>
                <select class="select2_demo_2 form-control" id="getDocFile" name='pdf[]' data-placeholder="Choose pdf a files..." multiple="multiple"></select>
              </div>
            </div>
            <div class="product-status-wrap drp-lst">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="review-content-section">
                    <h4>List of Added PDF</h4>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="hpanel">
                          <div class="panel-body">
                            <div class="text-left content-box">
                              <?php foreach ($pdf as $key => $value): $file =  json_decode($value['details']);?>
                                <p class="small mg-t-box">
                                  <a target="_blank" class="media" href="<?php echo base_url($file->dirname.'/'.$file->basename) ?>"><b class="m-b-xs"><?php echo $value['name'] ?></b></a>
                                  <button type="button" class="btn btn-default pull-right" name="button" onclick="pdfRemove('<?php echo $value['docid']; ?>')"><i class="fa fa-trash"></i></button>
                                </p>
                              <?php endforeach; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  function pdfRemove(id){
    var del = confirm("Do you want to Remove");
    if (del == true) {
      var sureDel = confirm("Are you sure want to Remove");
      if (sureDel == true) {
        window.location = "<?php echo base_url()?>admin/pdf/pdfRemove/" + id;
      }

    }
  }

</script>
