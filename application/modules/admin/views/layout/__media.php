
<script src="<?php echo base_url('optimum/js/jquery.lazy/jquery.lazy.min.js'); ?>" charset="utf-8"></script>
<script type="text/javascript">

$(function(){
  // $('.lazy').Lazy();
  $('.lazy').Lazy({
        customLoaderName: function(element) {
            element.html('element handled by "customLoaderName"');
            element.load();
        },
        asyncLoader: function(element, response) {
            setTimeout(function() {
                element.html('element handled by "asyncLoader"');
                response(true);
            }, 1000);
        }
    });
});
$(document).ready(function(){

  $('#addfeatureimage').on('click', function(event){
    event.preventDefault();
    $.ajax({
      url: '<?php echo base_url('admin/media/get_model'); ?>',
      type: 'POST',
      success: function(response){
        $("body").append(response);
      }
    })
  });
  $('#removepreview').on('click', function(){
    $("#addfeaturepreview").html("");
    $('#addfeatureimage').html("Add feature image");
    $(this).addClass('hide');
  });
  $('#lectureremovepreview').on('click', function(){
    $("#addlecturepreview").html("");
    $('#addlectureimage').html("Add Video File");
    $(this).addClass('hide');
  });
  $('#addlectureimage').on('click', function(event){
    event.preventDefault();
    $.ajax({
      url: '<?php echo base_url('admin/media/get_video_model'); ?>',
      type: 'POST',
      success: function(response){
        $("body").append(response);
      }
    });
  });
});
</script>
