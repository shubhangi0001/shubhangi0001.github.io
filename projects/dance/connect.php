<?php
$servername = "localhost"; // Replace with your server name, often it's "localhost"
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$database = "gracesteps"; // Replace with your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$Name = $_POST['Name'];
$PhoneNumber = $_POST['Phone_Number'];
$Date = $_POST['Date'];
$name = $_POST['name'];
$Time = $_POST['Time'];
$Message = $_POST['Message'];

// SQL query to insert data into the reservations table
$sql = "INSERT INTO reservation (Name, PhoneNumber, Date, name, Time, Message)
VALUES ('$Name', '$PhoneNumber', '$Date', '$name', '$Time', '$Message')";

if ($conn->query($sql) === TRUE) {
    // Reservation successful, redirect to reservation.html
    header("Location: index.html");
    exit(); // Ensure that subsequent code is not executed after redirection
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>