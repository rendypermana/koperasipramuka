<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* --------------------------------------------
Author : Rendy Permana
Email  : rendypermana153@gmail.com 
-----------------------------------------------*/

class Model_kwarran extends CI_Model {
	
	//model fungsi untuk menampilkan semua data kwarran
	public function semua_kwarran(){
		$hasil = $this->db->get('kwarran');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else {
			return array();
		}
	}

	//model fungsi untuk menambah semua data kwarran
	public function tambah_kwarran($data_kwarran){
		$this->db->insert('kwarran', $data_kwarran);
	}

		//model fungsi mendapatkan kwarran per ID
	public function find_id($id_kwarran)
    {
        $hasil = $this->db->where('id_kwarran',$id_kwarran)->limit(1)->get('kwarran');
        if($hasil->num_rows() > 0){
            return $hasil->row();
        } else {
            return array();
        }
    }

    //model fungsi untuk merubah data kwarran
	public function rubah($id_kwarran, $data_kwarran){
		$this->db->where('id_kwarran', $id_kwarran)
				 ->update('kwarran', $data_kwarran);
	}

	//model fungsi untuk menghapus data berdasarkan ID
	public function hapus($id_kwarran){
		$this->db->where('id_kwarran', $id_kwarran)->delete('kwarran');
		
	}

}