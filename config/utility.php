<?php

class utility
{
    public static function setmessage($type, $message, $lokacioni)
    {
        $_SESSION['type'] = $type;
        $_SESSION['message'] = $message;
        header("Location: $lokacioni");
    }

    public function showmessage()
    {
        if (isset($_SESSION['type']) && isset($_SESSION['message'])) {
            $msg = $_SESSION["message"];
            if ($_SESSION['type'] === 'success') {
                echo "<body onload=\"showSuccessToast('$msg')\">";
            } else if ($_SESSION["type"] === 'error') {
                echo "<body onload=\"showErrorToast('$msg')\">";
            }
            unset($_SESSION['type']);
            unset($_SESSION['message']);
        }
    }
    public function redirecthome()
    {
        if (!(empty($_SESSION['user_id']))) {
            header("Location: /manage/index.php");
            exit();
        }
    }
    public function redirectlogin()
    {
        if (empty($_SESSION['user_id'])) {
            header("Location: /login.php");
            exit();
        }
    }
    public function headerbuttonat()
    {
        if ($_SESSION['roli'] === 'admin') {
            echo '<a class="link-head" href="/manage/index.php">Home</a>';
            echo '<a class="link-head" href="/manage/userlist.php?type=user">Lista e Klienteve</a>';
            echo '<a class="link-head" href="/manage/userlist.php?type=admin">Lista e Adminave</a>';
        } else {
            echo '<a class="link-head" href="/manage/index.php">Home</a>';
        }
    }
    public function onlyAdminAccess()
    {
        if ($_SESSION['roli'] != 'admin') {
            $this->setmessage('error', "Nuk keni akses ne kete faqe", '/manage/index.php');
        }
    }
    public function userlist()
    {
        if (isset($_GET['type'])) {
            if ($_GET['type'] == 'admin') {
                include 'userlist/adminlist.php';
            } elseif ($_GET['type'] == 'user') {
                include 'userlist/userlist.php';
            } else {
                $this->setmessage('error', "Nuk u shfaq asgje", '/manage/index.php');
            }
        } else if (isset($_GET['shtouser'])) {
            include 'userlist/shtouser.php';
        }else{
            $this->setmessage('error', "Nuk u shfaq asgje", '/manage/index.php');
        }
    }
}
