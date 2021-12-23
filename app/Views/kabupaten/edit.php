<?= $this->extend('templates/master') ?>

<?= $this->section('content') ?>

    <!-- content Example -->
    <div class="row justify-content-center" style="padding-top: 100px;">
        <div class="col-md-10">
            <div class="card shadow mb-4">

                <div class="card-header">
                    <div class="m-0 font-weight-bold">
                        <a href="<?= base_url('/'); ?>">Home</a>
                        <span>/ Edit Kabupaten</span>
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

                    <!-- detail provinsi -->
                    <div class="col-md-8 mb-3">

                        <!-- form -->
                        <form action="<?= base_url('kabupaten/update/'. $detail_kabupaten['id']); ?>" method="post">
                            <?= csrf_field(); ?>

                            <div class="row mb-2">
                                <div class="col-md-3">Nama Kabupaten</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-8">

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="nama_kabupaten" name="nama_kabupaten" placeholder="Nama kabupaten..." value="<?= old('nama_kabupaten') ?? $detail_kabupaten['nama_kabupaten']; ?>">
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">Jumlah Penduduk</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-8">
                                    
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="jumlah_penduduk" name="jumlah_penduduk" placeholder="Jumlah penduduk..." value="<?= old('jumlah_penduduk') ?? $detail_kabupaten['jumlah_penduduk']; ?>">
                                    </div>

                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-3">Apakah Ibukota</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-8">
                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="is_ibukota" id="false" value="0" <?= old('is_ibukota') ?? $detail_kabupaten['is_ibukota'] == '0' ? 'checked' : ''?>>
                                        <label class="form-check-label" for="false">
                                            Bukan
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="is_ibukota" id="true" value="1" <?= old('is_ibukota') ?? $detail_kabupaten['is_ibukota'] == '1' ? 'checked' : ''?>>
                                        <label class="form-check-label" for="true">
                                            Iya
                                        </label>
                                    </div>

                                </div>
                            </div>


                            <input type="hidden" name="provinsi_id" value="<?= $detail_kabupaten['provinsi_id']; ?>">

                            <button type="submit" class="btn btn-primary">Update</button>
                            
                        </form>
                            
                    </div>

                </div>

            </div>
        </div>
    </div>


<?= $this->endSection() ?>