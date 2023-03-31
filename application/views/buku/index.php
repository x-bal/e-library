<?php $this->load->view('layouts/header', ['title' => $title]); ?>
<?php $this->load->view('layouts/sidebar'); ?>


<div id="content" class="app-content">
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Master</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Buku</a></li>
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
                    <a href="<?= base_url('buku/create') ?>" class="mb-3 btn btn-primary"><i class="fas fa-plus-circle"></i> Add Buku</a>

                    <table id="data-table-default" class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="text-nowrap">Foto buku</th>
                                <th class="text-nowrap">Nama buku</th>
                                <th class="text-nowrap">Kategori</th>
                                <th class="text-nowrap">No Rak</th>
                                <!-- <th class="text-nowrap">Jumlah Buku</th> -->
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($buku as $buk) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <img src="<?= base_url('uploads/buku/' . $buk->foto) ?>" alt="" width="70">

                                    </td>
                                    <td><?= $buk->nama_buku ?></td>
                                    <td><?= $buk->nama_kategori ?></td>
                                    <td><?= $buk->no_rak ?></td>
                                    <!-- <td><?= $buk->tersedia ?></td> -->
                                    <td>
                                        <a href="<?= base_url('buku/edit/' . $buk->id_buku) ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                    </td>
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