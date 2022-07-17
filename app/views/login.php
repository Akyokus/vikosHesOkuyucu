<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Vikos Yönetim</title>

    <!-- Custom fonts for this template-->
    <link href="<?= admin_public_url("vendor/fontawesome-free/css/all.min.css") ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= admin_public_url("css/sb-admin-2.min.css") ?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
		<style>
.bg-login-image {
    background: url(https://magaza.hesokuyucu.com/wp-content/uploads/2021/03/Artboard-1-1-1-e1614718990720.png);
    background-position: center;
    background-size: cover;
}
		</style>
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div style="background-position: center;margin-top:20px;padding-left:15px" class="col-lg-6 d-none d-lg-block"><img src="<?= public_url("neyebakmistin.png") ?>" ></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Vikos Yönetim</h1>
                                    </div>
                                    <form action="<?= site_url('sign_up') ?>" method="POST" class="user">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Email Adresinizi Giriniz">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Şifrenizi Giriniz">
                                        </div>
                                      
                                        <button name="login" value="1" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                       
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= admin_public_url("vendor/jquery/jquery.min.js") ?>"></script>
    <script src="<?= admin_public_url("vendor/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= admin_public_url("vendor/jquery-easing/jquery.easing.min.js") ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= admin_public_url("js/sb-admin-2.min.js") ?>"></script>

</body>

</html>