<?php require "statics/header.php" ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Loglar</h1>
                    <p class="mb-4">Cihazınıza ait HES verilerini buradan görebilirsiniz.</p>
<input type="hidden" value="<?= $_SESSION['id'] ?>" id="hsgdftfarvdAS" >
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <a id="setExcel" ><i style="font-size: 30px;color: #0f6674;cursor: pointer" class="fas fa-file-excel"> EXCEL AKTAR</i></a>
                                <div style="float:right">

                                    <label for="start">Aramak istediğiniz tarihi seçiniz:</label>
                                    <input type="date" data-date-format="YYYY MM DD" onchange="getLogs()" id="start" name="trip-start">
                                </div>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><b>Cihaz İd</b></th>
                                            <th><b>Hes</b></th>
                                            <th><b>Risk</b></th>
                                            <th><b>Sıcaklık</b></th>
											<th><b>Tarih</b></th>
											<th><b>Ad-Soyad</b></th>
                                        </tr>
                                    </thead>

                                    <tbody>
									<?php	
											
								
								foreach($drivers as $driver):
												
	
										if (in_array($driver['chipid'], $cihazlari)) {
											if($driver["uname"]=="")
					{$driver["uname"]="****** *****";}	?>

 										<tr id="edit<?= $driver['id'] ?>" >
                                            <td><?= $driver['chipid'] ?></td>
                                            <td><?= $driver['hes'] ?></td>
                                             <td><?= $driver['durumu'] ?></td>
                                            <td><?= $driver['sicaklik'] ?></td>
											<td><?= $driver['tarih'] ?></td>
											<td><?= $driver['uname'] ?></td>
                                      	</tr>
										<?
 }
										?>
										
                                       
                                        <?php endforeach;  ?>
										
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
    <?php require "statics/footer.php" ?>