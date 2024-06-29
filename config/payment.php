<?php
    header('Content-Type: application/json');

    $postData = file_get_contents('php://input');
    $data = json_decode($postData, true);

    if ($data) {
        echo json_encode([  'status' => 'success', 'data' => $data]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No data received or invalid JSON']);
    }
?>