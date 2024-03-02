<?php 
    namespace App\models;
    use App\config\ConnectDB;

    class CategoryModel{
        private $conn; 
        public $id;
        public $namedm;
        public $home;
        public $stt;

        function __construct(){
            $db = new ConnectDB();
            $this->conn = $db->connection();
        }
        function getAll()
        {
            $sql = "SELECT * FROM danhmuc ORDER BY id ASC";
            $stmt = $this->conn->prepare($sql);
    
            $stmt->execute();
    
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }
// query category 

        function categoryShow(){
            $sql = "SELECT * FROM danhmuc ORDER BY id DESC LIMIT 10";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }

 //foreach category
       function boxcategory($category){
        $html_get_category = '';
        $i = 1;
        if($category){
            
            foreach ($category as $category) {
               
                $html_get_category .= '
                <tr>
                    <th scope="row">'.$i.'</th>
                    <td>'.$category['namedm'].'</td>
                    <td>'.$category['home'].'</td>
                    <td>'.$category['stt'].'</td>
                    <td> <a href="/updateCategory?id='.$category['id'].'">Sửa</a> |
                     <a href="/delCategory?id='.$category['id'].'">Xóa</a></td>
                   
                </tr>
               ';
               $i++;
            }
                
            }else{
                $html_get_category.='Không có danh mục';
            }

            return $html_get_category;
            }

 // query insert data category
            function insertCategory(){
                $sql = "INSERT INTO danhmuc SET namedm = :namedm, home = :home, stt = :stt ";
                $stmt = $this->conn->prepare($sql);
    
                $this->namedm = htmlspecialchars(strip_tags($this->namedm));
                $this->home = htmlspecialchars(strip_tags($this->home));
                $this->stt = htmlspecialchars(strip_tags($this->stt));
    
                $stmt->bindParam(':namedm', $this->namedm);
                $stmt->bindParam(':home', $this->home);
                $stmt->bindParam(':stt', $this->stt);
    
                if($stmt->execute()){
                    return true;
                }else{
                    return false;
                }
            }
// query one id 
            function oneCategory($id){
                $sql = "SELECT * FROM danhmuc WHERE id = :id";
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
            function updateCategory(){
                $sql = "UPDATE danhmuc SET name = :name, home = :home, stt = :stt WHERE id = :id";
                $stmt = $this->conn->prepare($sql);

                $this->namedm = htmlspecialchars(strip_tags($this->namedm));
                $this->home = htmlspecialchars(strip_tags($this->home));
                $this->stt = htmlspecialchars(strip_tags($this->stt));

                $stmt->bindParam(':name', $this->namedm);
                $stmt->bindParam(':home', $this->home);
                $stmt->bindParam(':stt', $this->stt);

                if($stmt->execute()){
                    return true;
                }else{
                    return false;
                }
            }

            


            // câu query xóa

// Change from deleteCategory to delCategory
function deleteCategory($id) {
    $sql = "DELETE FROM danhmuc WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// ngoặc đóng class
}




?>