<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        <?= $title; ?>
    </title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('vendor/'); ?>fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="<?= base_url('vendor/sweetalert/') ?>sweetalert2.all.min.js"></script>
    <script src="<?= base_url('vendor/sweetalert/') ?>sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url('vendor/sweetalert/') ?>sweetalert2.min.css">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>css/login.css" rel="stylesheet">


</head>




<body class="bg-gradient-primary">

    <!-- Menu navigasi dan elemen header lainnya -->

    <div class="wrapper">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="navbar">
                <image src="Logo2.png" style=width:380px;height:230px;padding:30;margin-bottom:-35px;>
            </div>
            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">


                            <div class="col-lg-6">

                                <div class="p-5">


                                    <?= $this->session->flashdata('message') ?>
                                    <form action="<?= base_url('auth') ?>" method="post" name="login_form" class="user">
                                        <div class="text-center">
                                            <!-- <h1 class="h4 text-gray-900 mb-4">E-FILLING</h1> -->
                                        </div>


                                        <div class="input-box">
                                            <input name="nip" type="text" class="form-control form-control-user"
                                                id="inputUser" placeholder="NIP" value="<?= set_value('nip') ?>">
                                            <?= form_error('nip', '<small style="color:red;padding-left:5px;">', '</small>'); ?>
                                            <i class='bx bxs-user'></i>
                                        </div>

                                        <div class="input-box">
                                            <input name="password" type="password"
                                                class="form-control form-control-user" id="inputPassword"
                                                placeholder="Password" value="<?= set_value('password') ?>">
                                            <?= form_error('password', '<small style="color:red;padding-left:5px;">', '</small>'); ?>
                                            <i class='bx bxs-lock-alt'></i>
                                        </div>



                                        <button type="submit" name="submit" class="btn btn-primary btn-user btn-block"
                                            onclick="signIn()">Login</button>
                                    </form>
                                </div>



                                <script type="text/javascript">
                                    function signIn() {
                                        // Simulate sign-in process
                                        // Replace this with your actual sign-in logic

                                        // If sign-in  is successful, show toast
                                        Toast.fire({
                                            icon: 'success',
                                            title: 'Signed in successfully'
                                        });
                                    }

                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000,
                                        timerProgressBar: true,
                                        didOpen: (toast) => {
                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                        }
                                    });
                                </script>

                                <!-- Bootstrap core JavaScript-->
                                <script src="vendor/jquery/jquery.min.js"></script>
                                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                                <!-- Core plugin JavaScript-->
                                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                                <!-- Custom scripts for all pages-->
                                <script src="js/sb-admin-2.min.js"></script>

</body>

</html>