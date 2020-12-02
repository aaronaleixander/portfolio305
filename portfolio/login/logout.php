<?php
// LOGOUT

session_start(); // start session
session_destroy(); // destroy session
$_SESSION = array(); // set session to empty array
header("location: login.php"); // redirect to login page
