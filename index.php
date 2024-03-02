<?php
session_start();
ob_start();

require_once './vendor/autoload.php';
use App\controllers\ProductController;
use App\controllers\HomeController;
use App\controllers\UserController;
use App\controllers\CategoryController;
use App\router\Router;


$router = new Router();

//trang chủ
Router::get('/', [HomeController::class, 'index']);
// trang sản phẩm
Router::get('/product',[ProductController::class,'index']);
//sản phẩm chi tiết
Router::get('/product_detail',[ProductController::class,'detail']);
//đăng ký
Router::get('/dang-ky' ,[UserController::class, 'register']);
Router::post('/dang-ky', [UserController::class, 'registerPost']);

//đăng nhập
Router::get('/dang-nhap' ,[UserController::class, 'login']);
Router::post('/dang-nhap' ,[UserController::class, 'loginPost']);

//đang xuất
Router::get('/dang-xuat', [UserController::class, 'logout']);
// quên mật khẩu
Router::get('/quen-mat-khau', [UserController::class, 'forgotPassword']);
Router::post('/quen-mat-khau', [UserController::class, 'forgotPasswordPost']);
// đổi mật khẩu
Router::get('/doi-mat-khau', [UserController::class, 'changePassword']);
Router::post('/doi-mat-khau', [UserController::class, 'changePasswordPost']);

Router::get('/admin', [HomeController::class, 'admin']);

Router::get('/category', [CategoryController::class, 'handleCategory']);
// create
Router::post('/category', [CategoryController::class, 'getDataCategory']);
// get one
Router::get('/updateCategory', [CategoryController::class, 'getUpdateCategory']);
// update
Router::post('/updateCategory', [CategoryController::class, 'getUpdateCategory']);
// delete /delCategory
Router::get('/delCategory', [CategoryController::class, 'delCategory']);

//product
// read
Router::get('/sp', [ProductController::class, 'handleProduct']);
// create
Router::post('/sp', [ProductController::class, 'getDataProduct']);
// get one
Router::get('/updateSp', [ProductController::class, 'getUpdateSp']);
// update
Router::post('/updateSp', [ProductController::class, 'getUpdateSp']);
// delete product
Router::get('/delSp', [ProductController::class, 'delProduct']);

// user 
// read user
Router::get('/user', [UserController::class, 'handleUser']);
// create user 
Router::post('/user', [UserController::class, 'getDataUser']);

// get one
Router::get('/updateUser', [UserController::class, 'getUpdateUser']);
// deleteUser
Router::get('/delUser', [UserController::class, 'delUser']);

$router->resolve();

ob_end_flush();
?>
