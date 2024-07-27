<style>
.why-choose-section {
    padding: 2rem 0;
}

.why-choose-section .img-wrap {
    position: relative;
}

.why-choose-section .img-wrap img {
    border-radius: 20px;
}

/* Gaya untuk bagian "About" */
.apaitu-section {
    margin-top: 5rem;
    /* Jarak atas dari bagian atas halaman */
}

.apaitu-section .container {
    display: flex;
    align-items: center;
}

.apaitu-section img {
    max-width: 100%;
    /* Gambar agar responsif */
    height: auto;
}

.apaitu-section .col {
    flex: 1;
    /* padding: 0 2rem; */
    /* Padding kanan dan kiri */
}

.apaitu-section h2 {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 1rem;
}

.apaitu-section p {
    font-size: 1rem;
    line-height: 1.5;
}

/* Gaya untuk tautan dalam teks "Apa itu NOMADENSTUFF?" */
.apaitu-section a {
    color: #007bff;
    /* Warna tautan */
    text-decoration: none;
    font-weight: bold;
}

.apaitu-section a:hover {
    text-decoration: underline;
    /* Efek garis bawah pada hover */
}
</style>

<head>
    <?php $this->load->view('layouts/user/head.php') ?>
</head>

<!-- Slide -->
<div id="owl-demo" class="owl-carousel owl-theme">

    <?php foreach ($slider as $slide) : ?>
    <div class="item"><img
            src="<?= $slide->image ? base_url("images/slider/$slide->image") : base_url("images/slider/default.jpg") ?>"
            alt=""></div>
    <?php endforeach ?>

</div>
<!-- End Slide -->

<section class="apaitu-section">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 mb-3">
                <img src="<?= base_url("assets/img/apaitu.png") ?>" alt="Image" class="img-fluid" />
            </div>
            <div class="col-lg-6">
                <h1>Apa itu
                    <br>
                    <strong class="font-weight-bold">NOMADENSTUFF?</strong>
                </h1>
                <div class="row">
                    <div class="col">
                        <div style="text-align: justify;">
                            <p>
                                NOMADENSTUFF adalah sebuah toko thrifting yang menawarkan berbagai pilihan pakaian
                                dengan
                                konsep unik dan berbeda. Kami mengkhususkan diri dalam menyediakan pakaian bekas
                                berkualitas
                                tinggi dengan harga terjangkau. Produk kami dipilih dengan teliti untuk memastikan bahwa
                                setiap item memiliki gaya yang menarik dan tetap dalam kondisi yang baik.
                                <br>
                                <br>
                                Dengan menghadirkan pakaian dari berbagai gaya dan era, NOMADENSTUFF tidak hanya menjadi
                                tempat untuk berbelanja, tetapi juga menjadi destinasi bagi mereka yang mencari
                                inspirasi
                                fashion dari masa lalu. Kami berkomitmen untuk memberikan pengalaman berbelanja yang
                                menyenangkan dan berbeda di setiap kunjungan.
                                <br>
                                <br>
                                Selamat berbelanja di NOMADENSTUFF, tempat di mana gaya dan keberanian untuk tampil beda
                                bertemu dalam setiap potongan pakaian thrifting kami!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="why-choose-section mt-5">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-6">
                <h3 class="section-title">Kenapa Memilih Kami?</h3>
                <p>Kami bukan sekadar toko online trifting, kami adalah destinasi utama untuk pengalaman berbelanja yang
                    unggul. Kami memahami kebutuhan Anda dan memberikan solusi terbaik.</p>
                <div class="row my-5">
                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="<?= base_url("assets/img/truck.svg") ?>" alt="Image" class="imf-fluid" />
                            </div>
                            <h5>Pengiriman Cepat</h5>
                            <div style="text-align: justify;">
                                <p>Pesanan Anda akan tiba dengan cepat dan tepat waktu, memberikan pengalaman belanja
                                    yang tanpa hambatan.</p>
                            </div>

                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="<?= base_url("assets/img/bag.svg") ?>" alt="Image" class="imf-fluid" />
                            </div>
                            <h5>Belanja Lebih Mudah</h5>
                            <div style="text-align: justify;">
                                <p>Dengan antarmuka yang ramah pengguna, belanja online di toko
                                    kami menjadi lebih mudah dan menyenangkan.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="<?= base_url("assets/img/support.svg") ?>" alt="Image" class="imf-fluid" />
                            </div>
                            <h5>Pelayanan Pelanggan Terbaik</h5>
                            <div style="text-align: justify;">
                                <p>Kami bangga memberikan pelayanan pelanggan terbaik. Kepercayaan Anda adalah prioritas
                                    kami.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="<?= base_url("assets/img/return.svg") ?>" alt="Image" class="imf-fluid" />
                            </div>
                            <h5>Gratis Pengembalian</h5>
                            <div style="text-align: justify;">
                                <p>Jika Anda tidak sepenuhnya puas dengan pembelian Anda, kami siap mengembalikan uang
                                    Anda
                                    tanpa biaya tambahan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 d-flex justify-content-center align-items-center">
                <div class="img-wrap">
                    <img src="<?= base_url("assets/img/why.png") ?>" alt="Image" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Product -->
