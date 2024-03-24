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
                        <table id="table_laporan_kolektif" class="table table-striped table-bordered"
                            style="width:100%;">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>

                                    <th width="12%">ID Canvaser</th>
                                    <th width="12%">ID Box</th>
                                    <th width="17%">Jumlah Kolektif</th>
                                    <th width="15%">Tanggal Kolektif</th>
                                    <th width="24%">Keterangan</th>

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

<div class="modal fade bs-example-modal-lg" id="modal_laporan_kolektif" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel_laporan_kolektif"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" id="form_laporan_kolektif" method="post">
                    <input class="form-control" type="hidden" value="" name="id" id="id">
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">ID Canvaser</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="" name="id_canvaser" id="id_canvaser">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">ID Box</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="" name="id_box" id="id_box">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Jumlah Kolektif</label>
                        <div class="col-md-10">
                            <input class="form-control" type="number" min="0" step="500" value="" name="jumlah_kolektif"
                                id="jumlah_kolektif">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Tanggal Kolektif</label>
                        <div class="col-md-10">
                            <input class="form-control" type="date" value="" name="tanggal_kolektif"
                                id="tanggal_kolektif">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Keterangan</label>
                        <div class="col-md-10">
                            <input class="form-control opsional" type="date" value="" name="keterangan" id="keterangan">
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