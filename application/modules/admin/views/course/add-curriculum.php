<?php //pre($course); ?>

<div class="single-pro-review-area mt-t-30 mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="profile-info-inner">
          <div class="profile-img">
            <img src="<?php echo base_url( isset($image->thumb) ? $image->thumb : '' ); ?>" alt="">
          </div>
          <div class="profile-details-hr">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                <div class="address-hr">
                  <p><b>Name</b><br> <?php echo $course->name; ?></p>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                  <p><b>Category</b><br>
                    <?php foreach ($indexcategory as $value): ?>
                    <?php echo $this->common_model->select_category_name_by_id($value); ?>
                    <?php endforeach; ?></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="address-hr">
                  <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                  <h3><?php echo $course->review; ?></h3>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="address-hr">
                  <a href="#"><i class="fa fa-certificate" aria-hidden="true"></i></a>
                  <?php if ($course->is_publish): ?>
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
                  <p><?php echo my_date_show_time($course->created); ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="profile-info-inner">
          <form action="<?php echo base_url('admin/course/add_curriculum'); ?>" method="post">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group-inner">
                    <div class="row">
                      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label for="">Search Curriculum Content</label>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                          <input type="hidden" name="course_id" value="<?php echo $course->course_id; ?>">
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
                          <input type="hidden" name="subject[]" value="<?php echo $value['subid']; ?>">
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
<!-- select2 JS
  ============================================ -->
  <script src="<?php echo base_url('optimum')?>/js/select2/select2.full.min.js"></script>
  <script src="<?php echo base_url('optimum')?>/js/select2/select2-active.js"></script>
<script type="text/javascript">

$('#__curriculum_select').select2({
  ajax: {
    url: '<?php echo base_url('admin/subject/get_subject'); ?>',
    type: "POST",
    dataType: 'json',
    data: function (params) {
      var query = {
        search: params.term,
        type: 'public'
      }
      return query;
    },
    processResults: function (data) {
       return {
         results: data
       };
     },
    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
  }
});
$("#__curriculum_select").on('change', function(e) {
  var data = $("#__curriculum_select").select2("data", e.choice);
  for(i = 0; i < data.length; i++) {
    var id = data[i].id;
    var text = data[i].text;
      $(`<div class="chat-message">
        <div class="message">
          <a class="message-author" href="#"> `+text+` </a>
          <input type="hidden" name="subject[]" value="`+id+`">
          <a class="btn btn-xs btn-default pull-right" onclick="__curriculum_remove(this)"><i class="fa fa-trash"></i></a>
        </div>
      </div>` )
      .appendTo( "#bucket" );
   }
});

function __curriculum_remove(event){
  $(event).parent().parent().remove();
}
</script>
