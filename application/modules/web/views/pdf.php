 <div class="page-content">


     <div class="container">



         <div class="uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-2" uk-grid>
             <?php foreach ($pdf as $value) { ?>
                 <div>
                     <a href="<?php echo base_url('web/Courses/download/') . $value['docid'] ?>" class="uk-text-bold">
                         <img src="<?php echo base_url('/assets/images/book/php.jpg') ?>" class="mb-2 w-100 shadow rounded">
                         <?php echo $value['name']; ?>
                     </a>
                 </div>
             <?php } ?>
         </div>




         <!-- pagination-->
         <ul class="uk-pagination uk-flex-center uk-margin-medium">
             <li class="uk-active">
                 <span>1</span>
             </li>
             <li>
                 <a href="#">2</a>
             </li>
             <li>
                 <a href="#">3</a>
             </li>
             <li>
                 <a href="#">4</a>
             </li>
             <li>
                 <a href="#">5</a>
             </li>
             <li>
                 <a href="#"><i class="icon-feather-chevron-right uk-margin-small-top"></i></a>
             </li>
             <li>
                 <a href="#">12</a>
             </li>
         </ul>

         <?php
            get_footer();
            ?>
     </div>
 </div>