const loginPopup = document.getElementById('login-popup');
const loginButton = document.getElementById('login-button');
const closePopup = document.getElementById('close-popup');

loginButton.addEventListener('click', function () {
    loginPopup.style.display = 'flex';
});

closePopup.addEventListener('click', function () {
    loginPopup.style.display = 'none';
});


function logout() {
    // Send an AJAX request to the logout script
    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'logout.php');
    xhr.onload = function () {
        // Redirect the user to the login page
        window.location.href = 'index.php';
    };
    xhr.send();
}