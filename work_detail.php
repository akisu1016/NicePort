<?php
session_start();
include 'work_action.php';
$work_id = $_GET['work_id'];
$works_list = $work_obj->display_works_detail($work_id);
$comment_list = $work_obj->display_works_comments($work_id);
// echo "<pre>";
// print_r($comment_list);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Leview Details</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

  <!-- =======================================================
  * Template Name: Squadfree - v4.0.1
  * Template URL: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="index.php"><span>NicePort</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <div class="from-group">
        <form action="index.php" method="GET">
          <div class="input-group">
            <input type="search" class="form-control" name="saerch" id="" aria-describedby="helpId" placeholder="Serach">
            <span class="input-group-btn">
              <button class="btn btn-light" type="submit"><i class="fas fa-search"></i></button>
            </span>
          </div>
        </form>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link" href="index.php"><i class="fa fa-home"></i>Home</a></li>

          <li class="dropdown"><a href="#"><i class="fas fa-tag"></i><span>Tags</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Genre sample</a></li>
              <li><a href="#">Genre sample</a></li>
              <li><a href="#">Genre sample</a></li>
              <li><a href="#">Genre sample</a></li>
            </ul>
          </li>

          <li><a class="nav-link scrollto" href="upload_works.php"><i class="fas fa-upload"></i> <span>Shere</span></a></li>

          <?php
          if (isset($_SESSION['user_id'])) {
            echo '<li class="dropdown"><a href="#"><i class="fas fa-user"></i><span>Members</span><i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="mypage.php">MyPage</a></li>
              <li><a href="user_action.php?logout=true">Logout</a></li>
            </ul>
          </li>';
          } else {
            echo '<li><a class="nav-link" href="registration.php"><i class="fas fa-user-plus"></i><span>registration</span></a></li>';
            echo '<li><a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i> <span>Login</span></a></li>';
          }

          ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Leview Details</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <!-- <li><a href="work_detail.php">Leview</a></li> -->
            <li>Leview Details</li>
          </ol>
        </div>

      </div>
    </section><!-- Breadcrumbs Section -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper-container">
              <div class="swiper-wrapper align-items-center">
                <?php foreach ($works_list as $row) : ?>
                  <div class="swiper-slide">
                    <?php if (isset($row['picture_url'])) {
                      $src = $row['picture_url'];
                    } else {
                      $src = "images/no_image_square.jpg";
                    }
                    echo "<img src='$src' alt=''>";
                    ?>
                  </div>
                <?php endforeach ?>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Information</h3>
              <ul>
                <li id="work_id" value="<?php echo $work_id ?>" hidden></li>
                <li><strong>User_name</strong>: <?php echo $works_list[0]["user_name"] ?></li>
                <li><strong>Category</strong>: <?php echo $works_list[0]["category_name"] ?></li>
                <li><strong>Post Date</strong>: <?php echo $works_list[0]["added_date"] ?></li>
                <!-- <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li> -->
              </ul>
            </div>
            <div class="portfolio-description">
              <h2><?php echo $works_list[0]["work_title"] ?></h2>
              <p><?php echo $works_list[0]["detail"] ?></p>
            </div>
            <button type="button" id="nice_button" name="nice_button" class="btn btn-outline-primary" data-toggle="button" aria-pressed="false" autocomplete="off"><i class="far fa-thumbs-up"></i>Nice <span id="val"><?php echo $works_list[0]["nice"] ?></span></button>
          </div>
        </div>
      </div>
    </section><!-- End Potfolio Details Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Comments</h2>
        </div>

        <div class="testimonials-slider swiper-container">
          <?php if ($comment_list !== FALSE) : ?>
            <div class="swiper-wrapper align-items-center">
              <?php foreach ((array)$comment_list as $row) : ?>
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      <?php echo $row['comment_value'] ?>
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <?php if (isset($row['user_icon']) and !empty($row['user_icon'])) {
                      $src = $row['user_icon'];
                    } else {
                      $src = "assets/img/testimonials/nouser.png";
                    }
                    echo "<img src='$src' class='testimonial-img' alt=''>";
                    ?>
                    <h3>@<?php echo $row['user_name'] ?></h3>
                    <h4><?php echo $row['comment_date'] ?></h4>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          <?php else : ?>
            <div class="row justify-content-md-center">
              <h3 class="text-center">comments not exit</h3>
            </div>
          <?php endif; ?>
          <div class="swiper-pagination"></div>
        </div>

        <div class="row justify-content-md-center">
          <div class="col-md-6">
            <form action="work_action.php?work_id=<?php echo $work_id ?>" method="post" role="form">
              <div class="form-group mt-3">
                <textarea class="form-control" name="comment" rows="5" placeholder="Enter text" required></textarea>
              </div>
              <br>
              <div class="text-center"><button type="submit" name="upload_comment" class="btn btn-primary">Send Comment</button></div>
            </form>
          </div>
        </div>

      </div>
    </section>
    <!-- End Testimonials Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>Squadfree</h3>
              <p class="pb-3"><em>Qui repudiandae et eum dolores alias sed ea. Qui suscipit veniam excepturi quod.</em></p>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Squadfree</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    $(function() {
      $("#nice_button").on("click", function(event) {
        work_id = $('#work_id').val();
        count = $("#val").text();
        $.ajax({
          type: "POST",
          url: "work_action.php",
          data: {
            "work_id": work_id,
            "count": count
          },
          dataType: "text"
        }).done(function(data) {
          console.log(data);
          $("#val").val(data);
          $("#val").text(data);
        }).fail(function(XMLHttpRequest, textStatus, error) {
          alert(error);
        });
      });
    });
  </script>

</body>

</html>
