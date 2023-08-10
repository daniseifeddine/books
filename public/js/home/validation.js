function initializeFormValidation() {
    var nameInput = document.getElementById("name");
    var emailInput = document.getElementById("email");
    var passwordInput = document.getElementById("password");
    var rememberCheckbox = document.getElementById("remember");

    nameInput.addEventListener("input", validateName);
    emailInput.addEventListener("input", validateEmail);
    passwordInput.addEventListener("input", validatePassword);
    rememberCheckbox.addEventListener("change", validateRemember);

    function validateName() {
        var nameValue = nameInput.value.trim();

        if (nameValue === "") {
            showValidationError(nameInput, "Please enter your name.");
        } else if (nameValue.length < 3 || nameValue.length > 12) {
            showValidationError(
                nameInput,
                "Name must be between 3 and 12 characters."
            );
        } else if (!/^[a-zA-Z\s]+$/.test(nameValue)) {
            showValidationError(
                nameInput,
                "Name cannot contain numbers or symbols."
            );
        } else {
            hideValidationError(nameInput);
        }
    }

    function validateEmail() {
        var emailValue = emailInput.value.trim();

        if (emailValue === "") {
            showValidationError(emailInput, "Please enter your email.");
        } else if (!emailInput.checkValidity()) {
            showValidationError(
                emailInput,
                "Please enter a valid email address."
            );
        } else if (emailValue.length > 100) {
            showValidationError(
                emailInput,
                "Email cannot exceed 100 characters."
            );
        } else if (emailValue.toLowerCase().endsWith(".com")) {
            var domainIndex = emailValue.lastIndexOf("@");
            var slicedEmail = emailValue.slice(0, domainIndex + 1).trim(); // Trim the email

            if (emailValue.includes(" ")) {
                showValidationError(emailInput, "Email cannot contain spaces.");
            } else {
                console.log(slicedEmail); // Output: danysmo123@gmail.com
                hideValidationError(emailInput);
            }
        } else {
            showValidationError(emailInput, "Invalid email format.");
        }
    }

    // Helper function to validate email format
    function isValidEmail(email) {
        var emailPattern = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
        return emailPattern.test(email);
    }

    function validatePassword() {
        var passwordValue = passwordInput.value.trim();

        if (passwordValue === "") {
            showValidationError(passwordInput, "Please enter your password.");
        } else if (passwordValue.length <= 6) {
            showValidationError(
                passwordInput,
                "Password must be more than 6 characters."
            );
        } else if (!isValidPasswordFormat(passwordValue)) {
            showValidationError(
                passwordInput,
                "Password must include at least one letter, one number, and one symbol."
            );
        } else {
            hideValidationError(passwordInput);
        }
    }

    function isValidPasswordFormat(password) {
        var passwordPattern = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/;
        return passwordPattern.test(password);
    }

    function validateRemember() {
        if (!rememberCheckbox.checked) {
            showValidationError(rememberCheckbox, "*");
        } else {
            hideValidationError(rememberCheckbox);
        }
    }

    function showValidationError(inputElement, errorMessage) {
        var errorElement = inputElement.nextElementSibling;
        if (
            !errorElement ||
            !errorElement.classList.contains("error-message")
        ) {
            errorElement = document.createElement("p");
            errorElement.className = "error-message text-red-500";
            inputElement.parentNode.insertBefore(
                errorElement,
                inputElement.nextSibling
            );
        }
        errorElement.textContent = errorMessage;
        inputElement.classList.add("error-input");
    }

    function hideValidationError(inputElement) {
        var errorElement = inputElement.nextElementSibling;
        if (errorElement && errorElement.classList.contains("error-message")) {
            errorElement.parentNode.removeChild(errorElement);
        }
        inputElement.classList.remove("error-input");
    }

    document
        .getElementById("RegisterForm")
        .addEventListener("submit", function (event) {
            var formInputs = [
                nameInput,
                emailInput,
                passwordInput,
                rememberCheckbox,
            ];
            var validationErrors = 0;

            formInputs.forEach(function (inputElement) {
                if (inputElement.value.trim() === "") {
                    showValidationError(
                        inputElement,
                        "This field is required."
                    );
                    validationErrors++;
                } else {
                    hideValidationError(inputElement);
                }
            });

            if (validationErrors > 0) {
                event.preventDefault();
            }
        });
}

initializeFormValidation();

var emailInput = document.getElementById("new_email");
var passwordInput = document.getElementById("new_password");

emailInput.addEventListener("input", hideValidationError);
passwordInput.addEventListener("input", hideValidationError);

document
    .getElementById("LoginForm")
    .addEventListener("submit", function (event) {
        if (emailInput.value.trim() === "") {
            event.preventDefault();
            showValidationError(emailInput, "Please enter your email.");
        } else {
            hideValidationError(emailInput);
        }

        if (passwordInput.value.trim() === "") {
            event.preventDefault();
            showValidationError(passwordInput, "Please enter your password.");
        } else {
            hideValidationError(passwordInput);
        }
    });

function showValidationError(inputElement, errorMessage) {
    var errorElement = inputElement.nextElementSibling;
    if (!errorElement || !errorElement.classList.contains("error-message")) {
        errorElement = document.createElement("p");
        errorElement.className = "error-message text-red-500";
        inputElement.parentNode.insertBefore(
            errorElement,
            inputElement.nextSibling
        );
    }
    errorElement.textContent = errorMessage;
    inputElement.classList.add("error-input");
}

function hideValidationError() {
    var errorElement = this.nextElementSibling;
    if (errorElement && errorElement.classList.contains("error-message")) {
        errorElement.parentNode.removeChild(errorElement);
    }
    this.classList.remove("error-input");
}
