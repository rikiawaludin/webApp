<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">
                    <?= $title; ?>
                </h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            Departemen IT
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">
                            <?= $title; ?>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">
                                    <?= $title; ?>
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <!-- <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold">
                                                    Kumpulkan</span>
                                                <span class="fw-light">
                                                    Project
                                                </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <form action="addDepartemen" method="post">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Project</label>
                                                            <input id="nama_departemen" name="nama_departemen"
                                                                type="text" class="form-control"
                                                                placeholder="Isi Nama Departemen">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer no-bd">
                                                    <button type="submit" class="btn btn-primary">Add</button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Project ID</th>
                                            <th>Departemen ID</th>
                                            <th>Nama Project</th>
                                            <th>Deskripsi</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Username</th>
                                            <th>Project ID</th>
                                            <th>Departemen ID</th>
                                            <th>Nama Project</th>
                                            <th>Deskripsi</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($user_project->result() as $row): ?>
                                            <tr>
                                                <td>
                                                    <?= $row->username; ?>
                                                </td>
                                                <td>
                                                    <?= $row->project_id; ?>
                                                </td>
                                                <td>
                                                    <?= $row->departemen_id; ?>
                                                </td>
                                                <td>
                                                    <?= $row->nama_project; ?>
                                                </td>
                                                <td>
                                                    <?= $row->deskripsi; ?>
                                                </td>
                                                <!-- <td>
                                                    <div class="form-button-action">
                                                        <button type="button" data-toggle="modal" title=""
                                                            data-target="#Modal"
                                                            class="btn btn-link btn-primary btn-lg"
                                                            data-original-title="Kumpulkan Project">
                                                            <i class="fas fa-tasks"></i>
                                                        </button>
                                                    </div>
                                                </td> -->
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin Keluar?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin akan menghapus data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <form action="" method="post">
                    <input type="hidden" name="departemen_id" value=" <?= $row->departemen_id; ?> ">
                    <button class="btn btn-primary">Delete</buttom>
                </form>
            </div>
        </div>
    </div>
</div>