<?php 

    namespace App\controllers;
    use App\models\categoryModel;
  
    class CategoryController extends BaseController{

        public $categoryModel;
        function __construct(){
        
            $this->categoryModel = new CategoryModel();
        }

// read
        
        function handleCategory(){
            //sản phẩm mới
            $newcategory = $this->categoryModel->categoryShow();
            // var_dump($newcategory);
            $html_box_category = $this->categoryModel->boxcategory($newcategory);

         

            $this->page(
                'addCategory',
                [
                    'title' => 'Load danh mục',
                    'html_box_category' => $html_box_category,
                   
                ]
            );
        }
// create 
        // xử lý nhận dữ liệu từ post index
        function getDataCategory(){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $this->categoryModel->namedm = $_POST['namedm'];
                $this->categoryModel->home = $_POST['home'];
                $this->categoryModel->stt = $_POST['stt'];

                if($this->categoryModel->insertCategory()){
                    echo "thêm danh mục thành công";
                    header('Location: /category');
                }else{
                    echo "thêm danh mục thất bại";
                    header('Location: /category');
                }
            }
        }
// update 
            
function getUpdateCategory(){
    if(isset($_GET['id'])) {
        $id = $_GET['id']; // Assign $_GET['id'] to $id
        $this->categoryModel->id = $id;
        $category = $this->categoryModel->oneCategory($id);
        // var_dump($category);
        $newcategory = $this->categoryModel->categoryShow();
        $html_box_category = $this->categoryModel->boxcategory($newcategory);
        $this->page(
            'updateCategory',
            [
                'title' => 'update danh mục',
                'html_box_category' => $html_box_category,
                
            ]
        );
    }
    // Rest of your code


    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $this->categoryModel->namedm = $_POST['namedm'];
        $this->categoryModel->home = $_POST['home'];
        $this->categoryModel->stt = $_POST['stt'];

        if($this->categoryModel->updateCategory()){
            echo "update danh mục thành công";
            header('Location: /category');
        }else{
            echo "update danh mục thất bại";
            header('Location: /category');
        }
        
    }
   
}

// deletecategory 
function delCategory(){
    if(isset($_GET['id'])) {
        $id = $_GET['id']; // Assign $_GET['id'] to $id
        
        $this->categoryModel->id = $id;
        var_dump($id);
        // Call the correct delete method on an instance of CategoryModel
        $result = $this->categoryModel->deleteCategory($id);

        if ($result) {
            echo "Xóa danh mục thành công";
        } else {
            echo "Xóa danh mục thất bại";
        }
        header('Location: /category');
    }
}

// ngoặc đóng class
    }
?>