<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_Model extends CI_Model {

    public function get_nomor()
    {
        header('Content-Type: application/json');
		$this->datatables->select('nomor');
		$this->datatables->select('provider');
		$this->datatables->select('kuota');
		$this->datatables->select('pulsa');
		$this->datatables->select('masa_aktif');
		$this->datatables->select('harga');
		$this->datatables->select('tgl_beli');
        $this->datatables->from('nomor');
        // $this->datatables->add_column('Edit', '<button class="btn btn-primary btn-sm btn-block edit_data" id="$1">Edit</button>', 'nomor');
		return $this->datatables->generate();
    }

    public function get_pulsa()
    {
        header('Content-Type: application/json');
		$this->datatables->select('nomor');
		$this->datatables->select('provider');
		$this->datatables->select('jml_pulsa');
		$this->datatables->select('date');
        $this->datatables->from('pulsa');
    //    $this->datatables->add_column('Hapus', '<a href="'.base_url("/main/hapus_nomor/$1").'" class="edit_record btn btn-primary btn-sm" id="$1">Edit</>', 'nomor');
		return $this->datatables->generate();
    }

    public function input_kartu($data = array())
    {
        if ($this->db->get_where('nomor', ['nomor' => $data['nomor']])->row_array() > 0) {
            $msg = [
                'status' => FALSE,
                'msg' => 'Nomor ' . $data['nomor'] . ' Sudah TerRegistrasi'
            ];
            return json_encode($msg);die;        
        }
        if ($this->db->insert('nomor' ,$data)) {
            $msg = [
                'status' => TRUE,
                'msg' => 'Tambah Nomor HP Sukses ' . $data['nomor']
            ];
        } else {
            $msg = [
                'status' => FALSE,
                'msg' => 'Tambah Nomor HP Gagal ' . $data['nomor']
            ];
        }
        return json_encode($msg);        
    }

    public function input_pulsa($data = array())
    {
        if ($this->db->insert('pulsa' ,$data)) {
            $msg = [
                'status' => TRUE,
                'msg' => 'Isi Ulang Pulsa Sukses ' . $data['nomor']
            ];
        } else {
            $msg = [
                'status' => FALSE,
                'msg' => 'Isi Ulang Pulsa Gagal ' . $data['nomor']
            ];
        }
        return json_encode($msg);        
    }

    public function edit_nomor($id)
    {
        $q = $this->db->query('SELECT * FROM nomor WHERE nomor = ?', $id)->result_array();
        // var_dump($q);die;
        if ($q) {
            $data = [
                'nomor' => $q[0]['nomor'],
                'provider' => $q[0]['provider'],
                'kuota' => $q[0]['kuota'],
                'pulsa' => $q[0]['pulsa'],
                'tgl_beli' => $q[0]['tgl_beli'],
                'masa_aktif' => $q[0]['masa_aktif'],
                'harga' => $q[0]['harga']
            ];
            return json_encode($data);
        }
    }
}