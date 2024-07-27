<style>
    .card {
        box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;
    }
</style>
<div class="container my-5">
    <!-- <?php $this->load->view('layouts/_alerts') ?> -->
    <?php if ($content) : ?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>"><strong>Home</strong></a>
                </li>
                <li class="breadcrumb-item"><a href="<?= base_url("#new-product") ?>">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $content->product_title ?></li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-4 col-sm-12 my-2">
                <img src="<?= $content->image ? base_url("images/product/$content->image") : base_url("images/product/default.jpg") ?>" alt="" class="img-fluid">
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="row">
                    <div class="col">
                        <h3 class="title-product font-weight-bold"><?= $content->product_title ?></h3>
                        <h4 class="price-product">
                            <strong class="font-weight-bold">Rp <?= number_format($content->price, 0, ',', '.') ?></strong>
                        </h4>
                        <h5 class="price-product mt-3">
                            <?= $content->is_available == 1 ? '<span class="badge badge-pill badge-success">Stok Tersedia</span>' : '<span class="badge badge-pill badge-danger">Kosong</span>' ?>
                        </h5>
                        <div class="mt-3">
                            <form action="<?= base_url('cart/add') ?>" method="POST" id="addToCartForm">
                                <input type="hidden" name="id_product" value="<?= $content->id ?>">
                                <input type="hidden" name="quantity" size="5" class="form-control" value="<?= $content->is_available == 1 ? '1' : '0' ?>">
                                <!-- <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Catatan untuk Produk</label>
                                        <?php $readonly = $content->is_available == 0 ? 'readonly' : ''; ?>
                                        <input type="text" name="message" class="form-control"
                                            placeholder="Contoh: Tambahkan Bubble Warp" <?= $readonly ?>>
                                    </div>
                                </div>
                            </div> -->
                                <div class="row">
                                    <div class="col">
                                        <div class="card shadow-lg mt-2">
                                            <div class="card-body">
                                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                    <li class="nav-item product-info">
                                                        <h5 class="m-0" style="font-weight: bold;">Detail
                                                            <?= $content->product_title ?>
                                                        </h5>
                                                    </li>
                                                </ul>
                                                <div class="tab-content" id="pills-tabContent">
                                                    <div class="tab-pane fade show active" id="pills-detail" role="tabpanel" aria-labelledby="pills-detail-tab">
                                                        <p><strong class="font-weight-bold">Jumlah :
                                                            </strong><?= $content->is_available == 1 ? '1' : '0' ?> buah</p>
                                                        <p><strong class="font-weight-bold">Kategori :
                                                            </strong><?= $content->category_title ?></p>
                                                        <p><strong class="font-weight-bold">Ukuran :
                                                            </strong><?= $content->size ?></p>
                                                        <p><strong class="font-weight-bold">Warna :
                                                            </strong><?= $content->color ?></p>
                                                        <p style="text-align: justify;">
                                                            <strong class="font-weight-bold">Deskripsi : </strong><br>
                                                            <?= $content->description ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($content->is_available == 1) : ?>
                                    <button type="submit" class="btn btn-md btn-block btn-cart mt-4">
                                        <i class="fas fa-shopping-cart"></i>
                                        <strong>Tambahkan Ke Keranjang</strong>
                                    </button>
                                <?php else : ?>
                                    <button type="button" class="btn btn-md btn-block btn-cart mt-4" disabled>
                                        <i class="fas fa-shopping-cart"></i>
                                        Tambahkan Ke Keranjang
                                    </button>
                                <?php endif; ?>
                            </form>
                            <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="cartModalLabel">Produk Sudah Ada di Keranjang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Produk ini sudah ditambahkan ke keranjang belanja Anda.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <!-- Mungkin Anda ingin menambahkan tombol untuk pergi ke halaman keranjang -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                document.getElementById('addToCartForm').addEventListener('submit', function(event) {
                    event.preventDefault(); // Hindari pengiriman formulir secara otomatis

                    // Gunakan AJAX untuk memanggil endpoint
                    $.ajax({
                        type: 'GET',
                        url: '<?= base_url("cart/isProductInCart/") ?>' + <?= $content->id ?>,
                        success: function(response) {
                            var result = JSON.parse(response);
                            var productAlreadyInCart = result.isProductInCart;

                            if (productAlreadyInCart) {
                                $('#cartModal').modal('show');
                            } else {
                                // Produk belum ada di keranjang, lanjutkan pengiriman formulir
                                document.getElementById('addToCartForm').submit();
                            }
                        },
                        error: function(error) {
                            console.log('Error:', error);
                        }
                    });
                });
            </script>
        </div>
</div>
<?php else : ?>
    <script>
        var redirectUrl = '<?= base_url('cart') ?>';
        window.location.href = redirectUrl;
    </script>
<?php endif; ?>
<script>
    document.getElementById('addToCartForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Hindari pengiriman formulir secara otomatis

        // Pemeriksaan apakah pengguna sudah login
        <?php if (!$this->session->userdata('id')) : ?>
            // Jika belum login, tampilkan modal login
            $('#loginModal').modal('show');
        <?php else : ?>
            // Jika sudah login, gunakan AJAX untuk memanggil endpoint
            $.ajax({
                type: 'GET',
                url: '<?= base_url("cart/isProductInCart/") ?>' + <?= $content->id ?>,
                success: function(response) {
                    var result = JSON.parse(response);
                    var productAlreadyInCart = result.isProductInCart;

                    if (productAlreadyInCart) {
                        $('#cartModal').modal('show');
                    } else {
                        // Produk belum ada di keranjang, lanjutkan pengiriman formulir
                        document.getElementById('addToCartForm').submit();
                    }
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        <?php endif; ?>
    });
</script>

<!-- Modal Login -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login Required</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda harus login untuk menambahkan produk ke keranjang.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="<?= base_url("login") ?>" class="btn btn-primary">Login</a>
            </div>
        </div>
    </div>
</div>