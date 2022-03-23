<?php
include 'connect.php';
include 'upload.php';

if (isset($_POST['submit'])) {
	//Form validation
	if ($_SERVER['REQUEST_METHOD'] == "post") {


		$name = filter_input(INPUT_POST, 'name');
		$email = filter_input(INPUT_POST, 'email');
		$mobile = filter_input(INPUT_POST, 'mobile');
		//$password = filter_input(INPUT_POST, 'password');  

		//Individual input validation
		if (empty($name)) {
			$name_error = 'Name field empty';
		}
		if (empty($email)) {
			$email_error = ' Email Address field empty';
		}
		// if(empty($file)){
		//     $file_error = ' Upload image feild' ;
		// }
		if (empty($mobile)) {
			$mobile_error = 'Mobile Number field empty';
		} elseif (strlen($mobile) < 11)
			$mobile_error = 'Mobile must not be less than 11 characters';
	}

	// ecape user input
	$name = $conn->real_escape_string($_REQUEST['name']);
	$email  = $conn->real_escape_string($_REQUEST['email']);
	$mobile = $conn->real_escape_string($_REQUEST['mobile']);
	$gender = $conn->real_escape_string($_REQUEST['gender']);
	$nation = $conn->real_escape_string($_REQUEST['country']);
	$state = $conn->real_escape_string($_REQUEST['state']);
	$lga = $conn->real_escape_string($_REQUEST['lga']);
	$address = $conn->real_escape_string($_REQUEST['address']);
	$file = $conn->real_escape_string($fileNameNew);
	$password = $_REQUEST['password'];
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);

	//inserting into database
	$sql = "insert into crud(name, email, mobile, gender,  country, state, lga, file, address, password) values('$name', '$email', '$mobile', '$gender', '$nation',  '$state', '$lga','$file', '$address', '$hashed_password')";
	//echo $sql;
	if ($conn->query($sql) === true) {

		echo '<div class="alert alert-success">Registration Successful! </div>';
		header('Refresh: 0.5; URL=display.php');
	} else {
		die("Error connecting to database" . $conn->connect_error);
	}
}

?>


<?php
if (!isset($name)) {
	$name = '';
	$email = '';
	$mobile = '';
}

?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

	<title>Inserting Data into Database</title>
</head>

