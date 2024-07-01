<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sweetalert2.min.css" rel="stylesheet">
</head>
<body>
    <!-- Content wrapper -->
    <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">ตารางข้อมูลสินค้า/</span> แก้ไขข้อมูล</h4>
                
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h3 class="mb-0">แก้ไขข้อมูลสินค้า</h3>
                    </div>
                    <div class="card-body">
                      <form method="POST" enctype="multipart/form-data">
                      <?php
                            $P_ID = null;
                            if(isset($_GET["Product_ID"]))
                            {
                            $P_ID = $_GET["Product_ID"];
                            }
                            
                            include_once "connection.php";
                            mysqli_set_charset($conn, "utf8");
                            $sql = "SELECT * FROM `product` WHERE Product_ID = $P_ID";
                            $query = mysqli_query($conn,$sql);
                            $result = mysqli_fetch_array($query);
                        ?>
                        <input type="hidden" class="form-control" name="Product_ID" value="<?= $result['Product_ID']; ?>""/>
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
                              <input
                                type="text"
                                class="form-control"
                                name="Product_Name"
                                value="<?= $result['Product_Name']; ?>"
                                placeholder="กรุณาใส่ชื่อสินค้า"
                                aria-label="กรุณาใส่ชื่อสินค้า"
                                aria-describedby="basic-icon-default-fullname2"
                                required
                              />
                          </div>
                        </div>
                        <div class="row mb-4">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">ราคาสินค้า</label>
                          <div class="col-sm-10">
                              <input
                                type="text"
                                class="form-control"
                                name="Product_Price"
                                value="<?= $result['Product_Price']; ?>"
                                placeholder="กรุณาใส่ราคาสินค้า"
                                aria-label="กรุณาใส่ราคาสินค้า"
                                aria-describedby="basic-icon-default-fullname2"
                                required
                              />
                          </div>
                        </div>
                        <div class="row mb-4">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">จำนวนสินค้า</label>
                          <div class="col-sm-10">
                              <input
                                type="text"
                                class="form-control"
                                name="Product_Qty"
                                value="<?= $result['Product_Qty']; ?>"
                                placeholder="กรุณาใส่จำนวนสินค้า"
                                aria-label="กรุณาใส่จำนวนสินค้า"
                                aria-describedby="basic-icon-default-fullname2"
                                required
                              />
                          </div>
                        </div>
                        <div class="row mb-4">
                          <label class="col-sm-2 col-form-label" for="upload_picture">อัพโหลดไฟล์</label>
                          <div class="col-sm-10">
                            <font color="red">*อัพโหลดได้เฉพาะไฟล์สกุล.jpg</font>
                            <input type="file" name="edit_uploaded" class="form-control" 
                            accept="image/jpeg" onchange="loadFile(event)">
                          </div>
                        </div>
                        <div class="row mb-4">
                          <label class="col-sm-2 col-form-label" for="upload_picture">Before</label>
                          <div class="col-sm-10">
                            <p><img src='img/<?= $result['Product_Name'] ?>.jpg' width="120" height="auto"></p>
                          </div>

                          <label class="col-sm-2 col-form-label" for="upload_picture">After</label>
                          <div class="col-sm-10">
                            <p><img id="output" width="120" height="auto"/></p>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" name="update_product" value="Upload" class="btn btn-primary">บันทึก</button>
                            <a href="check_stock.php"  class="btn btn-danger">ย้อนกลับ</a>
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
          <script src="js/bootstrap.bundle.min.js"></script>
          <script src="js/jquery-3.6.0.js"></script>
          <script src="js/sweetalert2.all.min.js"></script>
</body>
</html>

<?php
include 'connection.php';

if(!empty($_FILES['uploaded_file']))
{
  //ดึงตัวแปรชื่อมาตั้งชื่อไฟล์//
  $product_name = $_POST['Product_Name'];

  $name =  $_FILES['uploaded_file']['name'];
  $tmp_name =  $_FILES['uploaded_file']['tmp_name'];
  $locate_img ="img/";

  if(strlen($name)){
    //ลบชื่อไฟล์ ให้เหลือแค่สกุลไฟล์//
    list($txt, $ext) = explode(".", $name);
    //ตั้งชื่อไฟล์ใหม่ ด้วยชื่อที่ดึงมาจากตัวแปร//
    $new_file_name = $product_name.".".$ext;
    //Save ไฟล์ลงแฟ้มข้อมูล//
    move_uploaded_file($tmp_name,$locate_img.$new_file_name);
    }
}

if(isset($_POST['update_product'])){
  $P_ID = $_POST['Product_ID'];

  $sql = "UPDATE product SET
  Product_Name = '".$_POST["Product_Name"]."' ,
  Product_Price = '".$_POST["Product_Price"]."' ,
  Product_Qty = '".$_POST["Product_Qty"]."'
  WHERE Product_ID = $P_ID";
  $query_run = mysqli_query($conn,$sql);
  
  if($query_run){
    ?>
    <script>
    Swal.fire({
      icon: 'success',
      title: "แก้ไขข้อมูลสำเร็จ!!",
      text: "โปรดรอสักครู่",
      timer: 2000,
      showConfirmButton: false
      }).then(() => {
          document.location.href = 'check_stock.php';
      });
    </script>
    <?php
  }
  else{
    ?>
    <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'ไม่สามารถแก้ไขข้อมูลได้ โปรดลองใหม่อีกครั้งนึง',
    });
    </script>
    <?php
  }
}
?>