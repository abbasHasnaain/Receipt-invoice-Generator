<!DOCTYPE html>
<html>

<head>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <title>Update Product Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

    </style>
    <?php
    include 'connection.php';
    $update = $_GET['id'];
    $sql = "SELECT * FROM receipt WHERE bill_no=$update";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Initialize variables
    $our_ref_no = $row['our_ref_no'];
    $invoice_no = $row['invoice_no'];
    $memo_no = $row['memo_no'];
    $messrs = $row['messrs'];
    $to_expense_incurred_on = $row['to_expense_incurred_on'];
    $ss = $row['ss'];
    $ls = $row['ls'];
    $cash_b_no = $row['cash_b_no'];
    $from_user = $row['from_user'];
    $percentage = $row['percentage'];
    $dated = $row['dated'];
    $date = $row['date'];
    $description = $row['description'];
    $value_rs = $row['value_rs'];
    $index_no = $row['index_no'];
    $igm_no = $row['igm_no'];
    $Dt = $row['Dt'];
    $import_duty = $row['import_duty'];
    $s_tax = $row['s_tax'];
    $income_tax = $row['income_tax'];
    $cartage = $row['cartage'];
    $loading_unloading_charges = $row['loading_unloading_charges'];
    $exam_openingweighing_charge = $row['exam_openingweighing_charge'];
    $weight_charges = $row['weight_charges'];
    $other_expenses = $row['other_expenses'];
    $pct_no = $row['pct_no'];
    $lc_no = $row['lc_no'];
    $rupees_in_words = $row['rupees_in_words'];
    $acd_rs = $row['acd_rs'];
    $gst_rs = $row['gst_rs'];
    $appg_openingweighing_charges = $row['appg_openingweighing_charges'];
    $certificate_issue_exp = $row['certificate_issue_exp'];
    $custom_gd_token = $row['custom_gd_token'];

    if (isset($_POST['submit'])) {
        // Retrieve data from the form
        $our_ref_no = $_POST["our_ref_no"];
        $invoice_no = $_POST["invoice_no"];
        $memo_no = $_POST["memo_no"];
        $messrs = $_POST["messrs"];
        $to_expense_incurred_on = $_POST["to_expense_incurred_on"];
        $ss = $_POST["ss"];
        $ls = $_POST["ls"];
        $cash_b_no = $_POST["cash_b_no"];
        $from_user = $_POST["from_user"];
        $percentage = $_POST["percentage"];
        $dated = $_POST["dated"];
        $date = $_POST["date"];
        $description = $_POST["description"];
        $value_rs = $_POST["value_rs"];
        $index_no = $_POST["index_no"];
        $igm_no = $_POST["igm_no"];
        $Dt = $_POST["Dt"];
        $import_duty = $_POST["import_duty"];
        $s_tax = $_POST["s_tax"];
        $income_tax = $_POST["income_tax"];
        $cartage = $_POST["cartage"];
        $loading_unloading_charges = $_POST["loading_unloading_charges"];
        $exam_openingweighing_charge = $_POST["exam_openingweighing_charge"];
        $weight_charges = $_POST["weight_charges"];
        $other_expenses = $_POST["other_expenses"];
        $pct_no = $_POST["pct_no"];
        $lc_no = $_POST["lc_no"];
        $rupees_in_words = $_POST["rupees_in_words"];
        $acd_rs = $_POST["acd_rs"];
        $gst_rs = $_POST["gst_rs"];
        $appg_openingweighing_charges = $_POST["appg_openingweighing_charges"];
        $certificate_issue_exp = $_POST["certificate_issue_exp"];
        $custom_gd_token = $_POST["custom_gd_token"];

        // Update query
        $sql = "UPDATE `receipt` SET 
            `our_ref_no`='$our_ref_no', 
            `invoice_no`='$invoice_no', 
            `memo_no`='$memo_no', 
            `messrs`='$messrs', 
            `to_expense_incurred_on`='$to_expense_incurred_on', 
            `ss`='$ss', 
            `ls`='$ls', 
            `cash_b_no`='$cash_b_no', 
            `from_user`='$from_user', 
            `percentage`='$percentage', 
            `dated`='$dated', 
            `date`='$date', 
            `description`='$description', 
            `value_rs`='$value_rs', 
            `index_no`='$index_no', 
            `igm_no`='$igm_no', 
            `Dt`='$Dt', 
            `import_duty`='$import_duty', 
            `s_tax`='$s_tax', 
            `income_tax`='$income_tax', 
            `cartage`='$cartage', 
            `loading_unloading_charges`='$loading_unloading_charges', 
            `exam_openingweighing_charge`='$exam_openingweighing_charge', 
            `weight_charges`='$weight_charges', 
            `other_expenses`='$other_expenses', 
            `pct_no`='$pct_no', 
            `lc_no`='$lc_no', 
            `rupees_in_words`='$rupees_in_words', 
            `acd_rs`='$acd_rs', 
            `gst_rs`='$gst_rs', 
            `appg_openingweighing_charges`='$appg_openingweighing_charges', 
            `certificate_issue_exp`='$certificate_issue_exp', 
            `custom_gd_token`='$custom_gd_token' 
            WHERE `bill_no`='$update'";

        // Execute the update query
        mysqli_query($conn, $sql);
        header("location: Receipt.php");
    }
    ?>
