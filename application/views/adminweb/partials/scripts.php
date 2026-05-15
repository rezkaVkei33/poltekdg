<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo base_url('admin-page/assets/scripts.js'); ?>"></script>
<?php
  $swalSuccess = $this->session->flashdata('success');
  $swalError = $this->session->flashdata('error');
?>
<?php if ($swalSuccess || $swalError): ?>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
      icon: '<?= $swalSuccess ? 'success' : 'error'; ?>',
      title: '<?= $swalSuccess ? 'Berhasil' : 'Gagal'; ?>',
      text: <?= json_encode($swalSuccess ?: $swalError); ?>,
      confirmButtonColor: '#7a561f'
    });
  });
</script>
<?php endif; ?>
