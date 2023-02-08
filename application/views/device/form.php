<?php $this->load->view('layouts/header', ['title' => $title]); ?>
<?php $this->load->view('layouts/sidebar'); ?>


<div id="content" class="app-content">
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Master</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Device</a></li>
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
                    <form action="<?= $action ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group mb-3">
                            <label for="nama_device">Nama Device</label>
                            <input type="text" name="nama_device" id="nama_device" class="form-control" value="<?= $device->nama_device ?? set_value('nama_device') ?>">

                            <small class="text-danger"><?= form_error('nama_device') ?></small>
                        </div>

                        <div class="form-group mb-3">
                            <label for="tempat">Tempat</label>
                            <select name="tempat" id="tempat" class="form-control">
                                <option disabled selected>-- Pilih tempat --</option>
                                <option <?= isset($device) && $device->use_for == 'Masuk' ? 'selected' : '' ?> value="Masuk">Masuk</option>
                                <option <?= isset($device) && $device->use_for == 'Keluar' ? 'selected' : '' ?> value="Keluar">Keluar</option>
                            </select>

                            <small class="text-danger"><?= form_error('tempat') ?></small>
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('layouts/footer'); ?>