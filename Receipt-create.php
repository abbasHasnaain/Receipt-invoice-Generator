<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Receipt</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>

    </style>
    <?php


    include("connection.php");
    if (isset($_POST['submit'])) {


        $our_ref_no = $_POST['our_ref_no'];
        $invoice_no = $_POST['invoice_no'];

        $memo_no = $_POST['memo_no'];
        $messrs = $_POST['messrs'];
        $to_expense_incurred_on = $_POST['to_expense_incurred_on'];
        $ss = $_POST['ss'];
        $ls = $_POST['ls'];
        $cash_b_no = $_POST['cash_b_no'];
        $from_user = $_POST['from_user'];
        $percentage = $_POST['percentage'];
        $dated = $_POST['dated'];
        $date = $_POST['date'];
        $description = $_POST['description'];
        $value_rs = $_POST['value_rs'];
        $index_no = $_POST['index_no'];
        $igm_no = $_POST['igm_no'];
        $Dt = $_POST['Dt'];
        $import_duty = $_POST['import_duty'];
        $s_tax = $_POST['s_tax'];
        $income_tax = $_POST['income_tax'];
        $cartage = $_POST['cartage'];
        $loading_unloading_charges = $_POST['loading_unloading_charges'];
        $exam_openingweighing_charge = $_POST['exam_openingweighing_charge'];
        $weight_charges = $_POST['weight_charges'];
        $other_expenses = $_POST['other_expenses'];
        $pct_no = $_POST['pct_no'];
        $lc_no = $_POST['lc_no'];
        $rupees_in_words = $_POST['rupees_in_words'];
        $acd_rs = $_POST['acd_rs'];
        $gst_rs = $_POST['gst_rs'];
        $appg_openingweighing_charges = $_POST['appg_openingweighing_charges'];
        $certificate_issue_exp = $_POST['certificate_issue_exp'];
        $custom_gd_token = $_POST['custom_gd_token']; {

            $insert = "INSERT INTO receipt( our_ref_no, invoice_no, memo_no, messrs, to_expense_incurred_on, ss, ls, cash_b_no, from_user, percentage, dated, date, description, value_rs, index_no, igm_no, Dt, import_duty, s_tax, income_tax, cartage, loading_unloading_charges, exam_openingweighing_charge, weight_charges, other_expenses, pct_no, lc_no, rupees_in_words, acd_rs, gst_rs, appg_openingweighing_charges, certificate_issue_exp, custom_gd_token
) VALUES ('$our_ref_no', '$invoice_no', '$memo_no', '$messrs', '$to_expense_incurred_on', '$ss', '$is_value', '$cash_b_no', '$from_user', '$percentage', '$dated', '$date', '$description', '$value_rs', '$index_no', '$igm_no', '$Dt', '$import_duty', '$s_tax', '$income_tax', '$cartage', '$loading_unloading_charges', '$exam_openingweighing_charge', '$weight_charges', '$other_expenses', '$pct_no', '$lc_no', '$rupees_in_words', '$acd_rs', '$gst_rs', '$appg_openingweighing_charges', '$certificate_issue_exp', '$custom_gd_token'
)";
            $run_query = mysqli_query($conn, $insert);
            if ($run_query) {

                echo "data added";
                header("location:Receipt.php");
            }
        }
    }



    ?>
</head>

