   <?php
    $conn = mysqli_connect('localhost', 'root', '', 'college');
    $query = "SELECT * FROM `blogs` where `id` = '$_GET[id]'";
    $query_result = mysqli_query($conn, $query);
    while ($result = mysqli_fetch_assoc($query_result)) {
    }
    ?>

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
       <link rel="stylesheet" href="../assets/css/global.css">
       <link rel="stylesheet" href="../assets/css/utility.css">
       <link rel="stylesheet" href="../assets/css/home.css">
       <link rel="stylesheet" href="../assets/css/view_events.css">
   </head>

   <body>
       <!-- ----------------------------- -->
       <!-- ------ HEADER SECTION -------- -->
       <!-- ----------------------------- -->
       <header class="header flex">
           <img src="../assets/images/logo.png" alt="LOGO of our institute">
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
       <!-- ------ FIRST SECTION -------- -->
       <!-- ----------------------------- -->
       <section class="first-view-events ">
           <div class="first-view-events-grid grid">
               <div class="first-view-events-grid-1">
                   <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'college');
                    $Blog_Id = $_GET["id"];
                    $query = "SELECT * FROM blogs WHERE id='$Blog_Id'";
                    $response = mysqli_query($conn, $query);
                    $result = mysqli_fetch_assoc($response);

                    if ($Blog_Id = $result) {
                    ?>

                       <h1 class="main-heading">
                           <?php
                            print_r($result['BlogHeading']);
                            ?>
                       </h1>
                       <img class="grid-center" src="../news_admin/<?php echo $result['ImgPath']; ?>" alt="Our latest events">
                       <?php
                        ?>
                       <p class="text">
                           <?php
                            print_r($result['BlogContent'])
                            ?>
                       </p>
               </div>
           <?php } else {
                        header('Location:../all_events.php');
                    }
            ?>
           <div class="first-view-events-grid-1"></div>
           </div>
       </section>
   </body>

   </html>