
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="row">
        <form action="<?php echo base_url('admin/test/update')?>" method="POST">
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="product-status-wrap drp-lst">
              <h4>Edit Test</h4>
              <div class="form-group">
                <label class="login2">Test Title</label>
                <input name="title" type="text" class="form-control" placeholder="Test Title" value="<?php echo $data->title; ?>">
              </div>
              <div class="form-group">
                <label class="login2">Slug</label>
                <input name="slug" type="text" class="form-control" placeholder="slug" value="<?php echo $data->slug; ?>">
              </div>
              <div class="form-group">
                <label class="login2">Test Description</label>
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
                <span><?php echo my_date_show_time($data->created); ?></span>
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
                <input type="hidden" name="testid" value="<?php echo $data->testid; ?>">
                <?php if ($data->is_publish): ?>
                  <button type="submit" name='submit' value="save" class="btn btn-primary pull-left ">Draft</button>
                <?php else: ?>
                  <button type="submit" name='submit' value="publish" class="btn btn-primary pull-left ">Publish</button>
                <?php endif; ?>
                <button type="submit" name="submit" value="update" class="btn btn-primary">Update</button>
              </div>
              <hr>
              <div class="form-group">
                <label class="login2">Duration (min)</label>
                <input type="text" class="form-control" name="duration" placeholder="Test Duration in minutes" value="<?php echo $data->duration; ?>">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
