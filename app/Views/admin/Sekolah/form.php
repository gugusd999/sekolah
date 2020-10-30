<?= $this->extend('template/admin') ?>
<?= $this->section('header') ?>
<div class="page-title">
    <h4>
        <i class="icon-arrow-left52 position-left"></i>
        <span class="text-semibold">Home</span> - Form Sekolah
        <small class="display-block">Good morning, Victoria Baker!</small>
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

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?php
            $form::start();
            $form::summernote();

            $form::input([
                "title" => "logo",
                "type" => "text",
                "fc" => "logo",
                "data" => "id",
                "placeholder" => "inputkan logo",
            ]);

            $form::input([
                "title" => "nama",
                "type" => "text",
                "fc" => "nama",
                "data" => "id",
                "placeholder" => "inputkan nama",
            ]);

            $form::input([
                "title" => "npsn",
                "type" => "text",
                "fc" => "npsn",
                "data" => "id",
                "placeholder" => "inputkan npsn",
            ]);

            $form::input([
                "title" => "bentuk pendidikan",
                "type" => "number",
                "fc" => "bentuk_pendidikan_id",
                "data" => "id",
                "placeholder" => "inputkan bentuk pendidikan",
            ]);

            $form::input([
                "title" => "alamat",
                "type" => "text",
                "fc" => "alamat",
                "data" => "id",
                "placeholder" => "inputkan alamat",
            ]);

            $form::input([
                "title" => "kelurahan",
                "type" => "text",
                "fc" => "kelurahan",
                "data" => "id",
                "placeholder" => "inputkan kelurahan",
            ]);

            $form::input([
                "title" => "kecamatan",
                "type" => "text",
                "fc" => "kecamatan",
                "data" => "id",
                "placeholder" => "inputkan kecamatan",
            ]);

            $form::input([
                "title" => "kota",
                "type" => "text",
                "fc" => "kota",
                "data" => "id",
                "placeholder" => "inputkan kota",
            ]);

            $form::input([
                "title" => "provinsi",
                "type" => "text",
                "fc" => "provinsi",
                "data" => "id",
                "placeholder" => "inputkan provinsi",
            ]);

            $form::input([
                "title" => "rt",
                "type" => "text",
                "fc" => "rt",
                "data" => "id",
                "placeholder" => "inputkan rt",
            ]);

            $form::input([
                "title" => "rw",
                "type" => "text",
                "fc" => "rw",
                "data" => "id",
                "placeholder" => "inputkan rw",
            ]);

            $form::input([
                "title" => "kodepos",
                "type" => "text",
                "fc" => "kodepos",
                "data" => "id",
                "placeholder" => "inputkan kodepos",
            ]);

            $form::input([
                "title" => "lintang",
                "type" => "text",
                "fc" => "lintang",
                "data" => "id",
                "placeholder" => "inputkan lintang",
            ]);

            $form::input([
                "title" => "bujur",
                "type" => "text",
                "fc" => "bujur",
                "data" => "id",
                "placeholder" => "inputkan bujur",
            ]);

            $form::input([
                "title" => "telepon",
                "type" => "text",
                "fc" => "telepon",
                "data" => "id",
                "placeholder" => "inputkan telepon",
            ]);

            $form::input([
                "title" => "nomorfax",
                "type" => "text",
                "fc" => "nomorfax",
                "data" => "id",
                "placeholder" => "inputkan nomorfax",
            ]);

            $form::input([
                "title" => "email",
                "type" => "text",
                "fc" => "email",
                "data" => "id",
                "placeholder" => "inputkan email",
            ]);

            $form::input([
                "title" => "website",
                "type" => "text",
                "fc" => "website",
                "data" => "id",
                "placeholder" => "inputkan website",
            ]);

            $form->submit();
            $form::end();
            ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>