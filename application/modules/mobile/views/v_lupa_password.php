<!-- <header class="main_haeder header-sticky multi_item">
    <div class="em_side_right">
        <a class="rounded-circle d-flex align-items-center text-decoration-none" href="<?= site_url('auth/login'); ?>">
            <i class="tio-chevron_left size-24 color-text"></i>
            <span class="color-text size-14">Back</span>
        </a>
    </div>
    <div class="title_page">
        <span class="page_name">
        </span>
    </div>

</header> -->

<section class="em__signTypeOne padding-t-50">
    <div class="em_titleSign">
        <h1>Lupa Password</h1>
        <p class="size-13 color-text">
            Masukkan Email anda untuk verifikasi
        </p>
    </div>
    <div class="em__body">
        <form action="">
            <div class="form-group with_icon">
                <label>Email Address</label>
                <div class="input_group">
                    <input type="email" class="form-control" placeholder="example@mail.com" required="">
                    <div class="icon">
                        <svg id="Iconly_Two-tone_Message" data-name="Iconly/Two-tone/Message"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <g id="Message" transform="translate(2 3)">
                                <path id="Path_445" d="M11.314,0,7.048,3.434a2.223,2.223,0,0,1-2.746,0L0,0"
                                    transform="translate(3.954 5.561)" fill="none" stroke="#200e32"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                    stroke-width="1.5" opacity="0.4"></path>
                                <path id="Rectangle_511"
                                    d="M4.888,0h9.428A4.957,4.957,0,0,1,17.9,1.59a5.017,5.017,0,0,1,1.326,3.7v6.528a5.017,5.017,0,0,1-1.326,3.7,4.957,4.957,0,0,1-3.58,1.59H4.888C1.968,17.116,0,14.741,0,11.822V5.294C0,2.375,1.968,0,4.888,0Z"
                                    transform="translate(0 0)" fill="none" stroke="#200e32" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"></path>
                            </g>
                        </svg>

                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="em__footer">
        <a href="<?= site_url('lupa_password/verifikasi_email'); ?>"
            class="btn bg-primary color-white justify-content-center">Reset Password</a>
        <a href="<?= site_url('auth/login'); ?>" class="btn color-text hover:color-text justify-content-center">
            Sudah Ingat! <span class="color-blue ml-1">Masuk</span>
        </a>
    </div>
</section>