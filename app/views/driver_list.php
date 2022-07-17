        
        <?php require "statics/header.php" ?>
          

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Cihazlarım</h1>
                    <p class="mb-4">Cihazlarınızı ve durumlarını buradan görebilirsiniz.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableDevice" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Cihaz İd</th>
                                            <th>Ağ</th>
                                            <th>Sinyal</th>
											<th>Ses</th>
                                            <th>Güncel</th>
											<th>İlk Görülme</th>
											<th>Son Görülme</th>
                                            <th>Bekleyen İşlem</th>
											<?= session('yetki') == "admin" ? '<th>Eylemler</th>' : '' ?>
										
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Cihaz İd</th>
                                            <th>Ağ</th>
                                            <th>sinyal</th>
											<th>ses</th>
                                            <th>Güncel</th>
											<th>İlk Görülme</th>
											<th>Son Görülme</th>
                                            <th>Bekleyen İşlem</th>
											<?= session('yetki') == "admin" ? '<th>Eylemler</th>' : '' ?>
                                        </tr>
                                    </tfoot>
                                    <tbody>
										<div id="ref">
									<?php	
								$cihazlari = explode("/", $cihazlar);
								foreach($drivers as $driver):
	 								if($_SESSION["yetki"]!="admin"){
										if (in_array($driver['chipid'], $cihazlari)): ?>
										<div id="ref">
 										<tr id="edit<?= $driver['chipid'] ?>" >
                                            <td><?= $driver['chipid'] ?></td>
                                            <td><?= $driver['ssid'] ?></td>
                                            <td><?= $driver['sinyal'] ?></td>
											<td><?= $driver['ses'] ?></td>
                                            <td><?= $driver['guncel'] ?></td>
											<td><?= $driver['ilk_gorulme'] ?></td>
											<td><?= $driver['son_gorulme'] ?></td>
                                            <td><?= $driver['bekleyen_islem'] == 0 ? 'Yok' : 'Var' ?></td>
										</tr>
										</div>
										<? endif; 	 }else{
										?>
										<div id="ref2">
										<input type="hidden" value="<?= $_SESSION['id'] ?>" id="hsgdftfarvdAS" >
										 <tr id="edit<?= $driver['chipid'] ?>" >
                                            <td><?= $driver['chipid'] ?></td>
                                            <td><?= $driver['ssid'] ?></td>
                                            <td><?= $driver['sinyal'] ?></td>
											<td><?= $driver['ses'] ?></td>
                                            <td><?= $driver['guncel'] ?></td>
											<td><?= $driver['ilk_gorulme'] ?></td>
											<td><?= $driver['son_gorulme'] ?></td>
                                            <td><?= $driver['bekleyen_islem'] == 0 ? 'yok' : 'var' ?></td>
											<td><a class="dropdown-item text-center" href="<?= site_url('driver_list').'?delete_id='.$driver['chipid']; ?>">SİL</a><a id="<?= $driver['chipid'] ?>" style="cursor: pointer;" class="dropdown-item text-center" onclick="func(<?= $driver['chipid'] ?>)">  DÜZENLE</a></td></tr>
											</div>
										<?php } ?>
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
        
        
        
        
        
        