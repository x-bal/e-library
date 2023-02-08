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
                    <form action="<?= $action ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group mb-3">
                            <label for="siswa">Siswa Id</label>
                            <input type="text" name="siswa" id="siswa" class="form-control" value="<?= $pinjaman->siswa ?? set_value('siswa') ?>" autofocus>

                            <small class="text-danger"><?= form_error('siswa') ?></small>
                        </div>

                        <div class="form-group mb-3">
                            <label for="buku">Nama Buku</label>
                            <select name="buku[]" id="buku" class="buku-select2 form-control" multiple>
                                <?php foreach ($buku as $buk) : ?>
                                    <option <?= isset($pinjaman) && $pinjaman->buku_id == $buk->id_buku ? 'selected' : '' ?> value="<?= $buk->id_buku ?>"><?= $buk->nama_buku ?></option>
                                <?php endforeach; ?>
                            </select>

                            <small class="text-danger"><?= form_error('buku') ?></small>
                        </div>

                        <!-- <div class="form-group mb-3">
                            <label for="jumlah">Jumlah Pinjam</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" value="<?= $pinjaman->tersedia ?? set_value('jumlah') ?>">

                            <small class="text-danger"><?= form_error('jumlah') ?></small>
                        </div> -->

                        <div class="form-group mb-3">
                            <label for="tanggal_pinjam">Tanggal Pinjam</label>
                            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" value="<?= $pinjaman->tersedia ?? set_value('tanggal_pinjam') ?>">

                            <small class="text-danger"><?= form_error('tanggal_pinjam') ?></small>
                        </div>

                        <div class="form-group mb-3">
                            <label for="tanggal_kembali">Tanggal Pinjam</label>
                            <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" value="<?= $pinjaman->tersedia ?? set_value('tanggal_kembali') ?>">

                            <small class="text-danger"><?= form_error('tanggal_kembali') ?></small>
                        </div>

                        <div class="form-group mb-3">
                            <button type="button" class="btn btn-primary btn-submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('layouts/footer'); ?>

<script>
    $("#siswa").on('change', function() {
        $.ajax({
            url: "<?= base_url('api/tap') ?>",
            method: 'GET',
            type: 'GET',
            data: {
                rfid: $(this).val()
            },
            success: function(response) {
                let result = JSON.parse(response);

                $(".btn-submit").removeAttr("type")

                if (result.status == 'success') {
                    $(".btn-submit").attr("type", "submit")
                }

                if (result.status == 'error') {
                    $("#siswa").val("")
                    $(".btn-submit").attr("type", "button")
                }
            }
        })
    })
</script>