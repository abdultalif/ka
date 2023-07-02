<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<script src="<?= base_url('assets/'); ?>vendor/sweetalert2/sweetalert2.min.js"></script>

<script>
  if ($('.pesan-error').data('error')) {
    const flashData = $('.pesan-error').data('error');
    if (flashData) {
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: flashData,
      })
    }
  } else {
    const flashData = $('.pesan-sukses').data('sukses');
    if (flashData) {
      Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: flashData,
      })
    }
  }
</script>
<script>
  $('.alert-message').alert().delay(3000).slideUp('slow');
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#show-pass').click(function() {
      if ($(this).is(':checked')) {
        $('#password').attr('type', 'text');
      } else {
        $('#password').attr('type', 'password');
      }
    });
  });
</script>

</body>

</html>