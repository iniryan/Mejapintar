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
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/materi'); ?>" class="breadcrumb-link2">Materi</a></li>
                                    <li class=" breadcrumb-item"><span>Detail Materi</span></li>
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
                            <h5 class="card-header">Mejapintar | Detail Materi</h5>
                            <div class="card-body p-0">
                                  <?= form_open_multipart('admin/detail_materi'); ?>
                                  <div class="form-group row mt-2 ml-3">
                                       <label for="date_created_materi" class="col-sm-12 col-form-label">Date Created : <?= $detail['date_created_materi']; ?></label>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="nama_mapel" class="col-sm-12 col-form-label">Nama Mapel</label>
                                        <div class="col-lg-4">
                                        <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" required readonly value="<?= $detail['nama_mapel'] ?>">
                                        </div>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="judul_bab" class="col-sm-12 col-form-label">Judul Bab</label>
                                        <div class="col-lg-4">
                                        <input type="text" class="form-control" id="judul_bab" name="judul_bab" readonly value="<?= $detail['judul_bab'] ?>">
                                        </div>
                                   </div>
                                   <?php if(!empty($detail['image'])) : ?>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="image" class="col-sm-12 col-form-label">Gambar Materi</label>
                                        <div class="col-lg-4">
                                        <img src="<?= base_url('assets/img/').$detail['image'] ; ?>">
                                        </div>
                                   </div>
                                   <?php endif; ?>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="isi_materi" class="col-sm-12 col-form-label">Isi Materi</label>
                                        <div class="col-lg-10">
                                        <textarea type="text" class="form-control ckeditor" id="ckeditor" name="isi_materi" rows="25" readonly><?= $detail['isi_materi'] ?></textarea>
                                        </div>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="video" class="col-sm-12 col-form-label">Url Video</label>
                                        <div class="col-lg-10">
                                        <textarea type="text" class="form-control ckeditor" id="ckeditor4" name="video" rows="5" readonly><?= $detail['video'] ?></textarea>
                                        </div>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="rangkuman" class="col-sm-12 col-form-label">Rangkuman</label>
                                        <div class="col-lg-10">
                                        <textarea type="text" class="form-control ckeditor" id="ckeditor3" name="rangkuman" rows="25" readonly><?= $detail['rangkuman'] ?></textarea>
                                        </div>
                                   </div>
                                                                  

                                  <div class="form-group row mt-2 ml-3">

                                  </div>



                                  <div class="form-group row mt-2 ml-3">
                                        <div class="col-lg-12 mt-3">
                                            
                                            <a href="<?= base_url('admin/materi'); ?>" class="btn btn-light">Kembali</a>
                                        </div>

                                        
                                   </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- end  -->

           </div>
        
    </div>