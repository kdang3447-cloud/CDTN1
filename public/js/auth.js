lucide.createIcons();

const loginTab = document.getElementById("loginTab");
const registerTab = document.getElementById("registerTab");
const loginForm = document.getElementById("loginForm");
const registerForm = document.getElementById("registerForm");
const switchBtn = document.getElementById("switchBtn");
const footerText = document.getElementById("footerText");

let isLoginMode = true;

function switchMode() {
    isLoginMode = !isLoginMode;

    if (isLoginMode) {
        loginForm.style.display = "block";
        registerForm.style.display = "none";
    } else {
        loginForm.style.display = "none";
        registerForm.style.display = "block";
    }
}

function togglePassword(inputId, event) {
    const input = document.getElementById(inputId);
    const icon = event.currentTarget;

    if (input.type === "password") {
        input.type = "text";
        icon.setAttribute("data-lucide", "eye-off");
    } else {
        input.type = "password";
        icon.setAttribute("data-lucide", "eye");
    }
    lucide.createIcons();
}

loginTab.addEventListener("click", () => {
    if (!isLoginMode) switchMode();
});

registerTab.addEventListener("click", () => {
    if (isLoginMode) switchMode();
});

switchBtn.addEventListener("click", switchMode);
