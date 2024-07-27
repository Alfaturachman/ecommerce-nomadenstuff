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
    /* align-items: center; */
}

.card {
    border-radius: 10px
}
</style>

<div class="full-height">
    <div class="container my-5">

        <!-- <?php $this->load->view('layouts/_alerts'); ?> -->

        <div class="row">
            <div class="col-md-3 col-sm-12">
                <?php $this->load->view('layouts/user/_sidebar') ?>
            </div>
            <div class="col-md-9 col-sm-12">
                <div class="card">
                    <div class="card-header py-3">
                        <strong class="h5 font-weight-bold">Update Profil</strong>
                    </div>
                    <div class="card-body">
                        <form action="<?= $form_action ?>" method="POST" enctype="multipart/form-data">
                            <?php if (isset($input->id)) : ?>
                            <input type="hidden" name="id" value="<?= $input->id ?>">
                            <?php endif; ?>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" name="name" value="<?= $input->name ?>" class="form-control"
                                            required>
                                        <?= form_error('name') ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" value="<?= $input->email ?>"
                                            class="form-control" placeholder="Masukkan alamat email aktif" required>
                                        <?= form_error('email') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="phone" name="phone" value="<?= $input->phone ?>"
                                            class="form-control" placeholder="Masukkan alamat phone aktif" required>
                                        <?= form_error('phone') ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <input type="address" name="address" value="<?= $input->address ?>"
                                            class="form-control" placeholder="Masukkan alamat address aktif" required>
                                        <?= form_error('address') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Masukkan password minimal 8 karakter">
                                <?= form_error('password') ?>
                            </div>

                            <div class="form-group">
                                <label for="">Foto</label>
                                <br>
                                <input type="file" name="image" id="imageInput">
                                <?php if ($this->session->flashdata('image_error')) : ?>
                                <small
                                    class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                                <?php endif ?>
                                <?php if (isset($input->image)) : ?>
                                <img src="<?= base_url("/images/user/$input->image") ?>" alt="" height="150">
                                <?php endif ?>
                                <img class="mt-3" src="#" alt="Preview" id="imagePreview"
                                    style="max-width: 25%; display: none;">
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <a class="btn btn-secondary px-5" href="<?= base_url('profile') ?>" role="button">
                                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
                                    </a>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button class="btn btn-primary px-5" type="submit">
                                        <i class="fa fa-save" aria-hidden="true"></i> Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Fungsi untuk menampilkan preview gambar
function previewImage() {
    console.log('Function is called.'); // tambahkan ini untuk mengecek apakah fungsi ini dijalankan
    var input = document.getElementById('imageInput');
    var preview = document.getElementById('imagePreview');

    // Buat objek FileReader
    var reader = new FileReader();

    // Setelah membaca file, set atribut src elemen img ke hasil pembacaan
    reader.onload = function(e) {
        preview.src = e.target.result;
    };

    // Jika ada file terpilih, baca file tersebut sebagai URL data
    if (input.files.length > 0) {
        reader.readAsDataURL(input.files[0]);
        // Tampilkan elemen img
        preview.style.display = 'block';
    } else {
        // Sembunyikan elemen img jika tidak ada file terpilih
        preview.style.display = 'none';
    }
}

// Tambahkan event listener untuk peristiwa perubahan pada input file
document.getElementById('imageInput').addEventListener('change', previewImage);
</script>