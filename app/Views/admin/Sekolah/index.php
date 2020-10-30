<?= $this->extend('template/admin') ?>
<?= $this->section('header') ?>
<div class="page-title">
    <h4>
        <i class="icon-arrow-left52 position-left"></i>
        <span class="text-semibold">Home</span> - Sekolah
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
            <?php if (isset($edit)) : ?>
                <?php
                $form::start(site_url('Sekolah/update'));
                $form::summernote();

                $form::input([
                    "title" => "logo",
                    "type" => "text",
                    "fc" => "logo",
                    "data" => "id",
                    "placeholder" => "inputkan logo",
                    "value" => $edit->logo,
                ]);

                $form::input([
                    "title" => "nama",
                    "type" => "text",
                    "fc" => "nama",
                    "data" => "id",
                    "placeholder" => "inputkan nama",
                    "value" => $edit->nama,
                ]);

                $form::input([
                    "title" => "npsn",
                    "type" => "text",
                    "fc" => "npsn",
                    "data" => "id",
                    "placeholder" => "inputkan npsn",
                    "value" => $edit->npsn,
                ]);

                $form::input([
                    "title" => "bentuk pendidikan",
                    "type" => "number",
                    "fc" => "bentuk_pendidikan_id",
                    "data" => "id",
                    "placeholder" => "inputkan bentuk pendidikan",
                    "value" => $edit->bentuk_pendidikan_id,
                ]);

                $form::input([
                    "title" => "alamat",
                    "type" => "text",
                    "fc" => "alamat",
                    "data" => "id",
                    "placeholder" => "inputkan alamat",
                    "value" => $edit->alamat,
                ]);

                $form::input([
                    "title" => "kelurahan",
                    "type" => "text",
                    "fc" => "kelurahan",
                    "data" => "id",
                    "placeholder" => "inputkan kelurahan",
                    "value" => $edit->kelurahan,
                ]);

                $form::input([
                    "title" => "kecamatan",
                    "type" => "text",
                    "fc" => "kecamatan",
                    "data" => "id",
                    "placeholder" => "inputkan kecamatan",
                    "value" => $edit->kecamatan,
                ]);

                $form::input([
                    "title" => "kota",
                    "type" => "text",
                    "fc" => "kota",
                    "data" => "id",
                    "placeholder" => "inputkan kota",
                    "value" => $edit->kota,
                ]);

                $form::input([
                    "title" => "provinsi",
                    "type" => "text",
                    "fc" => "provinsi",
                    "data" => "id",
                    "placeholder" => "inputkan provinsi",
                    "value" => $edit->provinsi,
                ]);

                $form::input([
                    "title" => "rt",
                    "type" => "text",
                    "fc" => "rt",
                    "data" => "id",
                    "placeholder" => "inputkan rt",
                    "value" => $edit->rt,
                ]);

                $form::input([
                    "title" => "rw",
                    "type" => "text",
                    "fc" => "rw",
                    "data" => "id",
                    "placeholder" => "inputkan rw",
                    "value" => $edit->rw,
                ]);

                $form::input([
                    "title" => "kodepos",
                    "type" => "text",
                    "fc" => "kodepos",
                    "data" => "id",
                    "placeholder" => "inputkan kodepos",
                    "value" => $edit->kodepos,
                ]);

                $form::input([
                    "title" => "lintang",
                    "type" => "text",
                    "fc" => "lintang",
                    "data" => "id",
                    "placeholder" => "inputkan lintang",
                    "value" => $edit->lintang,
                ]);

                $form::input([
                    "title" => "bujur",
                    "type" => "text",
                    "fc" => "bujur",
                    "data" => "id",
                    "placeholder" => "inputkan bujur",
                    "value" => $edit->bujur,
                ]);

                $form::input([
                    "title" => "telepon",
                    "type" => "text",
                    "fc" => "telepon",
                    "data" => "id",
                    "placeholder" => "inputkan telepon",
                    "value" => $edit->telepon,
                ]);

                $form::input([
                    "title" => "nomorfax",
                    "type" => "text",
                    "fc" => "nomorfax",
                    "data" => "id",
                    "placeholder" => "inputkan nomorfax",
                    "value" => $edit->nomorfax,
                ]);

                $form::input([
                    "title" => "email",
                    "type" => "text",
                    "fc" => "email",
                    "data" => "id",
                    "placeholder" => "inputkan email",
                    "value" => $edit->email,
                ]);

                $form::input([
                    "title" => "website",
                    "type" => "text",
                    "fc" => "website",
                    "data" => "id",
                    "placeholder" => "inputkan website",
                    "value" => $edit->website,
                ]);

                $form::input([
                    "type" => "hidden",
                    "fc" => "id",
                    "value" => $edit->id,
                ]);

                $form->submit('Update');
                $form::end();
                ?>

            <?php else : ?>
                <a href="<?= site_url('Sekolah/index/tambah') ?>">Baru</a>
            <?php endif; ?>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <table id="mytable" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>logo</th>
                                <th>nama</th>
                                <th>npsn</th>
                                <th>bentuk pendidikan</th>
                                <th>alamat</th>
                                <th>kelurahan</th>
                                <th>kecamatan</th>
                                <th>kota</th>
                                <th>provinsi</th>
                                <th>rt</th>
                                <th>rw</th>
                                <th>kodepos</th>
                                <th>lintang</th>
                                <th>bujur</th>
                                <th>telepon</th>
                                <th>nomorfax</th>
                                <th>email</th>
                                <th>website</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                    <script>
                        var mytable = null;

                        $(document).ready(function() {
                            mytable = $("#mytable").DataTable({
                                scrollX: true,
                                scrollY: true,
                                processing: true,
                                serverSide: true,
                                order: [],
                                ajax: {
                                    "url": "<?= site_url('Sekolah/json') ?>",
                                    "type": "POST"
                                }
                            })

                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal delete -->

<div class="modal" id="hapusmodal">
    <div class="modal-dialog">
        <form action="<?= site_url('Sekolah/hapus') ?>" method="post" enctype="">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Alert !</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Anda yakin ingin menghapus data ?
                    <input type="hidden" name="id" id="kode-hapus">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('body').on('click', '[modal-open-delete]', function() {
            $("#hapusmodal").modal('show');
            $("#kode-hapus").val($(this).attr('data-id'));

        })

    })
</script>

<!-- end modal -->

<?= $this->endSection() ?>