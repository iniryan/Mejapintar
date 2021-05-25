<section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url(<?= base_url('assets/img/stu.jpg') ?> );">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-md-12 ftco-animate text-center">
	              <h1 class="mb-2"><b>Belajar Bersama Kami</b></h1>
	              <h2 class="subheading mb-4">Pelajari Materi Pelajaran Umum</h2>
	              <p><a href="<?= base_url('welcome/registration') ?>" class="btn btn-primary">Ayo Daftar !!</a></p>
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
	              <p><a href="<?= base_url('welcome/registration') ?>" class="btn btn-primary">Ayo Daftar !!</a></p>
	            </div>

	          </div>
	        </div>
	      </div>
	    </div>
    </section>    

    <section class="ftco-section">
      <div class="container">
        <div class="row align-items-center justify-content-center my-2 ">
          <div class="col-lg-8">
                <div class="about_us_text text-center">
                    <h2 class="text-uppercase"><b>Mejapintar</b></h2>
                    <p>Website Sistem Informasi yang menyediakan materi-materi pelajaran umum yang dapat dipelajari oleh para siswa dengan
                    jenjang SD, SMP, dan SMA/K. Alasan mengapa website ini dibuat, karena Kami Mejapintar ingin seluruh anak Indonesia dapat 
                  belajar tanpa harus kesulitan dan tanpa biaya sehingga seluruh anak Indonesia dapat sukses di masa mendatang dan memajukan 
                Indonesia.</p>
                </div>
            </div>
          </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">

        <div class="row align-items-center justify-content-center mb-5 pb-3">
            <div class="col-lg-8">
                <div class="about_us_text text-center">
                    <h2>Belajar Bersama Kami</h2>
                    <p>Raih prestasi dengan pahami secara menyeluruh. Dapatkan berbagai akses ke materi-materi pelajaran yang kamu butuhkan. Kerjakan soal-soal yang akan membantu kamu dalam pembelajaran!! </p>
                    <a href="<?= base_url('welcome/registration'); ?>" class="btn_2">Ayo Daftar</a>
                </div>
            </div>
          </div>

        
    
    <div class="row align-items-center justify-content-center my-5">
          <div class="col-lg-8">
                <div class="about_us_text text-center">
                    <h2>Rekomendasi Materi Pelajaran</h2>
                    <p>Dapatkan berbagai rekomendasi materi pelajaran</p>
                </div>
            </div>
          </div>

        

        <div class="row align-items-center justify-content-center my-3">
          <div class="col-lg-8">
                <div class="about_us_text text-center mt-5 mb-5">
                    <h2>Tonton Video Pelajaran</h2>
                    <p>Belajar lewat visual di setiap materi</p>
                </div>
            </div>
          </div>

      </div>

      <div class="row align-items-center justify-content-center bg-secondary">
          <div class="col-lg-8">
                <div class="about_us_text text-center mt-5 mb-5">
                    <h2>Latihan Dengan Quiz</h2>
                    <p>Test Kemampuanmu dengan quiz mejapintar</p>
                    <p><a href="#daftar"><i class="fas fa-arrow-down fa-7x"></i></a></p>
                </div>
            </div>
          </div>

      <div class="row justify-content-center p-4 bg-primary">
          <div class="col-md-12">
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