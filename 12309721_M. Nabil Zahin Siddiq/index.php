<?php
    session_start();
    $dataSiswa = null;
    $buttonHapus = null;
    $buttonPrint = null;
    
    if(isset($_POST['btn'])) {
        $nama = $_POST['nama'];
        $nis = $_POST['nis'];
        $rayon = $_POST['rayon'];
        $dataAwal = false;

        if(isset($_SESSION['data_siswa'])) {
            foreach($_SESSION['data_siswa'] as $data) {
                if($data['nis'] == $nis) {
                    $dataAwal = true;
                    break;
                }
            }
        }

        if($dataAwal) {
            echo "<script type='text/javascript'>alert('NIS telah ada');</script>";
        } else {
            $_SESSION['data_siswa'][] = [
                'nama' => $nama,
                'nis' => $nis,
                'rayon' => $rayon
            ];
        }
    }

    if(empty($_SESSION['data_siswa'])) {
        $message = "<p class='warning-message-red'>Tolong masukkan data!!!</p>";
    } else if (isset($_SESSION['data_siswa'])) {
        $message = "<p class='warning-message-green'>Data berhasil ditambahkan</p>";
    }

    if(isset($_SESSION['data_siswa']) && !empty($_SESSION['data_siswa'])) {
        $buttonPrint = "<a href='print.php'><button type='button' class='btn-cetak'>Cetak</button></a>";
        $buttonHapus = "<a href='hapusall.php'><button type='button' class='btn-hapus'>Hapus Data</button></a>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>

    <link rel="stylesheet" href="./style/style.css">
</head>
<body>

    <h1>Data Siswa</h1>

    <form action="" method="POST">
        <div class="form-group">
            <div class="form-group-child">
                <label for="nama">Masukkan nama</label>
                <input type="text" name="nama" id="nama" required>
            </div>
            <div class="form-group-child">
                <label for="nis">Masukkan NIS</label>
                <input type="number" name="nis" id="nis" required>
            </div>
            <div class="form-group-child">
                <label for="rayon">Masukkan rayon</label>
                <input type="text" name="rayon" id="rayon" required>
            </div>
        </div>

        <div class="button-group">
            <a href=""><button type="submit" name="btn" id="btn" class="btn-submit">Input Data</button></a>
            <?= $buttonHapus; ?>
            <?= $buttonPrint; ?>
        </div>
    </form>


    <div class="warning-message">
        <?= $message; ?>
    </div>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIS</th>
            <th>Rayon</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1;?>
        <?php if(isset($_SESSION['data_siswa']) && is_array($_SESSION['data_siswa']) ): ?>
        <?php foreach ($_SESSION['data_siswa'] as $key => $item): ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= htmlspecialchars($item['nama']); ?></td>
            <td><?= htmlspecialchars($item['nis']); ?></td>
            <td><?= htmlspecialchars($item['rayon']); ?></td>
            <td>
                <a href="hapus.php?id=<?= $key ;?>" class="link-hapus">Hapus</a>
                <a href="detail.php?id=<?= $key ;?>" class="link-detail">Detail</a>
                <a href="edit.php?id=<?= $key ;?>" class="link-edit">Edit</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </table>
</body>
</html>