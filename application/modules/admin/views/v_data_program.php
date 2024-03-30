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
                        <table id="table_data_program" class="table table-striped table-bordered" style="width:100%;">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>

                                    <th width="10%">Nama Program</th>
                                    <th width="5%">Kategori</th>
                                    <th width="20%">Keterangan</th>
                                    <th width="10%">Mulai</th>
                                    <th width="10%">Berakhir</th>

                                    <th width="15%">Aksi</th>
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

<div class="modal fade bs-example-modal-lg" id="modal_data_program" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel_data_program"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" id="form_data_program" method="post">
                    <input class="form-control" type="hidden" value="" name="id" id="id">
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Nama
                            Program</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="" name="nama_program" id="nama_program">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Kategori</label>
                        <div class="col-md-10">
                            <select class="form-select" value="" name="kategori" id="kategori">
                                <option class="d-none" value="">--Pilih--</option>

                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label opsional">Keterangan</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Mulai</label>
                        <div class="col-md-10">
                            <input class="form-control" type="date" value="" name="mulai" id="mulai">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Berakhir</label>
                        <div class="col-md-10">
                            <input class="form-control" type="date" value="" name="berakhir" id="berakhir">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">Foto Program</label>
                        <div class="col-md-10">
                            <div class="text-center">
                                <img class="preview_gambar rounded" src="<?php echo base_url(); ?>/images/none.png"
                                    width="50%"></img>
                            </div>
                            <br>
                            <input class="form-control opsional" type="file" accept=".jpg, .jpeg, .png" name="gambar"
                                id="gambar">
                            <!-- <input type="hidden" id="path_usaha" name="path_usaha"> -->
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