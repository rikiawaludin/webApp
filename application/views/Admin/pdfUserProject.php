<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>User Project</title>
    <!-- load bootstrap css file -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h3 {
            text-align: center;
        }
    </style>
</head><body>
    <div class="container">
        <h3>
            <center>USER PROJECT</center>
        </h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Project ID</th>
                    <th>ID Division</th>
                    <th>Nama Project</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
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
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- load jquery js file -->
</body></html>