<script type="text/javascript">

$('#__city_select').select2({
  ajax: {
    url: '<?php echo base_url('admin/student/get_city'); ?>',
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

$('#__states_select').select2({
  ajax: {
    url: '<?php echo base_url('admin/student/get_states'); ?>',
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

</script>
