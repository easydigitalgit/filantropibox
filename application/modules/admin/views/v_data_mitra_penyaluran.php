<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18 dash-title"></h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard'); ?>">Dashboard</a></li>
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
                        <table id="table_data_mitra_penyaluran" class="table table-striped table-bordered"
                            style="width:100%;">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>

                                    <th>Nama Mitra</th>
                                    <th>Jenis Mitra</th>
                                    <th>Alamat</th>
                                    <th width="15%">No. WA</th>
                                    <th>Foto Mitra</th>
                                    <th>Foto Lokasi</th>

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

<div class="modal fade bs-example-modal-xl" id="modal_data_mitra_penyaluran" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel_data_mitra_penyaluran"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" id="form_data_mitra_penyaluran" method="post">
                    <input class="form-control" type="hidden" value="" name="id" id="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-4 col-form-label">Nama Mitra</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" value="" name="nama_mitra" id="nama_mitra">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-4 col-form-label">Jenis Mitra</label>
                                <div class="col-md-8">
                                    <select class="form-select" value="" name="jenis_mitra" id="jenis_mitra">
                                        <option class="d-none" value="">--Pilih--</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-4 col-form-label">Alamat</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" value="" name="alamat" id="alamat">
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
                                <label for="example-text-input" class="col-md-4 col-form-label">No. WA</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" value="" name="no_wa" id="no_wa">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 row organisasi d-none">
                                <label for="example-text-input" class="col-md-4 col-form-label">Nama Penanggung
                                    Jawab</label>
                                <div class="col-md-8">
                                    <input class="form-control opsional" type="text" value=""
                                        name="nama_penanggung_jawab" id="nama_penanggung_jawab">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Keterangan</label>
                        <div class="col-md-10">
                            <textarea class="form-control" value="" name="keterangan" id="keterangan"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-6">
                            <div class="mb-3 row organisasi d-none">
                                <label class="col-md-4 col-form-label">Foto Mitra</label>
                                <div class="col-md-8">
                                    <div class="text-center">
                                        <img class="preview_mitra rounded"
                                            src="<?php echo base_url(); ?>/images/none.png" width="50%"></img>
                                    </div>
                                    <br>
                                    <input class="form-control opsional" type="file" accept=".jpg, .jpeg, .png"
                                        name="foto_mitra" id="foto_mitra">
                                    <!-- <input type="hidden" id="path_usaha" name="path_usaha"> -->
                                </div>
                            </div>
                        </div>
                        <div class=" col-md-6">
                            <div class="mb-3 row organisasi d-none">
                                <label class="col-md-4 col-form-label">Foto Lokasi</label>
                                <div class="col-md-8">
                                    <div class="text-center">
                                        <img class="preview_lokasi rounded"
                                            src="<?php echo base_url(); ?>/images/none.png" width="50%"></img>
                                    </div>
                                    <br>
                                    <input class="form-control opsional" type="file" accept=".jpg, .jpeg, .png"
                                        id="foto_lokasi" name="foto_lokasi">
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