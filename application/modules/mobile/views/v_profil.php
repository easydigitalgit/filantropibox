<section class="padding-20">
    <div class="profile-container">
        <div class="padding-t-50 profile">
            <img src="<?php echo base_url(); ?>public/mobile/assets/img/person.png" id="preview_profil"
                style="width: 150px; height: 150px;" class="rounded-circle" alt="">
            <a class="btn btn-secondary edit-profile">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-20 h-20">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                </svg>
            </a>
        </div>
    </div>
    <form id="form_profil" class="padding-t-30">
        <input type="file" id="profil" name="profil" accept="image/*" hidden>
        <div class="margin-b-30">
            <div class="form-group input-lined lined__iconed">
                <div class="input_group">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama lengkap">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>

                    </div>
                </div>
                <label for="nama">Nama Lengkap</label>
            </div>
        </div>
        <div class="margin-b-30">
            <div class="form-group input-lined lined__iconed">
                <div class="input_group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email aktif">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>

                    </div>
                </div>
                <label for="email">Email</label>
            </div>
        </div>
        <div class="margin-b-30">
            <div class="form-group input-lined lined__iconed">
                <div class="input_group">
                    <input type="email" class="form-control" name="kontak" id="kontak" placeholder="Nomor kontak aktif">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" className="w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round"
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                        </svg>
                    </div>
                </div>
                <label for="kontak">Kontak</label>
            </div>
        </div>
        <div class="margin-b-30">
            <div class="form-group input-lined lined__iconed">
                <div class="input_group">
                    <input type="text" class="form-control" id="alamat" name="alamat"
                        placeholder="Alamat tempat tinggal">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>

                    </div>
                </div>
                <label for="alamat">Alamat</label>
            </div>
        </div>
    </form>
</section>

<div class="buttons__footer text-center" style="margin-bottom: 70px;">
    <div class="env-pb">
        <a class="btn bg-primary rounded-pill py-4 mb-3 btn__default simpanBtn">
            <span class="color-white" style="padding: 0px 3px;">Simpan Perubahan</span>
            <div class="icon rounded-circle">
                <i class="tio-chevron_right"></i>
            </div>
        </a>
    </div>
    <a href="<?= site_url('mobile/ubah_password'); ?>" class="justify-content-center d-flex text-secondary"
        style="text-decoration: none; font-size: 16px;">Ubah
        Password</a>
</div>