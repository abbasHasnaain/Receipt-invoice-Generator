<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Tax Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/template.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://unpkg.com/html2pdf.js"></script>
</head>

<style>
    /* Button and table styles omitted for brevity, same as previous example */

    #downloadBtn {
        position: absolute;
        top: 10px;
        right: 10px;
        padding: 10px 20px;
        background-color: blue;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 12px;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    #downloadBtn:hover {
        background-color: darkblue;
    }

    .invoice-container {
        padding: 2px;
        position: relative;
        max-width: 210mm;
        margin: auto;
        page-break-inside: avoid;
        display: flex;
        flex-direction: column;
        min-height: auto;
        padding-right: 4mm;
        padding-left: 4mm;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'NexaBold', sans-serif;
        font-weight: 700;
        margin: 0;
        padding: 0;
        background-color: #f7f7f7;

        display: flex;
        justify-content: center;
        align-items: flex-start;
        height: 100vh;
        overflow: auto;
    }

    .header {
        text-align: center;
        margin-bottom: 20px;
    }

    .header h1 {
        font-size: 22px;
        margin-bottom: 5px;
    }

    .header h2 {
        font-size: 20px;
        margin-bottom: 3px;
    }

    .header h3 {
        font-size: 15px;
        margin: 0;
    }

    .header p {
        font-size: 14px;
        margin: 0px 0;
    }

    .field-container {
        padding: 4px;

        margin-bottom: 16px;
        border: 1px solid black;
        /* Full border around each row */
        background-color: #E2E2E2;
        /* Background color for each row */
        display: flex;
        border-radius: 0px;
        /* Adjust the value to control the roundness */
    }

    .field-label {
        font-weight: bold;
        font-size: 12px;
        flex: 1;
        /* Equal distribution of space */
        padding: 5px;
        border-right: 1px solid black;
        /* Vertical lines between columns */
    }

    .field-label:last-child {
        border-right: none;
        /* Remove right border for last column */
    }


    @media print {

        body,
        html {
            height: auto;
            margin: 0;
            padding: 0;
        }

        .invoice-container {
            height: auto;
            page-break-inside: avoid;
            margin: 0;
            padding: 20mm;
            min-height: auto;
        }



        #downloadBtn {
            display: none;
        }
    }


    .section2-container {
        padding: 4px;

        border: 1px solid black;
        background-color: #E2E2E2;
        display: flex;
        flex-direction: column;
        border-radius: 0px;
    }

    footer {
        background-color: black;
        color: white;
        padding: 5px;
        text-align: center;
        font-size: 12px;
        margin-top: 0.5vh;
    }

    .section2-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 7px;
        border-bottom: 1px solid black;
    }

    .section2-row:last-child {
        border-bottom: none;
    }

    .section2-label {
        font-size: 12px;
        font-weight: bold;
        flex: 1;
        padding-right: 10px;
    }

    .section2-data {
        font-size: 12px;
        text-align: right;
        flex: 1;
        padding-left: 10px;
    }

    @media print {
        #downloadBtn {
            display: none;
        }

        footer {
            position: relative;
            width: 100%;
            font-size: 8px;
            page-break-after: avoid;
        }
    }
</style>

