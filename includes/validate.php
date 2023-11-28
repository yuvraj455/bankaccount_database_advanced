<link rel="stylesheet" href="../css/styles.css" type="text/css">
<header>
<nav>        
            <ul>
              <li><a href="../index.php">Home</a></li>
              <li><a href="../view-data.php">View Data</a></li>
              <li><a href="../signin.php">Sign In</a></li>
            </ul>          
      </nav>
</header>
<main>
<?php
	$Username = $_POST['Username'];

	// hash the password (in other words encrypt the password less stronger than base64encode which is used to encrypt government id)
	$Password = hash('sha512', $_POST['Password']);

	require 'database.php';

	$sql = "SELECT Government_ID, fname, lname  FROM bankaccount_database 
	WHERE Username = '$Username' AND Password = '$Password'";
	$result = $conn->query($sql);
	$count = $result -> rowCount();

	if ($count == 1){
		$row = $result->fetch();
			session_start();
			$_SESSION['Government_ID'] = $row['Government_ID'];
			Header('Location: ../view-data.php');
	}

	else {

		echo '<p class="Invalid-login-msg">Invalid Login, Please Provide Correct Username and Password</p>';
	}

	$conn = null;
?>
</main>
<footer>
	<?php require ('global-footer.php'); ?>
</footer>