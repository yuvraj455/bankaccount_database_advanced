<!DOCTYPE html>
<html lang="en">

  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="Yuvraj Jindal">
      <meta name="description" content="A simple webpage that stores the information required for opening a Bank Account">
      <title>ICICI Bank Limited</title>
      <link rel="stylesheet" href="css/styles.css" type="text/css">
      <link rel="shortcut icon" href="images/icon.jpg" type="image/x-icon">
  </head>

  <body>

    <header>
      <?php require ('./includes/global-header.php'); ?>
      <img src="images/header.jpg" alt="ICICI Bank Logo" class="logo">
    </header>
    
    <main>

      <form method="post" action="save-data.php" enctype = "multipart/form-data">
        <fieldset>
          <fieldset>
            <legend>Personal Details</legend>
            
                <label for="Title">Title</label>
                <select name="Title" id="Title" >
                    <option>Please Select</option>
                    <option>Mr.</option>
                    <option>Ms.</option>
                    <option>Mrs.</option>
                </select>

                <label for="fname">First Name:</label>
                <input type="text" name="fname" id="fname" required >

                <label for="lname">Last Name:</label>
                <input type="text" name="lname" id="lname">

                <label for="date-of-birth">Date of Birth:</label>
                <input type="date" id="date-of-birth" name="DOB" required >

                <label for="Government_ID">Government ID No.</label>
                <input type="text" id="Government_ID" name="Government_ID" placeholder="eg: J44665-79000-41018">

                <label for="Email">Email:</label>
                <input type="email" id="Email" name="Email" placeholder="eg: name@domain.com" required >

                <label for="Phone_Number">Primary Phone Number:</label>
                <input type="tel" id="Phone_Number" name="Phone_Number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="eg: 905-556-6548" required>

                <label for="Mailing_Address">Address:</label>
                <input type="text" id="Mailing_Address" name="Mailing_Address">
                  
          </fieldset>

          <fieldset>
            <legend>Account Classification and Usage</legend>
            <label for="Account_Type">Account type:</label>
            <select name="Account_Type" id="Account_Type" >
              <option>Please Select</option>
              <option>Savings</option>
              <option>Current</option>
            </select>

            <label for="usage-purpose">What will you be using this account for?</label>
            <select name="purpose" id="usage-purpose" >
              <option>Select a Purpose</option>
              <option>Daily Banking</option>
              <option>Emergency Fund</option>
              <option>Savings/Investment</option>
              <option>Leisure/Recreation</option>
            </select>

            <label for="Employment_Status">Employment Status:</label>
            <select name="Employment_Status" id="Employment_Status" >
              <option>Please Select</option>
              <option>Self-Employed</option>
              <option>Government Official</option>
              <option>Employed</option>
              <option>Unemployed</option>
              <option>Student</option>
            </select>

            <label for="Annual_Income">Annual Income:</label>
            <input type="text" id="Annual_Income" name="Annual_Income" required >

            <label for="services">Additional Services Needed:</label>
            <input type="checkbox" id="services" name="services">Cheque Book
            <input type="checkbox" name="services">Linked Account/Automatic Transfers
            <input type="checkbox" name="services">Low fee account options
            <input type="checkbox" name="services">Monthly Account Statements(Paper)
            <input type="checkbox" name="services">Overdraft Protection

            

          </fieldset>
          <fieldset>
            <legend>Profile Picture</legend>
            <label for="pic">Upload</label>
            <input type="file" id="pic" name="files[]" multiple required >
          </fieldset>

          <fieldset>
            <legend>Username & Password</legend>
            <h2>Set your Username & Password</h2>
            <p><input class="form-control" name="Username" type="text" placeholder="Username" required ></p>
            <p><input class="form-control" name="Password" type="Password" placeholder="Password" required ></p>
            <p><input class="form-control" name="confirm" type="Password" placeholder="Confirm Password" required ></p>
          </fieldset>

          <button type="submit" name="Register" value="Register">Register</button>
        </fieldset>
      </form>

      <div>
        <h3><strong>Already have an account!</strong></h3>
        <form method="post" action="./includes/validate.php">
          <fieldset>
            <legend>Sign In</legend>
            <p><input class="form-control" name="Username" type="text" placeholder="Username" required ></p>
            <p><input class="form-control" name="Password" type="Password" placeholder="Password" required ></p>
            <button type="submit" value="Login">Login</button>
          </fieldset>
        </form>
      </div>

    </main>

    <footer>
    <?php require ('./includes/global-footer.php'); ?>
    </footer>

  </body>

</html>