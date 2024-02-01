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
                            Pengguna
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
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#Modal">
                                    <i class="fa fa-plus"></i>
                                    Add Row
                                </button>
                                <a class="btn btn-warning btn-round ml-12"
                                    href="<?= base_url('Admin/cetakPdfUserProject'); ?>">
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
                                            <form action="addUserProject" method="post">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="defaultSelect">Username</label>
                                                            <select class="form-control form-control" id="username" name="username" required>
                                                                <option value="">-- Pilih Username --</option>
                                                                    <?php foreach ($userId as $item) : ?>
                                                                        <option value="<?= $item['username']; ?>" data-departemen="<?= $item['departemen_id'] ?>"><?= $item['departemen_id']; ?> - <?= $item['username']; ?></option>
                                                                    <?php endforeach; ?>
                                                            </select>

                                                            <input type="hidden" id="departemen_id" name="departemen_id">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label for="defaultSelect">Project Id</label>
                                                            <select class="form-control form-control" id="defaultSelect" name="project_id">
                                                            <option value="">-- Pilih Project --</option>
                                                                <?php foreach ($projectId as $item) : ?>
                                                                    <option value="<?= $item['project_id']; ?>"><?= $item['project_id']; ?> - <?= $item['nama_project']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Nama Project</label>
                                                            <input id="nama_project" name="nama_project" type="text"
                                                                class="form-control" placeholder="Isi Nama Project">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Deskripsi</label>
                                                            <input id="deskripsi" name="deskripsi" type="text"
                                                                class="form-control" placeholder="Isi Nama Project">
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
                                            <th>Id</th>
                                            <th>Username</th>
                                            <th>Project ID</th>
                                            <th>Departemen ID</th>
                                            <th>Nama Project</th>
                                            <th>Deskripsi</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Username</th>
                                            <th>Project ID</th>
                                            <th>Departemen ID</th>
                                            <th>Nama Project</th>
                                            <th>Deskripsi</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($userProject->result() as $row): ?>
                                            <tr>
                                                <td>
                                                    <?= $row->id; ?>
                                                </td>
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
                                                <td>
                                                    <div class="form-button-action">
                                                        <button type="button" data-toggle="modal" title=""
                                                            data-target="#editModal<?= $row->id; ?>" class="btn btn-link btn-primary btn-lg"
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
                <form action="<?= base_url('admin/deleteUserProject/' . $row->id); ?>" method="post">
                    <input type="hidden" name="id" value=" <?= $row->id; ?> ">
                    <button class="btn btn-primary">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php foreach ($userProject->result() as $row): ?>
<div class="modal fade" id="editModal<?= $row->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                <form action="<?= base_url('admin/editUserProject/' . $row->id); ?>" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Id</label>
                                <input id="id" name="id" type="text" class="form-control"
                                value="<?= $row->id ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label for="defaultSelect">Username</label>
                                <select class="form-control form-control" id="defaultSelect" name="username">
                                    <option value="<?= $row->username ?>" selected><?= $row->username ?></option>
                                    <?php foreach ($userId as $item) : ?>
                                        <option value="<?= $item['username']; ?>" data-departemen="<?= $item['departemen_id'] ?>">
                                        <?php if (!empty($item['username']) && !empty($item['departemen_id'])) : ?>
                                            <?= $item['departemen_id']; ?> - <?= $item['username']; ?>
                                            <?php endif; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <input type="hidden" id="departemen_id" name="departemen_id" value="<?= $row->departemen_id ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label for="defaultSelect">Project Id</label>
                                <select class="form-control form-control" id="defaultSelect" name="project_id">
                                    <option value="<?= $row->project_id ?>"><?= $row->project_id ?></option>
                                    <?php foreach ($projectId as $item) : ?>
                                        <option value="<?= $item['project_id']; ?>"><?= $item['project_id']; ?> - <?= $item['nama_project']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Nama Project</label>
                                <input id="nama_project" name="nama_project" type="text" class="form-control"
                                value="<?= $row->nama_project ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Deskripsi</label>
                                <input id="deskripsi" name="deskripsi" type="text" class="form-control"
                                value="<?= $row->deskripsi ?>">
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

<script>
    // Tambahkan event listener ke elemen select
    document.getElementById('username').addEventListener('change', function () {
        // Dapatkan opsi yang dipilih
        var selectedOption = this.options[this.selectedIndex];
        
        // Tetapkan nilai dari input hidden ke atribut data-departemen dari opsi yang dipilih
        document.getElementById('departemen_id').value = selectedOption.getAttribute('data-departemen');
    });
</script>