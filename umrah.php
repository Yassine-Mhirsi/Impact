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
  <section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a
            href="mailto:contact@example.com">contact@example.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section><!-- End Top Bar -->

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
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i
                class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
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
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <?php if (isset($_SESSION['alogin'])) { ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="bi bi-person" style="font-size: 2em;"></i>
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
              <p>Reciting these duas not only helps us to connect with Allah during our journey, but it also helps to keep us spiritually focused and centered on the purpose of our journey.
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
              <iframe width="850" height="315" src="assets/vid/steps.mp4"></iframe>
              </div>

              <h2 class="title">Steps of Umrah</h2>

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
        <h3>The Umrah ritual comprises four basic pillars including Ihram, Tawaf, Sa’ee, and Halq. We’ll take a look at each of them in detail:</h3>
	<ol>
		<li>
			<h2>Step 1 – Ihram</h2>
			<p>For anyone who plans to perform Hajj or Umrah, Ihram is a necessary ritual. Without Ihram, your Umrah or Hajj won’t be acceptable. So what exactly is Ihram? Ihram is a specific state that pilgrims enter and stay in while performing Hajj or Umrah. Entering the sacred state requires undertaking certain cleansing rituals and wearing the right clothes. 

               When all Hajj or Umrah pilgrims turn up at the house of Allah in the same Ihram attire, it creates total equality, thereby removing all financial and social differences between them. You can’t distinguish the rich from the poor when you go for Umrah or Hajj. It’s also important to understand here that entering Ihram places you under specific restrictions that you must be aware of. These include the following:
                    <ol>
                        
                    <li> Men are not permitted to shave hair or beards and cut their nails.</li>
                    <li>Men are not allowed to wear stitched or woven clothes. For women, any fully white or black clothing that fully covers their body except face and hands is their Ihram. Thus, women are permitted to wear stitched clothes during Umrah or Hajj.</li>
                    <li>Women should refrain from exposing any part of their body except the face and hands.</li>
                    <li>Neither men nor women should wear any type of scent, including perfumes, deodorants, aftershaves, and scented soaps. You’ll be provided with unscented soaps for use during the trip. </li>
                    <li>Pilgrims are not permitted to engage in sexual activity.</li>
                    <li>Pilgrims are not allowed to hunt animals or cut plants or trees. </p>
                    </ol>
                </li>
                <h4>How to Make Umrah Niyyah</h4>
                        An important rule pilgrims must understand is that the niyyah for Umrah or Ihram must be made before crossing one of the Meeqats. Niyyah is the innate intention to perform any act of worship, which should be followed by Talbiyah, which is a special prayer that pilgrims should keep reciting until they reach Masjid Al-Haram.

                        Meeqats are prescribed stations set by the Prophet (Salallahu Alaihi Wasallam) for entering the state of Ihram for all those proceeding for Hajj or Umrah. There are five stations in total, and which one applies to you depends on where you’re travelling from. Here are the five Meeqat locations:

                        1.Rabegh or Al-Juhfah – For those travelling from the West, Syria, Egypt
                        2.Yalumlum – For those travelling from Pakistan, India, or Yemen.
                        3.Abyar Ali or Dhul-Hulaifah – For those travelling from Madinah
                        4.Qarn-Al-Manazel – For those travelling from Taif and Najd
                        5.Dhatul-Irq – For those travelling from Iraq.
                        You shouldn’t just make the Umrah niyyah in your heart, but also recite the words. You may recite any of the following three supplications to make your niyyah:

                        Labbayka llahumma Umratan
                        Translation: O Allah! Here I am to perform Umrah.

                        Allahumma Inni uridu l—umrata
                        Translation: O Allah! I intend to perform Umrah.

                        Allahumma Inni uridu l-umrata fa yassirha li wa taqabbalha minni. 
                        Translation: O Allah! I intend to perform Umrah, so please accept it and make it easy for me.
                <h4>    How to Enter the State of Ihram?</h4>
                        If you’re travelling by air, you must enter the state of Ihram before crossing the Meeqat that applies to you. If you’re traveling in Saudi Airlines, they’ll make an announcement regarding the Meeqat at appropriate time before reaching Makkah. We recommend wearing the Ihram clothes at home and delay the niyyah until you get close to the Meeqat while in the airplane. You won’t officially enter the state of Ihram until you make the niyyah. 

                        Before putting on Ihram clothing, get yourself in a state of physical cleanliness. Perform ghusl, which refers to taking a bath in a prescribed manner. Alternatively, you may just perform wudhu. Ihram clothing includes two sheets of white cloth, one for the upper half of the body and the other for the lower half. After wearing Ihram clothing, pray two rakahs salah Al Ihram, but don’t make your niyyah of Ihram or Umrah right now as mentioned above. 

                        When you’re close to your applicable Meeqat, make your intention for Ihram and Umrah as per the method explained in the last section and then recite Talbiyah. Reciting Talbiyah is wajib and it validates your intention to enter the state of Ihram. The Talbiyah prayer is as follows:

                        Labbayka llahumma labbayk(a), Labbayka la sharika laka labbayk(a), inna l-hamda wa n-ni’mata, laka wa l-mulk(a), la sharika lak. 

                        Translation: At your service, O Allah, at Your service. At Your service, You have no partner, at Your Service. Truly all praise, favour, and sovereignty are Yours. You have no partner. 

                        After reciting Talbiyah, you’ve entered the state of Ihram and are a Muhrim. 
		<li>
			<h2>Step 2 – Tawaf Al-Umrah</h2>
			<p>The word Tawaf has been derived from the Arabic word ‘Taafa, which means ‘to encircle something.’ In the context of Umrah or Hajj, Tawaf is the practice of performing seven anti-clockwise circuits of the Ka’abah. While there are five different types of Tawaf, we’ll discuss Tawaf Al-Umrah, which forms a necessary part of Umrah. </p>
		</li>
		<li>
                <h4>Preparation</h4>
                To perform Tawaf, you must be free from all major and minor impurities and be in a state of wudhu. If your wudhu ends at any point during the Tawaf, carry out the ablution again and resume your Tawaf from where you left. You will naturally be in Ihram clothing, which will be pure and clean. For men, the part of their body between navel and knees must be covered, while for women, the entire body except hands and face must be covered.
                <h4>Starting Point</h4>
                    Once you’re in Mataf, observe Idtiba, the uncovering of the right shoulder, as per the practice of Sunnah for Tawaf Al-Umrah. This can be easily done by passing the upper sheet of your Ihram under your right armpit and hanging it from the left shoulder. You should keep your right shoulder uncovered throughout the Tawaf.

                    The starting point for Tawaf is the corner of the Ka’abah where Hajr Al-Aswad or the black stone is positioned. Stand facing the Ka’abah with the black stone on your right side. This is where you’ll make the niyyah to perform Tawaf. Recite the following words to make the intention:

                    Bimillahi Wallahu Akbar, Allahumma Imanan bika wa tasdiqan bika kitabika wa wafa’an bi ahdika wattaba’an li sunnati nabiyyika Muhammad (Salallahu Alaihi Wasallam).

                    Translation: I begin in the name of Allah, Allah is the greatest. O Allah, out of faith in You, belief in your book, in fulfilment of your covenant, and the emulation of the Sunnah of Your Prophet (Salallahu Alaihi Wasallam).

                    Begin your Tawaf by heading to your right so that the Ka’abah is on your left. This way, you’ll be making the round in an anti-clockwise direction. Raml is another Sunnah practice that should be observed while performing Tawaf Al-Umrah. It refers to the practice of walking quickly, forcefully lifting the feet, and sticking out the chest, mimicking a warrior. You should perform the first three rounds of your Tawaf in this manner then return to your normal walking state for the rest of the four rounds. 

                    Perform your Tawaf with a lot of humbleness, keeping in view the greatness of the Ka’abah. Avoid eating and drinking and talking unnecessarily about worldly things. 
                <h4>Duas to Read during Tawaf</h4>
                    You may recite any supplications and duas you remember during your Tawaf, since it’s the time when duas are accepted. You may recite Arabic duas or supplicate in your own language. Yet, it’s highly recommended that you memorize the Arabic Sunnah duas and recite them during your Tawaf. However, make sure you understand each dua you recite so that you experience humility while praying and don’t end up repeating the words. 

                    The best dua to recite between the Yamani corner and the Hajr Al-Aswad that’s prescribed by Sunnah is:

                    Rabbana Atina Fid Dunya Hasanah, wa fil akhirati hasanah, wa qina Azab annar.

                    Translation: O Lord, grant us the best in the world and the best in the next world, and protect us from the punishment of hellfire.

                    Reaching Hajr Al-Aswad marks the completion of each round. Kiss, touch or salute the black stone to move on to your next round. This is referred to as Istilam. 
                <h4>After Tawaf</h4>
                Once you’ve completed the seven rounds of Tawaf, follow these steps:
                        <h5>Salah Al-Tawaf</h5>
                            This refers to the two rakahs of Salah to be performed after completing your Tawaf. While it’s preferable to perform this Salah near Maqam-e-Ibrahim, it may not be possible because the spot is situated within Mataf. You may thus perform this salah anywhere in the Masjid.
                        <h5>Zamzam</h5>
                            After performing Salah Al-Tawaf, head to the well of Zamzam water, which is situated within Masjid Al-Haram. You should be able to obtain the water from any of the dispensers and fountains around the area. Duas are accepted at this station too, so make as many duas as you can. You may recite the following dua too after drinking Zamzam water:
                            Allahumma Inni As’aluka ‘ilman nafi’an, wa rizqan wasi’an, wa ‘amalan mutaqabbalan, wa shifa’an min kulli da’.
                            Translation: O Allah! Grant me knowledge that’s beneficial, the provision that’s abundant, and the cure to every illness. 
                        <h5>Performing Umrah with My Child. Is it Possible?</h5>
                            Yes, it’s possible to perform Umrah with your child. However, you’ll need to thoroughly understand how various steps such as niyyah, Tawaf, Sa’ee, etc. are to be performed on behalf of the child. Get in touch with an authentic scholar to learn the steps. 
        </li>
		<li>
			<h2>Step 3 – Sa’ee</h2>
			<p>Like Tawaf, Sa’ee is a mandatory step in Umrah. Simply put, it’s the practice of walking between the hills of Safa and Marwah seven times. After completing your Tawaf and performing Salah Al-Tawaf, return to Hajr Al-Aswad to carry out Istilam again before proceeding to the Safa hill to begin Sa’ee. Recite the following Verse from the Quran when approaching the Safa hill: 
                Inna s-safa wa l-marwata min sha’a’iri llah (i). 
                Translation: Indeed, Safa and Marwah are among the Signs of Allah (SWT).
                Then, recite the following dua:
                Abda’u bima bad’allahu bihi.
                Translation:  I start with that which Allah has begun with.
                When you reach the Safa hill, recite the following duas:
                Allahu akbar, Allahu akbar, Allahu Akbar, wa lillahi l-hamd.
                Translation: Allah is the greatest, Allah is the greatest, Allah is the greatest, and all praise be to Allah.
                There are various other supplications of Sunnah that you can recite before commencing your Sa’ee. Make your own duas in your own language too. Then, start walking to Marwah. Between the two hills of Safa and Marwah, you’ll notice two sets of green fluorescent lights positioned around 50 meters apart. In between these two, men should run at a medium pace, but women should proceed walking at their normal speed. 
                No specific dua or dhikr has been prescribed for pilgrims performing Sa’ee. You may recite any supplications or duas of your choice such as sending Durood upon the Prophet (Salallahu Alaihi Wasallam). 
                Every time you reach Marwah, recite the same supplications you recited upon reaching Safa. Your seventh lap will be complete at Marwah Hill. While it’s not mandatory, it’s recommended that you perform two rakahs of Salah after the completion of Sa’ee. </p>
		</li>
		<li>
			<h2>Step 4 – Halq or Taqsir</h2>
			<p>After Sa’ee, you’ll need to perform Halq or Taqsir to exit the state of Ihram. Unless you perform this critical step, you’ll stay in the state of Ihram. Halq refers to the shaving of the head, whereas Taqsir means trimming the hair. 
                Even if you don’t have any hair, run a razor over your head to complete the ritual. For taqsir, a minimum amount of hair must be trimmed equal to the length of a fingertip from all sides of the head where hair is present. While you may cut your hair on your own, assigning someone else to do that for you is also permitted. 
                Women, on the other hand, are forbidden to perform Halq. They only need to trim a fingertip’s length from the end of their hair, regardless of how short the hair is. </p>
		</li>
		<li>
			<h2>Step 5 – Ending Ihram</h2>
			<p>With the completion of Halq or Taqsir, you’ll exit the state of Ihram. As soon as your Ihram ends, you’ll be free from the associated restrictions such as the use of perfumes, cutting nails, engaging in marital relations, etc. You may now change into regular clothes. However, if your Umrah is part of Hajj, marital relations will remain forbidden until Tawaf al-Ziyarah but other Ihram restrictions will be lifted. </p>
		</li>
		
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



            <?php  include('comments.php');?>



              <!-- End comment #5 -->
              <div class="reply-form">
                <h4>Leave a Reply</h4>
                <!-- <p>  Your email address will not be published. Required fields are marked * </p> -->
                <form method="POST" onsubmit="return validateForm()">
                  <div class="row">
                    <div class="col form-group">
                      <textarea name="comment" id="comment" rows="4" class="form-control" placeholder="Your Comment" Required></textarea>
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
          <a href="main.php" class="logo d-flex align-items-center">
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

</body>

</html>