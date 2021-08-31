<!--
    Used for logging out a user
 -->
<?php
session_start();
if(isset($_SESSION["Username"])){
    header("Location:index.php");
    session_destroy();
}
exit();
?>