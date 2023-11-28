<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-lSI9vz7IqZf4cxaSiD2y7TIiGJCrCx30VDSlBYvHegRrA0MzInPbAvIt2AIQCW0nt8ib+jdZ5V9+gpIc/iKYw==" crossorigin="anonymous">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<link rel="stylesheet" href="css/styles.css" type="text/css">

    <header>
        <?php require 'includes/global-header.php'; ?>
        <img src="images/header.jpg" alt="ICICI Bank Logo" class="logo">
    </header>

    <?php
      session_start();

        require './includes/database.php';

        $sql = "SELECT * FROM bankaccount_database";
        $stmt = $conn->prepare('select * from profile_picture p join bankaccount_database b on b.Government_ID = p.Government_ID');
        $stmt->execute();
        $imagelist = $stmt->fetchAll();
        $result = $conn->query($sql);

        echo '<main class="view-people">';
        echo '<a href="index.php" style="float:right;"><button class="btn btn-success"><i class="fas fa-plus"></i></button></a>';
        echo '<section>';
        echo '<table class="table">
                <tr>
                  <th>Full Name</th>
                  <th>DOB</th>
                  <th>Email</th>
                  <th>Government ID</th>
                  <th>Phone Number</th>
                  <th>Employment Status</th>
                  <th>Account Type</th>
                  <th>Annual Income</th>
                  <th>Address</th>
                  <th>Username</th>
                  <th>Profile Picture</th>
                  <th>Action</th>
                </tr>';

        foreach ($result as $row) {
          echo '<tr>
                  <td>' . $row['Title'] . " " . $row['fname'] . " " . $row['lname'] . '</td>
                  <td>' . $row['DOB'] . '</td>
                  <td>' . $row['Email'] . '</td>
                  <td>' . $row['Government_ID'] . '</td>
                  <td>' . $row['Phone_Number'] . '</td>
                  <td>' . $row['Employment_Status'] . '</td>
                  <td>' . $row['Account_Type'] . '</td>
                  <td>' . $row['Annual_Income'] . '</td>
                  <td>' . $row['Mailing_Address'] . '</td>
                  <td>' . $row['Username'] . '</td>';?>

              <?php
                  echo '<td>';
                  foreach ($imagelist as $image) {
                    if ($image['Government_ID'] === $row['Government_ID']) {
                        echo '<img src="' . $image['Image_path'] . '" class="profile_picture">';
                        break;
                    }
                }

                echo '<td>'; 

                if (isset($_SESSION['Government_ID'])) {
                    $key = "%aLJH3.E8afcb8#4";
                    $encryptedID = openssl_encrypt($row['Government_ID'], 'aes-256-cbc', $key, 0, substr($key, 0, 16));
                    $encryptedID = urlencode(base64_encode($encryptedID));                    
                    echo '
                        <!-- Edit button -->
                        
                        <a href="update-data.php?id='. $encryptedID . '" class="btn btn-danger"><i class="fa fa-pencil text-white"></i></a>

                        
                        <!-- Delete button -->
                        <form method="post" action="update-data.php" onsubmit="return confirm(\'Are you sure you want to delete this record?\')">
                            <input type="hidden" name="governmentID" value="' . $row['Government_ID'] . '">
                            <input type="hidden" name="action" value="delete">
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash text-white"></i></button>
                        </form>';
                } 
                
                else {
                    
                    echo '
                        <!-- Edit button (redirect to signin.php) -->
                        <a href="signin.php" class="btn btn-danger"><i class="fa fa-pencil text-white"></i></a>
                        
                        <!-- Delete button (redirect to signin.php) -->
                        <form method="post" action="signin.php">
                            <input type="hidden" name="redirect" value="update-data.php?id=' . $row['Government_ID'] . '&action=delete">
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash text-white"></i></button>
                        </form>';
                }
        
                echo '</td>'; 
                echo '</tr>';
            }

    echo '</table>';    
    echo '<button class="logout_button"><a href="logout.php">Logout</a></button>';
    echo '</section>';
    echo '</main>';

    $conn = null;
    ?>

  <footer>
      <?php require './includes/global-footer.php'; ?>
  </footer>

