<?php 
    namespace App\models;
    use App\config\ConnectDB;

    class ProductModel{
        private $conn;
        public $id;
        public $iddm;
        public $name;
        public $img;
        public $price;
        function __construct(){
            $db = new ConnectDB();
            $this->conn = $db->connection();
        }

        //lấy sản phẩm mới
        function getNewProduct(){
            $sql = "SELECT * FROM sanpham ORDER BY id DESC LIMIT 10";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        //lấy sản phẩm nhiều lượt xem
        function getProductByView(){
            $sql = "SELECT * FROM sanpham ORDER BY view DESC LIMIT 10";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        function getDetail()
        {
            $sql = "SELECT sanpham.*, danhmuc.name as danhmuc_name
                    FROM sanpham INNER JOIN danhmuc
                    ON sanpham.iddm = danhmuc.id 
                    WHERE sanpham.id = :id";
    
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $this->id);
    
            $stmt->execute();
    
            return $stmt->fetch(\PDO::FETCH_OBJ);
        }
        function incrementView()
    {
        $sql = "UPDATE sanpham SET view = view + 1 WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }
        //show sản phẩm
        function boxProduct($products){
            $html_box_product = '';

            if($products){
                foreach ($products as $product) {
                    $html_box_product .= '
                    <div class="col-lg-3">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                src="../public/img/' .$product['img']. '" alt=""></a>
    
                                <div class="quick_button">
                                    <a href="/product_detail?id=" title="quick_view">Xem sản phẩm</a>
    
                                </div>
    
                                <div class="product_sale">
                                    <span>-7%</span>
                                </div>
                            </div>
                            <div class="product_content">
                                <h3><a href="product-details.html">' .$product['name']. '</a></h3>
                                <span class="current_price">' . number_format($product['price'], 0, ',', '.') . ' đ</span>
                            </div>
                        </div>
                    </div>
                    ';
                }
            }else{
                $html_box_product.='Không có sản phẩm';
            }

            return $html_box_product;
        }
        function productShow(){
            $sql = "SELECT sanpham.id, sanpham.name, sanpham.img, sanpham.price, sanpham.bestseller, sanpham.view, danhmuc.namedm
             FROM sanpham INNER JOIN danhmuc ON sanpham.iddm = danhmuc.id  ORDER BY sanpham.id desc";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }

 //foreach category
       function tableProduct($product){
        $html_get_product = '';
        $i = 1;
     
        if($product){
            
            foreach ($product as $product) {
               
                $html_get_product .= '
                <tr>
                    <th scope="row">'.$i.'</th>
                    <td>'.$product['namedm'].'</td>
                    <td>'.$product['name'].'</td>
                    <td>  <img src="../public/img/' .$product['img']. '" width="100px" height="80px" alt=""></td>
                   
                    <td>'.$product['price'].'</td>
                    <td>'.$product['bestseller'].'</td>
                    <td>'.$product['view'].'</td>
                    

                    <td> <a href="/updateSp?id='.$product['id'].'">Sửa</a> |
                     <a href="/delSp?id='.$product['id'].'">Xóa</a></td>
                   
                </tr>
               ';
               $i++;
            }
                
            }else{
                $html_get_product.='Không có sản phẩm';
            }

            return $html_get_product;
            }
            

            // query insert
            function insertProduct(){
                $sql = "INSERT INTO sanpham SET iddm = :iddm, name=:name, img = :img, price=:price ";
                $stmt = $this->conn->prepare($sql);
            
                $this->iddm = htmlspecialchars(strip_tags($this->iddm));
                $this->name = htmlspecialchars(strip_tags($this->name));
            
                // Make sure $this->img is not null before sanitizing it
                $this->img = isset($this->img) ? htmlspecialchars(strip_tags($this->img)) : null;
            
                $this->price = htmlspecialchars(strip_tags($this->price));
            
                $stmt->bindParam(':iddm', $this->iddm);
                $stmt->bindParam(':name', $this->name);
                $stmt->bindParam(':img', $this->img);
                $stmt->bindParam(':price', $this->price);
            
                if ($stmt->execute()) {
                    return true;
                } else {
                    return false;
                }
            }
    // query one id 
            function oneProduct($id){
                $sql = "SELECT * FROM sanpham WHERE id = :id";
                $stmt = $this->conn->prepare($sql);

                // Bind the parameter
                $stmt->bindParam(':id', $id);

                // Execute the statement
                if($stmt->execute()){
                    // Fetch the data as an associative array
                    return $stmt->fetch(\PDO::FETCH_ASSOC);
                } else {
                    return false;
                }
            }


// câu query update 
function updateProduct(){
    $sql = "UPDATE sanpham SET iddm=:iddm, name=:name, img=:img, price=:price WHERE id=:id";
    $stmt = $this->conn->prepare($sql);

    $this->iddm = htmlspecialchars(strip_tags($this->iddm));
    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->price = htmlspecialchars(strip_tags($this->price));
    $this->img = htmlspecialchars(strip_tags($this->img));

    $stmt->bindParam(':iddm', $this->iddm);
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':price', $this->price);
    $stmt->bindParam(':img', $this->img);
    $stmt->bindParam(':id', $this->id);

    if ($stmt->execute()) {
        return true; // Return true on success
    } else {
        // Return false on failure, or you can log the error
        $errorInfo = $stmt->errorInfo();
        error_log("Error executing SQL query: " . $errorInfo[2]);
        return false;
    }
}


// câu query khi ko update img
// câu query update 
function updateProductNoneImg(){
    $sql = "UPDATE sanpham SET iddm=:iddm, name=:name, price=:price WHERE id=:id";
    $stmt = $this->conn->prepare($sql);

    $this->iddm = htmlspecialchars(strip_tags($this->iddm));
    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->price = htmlspecialchars(strip_tags($this->price));

    $stmt->bindParam(':iddm', $this->iddm);
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':price', $this->price);
    $stmt->bindParam(':id', $this->id);

    if($stmt->execute()){
        return true;
    } else {
        return false;
    }
}
// delete product
function deleteProduct($id) {
    $sql = "DELETE FROM sanpham WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
    }

?>