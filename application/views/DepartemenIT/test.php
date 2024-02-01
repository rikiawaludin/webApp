<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Project & Penugasan</title>
    <!-- load bootstrap css file -->
    <link href="<?php echo base_url('assets/assets/assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
</head><body>
    <div class="container">
        <h3>
            <center>DAFTAR PROJECT & PENUGASAN</center>
        </h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Project ID</th>
                    <th>Departemen ID</th>
                    <th>Nama Project</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
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
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- load jquery js file -->
    <script src="<?php echo
        base_url('assets/assets/assets/js/jquery.min.js'); ?>"></script>
    <!-- load bootstrap js file -->
    <script src="<?php echo
        base_url('assets/assets/assets/js/bootstrap.min.js'); ?>"></script>
</body></html>