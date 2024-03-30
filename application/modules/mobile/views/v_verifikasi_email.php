<!-- Start main_haeder -->
<header class="main_haeder header-sticky multi_item">
    <div class="em_side_right">
        <a class="rounded-circle d-flex align-items-center text-decoration-none"
            href="<?= site_url('lupa_password'); ?>">
            <i class="tio-chevron_left size-24 color-text"></i>
            <span class="color-text size-14">Kembali</span>
        </a>
    </div>
    <div class="title_page">
        <span class="page_name">
            <!-- title here.. -->
        </span>
    </div>
    <!-- <div class="em_side_right">
        <a href="#"
            class="link__forgot d-block size-14 color-text text-decoration-none hover:color-secondary transition-all">
            Need some help?
        </a>
    </div> -->
</header>
<!-- End.main_haeder -->

<!-- Start em__signTypeOne -->
<section class="em__signTypeOne typeTwo np__account padding-t-70">
    <div class="em_titleSign">
        <h1>Verifikasi Email</h1>
        <p>Mohon masukkan 4 angka kode yang dikirim ke</p>
        <spa class="d-block size-13 color-secondary">info@example.com</spa>

    </div>
    <div class="em__body">
        <form action="" class="padding-t-40">
            <div class="verification__Code withBorder__items">
                <div class="input_number">
                    <input type="tel" class="form-control input_number" maxlength="1" size="1" min="0" max="9"
                        pattern="[0-9]{1}" placeholder="-">
                    <input type="tel" class="form-control input_number" maxlength="1" size="1" min="0" max="9"
                        pattern="[0-9]{1}" placeholder="-">
                    <input type="tel" class="form-control input_number" maxlength="1" size="1" min="0" max="9"
                        pattern="[0-9]{1}" placeholder="-">
                    <input type="tel" class="form-control input_number" maxlength="1" size="1" min="0" max="9"
                        pattern="[0-9]{1}" placeholder="-">
                </div>
            </div>
        </form>
    </div>
    <div class="buttons__footer text-center">
        <div class="padding-b-30">
            <p class="color-text size-14 text-center">
                Tidak menerima kode? <span class="color-snow">Kirim Ulang 30s</span>
            </p>
        </div>
        <a href="<?= site_url('lupa_password/ubah_password') ?>" class="btn bg-primary rounded-pill btn__default">
            <span class="color-white">Verifikasi Kode</span>
            <div class="icon rounded-circle">
                <i class="tio-chevron_right"></i>
            </div>
        </a>

    </div>
</section>
<!-- End. em__signTypeOne -->