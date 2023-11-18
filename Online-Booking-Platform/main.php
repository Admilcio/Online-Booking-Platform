<?php 
session_start();

// Check if the user is logged in or not (you can modify this as needed)
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  header("Location: login.php"); // Change this to your login page
  exit;
}
include_once "dbase.inc.php";
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
<!-- <script type="text/javascript" src="index.js"></script> -->
  </head>
  <body onload="setAlert()">
  <header>
    <nav class="navbar navbar-expand-lg fixed-top bg-dark" id="navbar">
        <div class="container-fluid nav-container">
            <a class="navbar-brand" href="#"><i class="fa-solid fa-house"></i></a>
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
        <div class="container-fluid center-content">
          <div class="main-content">
        <section class="header-section">
          <div id="toggleSlide">
            <i class="fa-solid fa-square-rss fa-beat-fade"></i>
          </div>
          <div class="container scroll">
            <?php 
            $user_name = $_SESSION['user_name'];
            ?>
            <div class="welcome">     <h1>Welcome, <?php echo $user_name; ?>!</h1></div>
            
          <h1>Self-Defense Empowerment(SDE)</h1>
          <div class="paragraph-1 paragraph">
            <h5>Our History</h5>
            <p>Embark on a journey through time with us as we delve into the riveting history of our self-defense instruction legacy. Rooted in the very essence of empowerment, our story began decades ago when a group of passionate martial arts enthusiasts came together to address a critical need equipping individuals with the skills to defend themselves and face the world fearlessly. From humble beginnings, we have evolved into a beacon of knowledge, merging traditional wisdom with contemporary techniques. Our lineage of instructors, each a master in their own right, has meticulously cultivated a curriculum that not only imparts physical prowess but also nurtures unwavering confidence. As we stride into the future, our history fuels our determination to continue empowering lives through the art of self-defense. </p>
          </div>
            <div class="paragraph-2 paragraph">
              <h5>The Self-defense Instructor's Role</h5>
              <p>Imagine a guide who doesn't just teach techniques, but mentors you in mastering the art of safeguarding yourself that's the essence of a self-defense instructor. They are the architects of courage, sculpting the unbreakable spirit that resides within every individual. A self-defense instructor isn't just an expert in strikes and blocks; they are the embodiment of preparedness, ensuring you're poised to protect yourself mentally, emotionally, and physically. Beyond the dojo or training center, they empower you with skills that resonate through all aspects of life the ability to read situations, make swift decisions under pressure, and exude an aura of self-assuredness. More than teachers, they are partners in your personal growth, transforming you into a sentinel of your own security.</p>
            </div>
            <div class="paragraph-3 paragraph">
              <h5>The Need for a Self-defense Instructor</h5>
              <p>In a world where uncertainties linger around every corner, the need for a self-defense instructor transcends mere luxury it's a necessity. Crime may be unpredictable, but our response doesn't have to be. A self-defense instructor equips you with an arsenal of techniques, instills the art of situational awareness, and hones your reflexes to a razor-sharp edge. It's not just about physical encounters; it's about cultivating the mental resilience to navigate through life's challenges unscathed. In a society where personal safety is paramount, having a self-defense instructor isn't just a prudent choice it's a declaration of self-reliance, a commitment to stand unwavering in the face of adversity. Join us on this transformative journey, and together, we'll script a future where fear has no place and where you are the author of your own security.</p>
            </div>
          </div>
        </section>
        <section class="main-body">
          <h2>Our Instructor Team</h2>
          <div class="container gallery">
            <div class="row">
              <div class="col-sm-6">
                <a href="img/img2-3.jpg" data-lightbox="image-1" data-title="The feeling when you have done it all"><img src="img/img2-3.jpg" alt="image 2" class="img-fluid"></a>
              </div>
              <div class="col-sm-6">
                <a href="img/img1.jpg" data-lightbox="image-1" data-title="You never know what is next"><img src="img/img1.jpg" alt="image 2" class="img-fluid"></a>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <a href="img/img3.webp" data-lightbox="image-1" data-title="Life happens unexpected"><img src="img/img3.webp" alt="image 3" class="img-fluid"></a>
              </div>
              <div class="col-sm-6">
                <a href="img/img4.jpg" data-lightbox="image-1" data-title="All for the better tomorrow"><img src="img/img4.jpg" alt="image 3" class="img-fluid"></a>
              </div>
            </div>
          </div>          
          <div class="container justify-content-center">
          <div class="remind-footer row">
            <div class="row">
              <div class="col">
            <p>If You Need Insurance, We Are One <span> <a href="#" id="load-json">Click Away</a></span> Your Shield in the Modern Storm  <br> <i id="remind-description">Like a lighthouse cutting through the darkness, we stand as your unwavering beacon of protection and empowerment</i></p>
          </div>
          <div class="json-bg">
          <div class="json-data col-12">

          </div>
          <div class="json-btn">
            <button id="btn" class="btn-json"> Click Here to Enroll Now</button>
          </div>
         
        </div>
        </div>
      </div>
        </div>
        <div class="news-connect">
          <p class="show-news"><span>News about Self defense</p>
          <div class="display-news">
              <?php 
              $sql = "SELECT id, title, content FROM noticias";

              // Execute the SQL query
              $result = $conn->query($sql);

              if (!$result) {
                  die("Error executing the query: " . $conn->error);
              }

              // Display the news articles
              while ($row = $result->fetch_assoc()) {
                  $title = $row['title'];
                  $content = $row['content'];

                  // Display the news article data
                  echo '<div class="bd-news">';
                  echo "<h3>$title</h3><br>";
                  echo "<p>$content</p> <br>";
                  echo '</div>';
                  echo "<hr>";
              }

              // Close the database connection
              $conn->close();
              ?>
      </div>
</div>
        </section>
        <section class="main-footer row">
          <div class="col-12">
            <h3>@ADM</h3>
            <p>2023 Admilcio da Mata. All rights reserved.</p>
          </div>
        </section>
      </div>
        <div class="side-content">
          <div class="content">
            <div id="close">
              <i class="fa-solid fa-xmark fa-beat-fade"></i>
            </div>
            <h3>Fresh News</h3>
            <div id="news">
            </div>
          </div>
      </div>
       </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="lightbox2-dev/dist/js/lightbox-plus-jquery.js"></script>
    <script type="text/javascript" src="index.js"></script>
  </body>
</html>