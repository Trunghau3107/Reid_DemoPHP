<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- link css -->
    <link rel="stylesheet" href="../public/css/admin.css">
    <link rel="stylesheet" href="../public/css/global.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="../public/img/favicon.webp" type="image/x-icon">

    <link href="../public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
    <link href="../public/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="../public/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">

    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
</head>

<body>
        <?php
        if (!isset($_SESSION['admin'])) {
            require_once "..app/admin/$path.php";
        } else {
            echo "<div id='wrapper'>";
            require_once "../app/views/includes/admin/header.php";
            require_once "../app/views/includes/admin/sidebar.php";
            require_once "..app/admin/$path.php";
            echo "</div>";
        }

        ?>

    <!-- link js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

     <!-- Vendor js -->
     <script src="../public/assets/js\vendor.min.js"></script>

    <script src="../public/assets/libs\morris-js\morris.min.js"></script>
    <script src="../public/assets/libs\raphael\raphael.min.js"></script>

    <script src="../public/assets/js\pages\dashboard.init.js"></script>

    <!-- App js -->
    <script src="../public/assets/js\app.min.js"></script>
    </body>

</html>         