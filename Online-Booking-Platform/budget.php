<?php
session_start();
?>
<?php
$selectedServices = [];
$emailError = ''; 
$phoneError = '';
$dateError = '';
// Check if the user is logged in or not (you can modify this as needed)
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  header("Location: login.php"); // Change this to your login page
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn'])) {
  $name = $_POST['nome'];
  $lastName = $_POST['lastname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $selectedService = $_POST['budget'];
  $selectedMonths = $_POST['months'];
  $finalPrice = $_POST['final_price'];
  $newDate = $_POST['date'];

  $currentDateTime = new DateTime();
  $selectedDateTime = new DateTime($newDate);
  $interval = $currentDateTime->diff($selectedDateTime);

  if ($interval->format('%r%a') < 3 || ($interval->format('%a') === '2' && $interval->h >= 0)) {
      $dateError = "Please select a date and time within the next 72 hours.";
  } else { 
  // Validate the email address
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailError = "<p>Email address is not valid.</p>";
  } else {
      // Check if the phone number has 9 digits and starts with 9
      if (preg_match('/^9[0-9]{8}$/', $phone)) {
          $servername = "localhost";
          $username = "root";
          $db_password = "";
          $database = "php_final_project";
          /* unset($_SESSION['user_info']); */
          // Initialize $_SESSION['user_info'] as an array
          $_SESSION['user_info'] = [
              'name' => $name,
              'last_name' => $lastName,
              'email' => $email,
              'phone' => $phone,
          ];

          // Check if the selected service and months are not empty before storing them
          if (!empty($selectedService)) {
            $selectedServices[] = $selectedService;
              $_SESSION['user_info']['selected_service'] = $selectedService;
          }

          if (!empty($selectedMonths)) {
              $_SESSION['user_info']['selected_months'] = $selectedMonths;
          }

          // Initialize an array to store selected classes
          $selectedClasses = [];

          // Check if each class checkbox is selected, and if so, add it to the array
          if (isset($_POST['situation'])) {
              $selectedClasses[] = "Situational Awareness and Mindset";
          }
          if (isset($_POST['verbal'])) {
              $selectedClasses[] = "Verbal De-Escalation";
          }
          if (isset($_POST['personal'])) {
              $selectedClasses[] = "Personal Safety Devices";
          }
          if (isset($_POST['basic'])) {
              $selectedClasses[] = "Basic Physical Techniques";
          }
          if (isset($_POST['self-defense'])) {
              $selectedClasses[] = "Self-Defense Against Multiple Attackers";
          }

          // Store the selected classes in the session
          $_SESSION['user_info']['selected_classes'] = $selectedClasses;

          // Create a new MySQLi connection
          $conn = new mysqli($servername, $username, $db_password, $database);

          // Check the connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          } else {
              // Prepare and execute the SQL query to insert the new user without checking duplicates
              $insert_query = "INSERT INTO utilizadores (first_name, last_name, email, phone, selectedService, selectedMonths, finalPrice, available_classes, select_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
              $stmt_insert = $conn->prepare($insert_query);
              $selectedClassesStr = implode(', ', $selectedClasses);
              $stmt_insert->bind_param("sssssisss", $name, $lastName, $email, $phone, $selectedService, $selectedMonths, $finalPrice, $selectedClassesStr, $newDate);
              
              if ($stmt_insert->execute()) {
                  header("Location: redirect.php"); // Change "success.php" to the actual URL you want to redirect to
                  exit;
              } else {
                  echo "<p>Error: " . $stmt_insert->error . "</p>";
              }
              $email = $_SESSION['user_info']['email'];

              $update_query = "UPDATE utilizadores SET has_bought_service = 1 WHERE email = ?";
              $stmt_update = $conn->prepare($update_query);
              $stmt_update->bind_param("s", $email);
              
              if ($stmt_update->execute()) {
                  // Successfully updated the has_bought_service flag
                  // You can redirect the user to the data insertion page for `projetos` here
              } else {
                  // Update failed
                  $error = "Error: " . $stmt_update->error;
              }
              
              // Close the statement
              $stmt_update->close();
              // Close statements
              $stmt_insert->close();
              // Close the database connection
              $conn->close();
          }
      } else {
          $phoneError = "<p>Phone number is not valid. It should have 9 digits and start with 9.</p>";
      }
  }
 }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Self-Defense Instructor</title>
    <link rel="icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="index.css">
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
                    <a class="nav-link active" aria-current="page" href="">Budget Pricing</a>
                    <a class="nav-link" href="contacts.php">Contacts</a>
                </div>
                <form class="form-inline my-2 my-lg-0">
                    <a class=" my-2 my-sm-0 logout" href="logout.php">Log Out</a>
                </form>
            </div>
        </div>
    </nav>
