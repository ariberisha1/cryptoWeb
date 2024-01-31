<?php
include 'config/config.php';
$config->redirecthome();

include 'controller/user.class.php';

$auth = new userController();
$auth->loginProcess();
$auth->singupProcess();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
    <link href="assets/alertmsg/alert.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="toast"></div>
    <div class="container" id="container">
        <div class="form-container sing-up-container">
            <form class="signUp" method="post" name="form" onsubmit="return validated()">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>Or use your email for Registration</span>
                <input autocomplete="off" type="text" placeholder="Name" id="Name">
                <div id="name_error">Please fill up your Name</div>
                <input autocomplete="off" type="email" placeholder="Email" id="Email">
                <div id="email_error">Please fill up your Email</div>
                <input type="password" placeholder="Password" id="Password" >
                <div id="password_error">Please fill up your Password</div>
                <button>Sing Up</button>
            </form>
        </div>
        <div class="form-container sing-in-container">
            <form class="signIn"  method="POST" name="form">
                <h1>Sign In</h1>
                <div class="social-container">
                    <a href="" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <input autocomplete="off" name="email" type="email" placeholder="Email"  id="Email2">
                <div id="email_error2">Please fill up your Email</div>
                <input type="password" name="password" placeholder="Password" id="Password2">
                <div id="password_error2">Please fill up your Password</div>

                <button name="submit">Sing In</button>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="devingine" id="signIn">Sign In</button>
                </div>

                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your parsonal details and start journey with us.</p>
                    <button class="devingine" id="signUp">Sign Up</button>
                </div>

            </div>
        </div>

    </div>

    <script src="script.js"></script>
    <script src="signup.js"></script>
    <script type="text/javascript" src="assets/alertmsg/alert.js"></script>
    
</body>

</html>