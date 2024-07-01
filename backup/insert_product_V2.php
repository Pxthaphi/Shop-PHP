
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stock</title>
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
                                            <input
                                              type="text"
                                              class="form-control"
                                              name="Product_Name"
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
                                              placeholder="กรุณาใส่จำนวนสินค้า"
                                              aria-label="กรุณาใส่จำนวนสินค้า"
                                              aria-describedby="basic-icon-default-fullname2"
                                              required
                                            />
                                        </div>
                                      </div>
                                      <div class="row mb-4">
                                        <label class="col-sm-2 col-form-label" for="upload_picture">รูปภาพสินค้า</label>
                                            <div class="col-sm-10">
                                              <font color="red">*อัพโหลดได้เฉพาะไฟล์สกุล .jpg / .png</font>
                                              <!-- File uploader with image preview -->
                                              <input type="file" name="uploaded_file" class="image-preview-filepond">
                                          </div>
                                      </div>
                                      <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                          <button type="submit" name="insert_product" class="btn btn-success">บันทึก</button>
                                          <a href="check_stock.php" class="btn btn-danger">ย้อนกลับ</a>
                                      </div>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
              </div>
        <!-- footer -->
        <?php include("footer.php"); ?>

            <!-- filepond validation -->
        <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
        <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

        <!-- image editor -->
        <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

        <!-- toastify -->
        <script src="assets/vendors/toastify/toastify.js"></script>

        <!-- filepond -->
        <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
        <script>
            // register desired plugins...
          FilePond.registerPlugin(
                // validates the size of the file...
                FilePondPluginFileValidateSize,
                // validates the file type...
                FilePondPluginFileValidateType,

                // preview the image file type...
                FilePondPluginImagePreview,
            );

            // Filepond: Image Preview
            FilePond.create( document.querySelector('.image-preview-filepond'), { 
                allowImagePreview: true, 
                allowImageFilter: false,
                allowImageExifOrientation: false,
                allowImageCrop: false,
                acceptedFileTypes: ['image/png','image/jpg','image/jpeg'],
                fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                    // Do custom type detection here and return with promise
                    resolve(type);
                })
            });
    </script>
    <!-- script -->
    <?php include("script.php"); ?>

</body>
</html>

<?php
include 'connection.php';

if (isset($_POST['insert_product'])) {
    // Get product information from the form
    $product_name = $_POST['Product_Name'];
    $product_price = $_POST['Product_Price'];
    $product_qty = $_POST['Product_Qty'];

    // Check if a file has been uploaded via FilePond
    if (isset($_FILES['uploaded_file'])) {
        $file_name = $_FILES['uploaded_file']['name'];
        $file_tmp = $_FILES['uploaded_file']['tmp_name'];
        $file_type = $_FILES['uploaded_file']['type'];

        // Define the directory where you want to save the uploaded images
        $upload_directory = "assets/img/";

        // Check if the uploaded file is an image (jpg, jpeg, or png)
        $allowed_extensions = array('jpg', 'jpeg', 'png');
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (in_array($file_extension, $allowed_extensions)) {
            // Generate a unique filename for the uploaded image using a combination of the product name and a timestamp
            $new_file_name = $product_name . '.' . $file_extension;
            $upload_path = $upload_directory . $new_file_name;

            // Move the uploaded file to the specified directory
            if (move_uploaded_file($file_tmp, $upload_path)) {
                // Image upload was successful

                // You can display a success message using SweetAlert within JavaScript
                echo "<script>
                        const successMessage = 'Image uploaded successfully.';
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: successMessage,
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = 'table_stock.php';
                        });
                      </script>";
            } else {
                // Failed to move the uploaded file

                // Display an error message using SweetAlert within JavaScript
                echo "<script>
                        const errorMessage = 'Failed to upload the image. Please try again.';
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: errorMessage,
                        });
                      </script>";
            }
        } else {
            // Invalid file type

            // Display an error message using SweetAlert within JavaScript
            echo "<script>
                    const errorMessage = 'Invalid file type. Allowed extensions are jpg, jpeg, and png.';
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: errorMessage,
                    });
                  </script>";
        }
    } else {
        // No file was uploaded

        // Display an error message using SweetAlert within JavaScript
        echo "<script>
                const errorMessage = 'No file was uploaded.';
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: errorMessage,
                });
              </script>";
    }
}
?>
