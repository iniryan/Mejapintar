


<footer class="ftco-footer ftco-section bg-primary" style="color: #000;">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4" >
              <h2 class="ftco-heading-2" style="color: #000;"><b>Mejapintar</b></h2>
              <p>Web Edukasi yang memudahkan generasi muda untuk belajar berbagai materi pelajaran umum dengan kumpulan materi yang banyak macamnya</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="https://github.com/iniryan/"><span class="icon-github" style="color: #000;"></span></a></li>
                <li class="ftco-animate"><a href="https://www.facebook.com/ryan.adi.7906"><span class="icon-facebook" style="color: #000;"></span></a></li>
                <li class="ftco-animate"><a href="https://www.instagram.com/ryanadi_552/"><span class="icon-instagram" style="color: #000;"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              
            </div>
          </div>
          <div class="col-md" >
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2" style="color: #000;">Contact</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><a href="#"><span class="icon icon-map-marker" style="color: #000;"></span><span class="text" style="color: #000;">Jl. Simpang Sulfat Utara XI A No. 58 E</span></a></li>
	                <li><a href="#"><span class="icon icon-phone" style="color: #000;"></span><span class="text" style="color: #000;">+62 83877534525</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope" style="color: #000;"></span><span class="text" style="color: #000;">belajardenganmejapintar@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>

     

        <div class="row">
          <div class="col-md-12 text-center">

            <p class="mt-3">Development by Ryan Adi Saputra at SMKN 4 Malang tercinta <i class="icon-heart color-danger" aria-hidden="true"></i></p>
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>


          </div>
        </div> </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>




  
  <script src="<?= base_url('assets/'); ?>new/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?= base_url('assets/'); ?>new/js/popper.min.js"></script>
  <script src="<?= base_url('assets/'); ?>new/js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/'); ?>new/js/jquery.easing.1.3.js"></script>
  <script src="<?= base_url('assets/'); ?>new/js/jquery.waypoints.min.js"></script>
  <script src="<?= base_url('assets/'); ?>new/js/jquery.stellar.min.js"></script>
  <script src="<?= base_url('assets/'); ?>new/js/owl.carousel.min.js"></script>
  <script src="<?= base_url('assets/'); ?>new/js/jquery.magnific-popup.min.js"></script>
  <script src="<?= base_url('assets/'); ?>new/js/aos.js"></script>
  <script src="<?= base_url('assets/'); ?>new/js/jquery.animateNumber.min.js"></script>
  <script src="<?= base_url('assets/'); ?>new/js/bootstrap-datepicker.js"></script>
  <script src="<?= base_url('assets/'); ?>new/js/scrollax.min.js"></script>
  <script src="<?= base_url('assets/'); ?>new/js/google-map.js"></script>
  <script src="<?= base_url('assets/'); ?>new/js/main.js"></script>
  <script src="<?= base_url('assets/') ?>jquerytimeago/jquery.timeago.js"></script>
  <script src="<?= base_url('assets/') ?>aset/assets/plugins/sweetalert2/sweetalert2.min.js"></script>

  <script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    jQuery("time.timeago").timeago();

    <?php
    if ($this->session->flashdata()) : ?>
      Toast.fire({
        type: '<?= $this->session->flashdata('type') ?>',
        title: '<?= $this->session->flashdata('msg') ?>'
      })
    <?php endif; ?>
    
  });
  
</script>
    
  </body>
</html>