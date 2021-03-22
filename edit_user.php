<?php
session_start();
include 'user_action.php';
$user_info = $user_obj->get_user($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Inner Page - Squadfree Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

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
          <input type="search" class="form-control" name="saerch" id="" aria-describedby="helpId" placeholder="Serach">
        </form>
      </div>

      <!-- <form action="" method="POST">
                <input type="search" class="form-control" name="saerch" id="" aria-describedby="helpId" placeholder="">
                <button type="submit"><i class="fas fa-search"></i></button>
              </form> -->


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
          <h2>Profile Edit Page</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li><a href="mypage.php">MyPage</a></li>
            <li>Profile Edit Page</li>
          </ol>
        </div>
      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="member-page">
      <div class="container">
        <div class="page-header">
          <h1 class="page-title">Profile Edit</h1>
        </div>
        <div style="margin: 0 -15px 40px -15px"></div>
        <form method="POST" action="user_action.php">
          <div class="mb-4 form-group mx-auto" style="width: 500px;">
            <input type="id" name="id" class="form-control" id="user_id" hidden value="<?php echo $user_info[0]["user_id"] ?>">
            <label for="InputName">User Name</label>
            <input type="name" name="name" class="form-control" id="user_name" placeholder="Enter Your Name" value="<?php echo $user_info[0]["user_name"] ?>">
          </div>
          <div class="mb-4 form-group mx-auto" style="width: 500px;">
            <label for="Inputprofile">User Profile</label>
            <textarea type="profile" class="form-control" name="profile" id="user_profile" cols="50" rows="5" placeholder="Enter Your Profile"><?php echo $user_info[0]["user_profile"] ?></textarea>
          </div>
          <div class="mb-4 form-group mx-auto" style="width: 500px;">
            <label for="InputEmail">Email address</label>
            <input type="email" name="email" class="form-control" id="mail_address" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $user_info[0]["mail_address"] ?>">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="mb-4 form-group mx-auto" style="width: 500px;">
            <button type="button" id="edit_button" name="edit_user" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">Save</button>
          </div>
        </form>
      </div>
    </section>


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

</body>
<script>
  $(function() {
    $("#edit_button").on("click", function(event) {
      id = $('#user_id').val();
      user_name = $('#user_name').val();
      user_profile = $('#user_profile').val();
      mail_address = $('#mail_address').val();
      console.log(user_name, user_profile, mail_address);
      $.ajax({
        type: "POST",
        url: "user_action.php",
        data: {
          "edit_user": true,
          "user_name": user_name,
          "user_profile": user_profile,
          "mail_address": mail_address,
          "id": id
        },
        dataType: "text"
      }).done(function(data) {
        console.log(data);
        if (data) {
          alert('edit successfull!');
        } else {
          alert('edit failed...');
        }
      }).fail(function(XMLHttpRequest, textStatus, error) {
        alert(error);
      });
    });
  });
</script>

</html>
