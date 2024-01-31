<?php
session_name("CryptoSESSION");
session_start();

include $_SERVER['DOCUMENT_ROOT'].'../config/db.php';

include $_SERVER['DOCUMENT_ROOT'].'../config/utility.php';

$config = new utility;
$config->showmessage();

?>