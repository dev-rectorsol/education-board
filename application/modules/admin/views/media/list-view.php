<?php



?>

<div class="demo-gallery">
    <ul id="lightgallery" class="list-unstyled row">
      <?php foreach ($files as $value): ?>
        <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="img/1-375.jpg 375, img/1-480.jpg 480, img/1.jpg 800" data-src="img/1-1600.jpg" >
            <a href="">
                <img class="img-responsive" src="<?php echo base_url('uploads/').$value;  ?>" alt="Thumb-1">
            </a>
        </li>
      <?php endforeach; ?>
    </ul>
</div>
