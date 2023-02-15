<?php $this->load->view('layouts/header', ['title' => $title]); ?>
<?php $this->load->view('layouts/sidebar'); ?>


<div id="content" class="app-content">
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Device</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Log</a></li>
    </ol>

    <h1 class="page-header"><?= $title ?></h1>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">

                <div class="panel-heading">
                    <h4 class="panel-title"><?= $title ?></h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                </div>

                <div class="panel-body">
                    <!-- <a href="<?= base_url('kategori/create') ?>" class="mb-3 btn btn-primary"><i class="fas fa-plus-circle"></i> Add Kategori</a> -->

                    <table id="data-table-default" class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="text-nowrap">Waktu</th>
                                <th class="text-nowrap">Siswa</th>
                                <th class="text-nowrap">Device</th>
                                <th class="text-nowrap">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($logs as $log) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= date('d/m/Y H:i:s', strtotime($log->waktu)) ?></td>
                                    <td><?= $log->nama ?></td>
                                    <td><?= $log->nama_device ?></td>
                                    <td><?= $log->keterangan ?></td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('layouts/footer'); ?>