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
                                    <li class=" breadcrumb-item"><span>Create Materi</span></li>
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
                            <h5 class="card-header">Mejapintar | Create Materi</h5>
                            <div class="card-body p-0">
                                  <?= form_open_multipart('admin/create_materi'); ?>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="nama_mapel" class="col-sm-12 col-form-label">Nama Mapel</label>
                                        <div class="col-lg-4">
                                          <input type="hidden" class="form-control" id="id_materi" name="id_materi" required>
                                        <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" required>
                                            <?= form_error('nama_mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div>
                                          <label for="id_sub" class="col-sm-12 col-form-label ml-3">Kategori</label>
                                        <div class="form-group row mt-2 ml-3 col-lg-4">
                                            <select name="id_sub" id="id_sub" class="form-control">
                                                <option value="">-Pilih Sub Kategori-</option>
                                                <?php
                                                foreach ($subkategori->result() as $key) : ?>
                                                    <option value="<?= $key->id_sub;?>"><?= $key->sub_kategori.' - '.$key->nama_kategori?></option>

                                               <?php endforeach; ?>
                                            </select>
                                        </div>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="judul_bab" class="col-sm-12 col-form-label">Judul Bab</label>
                                        <div class="col-lg-4">
                                        <input type="text" class="form-control" id="judul_bab" name="judul_bab">
                                            <?= form_error('judul_bab', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="image" class="col-sm-12 col-form-label">Gambar Materi</label>
                                        <div class="col-lg-4">
                                        <input type="file" class="form-control" id="image" name="image">
                                        </div>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="isi_materi" class="col-sm-12 col-form-label">Isi Materi</label>
                                        <div class="col-lg-10">
                                        <textarea type="text" class="form-control ckeditor" id="ckeditor" name="isi_materi" rows="25"></textarea>
                                            <?= form_error('isi_materi', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div> 
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="video" class="col-sm-12 col-form-label">Url Video</label>
                                        <div class="col-lg-10">
                                        <textarea type="text" class="form-control ckeditor" id="ckeditor4" name="video" rows="5"></textarea>
                                            <?= form_error('video', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div> 
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="rangkuman" class="col-sm-12 col-form-label">Rangkuman</label>
                                        <div class="col-lg-10">
                                        <textarea type="text" class="form-control ckeditor" id="ckeditor3" name="rangkuman" rows="25"></textarea>
                                            <?= form_error('rangkuman', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div>    
                                                           

                                  <div class="form-group row mt-2 ml-3">

                                  </div>



                                  <div class="form-group row mt-2 ml-3">
                                        <div class="col-lg-12 mt-3">
                                            <button type="submit" class="btn btn-warning">Create</button>
                                            <a href="<?= base_url('admin/materi'); ?>" class="btn btn-light">Cancel</a>
                                        </div>
                                   </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- end  -->

            </div>
        
    </div>