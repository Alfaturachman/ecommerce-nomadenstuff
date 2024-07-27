<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends MY_Controller
{
    private $id;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('rajaongkir');
        $is_login = $this->session->userdata('is_login');
        $this->id = $this->session->userdata('id');

        if (!$is_login) {
            redirect(base_url(), 'refresh');
            return;
        }
    }

    public function index($input = null)
    {
        $this->checkout->table = 'cart';

        // Fetch user data based on the user ID
        $userData = $this->db->where('id', $this->id)
            ->get('user')
            ->row();

        $data['cart']      = $this->checkout->select([
            'cart.id', 'cart.quantity', 'cart.sub_total',
            'product.title', 'product.image', 'product.price'
        ])
            ->join('product')
            ->where('cart.id_user', $this->id)
            ->get();

        if (!$data['cart']) {
            $this->session->set_flashdata('warning', 'Tidak ada produk di dalam keranjang.');
            redirect(base_url('cart'));
        }

        $data['provinces'] = json_decode($this->rajaongkir->province(), true);
        $data['cities']    = json_decode($this->rajaongkir->city(), true);

        // Set the default value for the 'name' input field
        $data['input']     = $input ? $input : (object) array_merge(
            $this->checkout->getDefaultValues(),
            ['name' => $userData->name],
            ['phone' => $userData->phone ?? ''],
            ['address' => $userData->address ?? '']
        );

        $data['title']     = "Chekout";
        $data['page']      = "pages/users/checkout";

        $this->view($data);
    }
    public function create()
    {
        if (!$this->input->post()) {
            $this->session->set_flashdata('error', 'No POST data received!');
            error_log('No POST data received.');
            redirect(base_url('checkout'));
        } else {
            $input = (object) $this->input->post(null, true);
        }

        $id_kabupaten = $this->input->post('kabupaten');
        $id_provinsi = $this->input->post('provinsi');
        $diskonpersen = $this->input->post('discountPercentage');
        $diskon = $this->input->post('diskon');
        $shippingCost = $this->input->post('shippingCost');
        $totalBelanja = $this->input->post('totalBelanja');
        error_log('Shipping Cost: ' . $shippingCost);
        error_log('Total Belanja: ' . $totalBelanja);
        $courier = $input->courier;

        // Get province name
        $province = json_decode($this->rajaongkir->province((int) $id_provinsi), true);
        $provinceName = $province['rajaongkir']['results']['province'];

        // Get city name
        $cityState = json_decode($this->rajaongkir->city((int) $id_provinsi, (int) $id_kabupaten), true);
        $cityName = $cityState['rajaongkir']['results']['city_name'];

        // Prepare data for order creation
        $data = [
            'id_user'       => $this->id,
            'date'          => date('Y-m-d'),
            'invoice'       => $this->id . date('YmdHis'),
            'diskon_persen' => $diskonpersen,
            'diskon'        => $diskon,
            'total'         => $totalBelanja,
            'name'          => $input->name,
            'address'       => $input->address,
            'city'          => $cityName,
            'province'      => $provinceName,
            'phone'         => $input->phone,
            'courier'       => $courier,
            'cost_courier'  => $shippingCost,
            'status'        => 'waiting'
        ];

        // Create order and order details
        if ($order = $this->checkout->create($data)) {
            $cart = $this->db->where('id_user', $this->id)
                ->get('cart')->result_array();

            foreach ($cart as $row) {
                $row['id_orders'] = $order;
                unset($row['id'], $row['id_user']);
                $this->db->insert('order_detail', $row);
            }

            // Clear the user's cart
            $this->db->delete('cart', ['id_user' => $this->id]);

            // Display success message
            $this->session->set_flashdata('success', 'Data berhasil disimpan.');

            $data['title']      = 'Checkout Success';
            $data['content']    = (object) $data;
            $data['page']       = 'pages/users/success';

            $this->view($data);
        } else {
            // Display error message
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan.');
            return $this->index($input);
        }
    }

    public function rajaongkir_cek_kabupaten()
    {
        // Mengambil provinsi_id dari parameter GET
        $provinsi_id = $this->input->get('provinsi');

        // Mengecek apakah provinsi_id telah diberikan
        if (empty($provinsi_id)) {
            echo "<option value=''>Provinsi ID is required.</option>";
            return;
        }

        $api_key = "b89355f9434e0df1e842c84906a52cb5";

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$provinsi_id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "<option value=''>Error fetching cities.</option>";
        } else {
            $data = json_decode($response, true);

            // Check if the expected keys and arrays exist
            if (isset($data['rajaongkir']['results']) && is_array($data['rajaongkir']['results'])) {
                // Menampilkan dropdown kabupaten/kota
                echo "<option value=''>- Pilih Kabupaten / Kota -</option>";
                foreach ($data['rajaongkir']['results'] as $result) {
                    echo "<option value='" . $result['city_id'] . "'>" . $result['city_name'] . "</option>";
                }
            } else {
                echo "<option value=''>No cities available.</option>";
            }
        }
    }

    public function rajaongkir_cek_ongkir()
    {
        // Get post data
        $id_kabupaten = $this->input->get('kabupaten');
        $courier = $this->input->get('courier');

        $weightTotal = $this->db->select_sum('quantity')
            ->where('id_user', $this->id)
            ->get('cart')
            ->row()
            ->quantity;

        // Calculate shipping cost using RajaOngkir API
        $berat = $weightTotal * 250;
        $url = "http://api.rajaongkir.com/starter/cost";

        $data = array(
            'origin' => '152', // Your origin code, you might need to change this
            'destination' => $id_kabupaten,
            'weight' => $berat,
            'courier' => $courier
        );

        $headers = array(
            "content-type: application/x-www-form-urlencoded",
            "key: b89355f9434e0df1e842c84906a52cb5"
        );

        // Initialize cURL session
        $curl = curl_init();

        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => http_build_query($data),
            CURLOPT_HTTPHEADER => $headers,
        ));

        // Execute cURL session
        $response = curl_exec($curl);

        // Close cURL session
        curl_close($curl);

        // Parse the response as JSON
        $cost = json_decode($response, true);

        // Log the complete API response for debugging
        log_message('debug', 'RajaOngkir API Response: ' . json_encode($cost));

        // Process the API response and extract the shipping cost
        $ongkirResults = 0;
        if (isset($cost['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'])) {
            $ongkirResults = $cost['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
        }

        // Log API errors (if any)
        if (isset($cost['rajaongkir']['status']) && $cost['rajaongkir']['status']['code'] != 200) {
            log_message('error', 'RajaOngkir API Error: ' . json_encode($cost['rajaongkir']['status']));
        }

        // Return the shipping cost as JSON
        $this->output->set_content_type('application/json')->set_output(json_encode(['shipping_cost' => $ongkirResults]));
    }
}

/* End of file Checkout.php */