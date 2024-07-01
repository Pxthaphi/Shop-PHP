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
                    <div class="card h-50">
                        <div class="card-body">
                            <?php
                                if($result['Action_Type']=="เพิ่มสต๊อก"){
                                    $status = $result["Action_Type"];
                                    $status = "เพิ่มสต๊อก" ?>
                                    <h3 class="card-title text-success"><?= $status; ?></h3>
                                <?php }else if($result['Action_Type']=="ตัดสต๊อก"){
                                    $status = $result["Action_Type"];
                                    $status = "ตัดสต๊อก" ?>
                                    <h3 class="card-title text-danger"><?= $status; ?></h3>
                                <?php }else{
                                    $status = $result["Action_Type"];
                                    $status = "ผิดพลาด" ?>
                                    <h3 class="card-title text-warning"><?= $status; ?></h3>
                            <?php } ?>
                            </h5>
                            <p class="card-text">ทำรายการโดย <?= $result["Username"]; ?></p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">ทำรายการเมื่อวันที่ <?= date("d-m-Y H:i:s", strtotime($result["Date"])); ?></small>
                        </div>
                    </div>
                    <?php } ?>
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