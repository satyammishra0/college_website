<?php

session_start();
if (!$_SESSION['useremail']) {
    $RequiredDetails = "You don't have access to this page";
    header('location:index.php?DetailsRequired=' . $RequiredDetails);
}


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
    <link rel="stylesheet" href="dashboard.css">
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
                            <a href="javascript:change_tab(0);">News</a>
                        </button>
                    </li>
                    <li>
                        <button id="News-box">
                            <a href="javascript:change_tab(1);">Blog</a>
                        </button>
                    </li>
                    <li>
                        <button id="Notice-box">
                            <a href="javascript:change_tab(2);">Events</a>
                        </button>
                    </li>
                </ul>
                <div class="logout-btn">
                    <form action="logout.php" method="post">
                        <button>LOGOUT</button>
                    </form>
                </div>
            </div>
            <!-- ------------------------------------- -->
            <!-- ------------Right part --------------- -->
            <!-- ------------------------------------- -->
            <div class="tabs-container">
                <!-- ------------------------------------- -->
                <!-- ------------News part --------------- -->
                <!-- ------------------------------------- -->
                <div class="first-board-grid-right tabs" data-tab-id="0">
                    <form action="news-processing.php" method="POST" id="news-form-box">
                        <h2 class="sub-heaidng">News Inserting section</h2>
                        <small>Heading</small><br>
                        <input type="hidden" name="active_tab" value="0">
                        <input type="text" name="NewsHeading"><br>
                        <p style="color:#ff0000;font-size:14px;">
                            <?php
                            if (isset($_GET['News_Error1'])) {
                                echo $_GET['News_Error1'];
                            }
                            ?>
                        </p>
                        <p style="color:#ff0000;font-size:14px;">
                            <?php
                            if (isset($_GET['Empty_Fields'])) {
                                echo $_GET['Empty_Fields'];
                            }
                            ?>
                        </p>
                        <br>
                        <small>Text</small><br>
                        <textarea row="4" type="text" name="NewsContent"></textarea><br>
                        <p style="color:#ff0000;font-size:14px;">
                            <?php
                            if (isset($_GET['News_Error2'])) {
                                echo $_GET['News_Error2'];
                            }
                            ?>
                        </p>
                        <p style="color:#ff0000;font-size:14px;">
                            <?php
                            if (isset($_GET['Empty_Fields'])) {
                                echo $_GET['Empty_Fields'];
                            }
                            ?>
                        </p>
                        <br>
                        <input type="submit" name="NewsSubmitBtn">
                        <p style="color:green;font-size:14px;">
                            <?php
                            if (isset($_GET['News_Success'])) {
                                echo $_GET['News_Success'];
                            }
                            ?>
                        </p>
                        <p style="color:#ff0000;font-size:14px;">
                            <?php
                            if (isset($_GET['News_Error3'])) {
                                echo $_GET['News_Error3'];
                            }
                            ?>
                        </p>
                    </form>
                </div>
                <!-- ------------------------------------- -->
                <!-- ------------blog part --------------- -->
                <!-- ------------------------------------- -->
                <div class="first-board-grid-right tabs" data-tab-id="1">
                    <form action="blog-processing.php" method="POST" enctype='multipart/form-data' id="blog-form-box">
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

                        <input type="submit" name="BlogSubmitBtn">
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
                <!-- ------------------------------------- -->
                <!-- ------------Event part --------------- -->
                <!-- ------------------------------------- -->
                <div class="first-board-grid-right tabs" data-tab-id="2">
                </div>
            </div>
        </div>
    </section>

    <script>
        function change_tab(tab_index) {
            let tabs = document.querySelectorAll(".tabs");
            for (let i = 0; i < tabs.length; i++) {
                let ele = tabs[i];
                let ele_tab_index = (ele.hasAttribute("data-tab-id")) ? ele.getAttribute("data-tab-id") : "";

                if (ele_tab_index != "" && tab_index == ele_tab_index) {
                    ele.style.display = "unset";
                } else {
                    ele.style.display = "none";
                }
            }
        }

        let i = `<?= isset($_GET["active_tab"]) ? $_GET['active_tab'] : "" ?>`
        if (i != "") {
            change_tab(i);
        }


        setTimeout(() => {
            window.history.pushState(
                "",
                "Page Title",
                window.location.href.split("?")[0]
            );

            // window.location.replace(window.location.href.split("?")[0])
        }, 3000);
    </script>
</body>

</html>