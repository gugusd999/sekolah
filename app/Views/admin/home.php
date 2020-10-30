<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form action="<?= site_url('home/simpan') ?>" method="post" enctype=""> 
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="username" class="form-control" name="username" placeholder="username input username" require> 
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="username input eamil" require> 
                    </div>
                    <div class="form-group">
                        <label for="">Date</label>
                        <input type="date" class="form-control" name="date" placeholder="username input date" require> 
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="upload_image" placeholder="username input date" require> 
                    </div>
                    <div class="form-group">
                        <label for="">file</label>
                        <input type="file" class="form-control" name="upload_file" placeholder="username input date" require> 
                    </div>
                    <div class="form-group">
                        <label for="">doc</label>
                        <input type="file" class="form-control" name="upload_doc" placeholder="username input date" require> 
                    </div>
                    <div class="form-group">
                        <label for="">pdf</label>
                        <input type="file" class="form-control" name="upload_pdf" placeholder="username input date" require> 
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>


<?= $this->endSection() ?>