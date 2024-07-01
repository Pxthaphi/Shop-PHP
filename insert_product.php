<?php include_once "connection.php";
mysqli_set_charset($conn, "utf8");
$sql = "SELECT * FROM category";
$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>เพิ่มข้อมูลสินค้า | ร้านมาลีวัลย์สังฆภัณฑ์</title>
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
              <h3>เพิ่มข้อมูลสินค้า</h3>
              <p class="text-subtitle text-muted">เพิ่มข้อมูลสินค้าของคุณ</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
              <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="table_stock.php">ตารางข้อมูลสินค้า</a></li>
                  <li class="breadcrumb-item active" aria-current="page">เพิ่มข้อมูลสินค้า</li>
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

                      <!-- <div class="row mb-4">
                                        <label class="col-sm-2 col-form-label" for="ProductID">รหัสสินค้า</label>
                                        <div class="col-sm-3">
                                            <input
                                              type="text"
                                              class="form-control"
                                              name="Product_ID"
                                              placeholder="xxxxxxxxx"
                                              aria-label="xxxxxxxxx"
                                              aria-describedby="ProductID"
                                              required 
                                            />
                                        </div>
                                      </div> -->
                      <div class="row mb-4">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">ชื่อสินค้า</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="Product_Name" placeholder="กรุณาใส่ชื่อสินค้า" aria-label="กรุณาใส่ชื่อสินค้า" aria-describedby="basic-icon-default-fullname2" required />
                        </div>
                      </div>
                      <div class="row mb-4">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">หมวดหมู่สินค้า</label>
                        <div class="col-sm-10">
                          <select class="form-select" name="Product_Category" required>
                            <option value=""><-- โปรดเลือกหมวดหมู่สินค้า --></option>
                            <?php
                            while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                            ?>
                              <option value="<?php echo $result["Category_ID"]; ?>"><?php echo $result["Category_Name"] ?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">ราคาสินค้า</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="Product_Price" placeholder="กรุณาใส่ราคาสินค้า" aria-label="กรุณาใส่ราคาสินค้า" aria-describedby="basic-icon-default-fullname2" required />
                        </div>
                      </div>
                      <div class="row mb-4">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">จำนวนสินค้า</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="Product_Qty" placeholder="กรุณาใส่จำนวนสินค้า" aria-label="กรุณาใส่จำนวนสินค้า" aria-describedby="basic-icon-default-fullname2" required />
                        </div>
                      </div>
                      <div class="row mb-4">
                        <label class="col-sm-2 col-form-label" for="upload_picture">รูปภาพสินค้า</label>
                        <div class="col-sm-10">
                          <font color="red">*อัพโหลดได้เฉพาะไฟล์สกุล .jpg / .png</font>
                          <input type="file" name="uploaded_file" class="form-control" accept="image/jpeg" onchange="loadFile(event)">
                          <p class="pt-4"><img id="output" width="300" height="auto" /></p>
                        </div>
                      </div>
                      <div class="row justify-content-end">
                        <div class="col-sm-10">
                          <button type="submit" name="insert_product" value="Upload" class="btn btn-primary">บันทึก</button>
                          <a href="table_stock.php" class="btn btn-danger">ย้อนกลับ</a>
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

if (!empty($_FILES['uploaded_file'])) {
  //ดึงตัวแปรชื่อมาตั้งชื่อไฟล์//
  $product_name = $_POST['Product_Name'];

  $name =  $_FILES['uploaded_file']['name'];
  $tmp_name =  $_FILES['uploaded_file']['tmp_name'];
  $locate_img = "assets/img/";

  if (strlen($name)) {
    //ลบชื่อไฟล์ ให้เหลือแค่สกุลไฟล์//
    list($txt, $ext) = explode(".", $name);
    //ตั้งชื่อไฟล์ใหม่ ด้วยชื่อที่ดึงมาจากตัวแปร//
    $new_file_name = $product_name . "." . $ext;
    //Save ไฟล์ลงแฟ้มข้อมูล//
    move_uploaded_file($tmp_name, $locate_img . $new_file_name);
  }
}

if (isset($_POST['insert_product'])) {

  $product_name = $_POST['Product_Name'];
  $product_category = $_POST['Product_Category'];
  $product_price = $_POST['Product_Price'];
  $product_qty = $_POST['Product_Qty'];

  $Sql = "INSERT INTO `product`(`Product_Name`, `Product_Category`, `Product_Price`, `Product_Qty`) VALUES 
    ('$product_name', $product_category,'$product_price','$product_qty')";
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
        document.location.href = 'table_stock.php';
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