</head>

<body>
    <div class="container mt-5">
        <h1 style="text-align:center;" class="mb-4">UPDATE RECEIPT</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <label for="our_ref_no">Ref No:</label>
                    <input value="<?php echo $our_ref_no; ?>" type="text" class="form-control" name="our_ref_no"
                        placeholder="Enter Our Ref No" required>
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="memo_no">Memo No:</label>
                    <input value="<?php echo $memo_no; ?>" type="text" class="form-control" name="memo_no"
                        placeholder="Enter Memo No" required>
                </div>

                <div class="col-lg-4 mb-3">
                    <label for="date">Date:</label>
                    <input value="<?php echo $date; ?>" type="date" class="form-control" name="date"
                        placeholder="Enter Date" required>
                </div>
                <div class="col-lg-12 mb-3">
                    <label for="messrs">Messrs:</label>
                    <textarea value="" type="text" class="form-control" name="messrs"
                        placeholder="Enter Messrs" required><?php echo $messrs; ?></textarea>
                </div>

                <div class="col-lg-4 mb-3">
                    <label for="invoice_no">Invoice No:</label>
                    <input value="<?php echo $invoice_no; ?>" type="text" class="form-control" name="invoice_no"
                        placeholder="Enter Invoice No" required>
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="to_expense_incurred_on">To Expense Incurred On:</label>
                    <input value="<?php echo $to_expense_incurred_on; ?>" type="text" class="form-control"
                        name="to_expense_incurred_on" placeholder="Enter To Expense Incurred On" required>
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="Dt">Dt:</label>
                    <input value="<?php echo $Dt; ?>" type="date" class="form-control" name="Dt" required>
                </div>

                <div class="col-lg-12 mb-3">
                    <label for="description">Description:</label>
                    <textarea class="form-control" name="description" placeholder="Enter Description"
                        required><?php echo $description; ?></textarea>
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="ss">SS:</label>
                    <input value="<?php echo $ss; ?>" type="text" class="form-control" name="ss" placeholder="Enter SS"
                        required>
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="from_user">From User:</label>
                    <input value="<?php echo $from_user; ?>" type="text" class="form-control" name="from_user"
                        placeholder="Enter From User" required>
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="value_rs">Value Rs:</label>
                    <input value="<?php echo $value_rs; ?>" type="text" class="form-control" name="value_rs"
                        placeholder="Enter Value Rs" required>
                </div>

                <div class="col-lg-4 mb-3">
                    <label for="is_value"> l & S:</label>
                    <input value="<?php echo $ls; ?>" type="text" class="form-control" name="ls"
                        placeholder="Enter Is Value" required>
                </div>

                <div class="col-lg-4 mb-3">
                    <label for="percentage">Percentage:</label>
                    <input value="<?php echo $percentage; ?>" type="number" class="form-control" name="percentage"
                        placeholder="Enter Percentage" required>
                </div>


                <div class="col-lg-4 mb-3">
                    <label for="index_no">Index No:</label>
                    <input value="<?php echo $index_no; ?>" type="text" class="form-control" name="index_no"
                        placeholder="Enter Index No" required>
                </div>

                <div class="col-lg-4 mb-3">
                    <label for="cash_b_no">Cash B No:</label>
                    <input value="<?php echo $cash_b_no; ?>" type="text" class="form-control" name="cash_b_no"
                        placeholder="Enter Cash B No" required>
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="dated">Dated:</label>
                    <input value="<?php echo $dated; ?>" type="date" class="form-control" name="dated"
                        placeholder="Enter Dated" required>
                </div>


                <div class="col-lg-4 mb-3">
                    <label for="igm_no">IGM No:</label>
                    <input value="<?php echo $igm_no; ?>" type="text" class="form-control" name="igm_no"
                        placeholder="Enter IGM No" required>
                </div>

















                <div class="col-lg-6 mb-3">
                    <label for="import_duty">Import Duty:</label>
                    <input value="<?php echo $import_duty; ?>" type="number" class="form-control" name="import_duty"
                        placeholder="Enter Import Duty" required>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="s_tax">S Tax:</label>
                    <input value="<?php echo $s_tax; ?>" type="number" class="form-control" name="s_tax"
                        placeholder="Enter S Tax" required>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="income_tax">Income Tax:</label>
                    <input value="<?php echo $income_tax; ?>" type="number" class="form-control" name="income_tax"
                        placeholder="Enter Income Tax" required>
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="acd_rs">ACD Rs:</label>
                    <input value="<?php echo $acd_rs; ?>" type="number" class="form-control" name="acd_rs"
                        placeholder="Enter ACD Rs" required>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="gst_rs">GST Rs:</label>
                    <input value="<?php echo $gst_rs; ?>" type="number" class="form-control" name="gst_rs"
                        placeholder="Enter GST Rs" required>
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="custom_gd_token">Custom GD Token:</label>
                    <input value="<?php echo $custom_gd_token; ?>" type="text" class="form-control"
                        name="custom_gd_token" placeholder="Enter Custom GD Token" required>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="cartage">Cartage:</label>
                    <input value="<?php echo $cartage; ?>" type="number" class="form-control" name="cartage"
                        placeholder="Enter Cartage" required>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="loading_unloading_charges">Loading Unloading Charges:</label>
                    <input value="<?php echo $loading_unloading_charges; ?>" type="number" class="form-control"
                        name="loading_unloading_charges" placeholder="Enter Loading Unloading Charges" required>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="exam_openingweighing_charge">Exam Opening/Weighing Charge:</label>
                    <input value="<?php echo $exam_openingweighing_charge; ?>" type="number" class="form-control"
                        name="exam_openingweighing_charge" placeholder="Enter Exam Opening/Weighing Charge" required>
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="appg_openingweighing_charges">APPG Opening/Weighing Charges:</label>
                    <input value="<?php echo $appg_openingweighing_charges; ?>" type="text" class="form-control"
                        name="appg_openingweighing_charges" placeholder="Enter APPG Opening/Weighing Charges" required>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="weight_charges">Weight Charges:</label>
                    <input value="<?php echo $weight_charges; ?>" type="number" class="form-control"
                        name="weight_charges" placeholder="Enter Weight Charges" required>
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="certificate_issue_exp">Certificate Issue Exp:</label>
                    <input value="<?php echo $certificate_issue_exp; ?>" type="text" class="form-control"
                        name="certificate_issue_exp" placeholder="Enter Certificate Issue Exp" required>
                </div>


                <div class="col-lg-6 mb-3">
                    <label for="other_expenses">Other Expenses:</label>
                    <input value="<?php echo $other_expenses; ?>" type="number" class="form-control"
                        name="other_expenses" placeholder="Enter Other Expenses" required>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="pct_no">PCT No:</label>
                    <input value="<?php echo $pct_no; ?>" type="text" class="form-control" name="pct_no"
                        placeholder="Enter PCT No" required>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="lc_no">LC No:</label>
                    <input value="<?php echo $lc_no; ?>" type="text" class="form-control" name="lc_no"
                        placeholder="Enter LC No" required>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="rupees_in_words">Rupees in Words:</label>
                    <input value="<?php echo $rupees_in_words; ?>" type="text" class="form-control"
                        name="rupees_in_words" placeholder="Enter Rupees in Words" required>
                </div>



                <div class="col-lg-12 text-center mt-2 mb-3">
                    <button type="submit" class="btn btn-primary" name="submit">Update Product</button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>