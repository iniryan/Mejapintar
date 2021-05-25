<section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url(<?= base_url('assets/img/out.jpg') ?>);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-md-12 ftco-animate text-center">
	              <h1 class="mb-2"><b>Belajar Bersama Kami</b></h1>
	              <h21 class="subheading mb-4">Pelajari Materi SD</h2>
	              
	            </div>

	          </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image: url(<?= base_url('assets/img/man.jpg') ?>);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-sm-12 ftco-animate text-center">
	              <h1 class="mb-2"><b>Pelajaran SD</b></h1>
	              <h2 class="subheading mb-4">Belajar Materi Pelajaran SD</h2>
	              
	            </div>

	          </div>
	        </div>
	      </div>
	    </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-0 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-0 text-uppercase">Materi SD Mejapintar</h2>
            <p>Pilih, Pelajari, dan Pahami secara Menyeluruh</p>
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
                                <div class="tab-content mt-4 " id="myTabContent2">
                                    <div class="tab-pane fade <?= $this->input->post('keyword_math') ? 'show active' : ''; ?>" id="outline-one" role="tabpanel" aria-labelledby="tab-outline-one">
                                        <div class="col-md-12">
                                            <form action="<?= base_url('guest/materi_sd') ?>" method="post">
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
                                                            <a href="#daftar" class="btn btn-link">
                                                                <?= $row['judul_bab']?>
                                                            </a>
                                                        </h5>
                                                </div>
                                            </div>
                                             <?php } ?>
                                        </div>
                                        
                                    </div>
                                    <div class="tab-pane fade mt-4 <?= $this->input->post('keyword_ind') ? 'show active' : ''; ?>" id="outline-two" role="tabpanel" aria-labelledby="tab-outline-two">
                                         <div class="col-md-12">
                                            <form action="<?= base_url('guest/materi_sd') ?>" method="post">
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
                                                            <a href="#daftar" class="btn btn-link">
                                                                <?= $row['judul_bab']?>
                                                            </a>
                                                        </h5>
                                                </div>
                                            </div>
                                             <?php } ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade mt-4 <?= $this->input->post('keyword_english') ? 'show active' : ''; ?>" id="outline-three" role="tabpanel" aria-labelledby="tab-outline-three">
                                        <div class="col-md-12">
                                            <form action="<?= base_url('guest/materi_sd') ?>" method="post">
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
                                                            <a href="#daftar" class="btn btn-link">
                                                                <?= $row['judul_bab']?>
                                                            </a>
                                                        </h5>
                                                </div>
                                            </div>
                                             <?php } ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade mt-4 <?= $this->input->post('keyword_ipa') ? 'show active' : ''; ?>" id="outline-four" role="tabpanel" aria-labelledby="tab-outline-three">
                                        <div class="col-md-12">
                                            <form action="<?= base_url('guest/materi_sd') ?>" method="post">
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
                                                            <a href="#daftar" class="btn btn-link">
                                                                <?= $row['judul_bab']?>
                                                            </a>
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

    <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-primary" id="daftar">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
            <h2 style="font-size: 22px;" class="mb-0">Ayo Gabung dengan Registrasi!!</h2>
            <span>Kamu bisa akses fitur user, kalau kamu registrasi, Buruan!!</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
             <form action="<?= base_url ('welcome/registration'); ?>" class="subscribe-form">
              <div class="d-flex justify-content-center">
                <button class="btn btn-light" href="<?= base_url ('welcome/registration'); ?>">Daftar Sekarang!!</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>