<?php
$database = "autterba_grc";
$username = "autterba_grcuser";
$password = "Pr0gr@mmer";
$hostname = "localhost";

$cnxn = mysqli_connect($hostname, $username, $password, $database)
    or die("There was a problem");