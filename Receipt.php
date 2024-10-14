<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: login-page.php');
    exit(); // It's a good practice to add exit() after a header redirect to ensure that no further code is executed.
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Booking Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <style>
        .table-responsive {
            max-width: 100%;
            overflow-x: auto;
            white-space: nowrap;
        }

        table td,
        table th {
            max-width: 150px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            text-align: center;
        }

        @media screen and (max-width: 768px) {

            table th,
            table td {
                font-size: 12px;
            }
        }
    </style>

</head>

<body data-sidebar="dark">

    <!-- Loader -->
    <div id="preloader" style="display: none;">
        <div id="status" style="display: none;">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                        </a>

                        <a href="index.html" class="logo logo-light">
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    <div class="d-none d-sm-block ms-2">
                        <h4 class="page-title font-size-18">Receipt</h4>
                    </div>

                </div>

                <div class="d-flex">

                    <div class="dropdown d-none d-lg-inline-block">
                    </div>

                    <div class="dropdown d-none d-md-block ms-2">
                    </div>

                    <div class="dropdown d-none d-lg-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            data-bs-toggle="fullscreen">
                            <i class="mdi mdi-fullscreen"></i>
                        </button>
                    </div>

                    <div class="dropdown d-flex ms-2 align-items-center">
                        <button type="button" class="btn btn-danger noti-icon waves-effect">
                            <a style="color: white; font-weight: bold;" href="logout-page.php">Logout</a>
                        </button>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <i class="mdi mdi-spin mdi-cog"></i>
                        </button>
                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Main</li>

                        <li>
                            <a href="index.php" class="waves-effect">
                                <i class="dripicons-device-desktop"></i>
                                <span>Sales Tax Invoice</span>
                            </a>
                        </li>
                        <li>
                            <a href="Receipt.php" class="waves-effect">
                                <i class="dripicons-device-desktop"></i>
                                <span>New Invoice</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">

                <div class="container-fluid">

                    <!-- end row -->
                    <?php
                    include 'connection.php';

                    // Fetch data from the "sales_tax_invoice" table
                    $sql = "SELECT * FROM receipt";
                    $result = $conn->query($sql);

                    // Check if the query was successful
                    if ($result === false) {
                        die("Error executing the query: " . $conn->error);
                    }

                    // Display "Create" button regardless of rows
                    echo '<div class="row">
          <div class="col-xl-12">
              <div class="card">
                  <div class="card-body">
                      <h4 class="card-title mb-4">Receipt Data</h4>
                      <a href="Receipt-create.php"><button class="btn btn-primary"><b>Create</b></button></a>';

                    if ($result->num_rows > 0) {
                        echo '<div class="table-responsive">
              <table class="table mt-4 mb-0 table-centered table-nowrap">
                  <thead>
                      <tr>';

                        // Output table headers
                        $headers = $result->fetch_assoc();
                        foreach ($headers as $key => $value) {
                            echo '<th style="text-align: center;">' . htmlspecialchars($key) . '</th>';
                        }

                        echo '<th style="text-align: center;">Edit</th>
          <th style="text-align: center;">Delete</th>
          <th style="text-align: center;">Print</th>
      </tr>
      </thead>
      <tbody>';

                        // Reset the internal pointer to the beginning of the result set
                        mysqli_data_seek($result, 0);

                        // Output table data
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            foreach ($row as $value) {
                                echo '<td title="' . htmlspecialchars($value) . '" style="text-align: center;">' . htmlspecialchars($value) . '</td>';
                            }

                            // Edit, Delete, and Print buttons with links
                            echo '<td style="text-align: center;"><a href="Receipt-update.php?id=' . $row['bill_no'] . '"><button class="btn btn-primary">Edit</button></a></td>';
                            echo '<td style="text-align: center;"><a href="Receipt-delete.php?id=' . $row['bill_no'] . '"><button class="btn btn-danger">Delete</button></a></td>';
                            echo '<td style="text-align: center;"><a href="Receipt-print.php?id=' . $row['bill_no'] . '"><button class="btn btn-success">Print</button></a></td>';

                            echo '</tr>';
                        }

                        echo '</tbody>
          </table>
      </div>'; // Close table-responsive div
                    } else {
                        echo '<p>No records found</p>'; // Display message if no records are found
                    }

                    echo '  </div>
      </div>
  </div>
