<?php $config->redirectlogin(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crypto Page</title>

    <!-- Slider -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Css file -->
    <link href="/assets/alertmsg/alert.css" rel="stylesheet" type="text/css" />
	<link href="/assets/css/header.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/home.css" rel="stylesheet" type="text/css" />



</head>
<body>
  

<!-- Header -->

<header class="header ">

    <div class="header-1">
        <a href="index.html" class="logo"> <i class="fas fa-coins"></i> Crypto Page</a>
        <div>
        <tr>
        <?php $config->headerbuttonat() ?>
        </tr>
        </div>
        



            <div>
            <a class="profili" href="/profili"><i class="fas fa-user"></i> Profili im</a>
            &nbsp;&nbsp;&nbsp;<a class="logout" href="/profili?logout"><i class="fas fa-fingerprint"></i> Shkyqu</a>
</div>
        
        
    </div>
    




</header>