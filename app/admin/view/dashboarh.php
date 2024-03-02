<?php
$html_header = '';
if(isset($_SESSION['user'])){
    $html_header .= '
    
    <div class="dropdown ">
    <div class="dropbtn " >' . $_SESSION['user'][0]['username'] . '</div>
    <div class="dropdown-content">
      <a href="#">thông tin cá nhân</a>
      <a href="#">Đơn hàng</a>
      <a href="#">Đổi mật khẩu</a>
      <a href="/dang-xuat">Đăng xuất</a>
    </div>
  </div>
    ';
   
}else{
    $html_header ='
    <a  class="menucon" href="/dang-nhap"><i class="fa-solid fa-user"></i> Đăng nhập </a>
    <a  class="menucon" href="/dang-ky"><i class="fa-solid fa-user"></i> Đăng ký </a>      ';
}
?>
<html lang="en">

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

<body>

    <header>


       
        <div class="menu">
            <a class="logoOwen" href="/"><img src="../../public/img/logo/logo.png" width="150px" alt=""> </a>
            <a class="menucon" href="/category"><i class="fa-solid fa-bars"></i> Danh mục</a>
            <a class="menucon" href="/sp"><i class="fa-solid fa-location-dot"></i> Sản phẩm</a>
            <a class="menucon" href="/user"><i class="fa-solid fa-phone-volume"></i>Tài khoản</a>
<!-- 
            <a class="menucon" href=""><i class="fa-solid fa-location-dot"></i> Cửa hàng</a>
            <a class="menucon" href="/"><i class="fa-solid fa-cart-plus"></i> Giỏ Hàng</a> -->



            <?=$html_header;?>

        </div>
    </header>
    <div id="container">
        <section class="nav">
            <div class="vertical-menu">
                <a href="#" class="active">Trang Chủ</a>
                <a href="/category">Danh Mục</a>
                <a href="/sp">Sản Phẩm</a>
                <a href="/user">Tài Khoản</a>
                <a href="#">Đơn Hàng</a>
            </div>
        </section>


        <section class="data">
            <a href="/">Thêm Sản Phẩm Mới</a>
            <table>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </table>
        </section>
    </div>
    <footer></footer>
</body>

</html>