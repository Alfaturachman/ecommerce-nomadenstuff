<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<style>
    .site-blocks-table thead th {
        padding-bottom: 1.5rem;
        border-width: 0px !important;
        vertical-align: middle;
        color: rgba(0, 0, 0, 0.8);
        font-size: 18px;
        border-bottom: 2px solid #3b5d50 !important;
    }

    .site-blocks-table tbody tr td {
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    .site-blocks-table td {
        /* vertical-align: middle; */
        color: rgba(0, 0, 0, 0.8);
    }

    .form-control {
        height: 50px;
        border-radius: 10px;
        font-family: "Inter", sans-serif;
    }

    /* Gaya CSS untuk membedakan warna teks placeholder */
    .form-control::placeholder {
        color: #999;
        /* Warna placeholder yang diinginkan */
    }

    /* Gaya CSS untuk membedakan warna teks input yang memiliki nilai */
    .form-control:not(:placeholder-shown) {
        color: #000;
        /* Warna teks input saat memiliki nilai */
    }
</style>

<div class="container my-5">
    <!-- <?php $this->load->view("layouts/_alerts") ?> -->
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <p class="h5 mb-3"><strong>Ringkasan Keranjang Belanja</strong></p>
                    <div class="card p-3">
                        <div class="site-blocks-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Price</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cart as $row) : ?>
                                        <tr>
                                            <td style="white-space: nowrap; width: 1%;"><?= $row->title ?>
                                                <br>
                                                <img src="<?= $row->image ? base_url("images/product/$row->image") : base_url("images/product/default.jpg") ?>" alt="" height="100" class="img-responsive">
                                            </td>
                                            <td><?= $row->quantity ?></td>
                                            <td>Rp<?= number_format($row->price, 0, ',', '.') ?></td>
                                            <td>Rp<?= number_format($row->sub_total, 0, ',', '.') ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3"><strong>Subtotal</strong></td>
                                        <td>
                                            <strong>Rp<?= number_format(array_sum(array_column($cart, 'sub_total')), 0, ',', '.') ?></strong>
                                        </td>
                                    </tr>
                                    <?php
                                    // Calculate the subtotal
                                    $subtotal = array_sum(array_column($cart, 'sub_total'));

                                    // Apply discount based on subtotal
                                    $discountPercentage = 0; // Default no discount

                                    if ($subtotal > 500000) {
                                        $discountPercentage = 20;
                                    } elseif ($subtotal > 200000) {
                                        $discountPercentage = 10;
                                    }

                                    // Calculate discount amount
                                    $discountAmount = ($discountPercentage / 100) * $subtotal;

                                    // Calculate the total including discount
                                    $total = $subtotal - $discountAmount;

                                    // Pass the total value to JavaScript
                                    echo '<script>var totalBelanjaPhp = ' . $total . ';</script>';
                                    echo '<script>var diskonPhp = ' . $discountAmount . ';</script>';
                                    ?>
                                    <tr>
                                        <td colspan="3"><strong>Diskon (<?= $discountPercentage ?>%)</strong></td>
                                        <td>
                                            <strong>Rp<?= number_format($discountAmount, 0, ',', '.') ?></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Ongkos Kirim</strong></td>
                                        <td>
                                            <strong>
                                                <span id="shippingCost"></span>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Total Belanja</strong></td>
                                        <td>
                                            <strong>
                                                <span id="totalBelanja">Rp<?= number_format($subtotal - $discountAmount, 0, ',', '.') ?></span>
                                            </strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <p class="h5 mb-3"><strong>Formulir Alamat Pengiriman</strong></p>
                    <div class="card p-3">
                        <form action="<?= base_url('checkout/create') ?>" method="POST">
                            <div class="form-group">
                                <label for=""><strong>Nama</strong></label>
                                <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Penerima" value="<?php echo isset($input->name) ? $input->name : $userData->name; ?>">
                                <?php echo form_error('name'); ?>
                            </div>
                            <div class="form-group">
                                <label for=""><strong>Telepon</strong></label>
                                <input type="text" class="form-control" name="phone" placeholder="Masukkan Nomor Telepon Penerima" value="<?php echo isset($input->phone) ? $input->phone : $userData->phone; ?>">
                                <?php echo form_error('phone'); ?>
                            </div>
                            <div class="form-group">
                                <label for=""><strong>Alamat</strong></label>
                                <input type="text" name="address" class="form-control" placeholder="Contoh: Jl. Jendral Soedirman No.32" value="<?php echo isset($input->address) ? $input->address : $userData->address; ?>">
                                <?php echo form_error('address'); ?>
                            </div>
                            <?php
                            $curl = curl_init();
                            curl_setopt_array($curl, array(
                                CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "GET",
                                CURLOPT_HTTPHEADER => array(
                                    "key: b89355f9434e0df1e842c84906a52cb5"
                                ),
                            ));

                            $response = curl_exec($curl);
                            $err = curl_error($curl);
                            $data_provinsi = json_decode($response, true);
                            ?>

                            <div class="form-group">
                                <label><strong>Provinsi</strong></label>
                                <select id='provinsi' name='provinsi' class="custom-select d-block w-100 form-control">
                                    <option value="" selected disabled>- Pilih Provinsi Tujuan -</option>
                                    <?php for ($i = 0; $i < count($data_provinsi['rajaongkir']['results']); $i++) : ?>
                                        <option value="<?= $data_provinsi['rajaongkir']['results'][$i]['province_id'] ?>">
                                            <?= $data_provinsi['rajaongkir']['results'][$i]['province'] ?>
                                        </option>
                                    <?php endfor; ?>
                                </select>
                                <?php echo form_error('provinsi') ?>
                            </div>

                            <div class="form-group">
                                <label><strong>Kabupaten / Kota</strong></label>
                                <select id="kabupaten" name="kabupaten" class="custom-select d-block w-100 form-control">
                                    <option value="">- Pilih Kabupaten / Kota -</option>
                                </select>
                                <?php echo form_error('kabupaten') ?>
                            </div>

                            <script>
                                // Menambahkan event listener untuk perubahan dropdown provinsi
                                document.getElementById('provinsi').addEventListener('change', function() {
                                    var selectedProvinceId = this.value;
                                    console.log('Selected Province ID:', selectedProvinceId);
                                    var kabupatenDropdown = document.getElementById('kabupaten');

                                    if (selectedProvinceId) {
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('GET', 'checkout/rajaongkir_cek_kabupaten?provinsi=' +
                                            selectedProvinceId, true);
                                        xhr.onload = function() {
                                            if (xhr.status === 200) {
                                                kabupatenDropdown.innerHTML = xhr.responseText;
                                            } else {
                                                console.error('Error:', xhr.statusText);
                                            }
                                        };
                                        xhr.send();
                                    } else {
                                        kabupatenDropdown.innerHTML =
                                            '<option value="" selected disabled>Pilih Kabupaten / Kota</option>';
                                    }
                                });
                            </script>
                            <div class="form-group">
                                <label for=""><strong>Jasa Pengiriman</strong></label>
                                <select name="courier" id="courier" class="form-control">
                                    <option value="">- Pilih Jasa Pengiriman -</option>
                                    <option value="jne">JNE</option>
                                    <option value="tiki">Tiki</option>
                                    <option value="pos">POS Indonesia</option>
                                </select>
                                <?php echo form_error('courier') ?>
                            </div>
                            <input type="hidden" name="discountPercentage" id="discountPercentageInput" value="<?= isset($discountPercentage) ? $discountPercentage : '' ?>" required>
                            <input type="hidden" name="diskon" id="diskonInput" value="<?= $discountAmount ?>" required>
                            <input type="hidden" name="shippingCost" id="shippingCostInput" required>
                            <input type="hidden" name="totalBelanja" id="totalBelanjaInput" required>
                            <button class="btn btn-success btn-block mt-4" type="submit"><i class="fas fa-credit-card"></i>
                                <strong> Lanjut Pembayaran</strong></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on("change", "#kabupaten, select[name='courier']", function() {
        // Function to update shipping rates
        function updateShippingRates() {
            var kabupaten = $('#kabupaten').val();
            var courier = $('select[name="courier"]').val();

            $.ajax({
                type: 'GET',
                url: 'checkout/rajaongkir_cek_ongkir',
                data: {
                    kabupaten: kabupaten,
                    courier: courier,
                },

                dataType: 'json',
                success: function(data) {
                    console.log('API Response:', data);

                    var ongkirResults = data.shipping_cost || 0;

                    console.log('Shipping Cost:', ongkirResults);

                    // Display the shipping cost
                    $('#shippingCost').text('Rp' + number_format(ongkirResults, 0, ',', '.'));

                    // Update the shipping cost input value
                    $('#shippingCostInput').val(ongkirResults);

                    // Update the total including shipping cost
                    var totalBelanja = totalBelanjaPhp + ongkirResults;
                    var totalBelanjaWithDiscount = totalBelanja - diskonPhp;

                    // Display the total belanja
                    $('#totalBelanja').text('Rp' + number_format(totalBelanja, 0, ',', '.'));

                    // Update the total belanja input value
                    $('#totalBelanjaInput').val(totalBelanja);

                    console.log('shippingCostInput:', $('#shippingCostInput').val());
                    console.log('totalBelanjaInput:', $('#totalBelanjaInput').val());
                },
                error: function(xhr, status, error) {
                    console.error('Error updating shipping rates:', error);
                    console.log('Response:', xhr.responseText);
                }
            });
        } // Close the updateShippingRates function

        // Attach the function to the change event of the courier select
        $('select[name="courier"]').change(updateShippingRates);

        // Trigger the updateShippingRates function when the page loads
        updateShippingRates();
    });


    // Function to format number with commas
    function number_format(number, decimals, dec_point, thousands_sep) {
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }
</script>