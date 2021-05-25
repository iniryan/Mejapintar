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
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/soal'); ?>" class="breadcrumb-link2">Soal</a></li>
                                    <li class=" breadcrumb-item"><span>Detail Soal</span></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
          <!-- end -->

        <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Mejapintar | Create Soal</h5>
                            <div class="card-body p-0">
                                  <?= form_open_multipart('admin/detail_soal'); ?>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="judul_soal" class="col-sm-12 col-form-label">Title</label>
                                        <div class="col-lg-4">
                                        <input type="text" class="form-control" id="judul_soal" name="judul_soal" readonly value="<?= $detail['judul_soal'] ?>">
                                        </div>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="isi_soal" class="col-sm-12 col-form-label">Isi Soal</label>
                                        <div class="col-lg-10">
                                        <textarea type="text" class="form-control ckeditor" id="ckeditor2" name="isi_soal" rows="10" readonly><?= $detail['isi_soal'] ?></textarea>
                                        </div>
                                   </div> 
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="kunci" class="col-sm-12 col-form-label">Kunci</label>
                                        <div class="col-md-10">
                                        <input type="text" class="form-control" id="kunci" name="kunci" readonly value="<?= $detail['kunci'] ?>">
                                        </div>
                                   </div>
                                   
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="opsi1" class="col-sm-12 col-form-label">Opsi 1</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="opsi1" name="opsi1" readonly value="<?= $detail['opsi1'] ?>">
                                        </div>
                                   </div> 
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="opsi2" class="col-sm-12 col-form-label">Opsi 2</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="opsi2" name="opsi2" readonly value="<?= $detail['opsi2'] ?>">
                                        </div>
                                   </div> 
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="opsi3" class="col-sm-12 col-form-label">Opsi 3</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="opsi3" name="opsi3" readonly value="<?= $detail['opsi3'] ?>">
                                        </div>
                                   </div> 
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="bahasan" class="col-sm-12 col-form-label">Bahasan</label>
                                        <div class="col-lg-10">
                                        <textarea type="text" class="form-control" id="bahasan" name="bahasan" rows="5" readonly><?= $detail['bahasan'] ?></textarea>
                                        </div>
                                   </div>                              

                                  <div class="form-group row mt-2 ml-3">
                                         
                                  </div>



                                  <div class="form-group row mt-2 ml-3">
                                        <div class="col-lg-12 mt-3">
                                            <a href="<?= base_url('admin/soal'); ?>" class="btn btn-light">Kembali</a>
                                        </div>
                                   </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- end  -->


           </div>
        
    </div>