<?php
require_once "../config/database.php";

$tanggal = gmdate("Y-m-d", time() + 60 * 60 * 7);
$jenis = $_GET['jenis'] ?? '';

$allowed = ['bpjs', 'pt', 'umum'];
if (!in_array(strtolower($jenis), $allowed)) {
    echo 0;
    exit;
}

$query = mysqli_query($mysqli, "SELECT MAX(no_antrian) AS nomor 
                                 FROM tbl_antrian 
                                 WHERE tanggal='$tanggal' AND jenis='$jenis'")
                                 or die('Query error: ' . mysqli_error($mysqli));

$data = mysqli_fetch_assoc($query);
echo $data['nomor'] ?? 0;
?>