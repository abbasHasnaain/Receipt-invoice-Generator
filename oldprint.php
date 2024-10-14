<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sales tax invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

</head>
<style>
    .salestaxinvoice {
        text-decoration: underline;
    }

    .logo-text {
        font-size: 25px;
    }

    .address {
        font-size: 12px;
    }

    .line {
        width: 100%;
        height: 2px;
        background: black;
        margin-top: 50px;
        margin-bottom: 50px;
    }

    .border-black-right {
        border-right: black 2px solid;
    }

    .spacer-div {
        height: 100px;
    }

    .underline-border {
        border-bottom: 2px solid black;
        min-width: 100px !important;
        text-align: center;
    }
</style>

<body>
    <?php
    include 'connection.php';

    // Retrieve bill_no from GET parameters
    $billNo = $_GET['id'];

    // Check if bill_no is set and not empty
    if (isset($billNo) && !empty($billNo)) {
        // Query the database to get data for the specified bill_no
        $sql = "SELECT * FROM sales_tax_invoice WHERE bill_no = $billNo";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch data from the result set
            $data = $result->fetch_assoc();
            // ... You can use $data to populate the HTML in the relevant places
        } else {
            echo "No records found for bill_no: $billNo";
        }
    } else {
        echo "Invalid or missing bill_no parameter";
    }

    // Close the database connection
    $conn->close();
    ?>

   <div class="text-center my-5"><button class="btn btn-primary text-center" onclick="downloadPDF()"><b>Download</b></button></div> 
    <div id="contentToPrint">
        <div class="d-flex justify-content-center flex-column align-items-center">
            <div class="d-flex justify-content-end"><span>Phone: 32735211</span></div>
            <div class="text-center"><span>[Number]</span></div>
            <div class="text-center"><span class="salestaxinvoice">SALES  &nbsp;TAX INVOICE</span></div>
            <div class="text-center"><span class="logo-text">Kaderbhoy Muhammedali & Sons</span></div>
            <div class="text-center"><span>Clearing Forward & Shipping Agents | C.H.A.L NO. 36</span></div>
            <div class="text-center"><span class="address">16, Jehangir, Kothari Building; M.A. Jinnah Road, Near Denso
                    Hall,
                    Karachi.</span></div>
            <div class="text-center"><span><b>G.S.T. No. 12-00-9805-599-55</b></span></div>
            <div style="width: 700px;">
                <div class="d-flex justify-content-between"><span class="d-flex gap-1 align-items-top"><b>Bill No: </b>
                        <div class="underline-border"><?php echo $data['bill_no']; ?></div>
                    </span><span class="d-flex gap-1"><b>Date:</b>
                        <div class="underline-border"><?php echo $data['date']; ?></div>
                    </span></div>
                <div class="d-flex justify-content-start"><span class="d-flex gap-1"><b>Ref No: </b>
                        <div class="underline-border"><?php echo $data['ref_no']; ?></div>
                    </span></div>
                <div class="d-flex justify-content-start"><span class="d-flex gap-1"><b>Messrs: </b>
                        <div class="underline-border"><?php echo $data['messrs']; ?></div>
                    </span></div>
                <div class="d-flex justify-content-start"><span class="d-flex gap-1"><b>G.S.T No: </b>
                        <div class="underline-border"><?php echo $data['gst_no']; ?></div>
                    </span></div>
                <div style="font-size: 25px; text-align: center;"><b>PARTICULARS &nbsp;OF&nbsp;CONSIGNMENTS</b></div>
                <div class="d-flex justify-content-center"><span class="d-flex gap-1"><b>S.S: </b>
                        <div class="underline-border"><?php echo $data['ss']; ?></div> <b>FROM</b> <div class="underline-border"><?php echo $data['ss_from']; ?></div>
                    </span></div>
                <div class="d-flex justify-content-start"><span class="d-flex gap-1"><b>Description Of Goods: </b>
                        <div class="underline-border"><?php echo $data['description_of_goods']; ?></div>
                    </span></div>
                <div class="d-flex justify-content-between"><span class="d-flex gap-1"><b>B\L No: </b>
                        <div class="underline-border"><?php echo $data['bl_no']; ?></div>
                    </span><span class="d-flex gap-1"><b>Invoice No:
                        </b>
                        <div class="underline-border"><?php echo $data['invoice_no']; ?></div>
                    </span></div>
                <div class="d-flex justify-content-between"><span class="d-flex gap-1"><b>I.G.M No: </b>
                        <div class="underline-border"><?php echo $data['igm_no']; ?></div>
                    </span><span class="d-flex gap-1"><b>Date:
                        </b>
                        <div class="underline-border"><?php echo $data['igm_date']; ?></div>
                    </span></div>
                <div class="d-flex justify-content-between"><span class="d-flex gap-1"><b>Index No: </b>
                        <div class="underline-border"><?php echo $data['index_no']; ?></div>
                    </span><span class="d-flex gap-1"><b>Date:
                        </b>
                        <div class="underline-border"><?php echo $data['index_date']; ?></div>
                    </span></div>
                <div class="d-flex justify-content-between"><span class="d-flex gap-1"><b>Bill Of Entry No: </b>
                        <div class="underline-border"><?php echo $data['bill_of_entry_no']; ?></div>
                    </span><span class="d-flex gap-1"><b>Date:
                        </b>
                        <div class="underline-border"><?php echo $data['bill_of_entry_date']; ?></div>
                    </span></div>
                <div class="d-flex justify-content-between"><span class="d-flex gap-1"><b>No Of Packages: </b>
                        <div class="underline-border"><?php echo $data['no_of_packages']; ?></div>
                    </span><span class="d-flex gap-1"><span class="d-flex gap-1"><b>Wt:
                            </b>
                            <div class="underline-border"><?php echo $data['weight']; ?></div>
                        </span><span class="d-flex gap-1"> <b>Kgs </b>
                        </span>
                    </span></div>
                <div class="d-flex justify-content-start"><span class="d-flex gap-1"><b>Marks As Per B\E: </b>
                        <div class="underline-border"><?php echo $data['marks_as_per_be']; ?></div>
                    </span></div>
                <div class="line"></div>
                <div class="col-12 row">
                    <div class="col-8 d-flex flex-column border-black-right">
                        <span class="d-flex gap-1"><b>Service Charges: </b>Rs. <div class="underline-border"><?php echo $data['service_charges']; ?></div>/-</span>
                        <span class="d-flex gap-1"><b>G.S.T Tax: </b>Rs. <div class="underline-border"><?php echo $data['gst_tax']; ?></div>/-</span>
                        <span class="d-flex gap-1"><b>Rupees (In Text): </b>
                            <div class="underline-border"><?php echo $data['rupees_in_text']; ?></div>
                        </span>
                    </div>
                    <div class="col-4 flex-column justify-content-start d-flex align-items-center">
                        <b>GRAND TOTAL:</b>
                        <span>Rs. <div class="underline-border"><?php echo $data['grand_total']; ?></div></span>
                    </div>
                </div>
                <div class="spacer-div"></div>
                <div style=" text-align: end;">For Kaderbhoy Muhammedali &
                    Sons</div>
            </div>
        </div>
    </div>
    <script>
        window.jsPDF = window.jspdf.jsPDF;

        function downloadPDF() {
            var doc = new jsPDF();

            // Source HTMLElement or a string containing HTML.
            var elementHTML = document.querySelector("#contentToPrint");

            doc.html(elementHTML, {
                callback: function(doc) {
                    var filename = 'Bill-'+'<?php echo $data['bill_no']; ?>' + '.pdf';
                    // Save the PDF
                    doc.save(filename);
                },
                margin: [10, 10, 10, 10],
                autoPaging: 'text',
                x: 0,
                y: 0,
                width: 190, //target width in the PDF document
                windowWidth: 700 //window width in CSS pixels
            });
        }
    </script>
</body>

</html>