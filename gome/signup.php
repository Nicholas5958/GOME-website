
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$email = $_POST["email"];
$password = $_POST["password"];


$conn = new mysqli("localhost", "your_db_username", "your_db_password", "your_db_name");


if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}



$sql = "SELECT id, password FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
$row = $result->fetch_assoc();
if (password_verify($password, $row["password"])) {
echo "Login successful! Welcome, " .$email;
} else {
echo "Invalid password";
}
} else {
echo "Username not found";
}

$conn->close();
}
?>


