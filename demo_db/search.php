<?php

// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error);
}

// รับคำค้นหาจากฟอร์ม
$search = $_GET['search'];

// สร้างคำสั่ง SQL เพื่อค้นหาข้อมูล
$sql = "SELECT * FROM table_name WHERE column_name LIKE '%$search%'";

// ทำการค้นหาข้อมูล
$result = $conn->query($sql);

// ตรวจสอบว่ามีข้อมูลที่พบหรือไม่
if ($result->num_rows > 0) {
    // แสดงข้อมูลที่พบ
    while($row = $result->fetch_assoc()) {
        echo "ชื่อ: " . $row["first_name"]. " - นามสกุล: " . $row["last_name"]. "<br>";
    }
} else {
    echo "ไม่พบข้อมูลที่ตรงกับคำค้นหา";
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
