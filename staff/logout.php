<!-- 
    Document   : logout
    Author     : Mac
-->


<?php
    session_start();
    unset($_SESSION['username']);
    session_destroy();
    header("location: ./index.html");

?>

