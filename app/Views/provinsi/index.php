<?= $this->extend('templates/master') ?>

<?= $this->section('content') ?>

    <!-- DataTales Example -->
    <div class="row justify-content-center" style="padding-top: 100px;">
        <div class="col-md-10">
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Provinsi</h6>
                </div>

                <div class="card-body">

                    <!-- pesan error -->
                    <?php if(session()->getFlashdata('pesan')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">

                            <?= session()->getFlashdata('pesan') ?>
                            
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif ?>

                    <!-- pesan success -->
                    <?php if(session()->getFlashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">

                            <?= session()->getFlashdata('success') ?>
                            
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif ?>

                    <!-- Button trigger modal -->
                    <a type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                        Tambah Provinsi
                    </a>

                    <!-- exportPDF -->
                    <a href="<?= base_url('report/provinsi') ?>" class="btn btn-warning mb-3">Export PDF</a>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Provinsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $no = 1; ?>
                                <?php foreach ($provinsi as $p) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $p['nama_provinsi']; ?></td>
                                        <td>
                                            <a href="<?= base_url('provinsi/show/'. $p['id']); ?>" class="btn btn-info">Detail</a>
                                            <a href="<?= base_url('provinsi/destroy/'. $p['id']); ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>

                            </tbody>
                        </table>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Provinsi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                                <!-- form -->
                                <form action="<?= base_url('provinsi/store'); ?>" method="post">

                                    <div class="modal-body">
                                        <?= csrf_field(); ?>

                                        <div class="form-group">
                                            <input type="text" class="form-control" id="nama_provinsi" name="nama_provinsi" placeholder="Nama provinsi...">
                                        </div>
        
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


<?= $this->endSection() ?>