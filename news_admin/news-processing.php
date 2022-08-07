<?php
include('../admin/config.php');
if ($conn) {
    echo "db connected";
}

if (isset($_POST['NewsSubmitBtn'])) {


    $NewsHeading = $_POST['NewsHeading'];
    $NewsContent = $_POST['NewsContent'];
    $active_tab = $_POST['active_tab'];
    if ($NewsHeading == "" && $NewsContent == "") {
        $Empty_Fields = "Please Fill the fields";
        header('location: dashboard.php?Empty_Fields=' . $Empty_Fields . '&active_tab=' . $active_tab);
        exit();
    }
    if ($NewsHeading == "") {
        $News_Error1 = "Heading can't be empty";
        header('location: dashboard.php?News_Error1=' . $News_Error1 . '&active_tab=' . $active_tab);
        exit();
    }
    if ($NewsContent == "") {
        $News_Error2 = "Content can't be empty";
        header('location: dashboard.php?News_Error2=' . $News_Error2 . '&active_tab=' . $active_tab);
        exit();
    }

    if ($NewsHeading != "" && $NewsContent != "") {
        $query = "INSERT INTO `news_posting` (`newsheading`, `newscontent`) VALUES (`$NewsHeading`,`$NewsContent`);";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "query run";
        } else {
            echo "query fails";
        }
        $News_Success = "Your news was added to the website";
        header('location: dashboard.php?News_Success=' . $News_Success . '&active_tab=' . $active_tab);
    } else {
        $News_Error3 = "There is some error while processing please submit again";
        header('location: dashboard.php?News_Error3=' . $News_Error3 . '&active_tab=' . $active_tab);
    }
}
