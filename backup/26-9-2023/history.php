<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $menu = "history";
    ?>
    <title>Stock</title>
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
                            <h3>รายการตัดสต๊อกและเพิ่มสต๊อกสินค้า</h3>
                            <p class="text-subtitle text-muted">เช็ครายการตัดและเพิ่มสต๊อกของสินค้า</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">รายการตัดสต๊อกและเพิ่มสต๊อกสินค้า</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>History ID</th>
                                        <th>Product ID</th>
                                        <th>Product picture</th>
                                        <th>Product Name</th>
                                        <th>Product Quantity</th>
                                        <th>Date</th>
                                        <th>User</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //เรียกไฟล์เชื่อมต่อฐานข้อมูล
                                    require_once 'connection.php';

                                    //คิวรี่ข้อมูลมาแสดงในตาราง
                                    $sql = "SELECT hr.History_ID, p.Product_ID, p.Product_Name, hr.Product_Count, h.Date, h.Username, h.Action_Type
                                    FROM history_product_relation hr
                                    JOIN history h ON hr.History_ID = h.History_ID
                                    JOIN product p ON hr.Pro_ID = p.Product_ID
                                    GROUP BY hr.History_ID, p.Product_ID, p.Product_Name, hr.Product_Count, h.Date, h.Username, h.Action_Type
                                    ORDER BY h.Date DESC
                                    ";

                                    // $sql = "SELECT * FROM product, history , history_product_relation WHERE product.Product_ID = history.Product_ID ORDER BY history.Date DESC";
                                    $query = mysqli_query($conn, $sql);
                                    while ($result = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td align="center"><?= $result["History_ID"]; ?></td>
                                            <td align="left"><?= $result["Product_ID"]; ?></td>
                                            <td align="center"><img src='assets/img/<?= $result["Product_Name"]; ?>.jpg' width="80" height="auto"></td>
                                            <td align="left"><?= $result["Product_Name"]; ?></td>
                                            <td align="center"><?= $result["Product_Count"]; ?></td>
                                            <td align="center"><?= date("Y-m-d H:i:s", strtotime($result["Date"])); ?></td>
                                            <td align="center"><?= $result["Username"]; ?></td>
                                            <td align="center">
                                                <?php
                                                    if($result['Action_Type']=="เพิ่มสต๊อก"){
                                                        $status = $result["Action_Type"];
                                                        $status = "เพิ่มสต๊อก" ?>
                                                        <span class="badge bg-success"><?= $status; ?></span>
                                                    <?php }else if($result['Action_Type']=="ตัดสต๊อก"){
                                                        $status = $result["Action_Type"];
                                                        $status = "ตัดสต๊อก" ?>
                                                        <span class="badge bg-danger"><?= $status; ?></span>
                                                    <?php }else{
                                                        $status = $result["Action_Type"];
                                                        $status = "ผิดพลาด" ?>
                                                        <span class="badge bg-warning"><?= $status; ?></span>
                                                <?php } ?>
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

    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
</body>

</html>