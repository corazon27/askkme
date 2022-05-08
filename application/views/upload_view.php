<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 4.5.2-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style></style>
</head>

<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="#">Aplikasi Upload</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('upload'); ?>">Upload File</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container pt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="mb-2">
                    <!-- Menampilkan flashh data (pesan saat data berhasil disimpan)-->
                    <?php if ($this->session->flashdata('message')) :
                        echo $this->session->flashdata('message');
                    endif; ?>
                </div>
                <?php
                //form upload file menggunkan type form enctype form_open_multipart
                $attributes = array('id' => 'FrmUploadFile', 'method' => "post");
                echo form_open_multipart('', $attributes);
                ?>


                <div class="form-group row">
                    <label for="Nama" class="col-sm-2 col-form-label">File Upload</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="FileUpload" name="FileUpload" accept=".png,.jpg,.jpeg,.pdf">
                        <small>File type: gif, png, jpeg, jpg<br>Max size:2MB</small>
                        <small class="text-danger">
                            <?php echo form_error('FileUpload') ?>
                        </small>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10 offset-md-2">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>