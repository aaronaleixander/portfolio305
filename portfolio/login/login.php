<?php
/**
 *  305/login/login.php
 *  aaron utterback , tina ostrander
 *  11-25-2020
 *  login form for demo purposes
 */

// NOTES
// ob start , ob flush <- research
// sticky username

//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start session
session_start();

//var_dump($_POST);
// Initialize variables
$error = false;
$username = "";

//If the form has been submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //echo "Form has been submitted";

    //Get the username and password
    $username = strtolower(trim($_POST['username']));
    $password = trim($_POST['password']);

    // If they are correct
    // Actual username and password need to be stored in a separate file
    // should be moved to home directory ABOVE public_html
    require('login-creds.php');

    if($username == $adminUser && $password == $adminPassword){
        // store the fact that user is logged in
        $_SESSION['loggedin'] = true;

        // Redirect to last page user was on index page.
        if(!isset($_SESSION['page'])){
            $_SESSION['page'] = 'index.php';
        }

        header("location: " . $_SESSION['page']);
    }
    // Set an error flag
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <style>
        .err {
            color: darkred;
        }
    </style>
    <!-- favicon -->
    <link rel="icon" type="image/png" href="../images/letterA01.png">
    <!-- CSS -->
    <link rel="stylesheet" href="../styles/main.css">
</head>
<body>
<header class="bg-transparent">
    <nav class="navbar nav-pills navbar-expand-lg navbar-light bg-transparent text-white sticky-top">
        <a class="navbar-brand ml-5"  href="https://autterback.greenriverdev.com/305/portfolio/landing.html"><img src="../images/logo-portfolio.png" height="50" width="50" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center mr-5" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="https://autterback.greenriverdev.com/305/portfolio/landing.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://autterback.greenriverdev.com/305/portfolio/resume.html">Resume</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://autterback.greenriverdev.com/305/portfolio/guestbook.php">Guestbook</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-pill active" href="https://autterback.greenriverdev.com/305/portfolio/admin.php">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://autterback.greenriverdev.com/305/portfolio/login/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</header> <!-- HEADER NAVIGATION -->
<div class="container">

    <h1>Login Page</h1>

    <div class="container border border-dark">
        <form action="#" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username"
                <?php echo "value='$username' " ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" >
            </div>

            <?php if($error) : ?>
                <span class="err">Incorrect login</span><br>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

</div>


<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>