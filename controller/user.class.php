<?php
include $_SERVER['DOCUMENT_ROOT'] . '/model/users.class.php';

class userController
{

    public $userModel;
    private $name;
    private $surname;
    private $email;
    private $password;
    private $newpw;

    public function __construct()
    {
        $this->userModel = new Users();
    }
    //Procesi i kyqjes se Userit
    public function loginProcess()
    {
        if (isset($_POST['submit'])) {

            $this->email = $_POST['email'];
            $this->password = $_POST['password'];

            $this->emptyInfo('login');
            $this->userModel->loginModel($this->email, $this->password);
        }
    }
    //Procesi i regjistrimit te Userit
    public function singupProcess()
    {
        if (isset($_POST['singup'])) {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $password = $_POST['password'];


            $this->userModel->singupModel($name, $surname, $email, $password);
        }
    }

    //Procesi i profilit dhe fjalkalimit
    public function procesiprofilit()
    {
        if (isset($_POST['submit'])) {

            $this->name = $_POST['name'];
            $this->surname = $_POST['surname'];
            $this->email = $_POST['email'];

            $this->emptyInfo('profili');
            $this->isBusyEmail('profili');
            $this->userModel->updateProfile($this->name, $this->surname, $this->email);
        }
        if (isset($_POST['changepw'])) {
            $this->password = $_POST['password'];
            $this->newpw = $_POST['newpw'];
        }
    }


    //Validimi i te dhenave
    private function emptyInfo($type)
    {
        if ($type == 'login') {
            if (empty($this->email) || empty($this->password)) {
                utility::setmessage('error', 'Te dhenat mos i lini te zbrazeta!', '/login.php');
                exit();
            }
        } else if ($type == 'profili') {
            if (empty($this->name) || empty($this->surname) || empty($this->email)) {
                utility::setmessage('error', 'Te dhenat mos i lini te zbrazeta!', '/manage/profile.php');
                exit();
            }
        } else {
            if (empty($this->name) || empty($this->surname) || empty($this->email) || empty($this->password)) {
                utility::setmessage('error', 'Te dhenat mos i lini te zbrazeta!', '/login.php');
                exit();
            }
        }
    }

    //Validimi nese eshte i zene emaili per singup dhe profile
    private function isBusyEmail($type = null)
    {
        if ($type = 'profili') {
            if ($this->userModel->checkBusy($this->email, 'profili')) {
                utility::setmessage('error', 'Ky email eshte i zene!', '/manage/profile.php');
                exit();
            }
        } else {
            if ($this->userModel->checkBusy($this->email, 'singup')) {
                utility::setmessage('error', 'Ky email eshte i zene!', '/login.php');
                exit();
            }
        }
    }
}
