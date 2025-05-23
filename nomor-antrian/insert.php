<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    require_once "../config/database.php";

    header('Content-Type: application/json');

    $tanggal = gmdate("Y-m-d", time() + 60 * 60 * 7);
    $waktu   = gmdate("H:i:s", time() + 60 * 60 * 7);
    $jenis   = $_POST['jenis'] ?? '';

    $allowed = ['bpjs', 'pt', 'umum'];
    if (!in_array(strtolower($jenis), $allowed)) {
        echo json_encode(['status' => 'error', 'message' => 'Jenis tidak valid']);
        exit;
    }

    $query = mysqli_query($mysqli, "SELECT MAX(no_antrian) AS nomor FROM tbl_antrian WHERE tanggal='$tanggal' AND jenis='$jenis'")
             or die(json_encode(['status' => 'error', 'message' => 'Query error: ' . mysqli_error($mysqli)]));

    $data = mysqli_fetch_assoc($query);
    $no_antrian = ($data['nomor'] ?? 0) + 1;

    $insert = mysqli_query($mysqli, "INSERT INTO tbl_antrian (tanggal, jenis, no_antrian) 
                                     VALUES ('$tanggal', '$jenis', '$no_antrian')")
                                     or die(json_encode(['status' => 'error', 'message' => 'Insert error: ' . mysqli_error($mysqli)]));

    echo json_encode([
        'status' => 'success',
        'nomor' => $no_antrian,
        'jenis' => strtoupper($jenis),
        'waktu' => $waktu
    ]);
}
?>