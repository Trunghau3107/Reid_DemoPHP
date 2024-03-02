<?php 
    namespace App\controllers;
    use App\models\UserModel;
    use App\libs\Mailer;

    class UserController extends BaseController{
        public $UserModel;

        private $mailer;

        function __construct(){
            $this->UserModel = new UserModel();
            $this->mailer = new Mailer();
        }
        function login(){
            $this->view(
                'LoginPage',
                [
                    'title' => 'Đăng Nhập'
                ]
            );
        }


        function loginPost()
        {
            $this->UserModel->username = $_POST['username'];
            $this->UserModel->password = $_POST['password'];
    
            if (!$this->UserModel->usernameExists()) {
                $_SESSION['errorMessage'] = 'Thông tin đăng nhập không chính xác';
                header('Location: /dang-nhap');
                exit;
            }
    
            $user = $this->UserModel->login();
    
            if (!$user) {
                $_SESSION['errorMessage'] = 'Thông tin đăng nhập không chính xác';
                header('Location: /dang-nhap');
                exit;
            } else {
                $_SESSION['user'] = $user;
                header('Location: /');
            }
        }
        //trang dăng ký
        function register(){
            $this->view(
                'RegisterPage',
                [
                    'title' => 'Đăng Ký'
                ]
            );
        }

        //chức năng đăng ký
        function registerPost()
    {
        $this->UserModel->username = $_POST['username'];
        $this->UserModel->email = $_POST['email'];
        $this->UserModel->password = $_POST['password'];

        if ($this->UserModel->usernameExists()) {
            $_SESSION['errorMessage'] = 'Tên đăng nhập đã tồn tại';
            header('Location: /dang-ky');
            exit;
        }

        if ($this->UserModel->emailExists()) {
            $_SESSION['errorMessage'] = 'Email đã tồn tại';
            header('Location: /dang-ky');
            exit;
        }
// mã hóa mk
        $this->UserModel->password = password_hash($this->UserModel->password, PASSWORD_DEFAULT);

        if ($this->UserModel->register()) {
            $_SESSION['successMessage'] = 'Đăng ký thành công';
            header('Location: /dang-nhap');
            exit;
        } else {
            $_SESSION['errorMessage'] = 'Đăng ký thất bại';
            header('Location: /dang-ky');
            exit;
        }
    }

        //trang đăng nhập
        
        

        //đăng xuất
        function logout(){

            if(isset($_SESSION['user'])){
                unset($_SESSION['user']);
            }
            
            header('Location: /');
        }
        function forgotPassword()
        {
            $this->view(
                'ForgotPassword',
                [
                    'title' => 'Reid | Quên Mật Khẩu',
                ]
            );
        }
        function forgotPasswordPost()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->UserModel->email = $_POST['email'];

            if (!$this->UserModel->emailExists()) {
                $errorMessage = "Email không tồn tại";
                $_SESSION['errorMessage'] = $errorMessage;
                header("Location: /quen-mat-khau");
            } else {
                $newPassword = uniqid();
                $this->UserModel->password = password_hash($newPassword, PASSWORD_DEFAULT);

                $this->UserModel->updatePassword();

                $subject = "Reset Password";
                $body = "Mật khẩu mới của bạn là: [$newPassword] <br> Vui lòng đăng nhập và đổi mật khẩu <br> <a href='http://localhost:3000/dang-nhap'>Đăng nhập Ngay</a>";

                $this->mailer->send($this->UserModel->email, $subject, $body);

                $successMessage = "Vui lòng kiểm tra email để đổi mật khẩu";
                $_SESSION['successMessage'] = $successMessage;

                header("Location: /dang-nhap");
                return;
            }
        }
    }
    function changePassword()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /dang-nhap');
            exit;
        }
        $this->view(
            'ChangePasswordPage',
            [
                'title' => 'Reid | Đổi Mật Khẩu',
            ]
        );
    }

    function changePasswordPost()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->UserModel->email = $_SESSION['user']->email;

            $currentPassword = $_POST['password'];
            $oldPassword = $this->UserModel->getPassword();

            if (!password_verify($currentPassword, $oldPassword)) {
                $errorMessage = "Mật khẩu hiện tại không chính xác";
                $_SESSION['errorMessage'] = $errorMessage;

                header("Location: /doi-mat-khau");
                return;
            } else {
                $newPassword = $_POST['newPassword'];

                $this->UserModel->password = password_hash($newPassword, PASSWORD_DEFAULT);
                $this->UserModel->updatePassword();

                unset($_SESSION['user']);

                $successMessage = "Đổi mật khẩu thành công! Vui lòng đăng nhập lại";
                $_SESSION['successMessage'] = $successMessage;

                header("Location: /dang-nhap");
                return;
            }
        }
    }
    function handleUser(){
        //sản phẩm mới
        $newUser = $this->UserModel->userShow();
        // var_dump($newcategory);
        $html_box_user = $this->UserModel->boxUser($newUser);

     

        $this->page(
            'addUser',
            [
                'title' => 'Load user',
                'html_box_user' => $html_box_user,
               
            ]
        );
    }
// create 
    // xử lý nhận dữ liệu từ post index
    function getDataUser(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $this->UserModel->username = $_POST['username'];
            $this->UserModel->email = $_POST['email'];
            $this->UserModel->password = $_POST['password'];
            $this->UserModel->dienthoai = $_POST['dienthoai'];
            if($this->UserModel->insertUser()){
                echo "Thêm Tài Khoản thành công";
                header('Location: /user');
            }else{
                echo "Thêm Tài Khoản thất bại";
                header('Location: /user');
            }
        }
    }
// update 
        
function getUpdateUser(){
if(isset($_GET['id'])) {
    $id = $_GET['id']; // Assign $_GET['id'] to $id
    $this->UserModel->id = $id;
    $user = $this->UserModel->oneUser($id);
    // var_dump($user);
    $newuser = $this->UserModel->UserShow();
    $html_box_user = $this->UserModel->boxUser($newuser);
    $this->page(
        'updateUser',
        [
            'title' => 'update danh mục',
            'html_box_user' => $html_box_user,
            
        ]
    );
}
// Rest of your code


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $this->UserModel->username = $_POST['username'];
    $this->UserModel->email = $_POST['email'];
    $this->UserModel->password = $_POST['password'];
    $this->UserModel->dienthoai = $_POST['dienthoai'];

    if($this->UserModel->updateUser()){
        echo "update danh mục thành công";
        header('Location: /user');
    }else{
        echo "update danh mục thất bại";
        header('Location: /user');
    }
    
}

}
// delete user
function delUser(){
if(isset($_GET['id'])) {
    $id = $_GET['id']; // Assign $_GET['id'] to $id
    
    $this->UserModel->id = $id;
    // var_dump($id);
    // Call the correct delete method on an instance of CategoryModel
    $result = $this->UserModel->deleteUser($id);

    if ($result) {
        echo "Xóa danh mục thành công";
    } else {
        echo "Xóa danh mục thất bại";
    }
    header('Location: /user');
}
}
  
    }
?>