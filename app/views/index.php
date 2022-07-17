
<?php require "statics/header.php" ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Taksi Kayıt</h1>
					  <form method="POST" action="index.html">
                                <div class="form-group">
                                        <input type="text" name="uname" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Adı Soyadı">                                   
                                </div>
								 <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Adresi">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="telno" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Telefon Numarası">
                                    </div>
                                </div>
						   <div class="form-group">
                              
							   <input type="text" name="plaka" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Araç Plakası">   
                                </div>
						   <div class="form-group row">
							    <div class="col-sm-6">
                                             
									 <input type="text" name="marka" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Araç Markası">   
							      </div>
							    <div class="col-sm-6">
									     <input type="text" name="model" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Araç Modeli">     
                                </div>  </div>
						 
						 
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Şifre">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="re_password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Şifre Tekrar">
                                    </div>
                                </div>
						 
                                <button name="create_taxi" value="1" class="btn btn-primary btn-user btn-block">
                                    Kaydı Oluştur
                                </button>
                                <hr>
               
                            </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

          <?php require "statics/footer.php" ?>
           