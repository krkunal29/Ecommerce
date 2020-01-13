
                <div class="app-sidebar colored">
                    <div class="sidebar-header">
                        <a class="header-brand" href="index.html">
                            <div class="logo-img">
                               <img src="img/brand1.png" class="header-brand-img" alt="lavalite" width="100px">
                            </div>
                        </a>
                        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                    </div>

                    <div class="sidebar-content">
                        <div class="nav-container">
                            <nav id="main-menu-navigation" class="navigation-main">
                                <div class="nav-lavel">Ecommerce</div>
                                <div class="nav-item active">
                                    <a href="dashboard.php"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div>
                                <?php
                                if($_SESSION['roleId'] != 3){
                                    ?>
                                    <div class="nav-item active">
                                    <a href="admin-dashboard.php"><i class="ik ik-layers"></i><span>Statastics</span></a>
                                </div>
                                     <div class="nav-item active">
                                    <a href="reports.php"><i class="ik ik-box"></i><span>Reports</span></a>
                                </div>
                                <div class="nav-item active">
                                    <a href="customers.php"><i class="ik ik-user"></i><span>Customers</span></a>
                                </div>
                                <?php 
                                }
                                ?>
                                <div class="nav-item active">
                                    <a href="Employees.php"><i class="ik ik-users"></i><span>Employees</span></a>
                                </div>
                               
                               
                                <div class="nav-item has-sub active">
                                    <a href="#"><i class="ik ik-box"></i><span>Product/Services</span></a>
                                    <div class="submenu-content">
                                        <a href="products.php" class="menu-item active">Products</a>
                                        <a href="tax.php" class="menu-item">Units</a>
                                        <a href="unit.php" class="menu-item">Tax</a>
                                        <div class="nav-item has-sub">
                                    <a href="#" class="menu-item"><span>Category</span></a>
                                    <div class="submenu-content">
                                    <a href="category.php" class="menu-item active"><span>Category</span> </a>
                                        <a href="subcategory.php" class="menu-item"><span> Sub Category</span> </a>
                                        <a href="innersubcategory.php" class="menu-item"><span> Inner Category</span> </a>
                                        <a href="lastsubcategory.php" class="menu-item"><span> Inner Level Category</span> </a>
                                    </div>
                                    </div>
                                   
                                </div>
                                </div>
                                <div class="nav-item has-sub active">
                                    <a href="#"><i class="ik ik-layers"></i><span>Website Blogs</span></a>
                                    <div class="submenu-content">
                                        <a href="blogcategory.php" class="menu-item active">Blog Category</a>
                                        <a href="blog.php" class="menu-item">Blogs</a>
                                    </div>
                                </div>
                                <div class="nav-item has-sub active">
                                    <a href="#"><i class="ik ik-gitlab"></i><span>Sales</span></a>
                                    <div class="submenu-content">
                                        <a href="invoice.php" class="menu-item active">Working Sales</a>
                                        <a href="maininvoice.php" class="menu-item">Main</a>
                                    </div>
                                </div>
                               
                               
                            </nav>
                        </div>
                    </div>
                </div>
