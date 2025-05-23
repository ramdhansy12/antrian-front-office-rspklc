<?php
ob_clean();
header('Content-Type: application/json');

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
    require_once "../config/database.php";

    if (isset($_POST['id']) && is_numeric($_POST['id']) && isset($_POST['loket'])) {
        $id = (int)$_POST['id'];
        $loket = (int)$_POST["loket"];
        $status = 1;
        $updated_date = gmdate("Y-m-d H:i:s", time() + 60 * 60 * 7);

        $query = "UPDATE tbl_antrian SET status = ?, loket = ?, updated_date = ? WHERE id = ?";
        $stmt = $mysqli->prepare($query);

        if ($stmt) {
            $stmt->bind_param("iisi", $status, $loket, $updated_date, $id);
            if ($stmt->execute()) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Execute failed']);
            }
            $stmt->close();
        } else {
            echo json_encode(['success' => false, 'error' => 'Query prepare error']);
        }

        $mysqli->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid ID or Loket']);
    }
} else {
    http_response_code(403);
    echo json_encode(['success' => false, 'error' => 'Forbidden']);
}
exit;