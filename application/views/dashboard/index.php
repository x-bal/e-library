<?php $this->load->view('layouts/header', ['title' => 'Dashboard']); ?>
<?php $this->load->view('layouts/sidebar'); ?>


<div id="content" class="app-content">
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
    </ol>

    <h1 class="page-header">Dashboard</h1>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-white text-inverse">
                <div class="stats-icon stats-icon-square bg-gradient-cyan-blue text-white"><i class="ion-ios-analytics"></i></div>
                <div class="stats-content">
                    <div class="stats-title text-gray-700">TODAY'S VISITS</div>
                    <div class="stats-number"><?= $today ?></div>
                    <div class="stats-progress progress">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-white text-inverse">
                <div class="stats-icon stats-icon-square bg-gradient-cyan-blue text-white"><i class="ion-ios-analytics"></i></div>
                <div class="stats-content">
                    <div class="stats-title text-gray-700">MONTH'S VISIT</div>
                    <div class="stats-number"><?= $month ?></div>
                    <div class="stats-progress progress">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-white text-inverse">
                <div class="stats-icon stats-icon-square bg-gradient-cyan-blue text-white"><i class="ion-ios-paper"></i></div>
                <div class="stats-content">
                    <div class="stats-title text-gray-700">TOTAL PINJAM</div>
                    <div class="stats-number"><?= $pinjam ?></div>
                    <div class="">
                        <small>Monthly</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-white text-inverse">
                <div class="stats-icon stats-icon-square bg-gradient-cyan-blue text-white"><i class="ion-ios-journal"></i></div>
                <div class="stats-content">
                    <div class="stats-title text-gray-700">TOTAL KEMBALI</div>
                    <div class="stats-number"><?= $kembali ?></div>
                    <div class="">
                        <small>Monthly</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('layouts/footer'); ?>