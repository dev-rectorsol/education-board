<!-- content -->
<div class="page-content">


    <div class="container">


        <div class="mt-lg-11 container-small">

            <div class="text-center my-4">
                <h1 class="uk-heading-line text-center"><span>Get best counselling by our expert faculty and achieve your dream</span>
                </h1>
            </div>
            <div class="text-center my-4">
                <h2 class="uk-heading-line text-center"><span>Expert faculty से परामर्श करे आज ही</span>
                </h2>
                <p> Totally free of cost
                    Registered here</p>
            </div>


        </div>
        <form class="uk-grid-small" uk-grid action="" method="post">
            <div class="uk-width-1-2@s">
                <label class="uk-form-label">Name</label>
                <input class="uk-input" type="text" value="<?php $this->session->userdata('username'); ?>">
            </div>
            <div class="uk-width-1-2@s">
                <label class="uk-form-label">Email</label>
                <input class="uk-input" type="text" placeholder="Email">
            </div>
            <div class="uk-width-1-1@s">
                <label class="uk-form-label">Comment</label>
                <textarea class="uk-textarea" placeholder="Enter Your Comments her..." style=" height:160px"></textarea>
            </div>
            <div class="uk-grid-margin">
                <input type="submit" value="submit" class="btn btn-default">
            </div>
        </form>

        <!-- footer
       ================================================== -->
        <?php get_footer(); ?>


    </div>

</div>