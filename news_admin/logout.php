<?php
session_start();
if ($_SESSION['useremail']) {
    unset($_SESSION['useremail']);
    $Session_Logout = "Thank You for visiting Us 😊";
    header('location:index.php?DetailsRequired=' . $Session_Logout);
}
