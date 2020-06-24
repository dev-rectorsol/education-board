<div id="info-model" class="uk-flex-top" uk-modal> <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
  <button class="uk-modal-close-default" type="button" uk-close></button>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>
</div>

<script src="<?php echo base_url() ?>/assets/js/framework.js"></script>
<script src="<?php echo base_url() ?>/assets/js/simplebar.js"></script>
<script src="<?php echo base_url() ?>/assets/js/main.js"></script>
<script src="<?php echo base_url() ?>/assets/js/bootstrap-select.min.js"></script>
<script type="text/javascript">

 // for notification 

(function(){
  <?php if ($this->session->flashdata()):?>
    <?php if ($this->session->flashdata('error')): ?>
      UIkit.notification({message: "<?php echo $this->session->flashdata('msg') ?>", status:'danger', pos: 'top-right', timeout: 6000});
    <?php else: ?>
      UIkit.notification({message:"<?php echo $this->session->flashdata('msg') ?>", status:'success', pos: 'top-right', timeout: 6000});
    <?php endif; ?>
  <?php endif; ?>
});


</script>

<!-- For Night mode -->
<script>
    (function (window, document, undefined) {
        'use strict';
        if (!('localStorage' in window)) return;
        var nightMode = localStorage.getItem('gmtNightMode');
        if (nightMode) {
            document.documentElement.className += ' night-mode';
        }
    })(window, document);


    (function (window, document, undefined) {

        'use strict';

        // Feature test
        if (!('localStorage' in window)) return;

        // Get our newly insert toggle
        var nightMode = document.querySelector('#night-mode');
        if (!nightMode) return;

        // When clicked, toggle night mode on or off
        nightMode.addEventListener('click', function (event) {
            event.preventDefault();
            document.documentElement.classList.toggle('night-mode');
            if (document.documentElement.classList.contains('night-mode')) {
                localStorage.setItem('gmtNightMode', true);
                return;
            }
            localStorage.removeItem('gmtNightMode');
        }, false);

    })(window, document);
</script>
</body>
</html>
