<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *"); // cho phép domain khác gọi
header("Content-Type: application/json");

// Thông tin DB InfinityFree
$host = "sql205.infinityfree.com";
$user = "if0_40684966";
$pass = "lF9REx2NKJi";
$dbname = "if0_40684966_project1";

// Kết nối DB
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    echo json_encode([
        "status" => "error",
        "message" => $conn->connect_error
    ]);
    exit;
}

// Lấy dữ liệu
$sql = "SELECT message FROM demo LIMIT 1";
$result = $conn->query($sql);

if ($row = $result->fetch_assoc()) {
    echo json_encode([
        "status" => "success",
        "message" => $row["message"]
    ]);
} else {
    echo json_encode([
        "status" => "success",
        "message" => "No data"
    ]);
}

$conn->close();
