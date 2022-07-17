<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HES-00 LOGS</title>

    <!-- Custom fonts for this template-->
    <link href="<?= admin_public_url("vendor/fontawesome-free/css/all.min.css") ?>" rel="stylesheet" type="text/css">
	<script src="https://kit.fontawesome.com/e8a903bf6e.js" crossorigin="anonymous"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= admin_public_url("css/sb-admin-2.min.css") ?>" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url("index") ?>">
                
               <?php if(session('admin_email') === "clinc44@hotmail.com"){ ?>
                <div class="sidebar-brand-text mx-3"><img src="https://hesokuyucu.com/wp-content/uploads/2021/04/new_logoo-e1617785788896.png"></div>
            <?php    }elseif(session("admin_email") === "ertan.erdogan@itserv.com.tr"){ ?>
                    <div class="sidebar-brand-text mx-3"><img src="https://hesokuyucu.com/wp-content/uploads/2021/04/new_logoo-e1617785788896.png"></div>
            <?php    }else{ ?>
            <div class="sidebar-brand-text mx-3"><img src="https://hesokuyucu.com/wp-content/uploads/2021/03/vikos-logo.png"></div>
                <?php } ?>
            </a>

            <!-- Divider -->
           <br>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
  <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url("driver_list") ?>">
                  <i class="fas fa-taxi"></i>
                    <span>Cihaz Listesi</span></a>
            </li>
			<?php if($_SESSION['yetki'] === "admin"): ?>
			 <li class="nav-item">
                <a class="nav-link" href="<?= site_url("customer_list") ?>">
					<i class="fas fa-users"></i>
                    <span>Kullanıcı Listesi</span></a>
            </li>
            <?php else:  ?>
            
            <?php endif; ?>
			
						<li style="display:none" class="nav-item">
                <a class="nav-link" href="<?= site_url("live_view") ?>">
                    <i class="fas fa-map-marker"></i>
                    <span>Anlık Konum Takip</span></a>
            </li>
            <li  class="nav-item">
                <a class="nav-link" href="<?= site_url("manual_query") ?>">
                    <i class="fas fa-users"></i>
                    <span>Manuel HES Sorgulama</span></a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="<?= site_url("logs") ?>">
					<i class="fas fa-users"></i>
                    <span>Loglar</span></a>
            </li>
		
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
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $uname ?></span>
                              
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                            
                          
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Çıkış Yap
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
