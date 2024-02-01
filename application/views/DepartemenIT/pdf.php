<!DOCTYPE html>
<html><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head><body>
    <h3 style="text-align: center">Daftar Project & Penugasan</h3>
    <br>
    <table>
        <tr>
            <th>Username</th>
            <th>Project ID</th>
            <th>Departemen ID</th>
            <th>Nama Project</th>
            <th>Deskripsi</th>
        </tr>

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
    </table>
</body></html>