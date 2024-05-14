<?php
    $userRole = $_SESSION['user_role'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Management System</title>
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
    <link rel="stylesheet" href= "/pharmacy-management-system/public/fonts/icomoon/style.css">
    <link rel="stylesheet" href= "/pharmacy-management-system/public/css/bootstrap.min.css">
    <link rel="stylesheet" href= "/pharmacy-management-system/public/css/magnific-popup.css">
    <link rel="stylesheet" href= "/pharmacy-management-system/public/css/jquery-ui.css">
    <link rel="stylesheet" href= "/pharmacy-management-system/public/css/owl.carousel.min.css">
    <link rel="stylesheet" href= "/pharmacy-management-system/public/css/owl.theme.default.min.css">
    <link rel="stylesheet" href= "/pharmacy-management-system/public/css/aos.css">
    <link rel="stylesheet" href= "/pharmacy-management-system/public/css/style.css">
</head>

<body>
    <div class="site-wrap">
        <header>
            <div class="site-navbar py-2">
                <div class="container">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="logo">
                            <div class="site-logo">
                                <a href= "/pharmacy-management-system/public/index.php" class="js-logo-clone">Nhà thuốc 115</a>
                            </div>
                        </div>
                        <nav class="site-navigation text-right text-md-center" role="navigation">
                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                <?php if ($userRole == 'admin') { ?>
                                    <li class="active"><a href="admin_dashboard.php">Dashboard</a></li>
                                    <li><a href="manageCustomers">Khách hàng</a></li>
                                    <li><a href="manageEmployees">Nhân viên</a></li>
                                    <li><a href="listSuppliers">Nhà cung cấp</a></li>
                                <?php } elseif ($userRole == 'khach') { ?>
                                    <li class="active"><a href= "/pharmacy-management-system/public/index.php">Shop</a></li>
                                    <li><a href= "/pharmacy-management-system/public/order_history.php">Order History</a></li>
                                <?php } elseif ($userRole == 'Dược sĩ') { ?>
                                    <li class="active"><a href= "/pharmacy-management-system/public/index.php/listDrugs">Dashboard</a></li>
                                    <li><a href= "/pharmacy-management-system/public/index.php/listDrugs">Thuốc</a></li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Hóa đơn
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="/pharmacy-management-system/public/index.php/addSale">Thêm hóa đơn</a>
                                            <a class="dropdown-item" href="/pharmacy-management-system/public/index.php/listSales">Danh sách hóa đơn</a>
                                        </div>
                                    </li>

                                <?php } ?>
                            </ul>
                        </nav>
                        <div class="icons">
                            <a href="/pharmacy-management-system/public/index.php/logout" class="icons-btn d-inline-block">
                                Đăng xuất
                            </a>
                        </div>

                        </div>



                    </div>
                </div>
            </div>
        </header>

        <!-- Main content area -->
        <main class="py-4">
            <div class="container">
                <?php echo isset($content) ? $content : "No content available"; ?>
            </div>
        </main>


        <!-- Footer -->
        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="block-7">
                            <h3 class="footer-heading mb-4">About Us</h3>
                            <p>This pharmacy management system is designed to streamline every day pharmacy operations.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
                        <h3 class="footer-heading mb-4">Quick Links</h3>
                        <ul class="list-unstyled">
                            <li><a href= "/pharmacy-management-system/public/#">Policies</a></li>
                            <li><a href= "/pharmacy-management-system/public/#">Developers</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="block-5 mb-5">
                            <h3 class="footer-heading mb-4">Contact Info</h3>
                            <ul class="list-unstyled">
                                <li class="address">1234 Street Name, City Name</li>
                                <li class="phone"><a href= "/pharmacy-management-system/public/tel://23923929210">+123 456 7890</a></li>
                                <li class="email">contact@pharmacy.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row pt-5 mt-5 text-center">
                    <div class="col-md-12">
                        <p>
                            Copyright &copy; <script>document.write(new Date().getFullYear());</script>
                            All rights reserved | This site is created by [Your Company Name]
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src= "/pharmacy-management-system/public/js/jquery-3.3.1.min.js"></script>
    <script src= "/pharmacy-management-system/public/js/jquery-ui.js"></script>
    <script src= "/pharmacy-management-system/public/js/popper.min.js"></script>
    <script src= "/pharmacy-management-system/public/js/bootstrap.min.js"></script>
    <script src= "/pharmacy-management-system/public/js/owl.carousel.min.js"></script>
    <script src= "/pharmacy-management-system/public/js/jquery.magnific-popup.min.js"></script>
    <script src= "/pharmacy-management-system/public/js/aos.js"></script>
    <script src= "/pharmacy-management-system/public/js/main.js"></script>
</body>

</html>
