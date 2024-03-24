<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18 dash-title"></h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <a href="<?= site_url('admin/dashboard'); ?>">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active dash-title"></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?= isset ($addbtn) ? $addbtn : ''; ?>
                        <table id="table_data_mitra_box" class="table table-striped table-bordered" style="width:100%;">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>

                                    <th width="10%">Nama Usaha</th>
                                    <th width="10%">Nama Penanggung Jawab</th>
                                    <th width="10%">Alamat</th>
                                    <th width="15%">No. WA</th>
                                    <th width="10%">Jenis Usaha</th>
                                    <th width="15%">Foto Usaha</th>
                                    <th width="15%">Foto Penangggung Jawab</th>

                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-xl" id="modal_data_mitra_box" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel_data_mitra_box"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" id="form_data_mitra_box" method="post">
                    <input class="form-control" type="hidden" value="" name="id" id="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-4 col-form-label">Nama Usaha</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" value="" name="nama_usaha" id="nama_usaha">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-4 col-form-label">Nama Penangggung
                                    Jawab</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" value="" name="nama_penanggung_jawab"
                                        id="nama_penanggung_jawab">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-4 col-form-label">No. WA</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" value="" name="no_wa" id="no_wa">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-4 col-form-label">Jenis Usaha</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" value="" name="jenis_usaha"
                                        id="jenis_usaha">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-4 col-form-label">Alamat</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" value="" name="alamat" id="alamat"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-4 col-form-label">Lokasi</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" value="" name="latlong_lokasi"
                                        id="latlong_lokasi">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-4 col-form-label">Keterangan</label>
                                <div class="col-md-8">
                                    <textarea class="form-control opsional" value="" name="keterangan" id="keterangan"
                                        rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-6">
                            <div class="mb-3 row">
                                <label class="col-md-4 col-form-label">Foto Usaha</label>
                                <div class="col-md-8">
                                    <div class="text-center">
                                        <img class="preview_usaha rounded" id="preview_usaha"
                                            src="<?php echo base_url(); ?>/images/none.png" width="50%"></img>
                                    </div>
                                    <br>
                                    <input class="form-control opsional" type="file" accept=".jpg, .jpeg, .png"
                                        name="foto_usaha" id="foto_usaha">
                                    <!-- <input type="hidden" id="path_usaha" name="path_usaha"> -->
                                </div>
                            </div>
                        </div>
                        <div class=" col-md-6">
                            <div class="mb-3 row">
                                <label class="col-md-4 col-form-label">Foto Penangggung
                                    Jawab</label>
                                <div class="col-md-8">
                                    <div class="text-center">
                                        <img class="preview_penanggung_jawab rounded" id="preview_penanggung_jawab"
                                            src="<?php echo base_url(); ?>/images/none.png" width="50%"></img>
                                    </div>
                                    <br>
                                    <input class="form-control opsional" type="file" accept=".jpg, .jpeg, .png"
                                        id="foto_penanggung_jawab" name="foto_penanggung_jawab">
                                    <!-- <input type="hidden" id="path_penanggung_jawab" name="path_penanggung_jawab"> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary saveBtn"></button>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>