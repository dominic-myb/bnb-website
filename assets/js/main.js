$(document).ready(function () {
  function updateAccountDropdown(isAuthenticated) {
    var accountDropdown = $(".account-drp");
    var loginLink = '<a href="login.php">Login</a>';
    var signupLink = '<a href="form.php">Sign Up</a>';
    var accountSettingsLink = '<a href="#">Account Settings</a>';
    var logoutLink = '<a href="app/process/logout.php" style="color:red;">Logout</a>';
  
    if (!isAuthenticated) {
      // User not authenticated
      var cartDropdown = $(".cart-drp");
      cartDropdown.off("mouseenter");
      cartDropdown.find(".cart-drp-content").hide();
  
      accountDropdown.find(".account-btn").text("Account");
      accountDropdown.find(".account-drp-content").html(loginLink + signupLink);
    } else {
      // User authenticated
      accountDropdown.find(".account-btn").text("Welcome, "+jsUsername);
      accountDropdown.find(".account-drp-content").html(accountSettingsLink + logoutLink);
    }
  }
  
  function checkUserSession() {
    $.ajax({
      url: "app/process/session.php",
      method: "GET",
      dataType: "json",
      success: function (response) {
        console.log(response);
        var isAuthenticated = response && response.isAuthenticated;
        updateAccountDropdown(isAuthenticated);
      },
      error: function () {
        console.error("Error checking user session");
      },
    });
  }
  checkUserSession();  
  $("#register").on("click", function () {
    if (validateForm()) {
      $("#register-form").submit();
    }
  });

  function validateForm() {
    var name = $("#name").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var username = $("#username").val();
    var password = $("#password").val();

    if (
      name.trim() === "" ||
      email.trim() === "" ||
      phone.trim() === "" ||
      username.trim() === "" ||
      password.trim() === ""
    ) {
      alert("Please fill in all required fields.");
      return false;
    }

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      alert("Email Invalid!");
      return false;
    }
    var phoneRegex = /^\d{11}$/;
    if (!phoneRegex.test(phone)) {
      alert("Phone number Invalid!");
      return false;
    }

    /* Sanitize Area */
    name = DOMPurify.sanitize(name);
    username = DOMPurify.sanitize(username);
    password = DOMPurify.sanitize(password);

    return true;
  }
});
