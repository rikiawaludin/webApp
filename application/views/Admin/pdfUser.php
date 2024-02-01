<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>User</title>
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
            <center>PENGGUNA</center>
        </h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Full Name</th>
                    <th>ID Division</th>
                    <th>Role ID</th>
                    <th>Active</th>
                </tr>
            </thead>
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
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- load jquery js file -->
</body></html>