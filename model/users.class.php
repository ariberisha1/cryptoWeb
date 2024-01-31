<?php

class Users extends DBconfig {

    public $email;
    public $password;

    public function loginModel($email,$password){
       $stmt = $this->db()->prepare("SELECT * FROM users WHERE email = ?");

       if(!$stmt->execute(array($email))){
            $stmt = null;
            echo "DB execute error";
            exit();
       }
       if($stmt->rowCount() == 0){
        $stmt = null;
        echo "user  error";
        exit();
       }
       $userinfo = $stmt->fetch();
       
       $passwordCheck = password_verify($password,$userinfo['password']);

       if($passwordCheck == false){
        utility::setmessage('error','psswordi gabim!!!','/login.php');
        exit();
       }
       if($passwordCheck == true){
        echo 'u kyqet me sukses';
        exit();
       }


       
    }
    public function singupModel($name,$surname,$email,$password){
        $sql = "INSERT INTO users(name,surname,email,password) values(?,?,?,?)";
        $stmt = $this->db()->prepare($sql);

        if(!$stmt->execute(array($name,$surname,$email,$password))){
            $sql = null;
            echo 'te dhenat u futen me sukses!!!';
            exit();
        }
    }
    
}

?>