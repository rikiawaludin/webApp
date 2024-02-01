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
                            Dashboard
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-home">
                        <a href="#">
                            Departemen
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">
                            Project
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
                                <a class="btn btn-warning btn-round ml-auto"
                                    href="<?= base_url('Admin/cetakPdfPengguna'); ?>">
                                    <i class="fas fa-file-export"></i>
                                    Export PDF</a>
                            </div>
                            <br>
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Name</th>
                                            <th>Departemen Id</th>
                                            <th>Role Id</th>
                                            <th>Active</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Name</th>
                                            <th>Departemen Id</th>
                                            <th>Role Id</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($user->result() as $row): ?>
                                            <tr>
                                                <td>
                                                    <?= $row->username; ?>
                                                </td>
                                                <td>
                                                    <?= $row->email; ?>
                                                </td>
                                                <td>
                                                    <?= $row->name; ?>
                                                </td>
                                                <td>
                                                    <?= $row->departemen_id; ?>
                                                </td>
                                                <td>
                                                    <?= $row->role_id; ?>
                                                </td>
                                                <td>
                                                    <?= $row->is_active; ?>
                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <button type="button" data-toggle="modal" title=""
                                                            data-target="#editModal<?= $row->username; ?>"
                                                            class="btn btn-link btn-primary btn-lg"
                                                            data-original-title="Edit Task">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" data-target="#deleteModal" data-toggle="modal"
                                                            title="" class="btn btn-link btn-danger"
                                                            data-original-title="Remove">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        endforeach;
                                        ?>
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
                <h5 class="modal-title" id="exampleModalLabel">Yakin Hapus?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin akan menghapus data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <form action="<?= base_url('admin/deletePengguna/' . $row->username); ?>" method="post">
                    <input type="hidden" name="username" value=" <?= $row->username; ?> ">
                    <button class="btn btn-primary">Delete</buttom>
                </form>
            </div>
        </div>
    </div>
</div>

<?php foreach ($user->result() as $row): ?>
    <div class="modal fade" id="editModal<?= $row->username; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                            New</span>
                        <span class="fw-light">
                            Row
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="small">Create a new row using this form, make sure you fill them
                        all</p>
                    <form action="<?= base_url('admin/editPengguna/' . $row->username); ?>" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Username</label>
                                    <input id="username" name="username" type="text" class="form-control"
                                        value="<?= $row->username ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Email</label>
                                    <input id="email" name="email" type="text" class="form-control"
                                        value="<?= $row->email ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Name</label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        value="<?= $row->name ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Departemen Id</label>
                                    <input id="departemen_id" name="departemen_id" type="text" class="form-control"
                                    value="<?= $row->departemen_id ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Role Id</label>
                                    <input id="role_id" name="role_id" type="text" class="form-control"
                                        value="<?= $row->role_id ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Active</label>
                                    <input id="is_active" name="is_active" type="text" class="form-control"
                                        value="<?= $row->is_active ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer no-bd">
                            <button type="submit" class="btn btn-primary">Add</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>