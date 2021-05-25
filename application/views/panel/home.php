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
                                </ol>
                            </nav>
                        </div>
                        <h2 class="pageheader-title p-2 text-uppercase">
                            <?php
                            $timezone = date_default_timezone_set('Asia/Jakarta');
                            $time = date('H');
                            if ($time >= '5' && $time < '12') {
                                echo 'Selamat Pagi';
                            } else if ($time >= '12' && $time < '15') {
                                echo 'Selamat Siang';
                            } else if ($time >= '15' && $time < '19') {
                                echo 'Selamat Sore';
                            } else {
                                echo 'Selamat Malam';
                            }
                            ?>
                        </h2>
                    </div>
                </div>
            </div>
          <!-- end pageheader  -->
            <!--  -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card influencer-profile-data">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div class="text-center">
                                                <img src="<?= base_url('assets/img/'). $profil['foto']; ?>" alt="User Avatar" class="img-thumbnail rounded-circle" style="width: 190px;height: 190px; object-fit: cover; object-position: center;">
                                            </div>
                                        </div>
                                        <div class="col-xl-9 col-lg-8 col-md-8 col-sm-8 col-12">
                                            <div class="user-avatar-info">
                                                <div class="m-b-20">
                                                    <div class="user-avatar-name">
                                                        <h2 class="mb-1"><?= $user['username']; ?></h2>
                                                        <h6 class="mb-1"><?= $user['email']; ?></h6>
                                                    </div>
                                                </div>
                                                
                                                <div class="user-avatar-address mt-2">
                                                    <p class="border-bottom pb-3">
                                                        <span class="mb-1 d-xl-inline-block d-block">Create on <?= $user['date_created']; ?></span>
                                                    </p>
                                                </div>

                                                <div class="float-left">
                                                    <a class="text-info" href="<?= base_url('admin/profile'); ?>"><i class="fas fa-fw fa-user mr-2"></i>Profile</a>
                                                    <a class="text-info ml-3" href="<?= base_url('admin/changepass'); ?>"><i class="fas fa-fw fa-lock mr-2"></i>Change Password</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- end profil  -->

                        <!-- start count -->

                <div class="row p-3">
                    <div class="col-lg-12">
                        <div class="section-block mb-3">
                            <h3 class="section-title">Data</h3>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-sm-12 col-12">
                         <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h6 class="text-muted ml-4">Users</h6>
                                            
                                    <h2 class="mb-0 p-1 ml-4"><?= $this->db->count_all('mejauser') - 1; ?></h2>
                                </div>
                                <div class="float-left">
                                    <i class="fa fa-user fa-fw fa-sm text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-6 col-sm-12 col-12">
                         <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h6 class="text-muted ml-4">Materi</h6>
                                            
                                    <h2 class="mb-0 p-1 ml-4"><?= $this->db->count_all('materi'); ?></h2>
                                </div>
                                <div class="float-left">
                                    <i class="fa fa-book fa-fw fa-sm text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-6 col-sm-12 col-12">
                         <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h6 class="text-muted ml-4">Soal</h6>
                                            
                                    <h2 class="mb-0 p-1 ml-4"><?= $this->db->count_all('soal'); ?></h2>
                                </div>
                                <div class="float-left">
                                    <i class="fa fa-question-circle fa-fw fa-sm text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-6 col-sm-12 col-12">
                         <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h6 class="text-muted ml-2">Jenjang</h6>
                                            
                                    <h2 class="mb-0 p-1 ml-4"><?= $this->db->count_all('kategori'); ?></h2>
                                </div>
                                <div class="float-left">
                                    <i class="fa fa-graduation-cap fa-fw fa-sm text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-6 col-sm-12 col-12">
                         <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h6 class="text-muted ml-2">Kategori</h6>
                                            
                                    <h2 class="mb-0 p-1 ml-4"><?= $this->db->count_all('sub_kategori'); ?></h2>
                                </div>
                                <div class="float-left">
                                    <i class="fa fa-list fa-fw fa-sm text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-6 col-sm-12 col-12">
                         <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h6 class="text-muted ml-2">Feedback</h6>
                                            
                                    <h2 class="mb-0 p-1 ml-4"><?= $this->db->count_all('feed'); ?></h2>
                                </div>
                                <div class="float-left">
                                    <i class="fa fa-comments fa-fw fa-sm text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row p-3">
                    <div class="col-xl-2 col-md-6 col-sm-12 col-12">
                         <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h6 class="text-muted ml-2">Blocked</h6>
                                            
                                    <h2 class="mb-0 p-1 ml-4">
                                        <?php $this->db->where('activate', '0')->from('mejauser');
                                        echo $this->db->count_all_results(); ?>
                                    </h2>
                                </div>
                                <div class="float-left">
                                    <i class="fa fa-user fa-fw fa-sm text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-6 col-sm-12 col-12">
                         <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h6 class="text-muted ml-2">Activate</h6>
                                            
                                    <h2 class="mb-0 p-1 ml-4">
                                        <?php $this->db->where('activate', '1')->from('mejauser');
                                            echo $this->db->count_all_results() - 1; ?>
                                    </h2>
                                </div>
                                <div class="float-left">
                                    <i class="fa fa-user fa-fw fa-sm text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-6 col-sm-12 col-12">
                         <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h6 class="text-muted ml-2">News</h6>
                                            
                                    <h2 class="mb-0 p-1 ml-4"><?= $this->db->count_all('news'); ?></h2>
                                </div>
                                <div class="float-left">
                                    <i class="fa fa-newspaper fa-fw fa-sm text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- end count -->

                <!-- start recom -->
                    
                    <div class="row p-3">
                            <div class="col-lg-12">
                                <div class="section-block mb-3">
                                    <h3 class="section-title">Rekomendasi Materi</h3>
                                </div>
                            </div>
                        
                       <?php 
                       $query = $this->db->get('materi');
                       foreach ($query->result_array() as $row) { 
                       if ($row['recomended'] != 0) { ?>
                          
                          
                    <div class="card p-2 mx-2">
                          <div class="text text-center">
                            <p class="mb-3 mt-2 line" style="border-bottom: 3px solid black;"><?= $row['nama_mapel'];  ?></p>
                            
                            <p class="name" style="font-size: 14px;"><?= word_limiter($row['judul_bab'], 4)?></p>
                            <p class="mt-2"> 
                              <a href="<?= base_url('admin/detail_materi/').$row['id_materi']; ?>">
                              <button class="btn btn-primary" style="font-size: 14px;">Detail</button>
                              </a>
                            </p>
                          </div>
                          
                    </div>
                        <?php }} ?>
                            

                                       
                    </div>

                <!-- end recom -->
            
        </div>
    
</div>



