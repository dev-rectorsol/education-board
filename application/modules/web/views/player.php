<!DOCTYPE html>
<html>
  <head>
    <title>afterglow player</title>
  </head>
  <body>
    <input type="text" name="quntity[]" value="10">
    <input type="text" name="quntity[]" value="10">
    <input type="text" name="quntity[]" value="10">
    <input type="text" name="quntity[]" value="10">

    <script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        let total = 50;
        $("input[name='quntity[]']").on('change', function(){
          console.log(get_current_quntity());
        });
        function get_current_quntity(){
            var current = 0;
            $("input[name='quntity[]']").each(function(){
              current += Number($(this).val());
            });
            return Number(total - current);
        }
      });
    </script>

  </body>
</html>
