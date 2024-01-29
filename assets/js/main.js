$(document).ready(function () {
  $("#register").on("click", function () {
    if (validateForm()) {
      $("#register-form").submit();
    }
  });

  function validateForm() {
    var name = $("#name").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var username = $("username").val();
    var password = $("password").val();

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
