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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sweetalert2.min.css" rel="stylesheet">
    <title>รายการสินค้าสังฆภัณฑ์ ร้านมาลีวัณย์สังฆภัณฑ์</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12"> <br>
                <h3>รายการสินค้าสังฆภัณฑ์ ร้านมาลีวัณย์สังฆภัณฑ์</h3>
                <b>ถ้าจำนวนสินค้า เป็น
                    <b style="color: rgb(46, 205, 17);">สีเขียว</b> แสดงว่าสินค้ายังมีเพียงพอต่อความต้องการ |
                    <!-- <b style="color: rgb(70, 200, 255);">สีฟ้า</b> แสดงว่าสินค้ายังมีเยอะ -->
                    <b style="color: rgb(255, 221, 70);">สีเหลือง</b> แสดงว่าสินค้าใกล้จะหมด |
                    <b style="color: rgb(255, 70, 104);">สีแดง</b> แสดงว่าสินค้าหมดแล้ว
                </b>
            </div>
            <div class="align-self-end ml-auto pt-3">
                <a href="insert_product.php" class="btn btn-success">เพิ่มข้อมูลสินค้า</a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#stockModal">
                    Launch demo modal
                </button>
            </div>
            <div class="col-md-12 pt-2">
                <table class="table  table-hover table-responsive table-bordered">
                    <thead>
                        <tr class="table-dark">
                            <th width="7%" scope="col">รหัสสินค้า</th>
                            <th width="10%" scope="col">ภาพ</th>
                            <th width="50%" scope="col">ชื่อสินค้า</th>
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
                        $sql = "SELECT * FROM product";
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
                                <td><?= $result["Product_ID"]; ?></td>
                                <td align="center"><img src='img/<?= $result["Product_Name"]; ?>.jpg' width="80" height="auto"></td>
                                <td><?= $result["Product_Name"]; ?></td>
                                <td align="right"><?= number_format($result["Product_Price"], 2); ?></td>
                                <td align="center" class="<?= $tableClass; ?>">
                                    <?= $result["Product_Qty"]; ?>
                                    <br>
                                    <?= $txtTitle; ?>
                                </td>
                                <td>
                                    <a href="edit_product.php?Product_ID=<?= $result["Product_ID"]; ?>" class="btn btn-warning btn-sm">แก้ไข</a>
                                    <a data-id="<?= $result["Product_ID"]; ?>" href="?delete=<?= $result["Product_ID"]; ?>" class="btn btn-danger btn-sm delete-btn">ลบ</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="stockModal" tabindex="-1" aria-labelledby="stockModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="stockModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- auto-check-login -->
    <?php include("auto.php"); ?>

</body>

</html>

<script>
    $(".delete-btn").click(function(e) {
        var product_id = $(this).data('id');
        e.preventDefault();
        deleteConfirm(product_id);
    })

    function deleteConfirm(product_id) {
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
                            url: 'check_stock.php',
                            type: 'GET',
                            data: 'delete=' + product_id,
                        })
                        .done(function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'ลบสำเร็จ',
                                text: 'สำเร็จ',
                            }).then(() => {
                                document.location.href = 'check_stock.php';
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