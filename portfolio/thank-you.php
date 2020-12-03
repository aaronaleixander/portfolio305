<?php
// error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Redirect if form has not been submitted
if(empty($_POST)){
    header("location: guestbook.php"); // key value pair that sends user to the index page.
}

require ('includes/dbcreds.php'); // if file not found, terminate
require('includes/guestbookFunctions.php');
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
<nav class="navbar nav-pills navbar-expand-lg navbar-light">
    <a class="navbar-brand ml-5"  href="https://autterback.greenriverdev.com/305/portfolio/landing.html"><img src="images/logo-portfolio.png" height="150" width="150" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-black-50" href="https://autterback.greenriverdev.com/305/portfolio/landing.html">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-black-50" href="https://autterback.greenriverdev.com/305/portfolio/resume.html">Resume</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-black-50" href="https://autterback.greenriverdev.com/305/portfolio/guestbook.php">Guestbook</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-black-50" href="https://autterback.greenriverdev.com/305/portfolio/admin.php">Admin</a>
            </li>
        </ul>
    </div>
</nav>

<!--
        JUMBOTRON
-->
<div id="html-guestbook" class="container-fluid guestbook-info">
    <div class="jumbotron bg-transparent">
        <h1 class="text-white text-center font-weight-bold">T H A N K Y O U !</h1>
        <h5 class="text-center">We will be in touch <strong>soon</strong></h5>
    </div> <!-- CLOSING DIV FOR JUMBOTRON -->

    <?php
    // SERVER-SIDE VALIDATION
    $isValid = true;

    // first name
    if(validName($_POST['first-name'])){
        $fname = $_POST['first-name'];
    } else{
        echo "<p>Please enter your first name.</p>";
        $isValid = false;
    }

    // last name
    if(validName($_POST['last-name'])){
        $lname = $_POST['last-name'];
    } else{
        echo "<p>Please enter your last name.</p>";
        $isValid = false;
    }

    // email
    if(validEmail($_POST['email'])){
        $email = $_POST['email'];
    } else{
        echo "<p>Please enter a valid email address.</p>";
        $isValid = false;
    }

    // phone number
    if(validPhoneNumber($_POST['phone'])){
        $phone = $_POST['phone'];
    } else{
        echo "<p>Please enter a valid phone number.</p>";
        $isValid = false;
    }

    // if mailing list checkbox is checked -> email is required
    if(isset($_POST['mailing-checkbox']) AND validMailingType($_POST['mailing-type'])){
        if(validEmail($_POST['email'])){
            $email = $_POST['email'];
        } else{
            echo "<p>Please enter a valid email address.</p>";
            $isValid = false;
        }
    }

/**
    // if linked in url is entered must be valid format
    if(!empty($_POST['linked-in'])){
        if(validURL($_POST['linked-in'])) {
            $linkedIn = $_POST['linked-in'];
        } else {
            echo "<p>Please enter a valid linked in url.</p>";
            $isValid = false;
        }
    }
  */


    // how we met is required
    if($_POST['how-we-met'] == 'none'){
        echo"<p>How we met is required.</p>";
        $isValid = false;
    }

    $linkedIn = $_POST['linked-in'];
    $company = $_POST['company'];
    $jobTitle = $_POST['job-title'];
    $howWeMet = $_POST['how-we-met'];
    $howOther = $_POST['how-we-met'];
    $comments = $_POST['leave-comment'];
    $mailFormat = $_POST['mailing-type'];
    $submit_date = date("Y/m/d g:i a");

    if(!$isValid){
        echo "<p> ERROR!! Invalid entries try again.</p>";
        return;
    }

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

    // Guestbook Summary
    echo "Guestbook Contact Summary";
    echo "<p>Name: $fname $lname</p>";
    echo "<p>Email: $email</p>";
    echo "<p>How we met: $howWeMet</p>";
    echo "<p>Linked In: $linkedIn</p>"

    ?>



</div>
</body>
</html>