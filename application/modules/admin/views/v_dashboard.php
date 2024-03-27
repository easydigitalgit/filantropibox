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
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Capaian</p>
                                        <h4 class="mb-0" id="capaian">0</h4>
                                    </div>

                                    <div class="avatar-sm rounded-circle bg-success align-self-center mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-success">
                                            Rp.
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Canvaser</p>
                                        <h4 class="mb-0" id="canvaser">0</h4>
                                    </div>

                                    <div class="avatar-sm rounded-circle bg-warning align-self-center mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-warning">
                                            <i class='bx bx-user font-size-24'></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Jumlah Box</p>
                                        <h4 class="mb-0" id="jumlah_box">0</h4>
                                    </div>

                                    <div class="avatar-sm rounded-circle bg-danger align-self-center mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-danger">
                                            <i class='bx bx-box font-size-24'></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Program</p>
                                        <h4 class="mb-0" id="program">0</h4>
                                    </div>

                                    <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class='bx bx-calendar-event font-size-24'></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-5">
                <div class="card overflow-hidden">
                    <div class="card-body pt-0">
                        <div class="row">
                            <h4 class="alert alert-info text-center mt-2 p-3">Table Capaian Mitra</h4>
                            <table id="table_capaian_mitra"
                                class="table table-striped dt-responsive dataTable nowrap w-100">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th>Nama Mitra</th>
                                        <th>Capaian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h4 class="card-title mb-2">Chart Capaian Mitra</h4>
                            <div class="ms-auto mt-3">
                                <canvas id="chart" height="277"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>