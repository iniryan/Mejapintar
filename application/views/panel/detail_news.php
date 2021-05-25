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
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/news'); ?>" class="breadcrumb-link2">News</a></li>
                                    <li class=" breadcrumb-item"><span>Detail News</span></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Mejapintar | Detail News</h5>
                            <div class="card-body p-0">
                                   <div class="col-lg-6">
                                        <?= $this->session->flashdata('messagenews'); ?>
                                   </div>
                                   <?= form_open_multipart('admin/detail_news'); ?>

                                   <div class="form-group row mt-2 ml-3">
                                       <label for="date" class="col-sm-12 col-form-label">Date Created : <?= $detail['date']; ?></label>
                                   </div>

                                   <div class="form-group row mt-2 ml-3">
                                       <label for="judul" class="col-sm-12 col-form-label">Title</label>
                                        <div class="col-lg-4">
                                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $detail['judul']; ?>" readonly>
                                        </div>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="tipe" class="col-sm-12 col-form-label">Tipe</label>
                                        <div class="col-lg-4">
                                        <input type="text" class="form-control" id="tipe" name="tipe" readonly value="<?= $detail['tipe']; ?>">
                                        </div>
                                   </div>
                                    <?php if(!empty($detail['gambar'])) : ?>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="gambar" class="col-sm-12 col-form-label">Gambar</label>
                                        <div class="col-lg-4">
                                        <img src="<?= base_url('assets/img/').$detail['gambar'] ; ?>">
                                        </div>
                                   </div>
                                   <?php endif; ?>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="konten" class="col-sm-12 col-form-label">Konten</label>
                                        <div class="col-lg-10">
                                        <textarea type="text" class="form-control ckeditor" id="ckeditor6" name="konten" rows="25" readonly><?= $detail['konten']; ?></textarea>
                                        </div>
                                   </div>

                                  <div class="form-group row mt-2 ml-3">
                                        <div class="col-lg-12 mt-3">
                                            
                                            <a href="<?= base_url('admin/news'); ?>" class="btn btn-light">Kembali</a>
                                        </div>
                                   </div>
                                 <?php form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>


</div>
</div>