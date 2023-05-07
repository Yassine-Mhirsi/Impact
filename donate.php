<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Journeys of Faith</title>
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

  <!-- CSS here -->
  <link rel="stylesheet" href="css2/bootstrap.min.css">
  <link rel="stylesheet" href="css2/owl.carousel.min.css">
  <link rel="stylesheet" href="css2/magnific-popup.css">
  <link rel="stylesheet" href="css2/font-awesome.min.css">
  <link rel="stylesheet" href="css2/themify-icons.css">
  <link rel="stylesheet" href="css2/nice-select.css">
  <link rel="stylesheet" href="css2/flaticon.css">
  <link rel="stylesheet" href="css2/gijgo.css">
  <link rel="stylesheet" href="css2/animate.css">
  <link rel="stylesheet" href="css2/slicknav.css">
  <link rel="stylesheet" href="css2/style.css">
  <!-- <link rel="stylesheet" href="css2/responsive.css"> -->

  <!-- =======================================================
  * Template Name: Impact
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <link href="https://cdn3.devexpress.com/jslib/21.1.4/css/dx.common.css" rel="stylesheet" type="text/css" />
  <link href="https://cdn3.devexpress.com/jslib/21.1.4/css/dx.light.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn3.devexpress.com/jslib/21.1.4/js/dx.all.js"></script>

</head>

<body>

  <!-- ======= Header ======= -->

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
          <li><a href="main.php#about">About</a></li>
          <li><a href="main.php#services">Services</a></li>
          <li><a href="main.php#portfolio">Portfolio</a></li>
          <li><a href="main.php#team">Team</a></li>
          <li><a href="blog.php">Blog</a></li>
          <li class="dropdown"><a href="#"><span>Features</span><i
                class="bi bi-chevro  n-down dropdown-indicator bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li class="dropdown"><a href=""><span>Drop down</span> <i
                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
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
              <h2>Support Our Brothers</h2>
              <p>At our organization, we are dedicated to improving the lives of underprivileged communities around the
                world. With your help, we can make a significant impact by providing access to education, healthcare,
                and basic necessities. Our past initiatives have helped countless families, and we are committed to
                continuing this work. Your donation will directly support our efforts and help us reach more people in
                need. Join us in making a difference and donate today!</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="main.php">Home</a></li>
            <li>Donate</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->



    <section>
      <div data-scroll-index='1' class="make_donation_area section_padding">
        <div class="containerr">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="section_title text-center mb-55">
                <h3><span>Make a Donation</span></h3>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <form action="#" class="donation_form">
                <div class="row align-items-center">
                  <div class="col-md-4">
                    <div class="single_amount">
                      <div class="input_field">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">DT</span>
                          </div>
                          <input type="text" class="form-control" placeholder="200" aria-label="Username"
                            aria-describedby="basic-addon1">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="single_amount">
                      <div class="fixed_donat d-flex align-items-center justify-content-between">
                        <div class="select_prise">
                          <h4>Select Amount:</h4>
                        </div>
                        <div class="single_doonate">
                          <input type="radio" id="blns_1" name="radio-group" checked>
                          <label for="blns_1">10</label>
                        </div>
                        <div class="single_doonate">
                          <input type="radio" id="blns_2" name="radio-group" checked>
                          <label for="blns_2">30</label>
                        </div>
                        <div class="single_doonate">
                          <input type="radio" id="Other" name="radio-group" checked>
                          <label for="Other">Other</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="donate_now_btn text-center">
                <a href="#" class="boxed-btn4">Donate Now</a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->

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