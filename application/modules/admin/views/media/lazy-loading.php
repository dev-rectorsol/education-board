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
                      <option selected value="image">Images</option>
                      <option value="video">Videos</option>
                    </select>
                  </li>
                  <li>
                  <a href="<?php echo base_url('admin/media/others'); ?>">  <button type="button" name="refresh" class="btn btn-default btn-md" title="Refrash"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF Document </button></a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="breadcome-heading pull-right">
                  <input type="text" placeholder="Search..." class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="review-content-section text-center">
                    <div class="image-grid-row">
                      <?php if (isset($file)): ?>
                        <section id="load" class="__file-media">
                          <?php foreach ($file as $key => $value): ?>
                            <img data-sizes="auto" data-src="<?php echo base_url($value->dirname.'/'.$value->basename); ?>" class="lazyload" alt="<?php echo $value->filename ?>">

                            <?php $postID = $key+1; endforeach; ?>
                          </section>
                          <div lastID="<?php echo $postID; ?>" name="image" id="loadmore" style="display: none;">
                            <img src="<?php echo base_url('assets/images/preloder-0.2s-200px.svg') ?>" width="60" height="40" alt="">
                          </div>
                          <?php else: ?>
                            <p class="text-center">File not Found.</p>
                      <?php endif; ?>
                    </div>
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
<script src="<?php echo base_url('optimum/js/google.lazy.load/lazysizes.min.js') ?>" charset="utf-8"></script>
<script type="text/javascript">

$(document).ready(function(){
  var load = $("#load");
  var flickerAPI = "<?php echo base_url(FILE_JSON_INFO) ?>";
  var refraceAPI = "<?php echo base_url('admin/media/get_gallery') ?>";
  var image = ['png', 'jpg', 'jpeg'];


    $(window).scroll(function(){
        var lastID = $('#loadmore').attr('lastID');
        if(($(window).scrollTop() == $(document).height() - $(window).height()) && (lastID != 0)) {
            $.ajax({
                type:'POST',
                url:refraceAPI,
                data:'id='+lastID,
                beforeSend:function(){
                    $('#loadmore').show();
                },
                success:function(data){
                  var data = JSON.parse(data);
                    if (!data.is_end) {
                      $(load).append(data.html);
                      $(load).parent().append(data.loadmore);
                      $('#loadmore').remove();
                    }else {
                      $('#loadmore').remove();
                    }
                }
            });
        }
    });

    $("select[name=mediatype]").on('change', function(){
      var type = $(this).val();
      if (type === 'video') {
        window.location = "<?php echo base_url('admin/media/videos') ?>"
      }
    });
});
</script>
