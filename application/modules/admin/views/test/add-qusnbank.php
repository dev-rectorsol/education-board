<div class="single-pro-review-area mt-t-30 mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="profile-info-inner">
          <div class="profile-img">
            <img src="<?php echo base_url( isset($image->thumb) ? $image->thumb : '' ); ?>" alt="">
          </div>
          <div class="profile-details-hr">
            <div class="row">
              <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <div class="address-hr">
                  <p><b>Name</b><br> <?php echo $test->title; ?></p>
                </div>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <div class="address-hr">
                  <a href="<?php echo base_url('admin/test/edit/').$test->testid; ?>" class="btn btn-xs btn-default pull-right"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <div class="profile-info-inner">
          <form action="<?php echo base_url('admin/test/add_qusnbank'); ?>" method="post">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group-inner">
                    <div class="row">
                      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label for="">Search Question Content</label>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                          <input type="hidden" name="testid" value="<?php echo $test->testid; ?>">
                          <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                          <button type="submit" name="submit" value="publish" class="btn btn-primary pull-right ">Save</button>
                      </div>
                    </div>
                  </div>
                  <div id="searchfield" class="form-group-inner">
                    <select id="__qusnbank_select" class="select2_demo_2 form-control">
                      <option value="">Type here..</option>
                    </select>
                  </div>

              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="review-content-section">
                  <div id="bucket" class="chat-discussion" style="height: auto">
                    <?php $curriculum = json_decode($test->curriculum); ?>
                    <?php foreach ($curriculum as $value): ?>
                      <div class="chat-message">
                        <div class="message">

                          <a class="message-author" href="#"> <?php echo $value->name; ?> - <?php echo substr(strip_tags($value->title), 0, 60); ?></a>
                          <input type="hidden" name="questions[]" value="<?php echo $value->qusid; ?>">
                          <a class="btn btn-xs btn-default pull-right" onclick="__curriculum_remove(this)"><i class="fa fa-trash"></i></a>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