</div>';

                    // Close the database connection
                    $conn->close();
                    ?>

                    <!-- end row -->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Smuftech<span class="d-none d-sm-inline-block"></span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title px-3 py-4">
                <a href="javascript:void(0);" class="right-bar-toggle float-end">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>

            <!-- Settings -->
            <hr class="mt-0" />
            <h6 class="text-center mb-0">Choose Demo</h6>

            <div class="p-4">
                <div class="mb-2">
                    <img src="assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked />
                    <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch"
                        data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css" />
                    <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch"
                        data-appStyle="assets/css/app-rtl.min.css" />
                    <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                </div>

                <h6 class="mt-4">Select Custom Colors</h6>
                <div class="d-flex">

                    <ul class="list-unstyled mb-0">
                        <li class="form-check">
                            <input class="form-check-input theme-color" type="radio" name="theme-mode"
                                id="theme-default" value="default"
                                onchange="document.documentElement.setAttribute('data-theme-mode', 'default')" checked>
                            <label class="form-check-label" for="theme-default">Default</label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input theme-color" type="radio" name="theme-mode" id="theme-orange"
                                value="orange"
                                onchange="document.documentElement.setAttribute('data-theme-mode', 'orange')">
                            <label class="form-check-label" for="theme-orange">Orange</label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input theme-color" type="radio" name="theme-mode" id="theme-teal"
                                value="teal"
                                onchange="document.documentElement.setAttribute('data-theme-mode', 'teal')">
                            <label class="form-check-label" for="theme-teal">Teal</label>
                        </li>
                    </ul>

                    <ul class="list-unstyled mb-0 ms-4">
                        <li class="form-check">
                            <input class="form-check-input theme-color" type="radio" name="theme-mode" id="theme-purple"
                                value="purple"
                                onchange="document.documentElement.setAttribute('data-theme-mode', 'purple')">
                            <label class="form-check-label" for="theme-purple">Purple</label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input theme-color" type="radio" name="theme-mode" id="theme-green"
                                value="green"
                                onchange="document.documentElement.setAttribute('data-theme-mode', 'green')">
                            <label class="form-check-label" for="theme-green">Green</label>
                        </li>
                        <li class="form-check">
                            <input class="form-check-input theme-color" type="radio" name="theme-mode" id="theme-red"
                                value="red" onchange="document.documentElement.setAttribute('data-theme-mode', 'red')">
                            <label class="form-check-label" for="theme-red">Red</label>
                        </li>
                    </ul>

                </div>
                <!-- <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-default" value="default" onchange="document.documentElement.setAttribute('data-theme-mode', 'default')" checked>
                <label class="form-check-label" for="theme-default">Default</label>
            </div> -->

                <!-- <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-teal" value="teal" onchange="document.documentElement.setAttribute('data-theme-mode', 'teal')">
                <label class="form-check-label" for="theme-teal">Teal</label>
            </div> -->

                <!-- <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-orange" value="orange" onchange="document.documentElement.setAttribute('data-theme-mode', 'orange')">
                <label class="form-check-label" for="theme-orange">Orange</label>
            </div> -->

                <!-- <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-purple" value="purple" onchange="document.documentElement.setAttribute('data-theme-mode', 'purple')">
                <label class="form-check-label" for="theme-purple">Purple</label>
            </div> -->

                <!-- <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-green" value="green" onchange="document.documentElement.setAttribute('data-theme-mode', 'green')">
                <label class="form-check-label" for="theme-green">Green</label>
            </div> -->

                <!-- <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-red" value="red" onchange="document.documentElement.setAttribute('data-theme-mode', 'red')">
                <label class="form-check-label" for="theme-red">Red</label>
            </div> -->
            </div>

        </div>
        <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>