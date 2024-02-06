<?php
include("../includes/components/connection.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($name) || empty($email) || empty($phone) || empty($username) || empty($password)) {
        echo "<script>
      window.alert('Please fill in all fields!')
      window.location='form.php'</script>";
    }
    $stmt = $con->prepare("SELECT * FROM customer_tbl WHERE username=? OR email=?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if ($result->num_rows > 0) {
        echo "<script>
          alert('Username or Email Unavailable!')
          window.location = '../../form.php'</script>";
    } else {

        $stmt = $con->prepare("INSERT INTO customer_tbl(name,email,phone,username,password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $phone, $username, $password);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>
            alert('Successfully Registered!')
            window.location = '../../login.php'
        </script>";
        } else {
            echo "<script>
            alert('Error adding user!')
            window.location = '../../form.php'
        </script>";
        }

        $stmt->close();
    }
    $con->close();
}