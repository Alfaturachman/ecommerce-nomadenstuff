<style>
    .card {
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.18) 0px 2px 4px;
    }

    .card-product {
        border-radius: 50px;
        /* border: none; */
        /* box-shadow: rgba(0, 0, 0, 0.18) 0px 2px 4px; */
    }
</style>
<div class="container my-5">
    <!-- <?php $this->load->view('layouts/_alerts'); ?> -->

    <div class="row">
        <div class="col-md-3 col-sm-12">
            <?php $this->load->view('layouts/user/_sidebar') ?>
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between">
                    <p class="m-0 p-0 h5"><strong class="font-weight-bold">Detail Order </strong>
                    </p>
                    <?php $this->load->view('layouts/_status', ['status' => $order->status]); ?>
                </div>
                <div class="card-body">
                    <?php if ($order->status == 'waiting') : ?>
                        <p class="alert alert-warning text-center">
                            <strong>Waktu Checkout Tersisa:
                                <br>
                                <span class="h4" id="countdown"></span>
                            </strong>
                        </p>
                    <?php endif ?>
                    <p>Nomor Invoice : #<?= $order->invoice ?></p>
                    <p>Tanggal : <?= str_replace('-', '/', date("d-m-Y", strtotime($order->date))) ?></p>
                    <p>Nama : <?= $order->name ?></p>
                    <p>Telepon : <?= $order->phone ?></p>
                    <p>Alamat : <?= $order->address ?>, <?= $order->city ?>, <?= $order->province ?></p>
                    <p>Jasa Pengiriman : <?= $order->courier ?></p>
                    <?php if ($order->waybill != "") : ?>
                        <p>No. Resi : <?= $order->waybill ?></p>
                    <?php endif ?>
                    <?php foreach ($order_detail as $row) : ?>
                        <div class="card-group">
                            <div class="card mb-3" style="border-radius: 10px; box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="<?= $row->image ? base_url("images/product/$row->image") : base_url("images/product/default.jpg") ?>" alt="<?= $row->title ?>" class="img-responsive mb-2" height="150">
                                        </div>

                                        <div class="col-md-6">
                                            <h5 class="card-title"><strong><?= $row->title ?></strong></h5>
                                            <!-- <p class="card-text"><strong>Catatan Produk:</strong>
                                                <?= $row->message ? $row->message : '-' ?>
                                            </p> -->
                                            <p class="card-text"><strong>Harga:</strong> Rp
                                                <?= number_format($row->price, 0, ',', '.') ?></p>
                                            <p class="card-text"><strong>Jumlah:</strong> <?= $row->quantity ?></p>
                                            <p class="card-text"><strong>Subtotal:</strong> Rp
                                                <?= number_format($row->sub_total, 0, ',', '.') ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                    <div class="table-responsive">
                        <table class="table">
                            <tfoot style="background-color: rgba(221, 221, 221, 0.25);">
                                <tr>
                                    <td colspan="4" class="border-top border-bottom"><strong>Total Belanja</strong></td>
                                    <td class="border-top border-bottom" style="white-space: nowrap; width: 1%; text-align: right;"><strong>Rp
                                            <?= number_format(array_sum(array_column($order_detail, 'sub_total')), 0, ',', '.') ?></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="border-top border-bottom">Diskon
                                        <?= $order->diskon_persen ?>%</td>
                                    <td class="border-top border-bottom" style="white-space: nowrap; width: 1%; text-align: right;">Rp
                                        <?= number_format($order->diskon, 0, ',', '.') ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="border-top border-bottom">Ongkos Kirim</td>
                                    <td class="border-top border-bottom" style="white-space: nowrap; width: 1%; text-align: right;">Rp
                                        <?= number_format($order->cost_courier, 0, ',', '.') ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="border-top border-bottom"><strong>Total Bayar</strong></td>
                                    <td class="border-top border-bottom" style="white-space: nowrap; width: 1%; text-align: right;"><strong>Rp
                                            <?= number_format($order->total, 0, ',', '.') ?></strong>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <?php if ($order->status == 'waiting') : ?>
                        <div class="mt-3">
                            <button class="btn btn-danger btn-block mb-2" data-toggle="modal" data-target="#cancelOrderModal">
                                <strong><i class="fas fa-times"></i> Batalkan Pesanan</strong>
                            </button>
                            <a href="<?= base_url("/myorder/confirm/$order->invoice") ?>" class="btn btn-success btn-block"><i class="fas fa-credit-card"></i>
                                <strong>Lanjutkan Pembayaran</strong>
                            </a>
                        </div>
                    <?php endif ?>
                    <!-- Modal -->
                    <div class="modal fade" id="cancelOrderModal" tabindex="-1" role="dialog" aria-labelledby="cancelOrderModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="cancelOrderModalLabel">Konfirmasi Pembatalan Pesanan
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin membatalkan pesanan?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                    <a href="<?= base_url("/myorder/cancel/$order->invoice") ?>" class="btn btn-danger" onclick="cancelOrderAndResetTimer()">Ya, Batalkan Pesanan</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <?php if (isset($order_confirm)) : ?>
                <div class="card mb-3">
                    <div class="card-header">
                        <strong>Bukti Transfer</strong>
                    </div>
                    <div class="card-body">
                        <p>No Rekening : <?= $order_confirm->account_number ?></p>
                        <p>Atas Nama : <?= $order_confirm->account_name ?></p>
                        <p>Nominal : Rp <?= number_format($order_confirm->nominal, 0, ',', '.') ?></p>
                        <p>Note : <?= $order_confirm->note ?></p>

                        <div class="mt-3">
                            <img src="<?= base_url("/images/confirm/$order_confirm->image") ?>" alt="" height="200" class="img-responsive">
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>
<!-- Di bagian head atau sebelum tag </body> -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Ambil waktu selesai checkout dari local storage jika sudah tersedia untuk pesanan ini
        let orderID = <?= $order->id ?>; // Ganti ini dengan cara yang sesuai untuk mendapatkan ID pesanan
        let checkoutEndTime = localStorage.getItem(`checkout_end_time_${orderID}`) || 0;

        // Jika waktu checkout tidak diset, atur waktu selesai checkout dan simpan ke local storage
        if (checkoutEndTime === 0 && '<?= $order->status ?>' === 'waiting') {
            checkoutEndTime = Math.floor(new Date().getTime() / 1000) + 7200;
            localStorage.setItem(`checkout_end_time_${orderID}`, checkoutEndTime);
        }

        // Perbarui tampilan sisa waktu hanya jika waktu checkout belum habis dan status pesanan adalah 'waiting'
        if (checkoutEndTime > Math.floor(new Date().getTime() / 1000) && '<?= $order->status ?>' === 'waiting') {
            let intervalId = setInterval(function() {
                // Ambil waktu sekarang di sisi klien
                let currentTime = Math.floor(new Date().getTime() / 1000);

                // Hitung sisa waktu
                let remainingTime = checkoutEndTime - currentTime;

                // Pastikan remainingTime tidak menjadi negatif
                remainingTime = Math.max(remainingTime, 0);

                // Tampilkan sisa waktu pada elemen dengan ID "countdown"
                document.getElementById("countdown").innerHTML = formatTime(remainingTime);

                // Cek jika waktu telah habis
                if (remainingTime <= 0) {
                    // Lakukan tindakan yang sesuai, misalnya, batalkan checkout atau kembalikan pengguna ke halaman sebelumnya
                    alert("Waktu checkout telah habis. Pesanan telah dibatalkan!");

                    // Simpan tindakan sesuai kebutuhan
                    cancelOrder();

                    // Hentikan perbarui waktu setelah waktu habis
                    clearInterval(intervalId);

                    // Hapus waktu checkout dari local storage untuk pesanan ini
                    localStorage.removeItem(`checkout_end_time_${orderID}`);
                }
            }, 1000);
        } else {
            // Jika waktu checkout sudah habis atau status pesanan bukan lagi 'waiting', lakukan tindakan sesuai kebutuhan
            // contohnya, redirect ke halaman lain atau tampilkan pesan kepada pengguna
            if ('<?= $order->status ?>' !== 'waiting') {
                // Sembunyikan atau hapus elemen waktu pembayaran jika status pesanan bukan lagi 'waiting'
                document.getElementById("countdown").style.display = "none"; // Ganti dengan cara yang sesuai
            } else {
                // Sembunyikan atau hapus elemen waktu pembayaran jika waktu checkout sudah habis
                cancelOrder();
            }
        }

        // Fungsi untuk memformat waktu
        function formatTime(seconds) {
            let hours = Math.floor(seconds / 3600); // Menyimpan jam dari total detik
            let minutes = Math.floor((seconds % 3600) / 60); // Menyimpan menit dari sisa detik setelah diambil jam
            seconds %= 60; // Mengambil sisa detik setelah diambil jam dan menit

            return `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        }

        // Fungsi untuk membatalkan pesanan
        function cancelOrder() {
            try {
                console.log('cancelOrder() called'); // Tambahkan log ini
                // Menggunakan AJAX atau mengarahkan pengguna ke halaman pembatalan pesanan
                window.location.href = '<?= base_url("/myorder/cancel/{$order->invoice}") ?>';

                // Hapus waktu checkout dari local storage untuk pesanan ini
                localStorage.removeItem(`checkout_end_time_${orderID}`);
            } catch (error) {
                console.error('Error in cancelOrder():', error);
            }
        }

        function cancelOrderAndResetTimer() {
            // Hentikan perhitungan mundur jika intervalId ada
            if (intervalId) {
                clearInterval(intervalId);
            }

            // Hapus waktu checkout dari local storage untuk pesanan ini
            localStorage.removeItem(`checkout_end_time_${orderID}`);

            // Redirect ke halaman pembatalan pesanan
            window.location.href = '<?= base_url("/myorder/cancel/{$order->invoice}") ?>';
        }
    });
</script>