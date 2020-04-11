<!doctype html>
<html lang="en">


<!-- Mirrored from demo.foxthemes.net/courseplusv3.3/default/form-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Mar 2020 12:32:48 GMT -->
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>Courseplus Learning HTML Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Courseplus - Professional Learning Management HTML Template">

    <!-- Favicon -->
    <link href="<?php echo base_url() ?>/assets/images/favicon.png" rel="icon" type="image/png">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/night-mode.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/framework.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap.css">

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/icons.css">



    <!-- javaScripts
    ================================================== -->
    <script src="<?php echo base_url() ?>/assets/js/framework.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/simplebar.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/main.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/bootstrap-select.min.js"></script>


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

</head>

<body>