<body>
	<div class="container my-5">

		<!-- Columns are always 50% wide, on mobile and desktop -->
		<div class="row">

			<div class="col-md-4"></div>

			<div class="col-md-4 mt-5" style="background-color: #F5F5F5">
				<div class="mb-3" style="text-align: center; padding-top:10px; ">
					<h2>Registration form</h2>
					<p> Fill the form carefully</p>
				</div>
				<form method="post" enctype="multipart/form-data" class="frm mb-5">
					<?php if (isset($authentification_error)) { ?>
						<p><?php $authentification_error ?></p>
					<?php } ?>

					<div class="mb-3">
						<label>Name</label>
						<input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off" value="<?php echo htmlspecialchars($name) ?>" required>
						<?php if (isset($name_error)) { ?>
							<p><?php echo $name_error ?></p>
						<?php } ?>
					</div>
					<div class="mb-3">
						<label>Email</label>
						<input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off" value="<?php echo htmlspecialchars($email) ?>" required>
						<?php if (isset($email_error)) { ?>
							<p><?php echo $email_error ?></p>
						<?php } ?>
					</div>
					<!-- Gender Dropdown begins -->
					<div class="form-group">
						<label class="control-label">Gender</label>
						<select onchange="" name="gender" id="gender" class="form-control" required>
							<option value="" selected="selected">- Select Gender-</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
							<option value="others">Others</option>
						</select>
					</div>
					<!-- Gender Dropdown Ends -->
					<div class="mb-3">
						<label>Mobile Number</label>
						<input type="text" class="form-control" placeholder="Enter your mobile number" name="mobile" autocomplete="off" value="<?php echo htmlspecialchars($mobile) ?>" required>
						<?php if (isset($mobile_error)) { ?>
							<p><?php echo $mobile_error ?></p>
						<?php } ?>
					</div>
					<!-- Country Dropdown begins -->
					<div class="form-group">
						<label class="control-label">State of Origin</label>
						<select onchange="" name="country" id="country" class="form-control" required>
							<option value="" selected="selected">- Select Country-</option>
							<option value="Afghanistan">Afghanistan</option>
							<option value="Albania">Albania</option>
							<option value="Algeria">Algeria</option>
							<option value="Andorra">Andorra</option>
							<option value="Angola">Angola</option>
							<option value="Antigua and BarbudaBayelsa">Antigua and Barbuda</option>
							<option value="Argentina">Argentina</option>
							<option value="Armenia">Armenia</option>
							<option value="Australia">Australia</option>
							<option value="Austria">Austria</option>
							<option value="Azerbaijan">Azerbaijan</option>
							<option value="Bahamas">Bahamas</option>
							<option value="Bahrain">Bahrain</option>
							<option value="Bangladesh">Bangladesh</option>
							<option value="Cambodia">Cambodia</option>
							<option value="Canada">Canada</option>
							<option value="Central African Republic">Central African Republic</option>
							<option value="Colombia">Colombia</option>
							<option value="Democratic Republic of Congo">Democratic Republic of Congo</option>
							<option value="Denmark">Denmark</option>
							<option value="Dominican Republic">Dominican Republic</option>
							<option value="Ecuador">Ecuador</option>
							<option value="El Salvador">El Salvador</option>
							<option value="Fiji">Fiji</option>
							<option value="Finland">Finland</option>
							<option value="Germany">Germany</option>
							<option value="Greece">Greece</option>
							<option value="Haiti">Haiti</option>
							<option value="Iceland">Iceland</option>
							<option value="Indonesia">Indonesia</option>
							<option value="Jamaica">Jamaica</option>
							<option value="Laos">Laos</option>
							<option value="Malaysia">Malaysia</option>
							<option value="Marshall Islands">Marshall Islands</option>
							<option value="Netherlands">Netherlands</option>
							<option value="Nigeria">Nigeria</option>
							<option value="Portugal">Portugal</option>
						</select>
					</div>
					<!-- State dropdown Begins -->
					<div class="form-group">
						<label class="control-label">State of Origin</label>
						<select onchange="toggleLGA(this);" name="state" id="state" class="form-control" required>
							<option value="" selected="selected">- Select -</option>
							<option value="Abia">Abia</option>
							<option value="Adamawa">Adamawa</option>
							<option value="AkwaIbom">AkwaIbom</option>
							<option value="Anambra">Anambra</option>
							<option value="Bauchi">Bauchi</option>
							<option value="Bayelsa">Bayelsa</option>
							<option value="Benue">Benue</option>
							<option value="Borno">Borno</option>
							<option value="Cross River">Cross River</option>
							<option value="Delta">Delta</option>
							<option value="Ebonyi">Ebonyi</option>
							<option value="Edo">Edo</option>
							<option value="Ekiti">Ekiti</option>
							<option value="Enugu">Enugu</option>
							<option value="FCT">FCT</option>
							<option value="Gombe">Gombe</option>
							<option value="Imo">Imo</option>
							<option value="Jigawa">Jigawa</option>
							<option value="Kaduna">Kaduna</option>
							<option value="Kano">Kano</option>
							<option value="Katsina">Katsina</option>
							<option value="Kebbi">Kebbi</option>
							<option value="Kogi">Kogi</option>
							<option value="Kwara">Kwara</option>
							<option value="Lagos">Lagos</option>
							<option value="Nasarawa">Nasarawa</option>
							<option value="Niger">Niger</option>
							<option value="Ogun">Ogun</option>
							<option value="Ondo">Ondo</option>
							<option value="Osun">Osun</option>
							<option value="Oyo">Oyo</option>
							<option value="Plateau">Plateau</option>
							<option value="Rivers">Rivers</option>
							<option value="Sokoto">Sokoto</option>
							<option value="Taraba">Taraba</option>
							<option value="Yobe">Yobe</option>
							<option value="Portugal">Zamafara</option>
						</select>
					</div>


					<div class="form-group">
						<label class="control-label">LGA of Origin</label>
						<select name="lga" id="lga" class="form-control select-lga" required>
						</select>
					</div>

					<div class="mb-3">
						<label>Residential Address</label>
						<input type="text" class="form-control" placeholder="Enter your Residential Address" name="address" autocomplete="off" required>
						<?php if (isset($address_error)) { ?>
							<p><?php echo $address_error ?></p>
						<?php } ?>
					</div>

					<div class="mb-3">
						<label>Password</label>
						<input type="password" class="form-control" placeholder="Enter your password" name="password" autocomplete="off" required>

					</div>

					<div class="mb-3">
						<input type="file" name="file" value="<?php echo htmlspecialchars($file) ?>" required>
						<?php if (isset($file_error)) { ?>
							<p><?php echo $file_error ?></p>
						<?php } ?>
					</div>

					<button type="submit" class="btn btn-primary" name="submit">Submit</button>
					<p style="float: right; ">Already have an account?<a href="login.php">Login</a></p>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>

	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="js/lga.min.js"></script>

</body>