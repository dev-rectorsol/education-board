<div class="modal modal-edu-general default-popup-PrimaryModal fade in" role="dialog" style="display: block; padding-right: 17px;">
  <div class="modal-dialog" style="min-width: auto; min-height: auto;">
    <div class="modal-content">
      <div class="modal-header header-color-modal bg-color-1">
        <div class="modal-close-area modal-close-df">
          <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
        </div>
      </div>
      <div class="modal-body">
        <div class="image-grid-row">
          <section class="__file-media">
            <?php foreach ($image as $value): ?>
            <?php  $temp = getFileInfo($value);  ?>
            <img src="<?php echo base_url($value) ?>" data-name="<?php echo $temp['basename'] ?>" data-type="<?php echo $temp['extension'] ?>" data-size="<?php echo convertToReadableSize($temp['size']) ?>"
              data-path="<?php echo $temp['dirname'] ."/". $temp['basename'] ?>">
            <?php endforeach; ?>
          </section>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link" name="button">upload new</button>
      </div>
    </div>
  </div>
</div>
<style media="screen">
.modal-edu-general .modal-body {
  text-align: center;
  /* padding: 50px 70px; */
  overflow: scroll;
  height: 382px;
  overflow-y: auto;
  overflow-x: hidden;
}
</style>
<script type="text/javascript">
  $('.__file-media img').on('click', function() {
    var preview = $('#addfeaturepreview');
    var obj = $(this);
    var button = $('#addfeatureimage');
    var remove = $('#removepreview');
    var name = obj.attr('data-name');
    var url = obj.attr('src');
    var path = obj.attr('data-path');
    var html = '<img src=" '+url+'" >';
    html += '<input type="hidden" name="featureImage" value=" '+path+'" >';
    preview.html("");
    preview.html(html);
    $('.modal').hide();
    remove.removeClass('hide');
    button.html('change feature images');
  });
</script>
