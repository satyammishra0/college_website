<?php
include('../admin/config.php');

if (isset($_POST['BlogSubmitBtn'])) {
    $BlogHeading = $_POST['BlogHeading'];
    $BlogContent = $_POST['BlogContent'];
    $BlogImage = $_FILES['BlogImage'];
    $active_tab = $_POST['active_tab'];
    if ($BlogHeading == "") {
        $Error_msg = "Heading can't be empty";
        header('location: dashboard.php?Blog_Error1=' . $Error_msg . '&Error2=' . '&active_tab=' . $active_tab);
    }
    if ($BlogContent == "") {
        $Error_msg2 = "Text can't be empty";
        header('location: dashboard.php?Blog_Error2=' . $Error_msg2 . '&active_tab=' . $active_tab);
    }

    if ($BlogImage['name'] == "") {
        $Error_msg3 = "File not selected";
        header('location: dashboard.php?Blog_Error3=' . $Error_msg3 . '&active_tab=' . $active_tab);
    }
    if (!$BlogHeading == "" || !$BlogContent == "") {
        $BlogImageName = $BlogImage['name'];
        $BlogImagePath = $BlogImage['tmp_name'];
        $dest_folder = 'upload_image/' . $BlogImageName;
        move_uploaded_file($BlogImagePath, $dest_folder);
        $blog_query = mysqli_query($conn, "insert into blogs (`BlogHeading`,`BlogContent`,`ImgPath`) values ('$BlogHeading','$BlogContent','$dest_folder');");
        $Blog_success = 'Your Content was submitted successsfully';
        header('location: dashboard.php?&Blog_success=' . $Blog_success . '&active_tab=' . $active_tab);
    } else {
        $Error_msg4 = "You haven't filled the required details";
        header('location: dashboard.php?Error_msg4=' . $Error_msg4 . '&active_tab=' . $active_tab);
    }
}
