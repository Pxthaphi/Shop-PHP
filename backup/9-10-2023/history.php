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
                                        <th width="15%" align="center">รหัสรายการสินค้า</th>
                                        <th width="30%">รายการสินค้า</th>
                                        <th>สถานะ</th>
                                        <th>เวลาที่ทำรายการ</th>
                                        <th>ทำรายการโดย</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //เรียกไฟล์เชื่อมต่อฐานข้อมูล
                                    require_once 'connection.php';

                                    //คิวรี่ข้อมูลมาแสดงในตาราง
                                    $sql = "SELECT history.History_ID, history.Action_Type, history_product.Username, history.Date, history_product.Product_Qty, 
                                            GROUP_CONCAT(product.Product_Name, ' จำนวน ', history_product.Product_Qty , ' ชิ้น ' SEPARATOR '<br>') AS Product_List
                                            FROM history_product 
                                            JOIN history ON history_product.History_ID = history.History_ID 
                                            JOIN product ON history_product.Pro_ID = product.Product_ID 
                                            GROUP BY history.History_ID, history.Action_Type, history_product.Username, history.Date, history_product.Product_Qty
                                            ORDER BY history_product.History_ID;";

                                    $query = mysqli_query($conn, $sql);

                                    while ($result = mysqli_fetch_array($query)) {
                                        $historyID = $result["History_ID"];
                                        $actionType = $result["Action_Type"];
                                        $productList = $result["Product_List"];
                                        $username = $result["Username"];
                                        $date = $result["Date"];

                                        // แปลงรูปแบบให้เป็นรูปแบบ timestamp
                                        $timestamp = strtotime($date);
                                        include_once('assets/Thaidate/Thaidate.php');
                                        include_once('assets/Thaidate/thaidate-functions.php');

                                        // echo thaidate('วันlที่ j F พ.ศ.Y เวลาH:i:s'); 
                                        //ผลลัพธ์ วันพฤหัสบดีที่ 12 พฤศจิกายน พ.ศ.2558 เวลา18:55:29

                                        $thaiDate = thaidate('วันl ที่ j F พ.ศ. Y เวลา H:i น.', $timestamp); 
                                    ?>
                                        <tr>
                                            <td align="center"><?= $historyID; ?></td>
                                            <td><?= $productList; ?></td>
                                            <td>
                                                <?php
                                                if ($actionType == "เพิ่มสต๊อก") {
                                                    $status = "เพิ่มสต๊อก";
                                                    $statusClass = "badge bg-success";
                                                } else if ($actionType == "ตัดสต๊อก") {
                                                    $status = "ตัดสต๊อก";
                                                    $statusClass = "badge bg-danger";
                                                } else {
                                                    $status = "ผิดพลาด";
                                                    $statusClass = "badge bg-warning";
                                                }
                                                ?>
                                                <span class="<?= $statusClass; ?>"><?= $status; ?></span>
                                            </td>
                                            <td><?= $thaiDate; ?></td>
                                            <td><?= $username; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
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