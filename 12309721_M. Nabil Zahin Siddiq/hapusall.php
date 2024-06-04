<?php
    session_start();

    unset($_SESSION['data_siswa']);
    header('Location: index.php');
    exit;