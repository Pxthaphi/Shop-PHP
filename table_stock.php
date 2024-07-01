<?php
include "connection.php";

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $sql = "DELETE FROM product WHERE Product_ID = $delete_id";
    $stmt = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $menu = "table_stock";
    ?>
    <title>ตารางข้อมูลสินค้า | ร้านมาลีวัลย์สังฆภัณฑ์</title>
    <?php include("head_style.php"); ?>
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
                            <h3>ตารางข้อมูลสินค้า</h3>
                            <p class="text-subtitle text-muted">ใช้สำหรับเพิ่ม-ลบและเช็คข้อมูลสินค้า</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">ตารางข้อมูลสินค้า</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="insert_product.php" class="btn btn-success me-md-1" role="button">เพิ่มข้อมูลสินค้า &nbsp;<i class="bi bi-bag-plus-fill"></i>
                                    <i class="trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th width=" 10%" scope="col">รหัสสินค้า</th>
                                        <th width="10%" scope="col">ภาพ</th>
                                        <th width="35%" scope="col">ชื่อสินค้า</th>
                                        <th width="10%" scope="col">หมวดหมู่สินค้า</th>
                                        <th width="10%" scope="col" class="text-center">ราคา</th>
                                        <th width="10%" scope="col" class="text-center">จำนวนสินค้า</th>
                                        <th scope="col">จัดการข้อมูล</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //เรียกไฟล์เชื่อมต่อฐานข้อมูล
                                    require_once 'connection.php';

                                    //คิวรี่ข้อมูลมาแสดงในตาราง
                                    $sql = "SELECT * FROM product , category WHERE product.Product_Category = category.Category_ID";
                                    $query = mysqli_query($conn, $sql);

                                    while ($result = mysqli_fetch_array($query)) {
                                        //สร้างเงื่อนไขตรวจสอบจำนวนคงเหลือในสต๊อกสินค้า
                                        if ($result["Product_Qty"] == 0) {
                                            //สินค้าหมด
                                            $tableClass = "table-danger";
                                            $txtTitle = "<font color='red'> สินค้าหมด !! </font>";
                                        } elseif ($result["Product_Qty"] <= 5) {
                                            //สินค้ากำลังจะหมด
                                            $tableClass = "table-warning";
                                            $txtTitle = "<font color='orange'> สินค้าใกล้หมด !! </font>";
                                        } else {
                                            //เหลือ > 10 ชิ้น
                                            $tableClass = "table-success";
                                            $txtTitle = "";
                                        }
                                    ?>
                                        <tr>
                                            <td align="center"><?= $result["Product_ID"]; ?></td>
                                            <td align="center">
                                                <a onclick="checkStock(<?= $result["Product_Qty"]; ?>)">
                                                    <img src='assets/img/<?= $result["Product_Name"]; ?>.jpg' width="80" height="auto">
                                                </a>
                                            </td>
                                            <td align="left"><?= $result["Product_Name"]; ?></td>
                                            <td align="left"><?= $result["Category_Name"]; ?></td>
                                            <td align="right"><?= number_format($result["Product_Price"], 2); ?></td>
                                            <td align="center" class="<?= $tableClass; ?>">
                                                <?= $result["Product_Qty"]; ?>
                                                <br>
                                                <?= $txtTitle; ?>
                                            </td>
                                            <form method="POST">
                                                <td>
                                                    <a href="edit_product.php?Product_ID=<?= $result["Product_ID"]; ?>" class="btn btn-warning btn-sm">แก้ไข &nbsp;<i class="bi bi-pencil-square"></i></a>
                                                    <a data-id="<?= $result["Product_ID"]; ?>" href="?delete=<?= $result["Product_ID"]; ?>" class="btn btn-danger btn-sm delete-btn">ลบ &nbsp;<i class="bi bi-trash"></i></a>
                                                </td>
                                            </form>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
            <!-- footer -->
            <?php include("footer.php"); ?>

        </div>
    </div>

    <!-- script -->
    <?php include("script.php"); ?>
    
    <script>
        function checkStock(productQty) {
            if (productQty === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'สินค้าหมด!',
                    text: 'โปรดเติมสินค้าในสต๊อก!!',
                    confirmButtonColor: "#435ebe",
                    confirmButtonText: "ตกลง",
                });
            } else if (productQty <= 5) {
                Swal.fire({
                    icon: 'warning',
                    title: 'สินค้าใกล้หมด!',
                    text: 'กรุณาเติมสต๊อกสินค้าให้เพียงพอต่อการซื้อของลูกค้า',
                    confirmButtonColor: "#435ebe",
                    confirmButtonText: "ตกลง",
                });
            } else if (productQty > 5) {
                Swal.fire({
                    icon: 'success',
                    title: 'สินค้ามีเพียงพอ!',
                    text: 'สินค้าในสต๊อกยังมีเพียงพอสำหรับการขาย',
                    confirmButtonColor: "#435ebe",
                    confirmButtonText: "ตกลง",
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'ข้อผิดพลาด!',
                    text: 'ไม่สามารถตรวจสอบสินค้าในสต๊อกได้',
                    confirmButtonColor: "#435ebe",
                    confirmButtonText: "ตกลง",
                });
            }
        }
    </script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <!-- auto-check-login -->
    <?php include("auto.php"); ?>
</body>

</html>

<script>
    $(".delete-btn").click(function(e) {
        var productid = $(this).data('id');
        e.preventDefault();
        deleteConfirm(productid);
    })

    function deleteConfirm(productid) {
        Swal.fire({
            title: 'แน่ใจใช่มั้ย ?',
            text: "หากลบ จะไม่สามารถกู้ข้อมูลกลับมาได้อีก!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4CBB17',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ตกลง',
            cancelButtonText: 'ยกเลิก',
            showLoaderOnConfirm: true,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                            url: 'table_stock.php',
                            type: 'GET',
                            data: 'delete=' + productid,
                        })
                        .done(function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'ลบสำเร็จ',
                                text: 'สำเร็จ',
                            }).then(() => {
                                document.location.href = 'table_stock.php';
                            })
                        })
                        .fail(function() {
                            Swal.fire('ผิดพลาด', 'โปรดลองอีกครั้ง', 'error')
                            window.location.reload();
                        });
                });
            },
        });
    }
</script>