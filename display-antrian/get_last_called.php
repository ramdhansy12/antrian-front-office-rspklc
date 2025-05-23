<?php
require_once "../config/database.php";


// Ambil antrian terakhir dengan status = 1 (sudah dipanggil)
$query = mysqli_query($mysqli, "SELECT nomor_antrian, jenis_layanan 
                                FROM tbl_antrian 
                                WHERE status = 1 
                                ORDER BY updated_date DESC 
                                LIMIT 1");

$data = mysqli_fetch_assoc($query);

echo json_encode([
  'nomor' => $data['nomor_antrian'] ?? null,
  'jenis' => $data['jenis_layanan'] ?? null
]);