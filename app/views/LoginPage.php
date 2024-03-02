<?php

include_once "includes/header.php";
include_once "includes/nav.php";
?>

<div class="container my-5" style="width:40%; margin: 0 auto">
    <h3 class="text-center mb-3">Đăng Nhập</h3>

    <form action="/dang-nhap" method="POST">
        <p class="success">
        <?php
            if (isset($_SESSION['errorMessage'])) {
                echo "<p class='err my-3'>" . $_SESSION['errorMessage'] . "</p>";
                unset($_SESSION['errorMessage']);
            }

            if (isset($_SESSION['successMessage'])) {
                echo "<p class='success my-3'>" . $_SESSION['successMessage'] . "</p>";
                unset($_SESSION['successMessage']);
            }
            ?>
        </p>
        <div class="form-group mb-3">
            <label for="username">Tên đăng nhập</label>
            <input type="text" name="username" id="username" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="password">Mật Khẩu</label>
            <input type="password" name="password" id="password" class="form-control">
            
        </div>
        <div class="form-group my-3">
            <button type="submit" class="btn btn-outline-dark">Đăng Nhập</button>
        </div>
    </form>
    <p>Bạn chưa có tài khoản? <a href="/dang-ky" style="color:red";>Đăng ký</a></p>
    <a href="/quen-mat-khau" style="color:red";>Quên mật khẩu?</a>
</div>
<hr>
<?php
include_once "includes/footer.php";
?>