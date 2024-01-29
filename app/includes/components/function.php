<?php
function check_login($con)
{
	if (isset($_SESSION['customer_id'])) {
		$customer_id = $_SESSION['customer_id'];
		$query = "SELECT * FROM customer_tbl WHERE customer_id = '$customer_id' LIMIT 1";

		$result = mysqli_query($con, $query);
		if ($result && mysqli_num_rows($result) > 0) {
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}
	header("location: login.php");
	die;
}