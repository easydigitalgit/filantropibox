<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="format-detection" content="telephone=no">

    <meta name="theme-color" content="#ffffff">
    <title>Nepro – The Multipurpose Mobile HTML5 Template</title>
    <meta name="description" content="Nepro – The Multipurpose Mobile HTML5 Template">
    <meta name="keywords"
        content="bootstrap 4, mobile template, 404, chat, about, cordova, phonegap, mobile, html, ecommerce, shopping, store, delivery, wallet, banking, education, jobs, careers, distance learning" />

    <!-- favicon -->
    <link rel="icon" type="image/png" href="<?php echo base_url(''); ?>public/mobile/assets/img/favicon/32.png"
        sizes="32x32">
    <link rel="apple-touch-icon" href="<?php echo base_url(''); ?>public/mobile/assets/img/favicon/favicon192.png">

    <!-- CSS Libraries-->
    <!-- bootstrap v4.6.0 -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>public/mobile/assets/css/bootstrap.min.css">
    <!--
        theiconof v3.0
        https://www.theiconof.com/search
     -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>public/mobile/assets/css/icons.css">
    <!-- Remix Icon -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>public/mobile/assets/css/remixicon.css">
    <!-- Swiper 6.4.11 -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>public/mobile/assets/css/swiper-bundle.min.css">
    <!-- Owl Carousel v2.3.4 -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>public/mobile/assets/css/owl.carousel.min.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>public/mobile/assets/css/main.css">
    <!-- normalize.css v8.0.1 -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>public/mobile/assets/css/normalize.css">

    <!-- manifest meta -->
    <link rel="manifest" href="_manifest.json" />

    <script>
        var site_url = '<?php echo site_url(); ?>';
        var class_url = '<?php echo currentClass(); ?>';
        var currentClass = site_url + '/' + class_url + '/';
    </script>
</head>


<body>

    <style>
        .logo {
            text-align: center;
        }
    </style>

    <!-- Start em_loading -->
    <section class="em_loading" id="loaderPage">
        <div class="spinner_flash"></div>
    </section>
    <!-- End. em_loading -->

    <div id="wrapper">
        <div id="content">
            <section class="em__signTypeOne padding-t-50">
                <div class="logo">
                    <h1>Sign in to</h1>
                    <img src="<?php echo base_url(''); ?>public/mobile/assets/img/logo.png" height="28px" alt="">
                </div>
                <div class="em__body">
                    <form action="" id="form_login" class="login-form">
                        <div class="form-group with_icon">
                            <label>Username</label>
                            <div class="input_group">
                                <input type="text" name="username" class="form-control" placeholder="Masukkan Username"
                                    required>
                                <div class="icon">
                                    <i class="ri-user-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group with_icon mb-2" id="show_hide_password">
                            <label>Password</label>
                            <div class="input_group">
                                <input type="password" name="password" class="form-control"
                                    placeholder="Masukkan Password" required>
                                <div class="icon">
                                    <i class="ri-key-line"></i>
                                </div>
                                <button type="button" class="btn hide_show icon_password">
                                    <i class="tio-hidden_outlined"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div id="login-validasi" class="text-center"></div>
                    <a href="<?= site_url('mobile/lupa_password'); ?>">Lupa Password?</a>
                </div>
                <div class="em__footer">
                    <a id="btnLogin" class="btn bg-primary color-white justify-content-center">Masuk</a>
                </div>
            </section>
        </div>

        <!-- Start searchMenu__hdr -->
        <section class="searchMenu__hdr">
            <form>
                <div class="form-group">
                    <div class="input_group">
                        <input type="search" class="form-control" placeholder="type something here...">
                        <i class="ri-search-2-line icon_serach"></i>
                    </div>
                </div>
            </form>
            <button type="button" class="btn btn_meunSearch -close __removeMenu">
                <i class="tio-clear"></i>
            </button>
        </section>
        <!-- End. searchMenu__hdr -->

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
    <script src="<?php echo base_url(''); ?>public/mobile/assets/js/jquery-3.6.0.js"></script>
    <!-- popper.min.js 1.16.1 -->
    <script src="<?php echo base_url(''); ?>public/mobile/assets/js/popper.min.js"></script>
    <!-- bootstrap.js v4.6.0 -->
    <script src="<?php echo base_url(''); ?>public/mobile/assets/js/bootstrap.min.js"></script>

    <!-- Owl Carousel v2.3.4 -->
    <script src="<?php echo base_url(''); ?>public/mobile/assets/js/vendor/owl.carousel.min.js"></script>
    <!-- Swiper 6.4.11 -->
    <script src="<?php echo base_url(''); ?>public/mobile/assets/js/vendor/swiper-bundle.min.js"></script>
    <!-- sharer 0.4.0 -->
    <script src="<?php echo base_url(''); ?>public/mobile/assets/js/vendor/sharer.js"></script>
    <!-- short-and-sweet v1.0.2 - Accessible character counter for input elements -->
    <script src="<?php echo base_url(''); ?>public/mobile/assets/js/vendor/short-and-sweet.min.js"></script>
    <!-- jquery knob -->
    <script src="<?php echo base_url(''); ?>public/mobile/assets/js/vendor/jquery.knob.min.js"></script>
    <!-- main.js -->
    <script src="<?php echo base_url(''); ?>public/mobile/assets/js/main.js" defer></script>

    <?= isset($libjs) ? '<script src="' . base_url() . 'public/mobile/libjs/' . $libjs . '"></script>' : ''; ?>
    <?php
    if (isset($lib)) {
        foreach ($lib as $plugin) {
            echo '<script src="' . base_url() . 'public/plugin/' . $plugin . '/' . $plugin . '.min.js"></script>';
        }
    }
    ?>
</body>

</html>