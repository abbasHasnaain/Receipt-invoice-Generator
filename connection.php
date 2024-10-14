<?php
// $servername = "ftp.clients.website"; // Replace with your database host, often "localhost"
// $username = "clientwb_kmsapp"; // Replace with your database username
// $password = "KMS2024"; // Replace with your database password
// $database = "clientwb_kmsapp"; // Replace with your database name
$servername="localhost";
$username="root";
$password="";
$database="khadeerboy";





// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Uncomment the following line if you want to set the character set (optional)
// $conn->set_charset("utf8");

// The connection is now established, and you can use the $conn variable for database queries.

?>
