<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Customer_model extends MY_Model
{
    protected $table = 'user';

    protected $perPage = 10;

    public function getDefaultValues()
    {
        return [
            'name'          => '',
            'email'         => '',
            'password'      => '',
            'is_active'     => '',
            'date_register' => ''
        ];
    }

    public function getValidationRules()
    {
        $validateRules = [
            [
                'field' => 'name',
                'label' => 'Nama',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'trim|required|valid_email',
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[6]'
            ],
            [
                'field' => 'password_confirmation',
                'label' => 'Konfirmasi Password',
                'rules' => 'required|matches[password]'
            ]
        ];

        return $validateRules;
    }
}

/* End of file Product_model.php */