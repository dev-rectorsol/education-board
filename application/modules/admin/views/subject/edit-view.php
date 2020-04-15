
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="row">
        <form action="<?php echo base_url('admin/Subject/update')?>" method="POST">
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="product-status-wrap drp-lst">
              <h4>Edit Subject</h4>
              <div class="form-group">
                <label class="login2">Subject Name</label>
                <input name="name" type="text" class="form-control" placeholder="Subject Name" value="<?php echo $data->name; ?>">
              </div>
              <div class="form-group">
                <label class="login2">Subject Description</label>
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
                <input type="hidden" name="subject_id" value="<?php echo $data->subject_id; ?>">
                <?php if ($data->is_publish): ?>
                  <button type="submit" name='submit' value="save" class="btn btn-primary pull-left ">Draft</button>
                <?php else: ?>
                  <button type="submit" name='submit' value="publish" class="btn btn-primary pull-left ">Publish</button>
                <?php endif; ?>
                <button type="submit" name="submit" value="update" class="btn btn-primary">Update</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
