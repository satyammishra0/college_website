<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>CAMBRIDGE </title>
    <meta charset="utf-8"><!-- ensures the character encoding -->
    <meta name="keywords" content="University of Oxford, university oxford, uni oxford, oxford, oxford university, oxford uni, world class university, top ranking university, excellent university, world leading universitY">
    <meta name="description" content="THGIS IS OUR COLLEGE STUDENT FOR THE STUDENT HELP TO GET THE INFORMATION EASILY">
    <meta name="author" content="SATYAM MISHRA">
    <!-- <meta name="refresh" content="50">writing this code will make sure the browser refreshes after every 50seconds -->
    <!-- <meta http-equi="refresh" content="5" url="">writing this code, the browser will automatically redirect to the given page after the provided time , in this case it is 5seconds -->

    <!-- Favicons -->
    <link href="./assets/images/favicon.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" href="./assets/css/global.css">
    <link rel="stylesheet" href="./assets/css/utility.css">
    <link rel="stylesheet" href="./assets/css/home.css">

    <!-- SOME CSS Styling -->
    <style>
        .fifth-section-grid-1-content>h2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .fifth-section-grid-1-content>p {
            display: -webkit-box;
            -webkit-line-clamp: 5;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>

<body>

    <!-- ----------------------------- -->
    <!-- ------ HEADER SECTION -------- -->
    <!-- ----------------------------- -->
    <header class="header flex">
        <img src="./assets/images/logo.png" alt="LOGO og our institute">
        <nav class="nav">
            <ul class="nav-list flex">
                <li class="nav-links text"><a href="#">home</a></li>
                <li class="nav-links text"><a href="#">About</a></li>
                <li class="nav-links text"><a href="#">Courses</a></li>
                <li class="nav-links text"><a href="#">events</a></li>
                <li class="nav-links text"><a href="#">news</a></li>
            </ul>
        </nav>
    </header>
    <!-- ----------------------------- -->
    <!-- ------ FIFTH SECTION --------  -->
    <!-- ----------------------------- -->
    <section class="fifth-section">
        <h2 class="main-heading">Our <span>Latest Events</span> </h2>
        <div class="fifth-section-grid grid grid-3">
            <?php
            include('./admin/config.php');
            $query = "SELECT * FROM `blogs`";
            $query_result = mysqli_query($conn, $query);
            while ($result = mysqli_fetch_assoc($query_result)) {
                $Blog_Id = $result['id'];

            ?>
                <a href="./views/view_events.php?id=<?= $Blog_Id ?>">
                    <div class=" fifth-section-grid-1">
                        <div class="fifth-section-grid-1-img">
                            <img src="./news_admin/<?php echo $result['ImgPath']; ?>" alt="Our latest events">
                        </div>
                        <div class="fifth-section-grid-1-content">
                            <?php

                            echo " <h2 class='sub-heading'>";
                            echo $result['BlogHeading'];
                            echo "</h2>";
                            echo "<p class='text'>";
                            echo $result['BlogContent'];
                            echo "</p>";
                            ?>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </section>
</body>

</html>