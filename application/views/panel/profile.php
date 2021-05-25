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
                                    <li class=" breadcrumb-item"><span>Profile</span></li>
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
                            <h5 class="card-header">Mejapintar | Profile</h5>
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
                                        <div class="col-lg-10">
                                        <input type="text" class="form-control" id="id_user" name="id_user" readonly value="<?= $user['id_user']; ?>">                                  
                                      </div>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="username" class="col-sm-12 col-form-label">Username</label>
                                        <div class="col-lg-10">
                                        <input type="text" class="form-control" id="username" name="username" readonly="" value="<?= $user['username']; ?>">                                  
                                      </div>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="email" class="col-sm-12 col-form-label">Email</label>
                                        <div class="col-lg-10">
                                        <input type="email" class="form-control" id="email" name="email" readonly value="<?= $user['email']; ?>">
                                        </div>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="telepon" class="col-sm-12 col-form-label">Telepon</label>
                                        <div class="col-lg-10">
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
                                            <a href="<?= base_url('admin/editprofil'); ?>"  class="btn btn-warning">Edit Profile</a>
                                            <a href="<?= base_url('admin/home'); ?>" class="btn btn-light">Kembali</a>
                                        </div>
                                   </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end  -->

            </div>
        
    </div>