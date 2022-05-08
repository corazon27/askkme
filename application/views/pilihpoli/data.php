<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .bg-login-image {
            background-image: url("<?= base_url('assets/img/bpjs.png'); ?>");
            background-repeat: no-repeat;
            background-size: 80%;
        }
    </style>

</head>



<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center mt-3 pt-lg-5">

            <div class="col-xl-5 col-lg-8 col-md-9">
                <script src="https://www.google.com/recaptcha/api.js"></script>
                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-lg-5 p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="h4 text-center text-gray-900">Pilih Poli</h1>
                                <form action="pilih_poli/aksi" method="post">
                                    <table align="center" width="30%">
                                        <tr>
                                            <td width="12"> <input type="radio" name="poli" value="nyeri"></td>
                                            <td> Nyeri</td>
                                        </tr>
                                        <tr>
                                            <td> <input type="radio" name="poli" value="hemodialisa"></td>
                                            <td>Hemodialisa</td>
                                        </tr>
                                        <tr>
                                            <td> <input type="radio" name="poli" value="kemoterapi"></td>
                                            <td>Kemoterapi</td>
                                        </tr>
                                        <tr>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <td> <button type="submit" class="btn-primary">Masuk</button></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            #note_one.note-header {
                font-size: 12px;
                margin-top: 8pt;
                margin-left: 9pt;
                font-style: normal;
                font-family: 'Times New Roman', Times, serif;
                font-weight: bold;
                line-height: normal;
                color: red;
            }
        </style>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>