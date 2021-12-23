<?= $this->extend('templates/master') ?>

<?= $this->section('content') ?>

    <!-- content Example -->
    <div class="row justify-content-center" style="padding-top: 100px;">
        <div class="col-md-10">
            <div class="card shadow mb-4">

                <div class="card-header">
                    <div class="m-0 font-weight-bold">
                        <a href="<?= base_url('/'); ?>">Home</a>
                        <span>/ Detail Provinsi</span>
                    </div>
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

    
                    <!-- detail provinsi -->
                    <div class="col-md-12 mb-3">

                        <div class="row mb-2">
                            <div class="col-md-3 col-sm-5">Nama Provinsi</div>
                            <div class="col-md-1 col-sm-2">:</div>
                            <div class="col-md-4 col-sm-5"><?= $detail_provinsi['nama_provinsi']; ?></div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-3 col-sm-5">Nama Ibukota</div>
                            <div class="col-md-1 col-sm-2">:</div>
                            <div class="col-md-4 col-sm-5"><?= $ibukota == null ? 'Ibukota belum di update' : $ibukota['nama_kabupaten'] ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-sm-5">Total Penduduk</div>
                            <div class="col-md-1 col-sm-2">:</div>
                            <div class="col-md-4 col-sm-5"><?= $penduduk['jumlah_penduduk'] == null ? 'Total penduduk belum bisa diakumulasi' : $penduduk['jumlah_penduduk']. ' Orang' ?></div>
                        </div>

                    </div>

                    <!-- Button trigger modal -->
                    <a type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                        Tambah Kabupaten
                    </a>

                    <!-- exportPDF -->
                    <a href="<?= base_url('report/kabupaten/'. $detail_provinsi['id']) ?>" class="btn btn-warning mb-3">Export PDF</a>


                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kabupaten/Kota</th>
                                    <th>Jumlah Penduduk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $no = 1; ?>
                                <?php foreach ($daftar_kabupaten as $dk) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $dk['nama_kabupaten']; ?></td>
                                        <td><?= $dk['jumlah_penduduk']; ?></td>
                                        <td>

                                            <div class="row">
                                                
                                                <!-- edit -->
                                                <div class="col-2 mr-2">
                                                    <a href="<?= base_url('kabupaten/edit/'. $dk['id']); ?>" class="btn btn-sm btn-info" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </div>

                                                <!-- delete -->
                                                <div class="col-2">
                                                    <form action="<?= base_url('kabupaten/destroy/'. $dk['id']); ?>" method="post">
                                                        <?= csrf_field(); ?>
        
                                                        <input type="hidden" name="provinsi_id" value="<?= $detail_provinsi['id']; ?>">
        
                                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>

                                            </div>

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
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kabupaten/Kota</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                                <!-- form -->
                                <form action="<?= base_url('kabupaten/store'); ?>" method="post">

                                    <div class="modal-body">
                                        <?= csrf_field(); ?>

                                        <div class="form-group">
                                            <input type="text" class="form-control" id="nama_kabupaten" name="nama_kabupaten" placeholder="Nama kabupaten..." value="<?= old('nama_kabupaten'); ?>">
                                        </div>

                                        <div class="form-group">
                                            <input type="number" class="form-control" id="jumlah_penduduk" name="jumlah_penduduk" placeholder="Jumlah penduduk..." value="<?= old('jumlah_penduduk'); ?>">
                                        </div>

                                        <input type="hidden" name="provinsi_id" value="<?= $detail_provinsi['id']; ?>">
        
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