<?php

include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
include $_SERVER['DOCUMENT_ROOT'].'/config/headerconfig.php';

?>
<div class="central">
<br>
<br>
<br>
<div id="page">
<div class="newsbox">
<div align="center" class="avatar">
    <div class="avatar_preview">
       <div style="background-image: url(/assets/images/default.png);border: none;"></div>
    </div>
  </div>

<h5 style="text-align:center;">P&euml;rsh&euml;ndetje, <strong><?php echo $_SESSION['emri']; ?></strong>!</h5>



</div>
<div id="toast"></div>
<script type="text/javascript" src="/assets/alertmsg/alert.js"></script>