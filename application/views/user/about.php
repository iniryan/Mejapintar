<section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url(<?= base_url('assets/img/stu.jpg') ?>);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-md-12 ftco-animate text-center">
	              <h1 class="mb-2"><b>Belajar Bersama Kami</b></h1>
	              <h2 class="subheading mb-4">Pelajari Materi Pelajaran Umum</h2>
	            </div>

	          </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image: url(<?= base_url('assets/img/ui.jpg') ?>);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-sm-12 ftco-animate text-center">
	              <h1 class="mb-2"><b>Kumpulan Materi dan Soal</b></h1>
	              <h2 class="subheading mb-4">Belajar Materi Pelajaran Umum Bersama Kami</h2>
	            </div>

	          </div>
	        </div>
	      </div>
	    </div>
    </section>

    <section>
      <div class="container">
        <div class="row align-items-center justify-content-center mb-5 pb-3 mt-5" > 
            <div class="col-lg-8">
                <div class="about_us_text text-center">
                    <h2><b>Belajar Bersama Kami</b></h2>
                    <p>Raih prestasi dengan pahami secara menyeluruh. Dapatkan berbagai akses ke materi-materi pelajaran yang kamu butuhkan. Kerjakan soal-soal yang akan membantu kamu dalam pembelajaran!! </p>
                    <p>Tersedia berbagai rekomendasi materi pelajaran yang dapat dipelajari yang memudahkan anda
                        memahami berbagai materi dengan mudah dan lancar.</p>
                </div>
            </div>
          </div>      
    
    <!-- <div class="col-xl-5 col-lg-6">
                    <div>
                        <h4 style="border-left: 8px solid #FFCA50;" class="p-3">Kumpulan Rekomendasi Materi<br>
                             yang dapat dipelajari </h4>
                        <p>Tersedia berbagai rekomendasi materi pelajaran yang dapat dipelajari yang memudahkan anda
                        memahami berbagai materi dengan mudah dan lancar.</p>
                      
                    </div>
                </div>
      </div>
 -->
    <!-- <div class="row align-items-center justify-content-center">
          <div class="col-lg-8">
                <div class="about_us_text text-center mt-5 mb-5">
                    <h2>Latihan Dengan Quiz</h2>
                    <p>Test Kemampuanmu dengan quiz mejapintar</p>
                    <p><a href="<?= base_url('user/quiz') ?>"><i class="fas fa-arrow-down fa-7x"></i></a></p>
                </div>
            </div>
          </div>
      </div> -->
    </section>

    <section class="ftco-section">
    	<div class="container">

      <div class="row justify-content-center py-4 bg-primary">
          <div class="col-md-10">
            <div class="row">
              <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" style="font-size: 30px; color: #000;"><?= $this->db->count_all('mejauser') - 1; ?></strong>
                    <p>
                    <span style="font-size: 20px; color: #000;">Pengguna</span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" style="font-size: 30px; color: #000;"><?= $this->db->count_all('materi'); ?></strong>
                    <p>
                    <span style="font-size: 20px; color: #000;">Materi</span>
            </p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" style="font-size: 30px; color: #000;"><?= $this->db->count_all('soal'); ?></strong>
                    <p>
                    <span style="font-size: 20px; color: #000;">Soal</span>
                  </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>

    <section class="ftco-section testimony-section">
      <div class="container">

        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Feedback</h2>
          </div>
        </div>


<div class="row ftco-animate">
          <div class="col-md-12">

            <div class="carousel-testimony owl-carousel">
               <?php foreach ($feedback as $row) { ?>
                <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  
                  <div class="user-img mb-5" style="background-image: url(<?= base_url('assets/img/').$row['foto'] ?>)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line"><?= $row['isi_feed'] ?></p>
                    <p class="name"><?= $row['username']?></p>
                  </div>
                  
                </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
          </div>
    </section>

    <section class="ftco-section"  style="background: #f0f0f0;">
    	<div class="container">
    		<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Send Feedback To Us</h2>
          </div>
        </div>
    		<div class="card-body p-0">
                                   <div class="col-lg-6">
                                        <?= $this->session->flashdata('messagefeed'); ?>
                                   </div>
                                   <?= form_open_multipart('user/create_feedback'); ?>

                                   <div class="form-group row mt-2 ml-3">
                                       <label for="nama_mapel" class="col-sm-12 col-form-label">Title</label>
                                        <div class="col-md-4">
                                        <input type="text" class="form-control" id="judul_feedback" name="judul_feedback" required placeholder="title">
                                            <?= form_error('judul_feedback', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div>
                                   <div class="form-group row mt-1 ml-3">
                                       <label for="isi_feed" class="col-sm-12 col-form-label">Feedback</label>
                                        <div class="col-md-10">
                                        <textarea type="text" class="form-control" id="isi_feed" name="isi_feed" rows="12" placeholder="type here.."></textarea>
                                            <?= form_error('isi_feed', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div> 
                                  <div class="form-group row mt-2 ml-3">
                                        <div class="col-lg-12 mt-3">
                                            <button type="submit" class="btn btn-warning">Create</button>
                                        </div>
                                   </div>
                                 <?php form_close() ?>
                            </div>
    	</div>
    </section>