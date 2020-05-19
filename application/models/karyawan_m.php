<?php

defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class karyawan_m extends CI_Model
{
    private $_client;

    public function __construct()
    {
        parent::__construct();
        $this->_client = new Client([
            'base_uri' => 'http://localhost/simakar-ci/rest-server/public/karyawan'
        ]);
    }

    public function getAll()
    {
        $response = $this->_client->request('GET', 'karyawan');

        $result = json_decode($response->getBody(), true);

        return $result;
    }

    public function getById($id = null)
    {
        $response = $this->_client->request('GET', 'karyawan', ['query' => ['id' => $id]]);

        $result = json_decode($response->getBody(), true);

        return $result;
    }

    public function tambah()
    {
        $data = [
            'nama'     =>  $this->input->post('nama', true),
            'alamat'   =>  $this->input->post('alamat', true),
            'telepon'  =>  $this->input->post('telepon', true),
            'level'    =>  $this->input->post('level', true),
            'username' =>  $this->input->post('username', true),
            'password' =>  $this->input->post('password', true),
            'gambar'    =>  $this->uploadGambar()
        ];

        $response = $this->_client->request('POST', 'karyawan', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody(), true);

        return $result;
    }

    public function ubah()
    {
        $data = [
            'nama'     =>  $this->input->post('nama', true),
            'alamat'   =>  $this->input->post('alamat', true),
            'telepon'  =>  $this->input->post('telepon', true),
            'level'    =>  $this->input->post('level', true),
            'username' =>  $this->input->post('username', true),
            'password' =>  $this->input->post('password', true),
            'gambar'    =>  $this->ubahGambar(),
            'id'       =>  $this->input->post('id', true),
        ];

        $response = $this->_client->request('PUT', 'karyawan', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody(), true);

        return $result;
    }

    public function hapus($id)
    {
        $response = $this->_client->request('DELETE', 'karyawan', [
            'form_params' => [
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody(), true);

        return $result;
    }
}


/* End of file karyawan_m.php */
