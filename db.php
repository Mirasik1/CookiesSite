<?php
$host = 'localhost';
$dbname = 'customers';
$user = 'root'; // Стандартное имя пользователя для MySQL в XAMPP
$password = ''; // Без пароля

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$lastName = $_POST['lastName'];
$firstName = $_POST['firstName'];
$classNumber = $_POST['classNumber'];
$classLetter = $_POST['classLetter'];
$phone = $_POST['phone'];

$sql = "INSERT INTO orders (lastName, firstName, classNumber, classLetter, phone) VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ssiss", $lastName, $firstName, $classNumber, $classLetter, $phone);

if ($stmt->execute()) {
    header("Location: index.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
