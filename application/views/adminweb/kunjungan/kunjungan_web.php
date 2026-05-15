<?php $this->load->view('adminweb/partials/header'); ?>
<!-- Main Content -->
<main class="admin-landing container my-4">
    <!-- Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold" style="color: #023c5e;" id="pageTitle">DATA KUNJUNGAN</h2>
        </div>
    </div>
     <!-- Message -->
    <?php if($this->session->flashdata('success')): ?>
     <div class="alert alert-success text-white alert-dismissible fade show" role="alert">
       <?= $this->session->flashdata('success'); ?>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
    <?php endif; ?>

    <div class="card-vanilla p-4">
        <!-- Summary Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="card p-3 h-100">
                    <h6 class="text-muted">Total Visitor</h6>
                    <h2 class="fw-semibold"><?= isset($total_visitor) ? $total_visitor : 0; ?></h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-3 h-100">
                    <h6 class="text-muted">Visitor Hari Ini</h6>
                    <h2 class="fw-semibold"><?= isset($visitor_today) ? $visitor_today : 0; ?></h2>
                </div>
            </div>
        </div>

        <!-- Statistics Section -->
        <div class="row g-3 mb-4">
            <!-- Statistik Mingguan (Kanan) -->
            <div class="col-lg-6 order-lg-2">
                <div class="card p-3 h-100">
                    <h5 class="mb-3">Statistik Mingguan</h5>
                    <canvas id="weeklyChart"></canvas>
                </div>
            </div>

            <!-- Statistik Bulanan (Kiri) -->
            <div class="col-lg-6 order-lg-1">
                <div class="card p-3 h-100">
                    <h5 class="mb-3">Statistik Bulanan</h5>
                    <canvas id="monthlyChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Statistik Tahunan (Full Width - Center) -->
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card p-3">
                    <h5 class="mb-3">Statistik Tahunan</h5>
                    <canvas id="yearlyChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const weeklyChart = document.getElementById('weeklyChart');
  if (weeklyChart) {
    new Chart(weeklyChart, {
      type: 'line',
      data: {
        labels: <?= json_encode(isset($labels_week) ? $labels_week : []); ?>,
        datasets: [{
          label: 'Visitor',
          data: <?= json_encode(isset($data_week) ? $data_week : []); ?>,
          borderColor: '#1f77b4',
          backgroundColor: 'rgba(31, 119, 180, 0.1)',
          borderWidth: 2,
          fill: true,
          tension: 0.3
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: { beginAtZero: true }
        }
      }
    });
  }

  const monthlyChart = document.getElementById('monthlyChart');
  if (monthlyChart) {
    new Chart(monthlyChart, {
      type: 'bar',
      data: {
        labels: <?= json_encode(isset($labels_month) ? $labels_month : []); ?>,
        datasets: [{
          label: 'Visitor',
          data: <?= json_encode(isset($data_month) ? $data_month : []); ?>,
          backgroundColor: 'rgba(40, 167, 69, 0.7)',
          borderColor: 'rgba(40, 167, 69, 1)',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: { beginAtZero: true }
        }
      }
    });
  }

  const yearlyChart = document.getElementById('yearlyChart');
  if (yearlyChart) {
    new Chart(yearlyChart, {
      type: 'bar',
      data: {
        labels: <?= json_encode(isset($labels_year) ? $labels_year : []); ?>,
        datasets: [{
          label: 'Visitor',
          data: <?= json_encode(isset($data_year) ? $data_year : []); ?>,
          backgroundColor: 'rgba(255, 193, 7, 0.7)',
          borderColor: 'rgba(255, 193, 7, 1)',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: { beginAtZero: true }
        }
      }
    });
  }
</script>

<?php $this->load->view('adminweb/partials/footer'); ?>
