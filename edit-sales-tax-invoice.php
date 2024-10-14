<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Sales Tax Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php
include 'connection.php';
$update = $_GET['id'];
$sql = "SELECT * FROM sales_tax_invoice WHERE bill_no=$update";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Initialize variables
$bill_no = $row['bill_no'];
$date = $row['date'];
$ref_no = $row['ref_no'];
$company_name = $row['company_name'];
$gst_no = $row['gst_no'];
$ss = $row['ss'];
$ss_from = $row['ss_from'];
$description_of_goods = $row['description_of_goods'];
$bl_no = $row['bl_no'];
$invoice_no = $row['invoice_no'];
$igm_no = $row['igm_no'];
$igm_date = $row['igm_date'];
$index_no = $row['index_no'];
$index_date = $row['index_date'];
$bill_of_entry_no = $row['bill_of_entry_no'];
$bill_of_entry_date = $row['bill_of_entry_date'];
$no_of_packages = $row['no_of_packages'];
$weight = $row['weight'];
$marks_as_per_be = $row['marks_as_per_be'];
$service_charges = $row['service_charges'];
$gst_tax = $row['gst_tax'];
$rupees_in_text = $row['rupees_in_text'];
$grand_total = $row['grand_total'];
$messrs = $row['messrs'];

if (isset($_POST['submit'])) {
    // Retrieve data from the form
    $bill_no = $_POST["bill_no"];
    $date = $_POST["date"];
    $ref_no = $_POST["ref_no"];
    $company_name = $_POST["company_name"];
    $gst_no = $_POST["gst_no"];
    $ss = $_POST["ss"];
    $ss_from = $_POST["ss_from"];
    $description_of_goods = $_POST["description_of_goods"];
    $bl_no = $_POST["bl_no"];
    $invoice_no = $_POST["invoice_no"];
    $igm_no = $_POST["igm_no"];
    $igm_date = $_POST["igm_date"];
    $index_no = $_POST["index_no"];
    $index_date = $_POST["index_date"];
    $bill_of_entry_no = $_POST["bill_of_entry_no"];
    $bill_of_entry_date = $_POST["bill_of_entry_date"];
    $no_of_packages = $_POST["no_of_packages"];
    $weight = $_POST["weight"];
    $marks_as_per_be = $_POST["marks_as_per_be"];
    $service_charges = $_POST["service_charges"];
    $gst_tax = $_POST["gst_tax"];
    $rupees_in_text = $_POST["rupees_in_text"];
    $grand_total = $_POST["grand_total"];
    $messrs = $_POST["messrs"];

    // Update query
    $sql = "UPDATE `sales_tax_invoice` SET 
        `bill_no`='$bill_no', 
        `date`='$date', 
        `ref_no`='$ref_no', 
        `company_name`='$company_name', 
        `gst_no`='$gst_no', 
        `ss`='$ss', 
        `ss_from`='$ss_from', 
        `description_of_goods`='$description_of_goods', 
        `bl_no`='$bl_no', 
        `invoice_no`='$invoice_no', 
        `igm_no`='$igm_no', 
        `igm_date`='$igm_date', 
        `index_no`='$index_no', 
        `index_date`='$index_date', 
        `bill_of_entry_no`='$bill_of_entry_no', 
        `bill_of_entry_date`='$bill_of_entry_date', 
        `no_of_packages`='$no_of_packages', 
        `weight`='$weight', 
        `marks_as_per_be`='$marks_as_per_be', 
        `service_charges`='$service_charges', 
        `gst_tax`='$gst_tax', 
        `rupees_in_text`='$rupees_in_text', 
        `grand_total`='$grand_total', 
        `messrs`='$messrs' 
        WHERE `bill_no`='$update'";

    // Execute the update query
    mysqli_query($conn, $sql);
    header("location: index.php");
}
?>


    <div class="container mt-5">
        <h2 class="text-center">Create Sales Tax Invoice</h2>
        <form method="post" action="process-sales-tax-invoice.php">
            <div class="row">
                <div class="mb-3 col-lg-6">
                    <label for="date" class="form-label">Date:</label>
                    <input type="date" class="form-control" id="date" name="date" value="<?php echo $date; ?>" required>
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="ref_no" class="form-label">Ref No:</label>
                    <input type="text" class="form-control" id="ref_no" name="ref_no" value="<?php echo $ref_no; ?>" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="messrs" class="form-label">Messrs:</label>
                <input type="text" class="form-control" id="messrs" name="messrs" value="<?php echo $messrs; ?>" required>
            </div>
            <div class="mb-3">
                <label for="company_name" class="form-label">Company Name:</label>
                <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo $company_name; ?>" required>
            </div>
            <div class="mb-3">
                <label for="gst_no" class="form-label">GST No:</label>
                <input type="text" class="form-control" id="gst_no" name="gst_no" value="<?php echo $gst_no; ?>" required>
            </div>
            <div class="row">
                <div class="mb-3 col-lg-6">
                    <label for="ss" class="form-label">SS:</label>
                    <input type="text" class="form-control" id="ss" name="ss" value="<?php echo $ss; ?>" required>
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="ss_from" class="form-label">SS From:</label>
                    <input type="text" class="form-control" id="ss_from" name="ss_from" value="<?php echo $ss_from; ?>" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="description_of_goods" class="form-label">Description of Goods:</label>
                <input type="text" class="form-control" id="description_of_goods" name="description_of_goods" value="<?php echo $description_of_goods; ?>" required>
            </div>
            <div class="row">
                <div class="mb-3 col-lg-6">
                    <label for="bl_no" class="form-label">BL No:</label>
                    <input type="text" class="form-control" id="bl_no" name="bl_no" value="<?php echo $bl_no; ?>" required>
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="invoice_no" class="form-label">Invoice No:</label>
                    <input type="text" class="form-control" id="invoice_no" name="invoice_no" value="<?php echo $invoice_no; ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-lg-6">
                    <label for="igm_no" class="form-label">IGM No:</label>
                    <input type="text" class="form-control" id="igm_no" name="igm_no" value="<?php echo $igm_no; ?>" required>
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="igm_date" class="form-label">IGM Date:</label>
                    <input type="date" class="form-control" id="igm_date" name="igm_date" value="<?php echo $igm_date; ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-lg-6">
                    <label for="index_no" class="form-label">Index No:</label>
                    <input type="text" class="form-control" id="index_no" name="index_no" value="<?php echo $index_no; ?>" required>
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="index_date" class="form-label">Index Date:</label>
                    <input type="date" class="form-control" id="index_date" name="index_date" value="<?php echo $index_date; ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-lg-6">
                    <label for="bill_of_entry_no" class="form-label">Bill of Entry No:</label>
                    <input type="text" class="form-control" id="bill_of_entry_no" name="bill_of_entry_no" value="<?php echo $bill_of_entry_no; ?>" required>
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="bill_of_entry_date" class="form-label">Bill of Entry Date:</label>
                    <input type="date" class="form-control" id="bill_of_entry_date" name="bill_of_entry_date" value="<?php echo $bill_of_entry_date; ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-lg-6">
                    <label for="no_of_packages" class="form-label">No of Packages:</label>
                    <input type="number" class="form-control" id="no_of_packages" name="no_of_packages" value="<?php echo $no_of_packages; ?>" required>
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="weight" class="form-label">Weight:</label>
                    <input type="number" class="form-control" id="weight" name="weight" value="<?php echo $weight; ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-lg-3">
                    <label for="marks_as_per_be" class="form-label">Marks as per B/E:</label>
                    <input type="text" class="form-control" id="marks_as_per_be" name="marks_as_per_be" value="<?php echo $marks_as_per_be; ?>" required>
                </div>
                <div class="mb-3 col-lg-3">
                    <label for="service_charges" class="form-label">Service Charges:</label>
                    <input type="number" step="0.01" class="form-control" id="service_charges" name="service_charges" value="<?php echo $service_charges; ?>" required>
                </div>
                <div class="mb-3 col-lg-3">
                    <label for="gst_tax" class="form-label">GST Tax:</label>
                    <input type="number" step="0.01" class="form-control" id="gst_tax" name="gst_tax" value="<?php echo $gst_tax; ?>" required>
                </div>
                <div class="mb-3 col-lg-3">
                    <label for="grand_total" class="form-label">Grand Total:</label>
                    <input type="number" step="0.01" class="form-control" id="grand_total" name="grand_total" value="<?php echo $grand_total; ?>" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="rupees_in_text" class="form-label">Rupees (In Text):</label>
                <input type="text" class="form-control" id="rupees_in_text" name="rupees_in_text" value="<?php echo $rupees_in_text; ?>" required>
            </div>


            <div class="text-center"> <button type="submit" class="btn btn-primary"><b>Submit</b></button></div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>