<section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url(<?= base_url('assets/img/aedi3.jpg') ?>);">
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

	      <div class="slider-item" style="background-image: url(<?= base_url('assets/img/book.jpg') ?>);">
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

  <section class="ftco-section ftco-degree bg-light">
      <div class="container">

            <div class="row align-items-center justify-content-center mb-5">
            <div class="col-lg-8">
                  <div class="text-center">
                      <h2><b>Materi Pelajaran</b></h2>
                      <p>Ayo belajar ! Pilih Jenjangmu !</p>
                  </div>
              </div>
            </div>

        <div class="row no-gutters ftco-services">

          <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <a href="<?= base_url('user/materi_sd') ?>">
              <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                <span><h5 class="heading mt-2"><b>SD</b></h5></span>
              </div>
              </a>
            </div>      
          </div>

          <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <a href="<?= base_url('user/materi_smp') ?>">
              <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
                <span><h5 class="heading mt-2"><b>SMP</b></h5></span>
              </div>
              </a>
            </div>  
          </div>

          <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <a href="<?= base_url('user/materi_smak') ?>">
              <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                <span><h5 class="heading mt-2"><b>SMA/K</b></h5></span>
              </div>
              </a>
            </div>   
          </div>

        </div>
      </div>
    </section> 
  

    <section class="ftco-section">
      <div class="container">
        <div class="row ftco-animate">
          
          <div class="col-xl-5 col-lg-6">
                    <div>
                        <h4 style="border-left: 8px solid #FFCA50;" class="p-2">Kumpulan Rekomendasi Materi<br>
                             yang dapat dipelajari </h4>
                        <p>Tersedia berbagai rekomendasi materi pelajaran yang dapat dipelajari yang memudahkan anda
                        memahami berbagai materi dengan mudah dan lancar.</p>
                      
                    </div>
                </div>

          <div class="col-xl-7 col-lg-6">
            <div class="carousel-testimony owl-carousel">
               <?php 
               $query = $this->db->get('materi');
               foreach ($query->result_array() as $row) { 
               if ($row['recomended'] != 0) { ?>
                <div class="item">
                <div class="testimony-wrap p-3 pb-5">
                  
                  
                  <div class="text text-center">
                    <p class="mb-5 line"><?= $row['nama_mapel'];  ?></p>
                    
                    <p class="name" style="font-size: 14px;"><?= word_limiter($row['judul_bab'], 4)?></p>
                    <p class="mt-2"> 
                      <a href="<?= base_url('user/materi/').$row['nama_mapel'].'/'.$row['id_materi']; ?>">
                      <button class="btn btn-primary" style="font-size: 14px;">Baca</button>
                      </a>
                    </p>
                  </div>
                  
                </div>
                </div>
                <?php }} ?>
              </div>
          </div>
        </div>
      </div>
    </section>

  <section class="ftco-section ftco-degree bg-light">
      <div class="container">

        <div class="row align-items-center justify-content-center mb-5">
            <div class="col-lg-8">
                  <div class="about_us_text text-center">
                      <h2><b>QUIZ</b></h2>
                      <p>Mulai belajar dengan quiz di Mejapintar</p>
                  </div>
              </div>
            </div>

        <div class="row no-gutters ftco-services">
          
          <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <a href="<?= base_url('user/quiz_sd') ?>">
              <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                <span><h5 class="heading mt-2"><b>SD</b></h5></span>
              </div>
              </a>
            </div>      
          </div>

          <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <a href="<?= base_url('user/quiz_smp') ?>">
              <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
                <span><h5 class="heading mt-2"><b>SMP</b></h5></span>
              </div>
              </a>
            </div>  
          </div>

          <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <a href="<?= base_url('user/quiz_smak') ?>">
              <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                <span><h5 class="heading mt-2"><b>SMA/K</b></h5></span>
              </div>
              </a>
            </div>   
          </div>

        </div>
      </div>
    </section> 

    <section class="ftco-section">
      <div class="container"> 
            <h3 style="border-left: 8px solid #FFCA50;" class="p-2">Tips dan Berita</h3>
            <p>Tips belajar dan berita seputar pendidikan</p>


        <div class="row ftco-animate mt-4">
                <div class="col-md-12">
              <div class="carousel-testimony owl-carousel">
                <?php 
               $query = $this->db->order_by('date', 'desc')->get('news')->result_array();
               foreach ($query as $row) { 
                $banyak_komen = $this->db->get_where('comment', ['id_news' => $row['id_news']])->num_rows();; ?>
                <div class="item">  
                
                <div class="card">
                    <img class="card-img-top" src="<?= base_url('assets/img/').$row['gambar'] ?>" alt="Card image cap">
                      <div class="card-body">
                          <h5 class="card-title"><b><?= word_limiter($row['judul'], 5) ?></b></h5>

                          <a href="<?= base_url('user/news/').$row['judul'].'/'.$row['id_news']; ?>">
                          <button class="btn btn-primary mb-1 float-right" style="font-size: 14px;">Baca</button>
                          </a>
                          <div class="text-capitalize"><?= $row['tipe'] ?></div>
                          <div class="meta">
                                    <div><span class="small text-muted mr-0">Upload </span><time class="timeago small text-muted mr-0" datetime="<?= $row['date'] ?>" title="July 17, 2008">11 years ago</time></div>
                                    <div><span class="icon-chat"></span> <?= $banyak_komen; ?></div>
                                  </div>
                          
                      </div>
                </div>

                </div>
                <?php } ?>
              </div>
            </div>
        </div>

        </div>
    </section>

    
   