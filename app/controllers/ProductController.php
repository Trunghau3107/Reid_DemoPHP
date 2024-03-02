<?php
namespace App\controllers;
use App\models\ProductModel;
use App\models\CategoryModel;
 class ProductController extends BaseController{
    private $CategoryModel;
    private $ProductModel;
    
    function __construct()
    {
        $this->CategoryModel = new CategoryModel();
        $this->ProductModel = new ProductModel();
    }

    function index()
    {
        $danhmuc = $this->CategoryModel->getAll();

        $this->view(
            'ProductPage',
            [
                'title' => 'Reid | Sản Phẩm',
                'danhmuc' => $danhmuc,
            ]
        );
    }
    function detail()
    {
        $this->ProductModel->id = $_GET['id'];
        $product = $this->ProductModel->getDetail();
        $this->ProductModel->incrementView();

        $this->view(
            'ProductDetailPage',
            [
                'title' => $product->name,
                'product' => $product
            ]
        );
    }
    function handleProduct(){
        //sản phẩm mới
        $newProduct = $this->ProductModel->productShow();
        // var_dump($newProduct);
       
        $html_box_Product = $this->ProductModel->tableProduct($newProduct);

     

        $this->page(
            'addSp',
            [
                'title' => 'Load danh mục',
                'html_box_Product' => $html_box_Product,
               
            ]
        );
    }
// create 
    // xử lý nhận dữ liệu từ post index
   // ...
   function getDataProduct(){
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $this->ProductModel->iddm = $_POST['iddm'];
        $this->ProductModel->name = $_POST['name'];
        $this->ProductModel->price = $_POST['price'];

        $target_dir = "./src/assets/img/";
        $target_file = $target_dir . basename($_FILES['img']['name']);
        $img = $target_file;
        $uploadOk = 1;

        move_uploaded_file($_FILES['img']['tmp_name'], $target_file);

       
        if ($img !== null) {
            $this->ProductModel->img = $img;
            $this->ProductModel->insertProduct();
            header("location: /sp");
        }
    }
}

// ...

    
// update 
        
function getUpdateSp($id){


if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $this->ProductModel->id = $id;
    $product = $this->ProductModel->oneProduct($id);
    // var_dump($product);
    $newProduct = $this->ProductModel->ProductShow();
    $html_box_product = $this->ProductModel->tableProduct($newProduct);
    $this->page(
        'updateSp',
        [
            'title' => 'update sản phẩm',
            'html_box_Product' => $html_box_product,
            
        ]
    );
}



if ($_SERVER['REQUEST_METHOD'] == "POST") {
   
    $this->ProductModel->iddm = $_POST['iddm'];
    $this->ProductModel->name = $_POST['name'];
    $this->ProductModel->price = $_POST['price'];
   
   
    $target_dir = "./src/assets/img/";
    $target_file = $target_dir . basename($_FILES['img']['name']);

    if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
       
        $this->ProductModel->img = $target_file;

        
        if ($this->ProductModel->updateProduct()) {
            echo "Update sản phẩm thành công";
            header("location: /sp");
        } else {
            echo "Update sản phẩm thất bại";
        }
    } else {
        echo "Lỗi khi tải lên ảnh.";
    }
    
}


}
// delete controler product
function delProduct(){
if(isset($_GET['id'])) {
    $id = $_GET['id']; // Assign $_GET['id'] to $id
    
    $this->ProductModel->id = $id;
    var_dump($id);
    // Call the correct delete method on an instance of CategoryModel
    $result = $this->ProductModel->deleteProduct($id);

    if ($result) {
        echo "Xóa danh mục thành công";
    } else {
        echo "Xóa danh mục thất bại";
    }
    header('Location: /sp');
}
}


 }

?>