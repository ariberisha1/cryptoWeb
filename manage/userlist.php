<?php

include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
include $_SERVER['DOCUMENT_ROOT'] . '/config/headerconfig.php';
include $_SERVER['DOCUMENT_ROOT'] . '/controller/user.class.php';

$config->userlist();


?>


<div id="toast"></div>
<script type="text/javascript" src="/assets/alertmsg/alert.js"></script>