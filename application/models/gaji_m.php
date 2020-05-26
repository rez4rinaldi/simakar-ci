<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class gaji_m extends CI_Model 
{
    private $_client;

    public function __construct()
    {
        parent::__construct();
        $this->_client = new Client([
            'base_uri' => 'http://localhost:8000/'
        ]);
    }

    ################################### MODEL DATA GAJI #############################################


    public function getAllGaji()
    {
        $response = $this->_client->request('GET', 'gaji/');
        $result = json_decode($response->getBody(), true);
        return $result;
    }

    public function getGajiById($id)
    {
        $response = $this->_client->request('GET', 'gaji/'.$id);
        $result = json_decode($response->getBody(), true);
        return $result[0];
    }

    public function addGaji()
    {
        $data = [
            'nama'          =>  $this->input->post('nama', true),
        ];

        $response = $this->_client->request('POST', 'gaji', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody(), true);
        return $result;
    }

    public function updateGaji()
    {
        $data = [
            'nama'          =>  $this->input->post('nama', true),
        ];

        $response = $this->_client->request('PUT', 'gaji', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody(), true);
        return $result;
    }

    public function deleteGaji($id)
    {
        $response = $this->_client->request('DELETE', 'gaji/'.$id);
        $result = json_decode($response->getBody(), true);
        return $result;
    }
}

/* End of file gaji_m.php */
