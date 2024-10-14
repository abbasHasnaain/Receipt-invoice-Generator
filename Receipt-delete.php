<?php
// Include your database connection file
include 'connection.php';

// Check if the bill_no parameter is set in the URL
if (isset($_GET['id'])) {
    // Get the bill_no from the URL
    $bill_no = $_GET['id'];

    // SQL to delete the row with the specified bill_no
    $sql = "DELETE FROM receipt WHERE bill_no = ?";

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $bill_no); // Assuming bill_no is an integer

    // Execute the statement
    if ($stmt->execute()) {
        // Record deleted successfully, you can redirect to another page or show a success message
        header("Location: Receipt.php");
        exit();
    } else {
        // Error in execution, you can redirect to an error page or show an error message
        echo "Error: " . $conn->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
