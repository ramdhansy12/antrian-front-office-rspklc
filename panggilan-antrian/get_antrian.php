<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
  require_once "../config/database.php";
  $tanggal = gmdate("Y-m-d", time() + 60 * 60 * 7);

  // $sql = "SELECT id, no_antrian, jenis, status, loket FROM antrian ORDER BY id DESC";
  $query = mysqli_query($mysqli, "SELECT id, no_antrian, status, jenis, loket FROM tbl_antrian 
                                  WHERE tanggal='$tanggal'")
           or die('Query error: ' . mysqli_error($mysqli));

  $rows = mysqli_num_rows($query);
  $response = array();
  $response["data"] = array();

  if ($rows > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
      $data['id']         = $row["id"];
      $data['no_antrian'] = $row["no_antrian"];
      $data['status']     = $row["status"];
      $data['jenis']      = $row["jenis"]; // Tetap VARCHAR
      $data['loket']      = $row["loket"];
      $response["data"][] = $data;
    }
  } else {
    $response["data"][] = [
      'id'         => "",
      'no_antrian' => "-",
      'status'     => "",
      'jenis'      => "",
      'loket'      => ""
    ];
  }

  echo json_encode($response);
}
  // jika data tidak ada
  else {
    $response         = array();
    $response["data"] = array();

    // buat data kosong untuk ditampilkan
    $data['id']         = "";
    $data['no_antrian'] = "-";
    $data['status']     = "";

    array_push($response["data"], $data);

    // tampilkan data
    echo json_encode($response);
  }