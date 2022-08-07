<?php
include('../admin/config.php');

session_start();


if (isset($_POST['submit_btn'])) {
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    if (strlen($Email) != 0 || strlen($Password) != 0) {
        if (filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            if (strlen($Password) > 8) {
                $query = "SELECT * FROM login_details;";
                $response = mysqli_query($conn, $query);
                $result = mysqli_fetch_assoc($response);
                if ($Email == $result['email'] && $Password == $result['password']) {
                    header("Location:dashboard.php");
                    $_SESSION['useremail'] = $Email;
                } else {
                    $AccessError = 'Access Denied !! Make Sure you have correct access rights !!';
                    header('Location:index.php?AccessError=' . $AccessError);
                }
            } else {
                echo "Password too short !! ";
                header("Location:index.php");
            }
        } else {
            echo "Email is not valid";
            header("Location:index.php");
        }
    } else {
        $Email_Pattern_Error = "Email is not valid";
        echo "Email And Password Can't be empty";
        header("Location:index.php");
    }
} else {
    echo "Email is not valid";
    header("Location:index.php");
}
