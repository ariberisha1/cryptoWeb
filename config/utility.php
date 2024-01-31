<?php

class utility{
    public static function setmessage($type,$message,$lokacioni){
        $_SESSION['type'] = $type;
        $_SESSION['message'] = $message;
        header("Location: $lokacioni");
    }

    public function showmessage(){
        if (isset($_SESSION['type']) && isset($_SESSION['message'])) {
            $msg = $_SESSION["message"];
            if($_SESSION['type'] === 'success')
            {
            echo "<body onload=\"showSuccessToast('$msg')\">";
            } else if($_SESSION["type"] === 'error')
            {
                echo "<body onload=\"showErrorToast('$msg')\">";
            }
            unset($_SESSION['type']);
            unset($_SESSION['message']);
        }

    }
    public function redirecthome(){
        if(!(empty($_SESSION['user_id']))){
            header("Location: /manage/index.php");
            exit();
        }
    }
    public function redirectlogin(){
        if(empty($_SESSION['user_id'])){
            header("Location: /login.php");
            exit();
        }
    }
    public function headerbuttonat(){
        if($_SESSION['roli'] === 'admin'){
            echo '<a class="link-head" href="/home">Home</a>';
            echo '<a class="link-head" href="/userlist">Lista e Klienteve</a>'; 
            echo '<a class="link-head" href="/postlist">Lista e postev</a>';
        }else{
            echo '<a class="link-head" href="/home">Home</a>';
        }
    }
}