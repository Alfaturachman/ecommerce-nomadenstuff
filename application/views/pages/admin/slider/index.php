<div class="card shadow my-3">
    <div class="card-header">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800"><strong>Slider</strong></h1>
        </div>
        <!-- <span class="m-0 font-weight-bold text-primary">Slider</span> -->
    </div>
    <div class="card-body">
        <div class="row mb-4 d-flex justify-content-between">
            <div class="col-md-2 col-sm-12">
                <?= form_open('admin/slider/search', ['method' => 'POST', 'class' => 'form-inline']) ?>
                <div class="form-group">
                    <input type="text" name="keyword" class="form-control form-control-sm text-center" placeholder="Cari Slider" value="<?= $this->session->userdata('keyword') ?>">
                    <div class="btn-group mx-sm-3" role="group" aria-label="Basic example">
                        <button type="submit" class="btn btn-sm btn-secondary"><i class="fa fa-fw fa-search"></i></button>
                        <a href="<?= base_url('admin/slider/reset') ?>" class="btn btn-sm btn-secondary"><i class="fa fa-fw fa-eraser"></i></a>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="col-md-6 col-sm-12 d-flex justify-content-end">
                <div class="row">
                    <div class="col">
                        <a href="<?= base_url('admin/slider/create') ?>" class="btn btn-sm btn-primary px-3"><i class="fa fa-plus pr-2" aria-hidden="true"></i><strong>Tambah Slider</strong></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- <?php $this->load->view('layouts/_alerts') ?> -->

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No Urutan</th>
                        <th>Foto Slider</th>
                        <th>Judul Slider</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach ($content as $row) : $no++ ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td>
                                <img src="<?= $row->image ? base_url("images/slider/$row->image") : base_url("images/slider/default.jpg") ?>" alt="" height="100" class="img-responsive">
                            </td>
                            <td><?= $row->title ?></td>
                            <td>
                                <?= form_open(base_url("admin/slider/delete/$row->id"), ['method' => 'POST']) ?>
                                <?= form_hidden('id', $row->id) ?>
                                <a href="<?= base_url("admin/slider/edit/$row->id") ?>" class="btn btn-sm"><i class="fas fa-fw fa-edit text-info"></i></a>
                                <button class="btn btn-sm" type="submit" onclick="return confirm('Apakah yakin ingin menghapus?')">
                                    <i class="fas fa-trash text-danger"></i>
                                </button>
                                <?= form_close() ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <nav arial-label="Page navigation example" class="mt-2">
            <?= $pagination ?>
        </nav>
    </div>
</div>