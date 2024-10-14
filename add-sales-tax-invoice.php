<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Sales Tax Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Create Sales Tax Invoice</h2>
        <form method="post" action="process-sales-tax-invoice.php">
            <div class="row">
                <div class="mb-3 col-lg-6">
                    <label for="date" class="form-label">Date:</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="ref_no" class="form-label">Ref No:</label>
                    <input type="text" class="form-control" id="ref_no" name="ref_no" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="messrs" class="form-label">Messrs:</label>
                <input type="text" class="form-control" id="messrs" name="messrs" required>
            </div>
            <div class="mb-3">
                <label for="company_name" class="form-label">Company Name:</label>
                <input type="text" class="form-control" id="company_name" name="company_name" required>
            </div>
            <div class="mb-3">
                <label for="gst_no" class="form-label">GST No:</label>
                <input type="text" class="form-control" id="gst_no" name="gst_no" required>
            </div>
            <div class="row">
                <div class="mb-3 col-lg-6">
                    <label for="ss" class="form-label">SS:</label>
                    <input type="text" class="form-control" id="ss" name="ss" required>
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="ss_from" class="form-label">SS From:</label>
                    <input type="text" class="form-control" id="ss_from" name="ss_from" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="description_of_goods" class="form-label">Description of Goods:</label>
                <input type="text" class="form-control" id="description_of_goods" name="description_of_goods" required>
            </div>
            <div class="row">
                <div class="mb-3 col-lg-6">
                    <label for="bl_no" class="form-label">BL No:</label>
                    <input type="text" class="form-control" id="bl_no" name="bl_no" required>
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="invoice_no" class="form-label">Invoice No:</label>
                    <input type="text" class="form-control" id="invoice_no" name="invoice_no" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-lg-6">
                    <label for="igm_no" class="form-label">IGM No:</label>
                    <input type="text" class="form-control" id="igm_no" name="igm_no" required>
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="igm_date" class="form-label">IGM Date:</label>
                    <input type="date" class="form-control" id="igm_date" name="igm_date" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-lg-6">
                    <label for="index_no" class="form-label">Index No:</label>
                    <input type="text" class="form-control" id="index_no" name="index_no" required>
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="index_date" class="form-label">Index Date:</label>
                    <input type="date" class="form-control" id="index_date" name="index_date" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-lg-6">
                    <label for="bill_of_entry_no" class="form-label">Bill of Entry No:</label>
                    <input type="text" class="form-control" id="bill_of_entry_no" name="bill_of_entry_no" required>
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="bill_of_entry_date" class="form-label">Bill of Entry Date:</label>
                    <input type="date" class="form-control" id="bill_of_entry_date" name="bill_of_entry_date" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-lg-6">
                    <label for="no_of_packages" class="form-label">No of Packages:</label>
                    <input type="number" class="form-control" id="no_of_packages" name="no_of_packages" required>
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="weight" class="form-label">Weight:</label>
                    <input type="number" class="form-control" id="weight" name="weight" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-lg-3">
                    <label for="marks_as_per_be" class="form-label">Marks as per B/E:</label>
                    <input type="text" class="form-control" id="marks_as_per_be" name="marks_as_per_be" required>
                </div>
                <div class="mb-3 col-lg-3">
                    <label for="service_charges" class="form-label">Service Charges:</label>
                    <input type="number" step="0.01" class="form-control" id="service_charges" name="service_charges" required>
                </div>
                <div class="mb-3 col-lg-3">
                    <label for="gst_tax" class="form-label">GST Tax:</label>
                    <input type="number" step="0.01" class="form-control" id="gst_tax" name="gst_tax" required>
                </div>
                <div class="mb-3 col-lg-3">
                    <label for="grand_total" class="form-label">Grand Total:</label>
                    <input type="number" step="0.01" class="form-control" id="grand_total" name="grand_total" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="rupees_in_text" class="form-label">Rupees (In Text):</label>
                <input type="text" class="form-control" id="rupees_in_text" name="rupees_in_text" required>
            </div>


            <div class="text-center"> <button type="submit" class="btn btn-primary"><b>Submit</b></button></div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>