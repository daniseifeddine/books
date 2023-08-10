$(document).ready(function () {
    setTimeout(function () {
        $(".error").fadeOut("slow", function () {
            $(this).remove();
        });
    }, 4000);
});

// contact validation

function initializeFormValidationContact() {
    var nameInput = document.getElementById("contact_name");
    var emailInput = document.getElementById("contact_email");
    var subjectInput = document.getElementById("subject");
    var messageInput = document.getElementById("message");

    nameInput.addEventListener("input", validateName);
    emailInput.addEventListener("input", validateEmail);
    subjectInput.addEventListener("input", validateSubject);
    messageInput.addEventListener("input", validateMessage);

    function validateName() {
        var nameValue = nameInput.value.trim();

        if (nameValue === "") {
            showValidationError(nameInput, "Please enter your name.");
        } else if (!/^[a-zA-Z0-9\s]+$/.test(nameValue)) {
            showValidationError(
                nameInput,
                "Name can only contain letters, numbers, and white spaces."
            );
        } else if (nameValue.length < 3 || nameValue.length > 20) {
            showValidationError(
                nameInput,
                "Name must be between 3 and 20 characters."
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
        } else {
            hideValidationError(emailInput);
        }
    }

    function validateSubject() {
        var subjectValue = subjectInput.value.trim();

        if (subjectValue === "") {
            showValidationError(subjectInput, "Please enter the subject.");
        } else if (!/^[a-zA-Z0-9\s]+$/.test(subjectValue)) {
            showValidationError(
                subjectInput,
                "Subject can only contain letters, numbers, and white spaces."
            );
        } else if (subjectValue.length < 4 || subjectValue.length > 20) {
            showValidationError(
                subjectInput,
                "Subject must be between 4 and 20 characters."
            );
        } else {
            hideValidationError(subjectInput);
        }
    }

    function validateMessage() {
        var messageValue = messageInput.value.trim();

        if (messageValue === "") {
            showValidationError(messageInput, "Please enter your message.");
        } else if (!/^[a-zA-Z0-9\s]+$/.test(messageValue)) {
            showValidationError(
                messageInput,
                "Message can only contain letters, numbers, and white spaces."
            );
        } else if (messageValue.length < 10 || messageValue.length > 200) {
            showValidationError(
                messageInput,
                "Message must be between 10 and 200 characters."
            );
        } else {
            hideValidationError(messageInput);
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
        .getElementById("contactForm")
        .addEventListener("submit", function (event) {
            var formInputs = [
                nameInput,
                emailInput,
                subjectInput,
                messageInput,
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

initializeFormValidationContact();

// observation for the third section
const fadeInSection = document.querySelector(".fade-in-section");

const observer = new IntersectionObserver(
    (entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("fade-in");
                observer.unobserve(entry.target);
            }
        });
    },
    {
        threshold: 0.4,
    }
);
observer.observe(fadeInSection);
