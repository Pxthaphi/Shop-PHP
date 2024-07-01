<!DOCTYPE html>
<html lang="en">

<head>
  <title>แก้ไขข้อมูลหมวดหมู่สินค้า | ร้านมาลีวัลย์สังฆภัณฑ์</title>
  <?php include("head_style.php"); ?>
  <link rel="stylesheet" href="assets/vendors/toastify/toastify.css">
  <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
  <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
</head>

<body>
  <div id="app">
    <!-- side bars -->
    <?php include("sidebar.php"); ?>

    <div id="main">
      <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
          <i class="bi bi-justify fs-3"></i>
        </a>
      </header>

      <div class="page-heading">
        <div class="page-title">
          <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>แก้ไขข้อมูลหมวดหมู่สินค้า</h3>
              <p class="text-subtitle text-muted">แก้ไขข้อมูลหมวดหมู่สินค้าของคุณ</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
              <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="table_stock.php">ตารางข้อมูลสินค้า</a></li>
                  <li class="breadcrumb-item active" aria-current="page">แก้ไขข้อมูลหมวดหมู่สินค้า</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>

        <!-- Basic Horizontal form layout section start -->
        <section id="multiple-column-form">
          <div class="row match-height">
            <div class="col-12">
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                      <?php
                      $cate_ID = null;
                      if (isset($_GET["Category_ID"])) {
                        $cate_ID = $_GET["Category_ID"];
                      }

                      include_once "connection.php";
                      mysqli_set_charset($conn, "utf8");
                      $sql = "SELECT * FROM `category` WHERE Category_ID = $cate_ID";
                      $query = mysqli_query($conn, $sql);
                      $result = mysqli_fetch_array($query);
                      ?>
                      <input type="hidden" class="form-control" name="Category_ID" value="<?= $result['Category_ID']; ?>""/>
                      <div class=" row mb-4">
                      <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">ชื่อหมวดหมู่สินค้า</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="Category_Name" placeholder="กรุณาใส่ชื่อหมวดหมู่สินค้า" aria-label="กรุณาใส่ชื่อหมวดหมู่สินค้า" aria-describedby="basic-icon-default-fullname2" required />
                      </div>
                  </div>

                  <div class="row justify-content-end">
                    <div class="col-sm-10">
                      <button type="submit" name="update_category" value="Upload" class="btn btn-primary">บันทึก</button>
                      <a href="table_category.php" class="btn btn-danger">ย้อนกลับ</a>
                    </div>
                  </div>
                  </form>
                  <script>
                    var loadFile = function(event) {
                      var output = document.getElementById('output');
                      output.src = URL.createObjectURL(event.target.files[0]);
                      output.onload = function() {
                        URL.revokeObjectURL(output.src) // free memory
                      }
                    };
                  </script>
                </div>
              </div>
            </div>
          </div>
      </div>
      <!-- script -->
      <?php include("script.php"); ?>
      <!-- auto-check-login -->
      <?php include("auto.php"); ?>
</body>

</html>

<?php
include 'connection.php';

if (isset($_POST['update_category'])) {

  $sql = "UPDATE category SET
    Category_Name = '" . $_POST["Category_Name"] . "'
    WHERE Category_ID = '" . $_POST["Category_ID"] . "' ";
  $res = mysqli_query($conn, $Sql);
  if ($res) {
?>
    <script>
      Swal.fire({
        icon: 'success',
        title: "เพิ่มข้อมูลสำเร็จ!!",
        text: "โปรดรอสักครู่",
        timer: 2000,
        showConfirmButton: false
      }).then(() => {
        document.location.href = 'table_category.php';
      });
    </script>
  <?php
  } else {
  ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'ไม่สามารถเพิ่มข้อมูลได้ โปรดลองใหม่อีกครั้งนึง',
      });
    </script>
<?php
  }
  mysqli_close($conn);
}
?>