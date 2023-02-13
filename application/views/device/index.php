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
                    <a href="<?= base_url('device/create') ?>" class="mb-3 btn btn-primary"><i class="fas fa-plus-circle"></i> Add Device</a>

                    <table id="data-table-default" class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="text-nowrap">Id Device</th>
                                <th class="text-nowrap">Nama Device</th>
                                <th class="text-nowrap">Use For</th>
                                <th class="text-nowrap">Status</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($device as $dev) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $dev->id_device ?></td>
                                    <td><?= $dev->nama_device ?></td>
                                    <td><?= $dev->use_for ?></td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input status" type="checkbox" id="<?= $dev->id_device ?>" <?= $dev->status == 1 ? 'checked' : '' ?>>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('device/edit/' . $dev->id_device) ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
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

<script>
    $("#data-table-default").on('click', '.status', function() {
        let id = $(this).attr('id');
        let status = 0;
        if ($(this).is(":checked")) {
            status = 1;
        } else {
            status = 0;
        }

        $.ajax({
            url: '<?= base_url() ?>device/' + id,
            type: "GET",
            method: "GET",
            data: {
                status: status
            },
            success: function(response) {
                console.log(response)
            }
        })
    })
</script>