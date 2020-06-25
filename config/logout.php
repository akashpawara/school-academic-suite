<?php
   session_start();
   if(session_destroy()) {
     echo '<script type="text/javascript">'.
     'window.alert("You have succesfully logged out!! ");'.
 'window.location.href="../index.html";'.
 '</script>';
   }
?>
