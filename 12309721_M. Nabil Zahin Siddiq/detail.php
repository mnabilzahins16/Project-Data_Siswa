<?php

    session_start();
    $update = null;
    $key = 0;

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $detail = null;
        foreach ($_SESSION['data_siswa'] as $key => $data) {
            if ($key == $id) {
                $detail = $data;
            }
        }

        if($detail == null) {
            header('Location: index.php');
            exit;
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>

    <link rel="stylesheet" href="./style/style.css">
</head>
<body>

    <h1>Detail Data Siswa</h1>

    <table>
        <tr>
            <th>Nama</th>
            <th>Nis</th>
            <th>Rayon</th>
        </tr>
        <tr>
            <td><?= htmlspecialchars($detail['nama']) ?></td>
            <td><?= htmlspecialchars($detail['nis']) ?></td>
            <td><?= htmlspecialchars($detail['rayon']) ?></td>
        </tr>
    </table>
    <div class="button-group-detail">
        <a href="index.php"><button type="button" class="btn-kembali-detail">Kembali</button></a>
    </div>
</body>
</html>