<?php
include('config.php');
$Blog_Id = $_GET['id'];
$Delete_Query = "DELETE FROM `blogs` WHERE `blogs`.`id` = $Blog_Id;";
$Run_DeleteQuery = mysqli_query($conn, $Delete_Query);
$DeleteThankYouMessage = "Your Blog has been deleted successfully";
header("Location:blogs_list.php?DeleteThankYouMessage=$DeleteThankYouMessage");
