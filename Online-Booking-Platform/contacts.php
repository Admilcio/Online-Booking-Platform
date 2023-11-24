<?php
session_start();

include_once "dbase.inc.php";

// Initialize error variables
$emailError = '';
$phoneError = '';
$error = '';
$alertmsg = '';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  header("Location: login.php"); // Change this to your login page
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Validate form inputs here and set error messages if necessary
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $phone = $_POST['phone'];
    $message = $_POST['text_message'];
    $email = $_POST['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email address. Please enter a valid email address.";
    }

    if (!preg_match('/^9\d{8}$/', $phone)) {
        $phoneError = "Invalid phone number. Please enter a valid phone number starting with 9.";
    }

    if (empty($emailError) && empty($phoneError)) {
        // If there are no validation errors, proceed to insert data into the database
        $insert_query = "INSERT INTO projetos (email, first_name, last_name, phone, message) VALUES (?, ?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($insert_query);
        $stmt_insert->bind_param("sssss", $email, $firstName, $lastName, $phone, $message);

        if ($stmt_insert->execute()) {
            // Redirect after a successful insert
            header("Location: success_msg.php");
            exit;
        } else {
            // Insert failed
            $error = "Error: " . $stmt_insert->error;
        }
        // Close statements and the database connection
        $stmt_insert->close();
        $conn->close();
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
                    <a class="nav-link active" aria-current="page" href="budget.php">Budget Pricing</a>
                    <a class="nav-link" href="#">Contacts</a>
                </div>
                <form class="form-inline my-2 my-lg-0">
                    <a class=" my-2 my-sm-0 logout" href="logout.php">Log Out</a>
                </form>
            </div>
        </div>
    </nav>
</header>
 <div class="container-fluid contact-all-body">
  <section class="contact-body container justify-content-center align-content-center">
    <div class="msg">
      <h1>
        Leave us a Message
      </h1>
    </div>
    <div class="contact-center ">
    <form action="" class="form" id="myform" method="post">
      <div class="row">
        <div class="col-12 col">
          <h5>First Name</h5>
          <input type="text" class="form-control" id="first-name" required name="first_name">
        </div>
        <div class="col-12 col">
          <h5>Last Name</h5>
          <input type="text" class="form-control" id="last-name" required name="last_name">
        </div>
        <div class="col-12 col">
          <h5>Email Address</h5>
          <input type="email" class="form-control" id="email" required name="email">
        </div>
        <div class="col-12 col">
          <h5>Phone Number</h5>
          <input type="text" class="form-control" id="phone" required name="phone">
        </div>
        <div class="col-12 col">
          <h5>Message</h5>
          <textarea name="text_message" id="message" required></textarea>
        </div>
         <!--  <button id="btn">Contact Us</button> -->
         <input type="submit" value="Contact Us" id="btn">
        
      </div>
    </form>
    <div class="error_message">
    <p><?php echo $emailError?></p>
    <p><?php echo $phoneError?></p>
    <p><?php echo $error?></p>
    <p><?php echo $alertmsg?></p>
    
  </div>
  </div>
  </section>
  <div class="check-purchase">
<button class="carinho-btn"><a href="budget-carinho.php" target="blank">Check your Purchase</a></button>
</div>
  <div class="container-fluid">
   <div class="map-text">
    <h3><a href="https://www.google.com/maps/search/Master+D/@38.7408114,-9.1809292,14z/data=!3m1!4b1?entry=ttu" target="blank">Where to Find Us</a></h3>
   </div>
    <div class="map-body map">
      <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=MasterD&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://gachanymph.com/">Gacha Nymph APK</a></div></div> 
    </div>
  </div>
    <section class="footer row contact-footer">
        <div class="col-12">
          <h3>@ADM</h3>
          <p>2023 Admilcio da Mata. All rights reserved.</p>
        </div>
    </section>
  </div>
  <script type="text/javascript" src="index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="lightbox2-dev/dist/js/lightbox-plus-jquery.js"></script>
</body>
</html>