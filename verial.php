<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "veriler";

$conn = new mysqli($host, $user, $pass, $db);

$temp = $_GET['temp'];
$hum = $_GET['hum'];
$soil = $_GET['soil'];
$rain = $_GET['rain'];

$stmt = $conn->prepare("INSERT INTO sensor_data (temperature, humidity, soil_moisture, is_raining) VALUES (?, ?, ?, ?)");
$stmt->bind_param("dddi", $temp, $hum, $soil, $rain);
$stmt->execute();

echo "OK";
?>
