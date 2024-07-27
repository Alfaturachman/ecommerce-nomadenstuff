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
<style>
/* Tambahkan gaya CSS untuk ikon tercoret */
.crossed {
    text-decoration: line-through;
}
</style>

<div class="full-height">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12">
                <div class="card my-5">
                    <div class="card-header d-flex justify-content-center">
                        <h5 class="m-0"><strong>Form Register</strong></h5>
                    </div>
                    <div class="card-body">
                        <!-- <?php $this->load->view("layouts/_alerts") ?> -->
                        <form action="register" method="POST">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Masukkan nama Anda" required>
                                        <div class="error"><?= form_error('name') ?></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Masukkan email Anda" value="" required>
                                        <div class="error"><?= form_error('email') ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                    placeholder="Masukkan nomor telepon Anda" required>
                                <div class="error"><?= form_error('phone') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" class="form-control" style="resize:none;"
                                    placeholder="Masukkan alamat Anda" required></textarea>
                                <div class="error"><?= form_error('address') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Masukkan password minimal 6 karakter" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="togglePassword"
                                            onclick="togglePasswordVisibility('password')">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="error"><?= form_error('password') ?></div>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                <div class="input-group">
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control" placeholder="Masukkan password yang sama" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="togglePasswordConfirmation"
                                            onclick="togglePasswordVisibility('password_confirmation')">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="error"><?= form_error('password_confirmation') ?></div>
                            </div>

                            <script>
                            function togglePasswordVisibility(inputId) {
                                const passwordInput = document.getElementById(inputId);
                                const type = passwordInput.type === 'password' ? 'text' : 'password';
                                passwordInput.type = type;
                            }
                            </script>

                            <button type="submit" class="btn btn-dark btn-block mt-4">Register</button>
                        </form>
                        <p class="mt-3 text-center">Sudah memiliki akun? <a href="<?= base_url("login") ?>">Login
                                sekarang</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>