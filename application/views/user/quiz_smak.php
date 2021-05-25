<div class="page-header">
                        <div class="page-breadcrumb p-2">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url('user/quiz'); ?>" class="breadcrumb-link text-secondary">Quiz</a></li>
                                    <li class=" breadcrumb-item"><span>Quiz SMAK</span></li>
                                </ol>
                            </nav>
                        </div>
                    </div>

<section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-0 pb-2">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-0 text-uppercase">Quiz SMA/K Mejapintar</h2>
            <p>Latihan bareng Mejapintar</p>
          </div>
        </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
                            <div class="tab-outline">
                                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link <?= $this->input->post('keyword_math') ? 'active' : ''; ?>" style="font-size: 18px;" id="tab-outline-one" data-toggle="tab" href="#outline-one" role="tab" aria-controls="home" aria-selected="true">Matematika</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?= $this->input->post('keyword_ind') ? 'active' : ''; ?>" style="font-size: 18px;" id="tab-outline-two" data-toggle="tab" href="#outline-two" role="tab" aria-controls="profile" aria-selected="false">Bahasa Indonesia</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?= $this->input->post('keyword_english') ? 'active' : ''; ?>" style="font-size: 18px;" id="tab-outline-three" data-toggle="tab" href="#outline-three" role="tab" aria-controls="profile" aria-selected="false">Bahasa Inggris</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?= $this->input->post('keyword_ipa') ? 'active' : ''; ?>" style="font-size: 18px;" id="tab-outline-four" data-toggle="tab" href="#outline-four" role="tab" aria-controls="contact" aria-selected="false">IPA</a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-4" id="myTabContent2">
                                    <div class="tab-pane fade <?= $this->input->post('keyword_math') ? 'show active' : ''; ?>" id="outline-one" role="tabpanel" aria-labelledby="tab-outline-one">
                                        <div class="col-md-12">
                                            <form action="<?= base_url('user/materi_smak') ?>" method="post">
                                                <div class="form-group mt-2">
                                                  <input type="text" class="form-control" name="keyword_math" placeholder="Search..." autocomplete="off">
                                                </div>
                                            </form>
                                            <?php 
                                            if(!$matematika){ ?>
                                                <div class="card p-1 mb-3">
                                                <div class="card-header">
                                                        <h5 class="mb-0">
                                                            Data not found
                                                        </h5>
                                                </div>
                                            </div>
                                            <?php }
                                            foreach ($matematika as $row) { ?>
                                            <div class="card p-1 mb-3">
                                                <div class="card-header">
                                                        <h5 class="mb-0">
                                                       <?php $sudah_mengerjakan = $this->db->get_where('record',['id_user'=>$user['id_user'], 'id_materi'=>$row['id_materi']])->row_array(); if(!isset($sudah_mengerjakan)): ?>

                                                            <a href="<?= base_url('user/quiz_begin/').$row['id_sub'].'/'.$row['id_materi']?>" class="btn btn-link">
                                                                    <?= $row['judul_bab'];?>
                                                            </a>

                                                            <?php else :

                                                                if($sudah_mengerjakan['nilai']<80) {
                                                            ?>

                                                            <a href="<?= base_url('user/quiz_begin/').$row['id_sub'].'/'.$row['id_materi']?>" class="btn btn-link" onclick="return confirm('Nilai dibawah kkm! kamu bisa mengerjakan lagi namun nilai akan dianggap sebagai remedial dan tidak akan menambah exp!')">
                                                                    <?= $row['judul_bab'];?>
                                                            </a> 

                                                            <?php } else { ?>

                                                            <a href="#" class="btn btn-link" onclick="return alert('Nilai diatas kkm! kamu tidak perlu mengerjakan lagi! coba kerjakan yang lain!!')">
                                                                    <?= $row['judul_bab'];?>
                                                            </a> 

                                                            <?php } ?>

                                                            <span class="text-success float-right">Sudah Mengerjakan</span>                                                            
                                                        <?php endif; ?>
                                                        </h5>
                                                </div>
                                            </div>
                                             <?php } ?>
                                        </div>
                                        
                                    </div>
                                    <div class="tab-pane fade mt-4 <?= $this->input->post('keyword_ind') ? 'show active' : ''; ?>" id="outline-two" role="tabpanel" aria-labelledby="tab-outline-two">
                                         <div class="col-md-12">
                                            <form action="<?= base_url('user/materi_smak') ?>" method="post">
                                                <div class="form-group mt-2">
                                                  <input type="text" class="form-control" name="keyword_ind" placeholder="Search..." autocomplete="off">
                                                </div>
                                            </form>
                                            <?php 
                                            if(!$indonesia){ ?>
                                                <div class="card p-1 mb-3">
                                                <div class="card-header">
                                                        <h5 class="mb-0">
                                                            Data not found
                                                        </h5>
                                                </div>
                                            </div>
                                            <?php } 
                                            foreach ($indonesia as $row) { ?>
                                            <div class="card p-1 mb-3">
                                                <div class="card-header">
                                                        <h5 class="mb-0">
                                                       <?php $sudah_mengerjakan = $this->db->get_where('record',['id_user'=>$user['id_user'], 'id_materi'=>$row['id_materi']])->row_array(); if(!isset($sudah_mengerjakan)): ?>

                                                            <a href="<?= base_url('user/quiz_begin/').$row['id_sub'].'/'.$row['id_materi']?>" class="btn btn-link">
                                                                    <?= $row['judul_bab'];?>
                                                            </a>

                                                            <?php else :

                                                                if($sudah_mengerjakan['nilai']<80) {
                                                            ?>

                                                            <a href="<?= base_url('user/quiz_begin/').$row['id_sub'].'/'.$row['id_materi']?>" class="btn btn-link" onclick="return confirm('Nilai dibawah kkm! kamu bisa mengerjakan lagi namun nilai akan dianggap sebagai remedial dan tidak akan menambah exp!')">
                                                                    <?= $row['judul_bab'];?>
                                                            </a> 

                                                            <?php } else { ?>

                                                            <a href="#" class="btn btn-link" onclick="return alert('Nilai diatas kkm! kamu tidak perlu mengerjakan lagi! coba kerjakan yang lain!!')">
                                                                    <?= $row['judul_bab'];?>
                                                            </a> 

                                                            <?php } ?>

                                                            <span class="text-success float-right">Sudah Mengerjakan</span>                                                            
                                                        <?php endif; ?>
                                                        </h5>
                                                </div>
                                            </div>
                                             <?php } ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade mt-4 <?= $this->input->post('keyword_english') ? 'show active' : ''; ?>" id="outline-three" role="tabpanel" aria-labelledby="tab-outline-three">
                                        <div class="col-md-12">
                                            <form action="<?= base_url('user/materi_smak') ?>" method="post">
                                                <div class="form-group mt-2">
                                                  <input type="text" class="form-control" name="keyword_english" placeholder="Search..." autocomplete="off">
                                                </div>
                                            </form>
                                            <?php 
                                            if(!$english){ ?>
                                                <div class="card p-1 mb-3">
                                                <div class="card-header">
                                                        <h5 class="mb-0">
                                                            Data not found
                                                        </h5>
                                                </div>
                                            </div>
                                            <?php }
                                            foreach ($english as $row) { ?>
                                            <div class="card p-1 mb-3">
                                                <div class="card-header">
                                                        <h5 class="mb-0">
                                                       <?php $sudah_mengerjakan = $this->db->get_where('record',['id_user'=>$user['id_user'], 'id_materi'=>$row['id_materi']])->row_array(); if(!isset($sudah_mengerjakan)): ?>

                                                            <a href="<?= base_url('user/quiz_begin/').$row['id_sub'].'/'.$row['id_materi']?>" class="btn btn-link">
                                                                    <?= $row['judul_bab'];?>
                                                            </a>

                                                            <?php else :

                                                                if($sudah_mengerjakan['nilai']<80) {
                                                            ?>

                                                            <a href="<?= base_url('user/quiz_begin/').$row['id_sub'].'/'.$row['id_materi']?>" class="btn btn-link" onclick="return confirm('Nilai dibawah kkm! kamu bisa mengerjakan lagi namun nilai akan dianggap sebagai remedial dan tidak akan menambah exp!')">
                                                                    <?= $row['judul_bab'];?>
                                                            </a> 

                                                            <?php } else { ?>

                                                            <a href="#" class="btn btn-link" onclick="return alert('Nilai diatas kkm! kamu tidak perlu mengerjakan lagi! coba kerjakan yang lain!!')">
                                                                    <?= $row['judul_bab'];?>
                                                            </a> 

                                                            <?php } ?>

                                                            <span class="text-success float-right">Sudah Mengerjakan</span>                                                            
                                                        <?php endif; ?>
                                                        </h5>
                                                </div>
                                            </div>
                                             <?php } ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade mt-4 <?= $this->input->post('keyword_ipa') ? 'show active' : ''; ?>" id="outline-four" role="tabpanel" aria-labelledby="tab-outline-three">
                                        <div class="col-md-12">
                                            <form action="<?= base_url('user/materi_smak') ?>" method="post">
                                                <div class="form-group mt-2">
                                                  <input type="text" class="form-control" name="keyword_ipa" placeholder="Search..." autocomplete="off">
                                                </div>
                                            </form>
                                            <?php 
                                            if(!$ipa){ ?>
                                                <div class="card p-1 mb-3">
                                                <div class="card-header">
                                                        <h5 class="mb-0">
                                                            Data not found
                                                        </h5>
                                                </div>
                                            </div>
                                            <?php }
                                            foreach ($ipa as $row) { ?>
                                            <div class="card p-1 mb-3">
                                                <div class="card-header">
                                                        <h5 class="mb-0">
                                                      <?php $sudah_mengerjakan = $this->db->get_where('record',['id_user'=>$user['id_user'], 'id_materi'=>$row['id_materi']])->row_array(); if(!isset($sudah_mengerjakan)): ?>

                                                            <a href="<?= base_url('user/quiz_begin/').$row['id_sub'].'/'.$row['id_materi']?>" class="btn btn-link">
                                                                    <?= $row['judul_bab'];?>
                                                            </a>

                                                            <?php else :

                                                                if($sudah_mengerjakan['nilai']<80) {
                                                            ?>

                                                            <a href="<?= base_url('user/quiz_begin/').$row['id_sub'].'/'.$row['id_materi']?>" class="btn btn-link" onclick="return confirm('Nilai dibawah kkm! kamu bisa mengerjakan lagi namun nilai akan dianggap sebagai remedial dan tidak akan menambah exp!')">
                                                                    <?= $row['judul_bab'];?>
                                                            </a> 

                                                            <?php } else { ?>

                                                            <a href="#" class="btn btn-link" onclick="return alert('Nilai diatas kkm! kamu tidak perlu mengerjakan lagi! coba kerjakan yang lain!!')">
                                                                    <?= $row['judul_bab'];?>
                                                            </a> 

                                                            <?php } ?>

                                                            <span class="text-success float-right">Sudah Mengerjakan</span>                                                            
                                                        <?php endif; ?>
                                                        </h5>
                                                </div>
                                            </div>
                                             <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
    </section>

    <!-- <section class="ftco-section">
      <div class="container">
        <div class="row no-gutters ftco-services">
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">   
      
              <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                <span><h6 class="heading mt-2"><b style="color: #000;">Matematika</b></h6></span>
              </div>
              <a href="<?= base_url('user/quiz_begin/'). '33'?>" class="btn btn-primary">
                    Mulai
              </a>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
                <span><h6 class="heading mt-2"><b style="color: #000;">Bahasa Indonesia</b></h6></span>
              </div>
              <a href="<?= base_url('user/quiz_begin/'). '36'?>" class="btn btn-primary">
                    Mulai
              </a>
            </div>    
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                <span><h6 class="heading mt-2"><b style="color: #000;">Bahasa Inggris</b></h6></span>
              </div>
              <a href="<?= base_url('user/quiz_begin/'). '39'?>" class="btn btn-primary">
                    Mulai
              </a>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                <span><h5 class="heading mt-2"><b>IPA</b></h5></span>
              </div>
              <a href="<?= base_url('user/quiz_begin/'). '42'?>" class="btn btn-primary">
                    Mulai
              </a>
            </div>      
          </div>
        </div>
      </div>
    </section> -->
