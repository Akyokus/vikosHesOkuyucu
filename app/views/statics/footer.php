 <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                          <span>Copyright &copy; Vikos Yönetim Design By <a href="https://highway.com.tr"> HighWay Software </a>2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buradan ayrılıyorsun?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">"Çıkış Yap" butonuna basarak aktif oturumunu bitirmiş olursun..</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Vazgeç</button>
                    <a class="btn btn-primary" href="<?= site_url("logout") ?>">Çıkış Yap</a>
                </div>
            </div>
        </div>
    </div>

       <!-- Bootstrap core JavaScript-->
    <script src="<?= admin_public_url("vendor/jquery/jquery.min.js") ?>"></script>
    <script src="<?= admin_public_url("vendor/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= admin_public_url("vendor/jquery-easing/jquery.easing.min.js") ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= admin_public_url("js/sb-admin-2.min.js")  ?>"></script>
 <script src="<?= admin_public_url("js/query.js")  ?>"></script>
    <?php
    $url = 'https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    echo $url;
    if($url == "https://logs.hesokuyucu.com/tr/logs"):  ?>
	<script src="<?= public_url("js/logs.js") ?>"></script>
	<?php else: ?>
	
	<?php endif; ?>

</body>

</html>