<?php

include_once "includes/header.php";
include_once "includes/nav.php";
?>

<div class="container my-5" style="width:40%; margin: 0 auto">
    <h3 class="text-center mb-3">Đăng Ký</h3>

    <form action="/dang-ky" method="POST">
        <div class="form-group mb-3">
            <label for="username">Tên đăng nhập</label>
            <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="password">Mật Khẩu</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group my-3">
            <button type="submit" class="btn btn-outline-dark">Đăng Ký</button>
        </div>
    </form>
    <p>Bạn đã có tài khoản? <a href="/dang-nhap" style="color:red";>Đăng nhập</a></p>
</div>

<hr>
<?php
include_once "includes/footer.php";
?>