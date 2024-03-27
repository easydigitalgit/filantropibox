<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no, viewport-fit=cove" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="format-detection" content="telephone=no">

    <meta name="theme-color" content="#ffffff">
    <title>Nepro – The Multipurpose Mobile HTML5 Template</title>
    <meta name="description" content="Nepro – The Multipurpose Mobile HTML5 Template">
    <meta name="keywords"
        content="bootstrap 4, mobile template, 404, chat, about, cordova, phonegap, mobile, html, ecommerce, shopping, store, delivery, wallet, banking, education, jobs, careers, distance learning" />

    <!-- favicon -->
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>public/mobile/assets/img/favicon/32.png"
        sizes="32x32">
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>public/mobile/assets/img/favicon/favicon192.png">

    <!-- CSS Libraries-->
    <!-- bootstrap v4.6.0 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/mobile/assets/css/bootstrap.min.css">
    <!--
        theiconof v3.0
        https://www.theiconof.com/search
     -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/mobile/assets/css/icons.css">
    <!-- Boxicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/mobile/assets/css/boxicons.css">
    <!-- Remix Icon -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/mobile/assets/css/remixicon.css">
    <!-- Swiper 6.4.11 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/mobile/assets/css/swiper-bundle.min.css">
    <!-- Owl Carousel v2.3.4 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/mobile/assets/css/owl.carousel.min.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/mobile/assets/css/main.css">
    <!-- normalize.css v8.0.1 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/mobile/assets/css/normalize.css">
    <!-- leaflet.css v1.9.4 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugin/leaflet/leaflet.css">
    <!-- SweetAlert 2 -->
    <link href="<?php echo base_url(''); ?>public/plugin/sweetalert2/sweetalert2.min.css" rel="stylesheet"
        type="text/css" />

    <!-- manifest meta -->
    <link rel="manifest" href="_manifest.json" />

    <script>
        var base_url = '<?php echo base_url(); ?>';
        var site_url = '<?php echo site_url(); ?>';
        var class_url = '<?php echo currentClass(); ?>';
        var currentClass = site_url + '/' + class_url + '/';
    </script>
</head>


