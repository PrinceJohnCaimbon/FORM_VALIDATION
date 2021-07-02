<!DOCTYPE>
<html lang="en">
<head>
    <title> VALIDATION IN PHP </title>
    <meta charset="utf-8" />
    <style>
		.button {
		  background-color: lightblue;
		  border: none;
		  padding: 10px 15px;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 13px;
		  border-radius: 12px;
		  width: 500px;
		}
		body {
			background-color: #2C5F2DFF;
			font-family: "Times New Roman", Times, serif;
		}
		table {
			background-color: #FFE77AFF;
			border: 1px;
			border-collapse: collapse;
			border-color: white;
			border-radius: 12px;
			width: 500px;
			font-size: 19px;
		}
		.expandHeight {
			height: 400px;
		}
		textarea{
			resize: none;
			font-size: 17px;
		}
		input {
			font-size: 19px;
		}
    </style>
</head>
<body>    
    <link rel="stylesheet" type="text/css" href=" ">
	<br><br><br><br><br>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<table class="expandHeight" align="center">
		<tr>
			<td colspan="2"><h2>PHP FORM VALIDATION EXAMPLE</h2><span style="color:red;">* required field</span></td>
		</tr>
		<tr>
			<td>Name: </td>
			<td><input type="text" required name="name" ><span style="color:red;">*</span></td>
		</tr>
		<tr>
			<td>Email: </td>
			<td><input type="text" required  name="email"><span style="color:red;">*</span></td>
		</tr>
		<tr>
			<td>Website: </td>
			<td><input type="text" name="website"></td>
		</tr>
		<tr>
			<td>Comment: </td>
			<td><textarea name="comment" rows="5" cols="40"></textarea>
			</td>
		</tr>
		<tr>
			<td>Gender: </td>
			<td><input type="radio" required name="gender" value="Female">Female
				<input type="radio" name="gender" value="Male">Male
				<input type="radio" name="gender" value="Other">Other
				<span style="color:red;">*</span>
			</td>
		</tr>
	</table>
	<br>
	<center><input type="submit" class="button" name="submit" value="Submit"></center>
	</form>
	<?php
		//define variables and set to empty values
		$nameErr = $emailErr = $genderErr = $websiteErr = "";
		$name = $email = $gender = $comment = $website = "";		
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["name"])) {
				$nameErr = "Name is required";
			} else {
				$name = test_input($_POST["name"]);
			}
			
			if (empty($_POST["email"])) {
				$emailErr = "Email is required";
			} else {
				$email = test_input($_POST["email"]);
			}
			
			if (empty($_POST["website"])) {
				$website = "";
			} else {
				$website = test_input($_POST["website"]);
			}
			
			if (empty($_POST["comment"])) {
				$comment = "";
			} else {
				$comment = test_input($_POST["comment"]);;
			}
			
			if (empty($_POST["gender"])) {
				$genderErr = "Gender is required";
			} else {
				$gender = test_input($_POST["gender"]);
			}
		}
	?>
	<table align="center">
		<tr>
			<td>
				<?php echo "<h2>Your Input:</h2>";
					echo $name;
					echo "<br>";
					echo $email;
					echo "<br>";
					echo $website;
					echo "<br>";
					echo $comment;
					echo "<br>";
					echo $gender;
				?>
			</td>
		</tr>
	</table>
</body>
</html>