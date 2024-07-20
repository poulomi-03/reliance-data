<!-- Developed By: Poulomi Bhattacharya -->
 
<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Convert Excel to HTML Table using JavaScript</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link
    rel="shortcut icon"
    href="https://rilstaticasset.akamaized.net/sites/default/files/images/favicon.ico"
    type="image/x-icon"
  />

  <link
    rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous"
  />

  <link rel="stylesheet" href="styles/styles.css">
  <link rel="stylesheet" href="styles/universal-css-design.css">
</head>
<body>
  <div class="container">
    <h1 class="text-center mt-4 mb-4">Reliance Industries</h1>
    <h2 style="text-align: center">Petroleum, Refining and Marketing Data</h2>

    <?php
      // Check if admin is logged in
      if(isset($_SESSION['username'])) {
        // Admin is logged in
        echo '<p>Welcome, <span> ' . $_SESSION['username'] . '! </span></p>';
        echo '<button type="submit"><a href="php/logout.php">Log-Out</a></button>';
      } else {
        // Admin is not logged in
        echo '<button id="loginLink" type="submit">Admin Login</button>';
      }
    ?>

    <div class="card">
      <div style="background-color: #cfa866; color: #fff; font-size: 24px" class="card-header">
        <b>Select Excel File</b>
      </div>
      <div class="card-body">
        <input type="file" id="excel_file" name="document" />
      </div>
    </div>
    <h2 id="file-name" style="text-align: center"></h2>
    <div style="background-color: #cfa866" id="excel_data" class="mt-5"></div>
  </div>

  <!-- Login Form starts -->
  <div class="login-form login" id="loginForm">
    <form action="php/login.php" method="post">
      <div class="login-form-title">
        <p>Admin-LogIn-Form</p>
        <i id="closeLoginForm" class="fa-regular fa-circle-xmark" style="color: #05445E;"></i>
      </div>
      <div class="scroll">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
      </div>
      <button type="submit">Login</button>
    </form>
  </div>
  <!-- Login Form ends -->

  <script src="scripts/script.js"></script>
  <script src="scripts/login.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

</body>
</html>
