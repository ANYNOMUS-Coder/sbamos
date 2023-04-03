<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

function getEmailError(){
    $error = $_SESSION['EMAIL_ERROR'];
    unset($_SESSION['EMAIL_ERROR']);
    return $error;
}
?>
