<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
            <i class="fas fa-store"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Warung Ali</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Dashboard
    </div>

    <?php if ($this->session->userdata('role_id')  == 'Admin' && $this->session->userdata('id_user')) { ?>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?= $this->uri->segment(1) == 'admin' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('admin') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    <?php } ?>

    <?php if ($this->session->userdata('role_id') == 'Owner') { ?>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?= $this->uri->segment(1) == 'owner' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('owner') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    <?php } ?>

    <?php if ($this->session->userdata('role_id') == 'Kasir') { ?>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?= $this->uri->segment(1) == 'kasir' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('kasir') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    <?php } ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php if ($this->session->userdata('role_id')  == 'Admin') { ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            Data Master
        </div>

        <!-- Nav Item - Supplier -->
        <li class="nav-item <?= $this->uri->segment(1) == 'supplier' && $this->uri->segment(2) == '' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('supplier'); ?>">
                <i class="fas fa-fw fa-truck"></i>
                <span>Supplier</span></a>
        </li>

        <!-- Nav Item - Pelanggan -->
        <li class="nav-item <?= $this->uri->segment(1) == 'supplier' && $this->uri->segment(2) == 'pelanggan' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('supplier/pelanggan'); ?>">
                <i class="fas fa-fw fa-address-book"></i>
                <span>Pelanggan</span></a>
        </li>

        <!-- Nav Item - Produk -->
        <li class="nav-item <?= $this->uri->segment(1) == 'data' && $this->uri->segment(2) == '' ? 'active' : '' ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-folder"></i>
                <span>Produk</span>
            </a>
            <div id="collapseUtilities" class="collapse <?= $this->uri->segment(1) == 'data' && $this->uri->segment(2) == 'barang' ? 'show' : '' ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Data Master</h6>
                    <a class="collapse-item <?= $this->uri->segment(1) == 'data' && $this->uri->segment(2) == '' ? 'active' : '' ?>" href="<?= base_url('data'); ?>">Kategori</a>
                    <a class="collapse-item <?= $this->uri->segment(1) == 'data' && $this->uri->segment(2) == 'satuan' ? 'active' : '' ?>" href="<?= base_url('data/satuan'); ?>">Satuan</a>
                    <a class="collapse-item <?= $this->uri->segment(1) == 'data' && $this->uri->segment(2) == 'barang' ? 'active' : '' ?>" href="<?= base_url('data/barang'); ?>">Barang</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
    <?php } ?>

    <?php if ($this->session->userdata('role_id') == 'Kasir' || $this->session->userdata('role_id') == 'Admin') { ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            Transaksi
        </div>
    <?php } ?>

    <?php if ($this->session->userdata('role_id') == 'Admin') { ?>
        <!-- Nav Item - Stok -->
        <li class="nav-item ">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Stok</span>
            </a>
            <div id="collapseTwo" class="collapse <?= $this->uri->segment(1) == 'stok' && $this->uri->segment(2) == '' ? 'show' : '' ?> <?= $this->uri->segment(1) == 'stok' && $this->uri->segment(2) == '' ? 'show' : 'keluar' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Stok Barang</h6>
                    <a class="collapse-item <?= $this->uri->segment(1) == 'stok' && $this->uri->segment(2) == '' ? 'active' : '' ?>" href="<?= base_url('stok'); ?>">Barang Masuk</a>
                    <a class="collapse-item" href="<?= base_url('stok/keluar'); ?>">Barang Keluar</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
    <?php } ?>

    <?php if ($this->session->userdata('role_id')  == 'Kasir') { ?>

        <!-- Nav Item - Stok -->
        <li class="nav-item ">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-coins"></i>
                <span>Transaksi</span>
            </a>
            <div id="collapseTwo" class="collapse <?= $this->uri->segment(1) == 'transaksi' && $this->uri->segment(2) == '' ? 'show' : '' ?> <?= $this->uri->segment(1) == 'stok' && $this->uri->segment(2) == '' ? 'show' : 'keluar' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu Transaksi</h6>
                    <a class="collapse-item <?= $this->uri->segment(1) == 'transaksi' && $this->uri->segment(2) == '' ? 'active' : '' ?>" href="<?= base_url('transaksi'); ?>">Transaksi Penjualan</a>
                    <a class="collapse-item <?= $this->uri->segment(1) == 'transaksi' && $this->uri->segment(2) == 'riwayat' ? 'active' : '' ?>" href="<?= base_url('transaksi/riwayat'); ?>">Riwayat Transaksi</a>
                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
    <?php } ?>


    <?php if ($this->session->userdata('role_id')  == 'Owner') { ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            Laporan
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?= $this->uri->segment(1) == 'laporan' ? 'active' : '' ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-print"></i>
                <span>Cetak Laporan</span>
            </a>
            <div id="collapsePages" class="collapse <?= $this->uri->segment(1) == 'laporan' && $this->uri->segment(2) == '' ? 'show' : '' ?> <?= $this->uri->segment(1) == 'laporan' && $this->uri->segment(2) == 'stok' ? 'show' : '' ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Report</h6>
                    <a class="collapse-item <?= $this->uri->segment(1) == 'laporan' && $this->uri->segment(2) == '' ? 'active' : '' ?>" href="<?= base_url('laporan'); ?>">Laporan Penjualan</a>
                    <a class="collapse-item <?= $this->uri->segment(1) == 'laporan' && $this->uri->segment(2) == 'stok' ? 'active' : '' ?>" href="<?= base_url('laporan/stok') ?>">Laporan Stok Barang</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            SETTINGS
        </div>

        <!-- Nav Item - User Management -->
        <li class="nav-item <?= $this->uri->segment(1) == 'user' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('user'); ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>User Management</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    <?php } ?>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->