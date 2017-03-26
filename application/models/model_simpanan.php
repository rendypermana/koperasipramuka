<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* --------------------------------------------
Author : Rendy Permana
Email  : rendypermana153@gmail.com 
-----------------------------------------------*/

class Model_simpanan extends CI_Model {
	
	//model fungsi untuk menampilkan semua data simpanan
	public function semua_simpanan(){
		$this->db->select('*');
		$this->db->from('simpanan');
		$this->db->join('users', 'users.id_users = simpanan.id_users');	
		$this->db->join('kwarran', 'kwarran.id_kwarran = simpanan.id_kwarran');
		$query = $this->db->get();
		return $query->result();
	}

	//model fungsi untuk menambah semua data simpanan
	public function tambah_simpanan($data_simpanan){
		$this->db->insert('simpanan', $data_simpanan);
	}

		//model fungsi mendapatkan simpanan per ID
	public function find_id($id_simpanan)
    {
        $hasil = $this->db->where('id_simpanan',$id_simpanan)->limit(1)->get('simpanan');
        if($hasil->num_rows() > 0){
            return $hasil->row();
        } else {
            return array();
        }
    }

    //model fungsi untuk merubah data simpanan
	public function rubah($id_simpanan, $data_simpanan){
		$this->db->where('id_simpanan', $id_simpanan)
				 ->update('simpanan', $data_simpanan);
	}

	//model fungsi untuk menghapus data berdasarkan ID
	public function hapus($id_simpanan){
		$this->db->where('id_simpanan', $id_simpanan)->delete('simpanan');
		
	}

	
}