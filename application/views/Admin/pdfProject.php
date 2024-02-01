<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Project</title>
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
            <center>PROJECT</center>
        </h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Project ID</th>
                    <th>Nama Project</th>
                </tr>
            </thead>
            <?php foreach ($project->result() as $row): ?>
                <tr>
                    <td>
                        <?= $row->project_id; ?>
                    </td>
                    <td>
                        <?= $row->nama_project; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- load jquery js file -->
</body></html>