<?php
include('config.php');


$Update_SubmitBtn = $_POST['Update_SubmitBtn'];
if (isset($Update_SubmitBtn)) {


    if (isset($_POST['Updated_BlogHeading']) || isset($_POST['Updated_BlogContent']) || isset($_FILES['Updated_BlogFilename'])) {


        $Updated_BlogHeading = $_POST['Updated_BlogHeading'];
        $Updated_BlogContent = $_POST['Updated_BlogContent'];
        $Updated_FileName = $_FILES['Updated_BlogFilename'];
        $Updated_FilePath = $Updated_FileName['tmp_name'];
        $dest_folder = 'updated_images/' . $Updated_FileName['name'];

        move_uploaded_file($Updated_FilePath, $dest_folder);
        $Updated_FilePath = $Updated_FileName['name'];
        $Update_BlogId = $_GET['id'];

        echo $Update_BlogId;
        $Update_Query = "UPDATE `blogs` SET `BlogHeading`='$Updated_BlogHeading',`BlogContent`='$Updated_BlogContent',`ImgPath`='$Updated_FilePath' WHERE `blogs`.`id`=$Update_BlogId;";
        $Update_QueryRun = mysqli_query($conn, $Update_Query);
        $ThankYouMessage = "Your Blog with id=" . $Update_BlogId . "has been updated successfully";

        header("Location:blogs_list.php?ThankYouMessage=$ThankYouMessage");
    } else {
        $EmptyFieldsName = "Please select all the fields";
        header('location:update_blogs_list.php?$EmptyFieldsError=echo $EmptyFieldsName');
    }
}
