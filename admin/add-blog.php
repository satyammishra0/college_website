<?php

session_start();
if (!$_SESSION['useremail']) {
    $RequiredDetails = "You don't have access to this page";
    header('location:index.php?DetailsRequired=' . $RequiredDetails);
}


?>

<?php
include('config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Board</title>
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/utility.css">
    <link rel="stylesheet" href="../news_admin/dashboard.css">
    <link rel="stylesheet" href="./dashboard_two.css">

    <style>
        form>input {
            width: 100%;
            height: 30px;
            font-size: 20px;
            padding: 4px 10px;
        }

        form>textarea {
            height: 200px;
            width: 100%;
            font-size: 20px;
            padding: 4px 10px;
            border: 1px solid var(--primary-color);
        }

        .submit_btn {
            font-size: 20px;
            padding: 4px 10px;
        }
    </style>
</head>

<body>
    <h2 class="main-heading dashboard-heading" style="color:var(--white);text-align: center;">Admin Dashboard</h2>
    <!-- ------------------------------------- -->
    <!-- ------------Dashboard part --------------- -->
    <!-- ------------------------------------- -->
    <section class="first-board">
        <div class="first-board-grid grid">
            <!-- ------------------------------------- -->
            <!-- ------------Left part --------------- -->
            <!-- ------------------------------------- -->
            <div class="first-board-grid-left">
                <h1 class="main-headng">Hii, Admin</h1>
                <ul>
                    <li>
                        <button id="Events-box">
                            <a href="blogs_list.php">Blog</a>
                        </button>
                    </li>
                    <li><button><a href="add-blog.php">Add Blog</a></button></li>
                </ul>
                <div class="logout-btn">
                    <form action="../news_admin/logout.php" method="post">
                        <button>LOGOUT</button>
                    </form>
                </div>
            </div>
            <!-- ------------------------------------- -->
            <!-- ------------Right part --------------- -->
            <!-- ------------------------------------- -->
            <div class="table-contrainer tabs-container ">
                <!-- ------------------------------------- -->
                <!-- ------------blog part --------------- -->
                <!-- ------------------------------------- -->
                <form action="add-blog-processing.php" method="POST" enctype='multipart/form-data' id="blog-form-box">
                    <h2 class="sub-heaidng">To Post the blog Enter the required details</h2>
                    <small>Heading</small><br>
                    <input type="text" name="BlogHeading"><br>
                    <input type="text" hidden name="active_tab" value="1">

                    <p style="color:#ff0000;font-size:14px;">
                        <?php
                        if (isset($_GET['Blog_Error1'])) {
                            echo $_GET['Blog_Error1'];
                        }
                        ?>
                    </p>
                    <br>
                    <small>Text</small><br>
                    <textarea row="4" type="text" name="BlogContent"></textarea><br>
                    <p style="color:#ff0000;font-size:14px;">
                        <?php
                        if (isset($_GET['Blog_Error2'])) {
                            echo $_GET['Blog_Error2'];
                        }
                        ?>
                    </p>
                    <br><small>Image</small><br>
                    <input type="file" name="BlogImage">
                    <p style="color:#ff0000;font-size:14px;">
                        <?php
                        if (isset($_GET['Blog_Error3'])) {
                            echo $_GET['Blog_Error3'];
                        }
                        ?>
                    </p>

                    <input type="submit" name="BlogSubmitBtn" class="submit_btn">
                    <p style="color:green;font-size:14px;">
                        <?php
                        if (isset($_GET['Blog_success'])) {
                            echo $_GET['Blog_success'];
                        }
                        ?>
                    </p>
                    <p style="color:#ff0000;font-size:14px;">
                        <?php
                        if (isset($_GET['Error_msg4'])) {
                            echo $_GET['Error_msg4'];
                        }
                        ?>
                    </p>
                </form>
            </div>
        </div>
    </section>

</body>

</html>

<!-- complete the update page ui and adding page of the blogs -->