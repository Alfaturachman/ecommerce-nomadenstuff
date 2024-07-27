<style>
.card {
    box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;
}
</style>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<div class="untree_co-section before-footer-section">
    <div class="container my-5">
        <div class="row">
            <div class="col-6">
                <h3 class="text-black h5 mb-3"><strong>Keranjang Belanja</strong></h3>
                <div class="row">
                    <div class="col">
                        <?php foreach ($content as $row) : ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="<?= $row->image ? base_url("images/product/$row->image") : base_url("images/product/default.jpg") ?>"
                                            alt="" height="150" class="img-responsive">
                                    </div>
                                    <div class="col-8">
                                        <h5 class="card-title"><strong><?= $row->title ?></strong></h5>
                                        <!-- Catatan Produk (Uncomment jika diperlukan) -->
                                        <!-- <form action="<?= base_url("cart/updateMessage/$row->id") ?>" method="POST">
                                                <input type="hidden" name="id" value="<?= $row->id ?>">
                                                <textarea name="message" cols="10" rows="3" class="form-control" style="resize: none;"><?= $row->message ?></textarea>
                                                <button class="btn btn-dark mt-2" type="submit" id="button-addon2"><i class="fa fa-check mr-2"></i>Simpan Catatan</button>
                                            </form> -->
                                        <p class="card-text m-0 p-0 mb-1"><strong>Harga:</strong> Rp
                                            <?= number_format($row->price, 0, ',', '.') ?>
                                        </p>
                                        <p class="card-text m-0 p-0 mb-1"><strong>Jumlah:</strong> <?= $row->quantity ?>
                                        </p>
                                        <p class="card-text"><strong>Subtotal:</strong> Rp
                                            <?= number_format($row->sub_total, 0, ',', '.') ?></p>
                                        <form action="<?= base_url("cart/delete/$row->id") ?>" method="POST">
                                            <input type="hidden" name="id" value="<?= $row->id ?>">
                                            <button class="btn btn-danger" type="submit"
                                                onclick="return confirm('Apakah yakin ingin menghapus?')">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row justify-content-end">
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-12 border-bottom mb-5">
                                        <h3 class="text-black h5 mb-3"><strong>Total Keranjang Belanja</strong></h3>
                                    </div>
                                </div>
                                <?php
                                // Calculate the subtotal
                                $subTotal = array_sum(array_column($content, 'sub_total'));

                                // Apply discount based on subtotal
                                $discountPercentage = 0; // Default no discount

                                if ($subTotal > 500000) {
                                    $discountPercentage = 20;
                                } elseif ($subTotal > 200000) {
                                    $discountPercentage = 10;
                                }

                                // Calculate discount amount
                                $discountAmount = ($discountPercentage / 100) * $subTotal;
                                ?>
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <span class="text-black"><strong>Subtotal</strong></span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black">
                                            Rp<?= number_format($subTotal, 0, ',', '.') ?>
                                        </strong>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <span class="text-black"><strong>Diskon
                                                <?= $discountPercentage; ?>%</strong></span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black">-
                                            Rp<?= number_format($discountAmount, 0, ',', '.') ?></strong>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <span class="text-black"><strong>Total Belanja</strong></span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong
                                            class="text-black">Rp<?= number_format($subTotal - $discountAmount, 0, ',', '.') ?></strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="<?= base_url() ?>" class="btn btn-md btn-secondary w-100 mb-3"><i
                                                class="fas fa-arrow-left"></i> <strong>Lanjut Belanja</strong></a>
                                        <a href="<?= base_url('checkout') ?>" class="btn btn-md btn-success w-100"><i
                                                class="fas fa-credit-card"></i> <strong>Pembayaran</strong></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>