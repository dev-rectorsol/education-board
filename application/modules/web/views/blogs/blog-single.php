<!-- content -->
<div class="page-content">



    <div class="blog-article-single" data-src="<?php echo empty($blog->image) ? base_url($blog->image) : base_url('assets/images/blog/img-8.jpg'); ?>" uk-img>
        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>"> <span class="item-tag"> <i class="icon-feather-arrow-left"> </i> </span> </a>
        <div class="container-small">

            <p class="blog-article-meta mb-3">
                <strong> <?php echo ucfirst($category->name); ?> </strong>
                <a href="#"> <?php echo ucfirst($user->name); ?> </a>
            </p>

            <h1> <?php echo ucfirst($blog->title); ?> </h1>

            <div class="blog-article-auther">
              <img src="<?php echo !empty($user->thumb) ? base_url($user->thumb) : base_url('assets/images/avatars/default.png') ?>" alt="">
                <span class="blog-auther-user-name"> <?php echo ucfirst($blog->name); ?> </span>
            </div>

        </div>


    </div>

    <div class="container p-0">


        <!-- Blog Post Content -->

        <div class="container-small blog-article-content-read">

          <?php echo $blog->content ?>

            <div class="my-lg-7">

                <h4>Author </h4>
                <div class="uk-card-default rounded px-3 pb-md-3 uk-flex uk-flex-between@m uk-flex-middle"
                    uk-toggle="cls: uk-flex uk-flex-between@m uk-flex-middle; mode: media; media: @m">
                    <div class="user-details-card">
                        <div class="user-details-card-avatar">
                            <img src="<?php echo !empty($user->thumb) ? base_url($user->thumb) : base_url('assets/images/avatars/default.png') ?>" alt="">
                        </div>
                        <div class="user-details-card-name">
                            <?php echo ucfirst($user->name);  ?> <span> <?php echo ucfirst($user->role_name);  ?> <span> <?php echo time_diff($blog->public_at);  ?> </span> </span>
                        </div>
                    </div>
                    <div>
                        <strong class="mx-3 uk-visible@s"> Share on </strong>

                        <a href="#" class="btn btn-facebook  rounded-circle btn-icon-only transition-3d-hover">
                            <span class="btn-inner--icon">
                                <i class="icon-brand-facebook-f"></i>
                            </span>
                        </a>

                        <a href="#" class="btn btn-twitter rounded-circle btn-icon-only transition-3d-hover">
                            <span class="btn-inner--icon">
                                <i class="icon-brand-twitter"></i>
                            </span>
                        </a>

                        <a href="#"
                            class="btn btn-google-plus rounded-circle btn-icon-only transition-3d-hover">
                            <span class="btn-inner--icon">
                                <i class="icon-brand-google-plus-g"></i>
                            </span>
                        </a>
                    </div>
                </div>

            </div>

            <div class="comments mt-4">
                <h4>Comments
                    <span class="comments-amount">5210</span>
                </h4>

                <ul>
                    <li>
                        <div class="comments-avatar"><img src="../assets/images/avatars/avatar-1.jpg" alt="">
                        </div>
                        <div class="comment-content">
                            <div class="comment-by">Jonathan Madano <span>Student</span>
                                <a href="#" class="reply"><i class="icon-line-awesome-undo"></i> Reply</a>
                            </div>
                            <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
                                minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut
                                aliquip ex ea commodo consequat. Nam liber tempor cum soluta nobis eleifend
                                option
                                congue </p>
                        </div>

                        <ul>
                            <li>
                                <div class="comments-avatar"><img src="../assets/images/avatars/avatar-2.jpg" alt="">
                                </div>
                                <div class="comment-content">
                                    <div class="comment-by">Stella Johnson<span>Student</span>
                                        <a href="#" class="reply"><i class="icon-line-awesome-undo"></i>
                                            Reply</a>
                                    </div>
                                    <p> Nam liber tempor cum soluta nobis eleifend option congue ut laoreet
                                        dolore
                                        magna aliquam erat volutpat nihil imperdiet doming id quod mazim
                                        placerat
                                        facer possim assum. Lorem ipsum dolor sit amet</p>
                                </div>
                            </li>
                            <li>
                                <div class="comments-avatar">
                                    <img src="../assets/images/avatars/avatar-3.jpg" alt=""></div>
                                <div class="comment-content">

                                    <div class="comment-by">Adrian Mohani <span>Student</span>
                                        <a href="#" class="reply"><i class="icon-line-awesome-undo"></i>
                                            Reply</a>
                                    </div>
                                    <p>tempor cum soluta nobis eleifend option congue ut laoreet dolore magna
                                        aliquam erat volutpat.</p>
                                </div>

                            </li>
                        </ul>

                    </li>

                    <li>
                        <div class="comments-avatar"><img src="../assets/images/avatars/avatar-4.jpg" alt="">
                        </div>
                        <div class="comment-content">

                            <div class="comment-by">Alex Dolgove<span>Student</span>
                                <a href="#" class="reply"><i class="icon-line-awesome-undo"></i> Reply</a>
                            </div>
                            <p>Nam liber tempor cum soluta nobis eleifend option congue ut laoreet dolore magna
                                aliquam erat volutpat nihil imperdiet doming id quod mazim placerat facer possim
                                assum. Lorem ipsum dolor sit amet</p>
                        </div>

                    </li>

                </ul>

            </div>

            <div class="comments">
                <h4>Your Comment </h4>
                <ul>
                    <li>
                        <div class="comments-avatar"><img src="../assets/images/avatars/avatar-2.jpg" alt="">
                        </div>
                        <div class="comment-content">
                            <form class="uk-grid-small" uk-grid>
                                <div class="uk-width-1-2@s">
                                    <label class="uk-form-label">Name</label>
                                    <input class="uk-input" type="text" placeholder="Name">
                                </div>
                                <div class="uk-width-1-2@s">
                                    <label class="uk-form-label">Email</label>
                                    <input class="uk-input" type="text" placeholder="Email">
                                </div>
                                <div class="uk-width-1-1@s">
                                    <label class="uk-form-label">Comment</label>
                                    <textarea class="uk-textarea" placeholder="Enter Your Comments her..."
                                        style=" height:160px"></textarea>
                                </div>
                                <div class="uk-grid-margin">
                                    <input type="submit" value="submit" class="btn btn-default">
                                </div>
                            </form>

                        </div>
                    </li>
                </ul>
            </div>


        </div>



        <!-- Footer  -->
        <?php
         get_footer();
        ?>


    </div>
</div>
