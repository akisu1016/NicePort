<?php
session_start();
include 'work_action.php';
include 'user_action.php';

$user_info = $user_obj->get_user($_SESSION['user_id']);
$works_list = $work_obj->display_users_works($_SESSION['user_id']);
// echo "<pre>";
// print_r($user_info);
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

<style>
  article {
    display: flex;
    margin-bottom: 20px;
    padding: 20px;
    border-radius: 5px;
    box-sizing: border-box;
    box-shadow: 0 0 5px #999;
  }

  article figure {
    width: 100px;
    height: 100px;
  }

  article figure img {
    min-width: 100px;
    max-width: 100%;
    vertical-align: top;
  }

  .user_image {
    min-width: 50px;
    max-width: 40%;
    vertical-align: top;
  }

  .profile-info {
    padding: 30px;
    text-align: center;
    box-shadow: 0px 0 30px rgba(47, 77, 90, 0.08);
  }

  .profile-info h3 {
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid #eee;
  }

  .profile-info ul {
    list-style: none;
    padding: 0;
    font-size: 20px;
  }

  .profile-info ul li+li {
    margin-top: 10px;
  }
</style>

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
          <h2>MyPage</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Mypage</a></li>
          </ol>
        </div>

      </div>
    </section><!-- Breadcrumbs Section -->

    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4">
            <div class="section-title ">
              <h2>Profile</h2>
            </div>
            <div class="profile-info">
              <h3>Information</h3>
              <ul>
                <li>
                  <?php if (isset($user_info[0]['user_icon']) and !empty($user_info[0]['user_icon'])) {
                    $src = $user_info[0]['user_icon'];
                  } else {
                    $src = "assets/img/testimonials/nouser.png";
                  }
                  echo "<img src='$src' class='user_image' alt=''>";
                  ?>

                </li>
                <li><strong>@<?php echo $user_info[0]["user_name"] ?></strong></li>
                <li>
                  <p><?php echo $user_info[0]["user_profile"] ?></p>
                </li>
                <!-- <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li> -->
              </ul>
              <a class="btn-secondary btn-sm" href="edit_user.php" role="button">Edit Profile</a>
            </div>
          </div>

          <div class="col-lg-8">
            <div class="section-title">
              <h2>Leviews lists</h2>
            </div>
            <?php if ($works_list !== FALSE) : ?>
              <?php foreach ($works_list as $row) : ?>
                <article id="article">
                  <input type="hidden" id="work_id" value="<?php echo $row['work_id'] ?>">
                  <figure>
                    <?php if (isset($row['picture_url'])) {
                      $src = $row['picture_url'];
                    } else {
                      $src = "images/no_image_square.jpg";
                    }
                    echo "<img src=$src alt='thumbnail'>";
                    ?>
                  </figure>
                  <div class="container">
                    <div class="row text_content">
                      <p class="text_date"><time datetime="<?php echo $row['added_date'] ?>"><?php echo $row['added_date'] ?></time></p>
                      <div class="col-sm-11">
                        <h2><a href="work_detail_edit.php?work_id=<?php echo $row['work_id'] ?>"><?php echo $row['work_title'] ?></a></h2>
                      </div>
                      <div class="col-sm-1">
                        <button type="button" id="delete" class="btn btn-secondary rounded-circle p-0" style="width:2rem;height:2rem;">ー</button>
                      </div>
                      <p class="text_excerpt"><?php echo $row['detail'] ?></p>
                    </div>
                  </div>
                </article>
              <?php endforeach ?>
            <?php else : ?>
              <div class="container">
                <div class="row　mx-auto">
                  <h1 class="text-center">Leviews not exists</h1>
                </div>
              </div>
            <?php endif; ?>
          </div>

        </div>
      </div>
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
  <script>
    $(function() {
      $(document).on("click", "#delete", function(e) {
        // console.log($(this).parents("#article").children("#work_id").val());
        if (!confirm('Do you want to delete this post?')) {
          return false;
        } else {
          $work_id = $(this).parents("#article").children("#work_id").val();
          $(this).parents("#article").fadeOut(200).queue(function() {
            this.remove();
          });
          $.ajax({
            type: "POST",
            url: "work_action.php",
            data: {
              "work_id": $work_id,
              "delete_work": true
            },
            dataType: "text"
          }).done(function(data) {}).fail(function(XMLHttpRequest, textStatus, error) {
            alert(error);
          });
        }

      });
    });
  </script>

</body>

</html>
