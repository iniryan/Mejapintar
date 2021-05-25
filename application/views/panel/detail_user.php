<div class="dashboard-wrapper">
    
        <div class="container-fluid dashboard-content ">
            <!-- pageheader  -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <div class="page-breadcrumb p-2">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/home'); ?>" class="breadcrumb-link2">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/user'); ?>" class="breadcrumb-link2">User</a></li>

                                    <li class=" breadcrumb-item"><span>Detail User</span></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
          <!-- end -->
            
            <!-- start  -->

            <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Mejapintar | Detail User</h5>
                            <div class="card-body p-0">
                                   <div class="row">
                                   <div class="col-md-4">
                                        <div class="text-center mt-5">
                                            <img src="<?= base_url('assets/img/') . $profil['foto']; ?>" alt="User Avatar" class="img-thumbnail rounded-circle" style="width: 300px;height:300px; object-fit: cover; object-position: center;">
                                        </div>
                                   </div>
                                   <div class="col-md-8">
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="id_user" class="col-sm-12 col-form-label">Id User</label>
                                        <div class="col-lg-5">
                                        <input type="text" class="form-control" id="id_user" name="id_user" readonly value="<?= $user['id_user']; ?>">                                  
                                      </div>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="username" class="col-sm-12 col-form-label">Username</label>
                                        <div class="col-lg-5">
                                        <input type="text" class="form-control" id="username" name="username" readonly="" value="<?= $user['username']; ?>">                                  
                                      </div>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="email" class="col-sm-12 col-form-label">Email</label>
                                        <div class="col-lg-5">
                                        <input type="email" class="form-control" id="email" name="email" readonly value="<?= $user['email']; ?>">
                                        </div>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="telepon" class="col-sm-12 col-form-label">Telepon</label>
                                        <div class="col-lg-5">
                                        <input type="text" class="form-control" id="telepon" name="telepon" readonly value="<?= $profil['telepon']; ?>">
                                        </div>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="biodata" class="col-sm-12 col-form-label">Bio</label>
                                        <div class="col-lg-10">
                                        <textarea type="text" readonly class="form-control" id="biodata" name="biodata" rows="5"><?= $profil['biodata']?></textarea>
                                        </div>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                        <div class="col-lg-12 mt-3">
                                            <a href="<?= base_url('admin/user'); ?>" class="btn btn-light">Kembali</a>
                                        </div>
                                   </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>

        <div class="row mt-5 justify-content-center d-flex">
          <div class="col-xl-2 col-md-6 col-sm-12 col-12">
                         <div class="card">
                            <div class="card-body">
                                    <h6 class="text-muted text-center">Belajar</h6>     
                                      <h2 class="text-center mb-0 p-1 "><?= $this->db->get_where('riwayat',['id_user'=>$user['id_user']])->num_rows(); ?></h2>
                                
                                    <h6 class="text-muted text-center">Materi</h6>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row mt-5 justify-content-center d-flex"> -->
          <div class="col-xl-2 col-md-6 col-sm-12 col-12">
              <div class="card">
                  <div class="card-body">
                    <h6 class="text-muted text-center">Jumlah</h6>     
                    <h2 class="text-center mb-0 p-1 "><?= $profil['exp'] ?></h2>
                    <h6 class="text-muted text-center">Exp User</h6>
                  </div>
              </div>
          </div>
        <!-- </div> -->

        </div>
          <?php if ($profil['exp']>=1000): ?>
        <div class="row mt-3 d-flex justify-content-center">
            <div class="p-2">
             <!-- cetak sertifikat -->
             <h5 class="text-center">Sudah Bisa Cetak Sertifikat</h5>
            </div>
        </div>
          <?php endif ?>

        <div class="row mt-5">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <caption>Materi yang telah dibaca</caption>
            <div class="card">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Mapel</th>
                    <th scope="col">Judul Materi</th>
                    <th scope="col">Tanggal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($riwayat)) : 
                    foreach ($riwayat as $riwayat):?>
                  <?php $get_materi = $this->db->get_where('materi',['id_materi'=>$riwayat['id_materi']])->row_array();
                  $jenjang = ($riwayat['id_sub'] == 31 || $riwayat['id_sub'] == 34 || $riwayat['id_sub'] == 37 || $riwayat['id_sub'] == 40 ? 'SD' : ($riwayat['id_sub'] == 32 || $riwayat['id_sub'] == 35 || $riwayat['id_sub'] == 38 || $riwayat['id_sub'] == 41 ? 'SMP' : ($riwayat['id_sub'] == 33 || $riwayat['id_sub'] == 36 || $riwayat['id_sub'] == 39 || $riwayat['id_sub'] == 42 ? 'SMA/K' : '')));
                  ?>
                  <tr>
                    <td><?= $get_materi['nama_mapel'].' - '.$jenjang ?></td>
                    <td><?= $get_materi['judul_bab']  ?></td>
                    <td><?= $riwayat['date'] ?></td>
                  </tr>
                  <?php endforeach; else : ?>
                   <tr>
                    <td colspan="3">Belum ada materi yang dibaca</td>
                  </tr>
                <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="row mt-5">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <caption>Quiz yang telah dikerjakan</caption>
            <div class="card">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Mapel</th>
                    <th scope="col">Judul Materi</th>
                    <th scope="col">Nilai Quiz</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nilai Remedial</th>
                    <th scope="col">Tanggal Remedial</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($record)) : 
                    foreach ($record as $record):?>
                  <?php $get_materi = $this->db->get_where('materi',['id_materi'=>$record['id_materi']])->row_array();
                  $jenjang = ($get_materi['id_sub'] == 31 || $get_materi['id_sub'] == 34 || $get_materi['id_sub'] == 37 || $get_materi['id_sub'] == 40 ? 'SD' : ($get_materi['id_sub'] == 32 || $get_materi['id_sub'] == 35 || $get_materi['id_sub'] == 38 || $get_materi['id_sub'] == 41 ? 'SMP' : ($get_materi['id_sub'] == 33 || $get_materi['id_sub'] == 36 || $get_materi['id_sub'] == 39 || $get_materi['id_sub'] == 42 ? 'SMA/K' : '')));
                  ?>
                  <tr>
                    <td><?= $get_materi['nama_mapel'].' - '.$jenjang ?></td>
                    <td><?= $get_materi['judul_bab']  ?></td>
                    <td><?= $record['nilai'] ?></td>
                    <td><?= $record['datetime'] ?></td>
                    <td><?= $record['remed'] ?></td>
                    <td><?= $record['date_remed'] ?></td>
                  </tr>
                  <?php endforeach; else : ?>
                   <tr>
                    <td colspan="4">Belum ada quiz yang dikerjakan</td>
                  </tr>
                <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

                <!-- end  -->

            </div>
        
    </div>