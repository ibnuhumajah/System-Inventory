<!-- Main Content -->
<div id="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?= site_url('penjualan/hasil') ?>">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Data Penjualan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->fungsi->count_penjualan() ?> Penjualan</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?= site_url('pembelian/hasil') ?>">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Data Pembelian</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->fungsi->count_pembelian() ?> Pembelian</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-cart-arrow-down fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?= site_url('kontak') ?>">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Kontak Pelanggan</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $this->fungsi->count_kontak() ?> Kontak</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-phone fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Pending Requests Card Example -->
            <?php if ($this->fungsi->user_login()->level == 1) { ?>
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="<?= site_url('user') ?>">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            User Aplikasi</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->fungsi->count_user() ?> Users</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Penjualan</h6>
                    </div>
                    <!-- Konten -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>No.</th>
                                        <th>Nama Penjual</th>
                                        <th>Tanggal Penjual</th>
                                        <th>Total Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($row->result() as $key => $data) { ?>
                                        <tr class="text-center">
                                            <td><?= $no++ ?>.</td>
                                            <td><?= ucwords($data->nama_penjual) ?></td>
                                            <td><?= indo_date($data->tanggal_penjual) ?></td>
                                            <td><?= indo_currency($data->harga_total_penjual) ?> </td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Konten -->
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Grafik Penjualan - Pembelian</h6>
                    </div>
                    <div class="card-body">
                        <!-- Konten -->
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <!-- Konten -->
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Pembelian
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> Penjualan
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$sale = $this->fungsi->count_penjualan();
$order = $this->fungsi->count_pembelian();
?>

<!-- Page level plugins -->
<script src="<?= base_url() ?>/assets/vendor/chart/Chart.min.js"></script>
<script src="<?= base_url() ?>/assets/vendor/chart/Chart.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url() ?>/assets/js/demo/chart-area-demo.js"></script>
<script src="<?= base_url() ?>/assets/js/demo/chart-pie-demo.js"></script>
<script src="<?= base_url() ?>/assets/js/demo/chart-bar-demo.js"></script>

<!-- End of Main Content -->

<script type="text/javascript">
    // Pie Chart Example
    var sale = <?php echo json_encode($sale) ?>;
    var order = <?php echo json_encode($order) ?>;
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Penjualan", "Pembelian"],
            datasets: [{
                data: [sale, order],
                backgroundColor: ['#4e73df', '#1cc88a'],
                hoverBackgroundColor: ['#2e59d9', '#17a673'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 20,
            },
            legend: {
                display: false
            },
            animations: {
                radius: {
                    duration: 10,
                    easing: 'linear',
                    loop: (context) => context.active
                }
            },
            cutoutPercentage: 70,
        },
    });
</script>