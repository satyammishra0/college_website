<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>My Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../assets/css/my-login.css">
</head>

<body class="my-login-page">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="card fat" style="margin-top:25%;">
                        <div class="card-body">
                            <h4 class="card-title">Login</h4>
                            <form method="POST" action="login_validation.php" class="my-login-validation" required onsubmit="return data_check()">
                                <div class="form-group ">
                                    <label for="email">E-Mail Address</label>
                                    <input id="email" class="form-control" name="email" value="" autofocus>
                                    <div class="invalid-feedback">
                                        Email is invalid
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password

                                    </label>
                                    <input id="password" type="password" class="form-control" name="password" data-eye>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>
                                <div class="form-group m-0">
                                    <button type="submit" name="submit_btn" class="btn btn-primary btn-block">
                                        Login
                                    </button>
                                </div>
                                <p style="color:red;margin-top:1%; text-align:center;">
                                    <?php
                                    if (isset($_GET['AccessError'])) {
                                        echo $_GET['AccessError'];
                                    }

                                    if (isset($_GET['DetailsRequired'])) {
                                        echo $_GET['DetailsRequired'];
                                    }
                                    if (isset($_Get['Session_Logout'])) {
                                        echo $_GET['Session_Logout'];
                                    }
                                    ?>
                                </p>
                            </form>
                        </div>
                    </div>
                    <div class="footer">
                        Welcome to the SPEEDY AUTO SHIPPING <br>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function data_check() {

            var UserEmail = document.getElementById('email').value.trim();
            var UserPassword = document.getElementById('password').value.trim();
            var EmptyError = document.getElementsByClassName("invalid-feedback");

            if (UserEmail != "" && UserPassword != "") {
                if (UserEmail.includes("@") && UserEmail.endsWith(".com") && UserPassword.length > 8) {
                    return true;
                } else if (UserPassword.length < 8 || UserPassword > 0) {
                    EmptyError[1].innerHTML = "Lenght is too short";
                    EmptyError[1].style.display = "block";
                    console.log('lenght is short');
                    return false;
                } else {
                    EmptyError[0].style.display = "block";
                    console.log('include consition dont match');
                }
            } else {
                if (UserEmail == "") {
                    EmptyError[0].style.display = "block";

                }
                if (UserPassword == "") {
                    EmptyError[1].style.display = "block";
                }
            }
            return false;
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>