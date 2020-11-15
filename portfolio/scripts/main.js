let form = document.getElementById("guestbook-form");
form.onsubmit = validate;

// Hide Mailing format unless mailing list box is checked
$(document).ready(function(){
    $("#hide-mail").hide(); // Set to hidden when page loads.
    $("#mailing-checkbox").click(function ()
    {
        if ($("#mailing-checkbox").is(':checked'))
        {
            $("#hide-mail").show();
        }
        else
        {
            $("#hide-mail").hide();
        }
    });
});

/*
* Make all error messages invisible
* */
function clearErrors(){
    let errors = document.getElementsByClassName("text-danger"); // nodelist of error messages
    for(let i = 0; i<errors.length; i++){
        errors[i].classList.add("d-none");
    }
}

function validate(){
    clearErrors();
    let isValid = true;

    let fname = document.getElementById("first-name").value;
    if(fname == ""){
        let errFname = document.getElementById("err-fname");
        errFname.classList.remove("d-none");
        isValid = false;
    }

    let lname = document.getElementById("last-name").value;
    if(lname == ""){
        let errLname = document.getElementById("err-lname");
        errLname.classList.remove("d-none");
        isValid = false;
    }

    // Check for email validation
    let mailing = document.getElementById("mailing-checkbox");
    let email = document.getElementById("email").value;
    if(email != ""){ // email is not required unless mailing list is checked
        if(!email.includes("@") && !email.includes(".")){
            let errEmail = document.getElementById("err-email");
            errEmail.classList.remove("d-none");
            errEmail.innerHTML ="Must be @email.com format";
            isValid = false;
        }
    }
    // If user checks mailing list then email is required
    if(mailing.checked && email == ""){
        let errMailing = document.getElementById("err-mailing");
        errMailing.classList.remove("d-none");
        errMailing.innerHTML ="Email required for mailing list";
        isValid = false;
    }

    // Linked in must begin with http and end with .com
    let linkedIn = document.getElementById("linked-in").value;
    if (linkedIn != ""){
        let linkedStartsWith = linkedIn.substring(0, 3);
        let linkedEndsWith = linkedIn.substring(linkedIn.length - 4, linkedIn.length);
        if(linkedStartsWith != "http" && linkedEndsWith != ".com") {
            let errLinked = document.getElementById("err-linked");
            errLinked.classList.remove("d-none");
            isValid = false;
        }
    }

    // How we met is required
    let howWeMet = document.getElementById("how-we-met");
    let metOther = document.getElementById("met-other").value;
    let selection = howWeMet.options[howWeMet.selectedIndex].value;
    if(selection == "none-met" && metOther == ""){
        let errMet = document.getElementById("err-met");
        errMet.classList.remove("d-none");
        isValid = false;
    }

    return isValid;
}