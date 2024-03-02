<?php
if (isset($_GET['id'])) {
    $category_id = $_GET['id'];
    // Assuming you have a function named "one" in your model
    $category = $this->categoryModel->oneCategory($category_id);
    
    // Assuming "one" returns an associative array with column names as keys
    extract($category);
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <title>Document</title>
    <link rel="stylesheet" href="/app/admin/suport/css/admin.css">

</head>

<div class="menu">
    <a class="logoOwen" href="/"><img src="../../public/img/logo/logo.png" width="150px" alt=""> </a>
    <a class="menucon" href="/category"><i class="fa-solid fa-bars"></i> Danh mục</a>
    <a class="menucon" href="/sp"><i class="fa-solid fa-location-dot"></i> Sản phẩm</a>
    <a class="menucon" href="/user"><i class="fa-solid fa-phone-volume"></i>Tài khoản</a>

    <!-- <a class="menucon" href=""><i class="fa-solid fa-location-dot"></i> Cửa hàng</a>
    <a class="menucon" href="/"><i class="fa-solid fa-cart-plus"></i> Giỏ Hàng</a> -->
</div>
<section class="form">
    <h2 class="mb-5">Chỉnh Sửa Danh Mục</h2>
    <form action="/category" method="POST">

        <div class="mb-3">
            <label for="" class="form-label">Tên Danh Mục</label>
            <input type="text" class="form-control" name="namedm"
                value="<?= !empty($category) ? $category['namedm'] : '' ?>">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Home</label>
            <input type="text" class="form-control" name="home"
                value="<?= !empty($category) ? $category['home'] : '' ?>">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Số Thứ Tự</label>
            <input type="text" class="form-control" name="stt" value="<?= !empty($category) ? $category['stt'] : '' ?>">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</section>
<section class="data">


    <table class="table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên Danh Mục</th>
                <th scope="col">Home</th>
                <th scope="col">Ưu Tiên</th>
                <th scope="col">Thao Tác</th>
            </tr>
        </thead>
        <tbody>

            <?php 
                echo $html_box_category; ?>

        </tbody>
    </table>

</section>