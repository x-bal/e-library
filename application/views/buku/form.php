<?php $this->load->view('layouts/header', ['title' => $title]); ?>
<?php $this->load->view('layouts/sidebar'); ?>


<div id="content" class="app-content">
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Master</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Kategori</a></li>
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
                            <label for="nama_buku">Nama Buku</label>
                            <input type="text" name="nama_buku" id="nama_buku" class="form-control" value="<?= $buku->nama_buku ?? set_value('nama_buku') ?>">

                            <small class="text-danger"><?= form_error('nama_buku') ?></small>
                        </div>

                        <div class="form-group mb-3">
                            <label for="kategori">Nama Kategori</label>
                            <select name="kategori" id="kategori" class="form-control">
                                <option disabled selected>-- Pilih Kategori --</option>
                                <?php foreach ($kategori as $kat) : ?>
                                    <option <?= isset($buku) && $buku->kategori_id == $kat->id_kategori ? 'selected' : '' ?> value="<?= $kat->id_kategori ?>"><?= $kat->nama_kategori ?></option>
                                <?php endforeach; ?>
                            </select>

                            <small class="text-danger"><?= form_error('kategori') ?></small>
                        </div>

                        <!-- <div class="form-group mb-3">
                            <label for="jumlah">Jumlah Buku</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" value="<?= $buku->tersedia ?? set_value('jumlah') ?>">

                            <small class="text-danger"><?= form_error('jumlah') ?></small>
                        </div> -->

                        <div class="form-group mb-3">
                            <label for="no_rak">No Rak Buku</label>
                            <input type="text" maxlength="10" name="no_rak" id="no_rak" class="form-control" value="<?= $buku->no_rak ?? set_value('no_rak') ?>">

                            <small class="text-danger"><?= form_error('no_rak') ?></small>
                        </div>

                        <div class="form-group mb-3">
                            <label for="foto">Foto Buku</label>
                            <input type="file" name="foto" id="foto" class="form-control" value="">

                            <small class="text-danger"><?= form_error('foto') ?></small>
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