<body>

    <?php
    include 'connection.php';

    $billNo = $_GET['id'];

    if (isset($billNo) && !empty($billNo)) {
        $sql = "SELECT * FROM receipt WHERE bill_no = $billNo";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
        } else {
            echo "No records found for bill_no: $billNo";
        }
    } else {
        echo "Invalid or missing bill_no parameter";
    }

    $conn->close();
    ?>

    <button id="downloadBtn">Download as PDF</button>

    <div id="print">
        <div class="invoice-container">

            <div class="header">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <!-- Logo on the left -->
                    <div style="flex: 1;">
                        <img src="./assets/images-new/kadeerlogo.png" alt="Kaderbhoy Logo"
                            style="width: 340px; height: 65px;">
                    </div>

                    <!-- Text on the right -->
                    <div style="flex: 2; text-align: left; padding-left: 0px;">
                        <br>
                        <h3 style="font-size: 15px; margin-left: 1.4in;">786</h3>
        <h3 style="font-size: 16px; margin-left: 1.25in;font-weight: bold;">Receipt</h3>


                        <h2 style="font-weight: bold; font-size: 22px; margin: 0px 0;">Kaderbhoy Muhammadali & Sons</h2>
                        <p style="font-size: 14px; margin: 5px 0;">Clearing Forwarding & Shipping Agents | C.H.A.L. NO.
                            36</p>
                        <p style="font-size: 11px; font-weight: bold; margin: 0px 0;">16, Jehangir Kothari Building,
                            M.A. Jinnah Road, Near Denso Hall, Karachi | 021 - 32735211</p>
                    </div>
                </div>
                <hr class="custom-hr">
                <p style="font-size: 14px; font-weight: bold;">All Goods are Cleared, Forward & Stored at the Owner's
                    Risk</p>
            </div>

            <!-- Customer Info -->
            <div class="customer-info">
                <div class="field-container">
                    <div class="field-label">Ref No: <?php echo $data['our_ref_no']; ?></div>
                    <div class="field-label">Memo No: <?php echo $data['memo_no']; ?></div>
                    <div class="field-label">Invoice No: <?php echo $data['invoice_no']; ?></div>

                    <div class="field-label">Date: <?php echo $data['date']; ?></div>
                </div>
                <div class="field-container">
                    <div class="field-label">Messrs: <?php echo $data['messrs']; ?></div>
                    <div class="field-label">Description: <?php echo $data['description']; ?></div>
                </div>
                <div class="field-container">
                    <div class="field-label">Bill No: <?php echo $data['bill_no']; ?></div>
                    <div class="field-label">Percentage: <?php echo $data['percentage']; ?></div>

                    <div class="field-label">SS: <?php echo $data['ss']; ?></div>
                    <div class="field-label">From: <?php echo $data['from_user']; ?></div>
                    <div class="field-label">L&S: <?php echo $data['ls']; ?></div>
                    <div class="field-label">Cash B No: <?php echo $data['cash_b_no']; ?></div>
                </div>
                <div class="field-container">
                    <div class="field-label">IGM No: <?php echo $data['igm_no']; ?></div>
                    <div class="field-label">Expense Incurred: <?php echo $data['to_expense_incurred_on']; ?></div>
                    <div class="field-label">Dated: <?php echo $data['dated']; ?></div>
                    <div class="field-label">DT: <?php echo $data['Dt']; ?></div>
                </div>
            </div>

            <!-- Section 2 starts here -->
            <div class="section2-container">
                <div class="section2-row">
                    <div class="section2-label">Import Duty:</div>
                    <div class="section2-data"><?php echo $data['import_duty']; ?></div>
                </div>
                <div class="section2-row">
                    <div class="section2-label">S Tax:</div>
                    <div class="section2-data"><?php echo $data['s_tax']; ?></div>
                </div>
                <div class="section2-row">
                    <div class="section2-label">Income Tax:</div>
                    <div class="section2-data"><?php echo $data['income_tax']; ?></div>
                </div>
                <div class="section2-row">
                    <div class="section2-label">Cartage:</div>
                    <div class="section2-data"><?php echo $data['cartage']; ?></div>
                </div>
                <div class="section2-row">
                    <div class="section2-label">Loading & Unloading:</div>
                    <div class="section2-data"><?php echo $data['loading_unloading_charges']; ?></div>
                </div>
                <div class="section2-row">
                    <div class="section2-label">exam_openingweighing_charge:</div>
                    <div class="section2-data"><?php echo $data['exam_openingweighing_charge']; ?></div>
                </div>
                <div class="section2-row">
                    <div class="section2-label">weight_charges:</div>
                    <div class="section2-data"><?php echo $data['weight_charges']; ?></div>
                </div>
                <div class="section2-row">
                    <div class="section2-label">Other Expenses:</div>
                    <div class="section2-data"><?php echo $data['other_expenses']; ?></div>
                </div>
                <div class="section2-row">
                    <div class="section2-label">pct_no:</div>
                    <div class="section2-data"><?php echo $data['pct_no']; ?></div>
                </div>
                <div class="section2-row">
                    <div class="section2-label">lc_no:</div>
                    <div class="section2-data"><?php echo $data['lc_no']; ?></div>
                </div>
                <div class="section2-row">
                    <div class="section2-label">rupees_in_words:</div>
                    <div class="section2-data"><?php echo $data['rupees_in_words']; ?></div>
                </div>
                <div class="section2-row">
                    <div class="section2-label">acd_rs:</div>
                    <div class="section2-data"><?php echo $data['acd_rs']; ?></div>
                </div>
                <div class="section2-row">
                    <div class="section2-label">gst_rs:</div>
                    <div class="section2-data"><?php echo $data['gst_rs']; ?></div>
                </div>
                <div class="section2-row">
                    <div class="section2-label">appg_openingweighing_charges:</div>
                    <div class="section2-data"><?php echo $data['appg_openingweighing_charges']; ?></div>
                </div>
                <div class="section2-row">
                    <div class="section2-label">certificate_issue_exp:</div>
                    <div class="section2-data"><?php echo $data['certificate_issue_exp']; ?></div>
                </div>
                <div class="section2-row">
                    <div class="section2-label">custom_gd_token:</div>
                    <div class="section2-data"><?php echo $data['custom_gd_token']; ?></div>
                </div>

            </div>
        </div>

        <div style="padding-left:16px; ">
            <footer style="width:760px;height:45px; ">
                <div>Invoice By</div>
                <div>Kaderbhoy Muhammadali & Sons</div>
            </footer>
        </div>
    </div>
    </div>

    <script>
        const billNo = 'Bill_No_' + "<?php echo $data['bill_no']; ?>";
        document.getElementById('downloadBtn').addEventListener('click', function () {
            const invoiceElement = document.getElementById('print');
            const opt = {
                margin: 0,
                filename: billNo + ".pdf",
                image: { type: 'jpeg', quality: 4 },
                html2canvas: { scale: 5, useCORS: true },
                jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
            };

            html2pdf().from(invoiceElement).set(opt).save();
        });
    </script>

</body>

</html>