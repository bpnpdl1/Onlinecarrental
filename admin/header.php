        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: black;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://localhost/Onlinecarrental/admin/index.php">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-house-user"></i>
                </div>
                <div class="sidebar-brand-text mx-3">HCR admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo $page_url; ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo $page_url; ?>/brands" >
                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                    <span>Brands</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo $page_url; ?>/vehicles" >
                <i class="fas fa-car"></i>
                    <span>Vehicles</span></a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?php echo $page_url; ?>/message">
                        <i class="fas fa-envelope"></i>
                        <span>Message</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="<?php echo $page_url; ?>/booking">
                        <i class="fas fa-envelope"></i>
                        <span>Booking</span></a>
                </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo $page_url; ?>users.php">
                    <i class="fas fa-users"></i>
                    <span>Users</span></a>
            </li>



            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo $page_url; ?>analysis.php">
                <i class="fas fa-chart-bar"></i>
                    <span>Analysis</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0"  id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                    

                        
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <a class=" d-none d-lg-inline text-black small mt-4"  href="http://localhost/Onlinecarrental/admin/profile.php"><?php $admin = find('admins', $_SESSION['admin_id']);
        echo substr($admin['name'], 0, 6);
        ?></a>  
                        <li class="nav-item dropdown no-arrow">
                            <span class="nav-link dropdown-toggle"  href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user fa-sm fa-fw mr-2" href="#">
                                <i class="fas fa-caret-down"></i>
                                </i>
                            </span>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>

                    

                </nav>
                <!-- End of Topbar -->

            