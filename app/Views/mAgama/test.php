<?= $this->extend('template/admin') ?>

<?= $this->section('header') ?>

<div class="page-title">
    <h4>
        <i class="icon-arrow-left52 position-left"></i>
        <span class="text-semibold">Home</span> - Dashboard
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
<div class="panel panel-flat">
    <div class="panel-body">
        <?php
        $form::summernote();
        $form::start();
        $form::input([
            "title" => "number",
            "type" => "number",
            "fc" => "product_id1",
            "data" => "id",
            "placeholder" => "hanya inputan number",
        ]);
        $form::input([
            "title" => "Rupiah",
            "type" => "rupiah",
            "fc" => "product_id2",
            "placeholder" => "inputan format rupiah",
        ]);
        $form::input([
            "title" => "text",
            "type" => "text",
            "fc" => "text",
            "placeholder" => "hanya inputan text",
        ]);
        $form::input([
            "title" => "username *",
            "type" => "username",
            "fc" => "username",
            "placeholder" => "hanya inputan username",
        ]);
        $form::input([
            "title" => "password *",
            "type" => "password",
            "fc" => "password",
            "placeholder" => "hanya inputan password",
        ]);
        $form::input([
            "title" => "textonly",
            "type" => "textonly",
            "fc" => "product_id3",
            "placeholder" => "hanya inputan only text",
        ]);
        $form::input([
            "title" => "Date",
            "type" => "date",
            "fc" => "product_id4",
            "placeholder" => "hanya inputan date",
            "required" => true
        ]);
        $form::input([
            "title" => "file",
            "type" => "file",
            "fc" => "file",
            "placeholder" => "hanya inputan date",
            "required" => true
        ]);
        $form::input([
            "title" => "file with show image",
            "type" => "file",
            "fc" => "fileimg",
            "placeholder" => "hanya inputan date",
            "show-image" => true,
            "required" => true
        ]);
        $form::select_db([
            "title" => "Select Db",
            "type" => "date",
            "fc" => "product_id4",
            "placeholder" => "hanya inputan date",
            "db" => "mAgama",
            "data" => "nama",
            "required" => true
        ]);
        $form::textarea([
            "title" => "textarea",
            "type" => "text",
            "fc" => "textarea",
        ]);
        $form::editor([
            "title" => "editor summernote",
            "type" => "text",
            "fc" => "product_id5",
        ]);
        $form::end();
        ?>
    </div>
</div>
<?= $this->endSection() ?>