<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Dosen</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('asisten'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('id' => 'FrmEditDosen', 'method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>
                    <div class="form-group row">
                        <label for="Mahasiswa" class="col-sm-2 col-form-label">ID Mahasiswa</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="Mahasiswa" name="Mahasiswa" value=" <?= $data_asisten->IdAst; ?>">
                            <input type="text" class="form-control" id="Mahasiswa" name="Mahasiswa" value=" <?= $data_asisten->IdMhs; ?>">
                            <small class="text-danger">
                                <?php echo form_error('Mahasiswa') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Dosen" class="col-sm-2 col-form-label">ID Dosen</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="Dosen" name="Dosen" value=" <?= $data_asisten->IdAst; ?>">
                            <input type="text" class="form-control" id="Dosen" name="Dosen" value=" <?= $data_asisten->IdDsn; ?>">
                            <small class="text-danger">
                                <?php echo form_error('Dosen') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Matakuliah" class="col-sm-2 col-form-label">Mata Kuliah</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="Matakuliah" name="Matakuliah" value=" <?= $data_asisten->IdAst; ?>">
                            <input type="text" class="form-control" id="JamTerbang" name="JamTerbang" value=" <?= $data_asisten->MataKuliah; ?>">
                            <small class="text-danger">
                                <?php echo form_error('Matakuliah') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="JamTerbang" class="col-sm-2 col-form-label">Jam Terbang</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="JamTerbang" name="JamTerbang" value=" <?= $data_asisten->IdAst; ?>">
                            <input type="text" class="form-control" id="JamTerbang" name="JamTerbang" value=" <?= $data_asisten->JamTerbang; ?>">
                            <small class="text-danger">
                                <?php echo form_error('JamTerbang') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>