<?php 
    namespace App\models;
    use App\config\ConnectDB;

    class UserModel{
        private $conn; 
        public $id;
        public $username;
        public $email;
        public $password;

        public $dienthoai;
        

        function __construct(){
            $db = new ConnectDB();
            $this->conn = $db->connection();
        }

        function register()
{
    $sql = "INSERT INTO user SET username = :username, email = :email, password = :password ";
    $stmt = $this->conn->prepare($sql);

    $this->username = htmlspecialchars(strip_tags($this->username));
    $this->email = htmlspecialchars(strip_tags($this->email));
    $this->password = htmlspecialchars(strip_tags($this->password));

    $stmt->bindParam(':username', $this->username);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':password', $this->password);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

    
function login()
{
    $sql = "SELECT * FROM user WHERE username = :username";
    $stmt = $this->conn->prepare($sql);

    $this->username = htmlspecialchars(strip_tags($this->username));
    $stmt->bindParam(':username', $this->username);
    $stmt->execute();

    $user = $stmt->fetchObject();

    if (!$user) {
        return false;
    }
    
    // Giải mã và kiểm tra mật khẩu
    if (password_verify($this->password, $user->password)) {
        return $user;
    } else {
        return false;
        
    }
}

function getPassword()
    {
        $sql = "SELECT password FROM user WHERE email = :email";
        $stmt = $this->conn->prepare($sql);

        $this->email = htmlspecialchars(strip_tags($this->email));

        $stmt->bindParam(':email', $this->email);

        $stmt->execute();

        $user = $stmt->fetchObject();

        return $user->password;
    }
        function usernameExists()
    {
        $sql = "SELECT * FROM user WHERE username = :username";
        $stmt = $this->conn->prepare($sql);

        $this->username = htmlspecialchars(strip_tags($this->username));

        $stmt->bindParam(':username', $this->username);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function emailExists()
    {
        $sql = "SELECT * FROM user WHERE email = :email";
        $stmt = $this->conn->prepare($sql);

        $this->email = htmlspecialchars(strip_tags($this->email));

        $stmt->bindParam(':email', $this->email);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    function updatePassword()
{

    $sql = "UPDATE user SET password = :password WHERE email = :email";
    $stmt = $this->conn->prepare($sql);

    $this->password = htmlspecialchars(strip_tags($this->password));
    $this->email = htmlspecialchars(strip_tags($this->email));

    $stmt->bindParam(':password', $this->password);
    $stmt->bindParam(':email', $this->email);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
function userShow(){
    $sql = "SELECT * FROM user ORDER BY id DESC";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    return $result;
}

//foreach user
function boxUser($user){
$html_get_user = '';
$i = 1;
if($user){
    
    foreach ($user as $value) {
       
        $html_get_user .= '
        <tr>
            <th scope="row">'.$i.'</th>
            <td>'.$value['username'].'</td>
            <td>'.$value['email'].'</td>
            <td>'.$value['password'].'</td>
            <td>'.$value['dienthoai'].'</td>
            
            <td> <a href="/updateUser?id='.$value['id'].'">Sửa</a> |
             <a href="/delUser?id='.$value['id'].'">Xóa</a></td>
           
        </tr>
       ';
       $i++;
    }
        
    }else{
        $html_get_user.='Không có danh mục';
    }

    return $html_get_user;
    }
    // query insert data category
    function insertUser(){
        $sql = "INSERT INTO user SET username = :username, email = :email, password = :password, dienthoai=:dienthoai ";
        $stmt = $this->conn->prepare($sql);

        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->dienthoai = htmlspecialchars(strip_tags($this->dienthoai));


        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':dienthoai', $this->dienthoai);


        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    // query one id 
    function oneUser($id){
        $sql = "SELECT * FROM user WHERE id = :id";
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
    function updateUser(){
        $sql = "UPDATE user SET username = :username, email = :email, password  = :password , dienthoai=:dienthoai WHERE id = :id";
        $stmt = $this->conn->prepare($sql);

        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password  = htmlspecialchars(strip_tags($this->password ));
        $this->dienthoai  = htmlspecialchars(strip_tags($this->dienthoai ));

        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password ', $this->password );
        $stmt->bindParam(':dienthoai ', $this->dienthoai);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
//delete
    function deleteUser($id) {
        $sql = "DELETE FROM user WHERE id = :id";
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