<script type="text/javascript">
$(document).ready(function(){
  $('#classCourseName').select2({
    ajax: {
      url: '<?php echo base_url('admin/course/get_courses'); ?>',
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
  $('#studentInClssRoom').select2({
    ajax: {
      url: '<?php echo base_url('admin/student/get_students'); ?>',
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
