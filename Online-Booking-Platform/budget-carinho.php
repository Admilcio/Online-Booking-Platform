<?php
session_start();

// Check if the user is logged in; if not, redirect to the login page or perform necessary authentication checks
if (!isset($_SESSION['user_info'])) {
    header("Location: no_purchase.php"); // Replace 'login.php' with your actual login page
    exit();
}

include_once "dbase.inc.php";

// Retrieve user data from the database
$email = $_SESSION['user_info']['email'];
$query = "SELECT * FROM utilizadores WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();
$result->data_seek(0);
?>
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
                <form class="form-inline my-2 my-lg-0">
                    <a class=" my-2 my-sm-0 logout" href="logout.php">Log Out</a>
                </form>
            </div>
        </div>
    </nav>
</header>
<section class="container main carinho">
    <div class="row align-content-center">
        <div class="col-12">
            <div class="content">
                <h1>Your Purchases</h1>
                <?php
                if ($result->num_rows > 0) {
                    while ($userData = $result->fetch_assoc()) {
                        // Display user data
                        ?>
                        <div class="input-val">
                            <p><strong>Name:</strong> <?php echo $userData['first_name'] . ' ' . $userData['last_name']; ?></p>
                            <p><strong>Email:</strong> <?php echo $userData['email']; ?></p>
                            <p><strong>Phone:</strong> <?php echo $userData['phone']; ?></p>
                            <p><strong>Type Service:</strong> <?php echo $userData['selectedService']; ?></p>
                            <p><strong>Number of Months:</strong> <?php echo $userData['selectedMonths']; ?></p>
                         
                            <?php
                         if (!empty($userData['select_date'])) {
                            echo "<p><strong>Start Date:</strong> " . $userData['select_date'] . "</p>";
                        }                        
                            ?>
                            <?php
                            echo "<h2>Selected Classes:</h2>";
                            $selectedClasses = explode(', ', $userData['available_classes']);
                            if (!empty($selectedClasses)) {
                                echo "<ul>";
                                foreach ($selectedClasses as $class) {
                                    echo "<li>$class</li>";
                                }
                                echo "</ul>";
                            } else {
                                echo "<p>No selected classes.</p>";
                            }
                            ?>

                            <div class="final-price">
                                <h3>Final Price:</h3>
                                <p><?php echo $userData['finalPrice']; ?></p>
                            </div>
                            <div class="delete_purchase">
                            <a href="#" onclick="confirmDelete(<?php echo $userData['id']; ?>);" class="btn btn-danger">Delete Purchase</a>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>No purchases found.</p>";
                }
                ?>
            </div>
            <?php
            if ($result->num_rows > 0) {
              // Show this section only if there is a purchase made
              ?>
              <p class="show-form">If you want to reschedule <a href="#date-link"><span> Click Here </span></a></p>
              <div class="container-fluid contact-all-body hide-form">
                <section class="contact-body container justify-content-center align-content-center">
                  <div class="contact-center">
                  <form action="update_date.php" class="form" id="myform-1" method="post">
    <div class="col-12 col">
        <h5 id="date-link">Select the new date</h5>
        <input type="date" class="form-control" id="date" required name="date">
    </div>
    <input type="submit" value="Update" id="btn" class="btn-update">
</form>
                  </div>
                </section>
              </div>
              <?php
            }
            ?>
    <script src="index.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="lightbox2-dev/dist/js/lightbox-plus-jquery.js"></script>
  </body>
</html>
<?php 
// Close the database connection
$stmt->close();
$conn->close();
?>

