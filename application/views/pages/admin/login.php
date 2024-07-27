<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Admin</title>

    <link href="<?= base_url() ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
html,
body {
    height: 100%;
    margin: 0;
    padding: 0;
}

.full-height {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.bg-gradient-dark {
    background: linear-gradient(to right, #000000, #434343);
}

.form-control-user {
    border-radius: 0.75rem;
}
</style>
</head>

<body>
    <div class="full-height bg-gradient-secondary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4"><strong>Login Admin</strong></h1>
                                        </div>
                                        <!-- <?php $this->load->view('layouts/_alerts') ?> -->
                                        <form class="user" action="<?= base_url('admin/admin') ?>" method="POST">
                                            <div class="form-group">
                                                <input type="text" name="username"
                                                    class="form-control form-control-user"
                                                    style="border-radius: 0.75rem;" placeholder="Masukkan Username"
                                                    required>
                                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password"
                                                    class="form-control form-control-user"
                                                    style="border-radius: 0.75rem;" placeholder="Masukkan Password"
                                                    required>
                                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                            <button type="submit" class="btn btn-dark btn-user btn-block">Login</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>