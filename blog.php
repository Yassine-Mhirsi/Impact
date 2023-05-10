<?php
session_start();
error_reporting(0);
include('includes/config.php');
$email = $_SESSION['alogin'];
$sql = "SELECT * from users where email = (:email);";
$query = $dbh->prepare($sql);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Faith - Blog</title>
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
</head>

<body>

  <!-- ======= Header ======= -->
  <!-- <section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section> -->

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="main.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Journeys of Faith<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="main.php#hero">Home</a></li>
          <li><a href="main.php#about">About</a></li>
          <li><a href="main.php#services">Services</a></li>
          <li><a href="main.php#portfolio">Portfolio</a></li>
          <li><a href="blog.php">Blog</a></li>

          <li class="dropdown"><a href="#"><span>Steps</span><i
                class="bi bi-chevro  n-down dropdown-indicator bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="hajjstep.php">Hajj</a></li>
              <li><a href="umrah.php">Omrah</a></li>
            </ul>
          </li>
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
              <li><a href="zakat/index.php">Zakat Calculator</a></li>
              <li><a href="calender.php">Calender</a></li>
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
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Blog</h2>
              <p>Help Muslims respond to the call of Prophet Ibrahim</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="main.php">Home</a></li>
            <li>Blog</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4 posts-list">

          <div class="col-xl-4 col-md-6">
            <article>

              <div class="post-img">
                <img src="assets/img/travelling.jpg" alt="" class="img-fluid2 ">
              </div>

              <p class="post-category">Articles</p>

              <h2 class="title">
                <a href="blog-1.php">Duas For Travelling</a>
              </h2>

            </article>
          </div><!-- End post list item -->

          <div class="col-xl-4 col-md-6">
            <article>

              <div class="post-img">
                <img src="assets/img/mistakes.jpg" alt="" class="img-fluid1">
              </div>

              <p class="post-category">Articles</p>

              <h2 class="title">
                <a href="blog-2.php">Common Mistakes people do in Umrah and Hajj</a>
              </h2>
            </article>
          </div><!-- End post list item -->

          <div class="col-xl-4 col-md-6">
            <article>

              <div class="post-img">
                <img src="assets/img/blog/tip.jpg" alt="" class="img-fluid">
              </div>

              <p class="post-category">Articles</p>

              <h2 class="title">
                <a href="blog-3.php">Tips for Hajj you need to know</a>
              </h2>
            </article>
          </div><!-- End post list item -->

          <div class="col-xl-4 col-md-6">
            <article>

              <div class="post-img">
                <center><img width="500" src="assets/img/blog/tt.jfif" alt="" class="img-fluid"></center>
              </div>

              <p class="post-category">Articles</p>

              <h2 class="title">
                <a href="blog-4.php">How to save money for Hajj</a>
              </h2>
            </article>
          </div><!-- End post list item -->

          <div class="col-xl-4 col-md-6">
            <article>

              <div class="post-img">
                <center><img width="450" src="assets/img/blog/blog-5-v.jfif" alt="" class="img-fluid"></center>
              </div>

              <p class="post-category">articles</p>

              <h2 class="title">
                <a href="blog-5.php">How to stay safe during hajj</a>
              </h2>
            </article>
          </div><!-- End post list item -->

          <div class="col-xl-4 col-md-6">
            <article>

              <div class="post-img">
                <center><img width="500" src="assets/img/blog/tel.jfif" alt="" class="img-fluid"></center>
              </div>

              <p class="post-category">articles</p>

              <h2 class="title">
                <a href="blog-6.php">The Importance Of Performing Umrah</a>
              </h2>
            </article>
          </div><!-- End post list item -->

        </div><!-- End blog posts list -->

        <div class="blog-pagination">
          <ul class="justify-content-center">
            <li class="active"><a href="#">1</a></li>
          </ul>
        </div><!-- End blog pagination -->

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <h1>Journeys of Faith<span>.</span></h1>
          <!-- <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta
        donna mare fermentum iaculis eu non diam phasellus.</p> -->
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
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Prayer times</a></li>
            <li><a href="#">Qibla Finder</a></li>
            <li><a href="#">Zakat Calculator</a></li>
            <li><a href="#">Calender</a></li>
            <li><a href="#">Donate</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>
            <strong>Phone: </strong>+966 02-6341943<br>
            <strong>Email: </strong>journeys.of.faith@gmail.com<br>
          </p>

        </div>

      </div>
    </div>

    <div class="container mt-4">
      <div class="copyright">
        &copy;
        Journeys of Faith<span>.</span>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/impact-bootstrap-business-website-template/ -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
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

</body>

</html>