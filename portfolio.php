<?php

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];



$conn = new mysqli('localhost', 'root', 'shelby', 'portfoliodb');

if ($conn->connect_error) {
    die('connection failed' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into portfoliotbl(name,email,message) values(?,?,?)");
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();
    header('location: index.html');

    $stmt->close();
    $conn->close();
}
