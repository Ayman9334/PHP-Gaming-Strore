<?php
session_start();
unset($_SESSION["valid"]);
unset($_SESSION["frstn"]);
unset($_SESSION["secn"]);
unset($_SESSION["Admin"]);
header("Location:../Home/main.php");
?>