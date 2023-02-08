<?php $this->load->view('layouts/header', ['title' => $title]); ?>
<?php $this->load->view('layouts/sidebar'); ?>


<div id="content" class="app-content">
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Master</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Pinjaman</a></li>
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
                    <?php if ($this->uri->segment(1) == 'pinjaman') : ?>
                        <a href="<?= base_url('pinjaman/create') ?>" class="mb-3 btn btn-primary"><i class="fas fa-plus-circle"></i> Add Pinjaman</a>
                    <?php endif ?>

                    <table id="data-table-default" class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="text-nowrap">Nama Peminjam</th>
                                <th class="text-nowrap">Nama Buku</th>
                                <th class="text-nowrap">Tanggal Pinjam</th>
                                <th class="text-nowrap">Batas Kembali</th>
                                <th class="text-nowrap">Tanggal Kembali</th>
                                <th class="text-nowrap">Status Pinjaman</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($pinjaman as $pinjam) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $pinjam->nama ?></td>
                                    <td><?= $pinjam->nama_buku ?></td>
                                    <td><?= date('d/m/Y', strtotime($pinjam->tanggal_pinjam)) ?></td>
                                    <td><?= date('d/m/Y', strtotime($pinjam->tanggal_kembali)) ?></td>
                                    <td><?= $pinjam->kembali != null ? date('d/m/Y', strtotime($pinjam->kembali)) : '-' ?></td>
                                    <td><?= $pinjam->status ?></td>
                                    <td>
                                        <a href="#modal-dialog" class="btn btn-sm btn-indigo btn-kembali" data-bs-toggle="modal" id="<?= $pinjam->id_pinjaman ?>" title="Kembali"><i class="ion-ios-checkmark-circle"></i></a>
                                        <a href="<?= base_url('pinjaman/edit/' . $pinjam->id_pinjaman) ?>" class="btn btn-sm btn-success" title="Edit"><i class="fas fa-edit"></i></a>
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

<div class="modal fade" id="modal-dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Pengembalian</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="" method="post" id="form-target">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="kembali">Tanggal Kembali</label>
                        <input type="date" name="kembali" id="kembali" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="Dipinjam">Dipinjam</option>
                            <option value="Kembali">Kembali</option>
                            <option value="Telat">Telat</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('layouts/footer'); ?>

<script>
    $("#data-table-default").on('click', '.btn-kembali', function() {
        let id = $(this).attr('id');
        let url = "<?= base_url('pinjaman/kembali/') ?>" + id

        $("#form-target").attr('action', "")
        $("#form-target").attr('action', url)
    })
</script>