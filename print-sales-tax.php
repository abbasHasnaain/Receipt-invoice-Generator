




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
    /* assets/css/style.css */

/* Style for the download button */
#downloadBtn {
    position: absolute;
    top: 2px;
    right: 2px;
    padding: 10px 2px;
    background-color: blue;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 10px;
    cursor: pointer;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

#downloadBtn:hover {
    background-color: darkblue;
}

/* Add padding to the container */
.invoice-container {
    padding-top: 100px;
    position: relative;
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
    align-items: center;
    height: 105vh;
    overflow: hidden;
}

.invoice-container {
    flex-grow: 1;
    flex-direction: column;
    justify-content: space-between;
    width: 100%;
    max-width: 210mm;
    margin: 1px;
    padding-right: 1mm;
    padding-left: 1mm;
    transform: scale(0.9);
    padding-top: 80px;
    transform-origin: top;
    overflow: auto; 
  

}

.header {
    text-align: center;
}

.header h1 {
    font-size: 20px;
    margin-bottom: 5px;
}

.header h2 {
    font-size: 18px;
    margin-bottom: 3px;
}

.header p {
    font-size: 14px;
    margin: 2px 0;
}

.header h3 {
    font-size: 14px;
   
    margin: 0px 0;
}

.consignment-heading {
    text-align: center;
    padding: 10px;
    margin: 10px 0;
    border-radius: 0px;
}

.customer-info,
.consignment-info,
.charges {
    margin-bottom: 15px;
}

