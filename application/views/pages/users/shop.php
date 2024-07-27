<style>
.product-item {
    text-align: center;
    text-decoration: none;
    display: block;
    position: relative;
    padding-bottom: 25px;
    cursor: pointer;
}

.product-item .product-thumbnail {
    top: 0;
    -webkit-transition: 0.3s all ease;
    -o-transition: 0.3s all ease;
    transition: 0.3s all ease;
}

.product-item h3 {
    font-weight: 600;
    font-size: 16px;
}

.product-item strong {
    font-weight: 800 !important;
    font-size: 18px !important;
}

.product-item h3,
.product-item strong {
    color: #2f2f2f;
    text-decoration: none;
}

.product-item .card {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px 0px;
}

.product-item:hover .product-thumbnail {
    transform: scale(1.025);
    transition: transform 0.3s ease-in-out;
}

.product-item:hover:before {
    height: 70%;
}
</style>

<div class="container my-5">
    <div class="row">
        <div class="col-md-10 col sm-12">
            <h4>Kategori: <?= isset($category) ? $category : 'Semua Kategori' ?></h4>
            <div class="row text-center mt-3 mb-4">
                <?php foreach ($content as $row) : ?>
                <div class="col-6 col-lg-3 col-sm-6 mb-4">
                    <a class="product-item" href="<?= base_url("shop/detail/{$row->product_slug}") ?>">
                        <div class="card">
                            <img src="<?= $row->image ? base_url("images/product/{$row->image}") : base_url("images/product/default.jpg") ?>"
                                class="img-fluid product-thumbnail" />
                            <div class="card-body">
                                <h3 class="product-title"><?= $row->product_title ?></h3>
                                <strong class="product-price">
                                    <p class="mb-0">IDR <?= number_format($row->price, 0, ',', '.') ?></p>
                                </strong>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach ?>
            </div>
            <!-- <nav arial-label="Page navigation example" class="mt-2">
                <?= $pagination ?>
            </nav> -->
        </div>
        <div class="col-md-2 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Kategori
                </div>
                <div class="card-body">
                    <?php foreach (getCategories() as $categoryItem) : ?>
                    <a href="<?= base_url("/shop/category/{$categoryItem->slug}") ?>"
                        class=""><?= $categoryItem->title ?></a>
                    <hr>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <form method="get" action="<?= base_url('shop/index') ?>" id="sortForm">
    <div class="form-group">
        <label for="sort">Urutkan berdasarkan:</label>
        <select class="form-control" id="sort" name="sort" onchange="submitForm()">
            <option value="asc">Harga Terendah</option>
            <option value="desc">Harga Tertinggi</option>
        </select>
    </div>

    <input type="hidden" name="category" value="<?= isset($category) ? $category : '' ?>">
</form>


<script>
    function submitForm() {
        document.getElementById('sortForm').submit();
    }
</script> -->