<!-- <section id="promo-area">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <a href="<?= base_url('shop/men') ?>">
                    <div class="single_promo">
                        <img src="<?= base_url() ?>assets/img/img-1.jpg" alt="...">
                        <div class="box-content">
                            <h3 class="title">PRIA</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <a href="<?= base_url('shop/women') ?>">
                    <div class="single_promo">
                        <img src="<?= base_url() ?>assets/img/img-3.jpg" alt="...">
                        <div class="box-content">
                            <h3 class="title">WANITA</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section> -->

<!-- <section id="kategori">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-5 d-flex align-items-center">
                <div class="card mt-5">
                    <div class="card-header">
                        Kategori
                    </div>
                    <div class="card-body">
                        <?php foreach (getCategories() as $category) : ?>
                            <a href="<?= base_url("/shop/category/$category->slug") ?>" class=""><?= $category->title ?></a>
                            <hr>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<section id="new-product">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="font-weight-bold">KOLEKSI <span>THRIFTING </span>KAMI</h3>
                <div class="divider"></div>
            </div>
        </div>
        <div class="mt-3">
            <div class="row">
                <div class="col">
                    <h4 class="font-weight-bold">KOLEKSI PRIA</h4>
                    <p class="product-description"><strong>Penampilan Maskulinmu di Setiap Pilihan Trifting
                            Kami.</strong></p>
                    <div class="row text-center mt-3 mb-4">
                        <?php foreach ($productL as $rowL) : ?>
                        <?php if ($rowL->is_available == 1) : ?>
                        <div class="col-6 col-lg-3 col-sm-6 mb-4">
                            <a class="product-item" href="<?= base_url("shop/detail/$rowL->slug") ?>">
                                <div class="card">
                                    <img src="<?= $rowL->image ? base_url("images/product/$rowL->image") : base_url("images/product/default.jpg") ?>"
                                        class="img-fluid product-thumbnail" />
                                    <div class="card-body">
                                        <h3 class="product-title"><?= $rowL->title ?></h3>
                                        <strong class="product-price">
                                            <p class="mb-0">Rp <?= number_format($rowL->price, 0, ',', '.') ?></p>
                                        </strong>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h4 class="font-weight-bold">KOLEKSI WANITA</h4>
                <p class="product-description">
                    <strong>Temukan Penampilan Feminimmu di Setiap Pilihan Trifting Kami.</strong>
                </p>
                <div class="row text-center mt-3 mb-4">
                    <?php foreach ($productW as $rowW) : ?>
                    <div class="col-6 col-lg-3 col-sm-6 mb-4">
                        <a class="product-item" href="<?= base_url("shop/detail/$rowW->slug") ?>">
                            <div class="card">
                                <img src="<?= $rowW->image ? base_url("images/product/$rowW->image") : base_url("images/product/default.jpg") ?>"
                                    class="img-fluid product-thumbnail" />
                                <div class="card-body">
                                    <h3 class="product-title"><?= $rowW->title ?></h3>
                                    <strong class="product-price">
                                        <p class="mb-0">Rp <?= number_format($rowW->price, 0, ',', '.') ?></p>
                                    </strong>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>