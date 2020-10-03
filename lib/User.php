<?php
    include_once 'Session.php';
    include 'Database.php';

    class User
    {

        private $db;
        public function __construct(){
            $this->db = new Database();
        }

        // check Email
        public function emailCheck($email){
            $sql = "SELECT email FROM users WHERE email = :email";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':email', $email);
            $query->execute();
            if ($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }
        public function userRegistration($data){

             $name = $data['name'];
            $username = $data['username'];
            $email = $data['email'];
             $password = md5($data['password']);
            $chk_email = $this->emailCheck($email);

            if ($name == ''){
                $msg = "<div class='alert alert-danger'><strong>Name Must not Be Error</strong></div>";
                return $msg;
            }
            if ($username == ''){
                $msg = "<div class='alert alert-danger'><strong>Username Must not Be Error</strong></div>";
                return $msg;
            }
            if ($email == ''){
                $msg = "<div class='alert alert-danger'><strong>Email Must not Be Error</strong></div>";
                return $msg;
            }
            if ($password == ''){
                $msg = "<div class='alert alert-danger'><strong>Password Must not Be Error</strong></div>";
                return $msg;
            }
            if (strlen($username) < 3 ){
                $msg = "<div class='alert alert-danger'><strong>Username name is too short!</strong></div>";
                return $msg;
            }elseif(preg_match('/[^a-z0-9_-]+/i',$username)){
                $msg = "<div class='alert alert-danger'><strong>Username must only contain alphanumberical, dashes and underscores!</strong></div>";
                return $msg;

            }

            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                $msg = "<div class='alert alert-danger'><strong>Email address invalid!</strong></div>";
                return $msg;
            }

            if ($chk_email == true){
                $msg = "<div class='alert alert-danger'><strong>Email address already exist!</strong></div>";
                return $msg;
            }

            $sql = "INSERT INTO users(name, username, email, password) VALUES (:name, :username, :email, :password)";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':name', $name);
            $query->bindValue(':username', $username);
            $query->bindValue(':email', $email);
            $query->bindValue(':password', $password);
            $result = $query->execute();
            if ($result){
                $msg = "<div class='alert alert-success'><strong>Registration Successfully done</strong></div>";
                return $msg;
                Session::set('login', true);
                Session::set('name', $name);
                Session::set('username', $username);
                Session::set('email', $email);
            }else{
                $msg = "<div class='alert alert-danger'><strong>Problem with registration</strong></div>";
                return $msg;
            }

        }

        public function getLoginUser($email, $password){
            $sql = "SELECT * FROM users WHERE email = :email AND password = :password LIMIT 1";

            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':email', $email);
            $query->bindValue(':password', $password);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result;
        }
        public function userLogin($data){
            $email = $data['email'];
            $password = md5($data['password']);
            $chk_email = $this->emailCheck($email);
            if ($email == ''){
                $msg = "<div class='alert alert-success'><strong>Email Must not be empty</strong></div>";
                return $msg;
            }
            if ($password == ''){
                $msg = "<div class='alert alert-success'><strong>Password must not be empty</strong></div>";
                return $msg;
            }
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                $msg = "<div class='alert alert-success'><strong>Invalid email address</strong></div>";
                return $msg;
            }

            if ($chk_email == false){
                $msg = "<div class='alert alert-success'><strong>Email not match</strong></div>";
                return $msg;
            }

            $result = $this->getLoginUser($email, $password);

            if ($result){
                Session::init();
                Session::set("login", true);
                Session::set("id", $result->id);
                Session::set("name", $result->name);
                Session::set("username", $result->username);
                Session::set("loginmsg", "<div class='alert alert-success'><strong>You are loggin success!</strong></div>");
                header("Location: index.php");
            }else{
                $msg = "<div class='alert alert-danger'><strong>Data not found!</strong></div>";
                return $msg;
            }

        }

        public function getUserAllData(){
            $sql = "SELECT * FROM users ORDER BY id DESC";
            $query = $this->db->pdo->prepare($sql);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        }

        public function getUserIdBy($id){

            $sql = "SELECT * FROM users WHERE id = :id";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);
//            $result = $query->fetchAll();
            return $result;

        }

        public function updateUserDataById($id, $data){
            $name = $data['name'];
            $email = $data['email'];
            $username = $data['username'];

            if ($name == ""){
                $msg = "<div class='alert alert-danger'><strong>Name must not be empty</strong></div>";
                return $msg;
            }
            if ($username == ""){
                $msg = "<div class='alert alert-danger'><strong>User must not be empty</strong></div>";
                return $msg;
            }
            if ($email == ""){
                $msg = "<div class='alert alert-danger'><strong>User must not be empty</strong></div>";
                return $msg;
            }

            $sql = "UPDATE users SET name = :name, username = :username, email = :email  WHERE id = :id";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':name', $name);
            $query->bindValue(':username', $username);
            $query->bindValue(':email', $email);
            $query->bindValue(':id', $id);
            $result = $query->execute();
            if ($result){
                $msg = "<div class='alert alert-success'><strong>Profile updated successfully</strong></div>";
                header('Location: index.php');
                return $msg;
            }

        }
        public function checkOldPassword($id, $OldPassword){
            $sql = "SELECT * FROM users WHERE id = :id AND password = :password";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':id', $id);
            $query->bindValue(':password', md5($OldPassword));
            $query->execute();
            if ($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }
        public function changePassword($id, $value){
            $oldPass        = $value['old_password'];
            $newPassword    = $value['password'];
            $chk_password   = $this->checkOldPassword($id, $oldPass);

            if ($oldPass == ''){
                $msg = "<div class='alert alert-danger'><strong>Old password must not be empty</strong></div>";
                return $msg;
            }
            if ($newPassword == ''){
                $msg = "<div class='alert alert-danger'><strong>New password must not be empty</strong></div>";
                return $msg;
            }
            if ($oldPass === $newPassword){
                $msg = "<div class='alert alert-danger'><strong>Old Password & New password must not be same</strong></div>";
                return $msg;
            }

            if ($chk_password == false){
                $msg = "<div class='alert alert-danger'><strong>Old Password not match</strong></div>";
                return $msg;
            }

            $sql = "UPDATE users SET password = :password WHERE id = :id";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':password', md5($newPassword));
            $query->bindValue(':id', $id);
            $result = $query->execute();
            if ($result){
                $msg = "<div class='alert alert-success'><strong>Password updated successfully</strong></div>";
                return $msg;
            }else{
                $msg = "<div class='alert alert-danger'><strong>Password update not updated</strong></div>";
                return $msg;
            }
        }

    }