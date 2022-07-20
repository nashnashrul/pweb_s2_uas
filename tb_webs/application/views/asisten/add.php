<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Asisten</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('asisten'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('id' => 'FrmAddAsisten', 'method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>

                    <div class="form-group row">
                        <label for="IdMhs" class="col-sm-2 col-form-label">ID Mahasiswa</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="IdMhs" name="IdMhs" value=" <?= set_value('IdMhs'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('IdMhs') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="IdDsn" class="col-sm-2 col-form-label">ID Dosen</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="IdDsn" name="IdDsn" value=" <?= set_value('Dosen'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('IdDsn') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="MataKuliah" class="col-sm-2 col-form-label">Mata Kuliah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="MataKuliah" name="MataKuliah" value=" <?= set_value('MataKuliah'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('MataKuliah') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="JamTerbang" class="col-sm-2 col-form-label">Jam Terbang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="JamTerbang" name="JamTerbang" value=" <?= set_value('JamTerbang'); ?>">
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