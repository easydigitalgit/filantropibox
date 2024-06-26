<!-- Start main_haeder -->
<header class="main_haeder header-sticky multi_item">
    <div class="em_side_right">
        <a class="rounded-circle d-flex align-items-center text-decoration-none"
            href="<?= site_url('mobile/profil') ?>">
            <i class="tio-chevron_left size-24 color-text"></i>
            <span class="color-text size-14">Kembali</span>
        </a>
    </div>
    <div class="title_page">
        <span class="page_name">
            Ubah Password
        </span>
    </div>

</header>
<!-- End.main_haeder -->

<section class="padding-20">
    <form action="" class="padding-t-70" id="form_ubah_password">
        <div class="margin-b-30">
            <div class="form-group input-lined lined__iconed">
                <div class="input_group">
                    <input type="password" id="current_password" name="current_password" class="form-control"
                        placeholder="Masukkan password saat ini" required="">
                    <div class="icon">
                        <svg id="Iconly_Curved_Password" data-name="Iconly/Curved/Password"
                            xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
                            <g id="Password" transform="translate(2.521 2.521)">
                                <path id="Stroke_1" data-name="Stroke 1"
                                    d="M3.4,1.7A1.7,1.7,0,1,1,1.7,0h0A1.7,1.7,0,0,1,3.4,1.7Z"
                                    transform="translate(3.882 6.781)" fill="none" stroke="#9498ac"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                    stroke-width="1.5"></path>
                                <path id="Stroke_3" data-name="Stroke 3" d="M0,0H5.792V1.7"
                                    transform="translate(7.28 8.479)" fill="none" stroke="#9498ac"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                    stroke-width="1.5"></path>
                                <path id="Stroke_5" data-name="Stroke 5" d="M.5,1.7V0"
                                    transform="translate(9.979 8.479)" fill="none" stroke="#9498ac"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                    stroke-width="1.5"></path>
                                <path id="Stroke_7" data-name="Stroke 7"
                                    d="M0,8.479C0,2.12,2.12,0,8.479,0s8.479,2.12,8.479,8.479-2.12,8.479-8.479,8.479S0,14.838,0,8.479Z"
                                    fill="none" stroke="#9498ac" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-miterlimit="10" stroke-width="1.5"></path>
                            </g>
                        </svg>
                    </div>
                </div>
                <div class="invalid-feedback d-block d-none">Password tidak boleh
                    kosong
                </div>

                <label>Password</label>
            </div>
        </div>
        <div class="margin-b-30">
            <div class="form-group input-lined lined__iconed" id="show_hide_password">
                <div class="input_group">
                    <input type="password" id="new_password" name="new_password" class="form-control"
                        placeholder="Masukkan password baru" required="">
                    <div class="icon">
                        <svg id="Iconly_Curved_Password" data-name="Iconly/Curved/Password"
                            xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
                            <g id="Password" transform="translate(2.521 2.521)">
                                <path id="Stroke_1" data-name="Stroke 1"
                                    d="M3.4,1.7A1.7,1.7,0,1,1,1.7,0h0A1.7,1.7,0,0,1,3.4,1.7Z"
                                    transform="translate(3.882 6.781)" fill="none" stroke="#9498ac"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                    stroke-width="1.5"></path>
                                <path id="Stroke_3" data-name="Stroke 3" d="M0,0H5.792V1.7"
                                    transform="translate(7.28 8.479)" fill="none" stroke="#9498ac"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                    stroke-width="1.5"></path>
                                <path id="Stroke_5" data-name="Stroke 5" d="M.5,1.7V0"
                                    transform="translate(9.979 8.479)" fill="none" stroke="#9498ac"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                    stroke-width="1.5"></path>
                                <path id="Stroke_7" data-name="Stroke 7"
                                    d="M0,8.479C0,2.12,2.12,0,8.479,0s8.479,2.12,8.479,8.479-2.12,8.479-8.479,8.479S0,14.838,0,8.479Z"
                                    fill="none" stroke="#9498ac" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-miterlimit="10" stroke-width="1.5"></path>
                            </g>
                        </svg>
                    </div>
                    <button type="button" class="btn hide_show icon_password">
                        <i class="tio-hidden_outlined size-26"></i>
                    </button>
                </div>
                <div class="invalid-feedback d-block d-none">Password baru tidak boleh
                    kosong
                </div>
                <label for="pass">Password Baru</label>
            </div>
        </div>
        <div class="margin-b-30">
            <div class="form-group input-lined lined__iconed">
                <div class="input_group">
                    <input type="password" id="confirm_password" class="form-control" placeholder="Konfirmasi password"
                        required="">
                    <div class="icon">
                        <svg id="Iconly_Curved_Password" data-name="Iconly/Curved/Password"
                            xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
                            <g id="Password" transform="translate(2.521 2.521)">
                                <path id="Stroke_1" data-name="Stroke 1"
                                    d="M3.4,1.7A1.7,1.7,0,1,1,1.7,0h0A1.7,1.7,0,0,1,3.4,1.7Z"
                                    transform="translate(3.882 6.781)" fill="none" stroke="#9498ac"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                    stroke-width="1.5"></path>
                                <path id="Stroke_3" data-name="Stroke 3" d="M0,0H5.792V1.7"
                                    transform="translate(7.28 8.479)" fill="none" stroke="#9498ac"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                    stroke-width="1.5"></path>
                                <path id="Stroke_5" data-name="Stroke 5" d="M.5,1.7V0"
                                    transform="translate(9.979 8.479)" fill="none" stroke="#9498ac"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                    stroke-width="1.5"></path>
                                <path id="Stroke_7" data-name="Stroke 7"
                                    d="M0,8.479C0,2.12,2.12,0,8.479,0s8.479,2.12,8.479,8.479-2.12,8.479-8.479,8.479S0,14.838,0,8.479Z"
                                    fill="none" stroke="#9498ac" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-miterlimit="10" stroke-width="1.5"></path>
                            </g>
                        </svg>
                    </div>
                    <span class="icon_password">
                        <i class="bx bx-check size-30 matched d-none" style="color: #41bd83;"></i>
                        <i class="bx bx-x size-30 unmatched d-none" style="color: #ff4040;"></i>
                    </span>
                </div>
                <label>Konfirmasi Password Baru</label>
            </div>
        </div>

    </form>

</section>

<div class="buttons__footer text-center" style="margin-bottom: 70px;">
    <div class="env-pb">
        <a class="btn bg-primary rounded-pill py-4 mb-3 btn__default ubahBtn">
            <span class="color-white" style="padding: 0px 3px;">Ubah Password</span>
            <div class="icon rounded-circle">
                <i class="tio-chevron_right"></i>
            </div>
        </a>
    </div>
</div>