<body class="bg-snow">
    <style>
        .username {
            display: flex;
            /* Menggunakan flexbox */
            justify-content: center;
            /* Memusatkan secara horizontal (x-axis) */
            align-items: center;
            /* Memusatkan secara vertikal (y-axis) */
            margin-top: 10px;
        }

        .username h3 {
            font-size: 16px;
            font-weight: 500;
        }

        /* .box__dashboard .item_link .txt .tambah_btn {
            margin-left: auto;
            margin-right: 4px;
        } */

        .box__dashboard .item_link .txt .tambah_btn span {
            font-size: 16px;
        }

        #map_lokasi {
            width: 100%;
            height: 250px;
            border-radius: 10px;
        }

        #map_mitra {
            width: 100%;
            height: 300px;
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .profile-container {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile {
            position: relative;
        }

        .edit-profile {
            position: absolute;
            bottom: 0;
            right: 0;
            border-radius: 50px;
            padding: 10px 12px;
        }

        #profile-upload {
            display: none;
        }

        #list-mitra {
            display: none;
            position: absolute;
            padding: 10px;
            list-style: none;
            background-color: snow;
            border: 1px solid #ccc;
            overflow-y: auto;
            width: 89%;
            max-height: 150px;
            z-index: 1;
        }

        #list-mitra .list-item {
            cursor: pointer;
        }
    </style>

    <!-- Start em_loading -->
    <section class="em_loading" id="loaderPage">
        <div class="spinner_flash"></div>
    </section>
    <!-- End. em_loading -->

    <div id="wrapper">
        <div id="content">
            <!-- Start main_haeder -->
            <header class="main_haeder header-sticky multi_item">
                <div class="em_menu_sidebar">
                    <div class="em_profile_user">
                        <div class="media">
                            <a id="profile_picture">
                                <!-- You can use an image -->
                                <img class="_imgUser"
                                    src="<?php echo base_url(); ?><?= $this->session->userdata('foto') ?>" alt="">
                                <!-- <div class="letter bg-yellow">
                                    <span>c</span>
                                </div> -->
                            </a>
                            <div class="username">
                                <h3>
                                    <?= $this->session->userdata('username'); ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="em_side_right">
                    <a href="<?= site_url('mobile/login/logout'); ?>"
                        class="link__forgot d-block size-14 color-primary text-decoration-none hover:color-secondary transition-all">
                        Sign out
                    </a>
                </div>
            </header>
            <!-- End.main_haeder -->

            <!-- Start Content -->
            <?php isset ($konten) ? $this->load->view($konten) : ''; ?>
            <!-- End Content -->
        </div>
        <!-- Start em_main_footer -->
        <?php isset ($menu) ? $this->load->view($menu) : ''; ?>
        <!-- End. em_main_footer -->

        <!-- Modal Buttons Share -->
        <div class="modal transition-bottom -inside screenFull defaultModal mdlladd__rate fade" id="mdllButtons_share"
            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-15">

                    <div class="modal-body rounded-15 p-0">
                        <div class="emBK__buttonsShare icon__share padding-20">
                            <button type="button" class="btn" data-sharer="facebook" data-hashtag="hashtag"
                                data-url="https://orinostudio.com/nepro/">
                                <div class="icon bg-facebook rounded-10">
                                    <i class="tio-facebook_square"></i>
                                </div>
                            </button>
                            <button type="button" class="btn" data-sharer="telegram" data-title="Checkout Nepro!"
                                data-url="https://orinostudio.com/nepro/" data-to="+44555-5555">
                                <div class="icon bg-telegram rounded-10">
                                    <i class="tio-telegram"></i>
                                </div>
                            </button>
                            <button type="button" class="btn" data-sharer="skype"
                                data-url="https://orinostudio.com/nepro/" data-title="Checkout Nepro!">
                                <div class="icon bg-skype rounded-10">
                                    <i class="tio-skype"></i>
                                </div>
                            </button>
                            <button type="button" class="btn" data-sharer="linkedin"
                                data-url="https://orinostudio.com/nepro/">
                                <div class="icon bg-linkedin rounded-10">
                                    <i class="tio-linkedin_square"></i>
                                </div>
                            </button>
                            <button type="button" class="btn" data-sharer="twitter" data-title="Checkout Nepro!"
                                data-hashtags="pwa, Nepro, template, mobile, app, shopping, ecommerce"
                                data-url="https://orinostudio.com/nepro/">
                                <div class="icon bg-twitter rounded-10">
                                    <i class="tio-twitter"></i>
                                </div>
                            </button>
                            <button type="button" class="btn" data-sharer="whatsapp" data-title="Checkout Nepro!"
                                data-url="https://orinostudio.com/nepro/">
                                <div class="icon bg-whatsapp rounded-10">
                                    <i class="tio-whatsapp_outlined"></i>
                                </div>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery -->
    <script src="<?php echo base_url(); ?>public/mobile/assets/js/jquery-3.6.0.js"></script>
    <!-- popper.min.js 1.16.1 -->
    <script src="<?php echo base_url(); ?>public/mobile/assets/js/popper.min.js"></script>
    <!-- bootstrap.js v4.6.0 -->
    <script src="<?php echo base_url(); ?>public/mobile/assets/js/bootstrap.min.js"></script>

    <!-- Owl Carousel v2.3.4 -->
    <script src="<?php echo base_url(); ?>public/mobile/assets/js/vendor/owl.carousel.min.js"></script>
    <!-- Swiper 6.4.11 -->
    <script src="<?php echo base_url(); ?>public/mobile/assets/js/vendor/swiper-bundle.min.js"></script>
    <!-- sharer 0.4.0 -->
    <script src="<?php echo base_url(); ?>public/mobile/assets/js/vendor/sharer.js"></script>
    <!-- short-and-sweet v1.0.2 - Accessible character counter for input elements -->
    <script src="<?php echo base_url(); ?>public/mobile/assets/js/vendor/short-and-sweet.min.js"></script>
    <!-- jquery knob -->
    <script src="<?php echo base_url(); ?>public/mobile/assets/js/vendor/jquery.knob.min.js"></script>
    <!-- PWA app service registration and works js -->
    <!-- <script src="<?php echo base_url(); ?>public/mobile/assets/js/pwa-services.js"></script> -->
    <!-- leaflet.js v1.9.4 -->
    <script src="<?php echo base_url(); ?>public/plugin/leaflet/leaflet.js"></script>
    <!-- SweetAlert 2 -->
    <script src="<?php echo base_url(); ?>public/plugin/sweetalert2/sweetalert2.min.js"></script>
    <!-- libjs -->
    <?php
    if (isset ($libjs)) {
        foreach ($libjs as $lib) {
            echo '<script src="' . base_url() . 'public/mobile/libjs/' . $lib . '.js"></script>';
        }
    }
    ?>
    <script src="<?php echo base_url(); ?>public/mobile/assets/js/main.js" defer></script>
</body>

</html>