<body>
    <div class="container  mt-5">
        <h1 class="text-center mb-4">CREATE RECEIPT</h1>
        <form method="post" enctype="multipart/form-data">

            <div class="row">
                <div class="col-lg-4 mb-3">
                    <div class="form-group">
                        <label for="our_ref_no">Our Ref No:</label>
                        <input type="text" name="our_ref_no" class="form-control" placeholder="Enter Our Ref No"
                            required>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-group">
                        <label for="memo_no">Memo No:</label>
                        <input type="text" name="memo_no" class="form-control" placeholder="Enter Memo No" required>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                </div>

                <div class="col-lg-12 mb-3">
                    <div class="form-group">
                        <label for="messrs">Messrs:</label>
                        <textarea name="messrs" class="form-control" placeholder="Enter Messrs" required></textarea>
                    </div>
                </div>

                <div class="col-lg-4 mb-3">
                    <div class="form-group">
                        <label for="invoice_no">Invoice No:</label>
                        <input type="text" name="invoice_no" class="form-control" placeholder="Enter Invoice No"
                            required>
                    </div>
                </div>




                <div class="col-lg-4 mb-3">
                    <div class="form-group">
                        <label for="to_expense_incurred_on">To Expense Incurred On:</label>
                        <input type="text" name="to_expense_incurred_on" class="form-control"
                            placeholder="Enter To Expense Incurred On" required>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-group">
                        <label for="Dt">Dt:</label>
                        <input type="date" name="Dt" class="form-control" placeholder="Enter DI" required>
                    </div>
                </div>
                <div class="col-lg-12 mb-3">
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea type="text" name="description" class="form-control" placeholder="Enter Description"
                            required></textarea>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-group">
                        <label for="ss">SS:</label>
                        <input type="text" name="ss" class="form-control" placeholder="Enter SS" required>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-group">
                        <label for="from_user">From User:</label>
                        <input type="text" name="from_user" class="form-control" placeholder="Enter From User" required>
                    </div>
                </div>

                <div class="col-lg-4 mb-3">
                    <div class="form-group">
                        <label for="value_rs">Value Rs:</label>
                        <input type="text" name="value_rs" class="form-control" placeholder="Enter Value Rs" required>
                    </div>
                </div>




                <div class="col-lg-4 mb-3">
                    <div class="form-group">
                        <label for="is_value"> l & S:</label>
                        <input type="text" name="ls" class="form-control" placeholder="Enter Is Value" required>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-group">
                        <label for="percentage">Percentage:</label>
                        <input type="number" name="percentage" class="form-control" placeholder="Enter Percentage"
                            required>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="form-group">
                        <label for="index_no">Index No:</label>
                        <input type="text" name="index_no" class="form-control" placeholder="Enter Index No" required>
                    </div>
                </div>

                <div class="col-lg-4 mb-3">
                    <div class="form-group">
                        <label for="cash_b_no">Cash B No:</label>
                        <input type="text" name="cash_b_no" class="form-control" placeholder="Enter Cash B No" required>
                    </div>
                </div>




                <div class="col-lg-4 mb-3">
                    <div class="form-group">
                        <label for="dated">Dated:</label>
                        <input type="date" name="dated" class="form-control" required>
                    </div>
                </div>

                <div class="col-lg-4 mb-3">
                    <div class="form-group">
                        <label for="igm_no">IGM No:</label>
                        <input type="text" name="igm_no" class="form-control" placeholder="Enter IGM No" required>
                    </div>
                </div>









                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label for="import_duty">Import Duty:</label>
                        <input type="number" name="import_duty" class="form-control" placeholder="Enter Import Duty"
                            required>
                    </div>
                </div>



                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label for="s_tax">S Tax:</label>
                        <input type="number" name="s_tax" class="form-control" placeholder="Enter S Tax" required>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label for="income_tax">Income Tax:</label>
                        <input type="number" name="income_tax" class="form-control" placeholder="Enter Income Tax"
                            required>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label for="acd_rs">ACD Rs:</label>
                        <input type="number" name="acd_rs" class="form-control" placeholder="Enter ACD Rs" required>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label for="gst_rs">GST Rs:</label>
                        <input type="number" name="gst_rs" class="form-control" placeholder="Enter GST Rs" required>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label for="custom_gd_token">Custom GD Token:</label>
                        <input type="text" name="custom_gd_token" class="form-control"
                            placeholder="Enter Custom GD Token" required>
                    </div>
                </div>

                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label for="cartage">Cartage:</label>
                        <input type="number" name="cartage" class="form-control" placeholder="Enter Cartage" required>
                    </div>
                </div>



                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label for="loading_unloading_charges">Loading Unloading Charges:</label>
                        <input type="number" name="loading_unloading_charges" class="form-control"
                            placeholder="Enter Loading Unloading Charges" required>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label for="exam_openingweighing_charge">Exam Opening Weighing Charge:</label>
                        <input type="number" name="exam_openingweighing_charge" class="form-control"
                            placeholder="Enter Exam Opening Weighing Charge" required>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label for="appg_openingweighing_charges">Appg Opening Weighing Charges:</label>
                        <input type="number" name="appg_openingweighing_charges" class="form-control"
                            placeholder="Enter Appg Opening Weighing Charges" required>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label for="weight_charges">Weight Charges:</label>
                        <input type="number" name="weight_charges" class="form-control"
                            placeholder="Enter Weight Charges" required>
                    </div>
                </div>

                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label for="certificate_issue_exp">Certificate Issue Exp:</label>
                        <input type="text" name="certificate_issue_exp" class="form-control"
                            placeholder="Enter Certificate Issue Exp" required>
                    </div>
                </div>


                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label for="other_expenses">Other Expenses:</label>
                        <input type="number" name="other_expenses" class="form-control"
                            placeholder="Enter Other Expenses" required>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label for="pct_no">PCT No:</label>
                        <input type="text" name="pct_no" class="form-control" placeholder="Enter PCT No" required>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label for="lc_no">LC No:</label>
                        <input type="text" name="lc_no" class="form-control" placeholder="Enter LC No" required>
                    </div>
                </div>



                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label for="rupees_in_words">Rupees in Words:</label>
                        <input type="text" name="rupees_in_words" class="form-control"
                            placeholder="Enter Rupees in Words" required>
                    </div>
                </div>


                <div class="form-group text-center">
                    <button type="submit" name="submit" class="btn btn-primary mt-2 mb-3">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>