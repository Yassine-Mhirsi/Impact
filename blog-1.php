<?php
session_start();
error_reporting(0);
include('includes/config.php');

$date = date("Y-m-d H:i:s");
$email = $_SESSION['alogin'];
$sql = "SELECT * from users where email = (:email);";
$query = $dbh->prepare($sql);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch(PDO::FETCH_OBJ);
$cnt = 1;

if (isset($_POST['comment-submit'])) {
  // header('location:test.php');
  if (strlen($_SESSION['alogin']) == 0) {
    header('location:login.php');
  } else {
    // header('location:test.php');
    $comment = $_POST['comment'];
    $sql = "INSERT INTO comments (comment,id_user,user_name,email,date) VALUES (:comment, :id, :name, :email, :date)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':comment', $comment, PDO::PARAM_STR);
    $query->bindParam(':id', $result->id, PDO::PARAM_STR);
    $query->bindParam(':name', $result->name, PDO::PARAM_STR);
    $query->bindParam(':email', $result->email, PDO::PARAM_STR);
    $query->bindParam(':date', $date, PDO::PARAM_STR);
    $query->execute();
  }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!-- <meta http-equiv="refresh" content="60; blog-details.php"> -->

  <title>Impact Bootstrap Template - Blog Details</title>
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
  <script>
    var comment = document.getElementById("comment").value;
    function validateForm() {
      if (comment == "") {
        alert("Please enter a comment.");
        return false;

      }
    }
  </script>

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
              <h2>Blog Details</h2>
              <p>Reciting these duas not only helps us to connect with Allah during our journey, but it also helps to
                keep us spiritually focused and centered on the purpose of our journey.
              </p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="main.php">Home</a></li>
            <li>Blog Details</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-8">

            <article class="blog-details">

              <div class="post-img">
                <img src="assets/img/blog/dua-1.png" alt="" class="img-fluid">
              </div>

              <h2 class="title">Duas For Travelling.</h2>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.php">John
                      Doe</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.php"><time
                        datetime="2020-01-01">Jan 1, 2022</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.php">12
                      Comments</a></li>
                </ul>
              </div><!-- End meta top -->

              <div class="content">
                <p>
                  We know that Allah has power over absolutely everything, and He has the power to make our dreams come
                  true.
                  Making dua is a beautiful act of worship that helps us remember how needy we are of Allah’s Mercy and
                  Generosity.
                  Whether we are at home, at work, or even travelling we should always take advantage of opportunities
                  to remember Allah and make dua to Him.
                </p>

                <blockquote>
                  <p>
                    They are a number of supplications pertaining to travel which you should endeavour to read during
                    the course of your journey.
                  </p>
                </blockquote>
                <h3>Main Dua for Travelling.</h3>
                <p>
                  After you have boarded your means of transport, whether it is a car, bus or plane, recite the dua
                  below.
                  Abdullah ibn Umar I reported that when the Messenger of Allah ﷺ would straighten up on his camel when
                  setting out on a journey he said:
                </p>
                <blockquote>
                  <p>اللّٰهُ أَكْبَر‎ اللّٰهُ أَكْبَر‎ اللّٰهُ أَكْبَر‎.
                    سُبْحَانَ الَّذِيْ سَخَّرَ لَنَا هَذَا وَمَا كُنَّا لَهُ مُقْرِنِيْنَ, وَإِنَّا إِلَى رَبِّنَا
                    لَمُنْقَلِبُوْنَ, اللهُمَّ إِنَّا نَسْأَلُكَ فِيْ سَفَرِنَا هَذا البِرَّ وَالتَّقْوَى, وَمِنَ
                    الْعَمَلِ مَا تَرْضَى, اللهُمَّ هَوِّنْ عَلَيْنَا سَفَرَنَا هَذَا, وَاطْوِ عَنَّا بُعْدَهُ, اللهُمَّ
                    أنْتَ الصَّاحِبُ فِيْ السَّفَرِ وَالْخَلِيْفَةُ فَيْ الْأَهْلِ, اللهُمَّ إِنِّيْ أَعُوْذُ بِكَ مِنْ
                    وَعْثَاءِ السَّفَرِ وَكَآبَةِ الْمَنْظَرِ
                    وَسُوْءِ الْمُنْقَلِبِ فِيْ الْمَالِ وَالْأَهْلِ
                  </p>
                  <audio src="https://cdn.aladhan.com/audio/adhans/a1.mp3" type="audio/mp3" controls="controls"></audio>
                  <p>
                    Allāhu akbar Allāhu akbar Allāhu akbar.
                    Subḥāna-lladhī sakhkhara lanā hādhā wa mā kunnā lahu muqrinīn wa innā ilā Rabbinā la-munqalibūn.
                    Allāhumma innā nas’aluka safarinā hādha-l-birra wa-t-taqwā, wa mina-l-‘amali mā tarḍā. Allāhumma
                    hawwin ‘alaynā safaranā hādhā, wa-ṭwi ‘annā bu’dah. Allāhumma Anta-ṣ-Ṣāhibu fi-s-safari
                    wa-l-Khalīfatu fi-l-ahl. Allāhumma innī a’ūdhu bika min wa’thā’i-s-safar, wa ka’ābati-l-manẓari wa
                    sū’i-l-munqalabi fi-l-māli wa-l-ahl.
                  </p>
                </blockquote>

                <p>
                  Glory be to Him Who has subjugated this to us, for we could not have accomplished it, and truly to our
                  Lord we are returning. O Allah, we ask You for piety and fear of Allah and deeds with which You will
                  be pleased on this journey of ours. O Allah make this journey easy for us and fold up for us its
                  distance. O Allah You are the Companion on the journey and the Deputy among the family. O Allah I seek
                  Your protection from discomfort on the journey and from a gloomy outlook, and from any evil befalling
                  my wealth or family.
                </p>

                <h3>When Ascending or Descending.</h3>
                <p>
                  There are two supplications that can be recited when ascending or descending.

                  Ibn Umar I reported that when the Prophet ﷺ returned from Hajj, Umrah or a military expedition,
                  whenever he climbed a hill or hillock he said takbīr thrice, followed by:
                </p>
                <blockquote>
                  <p>
                    ا إِلَهَ إِلاَّ اللَّهُ وَحْدَهُ لَا شَرِيكَ لَهُ، لَهُ المُلْكُ ولَهُ الحَمْدُ، وَهُوَ عَلَى كُلِّ
                    شَيْءٍ قَدِيرٌ. آئِبُونَ تَائِبُونَ عَابِدُونَ ساجِدُونَ لِرَبِّنَا حَامِدُونَ. صَدَقَ اللَّهُ
                    وَعْدهُ، وَنَصَرَ عَبْدَهُ، وَهَزَمَ الأَحْزَابَ وحْدَهُ.

                  </p>
                  <p>
                    Lā ilāha illa-llāhu wahdahu lā sharīka lah, lahu-l-mulk, wa lahu-l-ḥamd, wa Huwa alā kulli shay’in
                    qadīr. Ā’ibūnā tā’ibūn, ‘ābidūna sājidūn, li-Rabbinā ḥāmidūn. Ṣadaqa-llāhu wa‘dah, wa naṣara abdah,
                    wa hazama-l-aḥzāba wahdah.
                </blockquote>
                <p>
                  There is no god but Allah, the One Who has no partner. His is the kingdom and His is the praise, and
                  He has power over all things. Returning, repenting, worshipping, prostrating before our Lord,
                  praising. Allah has fulfilled His promise, and given victory to His servant, and routed the
                  confederates by Himself.
                </p>
                <img src="assets/img/blog/dua-2.jpg" class="img-fluid" alt="">

                <h3>Approaching a Town.</h3>
                <p>
                  Upon approaching a town or city during your journey, recite the following dua. Suhayb I related that
                  the Prophet ﷺ did not see any village he was about to enter without saying:
                </p>
                <blockquote>
                  <p>
                    اللهُمَّ رَبَّ السَّمَاوَاتِ السَّبْعِ وَمَا أَظْلَلْنَ, وَالْأَرَضِيْنَ السَّبْعِ وَمَا أَقْلَلْنَ،
                    وَرَبَّ الشَّيَاطِيْنَ وَمَا أَضْلَلْنَ، وَرَبَّ الرِّيَاحِ وَمَا ذَرَيْنَ. أَسْأَلُكَ خَيْرَ هَذِهِ
                    الْقَرْيَةِ وَخَيْرَ أَهْلِهَا، وَنَعُوْذُ بِكَ مِنْ شَرِّهَا وَشَرِّ أَهْلِهَا وَشَرِّ مَا فِيْهَا
                  </p>
                  <p>
                    Allāhumma Rabba-s-samāwati-s-sab’i wa mā aẓlalna, wa-l-ardīna-s-sab’i wa mā aqlalna, wa
                    Rabba-sh-shayāṭīni wa mā aḍlalna, wa Rabba-r-riyāḥi wa mā dharayn. As’aluka khayra hādhihi-l-qaryati
                    wa khayra ahlihā, wa na’ūdhu bika min sharrihā wa sharri ahlihā wa sharri mā fīhā.
                  </p>
                </blockquote>
                <p>
                  O Allah, Lord of the seven heavens and what they cover, Lord of the seven earths and what they carry,
                  Lord of the Shayatin and all those they lead astray, Lord of the winds and what they scatter. I ask
                  You (to grant me) the good of this town, the good of its people and the good of whatever is in it. And
                  I seek protection in You from the evil of this town, the evil of its people and the evil of whatever
                  is in it
                </p>
              </div><!-- End post content -->

              <div class="meta-bottom">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li><a href="#">Business</a></li>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div><!-- End meta bottom -->

            </article><!-- End blog post -->

            <div class="post-author d-flex align-items-center">
              <img src="assets/img/blog/blog-author.jpg" class="rounded-circle flex-shrink-0" alt="">
              <div>
                <h4>Jane Smith</h4>
                <div class="social-links">
                  <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                  <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                  <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                </div>
                <p>
                  Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat
                  voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.
                </p>
              </div>
            </div><!-- End post author -->



            <?php include('comments.php'); ?>



            <!-- End comment #5 -->
            <div class="reply-form">
              <h4>Leave a Reply</h4>
              <!-- <p>  Your email address will not be published. Required fields are marked * </p> -->
              <form method="POST" onsubmit="return validateForm()">
                <div class="row">
                  <div class="col form-group">
                    <textarea name="comment" id="comment" rows="4" class="form-control" placeholder="Your Comment"
                      Required></textarea>
                  </div>
                </div>
                <button type="submit" name="comment-submit" class="btn btn-primary">Post Comment</button>

              </form>

            </div>

          </div><!-- End blog comments -->

        </div>

        <div class="col-lg-4">

          <div class="sidebar">

            <div class="sidebar-item search-form">
              <h3 class="sidebar-title">Search</h3>
              <form action="" class="mt-3">
                <input type="text">
                <button type="submit"><i class="bi bi-search"></i></button>
              </form>
            </div><!-- End sidebar search formn-->

            <div class="sidebar-item categories">
              <h3 class="sidebar-title">Categories</h3>
              <ul class="mt-3">
                <li><a href="#">General <span>(25)</span></a></li>
                <li><a href="#">Lifestyle <span>(12)</span></a></li>
                <li><a href="#">Travel <span>(5)</span></a></li>
                <li><a href="#">Design <span>(22)</span></a></li>
                <li><a href="#">Creative <span>(8)</span></a></li>
                <li><a href="#">Educaion <span>(14)</span></a></li>
              </ul>
            </div><!-- End sidebar categories-->

            <div class="sidebar-item recent-posts">
              <h3 class="sidebar-title">Recent Posts</h3>

              <div class="mt-3">

                <div class="post-item mt-3">
                  <img src="assets/img/blog/blog-recent-1.jpg" alt="">
                  <div>
                    <h4><a href="blog-details.php">Nihil blanditiis at in nihil autem</a></h4>
                    <time datetime="2020-01-01">Jan 1, 2020</time>
                  </div>
                </div><!-- End recent post item-->

                <div class="post-item">
                  <img src="assets/img/blog/blog-recent-2.jpg" alt="">
                  <div>
                    <h4><a href="blog-details.php">Quidem autem et impedit</a></h4>
                    <time datetime="2020-01-01">Jan 1, 2020</time>
                  </div>
                </div><!-- End recent post item-->

                <div class="post-item">
                  <img src="assets/img/blog/blog-recent-3.jpg" alt="">
                  <div>
                    <h4><a href="blog-details.php">Id quia et et ut maxime similique occaecati ut</a></h4>
                    <time datetime="2020-01-01">Jan 1, 2020</time>
                  </div>
                </div><!-- End recent post item-->

                <div class="post-item">
                  <img src="assets/img/blog/blog-recent-4.jpg" alt="">
                  <div>
                    <h4><a href="blog-details.php">Laborum corporis quo dara net para</a></h4>
                    <time datetime="2020-01-01">Jan 1, 2020</time>
                  </div>
                </div><!-- End recent post item-->

                <div class="post-item">
                  <img src="assets/img/blog/blog-recent-5.jpg" alt="">
                  <div>
                    <h4><a href="blog-details.php">Et dolores corrupti quae illo quod dolor</a></h4>
                    <time datetime="2020-01-01">Jan 1, 2020</time>
                  </div>
                </div><!-- End recent post item-->

              </div>

            </div><!-- End sidebar recent posts-->

            <div class="sidebar-item tags">
              <h3 class="sidebar-title">Tags</h3>
              <ul class="mt-3">
                <li><a href="#">App</a></li>
                <li><a href="#">IT</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Mac</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Office</a></li>
                <li><a href="#">Creative</a></li>
                <li><a href="#">Studio</a></li>
                <li><a href="#">Smart</a></li>
                <li><a href="#">Tips</a></li>
                <li><a href="#">Marketing</a></li>
              </ul>
            </div><!-- End sidebar tags-->

          </div><!-- End Blog Sidebar -->

        </div>
      </div>

      </div>
    </section><!-- End Blog Details Section -->

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