/*=============== SHOW MENU ===============*/
const showMenu = (toggleId, navId) => {
    const toggle = document.getElementById(toggleId),
        nav = document.getElementById(navId);

    toggle.addEventListener("click", () => {
        // Add show-menu class to nav menu
        nav.classList.toggle("show-menu");
        // Add show-icon to show and hide menu icon
        toggle.classList.toggle("show-icon");
    });
};

showMenu("nav-toggle", "nav-menu");

/*=============== SHOW DROPDOWN MENU ===============*/
const dropdownItems = document.querySelectorAll(".dropdown__item");

// 1. Select each dropdown item
dropdownItems.forEach((item) => {
    const dropdownButton = item.querySelector(".dropdown__button");

    // 2. Select each button click
    dropdownButton.addEventListener("click", () => {
        // 7. Select the current show-dropdown class
        const showDropdown = document.querySelector(".show-dropdown");

        // 5. Call the toggleItem function
        toggleItem(item);

        // 8. Remove the show-dropdown class from other items
        if (showDropdown && showDropdown !== item) {
            toggleItem(showDropdown);
        }
    });
});

// 3. Create a function to display the dropdown
const toggleItem = (item) => {
    // 3.1. Select each dropdown content
    const dropdownContainer = item.querySelector(".dropdown__container");

    // 6. If the same item contains the show-dropdown class, remove
    if (item.classList.contains("show-dropdown")) {
        dropdownContainer.removeAttribute("style");
        item.classList.remove("show-dropdown");
    } else {
        // 4. Add the maximum height to the dropdown content and add the show-dropdown class
        dropdownContainer.style.height = dropdownContainer.scrollHeight + "px";
        item.classList.add("show-dropdown");
    }
};

/*=============== DELETE DROPDOWN STYLES ===============*/
const mediaQuery = matchMedia("(min-width: 1118px)"),
    dropdownContainer = document.querySelectorAll(".dropdown__container");

// Function to remove dropdown styles in mobile mode when browser resizes
const removeStyle = () => {
    // Validate if the media query reaches 1118px
    if (mediaQuery.matches) {
        // Remove the dropdown container height style
        dropdownContainer.forEach((e) => {
            e.removeAttribute("style");
        });

        // Remove the show-dropdown class from dropdown item
        dropdownItems.forEach((e) => {
            e.classList.remove("show-dropdown");
        });
    }
};

addEventListener("resize", removeStyle);

document.addEventListener("DOMContentLoaded", function () {
    // Get the necessary elements
    const body = document.body;
    const darkModeLink = document.querySelector(
        '.dropdown__link[data-mode="dark"]'
    );
    const lightModeLink = document.querySelector(
        '.dropdown__link[data-mode="light"]'
    );
    const contrastModeLink = document.querySelector(
        '.dropdown__link[data-mode="contrast"]'
    );
    const lightModeButton = document.getElementById("light-mode-button");
    const darkModeButton = document.getElementById("dark-mode-button");
    const contrastModeButton = document.getElementById("contrast-mode-button");

    // Check if a user preference for theme mode exists in local storage
    const themePreference = localStorage.getItem("theme");

    // Apply the saved theme preference if it exists
    if (themePreference) {
        body.classList.add(themePreference);
    }

    // Function to toggle between theme modes
    function toggleThemeMode(mode) {
        body.classList.remove("dark", "light", "contrast");
        body.classList.add(mode);

        // Save the theme preference to local storage
        localStorage.setItem("theme", mode);
    }

    // Event listener for dark mode selection
    darkModeLink.addEventListener("click", function (e) {
        darkModeButton.style.color = "#FFFFFF";
        lightModeButton.style.color = "";
        contrastModeButton.style.color = "";
        e.preventDefault();
        toggleThemeMode("dark");
    });

    // Event listener for light mode selection
    lightModeLink.addEventListener("click", function (e) {
        darkModeButton.style.color = "hsl(220, 12%, 45%)";
        lightModeButton.style.color = "hsl(220, 68%, 54%)";
        contrastModeButton.style.color = "";
        e.preventDefault();
        toggleThemeMode("light");
    });

    // Event listener for contrast mode selection
    contrastModeButton.addEventListener("click", function (e) {
        darkModeButton.style.color = "";
        lightModeButton.style.color = "#FFC2D6";
        contrastModeButton.style.color = "#FFFFFF";
        e.preventDefault();
        toggleThemeMode("contrast");
    });
});

document.getElementById("nav");
window.addEventListener("load", function () {});

document.addEventListener("DOMContentLoaded", function () {
    const toggleRTLButtons = document.querySelectorAll(".toggle-rtl");
    const toggleLTRButtons = document.querySelectorAll(".toggle-ltr");

    toggleRTLButtons.forEach(function (button) {
        button.addEventListener("click", function (event) {
            document.body.classList.add("rtl-text");
            localStorage.setItem("textDirection", "rtl");
        });
    });

    toggleLTRButtons.forEach(function (button) {
        button.addEventListener("click", function (event) {
            document.body.classList.remove("rtl-text");
            localStorage.removeItem("textDirection");
        });
    });

    function applyTextDirection() {
        const textDirection = localStorage.getItem("textDirection");
        document.body.classList.remove("rtl-text");

        if (textDirection === "rtl") {
            document.body.classList.add("rtl-text");
        }
    }

    applyTextDirection();
});
//
//
//
//
//

