<link rel="stylesheet" href="css/styles.css" type="text/css">
<title>Update Data</title>
<body>

    <header>
        <?php require './includes/global-header.php'; ?>
        <img src="images/header.jpg" alt="ICICI Bank Logo" class="logo">
    </header>
<!-- In this I have also added the functinality to change the current profile image if user wants along with changing other fields as well. -->

    <?php
    session_start();

    if (!isset($_SESSION['Government_ID'])) {
        header('location:signin.php');
        exit();
    } 

    else {
        require './includes/database.php';
        $sql = "SELECT * FROM users WHERE Government_ID='$_SESSION[Government_ID]'";
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {

            if ($_POST['action'] === 'delete') {
                
                $governmentID = $_POST['governmentID'];

                $stmtSelectImagePath = $conn->prepare("SELECT Image_path FROM profile_picture WHERE Government_ID = :Government_ID");
                $stmtSelectImagePath->bindParam(':Government_ID', $governmentID);
                $stmtSelectImagePath->execute();
                $imagePath = $stmtSelectImagePath->fetchColumn();

                if ($imagePath !== false && file_exists($imagePath)) {
                    unlink($imagePath);
                }

                $stmtDeletePic = $conn->prepare("DELETE FROM profile_picture WHERE Government_ID = :Government_ID");
                $stmtDeletePic->bindParam(':Government_ID', $governmentID);
                $stmtDeletePic->execute();

                $stmt = $conn->prepare("DELETE FROM bankaccount_database WHERE Government_ID = :Government_ID");
                $stmt->bindParam(':Government_ID', $governmentID);
                $stmt->execute();

                
                header('Location: view-data.php');
                exit();
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $updatedData = [
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'DOB' => $_POST['DOB'],
                'Email' => $_POST['Email'],
                'Phone_Number' => $_POST['Phone_Number'],
                'Annual_Income' => $_POST['Annual_Income'],
                'Mailing_Address' => $_POST['Mailing_Address'],
                'Username' => $_POST['Username'],
                'Government_ID' => $_POST['Government_ID']
             
            ];

            if ($_FILES['new_image']['size'] > 0) {

                $governmentID = $_POST['Government_ID'];

                $stmtSelectImagePath = $conn->prepare("SELECT Image_path FROM profile_picture WHERE Government_ID = :Government_ID");
                $stmtSelectImagePath->bindParam(':Government_ID', $governmentID);
                $stmtSelectImagePath->execute();
                $imagePath = $stmtSelectImagePath->fetchColumn();

                if ($imagePath !== false && file_exists($imagePath)) {
                    unlink($imagePath);
                }

                $originalFileName = $_FILES["new_image"]["name"];
                $fileExtension = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

                $targetDirectory = "Uploaded_pictures/";
                $targetFile = $targetDirectory . $originalFileName;

                move_uploaded_file($_FILES["new_image"]["tmp_name"], $targetFile);

                $stmtUpdateImage = $conn->prepare("UPDATE profile_picture SET Name = :Name, Image_path = :Image_path WHERE Government_ID = :Government_ID");
                $stmtUpdateImage->bindParam(':Government_ID', $governmentID);
                $stmtUpdateImage->bindParam(':Name', $originalFileName);
                $stmtUpdateImage->bindParam(':Image_path', $targetFile);
                $stmtUpdateImage->execute();
        }
        
            $governmentID = $_POST['governmentID']; 
            $stmt = $conn->prepare("UPDATE bankaccount_database SET fname = :fname, lname = :lname, DOB = :DOB, Email = :Email, Phone_Number = :Phone_Number, Annual_Income = :Annual_Income, Mailing_Address = :Mailing_Address, Username = :Username WHERE Government_ID = :Government_ID");
            $stmt->bindParam(':fname', $updatedData['fname']);
            $stmt->bindParam(':lname', $updatedData['lname']);
            $stmt->bindParam(':DOB', $updatedData['DOB']);
            $stmt->bindParam(':Email', $updatedData['Email']);
            $stmt->bindParam(':Phone_Number', $updatedData['Phone_Number']);
            $stmt->bindParam(':Government_ID', $governmentID);
            $stmt->bindParam(':Annual_Income', $updatedData['Annual_Income']);
            $stmt->bindParam(':Mailing_Address', $updatedData['Mailing_Address']);
            $stmt->bindParam(':Username', $updatedData['Username']);
            $stmt->execute();
            
            header('Location: view-data.php');
            exit();
        } 
        
        else{    
            
            // I have encrypted the government id so that nobody could actually see what it exactly is
            //below code is used to decode the encrypted id to fetch the data
            $key = "%aLJH3.E8afcb8#4";
            $encryptedID = base64_decode(urldecode($_GET['id']));
            $governmentID = openssl_decrypt($encryptedID, 'aes-256-cbc', $key, 0, substr($key, 0, 16));


            $stmt = $conn->prepare("SELECT * FROM bankaccount_database WHERE Government_ID = :Government_ID");
            $stmt->bindParam(':Government_ID', $governmentID);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $stmtSelectImagePath = $conn->prepare("SELECT Image_path FROM profile_picture WHERE Government_ID = :Government_ID");
            $stmtSelectImagePath->bindParam(':Government_ID', $governmentID);
            $stmtSelectImagePath->execute();
            $imagePath = $stmtSelectImagePath->fetchColumn();

            echo '<main>';
            echo '<section class="update-data-form">';
            echo '<form method="post" action="update-data.php" enctype="multipart/form-data">';
            echo '<input type="hidden" name="governmentID" value="' . $row['Government_ID'] . '">';
          
            echo '<div class="edit">';
            echo '<label for="fname">First Name:</label>';
            echo '<input type="text" name="fname" value="' . $row['fname'] . '" required>';

            echo '<label for="lname">Last Name:</label>';
            echo '<input type="text" name="lname" value="' . $row['lname'] . '">';

            echo '<label for="date-of-birth">Date of Birth:</label>';
            echo '<input type="date" name="DOB" value="' .$row['DOB'] . '" required >';

            echo '<label for="Email">Email:</label>';
            echo '<input type="email" name="Email" value="' . $row['Email'] . '">';

            echo '<label for="Phone_Number">Phone Number:</label>';
            echo '<input type="tel" name="Phone_Number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder = "eg: 905-537-0601" value="' . $row['Phone_Number'] . '">';

            echo '<label for="Annual_Income">Annual Income:</label>';
            echo '<input type="text" name="Annual_Income" value="' . $row['Annual_Income'] . '">';

            echo '<label for="Mailing_Address">Address:</label>';
            echo '<input type="text" id="Mailing_Address" name="Mailing_Address" value="' .$row['Mailing_Address'] . '">';

            echo '<label for="Government_ID">Government ID:</label>';
            echo '<input type="text" name="Government_ID" value="' . $row['Government_ID'] . '">';

            echo '<label for="Username">Username:</label>';
            echo '<input type="text" name="Username" value="' . $row['Username'] . '">';
           
            echo '<label for="current_image">Current Image:</label>';
            echo '<img src="' . $imagePath . '" alt="Current Image" class="current-image">';
            
            echo '<label for="new_image">Upload New Image:</label>';
            echo '<input type="file" name="new_image">';

            echo '<button type="submit"value="Save Changes" class="btn btn-primary">Save Changes</button>';
            echo '</div>';
            echo '</form>';
            echo '</section>';
            echo '</main>';
        }    

        $conn = null;
    }
    ?>

    <footer>
        <?php require './includes/global-footer.php'; ?>
    </footer>
</body>
