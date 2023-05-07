<?php
session_start();
error_reporting(0);
include('./includes/config.php');
if (isset($_SESSION['alogin'])) {
  $email = $_SESSION['alogin'];
  $sql = "SELECT * from users where email = (:email);";
  $query = $dbh->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->execute();
  $result = $query->fetch(PDO::FETCH_OBJ);


  // prayer times
  $year = date('Y');
  $month = date('m');
  $city = 'Tunis';
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://api.aladhan.com/v1/calendarByCity/$year/$month?city=$city&country=Tunisia");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  curl_close($ch);
  $data = json_decode($response);
  $fajr = $data->data[0]->timings->Fajr;
  $sunrise = $data->data[0]->timings->Sunrise;
  $dhuhr = $data->data[0]->timings->Dhuhr;
  $asr = $data->data[0]->timings->Asr;
  $maghrib = $data->data[0]->timings->Maghrib;
  $isha = $data->data[0]->timings->Isha;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Interactive Qibla Finder</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Impact
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->


  <link rel="stylesheet" type="text/css" href="qibla/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="qibla/style.css">

</head>

<body>
  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="main.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Journeys of Faith<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="main.php">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="blog.php">Blog</a></li>
          <li class="dropdown"><a href="#"><span>Features</span><i
                class="bi bi-chevro  n-down dropdown-indicator bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li class="dropdown"><a href=""><span>Prayer Times</span> <i
                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <?php
                  // prayer times
                  $year = date('Y');
                  $month = date('m');
                  $city = 'Tunis';
                  $ch = curl_init();
                  curl_setopt($ch, CURLOPT_URL, "http://api.aladhan.com/v1/calendarByCity/$year/$month?city=$city&country=Tunisia");
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                  $response = curl_exec($ch);
                  curl_close($ch);
                  $data = json_decode($response);
                  $fajr = $data->data[0]->timings->Fajr;
                  $sunrise = $data->data[0]->timings->Sunrise;
                  $dhuhr = $data->data[0]->timings->Dhuhr;
                  $asr = $data->data[0]->timings->Asr;
                  $maghrib = $data->data[0]->timings->Maghrib;
                  $isha = $data->data[0]->timings->Isha;
                  ?>
                  <li><a href="#">
                      <?php echo "Fajr: $fajr" ?>
                    </a></li>
                  <li><a href="#">
                      <?php echo "Sunrise: $sunrise" ?>
                    </a></li>
                  <li><a href="#">
                      <?php echo "Dhuhr: $dhuhr" ?>
                    </a></li>
                  <li><a href="#">
                      <?php echo "Asr: $asr" ?>
                    </a></li>
                  <li><a href="#">
                      <?php echo "Maghrib: $maghrib" ?>
                    </a></li>
                  <li><a href="#">
                      <?php echo "Isha: $isha" ?>
                    </a></li>
                </ul>
              </li>
              <li><a href="qibla.php">Qibla Finder</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="donate.php">Donate</a></li>
            </ul>
          </li>
          <?php if (isset($_SESSION['alogin'])) { ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- <i class="bi bi-person" style="font-size: 2em;"></i> -->
                <img style="height:40px;width:40px;border-radius: 50%;"
                  src="images/<?php echo htmlentities($result->image); ?>">
              </a>
              <ul class="dropdown-menu">
                <li><a href="profile.php">
                    <?php echo htmlentities($result->name); ?>
                  </a></li>
                <li><a href="logout.php">Sign Out</a></li>
              </ul>
            </li>
          <?php } else { ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="bi bi-person" style="font-size: 2em;"></i>
              </a>
              <ul class="dropdown-menu">
                <li><a href="login.php">Login</a></li>
              </ul>
            </li>
          <?php } ?>
          <!-- <?php
          $apiKey = 'fba3aa09fa30561ab5820639d64ec856';
          $cityId = '104515';
          $apiUrl = "https://api.openweathermap.org/data/2.5/weather?id=$cityId&appid=$apiKey&units=metric";
          $response = json_decode(file_get_contents($apiUrl));
          $temp = round($response->main->temp);
          $city = $response->name;
          echo '<li style="float:left;align:left;"><a href="https://openweathermap.org/city/104515" target="_blank">' . $city . ': ' . $temp . '°C</a></li>';
          ?> -->
        </ul>

      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <nav>
        <div class="container">
          <ol>
            <li><a href="main.php">Home</a></li>
            <li>Qibla</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <section class="sample-page">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12 page-header">
            <h1 class="text-center">Interactive Qibla Finder</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <div id="map"></div>
          </div>
          <div class="col-md-4">
            <form>
              <div class="form-group">
                <label for="location">Enter a location or hit enter to place
                  marker at current center of map:</label>
                <input type="text" class="form-control" id="address">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <div id="qibla"></div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="main.html" class="logo d-flex align-items-center">
            <span>Impact</span>
          </a>
          <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta
            donna mare fermentum iaculis eu non diam phasellus.</p>
          <div class="social-links d-flex mt-4">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>
            A108 Adam Street <br>
            New York, NY 535022<br>
            United States <br><br>
            <strong>Phone:</strong> +1 5589 55488 55<br>
            <strong>Email:</strong> info@example.com<br>
          </p>

        </div>

      </div>
    </div>

    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Impact</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/impact-bootstrap-business-website-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- qibla -->
  <script src="qibla/jquery.min.js"></script>
  <script src="qibla/bootstrap.min.js"></script>
  <script src="qibla/app.js"></script>
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAnAdXjgiEX08RLBbMle9X_WWN4BzNHBg&libraries=places&callback=initMap"
    async defer></script>

</body>

</html>