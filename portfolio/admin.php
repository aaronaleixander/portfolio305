<?php
// set error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// includes
require ('includes/dbcreds.php'); // database credentials

// start session
session_start();
if(!isset($_SESSION['loggedin'])){
    $_SESSION['page'] = $_SERVER['SCRIPT_URI']; // full path of the page you are currently on

    // Redirect to login
    header("location: login/login.php");
}
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
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

    <title>Administration</title>
</head>
<body>
<!--
        HEADER
-->
<header class="bg-transparent">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent text-white sticky-top">
        <a class="navbar-brand ml-5"  href="https://autterback.greenriverdev.com/305/portfolio/landing.html"><img src="images/letterA01.png" height="50" width="50" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center mr-5" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="https://autterback.greenriverdev.com/305/portfolio/guestbook.html">Guestbook</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="https://autterback.greenriverdev.com/305/portfolio/login/logout.php">Logout</a>
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
        <h1 class="text-white text-center font-weight-bold">D A T A</h1>
        <h5 class="text-center"> <strong>Guestbook form tables</strong></h5>
    </div> <!-- CLOSING DIV FOR JUMBOTRON -->
<div class="container-fluid border border-dark bg-white rounded mt-5 text-black text-center font-weight-normal justify-content-center align-items-center">
    <div class="container">
        <h1>Guestbook Entries</h1>
        <table id="guestbook-table" class="display table-striped">
            <thead>
                <tr>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Company</td>
                    <td>Job Title</td>
                    <td>Linked In</td>
                    <td>E Mail Address</td>
                    <td>Phone Number</td>
                    <td>How We Met</td>
                    <td>Comments</td>
                    <td>Mailing Format</td>
                    <td>Date Submitted</td>
                </tr>
            </thead>
            <tbody>
            <?php

            $sql = "SELECT * FROM guestbook";
            $result = mysqli_query($cnxn, $sql);
            //var_dump($result);

            foreach($result as $row) {
                $fname = $row['first_name'];
                $lname = $row['last_name'];
                $company = $row['company'];
                $jobTitle = $row['job_title'];
                $linkedIn = $row['linked_in'];
                $email = $row['email'];
                $phone = $row['phone'];
                $howWeMet = $row['how_we_met'];
                $comments = $row['comments'];
                $mailFormat = $row['mail_format'];
                $submit_date = date("M d, Y g:i a", strtotime($row['submit_date']));

                echo "<tr>";
                echo "<td>$fname</td>
             <td>$lname</td>
             <td>$company</td>
             <td>$jobTitle</td>
             <td>$linkedIn</td>
             <td>$email</td>
             <td>$phone</td>
             <td>$howWeMet</td>
             <td>$comments</td>
             <td>$mailFormat</td>
             <td>$submit_date</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
    $('#guestbook-table').DataTable({
        "order": [[10, "desc"]]
    });
</script>
</body>
</html>