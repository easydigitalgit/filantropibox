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
                        <table id="table_data_user"
                            class="table table-striped table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>

                                    <th>NIK</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Level User</th>
                                    <th>Foto</th>

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

<div class="modal fade bs-example-modal-lg" id="modal_data_user" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel_data_siswa">Form Data Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" id="form_data_user" method="post">
                    <input class="form-control" type="hidden" value="" name="id" id="id">
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">NIK</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="" name="nik" id="nik">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Username</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="" name="username" id="username">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Password</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="" name="password" id="password">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Level User</label>
                        <div class="col-md-10">
                            <select class="form-select" value="" name="level_user" id="level_user">
                                <option class="d-none" value="">--Pilih--</option>

                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-4 col-form-label">Foto</label>
                        <div class="col-md-8">
                            <div class="text-center">
                                <img class="preview_profil rounded" id="preview_profil"
                                    src="<?php echo base_url(); ?>/images/none.png" width="50%"></img>
                            </div>
                            <br>
                            <input class="form-control opsional" type="file" accept=".jpg, .jpeg, .png" name="profil"
                                id="profil">
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