.field-container {
    background-color: #E2E2E2;
    padding: 8px;
    margin-bottom: 10px;
    border-radius: 0px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.field-label {
    font-weight: bold;
    font-size: 13px;
}

.right-label {
    margin-left: auto;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 350px;
}

footer {
    background-color: black;
    color: white;
    padding: 5px;
    text-align: center;
    font-size: 12px;
    margin-top: 0.5vh;
}

/* Printing adjustments */
@media print {
    body, html {
        height: auto;
        margin: 0;
        padding: 0;
    }

    .invoice-container {
        height: auto;
        page-break-inside: avoid;
        transform: none;
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
            // ... Use $data to populate the HTML in relevant places
        } else {
            echo "No records found for bill_no: $billNo";
        }
    } else {
        echo "Invalid or missing bill_no parameter";
    }

    // Close the database connection
    $conn->close();
    ?>

    <!-- Button to download the PDF -->
    <button id="downloadBtn">Download as PDF</button>

    <div id="print">
        <div class="invoice-container">
            <!-- Invoice content starts here -->
            <div class="header">
            <div style="display: flex; align-items: center; justify-content: space-between;">
    <!-- Logo on the left -->
    <div style="flex: 1;">
        <img src="./assets/images-new/kadeerlogo.png" alt="Kaderbhoy Logo" style="width: 340px; height: 65px;">
    </div>

    <!-- Text on the right -->
    <div style="flex: 2; text-align: left; padding-left: 0px; padding-top: 0px; ">
        <h3 style="font-size: 15px; margin-left: 1.4in;">786</h3>
        <h3 style="font-size: 16px; margin-left: 1in;font-weight: bold;">Sales Tax Invoice</h3>
       

        <h2 style="font-weight:bold; font-size: 22px; margin: 0px 0;">Kaderbhoy Muhammadali & Sons</h2>
        <p style="font-size: 14px; margin: 5px 0;">Clearing Forwarding & Shipping Agents | C.H.A.L. NO. 36</p>
        <p style="font-size: 11px;font-weight:bold; margin: 0px 0;">16, Jehangir Kothari Building, M.A. Jinnah Road, Near Denso Hall, Karachi | 021 - 32735211</p>
    </div>
</div>

<hr class="custom-hr">



<p style=" font-size:14px; font-weight: bold; ">
All Goods are Cleared, Forward & Stored at the Owner's Risk
</p>




            </div>

            <!-- Customer Info -->
            <div class="customer-info">
                <div class="field-container">
                    <div class="field-label">Bill No: <?php echo $data['bill_no']; ?></div>
                    <div class="field-label right-label">Date: <?php echo $data['date']; ?></div>
                </div>
                <div class="field-container">
                    <div class="field-label">Ref No: <?php echo $data['ref_no']; ?></div>
                </div>
                <div class="field-container">
                    <div class="field-label">Messrs: <?php echo $data['messrs']; ?></div>
                </div>
                <div class="field-container">
                    <div class="field-label">G.S.T No: <?php echo $data['gst_no']; ?></div>
                </div>
            </div>

            <!-- Particulars of Consignments -->
            <h3 class="consignment-heading">Particulars Of Consignments</h3>
            <div class="consignment-info">
                <div class="field-container">
                    <div class="field-label">Vessel’s Name / From: <?php echo $data['ss_from']; ?></div>
                </div>
                <div class="field-container">
                    <div class="field-label">Description Of Goods: <?php echo $data['description_of_goods']; ?></div>
                </div>
                <div class="field-container">
                    <div class="field-label">B/L No: <?php echo $data['bl_no']; ?></div>
                    <div class="field-label right-label">Invoice No: <?php echo $data['invoice_no']; ?></div>
                </div>
                <div class="field-container">
                    <div class="field-label">I.G.M No: <?php echo $data['igm_no']; ?></div>
                    <div class="field-label right-label">Date: <?php echo $data['igm_date']; ?></div>
                </div>
                <div class="field-container">
                    <div class="field-label">Index No: <?php echo $data['index_no']; ?></div>
                    <div class="field-label right-label">Date:<?php echo $data['index_date']; ?></div>
                </div>
                <div class="field-container">
                    <div class="field-label">Bill Of Entry No: <?php echo $data['bill_of_entry_no']; ?></div>
                    <div class="field-label right-label">Date: <?php echo $data['bill_of_entry_date']; ?></div>
                </div>
                <div class="field-container">
                    <div class="field-label">No Of Packages: <?php echo $data['no_of_packages']; ?></div>
                    <div class="field-label right-label">KG: <?php echo $data['weight']; ?></div>
                </div>

                <div class="field-container">
                    <div class="field-label">Billing Number: <?php echo $data['marks_as_per_be']; ?></div>
                </div>

                <!-- Charges and Totals -->
                <div class="charges">
                    <div class="field-container">
                        <div class="field-label">Service Charges: <?php echo $data['service_charges']; ?></div>
                    </div>
                    <div class="field-container">
                        <div class="field-label">G.S.T Tax: <?php echo $data['gst_tax']; ?></div>
                    </div>
                </div>

                <div class="field-container">
                    <div class="field-label">Rupees In Words: <?php echo $data['rupees_in_text']; ?></div>
                </div>
                <div class="field-container">
                    <div class="field-label">Grand Total</div>
                    <div class="field-label right-label"><?php echo $data['grand_total']; ?></div>
                </div>
            </div>
            
            <footer>
                <div>Invoice By</div>
                <div>Kaderbhoy Muhammadali & Sons</div>
            </footer>
        </div>
    </div>
    <script>
    // Fetch the bill number from PHP and store it in a JavaScript variable
    const billNo = 'Bill_No_' + "<?php echo $data['bill_no']; ?>"; // Fetches the bill number from PHP

    document.getElementById('downloadBtn').addEventListener('click', function () {
        const invoiceElement = document.getElementById('print'); // The invoice container

        // Use html2pdf with custom options for better quality
        const opt = {
            margin:       0,                // Reduced margin (in inches)
            filename:     billNo + ".pdf",    // PDF filename
            image:        { type: 'jpeg', quality: 4 }, // High-quality image rendering
            html2canvas:  { scale: 5 },       // Increase scale to improve resolution (default is 1)
            jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' } // Set PDF size to A4
        };

        // Generate and download the PDF
        html2pdf().from(invoiceElement).set(opt).save();
    });
</script>
</body>

</html>