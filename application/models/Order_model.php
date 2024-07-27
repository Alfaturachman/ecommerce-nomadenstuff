<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends MY_Model
{
    public $table = 'orders';

    public function getAllOrdersWithDetails()
    {
        // Perform a join query to fetch orders along with their details
        $this->db->select('orders.*, SUM(order_detail.sub_total) AS total_subtotal'); // Adjust the columns accordingly
        $this->db->from('orders');
        $this->db->join('order_detail', 'orders.id = order_detail.id_orders', 'left'); // Adjust the join condition based on your foreign key

        // Group by orders.id to get the total sub_total for each order
        $this->db->group_by('orders.id');

        // You may add additional conditions or order by if needed
        // $this->db->where('orders.some_column', 'some_value');
        // $this->db->order_by('orders.date', 'desc');

        // Execute the query and return the result
        return $this->db->get()->result();
    }


    public function getAllOrders()
    {
        // Fetch all orders from the database
        return $this->db->get('orders')->result();
    }

    public function getAllOrderDetail()
    {
        // Fetch all orders from the database
        return $this->db->get('order_detail')->result();
    }
}

/* End of file Order_model.php */