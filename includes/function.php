<?php
function check_login($con)
{
	// $customer_id = null;
	if(isset($_SESSION['customer_id']))
	{
		$customer_id = $_SESSION['customer_id'];
		$query =  "select * from customer_tbl where customer_id = '$customer_id' limit 1";

		$result = mysqli_query($con, $query);
		if($result && mysqli_num_rows($result) > 0)
		{
			$user_data = mysqli_fetch_assoc($result);
			// $verify = 1;
			return $user_data;
		}
	}
	//redirect to login
	header("location: login.php");
	die;
}