</header>
  <div class="container-fluid contact-all-body"> 
    <div class="title">
      <h1>Services</h1>
    </div>
 <section class="budget container align-content-center">
  <form action="" class="form" id="myform" method="post">
  <div class="main-section">
    <div class="subheader">
      <h3>Personal Data</h3>
    </div>
    <div class="user-data">
      <div class="div-input row">
          <div class="col-12 error-pos">
        <p>Name:</p> <input type="text" class="input" id="first-name" name="nome" required>
      </div>
        <div class="col-12 error-pos">
        <p>Last Name:</p> <input type="text" class="input" id="last-name" name="lastname" required>
      </div>
      <div class="col-12 error-pos">
        <p>Email:</p> <input type="text" class="input" id="email" name="email" required>
      </div>
        <div class="col-12 error-pos">
        <p>Phone:</p> <input type="text" class="input" id="phone" name="phone" required>
      </div>
      <div class="col-12 col error-pos">
          <h5>Select the starting date</h5>
          <input type="date" id="date" required name="date">
        </div>
  </div>
    </div>
    <div class="subheader">
      <h3>Budget Request</h3>
    </div>
    <div class="orcamento"> 
      <div class="div-orc">
      <p>Type of Services:</p> <select name="budget" id="select-budget" class="input" required>
        <option value="">Choose your service</option>
        <option value="Basic">Basic</option>
        <option value="Standard">Standard</option>
        <option value="Premium">Premium</option>
      </select>
    </div>
    <div class="div-orc">
      <p>Select how many months:</p> <input type="number" class="deadline input" id="select-month"  min="1" name="months" required>
    </div>
    </div>
    <div class="separator">
      <div class="subheader">
    <h3>Available Classes</h3>
      </div>
      <div class="check-sep" id="sep-form">
        <div class="div">
        <input type="checkbox" class="Marque" value="400" name="situation">Situational Awareness and Mindset
      </div>
      <div class="div">
        <input type="checkbox" class="Marque" value="400" name="verbal">Verbal De-Escalation
      </div>
        <input type="checkbox" class="Marque" value="400" name="personal">Personal Safety Devices
        <div class="div">
        <input type="checkbox" class="Marque" value="400" name="basic">Basic Physical Techniques
      </div>
      <div class="div">
        <input type="checkbox" class="Marque" value="400" name="self-defense">Self-Defense Against Multiple Attackers
      </div>
      </div>
    </div>
    <div class="final-budget">
      <h3 class="budget-title">Estimated Price</h3>
      <p>(This value is not final and may go under some change)</p>
<!--       <div class="show-final"><h5 id="final-price">$</h5></div> -->
      <input id="final-price" value="$" class="show-final final-price" disabled>
      <input type="hidden" name="final_price" value="$" class="show-final final-price">
    </div>
    <div class="btn-div">
      <input type="submit" id="budget-btn" value="Confirm Purchase" name="btn">
    </div>
  </div>
</form>
<div class="check-purchase">
<button class="carinho-btn"><a href="budget-carinho.php" target="blank">Check your Purchase</a></button>
</div>
<div class="budget-form">
<p class="error"><?php echo $emailError; ?></p>
<p class="error"><?php echo $phoneError; ?></p>
<p><?php echo $dateError?></p>
</div>
</section>
<section class="footer row contact-footer">
  <div class="col-12">
    <h3>@ADM</h3>
    <p>2023 Admilcio da Mata. All rights reserved.</p>
  </div>
</section>
</div>
<script src="index.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="lightbox2-dev/dist/js/lightbox-plus-jquery.js"></script>
</body>
</html>