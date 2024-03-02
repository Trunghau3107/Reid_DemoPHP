<?php

include_once "includes/header.php";
include_once "includes/nav.php";
?>

<div class="container my-5" style="width:40%; margin: 0 auto">
    <h3 class="text-center mb-3">Quên mật khẩu</h3>

    <form action="/quen-mat-khau" method="POST">
    <p class="success">
                <?php
                if (isset($_SESSION['successMessage'])) {
                    echo $_SESSION['successMessage'];
                    unset($_SESSION['successMessage']);
                }
                ?>
            </p>

            <p class="err">
                <?php
                if (isset($_SESSION['errorMessage'])) {
                    echo $_SESSION['errorMessage'];
                    unset($_SESSION['errorMessage']);
                }
                ?>
            
        <div class="form-group mb-3">
            <label for="email">Nhập địa chỉ email</label>
            <input type="text" name="email" id="email" class="form-control">
            <span class="err" id="emailErr"></span>
        </div>
        <div class="form-group my-3">
            <button type="submit" class="btn btn-outline-dark">Gửi Email</button>
        </div>
    </form>

</div>

<?php
include_once "includes/footer.php";
?>