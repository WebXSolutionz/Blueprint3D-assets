<?php

session_start();
require_once 'config.php';

$error_msg = "NA";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = trim($_POST['email']);
  $password = trim($_POST['pass']);
  
  $sql = "SELECT ID FROM users WHERE LOWER(email) = LOWER(?) AND password = ?";
  if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $stmt->store_result();        
    if ($stmt->num_rows == 1) {
      $_SESSION['loggedin'] = true;
      $_SESSION['email'] = $email;
      header("location: index.html");
    } else {      
      $error_msg = "Invalid email or password.";
    }    
    $stmt->close();
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Furniture</title>
  <link rel="stylesheet" href="style.css" />
  <!-- bootstrap link -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- bootstrap link -->

  <!-- icons -->
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
  <!-- icons -->

  <script>
    <?php if (!empty($error_msg) && $error_msg !== "NA") { ?>
      // Display error message in a popup
      window.onload = function() {
        alert('<?php echo $error_msg; ?>');
      };
    <?php } ?>
  </script>

</head>

<body>
  <!-- navbar top -->
  <div class="container">
    <div class="navbar-top">
      <div class="social-link">
        <i><img src="./image/twitter.png" alt="" width="30px" /></i>
        <i><img src="./image/facebook.png" alt="" width="30px" /></i>
        <i><img src="./image/google-plus.png" alt="" width="30px" /></i>
      </div>
      <div class="logo">
        <h3><a href="/index.html" style="color: black">FURNITURE</a></h3>
      </div>
      <div class="icons">
        <i><img src="./image/search.png" alt="" width="20px" /></i>
        <i><img src="./image/heart.png" alt="" width="20px" /></i>
        <i><img src="./image/shopping-cart.png" alt="" width="25px" /></i>
      </div>
    </div>
  </div>
  <!-- navbar top -->

  <!-- main content -->
  <div class="main-content">
    <nav class="navbar navbar-expand-md" id="navbar-color">
      <div class="container">
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span><i><img src="./image/menu.png" alt="" width="30px" /></i></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Top Chair</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Chair</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Brands</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="d-flex-center">
      <div class="form-div">
        <form method="POST">
          <div id="login-form">
            <input type="text" name="email" id="email" placeholder="Username" />
            <input type="password" name="pass" id="pass" placeholder="Password" />
            <!-- <button style="margin-bottom: 0" onclick="checkCredentials()"> -->
            <button style="margin-bottom: 0">
              Log In
            </button>
            <p style="
                margin-top: 10px;
                margin-bottom: 10px;
                font-weight: bold;
                font-size: 30px;
              ">
              OR
            </p>
            <button type="menu" style="margin-bottom: 0">
              <a href="/sign-up.php" style="color: black">Sign Up</a>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- main content -->

  <!-- footer -->
  <footer id="footer" style="margin-top: 0">
    <h1 class="text-center">Furniture</h1>
    <p class="text-center">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab?
    </p>
    <div class="icons text-center">
      <i class="bx bxl-twitter"></i>
      <i class="bx bxl-facebook"></i>
      <i class="bx bxl-google"></i>
      <i class="bx bxl-skype"></i>
      <i class="bx bxl-instagram"></i>
    </div>
    <div class="copyright text-center">
      &copy; Copyright <strong><span>Furniture</span></strong>. All Rights Reserved
    </div>
  </footer>
  <!-- footer -->
</body>

</html>