<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
    require_once "../config/database.php";

    if (isset($_POST['id']) && is_numeric($_POST['id']) && isset($_POST['loket'])) {
        $id = (int)$_POST['id'];
        $loket = $mysqli->real_escape_string($_POST['loket']);
        $status = 1;
        $updated_date = gmdate("Y-m-d H:i:s", time() + 60 * 60 * 7); // WIB

        $query = "UPDATE tbl_antrian 
                  SET status = ?, loket = ?, updated_date = ? 
                  WHERE id = ?";
        $stmt = $mysqli->prepare($query);
        if ($stmt) {
            $stmt->bind_param("issi", $status, $loket, $updated_date, $id);
            $stmt->execute();
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Query prepare error']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid input']);
    }
} else {
    http_response_code(403);
    echo json_encode(['success' => false, 'error' => 'Forbidden']);
}
?>