<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah User</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->ModelUser->cekData(['is_active' => 1])->num_rows(); ?></div>
            </div>
            <div class="col-auto">
              <a href="<?= base_url('user'); ?>" class="fas fa-users fa-2x text-gray-300"></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Supplier</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->ModelCrud->getsupp()->num_rows(); ?></div>
            </div>
            <div class="col-auto">
              <a href="<?= base_url('supplier'); ?>" class="fas fa-truck fa-2x text-gray-300"></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Stok Barang</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $stok; ?></div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <a href="<?= base_url('data/barang'); ?>" class="fas fa-clipboard-list fa-2x text-gray-300"></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Stok Barang Yang Terjual</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $laku; ?></div>
            </div>
            <div class="col-auto">
              <a href="<?= base_url('transaksi'); ?>" class="fas fa-coins fa-2x text-gray-300"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->

  <div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Barang Paling Laku</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-area">
            <canvas id="myBarChart"></canvas>
          </div>
        </div>
      </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-dark">Stok Barang</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-pie pt-4 pb-2">
            <canvas id="myPieChart"></canvas>
          </div>
          <div class="mt-4 text-center small">
            <span class="mr-2">
              <i class="fas fa-circle text-success"></i> Stok Barang Masuk
            </span>
            <span class="mr-2">
              <i class="fas fa-circle text-danger"></i> Stok Barang Keluar
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->
  <div class="row">

    <div class="col-md-6">
      <div class="card shadow mb-4">
        <div class="card-header bg-success py-3">
          <h6 class="m-0 font-weight-bold text-white text-center">5 Transaksi Terakhir Barang Masuk</h6>
        </div>
        <div class="table-responsive">
          <table class="table mb-0 table-sm table-striped text-center">
            <thead>
              <tr>
                <th>Tanggal</th>
                <th>Barang</th>
                <th>Masuk</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($b_masuk as $m) { ?>
                <tr>
                  <td><?= $m['tanggal_masuk'] ?></td>
                  <td><?= $m['barang'] ?></td>
                  <td class="badge badge-success mt-2"><?= $m['jumlah_masuk'] ?></td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card shadow mb-4">
        <div class="card-header bg-danger py-3">
          <h6 class="m-0 font-weight-bold text-white text-center">5 Transaksi Terakhir Barang Keluar</h6>
        </div>
        <div class="table-responsive">
          <table class="table mb-0 table-sm table-striped text-center">
            <thead>
              <tr>
                <th>Tanggal</th>
                <th>Barang</th>
                <th>Keluar</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($b_keluar as $b) {
              ?>
                <tr>
                  <td><?= $b['tanggal_keluar']; ?></td>
                  <td><?= $b['barang']; ?></td>
                  <td class="badge badge-danger mt-2"><?= $b['jumlah_keluar'] ?></td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->