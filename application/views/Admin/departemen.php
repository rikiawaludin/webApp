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
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="card-title">
                                    <?= $title; ?>
                                </h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#Modal">
                                    <i class="fa fa-plus"></i>
                                    Add Row
                                </button>
                                <a class="btn btn-warning btn-round ml-12"
                                    href="<?= base_url('Admin/cetakPdfDepartemen'); ?>">
                                    <i class="fas fa-file-export"></i>
                                    Export PDF</a>
                            </div>
                            <br>
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                            <form action="addDepartemen" method="post">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Nama Departemen</label>
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
                            </div>

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Departemen Id</th>
                                            <th>Nama Departemen</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Departemen Id</th>
                                            <th>Nama Departemen</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($departemen->result() as $row): ?>
                                            <tr>
                                                <td>
                                                    <?= $row->departemen_id; ?>
                                                </td>
                                                <td>
                                                    <?= $row->nama_departemen; ?>
                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <button type="button" data-toggle="modal" title=""
                                                            data-target="#editModal<?= $row->departemen_id; ?>"
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
                <form action="<?= base_url('admin/deleteDepartemen/' . $row->departemen_id); ?>" method="post">
                    <input type="hidden" name="departemen_id" value=" <?= $row->departemen_id; ?> ">
                    <button class="btn btn-primary">Delete</buttom>
                </form>
            </div>
        </div>
    </div>
</div>

<?php foreach ($departemen->result() as $row): ?>
    <div class="modal fade" id="editModal<?= $row->departemen_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                    <form action="<?= base_url('admin/editDepartemen/' . $row->departemen_id); ?>" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Departemen Id</label>
                                    <input id="departemen_id" name="departemen_id" type="text" class="form-control"
                                        value="<?= $row->departemen_id ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Nama Departemen</label>
                                    <input id="nama_departemen" name="nama_departemen" type="text" class="form-control"
                                        value="<?= $row->nama_departemen ?>" required>
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