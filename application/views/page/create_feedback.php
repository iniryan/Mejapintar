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
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/feedback'); ?>" class="breadcrumb-link2">Feedback</a></li>
                                    <li class=" breadcrumb-item"><span>Create Feedback</span></li>
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
                            <h5 class="card-header">Mejapintar | Create Feedback</h5>
                            <div class="card-body p-0">
                                   <div class="col-lg-6">
                                        <?= $this->session->flashdata('messagefeed'); ?>
                                   </div>
                                   <?= form_open_multipart('admin/create_feedback'); ?>

                                   <div class="form-group row mt-2 ml-3">
                                       <label for="nama_mapel" class="col-sm-12 col-form-label">Title</label>
                                        <div class="col-lg-4">
                                        <input type="text" class="form-control" id="judul_feedback" name="judul_feedback" required>
                                            <?= form_error('judul_feedback', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div>
                                   <div class="form-group row mt-2 ml-3">
                                       <label for="isi_feed" class="col-sm-12 col-form-label">Feedback</label>
                                        <div class="col-lg-10">
                                        <textarea type="text" class="form-control" id="isi_feed" name="isi_feed" rows="25"></textarea>
                                            <?= form_error('isi_feed', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div>                                

                                  <div class="form-group row mt-2 ml-3">
                                        <div class="col-lg-12 mt-3">
                                            <button type="submit" class="btn btn-warning">Create</button>
                                            <a href="<?= base_url('admin/feedback'); ?>" class="btn btn-light">Cancel</a>
                                        </div>
                                   </div>
                                 <?php form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end  -->

            </div>
        
    </div>