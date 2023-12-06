<link rel="stylesheet" href="css/styles.css" type="text/css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<title>Signin</title>
<body>
  
  <header>
    <?php require './includes/global-header.php'; ?>
    <img src="images/header.jpg" alt="ICICI Bank Logo" class="logo">
  </header>

  <main>
    <section>
      <div>
        <h3>Please Sign In</h3>
        <a href="index.php" style="float:right;"><button class="btn btn-success"><i class="fas fa-plus"></i></button></a>
        <p>Sign in below</p>
       
        <form method="post" action="./includes/validate.php">
          <p><input class="form-control" name="Username" type="text" placeholder="Username" required ></p>
          <p><input class="form-control" name="Password" type="Password" placeholder="Password" required ></p>
          <button class="btn btn-primary" type="submit" value="Login">Login</button>
        </form>
      </div>
    </section>
  </main>

  <footer class="signin-footer">
    <?php require './includes/global-footer.php'; ?>
  </footer>

</body>
