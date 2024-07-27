<div class="container my-5">
    <div class="row">
        <div class="col-md-3 col-sm-12">
            <?php $this->load->view('layouts/user/_sidebar') ?>
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <p class="m-0 p-0"><strong>Konfirmasi Order </strong>#<?= $order->invoice ?></p>
                    <?php $this->load->view('layouts/_status', ['status' => $order->status]); ?>
                </div>

                <form action="<?= $form_action ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_orders" value="<?= $order->id ?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nomor Invoice</label>
                            <input type="text" class="form-control" value="<?= $order->invoice ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Dari Rekening Atas Nama</label>
                            <input type="text" name="account_name" value="<?= $input->account_name ?>"
                                class="form-control" placeholder="Masukan Nama Rekening">
                            <?= form_error('account_name') ?>
                        </div>
                        <!-- <div class="form-group">
                            <label for="">No rekening</label>
                            <input type="text" name="account_number" value="<?= $input->account_number ?>" class="form-control" placeholder="Masukan Nomor Rekening Anda">
                            <?= form_error('account_number') ?>
                        </div> -->
                        <div class="form-group">
                            <label for="">Nominal</label>
                            <?php
                            // Menghitung nilai total tanpa format mata uang
                            $totalWithoutFormat = $order->total;

                            // Menampilkan nilai dengan format mata uang untuk ditampilkan
                            $formattedNominal = "Rp " . number_format($totalWithoutFormat, 0, ',', '.');
                            ?>
                            <input type="text" value="<?= $formattedNominal ?>" class="form-control" readonly>
                            <!-- Menyimpan nilai total tanpa format dalam input tersembunyi -->
                            <input type="hidden" name="nominal" value="<?= $totalWithoutFormat ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Catatan</label>
                            <textarea name="note" cols="30" rows="3" class="form-control">-</textarea>
                        </div>
                        <div class="form-group">
                            <p>
                                Silahkan lakukan pembayaran sesuai total bayar di atas dan transfer pada salah satu
                                rekening dibawah ini :
                            </p>
                            <style>
                            ul.bank-list li {
                                margin-bottom: 1rem;
                            }

                            img {
                                margin-right: 1rem;
                            }
                            </style>

                            <ul class="bank-list">
                                <li><img src="<?= base_url("assets/img/logo_bca.png") ?>" alt="Image" class="img-fluid"
                                        width="75px" /><strong>Bank Central Asia (BCA) 5139742685</strong> a/n
                                    NOMADENSTUFF</li>
                                <li><img src="<?= base_url("assets/img/logo_bri.png") ?>" alt="Image" class="img-fluid"
                                        width="75px" /><strong>Bank Rakyat Indonesia (BRI) 196214652186437</strong> a/n
                                    NOMADENSTUFF</li>
                                <li><img src="<?= base_url("assets/img/logo_bni.png") ?>" alt="Image" class="img-fluid"
                                        width="75px" /><strong>Bank Negara Indonesia (BNI) 7982562143</strong> a/n
                                    NOMADENSTUFF</li>
                                <li><img src="<?= base_url("assets/img/logo_bsi.png") ?>" alt="Image" class="img-fluid"
                                        width="75px" /><strong>Bank Syariah Indonesia (BSI) 652146347895214</strong>
                                    a/n NOMADENSTUFF</li>
                                <li><img src="<?= base_url("assets/img/logo_mandiri.png") ?>" alt="Image"
                                        class="img-fluid" width="75px" /><strong>Bank Mandiri 456321789532164</strong>
                                    a/n
                                    NOMADENSTUFF</li>
                            </ul>

                            <label class="m-0 mt-4 p-0" for=""><strong>Bukti Transfer</strong></label>
                            <p>*file harus berbentuk JPG, JPEG, PNG</p>
                            <input type="file" name="image" id="imageInput">
                            <?php if ($this->session->flashdata('image_error')) : ?>
                            <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                            <?php endif ?>
                            <img class="mt-3" src="#" alt="Preview" id="imagePreview"
                                style="max-width: 50%; display: none;">
                        </div>
                    </div>
                    <div class="m-3">
                        <button type="submit" class="btn btn-success btn-block"><strong>
                                <i class="fas fa-credit-card"></i> Konfirmasi Pembayaran</strong>
                        </button>
                    </div>
                </form>
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