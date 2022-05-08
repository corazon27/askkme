<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title><?= $title ?></title>
</head>

<body>

    <div>
        <div class="card">
            <h3 id="card_one" class="card-header" align="center"><b>HASIL PENGAJUAN PELAYANAN BARU</b></h3>
            <div class="card-body">
                <div class="card">
                    <!-- awal BAB 2 -->
                    <h3 id="card_two" class="card-header">
                        <center>NAMA FASKES : <?= strtoupper(userdata('nama_faskes')) ?> <br> PELAYANAN POLI NYERI</center>
                    </h3>
                    <div class="card-body">
                        <form>
                            <table border="2" width="100%" class="table table-striped">
                                <thead>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($getCheckbox as $gC) { ?>
                                        <tr class="table-success">
                                            <td colspan="3" align="center">
                                                <h4><b>Self Assesment</b></h4>
                                            </td>
                                            <td colspan="3" align="center">
                                                <h4><b>Kredensialing</b></h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal, Bulan, Tahun</td>
                                            <td>:</td>
                                            <td><?= $gC['tgl'] ?></td>
                                            <td>Tanggal, Bulan, Tahun</td>
                                            <td>:</td>
                                            <td><?= $gC['tgKreon'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Hasil Skor Assesment</td>
                                            <td>:</td>
                                            <td><?= $gC['hasilSkor'] ?></td>
                                            <td>Hasil Skor Kredensialing</td>
                                            <td>:</td>
                                            <td><?= $gC['hasilBpjs'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }

        #card_one.card-header {
            background-color: #D7ECCE;
            color: #3C763D;
        }

        #card_two.card-header {
            background-color: #3175AF;
            color: white;
        }
    </style>
    <script>
        window.print();
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>