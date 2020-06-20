<script type="text/javascript">
$(document).ready(function(){
  $('#getDocFile').select2({
    ajax: {
      url: '<?php echo base_url('admin/pdf/get_documents'); ?>',
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
});
</script>
