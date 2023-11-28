<link rel="stylesheet" href="/css/styles.css" type="text/css">
<body>
<?php
	require './includes/database.php';

	$Title = $_POST['Title'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$DOB = $_POST['DOB'];
	$Email = $_POST['Email'];
	$Government_ID = $_POST['Government_ID'];
	$Phone_Number = $_POST['Phone_Number'];
	$Employment_Status = $_POST['Employment_Status'];
	$Account_Type = $_POST['Account_Type'];
	$Annual_Income = $_POST['Annual_Income'];
	$Mailing_Address = $_POST['Mailing_Address'];
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	$confirm = $_POST['confirm'];
	$Image = $_FILES['files']['name'][0];
	
	$ok = true;
	echo '<header>';
	require './includes/global-header.php';
	echo '<img src="images/header.jpg" alt="ICICI Bank Logo" class="logo">';
	echo '</header>';

	echo '<main>';
		if (empty($fname)) {
			echo '<p>First name required</p>';
			$ok = false;
		}
		if (empty($lname)) {
			echo '<p>Last name required</p>';
			$ok = false;
		}
		if (empty($Username)) {
			echo '<p>Username required</p>';
			$ok = false;
		}
		if (empty($Password)) {
			echo '<p>Password Required</p>';
			$ok = false;
		}
		if ($Password != $confirm) {
			echo '<p>Both Passwords do not matched.</p>';
			$ok = false;
		}
		if ($ok) {
			
			$Password = hash('sha512', $Password);
			$sql = "INSERT INTO bankaccount_database (Title, fname, lname, DOB, Email, Government_ID, Phone_Number, Employment_Status, Account_Type, Annual_Income, Mailing_Address, Username, Password) 
			VALUES ('$Title', '$fname', '$lname', '$DOB', '$Email', '$Government_ID', '$Phone_Number', '$Employment_Status', '$Account_Type', '$Annual_Income', '$Mailing_Address', '$Username', '$Password')";
			$conn->exec($sql);
			
			$countfiles = count($_FILES['files']['name']);
			$query = "INSERT INTO profile_picture (Government_ID, Name, Image_path) VALUES (?, ?, ?)";
			$statement = $conn->prepare($query);
		
			for ($i = 0; $i < $countfiles; $i++) {
				$filename = $_FILES['files']['name'][$i];
				$target_file = 'Uploaded_pictures/' . $filename;
				$file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
				$file_extension = strtolower($file_extension);
				$valid_extension = array("png", "jpeg", "jpg", "pdf");
		
				if (in_array($file_extension, $valid_extension)) {
					if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $target_file)) {
						$statement->execute(array($Government_ID, $filename, $target_file));
					}
				}
			}
    	
		header("Location: signin.php"); 
		echo '</main>';

	}

	?>
	<footer class="signin-footer">
<?php require './includes/global-footer.php'; ?>
	</footer>
</body>