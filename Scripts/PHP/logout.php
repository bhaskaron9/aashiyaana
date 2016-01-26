
<?php
//used to logout
session_start();
session_unset();
    session_destroy();
    $_SESSION = array();
    header("location:login_page.php?stat=4");
?>