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
