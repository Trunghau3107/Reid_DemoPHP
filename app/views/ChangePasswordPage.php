<?php

include_once "includes/header.php";
include_once "includes/nav.php";
?>

<div class="container my-5" style="width:40%; margin: 0 auto">
    <h3 class="text-center mb-3">Đổi mật khẩu</h3>


    <form action="/doi-mat-khau" method="POST">
        <div class="form-group mb-3">
        <p class="err">
                    <?php
                    if (isset($_SESSION['errorMessage'])) {
                        echo $_SESSION['errorMessage'];
                        unset($_SESSION['errorMessage']);
                    }
                    ?>
                </p>
            <label for="password">Mật khẩu hiện tại</label>
            <input type="text" name="password" id="password" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="newPassword">Mật khẩu mới</label>
            <input type="password" name="newPassword" id="newPassword" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="password">Nhập lại mật khẩu mới</label>
            <input type="password" name="newPasswordConfirm" id="newPasswordConfirm" class="form-control">
        </div>
        <div class="form-group my-3">
            <button type="submit" name="btn-change-password" class="btn btn-outline-dark">Đổi mật khẩu</button>
        </div>
    </form>
</div>

<?php
include_once "includes/footer.php";
?>