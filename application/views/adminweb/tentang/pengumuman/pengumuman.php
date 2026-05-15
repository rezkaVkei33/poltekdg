<?php $this->load->view('adminweb/partials/header'); ?>
<!-- Main Content -->
<main class="admin-landing container my-4">
    <!-- Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold" style="color: #7a561f;" id="pageTitle">DATA PENGUMUMAN</h2>
            <p class="text-muted" style="color: #b68b40 !important;" id="pageSubtitle">Kelola, tambah, edit, dan hapus data dengan mudah</p>
        </div>
        <div>
            <a class="btn btn-poltek" href="<?= base_url('pengumuman/tambah_pengumuman'); ?>">
        <i class="bi bi-plus-circle me-2"></i>
        Tambah Data
      </a>
        </div>
    </div>

    <!-- Message -->
    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success text-white alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Table Card -->
    <div class="card-vanilla p-4">
        <div class="table-responsive-custom">
            <table id="dataTable" class="table table-hover align-middle" style="width:100%">
                  <thead style="background-color: #fef8ef; color: #7a561f;">
                    <tr>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Deskripsi</th>
                      <th>Tanggal</th>
                      <th>Penulis</th>
                      <th>Status</th>
                      <th>Tanggal Update</th>
                      <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no=1; ?>
                <?php if(!empty($pengumuman)) : ?>
                    <?php foreach($pengumuman as $data): ?>
                        <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $data->judul; ?></td>
                        <td class="trim-text"><?= $data->isi; ?></td>
                        <td><?= date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <td><?= $data->penulis; ?></td>
                        <td><?= $data->status; ?></td>
                        <td><?= date('d-m-Y', strtotime($data->tanggal_update)); ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('pengumuman/ubah_pengumuman/' . $data->id_pengumuman); ?>" class="btn btn-warning btn-sm"> 
                            <i class="bi bi-pencil-square me-1"></i>
                            Ubah
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus_pengumuman-<?= $data->id_pengumuman; ?>"> 
                            <i class="bi bi-trash me-1"></i>
                            Hapus
                            </button>

                          <!-- Modal Hapus pengumuman -->
                        <div class="modal fade" id="hapus_pengumuman-<?= $data->id_pengumuman; ?>" tabindex="-1" aria-labelledby="modalLabel>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title text-white" id="modalLabel">HAPUS PRODI</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                  </div>
                                  <div class="modal-body text-center">
                                    <p>Apakah Anda yakin ingin <br>
                                    menghapus Prodi <strong><?= $data->judul; ?></strong>?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <a href="<?= base_url('pengumuman/hapus_pengumuman/' . $data->id_pengumuman); ?>" class="btn btn-danger">Ya, Hapus</a> 
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <!-- End Modal Hapus Pengumumman -->
                        </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-danger ">Tidak ada Pengumuman.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
              </table>
        </div>
    </div>
</main>

<script>
  document.querySelectorAll('.trim-text').forEach(cell => {
    const maxLength = 20;
    const text = cell.textContent.trim();
    if (text.length > maxLength) {
      cell.textContent = text.substring(0, maxLength) + '...';
    }
  });
</script>

<script>
  document.querySelectorAll('.modal').forEach(function(modal) {
    new bootstrap.Modal(modal);
  });
</script>

<?php $this->load->view('adminweb/partials/footer'); ?>
