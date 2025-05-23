<?php
header('Content-Type: application/json');
require_once "../config/database.php";

// Ambil antrian terbaru per jenis
$jenis_list = ['bpjs', 'pt', 'umum'];
$data = [];

foreach ($jenis_list as $jenis) {
    $stmt = $mysqli->prepare("SELECT no_antrian, jenis, loket 
                              FROM tbl_antrian 
                              WHERE status = 1 AND jenis = ? 
                              ORDER BY updated_date DESC 
                              LIMIT 1");
    $stmt->bind_param("s", $jenis);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $data[$jenis] = $row;
    } else {
        $data[$jenis] = ['no_antrian' => '-', 'jenis' => $jenis, 'loket' => '-'];
    }
    $stmt->close();
}

$mysqli->close();
echo json_encode($data);
exit;
?>