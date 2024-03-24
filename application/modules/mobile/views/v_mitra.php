<section class="box__dashboard">
    <div class="group">
        <div class="item_link d-flex">
            <div class="icon bg-purple">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                </svg>
            </div>
            <div class="txt">
                <p>Jumlah Mitra</p>
                <span>92</span>
            </div>
            <div class="txt" style="margin-left: auto;margin-right: 0;">
                <button class="btn justify-content-center bg-primary rounded-10 btn__default tambah_btn"
                    data-toggle="modal" data-target="#modal_mitra">
                    <span class="text-white" style="">Tambah Mitra</span>
                </button>
            </div>
        </div>
    </div>
</section>

<section style="margin: 20px 20px;">
    <div class="card" style="background-color: white; border-radius: 10px;">
        <div class="card-header">
            Mitra Terdekat
        </div>
        <div class="map_mitra_container">
            <!-- <div id="map_mitra"></div> -->
        </div>
    </div>
</section>

<div class="modal transition-bottom screenFull defaultModal mdlladd__rate fade" id="modal_mitra" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable height-full">
        <div class="modal-content rounded-0">
            <div class="modal-header padding-l-20 padding-r-20 justify-content-center">
                <div class="itemProduct_sm">
                    <h1 class="size-18 weight-600 color-secondary m-0">Tambah Mitra</h1>
                </div>
                <div class="absolute right-0 padding-r-20">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="tio-clear"></i>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="padding-t-20">
                    <div class="em__signTypeOne">
                        <div class="em__body px-0">
                            <form action="" id="form_mitra">
                                <h1 class="size-18 weight-600 color-secondary m-0 text-center">Biodata Mitra
                                </h1>
                                <div class="form-group with_icon">
                                    <label>Nama Usaha
                                        <span class="color-red">*</span>
                                    </label>
                                    <div class="input_group">
                                        <input type="text" class="form-control" placeholder="Masukkan nama usaha"
                                            name="nama_usaha" id="nama_usaha" required>
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback d-block d-none">Nama usaha tidak boleh
                                        kosong
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Foto Usaha</label>
                                    <div class="d-flex justify-content-center bg-white py-2 mb-3 upload_foto"
                                        id="preview_foto_usaha"
                                        style="border: 5px dashed; border-color: rgba(65, 189, 131, 0.3);">
                                        Masukkan Foto Usaha
                                    </div>
                                    <div class="input-group">
                                        <input type="file" class="border-none foto_box" id="foto_usaha"
                                            name="foto_usaha" style="display:none;" value="">
                                    </div>
                                    <div class="invalid-feedback d-block d-none">
                                        Foto Box tidak boleh kosong
                                    </div>
                                </div>
                                <div class="form-group with_icon">
                                    <label>Nama Penanggung Jawab
                                        <span class="color-red">*</span>
                                    </label>
                                    <div class="input_group">
                                        <input type="text" class="form-control"
                                            placeholder="Masukkan nama penanggung jawab" name="nama_penanggung_jawab"
                                            id="nama_penanggung_jawab" required>
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback d-block d-none">Nama penanggung jawab tidak boleh
                                        kosong
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Foto Penanggung Jawab</label>
                                    <div class="d-flex justify-content-center bg-white py-2 mb-3 upload_foto"
                                        id="preview_foto_penanggung_jawab"
                                        style="border: 5px dashed; border-color: rgba(65, 189, 131, 0.3);">
                                        Masukkan Foto Penanggung Jawab
                                    </div>
                                    <div class="input-group">
                                        <input type="file" class="border-none foto_box" id="foto_penanggung_jawab"
                                            name="foto_penanggung_jawab" style="display:none;" value="">
                                    </div>
                                    <div class="invalid-feedback d-block d-none">
                                        Foto Box tidak boleh kosong
                                    </div>
                                </div>
                                <div class="form-group with_icon">
                                    <label>No. WA
                                        <span class="color-red">*</span>
                                    </label>
                                    <div class="input_group">
                                        <input type="text" class="form-control" placeholder="Masukkan nomor WhatsApp"
                                            id="no_wa" name="no_wa" required>
                                        <div class="icon" style="color: #9498ac;">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback d-block d-none">
                                        Nomor WhatsApp tidak boleh kosong
                                    </div>
                                </div>
                                <div class="form-group with_icon">
                                    <label>Jenis Usaha
                                        <span class="color-red">*</span>
                                    </label>
                                    <div class="input_group">
                                        <input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha"
                                            placeholder="Contoh: Rumah Makan, Apotek" required>
                                        <div class="icon" style="color: #9498ac;">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback d-block d-none">
                                        Jenis usaha tidak boleh kosong
                                    </div>
                                </div>
                                <div class="form-group with_icon">
                                    <label>Lokasi
                                        <span class="color-red">*</span>
                                    </label>
                                    <div class="map_lokasi_container">
                                        <!-- <div id="map_lokasi"></div> -->
                                    </div>
                                    <br>
                                    <div class="bg-white padding-6 d-flex">
                                        <a id="get_location"
                                            class="btn justify-content-center bg-primary rounded-10 btn__default full-width">
                                            <span class="color-white" style="font-size: 16px;">Gunakan Lokasi Saat
                                                Ini</span>
                                        </a>
                                    </div>
                                    <input type="hidden" id="latlong_lokasi" name="latlong_lokasi">
                                </div>
                                <div class="form-group with_icon">
                                    <label>Alamat
                                        <span class="color-red">*</span>
                                    </label>
                                    <div class="input_group">
                                        <textarea placeholder="Masukkan alamat" name="alamat" id="alamat"
                                            class="form-control" rows="3" style="padding-left: 15px;"></textarea>
                                    </div>
                                    <div class="invalid-feedback d-block d-none">
                                        Alamat tidak boleh kosong
                                    </div>
                                </div>
                                <div class="form-group with_icon">
                                    <label>
                                        Keterangan
                                        <span class="size-13 color-text">(Opsional)</span>
                                    </label>
                                    <div class="input_group">
                                        <textarea placeholder="Masukkan keterangan lebih lanjut" name="keterangan"
                                            id="keterangan" class="form-control opsional" rows="5"
                                            style="padding-left: 15px;"></textarea>
                                    </div>
                                </div>
                                <div class="bg-white padding-20 dividarIconded withBorder_white">
                                    <div class="dividar border-secondary">
                                        <div class="icon_dividar bg-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="black" class="w-24 h-24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex" style="justify-content: right;">
                                    <div class="itemCountr_manual horizontal hz-sm">
                                        <a href="#" data-dir="down" id="kurang_input_box"
                                            class="btn btn_counter co_down">
                                            <i class="tio-remove"></i>
                                        </a>
                                        <input type="text" id="jumlah_box" name="jumlah_box"
                                            class="form-control input_no color-secondary" value="1">
                                        <a href="#" data-dir="up" id="tambah_input_box" class="btn btn_counter co_up">
                                            <i class="tio-add"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="input_nomor_box">
                                    <div id="box1" class="form-group with_icon">
                                        <label>Box 1</label>
                                        <div class="input_group">
                                            <input type="text" class="form-control" id="box_1" name="box_1"
                                                placeholder="Masukkan Nomor dari Box" value="" required>
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback d-block d-none">
                                            Nomor Box tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                                <div class="input_foto_box">
                                    <div id="foto_box1">
                                        <label>Foto Box 1</label>
                                        <div class="d-flex justify-content-center bg-white py-2 mb-3 upload_foto"
                                            id="preview_foto_box_1"
                                            style="border: 5px dashed; border-color: rgba(65, 189, 132, 0.3);">
                                            Masukkan Foto Box
                                        </div>
                                        <div class="input-group">
                                            <input type="file" class="border-none foto_box" id="foto_box_1"
                                                name="foto_box_1" style="display:none;" value="">
                                        </div>
                                        <div class="invalid-feedback d-block d-none">
                                            Foto Box tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-3">
                <a
                    class="btn w-100 bg-primary m-0 color-white h-55 d-flex align-items-center rounded-10 justify-content-center simpanBtn">
                    Tambah Mitra
                </a>
            </div>
        </div>
    </div>
</div>