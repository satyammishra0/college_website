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
        .tabs {
            display: block !important;
        }


        .table-contrainer>form>input {
            width: 90%;
            height: 30px;
            font-size: 18px;
            padding: 2px 6px;
            margin: 1% 0;
            transition: all 0.3s;
        }

        input[type=submit] {
            width: 20% !important;
            padding: 4px;
            border: none !important;
            margin: 2% 0;
            border: none;
            background-color: vaR(--primary-color);
            color: var(--white);
        }

        input[type="text"] {

            border: 1px solid var(--primary-color-darken);
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
                            <a href="">Blog</a>
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
                <?php $id = $_GET['id'];
                ?>
                <form action="update_blog_process.php?id=<?php echo $id; ?>" method="POST" enctype='multipart/form-data' id="blog-form-box">
                    <h2 class="sub-heaidng">
                        Update the blog "<?php
                                            $query = "SELECT * FROM blogs where `id`= '$id' ";
                                            $result = mysqli_query($conn, $query);
                                            $BlogHeading = mysqli_fetch_assoc($result);
                                            echo " "
                                                . $_GET['id'];
                                            ?>
                        "
                    </h2>
                    <small>Heading</small><br>
                    <input type="text" name="Updated_BlogHeading" value="<?php echo $BlogHeading['BlogHeading'] ?>"><br>


                    <small>Content</small><br>
                    <input type="text" class="textbox" name="Updated_BlogContent" value=" <?php echo $BlogHeading['BlogContent'] ?>">

                    <small>Upload New Profile</small>
                    <input type="file" id="myFile" name="Updated_BlogFilename">

                    <input type="submit" value="" name="Update_SubmitBtn">
                </form>
            </div>
        </div>
    </section>

</body>

</html>


<!-- update /delete page 
requirements in update page to be added  
deletion oage complete
-->