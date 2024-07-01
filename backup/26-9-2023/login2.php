<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet"/>

</head>
<body>
    <main class="main-content mt-0">
    <section class="min-vh-80 mb-2">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('assets/img/curved-images/1.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 text-center mx-auto">
              <h1 class="text-white mb-2 mt-5">Welcome!</h1>
              <h4 class="text-lead text-white">ระบบคลังสินค้าสังฆภัณฑ์ ร้านมาลีวัณย์สังฆภัณฑ์</้>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
              <div class="card-header text-center pt-4">
                <h5>เข้าสู่ระบบ โดย</h5>
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
                  <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Username" aria-label="Name" aria-describedby="email-addon"
                    id="username" name="username" autofocus>
                  </div>
                  <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon"
                    id="password" name="password">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="login" class="btn bg-gradient-dark w-100 my-4 mb-2">เข้าสู่ระบบ</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <footer class="footer py-5">
      <div class="container">
        <div class="row">
          <div class="col-8 mx-auto text-center mt-1">
            <p class="mb-0 text-secondary">
              Copyright © <script>
                document.write(new Date().getFullYear())
              </script> <a href="#" target="_blank" class="footer-link fw-bolder">
                นิสิตคณะวิทยาศาสตร์ สาขาเทคโนโลยีสารสนเทศ SCI TSU🌻</a>
            </p>
          </div>
        </div>
      </div>
    </footer>
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  </main>
  <script src="assets/js/sweetalert2.all.min.js"></script>
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
            $query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
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
                              window.location = 'Samo_Admin/dashboard.php';
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