<!-- side nav-->
<div class="side-nav uk-animation-slide-left-medium">


  <div class="side-nav-bg"></div>

  <!-- logo -->
  <div class="logo uk-visible@s">
    <a href="<?php echo base_url('home'); ?>">
      <i class=" uil-graduation-hat"></i>
    </a>
  </div>

  <ul>
    <li>
      <a href="#"> <i class="uil-play-circle"></i> </a>
      <div class="side-menu-slide">
        <div class="side-menu-slide-content">
          <ul data-simplebar>
            <?php $category = $this->common_model->select('category');
                              foreach ($category as $value):

                            ?>
            <li>
              <a href="<?php echo base_url('category/').str_replace(" ", "", $value['name']); ?>"> <i class="<?php echo !empty($value['icon']) ? $value['icon'] : 'uil-brush-alt' ?>" style="font-size: larger"></i>
                <?php echo ucfirst($value['name']); ?> </a>
            </li>
            <?php endforeach; ?>
        </div>
      </div>
    </li>
    <li>
      <!-- Blog-->
      <a href="<?php echo base_url('blogs'); ?>"> <i class="uil-file-alt"></i> <span class="tooltips"> Current Affairs </span></a>
    </li>
    <li>
      <!-- book -->
      <a href="<?php echo base_url('courses'); ?>"> <i class="uil-book-alt"></i> <span class="tooltips"> Courser </span> </a>
    </li>
    <li>
      <!-- book -->
      <a href="<?php echo base_url('test'); ?>"> <i class="uil-tumblr-alt"></i> <span class="tooltips"> Test Series </span> </a>
    </li>
    <li>
      <!-- Payment -->
      <a href="<?php echo base_url('payment'); ?>"> <i class="icon-brand-google-wallet"></i> <span class="tooltips"> Payment </span> </a>
    </li>
    <li>
      <a href="#" uk-toggle="target: #searchbox; cls: is-active"><i class="uil-search-alt"></i></a>
    </li>
    <li>
      <!-- Lunch information box -->
      <a href="#">
        <i class="uil-paint-tool"></i>
      </a>
      <div uk-drop="pos: right-bottom ;mode:click ; offset: 10;animation: uk-animation-slide-right-small">
        <div class="uk-card-default rounded p-0">
          <h5 class="mb-0 p-3 px-4  bg-light"> Night mode</h5>
          <div class="p-3 px-4">
            <p>Turns the light surfaces of the page dark, creating an experience ideal for night.
            </p>
            <div class="uk-flex">
              <p class="uk-text-small text-muted">DARK THEME </p>
              <!-- night mode button -->
              <span href="#" id="night-mode" class="btn-night-mode">
                <label class="btn-night-mode-switch">
                  <span class="uk-switch-button"></span>
                </label>
              </span>
            </div>

          </div>
        </div>
      </div>

    </li>

  </ul>
  <ul class="uk-position-bottom">
    <li>
      <!-- Lunch information box -->
      <a href="#">
        <i class="uil-paint-tool"></i>
      </a>
      <div uk-drop="pos: right-bottom ;mode:click ; offset: 10;animation: uk-animation-slide-right-small">
        <div class="uk-card-default rounded p-0">
          <h5 class="mb-0 p-3 px-4  bg-light"> Night mode</h5>
          <div class="p-3 px-4">
            <p>Turns the light surfaces of the page dark, creating an experience ideal for night.
            </p>
            <div class="uk-flex">
              <p class="uk-text-small text-muted">DARK THEME </p>
              <!-- night mode button -->
              <span href="#" id="night-mode" class="btn-night-mode">
                <label class="btn-night-mode-switch">
                  <span class="uk-switch-button"></span>
                </label>
              </span>
            </div>

          </div>
        </div>
      </div>

    </li>
    <li>
      <a href="#">
        <span class="icon-feather-user"></span>
      </a>
      <div uk-drop="pos: right-bottom ;mode:click ; offset: 10;animation: uk-animation-slide-right-small">
        <?php if(check()): ?>
        <div class="uk-card-default rounded p-0">
          <a href="<?php echo base_url() ?>" class="p-0">

            <div class="dropdown-user-details">
              <div class="dropdown-user-avatar">
                <?php if ($this->session->userdata('thumb') != ""): ?>
                <img src="<?php echo base_url() . $this->session->userdata('thumb'); ?>" alt="">
                <?php else: ?>
                <img src="<?php echo base_url()?>assets/images/avatars/default.png" alt="">
                <?php endif; ?>
              </div>
              <div class="dropdown-user-name">
                <?php echo $this->session->userdata('username'); ?> <span>Students</span>
              </div>
            </div>

          </a>
          <ul class="dropdown-user-menu">
            <li><a href="<?php echo base_url('authentication/logout') ?>">
                <i class="icon-feather-log-out"></i> Sing Out</a>
            </li>
          </ul>
        </div>
        <?php endif; ?>
      </div>
    </li>
  </ul>
</div>
<!-- content -->
