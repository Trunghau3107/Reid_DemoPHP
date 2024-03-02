<?php

    namespace App\controllers;
    use App\models\ProductModel;
    class HomeController extends BaseController{
        private $ProductModel;

        function __construct(){
            $this->ProductModel = new ProductModel();
        }

        function index(){
            //sản phẩm mới
            $newProduct = $this->ProductModel->getNewProduct();
            $html_new_product = $this->ProductModel->boxProduct($newProduct);

            //sản phẩm nhiều lượt xem
            $views = $this->ProductModel->getProductByView();
            $html_view_product = $this->ProductModel->boxProduct($views);

            $this->view(
                'HomePage', 
                [
                    'title' => 'Reid | Trang Chủ',
                    'html_new_product' => $html_new_product,
                    'html_view_product' => $html_view_product
                ]
            );
        }
        function admin(){
          

            $this->page(
                'dashboarh', 
                [
                    'title' => 'admin'
                  
                ]
            );
        }
    }
?>