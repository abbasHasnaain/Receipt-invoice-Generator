<?php
// Include the database connection file
include 'connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $date = $_POST['date'];
    $ref_no = $_POST['ref_no'];
    $messrs = $_POST['messrs'];
    $company_name = $_POST['company_name'];
    $gst_no = $_POST['gst_no'];
    $ss = $_POST['ss'];
    $ss_from = $_POST['ss_from'];
    $description_of_goods = $_POST['description_of_goods'];
    $bl_no = $_POST['bl_no'];
    $invoice_no = $_POST['invoice_no'];
    $igm_no = $_POST['igm_no'];
    $igm_date = $_POST['igm_date'];
    $index_no = $_POST['index_no'];
    $index_date = $_POST['index_date'];
    $bill_of_entry_no = $_POST['bill_of_entry_no'];
    $bill_of_entry_date = $_POST['bill_of_entry_date'];
    $no_of_packages = $_POST['no_of_packages'];
    $weight = $_POST['weight'];
    $marks_as_per_be = $_POST['marks_as_per_be'];
    $service_charges = $_POST['service_charges'];
    $gst_tax = $_POST['gst_tax'];
    $grand_total = $_POST['grand_total'];
    $rupees_in_text = $_POST['rupees_in_text'];

    // Prepare and execute the SQL query to insert data into the table
    $sql = "INSERT INTO sales_tax_invoice (date, ref_no, messrs, company_name, gst_no, ss, ss_from, description_of_goods, bl_no, invoice_no, igm_no, igm_date, index_no, index_date, bill_of_entry_no, bill_of_entry_date, no_of_packages, weight, marks_as_per_be, service_charges, gst_tax, rupees_in_text, grand_total) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssssssssssssss", $date, $ref_no, $messrs, $company_name, $gst_no, $ss, $ss_from, $description_of_goods, $bl_no, $invoice_no, $igm_no, $igm_date, $index_no, $index_date, $bill_of_entry_no, $bill_of_entry_date, $no_of_packages, $weight, $marks_as_per_be, $service_charges, $gst_tax, $rupees_in_text, $grand_total);

    if ($stmt->execute()) {
        // Record inserted successfully
        echo "submit sales tax ";
                header("location:index.php");
    } else {
        // Error inserting record
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If the form is not submitted, redirect or show an error message
    echo "Form not submitted!";
}
?>
