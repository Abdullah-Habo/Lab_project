<?php

$localhost = "localhost";
$username = "root";
$password = "";
$db = "students_reg";

$conn = new mysqli($localhost, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["full_name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];

    
    $sql = "INSERT INTO students (full_name, email, gender) VALUES ('$fullname', '$email', '$gender')";

    if ($conn->query($sql) === TRUE) {
        echo "Student successfuly registered";
    } else {
        echo "Error inserting data: " . $conn->error;
    }
}

$conn->close();
?>