<?php 
    session_start();
?>
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="dashboard.php"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item <?php if($menu=="menu"){echo "active";} ?>">
                    <a href="dashboard.php" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>หน้าแรก</span>
                    </a>
                </li>

                <li class="sidebar-title">ตารางข้อมูล</li>

                <li class="sidebar-item <?php if($menu=="table_stock"){echo "active";} ?>">
                    <a href="table_stock.php" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>ตารางสินค้า</span>
                    </a>
                </li>


                <li class="sidebar-title">Pages</li>
                <li class="sidebar-item <?php if($menu=="add_stock"){echo "active";} ?>">
                    <a href="add_stock.php" class='sidebar-link'>
                        <i class="bi bi-bag-plus-fill"></i>
                        <span>เพิ่มสต๊อกสินค้า</span>
                    </a>
                </li>
                <li class="sidebar-item <?php if($menu=="cut_stock"){echo "active";} ?>">
                    <a href="cut_stock.php" class='sidebar-link'>
                        <i class="bi bi-basket-fill"></i>
                        <span>ตัดสต๊อกสินค้า</span>
                    </a>
                </li>
                


                <!-- <li class="sidebar-title">ติดต่อ</li>

                <li class="sidebar-item  ">
                    <a href="https://zuramai.github.io/mazer/docs" class='sidebar-link'>
                        <i class="bi bi-life-preserver"></i>
                        <span>Documentation</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md" class='sidebar-link'>
                        <i class="bi bi-puzzle"></i>
                        <span>Contribute</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="https://github.com/zuramai/mazer#donate" class='sidebar-link'>
                        <i class="bi bi-cash"></i>
                        <span>Donate</span>
                    </a>
                </li> -->

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>