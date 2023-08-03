<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Filling Perumda Tugu Tirta</title>
    
    <!-- CSS FILES -->
    <link href="<?= base_url('vendor/user/') ?>css/bootstrap.min.css" rel="stylesheet">

    <link href="<?= base_url('vendor/user/') ?>css/bootstrap-icons.css" rel="stylesheet">

    <link href="<?= base_url('vendor/user/') ?>css/templatemo-kind-heart-charity.css" rel="stylesheet">

    <link href="<?= base_url('vendor/user/') ?>css/datatables.min.css" rel="stylesheet">
    <!--

TemplateMo 581 Kind Heart Charity

https://templatemo.com/tm-581-kind-heart-charity

-->

</head>

<body id="section_1">

    <nav class="navbar navbar-expand-lg bg-light shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="logo.png" class="logo img-fluid" alt="Kind Heart Charity">
                <span>
                    Helllo, User
                    <small>Direktur Utama(Jabatan)</small>
                </span>
            </a>


        </div>
    </nav>

    <main>
        <section class="section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-8 text-center mx-auto">
                        <h2 class="mb-5">Surat Keputusan Perumda Tugu Tirta</h2>
                    </div>

                    <table id="datatables" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Dokumen</th>
                                <th>Jenis Dokumen</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Kode Jabatan</th>
                                <th>Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>SK-Kenaikan Gaji</td>
                                <td>SK</td>
                                <td>12345678</td>
                                <td>Andi</td>
                                <td>A8</td>
                                <td>Karyawan</td>
                            </tr>
                            <tr>
                                <td>Ijazah</td>
                                <td>Sertifikat</td>
                                <td>12345679</td>
                                <td>Adi</td>
                                <td>A9</td>
                                <td>Karyawan</td>
                            </tr>
                            <tr>
                                <td>SK-Kenaikan Gaji</td>
                                <td>SK</td>
                                <td>12345677</td>
                                <td>Santi</td>
                                <td>A7</td>
                                <td>Karyawan</td>
                            </tr>
                            <tr>
                                <td>Ijazah</td>
                                <td>Sertifikat</td>
                                <td>12345676</td>
                                <td>Eka</td>
                                <td>A5</td>
                                <td>Karyawan</td>
                            </tr>
                            <tr>
                                <td>SK-Kenaikan Gaji</td>
                                <td>SK</td>
                                <td>12345671</td>
                                <td>Didi</td>
                                <td>A3</td>
                                <td>Karyawan</td>
                            </tr>
                        </tbody>
                    </table>

    </main>



    <!-- JAVASCRIPT FILES -->
    <script src="<?= base_url('vendor/user/') ?>js/jquery.min.js"></script>
    <script src="<?= base_url('vendor/user/') ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('vendor/user/') ?>js/jquery.sticky.js"></script>
    <script src="<?= base_url('vendor/user/') ?>js/click-scroll.js"></script>
    <script src="<?= base_url('vendor/user/') ?>js/counter.js"></script>
    <script src="<?= base_url('vendor/user/') ?>js/custom.js"></script>
    <script src="<?= base_url('vendor/user/') ?>js/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatables').DataTable();
        });
    </script>
</body>

</html>