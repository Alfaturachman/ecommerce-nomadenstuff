<nav class="navbar sticky-top navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="<?= base_url() ?>"><strong>NOMADENSTUFF</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= $this->uri->segment(2) == 'men' ? 'active' : '' ?>" href="<?= base_url('shop/men') ?>">PRIA</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $this->uri->segment(2) == 'women' ? 'active' : '' ?>" href="<?= base_url('shop/women') ?>">WANITA</a>
                </li>
            </ul> -->
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <form action="<?= base_url('shop/search') ?>" method="POST" class="form-inline">
                        <div class="input-group input-navbar">
                            <input type="text" name="keyword" class="form-control" size="25" placeholder="Cari Produk">
                            <div class="input-group-append button-navbar">
                                <button class="btn btn-light" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php if (!$this->session->userdata('is_login')) : ?>
                    <li class="nav-item">
                        <span href="" class="nav-link text-white">
                            <a href="<?= base_url('register') ?>" class="btn btn-light">Register</a>

                            <a href="<?= base_url('login') ?>" class="btn btn-outline-light">Login</a>
                        </span>
                    </li>
                <?php else : ?>
                    <li class="nav-item dropdown">
                        <a href="<?= base_url('/profile') ?>" class="nav-link text-white m-auto p-auto">
                            <i class="fas fa-user"></i>
                            <span class="text-white">
                                <?= $this->session->userdata('name') ?>
                            </span>
                        </a>
                    </li>
                <?php endif ?>
                <li class="nav-item d-flex align-item-center">
                    <?php if ($this->session->userdata('is_login')) : ?>
                        <a href="<?= base_url('cart') ?>" class="nav-link text-white m-auto p-auto">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="px-2"><?= getCart() ?></span>
                        </a>
                    <?php else : ?>
                        <a href="#" class="nav-link text-white m-auto p-auto" data-toggle="modal" data-target="#addToCartModal">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    <?php endif; ?>
                </li>
                <!-- Modal Tambah ke Keranjang -->
                <div class="modal fade" id="addToCartModal" tabindex="-1" role="dialog" aria-labelledby="addToCartModalLabel" aria-hidden="true" data-backdrop="false">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addToCartModalLabel">Tambah ke Keranjang</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Anda harus login untuk menambahkan produk ke keranjang.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a href="<?= base_url("login") ?>" class="btn btn-primary">Login</a>
                            </div>
                        </div>
                    </div>
                </div>

            </ul>
        </div>
    </div>
</nav>
<script>
    $('#addToCartModal').on('show.bs.modal', function() {
        $('.modal-backdrop').css('opacity', 0.5);
    });

    $('#addToCartModal').on('hide.bs.modal', function() {
        $('.modal-backdrop').css('opacity', 1);
    });
</script>