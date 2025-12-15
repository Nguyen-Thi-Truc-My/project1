<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");



// Kết nối DB và trả dữ liệu
$host = "sql205.infinityfree.com";
$user = "if0_40684966";
$pass = "lF9REx2NKJi";
$dbname = "if0_40684966_project1";

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
