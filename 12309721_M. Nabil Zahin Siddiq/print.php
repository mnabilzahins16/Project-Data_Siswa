<?php
    session_start();

    if (isset($_SESSION['data_siswa']) == "") {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data</title>

    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <h1>Data Siswa</h1>

    <table>
        <tr>
            <th>Nama</th>
            <th>Nis</th>
            <th>Rayon</th>
        </tr>
        <?php foreach ($_SESSION['data_siswa'] as $key => $item): ?>
        <tr>
            <td><?= htmlspecialchars($item['nama']); ?></td>
            <td><?= htmlspecialchars($item['nis']); ?></td>
            <td><?= htmlspecialchars($item['rayon']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <div class="button-group-print">
        <a href=""><button type="button" onclick="window.print()" class="btn-cetak">Cetak</button></a>
        <a href="index.php"><button type="button" class="btn-kembali-print">Kembali</button></a>
    </div>
</body>
</html>