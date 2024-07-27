<style>
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
</style>

<div class="full-height">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-sm-12">
                <div class="card my-5">
                    <div class="card-header d-flex justify-content-center">
                        <h5 class="m-0"><strong>Form Login</strong></h5>
                    </div>
                    <div class="card-body">
                        <!-- <?php $this->load->view("layouts/_alerts") ?> -->

                        <form action="login" method="POST">
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input type="email" name="email" value="" class="form-control" placeholder="Masukkan alamat email aktif" required>
                                <?php echo isset($validation) ? display_error($validation, 'email') : ''; ?>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" value="" class="form-control password-input" placeholder="Masukkan password minimal 6 karakter" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="togglePassword" onclick="togglePasswordVisibility()">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <?php echo isset($validation) ? display_error($validation, 'password') : ''; ?>
                                </div>
                            </div>

                            <script>
                                function togglePasswordVisibility() {
                                    const passwordInput = document.querySelector('.password-input');
                                    const type = passwordInput.type === 'password' ? 'text' : 'password';
                                    passwordInput.type = type;
                                    const eyeIcon = document.querySelector('#togglePassword i');
                                    eyeIcon.className = type === 'password' ? 'fa fa-eye' : 'fa fa-eye-slash';
                                }
                            </script>

                            <button type="submit" class="btn btn-dark btn-block mt-4">Login</button>
                        </form>

                        <!-- Keterangan untuk mendaftar jika belum memiliki akun -->
                        <p class="mt-3 text-center">Belum memiliki akun? <a href="<?= base_url("register") ?>">Daftar
                                sekarang</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>