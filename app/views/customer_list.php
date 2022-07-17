<?php require "statics/header.php" ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Kullanıcılar listesi</h1>
                    <p class="mb-4">Kullanıcıları listeleyin ve düzenleyin.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Adı Soyadı</th>
                                            <th>Email</th>
                                            <th>Telefon Numarası</th>
											<th>İşlemler</th>
											<th>Cihaz Seç</th>
                                         
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Telefon Numarası</th>
											<th>İşlemler</th>
											<th>Cihaz Seç</th>
                                    </tfoot>
                                    <tbody>
										<?php foreach($users as $user): ?>
                                        <tr id="edit<?= $user['id'] ?>" >
                                            <td><?= $user['uname'] ?></td>
                                            <td><?= $user['email'] ?></td>
                                            <td><?= $user['telno'] ?></td>
											<td><a class="dropdown-item text-center" href="<?= site_url('customer_list').'?delete_id='.$user['id']; ?>">SİL</a><a id="<?= $user['id'] ?>" style="cursor: pointer;" class="dropdown-item text-center" onclick="funcU(<?= $user['id'] ?>)">  DÜZENLE</a></td>
											<td><select style="width:100%" name="device" id="device<?= $user['id'] ?>">
												<option value="0">Cihaz Seçiniz</option>
												<?php foreach($devices as $device): ?>
  													<option value="<?= $device['chipid'] ?>"><?= $device['ssid'] ?></option>
												<?php endforeach; ?>
												</select>
												<a style="cursor: pointer;background-color: #4598b7a6" class="dropdown-item text-center" onclick="selectdevice(<?= $user['id'] ?>)">Kayıt Et</a>
											</td>
                                        </tr>
										<?php endforeach; ?>
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