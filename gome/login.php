<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);


$conn = new mysqli("localhost", "your_db_username", "your_db_password", "your_db_name");


if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
if ($conn->query($sql) === TRUE) {
echo "Signup successful!";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>