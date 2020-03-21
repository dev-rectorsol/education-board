<?php
foreach($upload as $row){
    ?>
      <a href="<?php echo base_url('upload')?>/<?php echo $row?>" ><?php echo $row?></a><br>
   <?php 
}

?>