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
                                    <li class=" breadcrumb-item"><span>Create Soal</span></li>
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
                                  <?= form_open_multipart('admin/create_soal'); ?>
                                  <input type="hidden" class="form-control" id="id_soal" name="id_soal" required>
                                    <label for="id_sub" class="col-sm-12 col-form-label ml-3 mt-2">Kategori</label>
                                        <div class="form-group row mt-2 ml-3 col-lg-4">
                                            <select name="id_sub" id="id_sub" class="form-control">
                                                <option value="">-Pilih Sub Kategori-</option>
                                                <?php
                                                foreach ($subkategori->result() as $key) : ?>
                                                    <option value="<?= $key->id_sub;?>"><?= $key->sub_kategori.' - '.$key->nama_kategori?></option>

                                               <?php endforeach; ?>
                                            </select>

                                        </div>
                                        <label for="id_materi" class="col-sm-12 col-form-label ml-3 mt-2">Materi</label>
                                        <div class="form-group row mt-2 ml-3 col-lg-4">
                                            <select name="id_materi" id="id_materi" class="form-control">
                                                <option value="">-Pilih Materi-</option>
                                                <?php $materi = $this->db->get('materi')->result();
                                                foreach ($materi as $key) : ?>
                                                    <option value="<?= $key->id_materi;?>"><?= $key->judul_bab; ?></option>

                                               <?php endforeach; ?>
                                            </select>

                                        </div>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="judul_soal" class="col-sm-12 col-form-label">Title</label>
                                        <div class="col-lg-4">
                                        <input type="text" class="form-control" id="judul_soal" name="judul_soal">
                                            <?= form_error('judul_soal', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="isi_soal" class="col-sm-12 col-form-label">Isi Soal</label>
                                        <div class="col-lg-10">
                                        <textarea type="text" class="form-control ckeditor" id="ckeditor2" name="isi_soal" rows="10"></textarea>
                                            <?= form_error('isi_soal', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div> 
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="kunci" class="col-sm-12 col-form-label">Kunci</label>
                                        <div class="col-md-10">
                                        <input type="text" class="form-control" id="kunci" name="kunci">
                                        
                                            <?= form_error('kunci', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div> 
                                   
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="opsi1" class="col-sm-12 col-form-label">Opsi A</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="opsi1" name="opsi1">
                                            <?= form_error('opsi1', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div> 
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="opsi2" class="col-sm-12 col-form-label">Opsi B</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="opsi2" name="opsi2">
                                            <?= form_error('opsi2', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div> 
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="opsi3" class="col-sm-12 col-form-label">Opsi C</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="opsi3" name="opsi3">
                                            <?= form_error('opsi3', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div> 
                                   
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="bahasan" class="col-sm-12 col-form-label">Bahasan</label>
                                        <div class="col-lg-10">
                                        <textarea type="text" class="form-control" id="bahasan" name="bahasan" rows="5"></textarea>
                                            <?= form_error('bahasan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div>                              

                                  <div class="form-group row mt-2 ml-3">

                                  </div>



                                  <div class="form-group row mt-2 ml-3">
                                        <div class="col-lg-12 mt-3">
                                            <button type="submit" class="btn btn-warning">Create</button>
                                            <a href="<?= base_url('admin/soal'); ?>" class="btn btn-light">Cancel</a>
                                        </div>
                                   </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- end  -->


           </div>
        
    </div>