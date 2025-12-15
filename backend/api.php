<?php
header("Content-Type: application/json");

// Thông tin DB
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "demo_git";

// Kết nối
$conn = new mysqli($host, $user, $pass, $dbname);

// Kiểm tra lỗi
if ($conn->connect_error) {
    echo json_encode([
        "status" => "error",
        "message" => "Kết nối DB thất bại"
    ]);
    exit;
}

// Query
$sql = "SELECT message FROM demo LIMIT 1";
$result = $conn->query($sql);

if ($result && $row = $result->fetch_assoc()) {
    echo json_encode([
        "status" => "success",
        "message" => $row["message"]
    ]);
} else {
    echo json_encode([
        "status" => "success",
        "message" => "Hello from Backend PHP"
    ]);
}

$conn->close();
