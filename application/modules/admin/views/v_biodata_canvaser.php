<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18 header-title"></h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active header-title"></li>
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
                        <table id="table_biodata_canvaser"
                            class="table table-striped table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="5%">ID</th>
                                    <th>Nama Lengkap</th>
                                    <th>Kontak</th>
                                    <th>Email</th>
                                    <th>Alamat</th>

                                    <th width="15%">Action</th>
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

<div class="modal fade bs-example-modal-lg" id="modal_biodata_canvaser" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel_biodata_canvaser"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" id="form_biodata_canvaser" method="post">
                    <input class="form-control" type="hidden" value="" name="id" id="id">
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">ID Akun</label>
                        <div class="col-md-10">
                            <input class="form-control opsional" type="text" value="" name="id_akun" id="id_akun">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Nama Lengkap</label>
                        <div class="col-md-10">
                            <input class="form-control opsional" type="text" value="" name="nama" id="nama">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Kontak</label>
                        <div class="col-md-10">
                            <input class="form-control opsional" type="text" value="" name="kontak" id="kontak">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-10">
                            <input class="form-control opsional" type="email" value="" name="email" id="email">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Alamat</label>
                        <div class="col-md-10">
                            <input class="form-control opsional" type="text" value="" name="alamat" id="alamat">
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