<?php

class Users extends DBconfig
{

    public $email;
    public $password;

    //Manipulimi i dbs per logim
    public function loginModel($email, $password)
    {
        $stmt = $this->db()->prepare("SELECT * FROM users WHERE email = ?");

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            echo "DB execute error";
            exit();
        }
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            echo "user  error";
            exit();
        }
        $userinfo = $stmt->fetch();

        $passwordCheck = password_verify($password, $userinfo['password']);

        if ($passwordCheck == false) {
            utility::setmessage('error', 'psswordi gabim!!!', '/login.php');
            exit();
        }
        if ($passwordCheck == true) {
            $_SESSION['user_id'] = $userinfo['id'];
            $_SESSION['roli'] = $userinfo['roli'];
            $_SESSION['emri'] = $userinfo['name'];

            utility::setmessage('success', 'U kyqet me sukses!', '/manage/index.php');
            exit();
        }
    }
    //Manipulimi ne db per regjistrim
    public function singupModel($name, $surname, $email, $password)
    {
        $sql = "INSERT INTO users(name,surname,email,password) values(?,?,?,?)";
        $stmt = $this->db()->prepare($sql);

        if (!$stmt->execute(array($name, $surname, $email, $password))) {
            $sql = null;
            echo 'te dhenat u futen me sukses!!!';
            exit();
        }
    }
    //Ndryshimi i te dhenave te profilit procesi ne db
    public function updateProfile($name, $surname, $email)
    {
        $stmt = $this->db()->prepare("UPDATE users SET name = ?,surname = ?,email=? WHERE id = ?");

        if (!$stmt->execute(array($name, $surname, $email, $_SESSION['user_id']))) {
            $sql = null;
            echo 'Diqka shkoi gabim me dbn';
            exit();
        } else {
            utility::setmessage('success', 'Te dhenat u rifreskuan me sukses!', '/manage/profile.php');
            exit();
        }
    }
    public function changePassProfile($newpw)
    {
        $hashpw = password_hash($newpw, PASSWORD_BCRYPT);
        $stmt = $this->db()->prepare("UPDATE users SET password= ? WHERE id = ?");
        if (!$stmt->execute(array($hashpw, $_SESSION['user_id']))) {
            $sql = null;
            utility::setmessage('error', 'Lajmroni staffin diqka shkoi gabim!', '/manage/index.php');
            exit();
        } else {
            utility::setmessage('success', 'Passwordi u rifreskuan me sukses!', '/manage/profile.php');
            exit();
        }
    }
    //Thirrja e te dhenave per profilin e kyqur
    public function fetchuserinfo()
    {
        $info = $this->db()->prepare("SELECT * FROM users WHERE id = ?");
        $info->execute(array($_SESSION['user_id']));
        return $info->fetch();
    }
    //Thirrja e te dhenave te userit ne baz te rolit
    public function fetchAllByRole($type)
    {   
        $info = $this->db()->prepare("SELECT * FROM users WHERE roli = ?");
        $info->execute(array($type));
        return $info->fetchAll();
    }
    //Fshirja e userave
    public function deleteuser($id,$type){
        $info = $this->db()->prepare("DELETE FROM users WHERE id = ?");
        if (!$info->execute(array($id))) {
            $info = null;
            if($type == 'admin'){
                utility::setmessage('error', 'Lajmroni staffin diqka shkoi gabim!', '/manage/userlist.php?type=admin');
                exit();
            }
            utility::setmessage('error', 'Lajmroni staffin diqka shkoi gabim!', '/manage/userlist.php?type=user');
            exit();
        }else if($info->rowCount() <= 0){
            $info = null;
            if($type == 'admin'){
                utility::setmessage('error', 'Kjo id nuk u gjend!', '/manage/userlist.php?type=admin');
                exit();
            }
            utility::setmessage('error', 'Kjo id nuk u gjend!', '/manage/userlist.php?type=user');
            exit();
        }else{
            if($type == 'admin'){
                utility::setmessage('error', 'U fshi me sukses ky perdorues!', '/manage/userlist.php?type=admin');
                exit();
            }
            utility::setmessage('success', 'U fshi me sukses ky perdorues!', '/manage/userlist.php?type=user');
            exit();
        }
    }
    //Testimi nese email ka ekzistuar me pare per singup dhe profile ne db
    public function checkBusy($email, $metoda = null)
    {

        $sql = 'SELECT email FROM users WHERE email=?';
        $info = [$email];
        if ($metoda == 'profili') {
            $sql = 'SELECT email FROM users WHERE (email=?) && id != ?';
            $info = [$email, $_SESSION['user_id']];
        }
        $stmt = $this->db()->prepare($sql);

        if (!$stmt->execute($info)) {
            $stmt = null;
            echo 'Error DB execute';
            exit();
        }
        $result = null;
        if ($stmt->rowCount() != 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
}
