<?php
include 'model/users.class.php';

class userController{

    private $userModel;

    public function __construct()
    {

        $this->userModel = new Users();
    }
    public function loginProcess(){
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $this->userModel->loginModel($email,$password);

    }
    }
    public function singupProcess(){
        if(isset($_POST['singup'])){
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $password = $_POST['password'];


            $this->userModel->singupModel($name,$surname,$email,$password);
        }
    }
}

?>