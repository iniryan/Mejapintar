</div>
  <footer class="main-footer text-center">
    <!-- <strong>Made With Ryan Adi Saputra at SMKN 4 Malang</strong> -->
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-light-primary">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script src="<?= base_url('assets/') ?>ckeditor/ckeditor.js"></script>




<script src="<?= base_url('assets/') ?>aset/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url('assets/') ?>aset/assets/plugins/sweetalert2/sweetalert2.min.js"></script>

<script src="base_url('assets/') ?>aset/assets/plugins/daterangepicker/daterangepicker.js"></script>

<script src="<?= base_url('assets/') ?>aset/assets/plugins/toastr/toastr.min.js"></script>

<script src="<?= base_url('assets/') ?>aset/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?= base_url('assets/') ?>jquerytimeago/jquery.timeago.js"></script>

<script src="<?= base_url('assets/') ?>aset/assets/dist/js/adminlte.js"></script>

<!-- <script type="text/javascript">
  $(document).ready(function() {
    CKEDITOR.replace( 'ckeditor' ,{
      filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
      filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
      filebrowserImageBrowseUrl : 'filemanager/dialog.php?type=1&editor=ckeditor&fldr='
    });

  });
</script> -->

<script type="text/javascript">
  $(function() {

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


<script type="text/javascript">
  $(document).ready( function () {

    $('#User').DataTable({
        columnDefs: [
          {
            "searchable": false,
            "orderable": false,
            "targets": [0, 7]
          }
        ],
        "order": [1, "asc"]
    });

    $('#Materi').DataTable({
        columnDefs: [
          {
            "searchable": false,
            "orderable": false,
            "targets": [0, 6, 7]
          }
        ],
        "order": [1, "asc"]
    });

    $('#Soal').DataTable({
        columnDefs: [
          {
            "searchable": false,
            "orderable": false,
            "targets": [0, 7]
          }
        ],
        "order": [1, "asc"]
    });

     $('#News').DataTable({
        columnDefs: [
          {
            "searchable": false,
            "orderable": false,
            "targets": [0, 5]
          }
        ],
        "order": [1, "asc"]
    });

    $('#Sub').DataTable({
        columnDefs: [
          {
            "searchable": false,
            "orderable": false,
            "targets": [0, 5]
          }
        ],
        "order": [1, "asc"]
    });

    $('#Feedback').DataTable({
        columnDefs: [
          {
            "searchable": false,
            "orderable": false,
            "targets": [0, 5]
          }
        ],
        "order": [1, "asc"]
    });

    $('#Comment').DataTable({
        columnDefs: [
          {
            "searchable": false,
            "orderable": false,
            "targets": [0, 6]
          }
        ],
        "order": [1, "asc"]
    });

    $('#Comment2').DataTable({
        columnDefs: [
          {
            "searchable": false,
            "orderable": false,
            "targets": [0, 6]
          }
        ],
        "order": [1, "asc"]
    });

    $('#Disscuss').DataTable({
        columnDefs: [
          {
            "searchable": false,
            "orderable": false,
            "targets": [0, 5]
          }
        ],
        "order": [1, "asc"]
    });



  });
</script>


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
