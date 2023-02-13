<?php $this->load->view('layouts/header', ['title' => 'Config']); ?>
<?php $this->load->view('layouts/sidebar'); ?>


<div id="content" class="app-content">
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Config</a></li>
    </ol>

    <h1 class="page-header">Config</h1>

    <div class="row">
        <div class="col-xl-12 col-md-6">
            <div class="widget widget-stats bg-white text-inverse">
                <div class="stats-icon stats-icon-square bg-gradient-cyan-blue text-white"><i class="ion-ios-key"></i></div>
                <div class="stats-content">
                    <div class="stats-title text-gray-700">Secret Key</div>
                    <div class="stats-number"><?= $secretKey ?></div>
                    <div class="stats-progress progress">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('layouts/footer'); ?>