<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Self-Defense Instructor</title>
    <link rel="icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="lightbox2-dev/dist/css/lightbox.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
  <header>
    <nav class="navbar navbar-expand-lg fixed-top bg-dark">
        <div class="container-fluid nav-container">
            <a class="navbar-brand" href="main.php"><i class="fa-solid fa-house"></i></a>
            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="budget.php">Budget Pricing</a>
                    <a class="nav-link" href="contacts.php">Contacts</a>
                </div>
            </div>
        </div>
    </nav>
</header>
<body>
  <div class="container header">
    <div class="header-form">
      <h1 class="title">Self-Defense Empowerment(SDE)</h1>
      <h4 class="title">Welcome to the Empowerment Zone - Where You Become Your Own Hero!</h4>
      <div class="sign-up login">
        <h2>LOG IN</h2>
        <form action="" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email" name="email" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter your password" name="password" required>
          </div>
          <div class="login-btn">
          <button type="submit" class="btn btn-primary" id="btn" name="btn">LOG IN</button>
          </div>
        </form>
        <button class="btn btn-primary register" id="btn"><a href="index.php">REGISTER NOW</a></button>
      </div>
    </div>
    <div class="php container">
      <?php
      session_start();

      if (isset($_POST['email']) && isset($_POST['password'])) {
          $email = $_POST['email'];
          $password = $_POST['password'];

          // Check if email and password are not empty
          if (empty($email) || empty($password)) {
              echo "Email and password are required.";
          } else {
              // Database connection parameters
              $servername = "localhost";
              $username = "root";
              $db_password = "";
              $database = "php_final_project";

              // Create a new MySQLi connection
              $conn = new mysqli($servername, $username, $db_password, $database);

              // Check the connection
              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              } else {
                  // Check if the email exists in the database
                  $check_email_query = "SELECT * FROM clientes WHERE email = ?";
                  $stmt_check = $conn->prepare($check_email_query);
                  $stmt_check->bind_param("s", $email);
                  $stmt_check->execute();
                  $result = $stmt_check->get_result();

                  if ($result->num_rows > 0) {
                      // Fetch the user's hashed password and username from the database
                      $row = $result->fetch_assoc();
                      $hashed_password = $row['password_hash'];
                      $login_name = $row['username'];

                      // Verify the provided password against the hashed password
                      if (password_verify($password, $hashed_password)) {
                        unset($_SESSION['user_info']);
                          $_SESSION['logged_in'] = true;
                          $_SESSION['user_name'] = $login_name;
                          header("Location: main.php");
                          exit;
                      } else {
                          echo "Invalid email or password. Please try again.";
                      }
                  } else {
                      echo "This email does not exist. Please register.";
                  }

                  // Close statements
                  $stmt_check->close();

                  // Close the database connection
                  $conn->close();
              }
          }
      }
      ?>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
