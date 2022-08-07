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

        .table>tbody>tr>td:nth-child(2) {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .table-contrainer>table>tbody>tr>td>button:nth-child(odd) {
            margin-left: 0%;
        }

        .table-contrainer>table>tbody>tr>td>button {
            border: 1px solid #fff;
            margin-bottom: 2%;
            background-color: var(--primary-color) !important;
        }

        .table-contrainer>table>tbody>tr>td>button:nth-child(1) {
            background-color: var(--medium-gray) !important;
        }

        .table-contrainer>table>tbody>tr>td>button>a {
            color: black !important;
        }

        .blog_content_container {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            max-width: 350px !important;
            -webkit-box-orient: vertical;
            overflow: hidden;
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
                <!-- ------------------------------------- -->
                <!-- ------------blog part --------------- -->
                <!-- ------------------------------------- -->
                <table style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Date</th>
                            <th>
                                Changes
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $query = "SELECT * FROM blogs";
                        $BlogResult = mysqli_query($conn, $query);
                        while ($BlogRow = mysqli_fetch_assoc($BlogResult)) {
                        ?> <tr>

                                <td><?php echo stripslashes($BlogRow["BlogHeading"]);  ?></td>
                                <td class="blog_content_container"><?php echo stripslashes($BlogRow["BlogContent"]); ?></td>
                                <td><?php echo $BlogRow["adding_time"]; ?></td>
                                <td>
                                    <?php $BlogId = $BlogRow['id']; ?>
                                    <button style="width:80%;"><a href="update_blog.php?id=<?php echo $BlogId; ?>">Update</a></button>
                                    <button style="width:80%;" onclick="DeleteConfirmation()"><a href="delete_blog.php?id=<?php echo $BlogId; ?>">Delete</a></button>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <?php
    if (isset($_GET['ThankYouMessage'])) {
        echo '<script type="text/JavaScript"> 
     alert("' . $_GET['ThankYouMessage'] . '");
     </script>';
    }
    if (isset($_GET['DeleteThankYouMessage'])) {
        echo '<script type="text/JavaScript"> 
     alert("' . $_GET['DeleteThankYouMessage'] . '");
     </script>';
    }

    ?>
    <script>
        setTimeout(() => {
            window.history.pushState(
                "",
                "Page Title",
                window.location.href.split("?")[0]
            );

            // window.location.replace(window.location.href.split("?")[0])
        }, 3000);

        function DeleteConfirmation() {
            alert('Are You sure want to deleted the selected blog');

        }
    </script>
</body>

</html>

<!-- complete the update page ui and adding page of the blogs -->