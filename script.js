/*Registration*/

var name = document.forms['form']['Name']
var email = document.forms['form']['email']
var password = document.forms['form']['password']

var name_error = document.getElementById('name_error');
var email_error = document.getElementById('email_error');
var password_error = document.getElementById('password_error');


function validated() {

    if (Name.value.length < 3) {
        Name.style.border = "1px solid red";
        name_error.style.display = "block"
        Name.focus();
        return false;
    }
    {

        if (Password.value.length < 3) {
            Password.style.border = "1px solid red";
            password_error.style.display = "block"
            Password.focus();
            return false;
        }
        {

            if (Email.value.length < 3) {
                Email.style.border = "1px solid red";
                email_error.style.display = "block"
                Email.focus();
                return false;
            }
        }

    }
}
Name.addEventListener('textInput', Name_Verify);
Email.addEventListener('textInput', Email_Verify);
Password.addEventListener('textInput', Password_Verify);

function Name_Verify() {
    if (Name.value.length >= 2) {
        Name.style.border = "1px solid silver";
        name_error.style.display = "none"
        return true;

    }
}
function Email_Verify() {
    if (Email.value.length >= 2) {
        Email.style.border = "1px solid silver";
        email_error.style.display = "none"
        return true;
    }
}
function Password_Verify() {
    if (Password.value.length >= 2) {
        Password.style.border = "1px solid silver";
        password_error.style.display = "none"
        return true;


    }
}

/*Registration*/


/*Login*/
var email2 = document.forms['form']['Email2']
var password2 = document.forms['form']['Password2']

var email_error2 = document.getElementById('email_error2');
var password_error2 = document.getElementById('password_error2');

function validated() {
    if (Email2.value.length < 3) {
        Email2.style.border = "1px solid red";
        email_error2.style.display = "block"
        Email2.focus();
        return false;
    }
    else if (Password2.value.length < 3) {
        Password2.style.border = "1px solid red";
        password_error2.style.display = "block"
        Password2.focus();
        return false;
    }
    else {
        alert("Successfully logged in");
        return true;
    }

}

Email2.addEventListener('textInput', Email2_Verify);
Password2.addEventListener('textInput', Password2_Verify);



function Email2_Verify() {
    if (Email2.value.length >= 2) {
        Email2.style.border = "1px solid silver";
        email_error2.style.display = "none"
        return true;
    }
}
function Password2_Verify() {
    if (Password2.value.length >= 3) {
        Password2.style.border = "1px solid silver";
        password_error2.style.display = "none"
        return true;


    }
}
/*Login*/



const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');


signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});
signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});