<?= $this->extend('template/admin') ?>


<?= $this->section('header') ?>

<div class="page-title">
    <h4>
        <i class="icon-arrow-left52 position-left"></i>
        <span class="text-semibold">Form</span> - User Sekolah
        <small class="display-block">Inputkan data user sekolah</small>
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
        <form class="form-horizontal" action="<?= site_url('UserSekolah/UserSekolah/simpan'); ?>" method="post">
            <fieldset class="content-group">
                <legend class="text-bold">Form User Sekolah</legend>

                <div class="form-group">
                    <label class="control-label col-lg-2">Nama</label>
                    <div class="col-lg-10">
                        <input type="text" required name="data[nama]" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Pendidikan</label>
                    <div class="col-lg-10">
                        <input type="text" required name="data[mPendidikan]" class="form-control">
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
                <div class="form-group">
                    <label class="control-label col-lg-2">No Telp</label>
                    <div class="col-lg-10">
                        <input type="text" required name="data[notelp]" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">email</label>
                    <div class="col-lg-10">
                        <input type="text" required name="data[email]" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Username</label>
                    <div class="col-lg-10">
                        <input type="text" required name="data[user]" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Password</label>
                    <div class="col-lg-10">
                        <input type="password" required name="data[password]" class="form-control">
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