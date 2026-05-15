<?php $this->load->view('adminweb/partials/header'); ?>
<!-- Main Content -->
<main class="admin-landing container my-4">
    <!-- Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold" style="color: #7a561f;" id="pageTitle">Data Pengguna</h2>
            <p class="text-muted" style="color: #b68b40 !important;" id="pageSubtitle">Lengkapi form berikut sesuai data yang dibutuhkan</p>
        </div>
    </div>

    <!-- Message -->
    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success text-white alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row g-4">
        <div class="col-lg-7">
            <div class="card-vanilla p-4 h-100">
                <div class="table-responsive-custom">
                    <table id="dataTable" class="table table-hover align-middle" style="width:100%">
                                  <thead style="background-color: #fef8ef; color: #7a561f;">
                                    <tr>
                                      <th>No</th>
                                      <th>Nama Lengkap</th>
                                      <th>Username</th>
                                      <th>Role</th>
                                      <th>Aksi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php $no = 1; ?>
                                    <?php if (!empty($users)): ?>
                                        <?php foreach ($users as $user): ?>
                                    <tr>
                                      <td class="text-center" data-label="No"><?= $no++; ?></td>
                                      <td data-label="Nama Lengkap"><?= $user->nama_lengkap; ?></td>
                                      <td data-label="Username"><?= $user->username; ?></td>
                                      <td data-label="Role"><?= $user->role; ?></td>
                                      <td data-label="Aksi">
                                        <a href="<?= base_url('register/edit/' . $user->id); ?>" class="btn btn-warning btn-sm">
                                          <i class="bi bi-pencil-square me-1"></i>
                                        Ubah</a>
                                        <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus_user-<?= $user->id; ?>">
                                          <i class="bi bi-trash me-1"></i>
                                        Hapus</a>
                                       <!-- Modal Hapus Akun -->
                                    <div class="modal fade" id="hapus_user-<?= $user->id; ?>" tabindex="-1" aria-labelledby="modalLabel>" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                              <div class="modal-header bg-danger text-white">
                                                <h5 class="modal-title text-white" id="modalLabel">HAPUS AKUN</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                              </div>
                                              <div class="modal-body text-center">
                                                <p>Apakah Anda yakin ingin <br>
                                                menghapus Akun dari <strong><?= $user->username; ?></strong>?</p>
                                              </div>
                                              <div class="modal-footer">
                                                <a href="<?= base_url('register/delete/' . $user->id); ?>" class="btn btn-danger">Ya, Hapus</a> 
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      <!-- End Modal Hapus Akun -->
                                      </td>
                                    </tr>
                                    <?php endforeach; ?>
                                        <?php else: ?>
                                    <tr>
                                      <td colspan="5" class="text-center text-danger">Tidak ada data pengguna.</td>
                                    </tr>
                                    <?php endif; ?>
                                  </tbody>
                                </table>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card-vanilla p-4 h-100">
                <h4 class="fw-semibold mb-3" style="color: #7a561f;"><?= isset($edit) ? 'Ubah Pengguna' : 'Tambah Pengguna' ?></h4>
                <form action="<?= isset($edit) ? base_url('register/update/' . $edit->id) : base_url('register/simpan_register') ?>" method="post">
                            <div class="input-group input-group-outline mb-3">
                              <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                              <input type="text" name="nama_lengkap" class="form-control" value="<?= isset($edit) ? $edit->nama_lengkap : '' ?>" required>
                            </div>
                            <div class="input-group input-group-outline mb-3">
                              <label for="username" class="form-label">Username</label>
                              <input type="text" name="username" class="form-control" value="<?= isset($edit) ? $edit->username : '' ?>" required>
                            </div>
                            <div class="input-group input-group-outline mb-3">
                              <label for="password" class="form-label">Password <?= isset($edit) ? '(Kosongkan jika tidak diubah)' : '' ?></label>
                              <input type="password" name="password" class="form-control" <?= isset($edit) ? '' : 'required' ?>>
                            </div>
                            <button type="submit" class="btn btn-primary"><?= isset($edit) ? 'Update' : 'Simpan' ?></button>
                            <?php if (isset($edit)): ?>
                            <a href="<?= base_url('register'); ?>" class="btn btn-secondary">Batal</a>
                            <?php endif; ?>
                          </form>
            </div>
        </div>
    </div>
</main>

<script>
  document.querySelectorAll('.modal').forEach(function(modal) {
    new bootstrap.Modal(modal);
  });
</script>

<?php $this->load->view('adminweb/partials/footer'); ?>
