<?= $this->extend('template/admin') ?>


<?= $this->section('header') ?>

    <div class="page-title">
        <h4>
            <i class="icon-arrow-left52 position-left"></i>
            <span class="text-semibold">Form</span> - Mater Sekolah
            <small class="display-block">Good morning, Gugus!</small>
        </h4>
    </div>

    <div class="heading-elements">
        <div class="heading-btn-group">
            <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
            <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
            <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="panel panel-flat">
    <div class="panel-body">
        <form class="form-horizontal" action="<?= site_url('Admin/mSekolah/simpan'); ?>" method="post">
            <fieldset class="content-group">
                <legend class="text-bold">Identitas Sekolah</legend>

                <div class="form-group">
                    <label class="control-label col-lg-2">Nama Sekolah</label>
                    <div class="col-lg-10">
                        <input type="text" required name="data[nama_sekolah]" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">NPSN</label>
                    <div class="col-lg-10">
                        <input type="text" required name="data[npsn]" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Bentuk Pendidikan</label>
                    <div class="col-lg-10">
                        <select type="text" required name="data[bentuk_pendidikan_id]" class="form-control">
                            <option value="">pilih data</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Alamat</label>
                    <div class="col-lg-10">
                        <input type="text" required name="data[alamat]" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Desa/ Kelurahan</label>
                    <div class="col-lg-10">
                        <input type="text" required name="data[desa_kelurahan]" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Kecamatan</label>
                    <div class="col-lg-10">
                        <input type="text" required name="data[kecamatan]" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Kabupaten/ Kota</label>
                    <div class="col-lg-10">
                        <input type="text" required name="data[kabupaten_kota]" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Provinsi</label>
                    <div class="col-lg-10">
                        <input type="text" required name="data[provinsi]" class="form-control">
                    </div>
                </div>  
            </fieldset>
            <fieldset class="content-group">
                <legend class="text-bold">Lokasi Sekolah</legend>
                <div class="form-group">
                    <label class="control-label col-lg-2">Rt</label>
                    <div class="col-lg-10">
                        <input type="text" required name="data[rt]" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Rw</label>
                    <div class="col-lg-10">
                        <input type="text" required name="data[rw]" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Nama Dusun</label>
                    <div class="col-lg-10">
                        <input type="text" required name="data[nama_dusun]" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Kode Pos</label>
                    <div class="col-lg-10">
                        <input type="text" required name="data[kode_pos]" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Lintang</label>
                    <div class="col-lg-10">
                        <input type="text" required name="data[lintang]" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Bujur</label>
                    <div class="col-lg-10">
                        <input type="text" required name="data[bujur]" class="form-control">
                    </div>
                </div>
            </fieldset>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>