function validateForm() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var email = document.getElementById('email').value;

    // Check username length
    if (username.length < 5) {
        alert('Username must be at least 5 characters long.');
        return false;
    }

    // Check password length
    if (password.length < 8) {
        alert('Password must be at least 8 characters long.');
        return false;
    }

    // Check if the email is valid
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address.');
        return false;
    }

    // If all validations pass, the form can be submitted
    return true;
}
