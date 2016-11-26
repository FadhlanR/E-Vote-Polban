<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <li class="mt">
                <a <?php if (!isset($_GET['page'])) : ?>class="active"<?php endif; ?> href="index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sub-menu">
                <a <?php if (isset($_GET['page']) && $_GET['page'] == "calon") : ?>class="active"<?php endif; ?> href="index.php?page=calon" >
                    <i class="fa fa-th"></i>
                    <span>Data Calon</span>
                </a>
            </li>

            <li class="sub-menu">
                <a <?php if (isset($_GET['page']) && $_GET['page'] == "pilihcalon") : ?>class="active"<?php endif; ?> href="index.php?page=pilihcalon" >
                    <i class="fa fa-th"></i>
                    <span>Pemilihan</span>
                </a>
            </li>

            <li class="sub-menu">
                <a <?php if (isset($_GET['page']) && $_GET['page'] == "dokumen") : ?>class="active"<?php endif; ?> href="index.php?page=dokumen" >
                    <i class="fa fa-th"></i>
                    <span>Dokumen</span>
                </a>
            </li>

            <li class="sub-menu">
                <a <?php if (isset($_GET['page']) && $_GET['page'] == "set") : ?>class="active"<?php endif; ?> href="index.php?page=set" >
                    <i class="fa fa-th"></i>
                    <span>Setting</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="logout.php" >
                    <i class=" fa fa-logout"></i>
                    <span>Logout</span>
                </a>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
