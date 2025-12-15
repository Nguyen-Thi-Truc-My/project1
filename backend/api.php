<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *"); 
header("Content-Type: application/json");

// Thông tin DB (Render PostgreSQL hoặc MySQL add-on)
$host = getenv('DB_HOST');      // render environment variables
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$dbname = getenv('DB_NAME');

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    echo json_encode(["status"=>"error","message"=>$conn->connect_error]);
    exit;
}

$sql = "SELECT message FROM demo LIMIT 1";
$result = $conn->query($sql);

if ($row = $result->fetch_assoc()) {
    echo json_encode(["status"=>"success","message"=>$row["message"]]);
} else {
    echo json_encode(["status"=>"success","message"=>"No data"]);
}

$conn->close();
