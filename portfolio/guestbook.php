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
    <nav class="navbar nav-pills navbar-expand-lg navbar-light">
        <a class="navbar-brand ml-5"  href="https://autterback.greenriverdev.com/305/portfolio/landing.html"><img src="images/logo-portfolio.png" height="50" width="50" alt="logo"></a>
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
                    <a class="nav-link rounded-pill active" href="https://autterback.greenriverdev.com/305/portfolio/guestbook.php">Guestbook</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://autterback.greenriverdev.com/305/portfolio/admin.php">Admin</a>
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
        <h1 class="text-white text-center font-weight-bold">C O N N E C T</h1>
        <h5 class="text-center">Sign my guestbook and <strong>lets get in touch.</strong></h5>
    </div> <!-- CLOSING DIV FOR JUMBOTRON -->
<!--
        GUESTBOOK FORM
-->     <form class="p-3 mb-5 border border-info bg-white w-50 mx-auto align-content-around" id="guestbook-form" method="post" action="thank-you.php">
            <fieldset class="fieldset">
                <legend>Contact Info:</legend>
                    <div class="row">
                        <div class="form-group col-4 row-sm-6">
                            <label for="first-name">First Name:</label>
                            <input type="text" class="form-control" id="first-name" name="first-name" autofocus>
                            <span id="err-fname" class="d-none text-danger">Please enter a first name</span>
                        </div>
                        <div class="form-group col-4 row-sm-6">
                            <label for="last-name">Last Name:</label>
                            <input type="text" class="form-control" id="last-name" name="last-name">
                            <span id="err-lname" class="d-none text-danger">Please enter a last name</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-2 row-sm-4">
                            <label for="company">Company: </label>
                            <input type="text" class="form-control" id="company" name="company">
                        </div>
                        <div class="form-group col-2 row-sm-4">
                            <label for="job-title">Job Title: </label>
                            <input type="text" class="form-control" id="job-title" name="job-title">
                        </div>
                        <div class="form-group col-4 row-sm-4">
                            <label for="linked-in">LinkedIn URL: </label>
                            <input type="text" class="form-control" id="linked-in" name="linked-in">
                            <span id="err-linked" class="d-none text-danger">Url must begin with http and end with .com</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4 row-sm-2">
                            <label for="email">Email: </label>
                            <input type="text" class="form-control" id="email" name="email">
                            <span id="err-email" class="d-none text-danger">Email must be @email.com format</span>
                        </div>
                        <div class="form-group col-4 row-sm-2">
                            <label for="phone">Phone Number: </label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                    </div>
            </fieldset> <!-- CONTACT INFO FIELDSET -->

                    <fieldset class="fieldset">
                        <legend class="pl-3">How we connected: </legend>
                        <select class="form-control ml-3 col-4" id="how-we-met" name="how-we-met" >
                            <option value='none'>How did we meet?</option>
                            <option value='school'>School</option>
                            <option value='linkedin'>Linked In</option>
                            <option value='workshop'>Workshop</option>
                            <option value='career-fair'>Career Fair</option>
                            <option value='other'>Other</option>
                        </select>
                        <span id="err-met" class="d-none text-danger">How we met is required :)</span>
                        <div id="how-met-other" class="form-group col-6">
                            <label for="met-other">Other: </label>
                            <input type="text" class="form-control" id="met-other" name="met-other">
                        </div>
                        <div class="form-group col-6">
                            <label for="leave-comment">Leave a Comment</label>
                            <textarea class="form-control" id="leave-comment" name="leave-comment" rows="5"></textarea>
                        </div>
                    </fieldset> <!-- HOW WE CONNECTED FIELDSET -->

            <fieldset class="fieldset">
                <legend>Mailing list: </legend>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="mailing-checkbox" id="mailing-checkbox">
                    <label class="form-check-label" for="mailing-checkbox">
                        Please add me to your mailing list
                    </label>
                    <span id="err-mailing" class="d-none text-danger"></span>
                </div>
                <div id="hide-mail">
                    <legend>Please choose a mailing format: </legend>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="mailing-type" id="html-mail" value="html-mail">
                        <label class="form-check-label" for="html-mail">HTML</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="mailing-type" id="text-mail" value="text-mail">
                        <label class="form-check-label" for="text-mail">Text</label>
                    </div>
                </div>
            </fieldset> <!-- MAILING LIST FIELDSET -->

            <!-- SUBMIT FORM -->
            <button class="btn btn-primary border border-white float-right mr-5 px-5 btn-lg btn-info" type="submit">S E N D</button>
        </form>
</div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="scripts/main.js"></script>

</body>
</html>