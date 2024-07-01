<?php
include "connection.php";

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $sql = "DELETE FROM category WHERE Category_ID = $delete_id";
    $stmt = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $menu = "table_category";
    ?>
    <title>ตารางข้อมูลหมวดหมู่สินค้า | ร้านมาลีวัลย์สังฆภัณฑ์</title>
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
                            <h3>ตารางข้อมูลหมวดหมู่สินค้า</h3>
                            <p class="text-subtitle text-muted">หมวดหมู่สินค้าทั้งหมด</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">ตารางข้อมูลหมวดหมู่สินค้า</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="insert_category.php" class="btn btn-success me-md-1" role="button">เพิ่มข้อมูลหมวดหมู่สินค้า &nbsp;<i class="bi bi-bag-plus-fill"></i>
                                    <i class="trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th width="20%" scope="col">รหัสหมวดหมู่สินค้า</th>
                                        <th width="50%" scope="col">ชื่อหมวดหมู่สินค้า</th>
                                        <th width="30%" scope="col">จัดการข้อมูล</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //เรียกไฟล์เชื่อมต่อฐานข้อมูล
                                    require_once 'connection.php';

                                    //คิวรี่ข้อมูลมาแสดงในตาราง
                                    $sql = "SELECT * FROM category";
                                    $query = mysqli_query($conn, $sql);

                                    while ($result = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td align="center"><?= $result["Category_ID"]; ?></td>
                                            <td align="left"><?= $result["Category_Name"]; ?></td>
                                            <td>
                                                <a href="edit_category.php?Category_ID=<?= $result["Category_ID"]; ?>" class="btn btn-warning btn-sm">แก้ไข &nbsp;<i class="bi bi-pencil-square"></i></a>
                                                <a data-id="<?= $result["Category_ID"]; ?>" href="?delete=<?= $result["Category_ID"]; ?>" class="btn btn-danger btn-sm delete-btn">ลบ &nbsp;<i class="bi bi-trash"></i></a>
                                            </td>
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

    <!-- auto-check-login -->
    <?php include("auto.php"); ?>

    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
</body>

</html>

<script>
    $(".delete-btn").click(function(e) {
        var category_id = $(this).data('id');
        e.preventDefault();
        deleteConfirm(category_id);
    })

    function deleteConfirm(category_id) {
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
                            url: 'table_category.php',
                            type: 'GET',
                            data: 'delete=' + category_id,
                        })
                        .done(function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'ลบสำเร็จ',
                                text: 'สำเร็จ',
                            }).then(() => {
                                document.location.href = 'table_category.php';
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