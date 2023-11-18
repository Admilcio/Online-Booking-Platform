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
      <div class="sign-up">
      <h2 class>SIGN UP</h2>
        <form action="" method="post">
          <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter your name" name="nome" required>
          </div>
          <div class="form-group">
            <label for="exampleInputName">Last Name</label>
            <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter your last name" name="lastname" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email" name="email" required>
          </div>
          <div class="form-group">
            <label for="exampleInputName">Telephone</label>
            <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter your telephone" name="phone" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter your password" name="password" required>
          </div>
          <button type="submit" class="btn btn-primary" id="btn" name="btn">SIGN UP</button>
        </form>
        <button class="btn btn-primary register" id="btn"><a href="login.php">LOG IN NOW</a></button>
      </div>
    </div>
    <div class="php container">
      <?php
      if (isset($_POST['btn'])) {
        $name = $_POST['nome'];
        $lastName = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
    
        // Validate the email address
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p>Email address is not valid.</p>";
        } else {
            // Check if the phone number has 9 digits and starts with 9
            if (preg_match('/^9[0-9]{8}$/', $phone)) {
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
                    // Check if the email already exists in the database
                    $check_email_query = "SELECT * FROM clientes WHERE email = ?";
                    $stmt_check = $conn->prepare($check_email_query);
                    $stmt_check->bind_param("s", $email);
                    $stmt_check->execute();
                    $result = $stmt_check->get_result();
    
                    if ($result->num_rows > 0) {
                        echo "<p>Email already exists in the database.</p>";
                    } else {
                        // Hash the password
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
                        // Prepare and execute the SQL query to insert the new user
                        $insert_query = "INSERT INTO clientes (username, email, password_hash, last_name, phone) VALUES (?, ?, ?, ?, ?)";
    
                        // Declare $stmt_insert here
                        $stmt_insert = $conn->prepare($insert_query);
                        $stmt_insert->bind_param("sssss", $name, $email, $hashed_password, $lastName, $phone);
    
                        if ($stmt_insert->execute()) {
                            echo "<p>Registration Successfully!</p>";
                        } else {
                            echo "<p>Error: " . $stmt_insert->error . "</p>";
                        }
                    }
    
                    // Close statements
                    $stmt_check->close();
    
                    // Close the database connection
                    $conn->close();
                }
            } else {
                echo "<p>Phone number is not valid. It should have 9 digits and start with 9.</p>";
            }
        }
    }
?>    
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>