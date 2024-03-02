<?php
if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    // Assuming you have a function named "one" in your model
    $product = $this->ProductModel->oneProduct($productId);
    
    // Assuming "one" returns an associative array with column names as keys
    extract($product);
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
<!-- 
    <a class="menucon" href=""><i class="fa-solid fa-location-dot"></i> Cửa hàng</a>
    <a class="menucon" href="/"><i class="fa-solid fa-cart-plus"></i> Giỏ Hàng</a> -->
</div>
<section class="form">
    <h2 class="mb-5">Chỉnh Sửa Sản Phẩm</h2>
    <form action="/updateSp" method="POST" enctype="multipart/form-data">
        <label for="iddm">Danh mục <select name="iddm" id="iddm" class="form-control">

                <?php
                $CategoryModel = new \app\models\CategoryModel();
                $categories = $CategoryModel->categoryShow();
            if(isset($categories)){
                foreach($categories as $dm){
                    echo '<option value="'.$dm['id'].'">'.$dm['namedm'].'</option>';
                }
            } 
        ?>
            </select></label><br>
        <div class="mb-3">
            <label for="" class="form-label">Tên Sản Phẩm</label>
            <input type="text" class="form-control" name="name" value="<?= !empty($product) ? $product['name'] : '' ?>">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Hình ảnh</label>
            <input type="file" class="form-control" name="img" value="<?= !empty($product) ? $product['img'] : '' ?>">
            <img src="<?= !empty($product) ? $product['img'] : '' ?>" width="50px" alt="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Giá</label>
            <input type="text" class="form-control" name="price"
                value="<?= !empty($product) ? $product['price'] : '' ?>">
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</section>
<section class="data">

    <table>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Danh Mục</th>
                    <th scope="col">Tên Sản Phẩm</th>
                    <th scope="col">Hình Ảnh</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Bestseller</th>
                    <th scope="col">View</th>
                    <th scope="col">Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                echo $html_box_Product; ?>
            </tbody>
        </table>
    </table>
</section>