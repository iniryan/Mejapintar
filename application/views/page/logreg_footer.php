	</div>
	
	<script src="<?= base_url('assets/') ?>aset/jquery/jquery-3.3.1.min.js"></script>

	<script src="<?= base_url('assets/') ?>aset/bootstrap/js/popper.js"></script>

	<script src="<?= base_url('assets/') ?>aset/bootstrap/js/bootstrap.min.js"></script>

	<script src="<?= base_url('assets/') ?>aset/select2/select2.min.js"></script>

	<script src="<?= base_url('assets/') ?>asetendor/tilt/tilt.jquery.min.js"></script>

	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

	<script src="<?= base_url('assets/') ?>aset/js/mainlogin.js"></script>
	<script src="<?= base_url('assets/') ?>aset/assets/plugins/sweetalert2/sweetalert2.min.js"></script>

  <script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

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





