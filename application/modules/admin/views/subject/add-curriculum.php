<?php //pre($course); ?>

<div class="single-pro-review-area mt-t-30 mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="profile-info-inner">
          <div class="profile-details-hr">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                <div class="address-hr">
                  <p><b>Name</b><br> <?php echo $subject->name; ?></p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="address-hr">
                  <a href="#"><i class="fa fa-certificate" aria-hidden="true"></i></a>
                  <?php if ($subject->is_publish): ?>
                    <h3>Publish</h3>
                  <?php else: ?>
                    <h3>Draft</h3>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="address-hr">
                  <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                  <p><?php echo my_date_show_time($subject->created_at); ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="profile-info-inner">
          <form action="<?php echo base_url('admin/subject/add_curriculum'); ?>" method="post">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group-inner">
                    <div class="row">
                      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label for="">Search Curriculum Content</label>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                          <input type="hidden" name="subject_id" value="<?php echo $subject->subject_id; ?>">
                          <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                          <button type="submit" name="submit" value="publish" class="btn btn-primary pull-right ">Save</button>
                      </div>
                    </div>
                  </div>
                  <div id="searchfield" class="form-group-inner">
                    <select id="__curriculum_select" class="select2_demo_2 form-control">
                      <option value="">Type here..</option>
                    </select>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="review-content-section">
                  <div id="bucket" class="chat-discussion" style="height: auto">
                    <?php foreach ($curriculum as $value): ?>
                      <div class="chat-message">
                        <div class="message">
                          <a class="message-author" href="#"> <?php echo $value['name']; ?></a>
                          <input type="hidden" name="subject[]" value="<?php echo $value['lesson_id']; ?>">
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
