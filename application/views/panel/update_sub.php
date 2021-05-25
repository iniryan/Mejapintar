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
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/kategori'); ?>" class="breadcrumb-link2">Kategori</a></li>
                                    <li class=" breadcrumb-item"><span>Update Sub Kategori</span></li>
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
                            <h5 class="card-header">Mejapintar | Update Sub Kategori</h5>
                            <div class="card-body p-0">
                                   
                                   <form method="post" action="<?= base_url('admin/update_sub/'.$detail['id_sub']); ?>">
                                   <div class="form-group row mt-2 ml-3">

                                    <input type="hidden" class="form-control" id="id_sub" name="id_sub" required value="<?= $detail['id_sub']?>">
                                        
                                       <label for="id_kategori" class="col-sm-12 col-form-label">Jenjang</label>
                                        <div class="col-lg-4">
                                        <div class="form-group">
                                            <select name="id_kategori" id="id_kategori" class="form-control">
                                                <option value="">-Pilih Jenjang-</option>
                                                <?php $kategori = $this->db->get('kategori')->result();
                                                foreach ($kategori as $key) : ?>
                                                    <option value="<?= $key->id_kategori;?>"<?=  $key->id_kategori==$detail['id_kategori'] ? 'selected':'' ?>><?= $key->nama_kategori; ?></option>

                                               <?php endforeach; ?>
                                            </select>
                                        </div>
                                        </div>
                                        </div>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="sub_kategori" class="col-sm-12 col-form-label">Sub Kategori</label>
                                        <div class="col-lg-4">
                                        <div class="form-group">
                                        <input type="text" class="form-control" id="sub_kategori" name="sub_kategori" autocomplete="off" value="<?= $detail['sub_kategori']?>">                           
                                        <?= form_error('sub_kategori', '<small class="text-danger pl-3">', '</small>'); ?>

                                        </div>
                                        </div>
                                        </div>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                        <div class="col-lg-12 mt-3">
                                            <button type="submit" class="btn btn-info">Update</button>
                                            <a href="<?= base_url('admin/kategori'); ?>" class="btn btn-light">Cancel</a>
                                        </div>
                                   </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end  -->

            </div>
        
    </div>