<?php
// error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Redirect if form has not been submitted
if(empty($_POST)){
    header("location: guestbook.php"); // key value pair that sends user to the index page.
}

require ('includes/dbcreds.php'); // if file not found, terminate
?>

<!doctype html>
<html id="html-guestbook" lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- favicon -->
    <link rel="icon" type="image/png" href="images/letterA01.png">
    <!-- CSS -->
    <link rel="stylesheet" href="styles/main.css">
    <title>Guestbook</title>
</head>
<body>
<!--
        HEADER
-->
<header class="bg-transparent">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent text-white sticky-top">
        <a class="navbar-brand ml-5"  href="#"><img src="images/letterA01.png" height="50" width="50" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end mr-5" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://autterback.greenriverdev.com/305/portfolio/resume.html">Resume</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="https://autterback.greenriverdev.com/305/portfolio/guestbook.html">Guestbook</a>
                </li>
            </ul>
        </div>
    </nav>
</header> <!-- HEADER NAVIGATION -->

<!--
        JUMBOTRON
-->
<div id="html-guestbook" class="container-fluid guestbook-info">
    <div class="jumbotron bg-transparent">
        <h1 class="text-white text-center font-weight-bold">T H A N K Y O U !</h1>
        <h5 class="text-center">We will be in touch <strong>soon</strong></h5>
    </div> <!-- CLOSING DIV FOR JUMBOTRON -->

    <?php
    $fname = $_POST['first-name'];
    $lname = $_POST['last-name'];
    $company = $_POST['company'];
    $jobTitle = $_POST['job-title'];
    $linkedIn = $_POST['linked-in'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $howWeMet = $_POST['how-we-met'];
    $howOther = $_POST['how-we-met'];
    $comments = $_POST['leave-comment'];
    $mailFormat = $_POST['mailing-type'];
    $submit_date = date("Y/m/d g:i a");

    $sql = "INSERT INTO guestbook(first_name, last_name, company, job_title, linked_in, 
                                email, phone, how_we_met, comments, mail_format, submit_date) 
                                    VALUES ('$fname', 
                                        '$lname',
                                        '$company', 
                                        '$jobTitle', 
                                        '$linkedIn', 
                                        '$email',
                                        '$phone', 
                                        '$howWeMet',  
                                        '$comments',
                                        '$mailFormat',
                                        '$submit_date')";

    $success = mysqli_query($cnxn, $sql);
    if(!$success){
        echo "<p>Sorry, something went wrong</p>";
        return;
    }
    ?>



</div>
</body>
</html>