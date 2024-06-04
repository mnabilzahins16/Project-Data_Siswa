<?php
    session_start();

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        unset($_SESSION['data_siswa'][$id]);
        header('Location: index.php');
        exit;
    }