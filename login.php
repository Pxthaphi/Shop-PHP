<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    เข้าสู่ระบบ | ร้านมาลีวัลย์สังฆภัณฑ์
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
          <div class="container-fluid pe-0">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-primary" href="index.php">
              ร้านมาลีวัลย์สังฆภัณฑ์
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="index.php">
                    <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                    Dashboard
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="#">
                    <i class="fa fa-user opacity-6 text-dark me-1"></i>
                    Profile
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="#">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    Sign Up
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="login.php">
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    Sign In
                  </a>
                </li>
              </ul>
              <li class="nav-item d-flex align-items-center">
                <a class="btn btn-sm btn-round mb-0 me-1 bg-gradient-dark" target="_blank" href="https://maps.app.goo.gl/Yp9xPE3Ht6fgmuzR7">ที่อยู่ร้าน</a>
              </li>
              <ul class="navbar-nav d-lg-block d-none">
                <li class="nav-item">
                  <a href="https://www.facebook.com" target="_blank" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-info">Facebook</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h1 class="font-weight-bolder text-info text-gradient">ยินดีต้อนรับ</h1>
                  <h5 class="mb-0">ร้านมาลีวัลย์สังฆภัณฑ์</้>
                </div>
                <div class="card-body">
                  <form method="post">
                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="error">
                            <h3>
                                <?php 
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                                ?>
                            </h3>
                        </div>
                    <?php endif ?>
                    
                    <label>ชื่อผู้ใช้</label>
                    <div class="mb-3">
                      <input type="text" name="username" class="form-control" placeholder="ชื่อผู้ใช้">
                    </div>
                    <label>รหัสผ่าน</label>
                    <div class="mb-3">
                      <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                    </div>
                    <div class="text-center">
                      <button type="submit" name="login" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('assets/images/bg/bg.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
          <div class="col-8 mx-auto text-center mt-1 pt-5">
            <p class="mb-0 text-secondary">
              Copyright © <script>
                document.write(new Date().getFullYear())
              </script> <a href="https://www.facebook.com/csit.tsu" target="_blank" class="footer-link fw-bolder">
                นิสิตคณะวิทยาศาสตร์ สาขาเทคโนโลยีสารสนเทศ SCI TSU🌻</a>
            </p>
          </div>
        </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <!-- script -->
  <?php include("script.php"); ?>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>

<?php 
    session_start();
    include('connection.php');

    $errors = array();

    if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $user_type = $_POST['user_type'];

        if (empty($username) || empty($password)) {
            array_push($errors, "Username and password are required");
        } else {
            $password = $password;
            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "Logged in successfully";
                $row = mysqli_fetch_array($result);

                  if($row['user_type'] == 'admin'){

                    $_SESSION['admin_name'] = $row['username'];
                    $_SESSION['u_type'] = $row['user_type'];
                    ?>
                      <script>
                          Swal.fire({
                              icon: 'success',
                              title: "เข้าสู่ระบบสำเร็จ",
                              text: "โปรดรอสักครู่",
                              timer: 2000,
                              showConfirmButton: false
                          }).then(function() {
                              window.location = 'dashboard.php';
                          });
                      </script>
                      <?php
          
                }elseif($row['user_type'] == 'user'){
          
                    $_SESSION['user_name'] = $row['username'];
                    $_SESSION['u_type'] = $row['user_type'];
                    ?>
                      <script>
                          Swal.fire({
                              icon: 'success',
                              title: "เข้าสู่ระบบสำเร็จ",
                              text: "โปรดรอสักครู่",
                              timer: 2000,
                              showConfirmButton: false
                          }).then(function() {
                              window.location = 'dashboard.php';
                          });
                      </script>
                      <?php
                }
            } else {
                array_push($errors, "ไม่สามารถเข้าสู่ระบบได้ โปรดลองใหม่อีกครั้งนึง");
            }
        }
        
        if (count($errors) > 0) {
            ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '<?php echo implode("<br>", $errors); ?>',
                });
            </script>
            <?php
        }
    }
?>