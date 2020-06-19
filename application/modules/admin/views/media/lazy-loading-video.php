<div class="single-pro-review-area mt-t-30 mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="product-payment-inner-st">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <ul class="breadcome-menu pull-left">
                  <li>
                    <a href="<?php echo base_url('admin/media/add'); ?>"><button type="button" name="button" class="btn btn-primary">Add New</button></a>
                  </li>
                  <li>
                    <select class="form-control" name="mediatype">
                      <option value="image">Images</option>
                      <option selected value="video">Videos</option>
                      <option value="other">Other</option>
                    </select>
                  </li>
                  <li>
                    <button type="button" name="refresh" class="btn btn-default btn-md" title="Refrash"> <i class="fa fa-refresh" aria-hidden="true"></i> </button>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="breadcome-heading pull-right">
                  <input type="text" id="input" placeholder="Search..." class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="review-content-section text-center">

                    <button type="button" name="image" class="btn btn-outline-info" id="loadmore"><i class="fa fa-refresh" aria-hidden="true"></i> Load More</button>
                  </div>
                </div>
              </div>
        </div>
    </div>
  </div>
</div>
<style media="screen">
.blur-up {
  -webkit-filter: blur(5px);
  filter: blur(5px);
  transition: filter 400ms, -webkit-filter 400ms;
}

.blur-up.lazyloaded {
  -webkit-filter: blur(0);
  filter: blur(0);
}

</style>
<!-- Video gallery -->
<script src="<?php echo base_url('optimum/js/google.lazy.load/lazysizes.min.js') ?>" charset="utf-8"></script>
<script type="text/javascript">
var load = $("#load");
var refresh = $('button[name=refresh]');
var counter = 0;
var flickerAPI = "<?php echo base_url(FILE_JSON_INFO) ?>";
var refraceAPI = "<?php echo base_url('admin/media/get_file_refrace') ?>";
var video = ['mp4', 'mkv'];

$(document).ready(function(){
  $("select[name=mediatype]").on('change', function(){
    var type = $(this).val();
    if (type === 'image') {
      window.location = "<?php echo base_url('admin/media') ?>"
    }
  });
});

</script>
