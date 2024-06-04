<?php

    session_start();
    $update = null;

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $value = null;
        foreach ($_SESSION['data_siswa'] as $key => $data) {
            if ($key == $id) {
                $value = $data;
            }
        }

        if($value == null) {
            header('Location: index.php');
            exit;
        }
    }

    if(isset($_POST['btn-edit'])) {
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
            $_SESSION['data_siswa'][$id] = [
                'nama' => $nama,
                'nis' => $nis,
                'rayon' => $rayon
            ];
        
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
    <title>Document</title>

    <link rel="stylesheet" href="./style/style.css">
</head>
<body>

    <h1>Edit Data Siswa</h1>

    <form action="" method="POST">
        <div class="form-group-edit">
            <div class="form-group-edit-child">
                <label for="nama">Nama</label>
                <input value="<?= $value['nama']; ?>" type="text" name="nama" id="nama" required>
            </div>
            <div class="form-group-edit-child">
                <label for="nis">NIS</label>
                <input value="<?= $value['nis']; ?>" type="number" name="nis" id="nis" required>
            </div>
            <div class="form-group-edit-child">
                <label for="rayon">Rayon</label>
                <input value="<?= $value['rayon']; ?>" type="text" name="rayon" id="rayon" required>
            </div>
        </div>

        <div class="button-group-edit">
            <a href=""><button type="submit" name="btn-edit" id="btn-edit" class="btn-edit">Edit</button></a>
            <a href="index.php"><button type="button" class="btn-kembali-edit">Batal</button></a>
        </div>
    </form>
</body>
</html>