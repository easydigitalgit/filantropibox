<section class="box__dashboard">
    <div class="group">
        <div class="item_link d-flex">
            <div class="icon bg-red">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                </svg>
            </div>
            <div class="txt">
                <p>Jumlah Box</p>
                <span>132</span>
            </div>
            <!-- <div class="txt" style="margin-left: auto;margin-right: 0;">
                <button class="btn justify-content-center bg-primary rounded-10 btn__default tambah_btn"
                    data-toggle="modal" data-target="#mdllContent-form">
                    <span class="text-white">Setor Box</span>
                </button>
            </div> -->
        </div>
    </div>
    <div class="d-flex">
        <a class="btn bg-primary btn__default setor_btn" data-toggle="modal" data-target="#modal_setor_box"
            style="margin-right:10px;">
            <span class="color-white">Setor</span>
            <div class="icon" style="margin: 0px;">
                <i class="tio-chevron_right"></i>
            </div>
        </a>
        <a class="btn bg-green btn__default tambah_btn" data-toggle="modal" data-target="#modal_tambah_box">
            <span class="color-white">Tambah</span>
            <div class="icon" style="margin: 0px;">
                <i class="tio-chevron_right"></i>
            </div>
        </a>
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

<div class="modal transition-bottom screenFull defaultModal mdlladd__rate fade" id="modal_setor_box" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable height-full">
        <div class="modal-content rounded-0">
            <div class="modal-header padding-l-20 padding-r-20 justify-content-center">
                <div class="itemProduct_sm">
                    <h1 class="size-18 weight-600 color-secondary m-0">Setor Box</h1>
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
                            <form action="" id="form_setor_box">
                                <div class="form-group with_icon">
                                    <label>Nomor Box</label>
                                    <div class="input_group">
                                        <input type="text" id="no_box" name="no_box" class="form-control"
                                            placeholder="Masukkan Nomor dari Box" required>
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback no_box-error"></div>
                                </div>
                                <div class="form-group with_icon">
                                    <label>Nominal</label>
                                    <div class="input_group">
                                        <input type="text" id="nominal" name="nominal" class="form-control"
                                            placeholder="Masukkan Nominal Uang" required>
                                        <div class="icon" style="color: #9498ac;">
                                            Rp.
                                        </div>
                                    </div>
                                    <div class="invalid-feedback nominal-error"></div>
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-3">
                <a
                    class="btn w-100 bg-primary m-0 color-white h-55 d-flex align-items-center rounded-10 justify-content-center setorBox">
                    Setor
                </a>
            </div>
        </div>
    </div>
</div>


<div class="modal transition-bottom screenFull defaultModal mdlladd__rate fade" id="modal_tambah_box" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable height-full">
        <div class="modal-content rounded-0">
            <div class="modal-header padding-l-20 padding-r-20 justify-content-center">
                <div class="itemProduct_sm">
                    <h1 class="size-18 weight-600 color-secondary m-0">Tambah Box</h1>
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
                            <form id="form_tambah_box" action="">
                                <input type="hidden" id="id" name="id">
                                <div class="form-group with_icon">
                                    <label>Nama Mitra</label>
                                    <div class="input_group">
                                        <input type="text" id="nama_mitra" name="nama_mitra" class="form-control"
                                            placeholder="Masukkan Nama Mitra" required>
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <ul id="list-mitra">
                                    </ul>
                                    <div class="invalid-feedback mitra-error"></div>
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
                                        <div class="invalid-feedback box1-error"></div>
                                    </div>
                                </div>
                                <div class="input_foto_box">
                                    <div id="foto_box1">
                                        <label>Foto Box 1</label>
                                        <div class="d-flex justify-content-center bg-white py-2 mb-3 upload_foto"
                                            id="upload_foto_box_1"
                                            style="border: 5px dashed; border-color: rgba(65, 189, 131, 0.3);">
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
                    class="btn w-100 bg-primary m-0 color-white h-55 d-flex align-items-center rounded-10 justify-content-center simpanBox">
                    Tambah
                </a>
            </div>
        </div>
    </div>
</div>