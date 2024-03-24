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
                        <table id="table_daftar_box" class="table table-striped table-bordered" style="width:100%;">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>

                                    <th>ID Box</th>
                                    <th>ID Mitra</th>
                                    <th>Gambar</th>

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

<div class="modal fade bs-example-modal-lg" id="modal_daftar_box" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel_daftar_box"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" id="form_daftar_box" method="post">
                    <input class="form-control" type="hidden" value="" name="id" id="id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-4 col-form-label">ID Box</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" value="" name="id_box" id="id_box">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-4 col-form-label">ID Mitra</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" value="" name="mitra_id" id="mitra_id">
                                </div>
                            </div>
                        </div>
                        <div class=" col-md-12">
                            <div class="mb-3 row">
                                <label class="col-md-4 col-form-label">Foto Box</label>
                                <div class="col-md-8">
                                    <div class="text-center">
                                        <img class="preview_box rounded" src="<?php echo base_url(); ?>/images/none.png"
                                            width="50%"></img>
                                    </div>
                                    <br>
                                    <input class="form-control opsional" type="file" accept=".jpg, .jpeg, .png"
                                        name="foto_box" id="foto_box">
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