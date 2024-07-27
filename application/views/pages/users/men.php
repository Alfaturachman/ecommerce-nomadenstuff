<div class="container my-5">
    <div class="row">
        <div class="col-md-3 col-sm-12">
            <h4 class="font-weight-bold">PRIA</h4>
            <div class="card mt-3">
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
        <div class="col-md-9 col sm-12">
            <div class="row text-center mt-3 mb-4">
                <?php foreach ($content as $row) : ?>
                    <div class="col-6 col-lg-4 col-sm-6 mb-4">
                        <a class="product-item" href="<?= base_url("shop/detail/$row->slug") ?>">
                            <div class="card">
                                <img src="<?= $row->image ? base_url("images/product/$row->image") : base_url("images/product/default.jpg") ?>" class="img-fluid product-thumbnail" />
                                <div class="card-body">
                                    <h3 class="product-title"><?= $row->title ?></h3>
                                    <strong class="product-price">
                                        <p class="mb-0">IDR <?= number_format($row->price, 0, ',', '.') ?></p>
                                    </strong>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach ?>
            </div>

            <nav arial-label="Page navigation example" class="mt-2">
                <?= $pagination ?>
            </nav>
        </div>
    </div>
</div>