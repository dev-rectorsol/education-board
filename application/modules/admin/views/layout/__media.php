<!-- <script src="<?php echo base_url() ?>assets/fba/js/fba.js"></script> -->
<script type="text/javascript">
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
});
</script>
