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
                                    <li class=" breadcrumb-item"><span>Update News</span></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Mejapintar | Update News</h5>
                            <div class="card-body p-0">
                                   
                                   <?= form_open_multipart('admin/update_news/'.$detail['id_news']); ?>

                                   <input type="hidden" class="form-control" id="id_news" name="id_news" required value="<?= $detail['id_news']?>">

                                   <div class="form-group row mt-2 ml-3">
                                       <label for="judul" class="col-sm-12 col-form-label">Title</label>
                                        <div class="col-lg-4">
                                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $detail['judul']; ?>" required>
                                        </div>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="tipe" class="col-sm-12 col-form-label">Tipe</label>
                                        <div class="col-lg-4">
                                        <select name="tipe" id="tipe" class="form-control" value="<?=  $detail['tipe']?>" required>
                                                <option value="">-Pilih Tipe-</option>
                                                <option <?= $detail['tipe']=='tips' ? 'selected' : ''; ?> value="tips">Tips</option>
                                                <option <?= $detail['tipe']=='berita' ? 'selected' : ''; ?> value="berita">Berita</option>
                                            </select>
                                        </div>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="gambar" class="col-sm-12 col-form-label">Gambar</label>
                                        <div class="col-lg-4">
                                    <?php if(!empty($detail['gambar'])) : ?>
                                        <img src="<?= base_url('assets/img/').$detail['gambar'] ; ?>">
                                   <?php endif; ?>
                                        <input type="file" class="form-control" id="gambar" name="gambar" value="<?= $detail['gambar']?>">
                                        </div>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="konten" class="col-sm-12 col-form-label">Konten</label>
                                        <div class="col-lg-10">
                                        <textarea type="text" class="form-control ckeditor" id="ckeditor6" name="konten" rows="25"><?= $detail['konten']; ?></textarea>
                                        <?= form_error('konten', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div>

                                  <div class="form-group row mt-2 ml-3">
                                        <div class="col-lg-12 mt-3">
                                            <button type="submit" class="btn btn-warning">Update</button>
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