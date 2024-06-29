<?php include_once "config/database.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Shop</title>
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="vendors/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="vendors/jquery/jquery-3.7.1.js"></script>
</head>
<body>

    <div class="btn btn-flush btn-cancel position-fixed bottom-0 end-0 bg-danger text-white m-2">Flush</div>

    <div class="loader-container position-fixed">
        <div id="loader" class="loader position-absolute"></div>
    </div>

    <header id="header" class="header w-100 h-100 bg-primary">
        <div class="header-container d-flex text-white align-items-center">
            <img src="https://icongr.am/material/menu.svg?size=28&color=ffffff" class="pe-3 menu-toggler">
            <h1 class="pt-1">Local Shop</h1>
        </div>
    </header>

    <div id="main-content" class="main-content d-flex">

        <div class="border-right sidebar-wrapper" id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                <a href="?templates=addRecords" class="list-group-item list-group-item-action p-3">Add Records</a>
                <a href="?templates=customers" class="list-group-item list-group-item-action p-3">Customers</a>
                <a href="?templates=reports" class="list-group-item list-group-item-action p-3">Reports</a>
            </div>
        </div>

        <div class="content-refresh py-2">
            <div class="content-refresh-wrap">
            <?php
                if(isset($_GET['templates'])) {
                    $templates = $_GET['templates'];
                    switch ($templates) {
                        case 'addRecords':
                            include 'templates/addRecords.php';
                            break;
                        case 'customers':
                            include 'templates/customers.php';
                            break;
                        case 'reports':
                            include 'templates/reports.php';
                            break;
                        default:
                            echo '<h2>Error</h2><p>Page Not Found.</p>';
                    }
                } else {
                    include 'templates/addRecords.php';
                }
                ?>
            </div>
        </div>
    </div>

    <footer class="footer mt-auto py-3 text-white">
        <div class="container text-center">
            <span>&copy; 2024 - <?php echo date("Y"); ?> Admin Dashboard. All rights reserved.</span>
        </div>
    </footer>

    <script src="vendors/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <script src="src/js/script.js" defer type="text/javascript"></script>
</body>
</html>