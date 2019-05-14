<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['crud_model' => 'crud']);
    }

	public function index()
	{
        if ($this->input->post('jml_pulsa') !== NULL) {
            $this->form_validation->set_rules('nomor', 'Nomor', 'trim|required|max_length[13]|is_natural');
            $this->form_validation->set_rules('provider', 'Provider', 'trim|required');
            $this->form_validation->set_rules('jml_pulsa', 'Jumlah Pulsa', 'trim|required');
        } else {
            $this->form_validation->set_rules('nomor', 'Nomor', 'trim|required|max_length[13]|is_natural');
            $this->form_validation->set_rules('provider', 'Provider', 'trim|required');
            $this->form_validation->set_rules('kuota', 'Kuota', 'trim|required|numeric');
            $this->form_validation->set_rules('pulsa', 'Pulsa', 'trim|required|numeric');
            $this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric');
            $this->form_validation->set_rules('masa_aktif', 'Masa Aktif', 'trim|required');
        }
        if ($this->form_validation->run() === FALSE) {
            $data = [
                'title' => 'Dashboard',
                'subtitle' => '',
                'page' => 'page/dashboard'
            ];
            $this->load->view('main', $data);
        } else {
            $datass = [
                'title' => 'Dashboard',
                'subtitle' => '',
                'page' => 'page/dashboard'
            ];
            if ($this->input->post('masa_aktif') !== NULL) {
                $data = [
                    'nomor' => $this->input->post('nomor', true),
                    'provider' => $this->input->post('provider', true),
                    'kuota' => $this->input->post('kuota', true),
                    'pulsa' => $this->input->post('pulsa', true),
                    'tgl_beli' => date('d-m-Y'),
                    'harga' => $this->input->post('harga', true),
                    'masa_aktif' => $this->input->post('harga', true),
                    'date' => date('d-m-Y')
                ];
                $hasil = $this->crud->input_kartu($data);
                $hasil = json_decode($hasil);
                $this->session->set_flashdata('msg', $hasil->msg);
                // var_dump($this->session);die;
            } else {
                 $data = [
                    'nomor' => $this->input->post('nomor', true),
                    'provider' => $this->input->post('provider', true),
                    'jml_pulsa' => $this->input->post('jml_pulsa', true),
                    'date' => date('d-m-Y')
                ];
                $hasil = $this->crud->input_pulsa($data);
                $hasil = json_decode($hasil);
                $this->session->set_flashdata('msg', $hasil->msg);
            }
            // var_dump($this->input->post());
            $this->load->view('main', $datass);
        }
    }
    
    public function nomor()
    {
        $data = [
            'title' => 'Nomor Telpon',
            'subtitle' => 'Daftar Nomor Telpon TerRegistrasi',
            'page' => 'page/nomor'
        ];
        $this->load->view('main', $data);
    }
    
    public function pulsa()
    {
        $data = [
            'title' => 'Pulsa',
            'subtitle' => 'Riwayat Isi Ulang Pulsa',
            'page' => 'page/pulsa'
        ];
        $this->load->view('main', $data);
    }

    public function get_nomor()
    {
        echo $this->crud->get_nomor();
    }

    public function get_pulsa()
    {
        echo $this->crud->get_pulsa();
    }
}
