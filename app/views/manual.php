<?php   require 'statics/header.php'; ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Manuel HES Sorgulama</h1>

        <div class="form-group">
            <input type="text" id="hes_code" class="form-control form-control-user" id="exampleFirstName"
                   placeholder="HES KODU (XXXXXXXXXXX)">
        </div>


        <button onclick="query()" value="1" class="btn btn-primary btn-user btn-block">
            HES SORGULA
        </button>
        <hr>


    <div id="result" class="text-center align-content-center text-black-50 font-weight-bolder">


    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php   require 'statics/footer.php'; ?>
