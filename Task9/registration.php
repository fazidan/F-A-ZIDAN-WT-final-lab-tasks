<?php
$nameErr = $passErr = $genderErr = $roleErr = $haveErr = "";
$name = $pass = $gender = $address = $role = "";
$havearr[] = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {        //$_SERVER["REQUEST_METHOD"] is default function......this function sent data by post method from php code


	if (empty($_POST["name"])) {
		$nameErr = "Name is required";
	} else {
		$name = input_data($_POST["name"]);
		if (!preg_match("/^[a-zA-Z ]*$/", $name)) {       //preg_match this can check given value valid or not
			$nameErr = "Only alphabets and white space are allowed";
		}
	}

	if (empty($_POST["pass"])) {
		$passErr = "Password is required";
	} else {
		$pass = input_data($_POST["pass"]);
		if (strlen($_POST["pass"]) < 4) {
			$passErr = "Password must be upper than 4 characters";
		}
	}

	if (empty($_POST["gender"])) {
		$genderErr = "Gender is required";
	} else {
		$gender = input_data($_POST["gender"]);
	}

	if ($_POST["role"] == "Selected") {
		$roleErr = "Please select a role";
	} else {
		$role = input_data($_POST["role"]);
	}

	if (empty($_POST["have"])) {
		$haveErr = "Please fill this field";
	} else {
		foreach ($_POST["have"] as $have) {
			$havearr[] = $have;
			$havearr[] = ",";
		}
	}

	$address = input_data($_POST["address"]);
}
function input_data($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>



<head>
	<link rel="stylesheet" href="registration.css">
	<link rel="stylesheet" href="design.css">
</head>

<body>

	<div class="container">
		<div class="header">
			<h3><b>Registration</b></h3>
		</div>
		<form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<div class="form-control" id="form-control">
				<label>Username:</label>
				<input type="text" name="name">
				<small class="error" style='color:red;'>* <?php echo $nameErr; ?> </small>
			</div>
			<div class="form-control" id="form-control">
				<label>Password:</label>
				<input type="password" name="pass">
				<small class="error" style='color:red;'>* <?php echo $passErr; ?> </small>
			</div>
			<div>
				<div>
					<labelo>Gender:</label>
				</div>
				<input type="radio" name="gender" value="Male"> Male
				<input type="radio" name="gender" value="Female"> Female
				<input type="radio" name="gender" value="Other"> Other
				<small class="error" style='color:red;'>* <?php echo $genderErr; ?> </small>
			</div>
			<br>
			<div> Select a role: </div>
			<select name="role">
				<option value="Selected">--Selected--</option>
				<option value="Customer">Customer</option>
				<option value="Driver">Driver</option>
				<option value="Owner">Car Owner</option>
			</select>
			<small class="error" style='color:red;'>* <?php echo $roleErr; ?> </small>
			<br><br>

			<div>I have:</div>
			<input type="checkbox" name="have[]" value="Car">Car
			<input type="checkbox" name="have[]" value="Bus">Bus
			<input type="checkbox" name="have[]" value="Truck">Truck
			<input type="checkbox" name="have[]" value="Driving-licence">Driving license
			<input type="checkbox" name="have[]" value="None">None
			<small class="error" style='color:red;'>* <?php echo $haveErr; ?> </small>
			<br><br>

			Address:
			<textarea class="form-control3" name="address" rowspan="1" colspan="1"></textarea>
			<br><br>
			<input class="buttonMain" type="submit" name="subClick" value="Submit">
			<input class="buttonMain" type="submit" name="logClick" value="Existing an account? Login">

		</form>
	</div>
</body>











<?php

if (isset($_POST['subClick'])) {
	$flag = true;
	if (!$nameErr == "")
		$flag = false;

	if (!$passErr == "")
		$flag = false;

	if (!$genderErr == "")
		$flag = false;

	if (!$roleErr == "")
		$flag = false;

	if (!$haveErr == "")
		$flag = false;



	if ($flag == true) {

		$current_data = file_get_contents('model/userdata.json');
		$array_data = json_decode($current_data, false);
		$f = 1;


		foreach ($array_data as $b) {
			if ($b->name == $name) {
				$f = 0;
			}
		}

		if ($f == 0) {
			echo "<h3 align='center' style='color:red;'> <b>This userame already exist.</b> </h3>";
		} else {
			array_pop($havearr);
			$havestring = implode(" ", $havearr);
			$extra = array(
				'name' => $name,
				'pass' => $pass,
				'gender' => $gender,
				'role' => $role,
				'have' => $havestring,
				'address' => $address
			);
			$array_data[] = $extra;
			$final_data = json_encode($array_data);
			file_put_contents('model/userdata.json', $final_data);

			echo "<h3 align='center' style='color:green;'> <b>You have sucessfully registered.</b> </h3>";
		}
	}
}

if (isset($_POST['logClick'])) {
	header("Location: login.php");
}
?>