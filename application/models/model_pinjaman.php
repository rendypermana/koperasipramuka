<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* --------------------------------------------
Author : Rendy Permana
Email  : rendypermana153@gmail.com 
-----------------------------------------------*/

class Model_pinjaman extends CI_Model {
	
	//model fungsi untuk menampilkan semua data simpanan
	public function semua_pinjaman(){
		$this->db->select('*');
		$this->db->from('pinjaman');
		$this->db->join('users', 'users.id_users = pinjaman.id_users');	
		$this->db->join('kwarran', 'kwarran.id_kwarran = pinjaman.id_kwarran');
		$query = $this->db->get();
		return $query->result();
	}

	//model fungsi untuk menambah semua data pinjaman
	public function tambah_pinjaman($data_pinjaman){
		$this->db->insert('pinjaman', $data_pinjaman);
	}

	//model fungsi mendapatkan pinjaman per ID
	public function find_id($id_pinjaman)
    {
        $hasil = $this->db->where('id_pinjaman', $id_pinjaman)
						  ->join('kwarran','kwarran.id_kwarran = pinjaman.id_kwarran')
						  ->join('users','users.id_users = pinjaman.id_users')
						  ->get('pinjaman');
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
	public function hapus($id_pinjaman){
		$this->db->where('id_pinjaman', $id_pinjaman)->delete('pinjaman');
		
	}


	function user_ada($id_users){
    $hasil = $this->db->where('id_users', $id_users)
						  ->get('pinjaman');
		if($hasil->num_rows() > 0){
            
                return $hasil->row();
            } else {
                return array();
            }
   }


}