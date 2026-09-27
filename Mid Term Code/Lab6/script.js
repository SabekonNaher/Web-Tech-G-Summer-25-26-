// Validation Rules
// 1. No field can be empty -> can be implemented with just HTML (required attribute)
// 2. Name must be at least 3 characters -> needs javascript validation
// 3. Email must follow the email pattern -> can be implemented with HTML (type="email" attribute)
// 3.5. Email must end with aiub.edu
// 4. Password must be at least 6 characters
// 5. Confirm password and password must be same

function validateForm() {
    alert("Form Submitted");
    // return true; // if return true, form will be submitted
    // return false; // if return false, form will NOT be submitted

    // check rules
    // Rule no. 2
    // get the fullname input element -> get the element's value -> check the length of the value
    var fullnameInput = document.getElementById("fullname");
    if (fullnameInput.value.length < 3) {
        document.getElementById("fullname_error").innerText = "Name must be at least 3 characters";
        return false;
    }

   
    var emailInput = document.getElementById("email");
    if (!emailInput.value.endsWith("aiub.edu")) {
        document.getElementById("email_error").innerText = "Email must end with aiub.edu";
        return false;
    }

   
    var passwordInput = document.getElementById("password");
    if (passwordInput.value.length < 6) {
        document.getElementById("password_error").innerText = "Password must be at least 6 characters";
        return false;
    }

    
    var confirmPasswordInput = document.getElementById("confirm_password");
    console.log(passwordInput.value);
    console.log(confirmPasswordInput.value);
    if (passwordInput.value !== confirmPasswordInput.value) {
        document.getElementById("confirm_password_error").innerText = "Password and Confirm Password must match";
        return false;
    }

    return true;
   
}