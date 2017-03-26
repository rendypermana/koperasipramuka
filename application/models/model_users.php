<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_users extends CI_Model {

	public function check_credential()
	{
		$no_gudep = set_value('no_gudep');
		$password = set_value('password');
		
		$hasil = $this->db->where('no_gudep', $no_gudep)
						  ->where('password', $password)
						  ->limit(1)
						  ->get('users');
		
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}

	
	public function all(){
		//query semua record di table user
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('kwarran', 'kwarran.id_kwarran = users.id_kwarran');	
		$query = $this->db->get();
		return $query->result();
	}
	
	public function find_users($id_users){
		$hasil = $this->db->where('id_users', $id_users)
						  ->join('kwarran','kwarran.id_kwarran = users.id_kwarran')
						  ->get('users');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}
	
	public function create($data_users){
		//Query INSERT INTO
		$this->db->insert('users', $data_users);
	}
	
	public function update($id_users, $data_users){
		//Query UPDATE FROM ... WHERE id=...
		$this->db->where('id_users', $id_users)
				 ->update('users', $data_users);
	}
	
	public function get_users_by_id($id_users)
    {
		$hasil = $this->db->where('id_users',$id_users)->get('users');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        } else {
            return false;
        }
    }

    //fungsi untuk mengecek kebtersediaan username aya euwehna
    function nogudep_ada($no_gudep) {
    $this->db->select('id_users');
    $this->db->where('no_gudep', $no_gudep);
    $query = $this->db->get('users');

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}

	//model fungsi untuk menghapus data berdasarkan ID
	public function delete($id_users){
		$this->db->where('id_users', $id_users)->delete('users');
		
	}
	
	//model fungsi untuk aktifkan
	public function aktif($id_users, $aktif){
		$aktif = array(
			'group' => '2'
		);	
		$this->db->where('id_users', $id_users)->update('users',$aktif);
	}

	//activate user account
	function verifyEmailID($key)
	{
		$data = array('group' => 1);
		$this->db->where('md5(email)', $key);
		return $this->db->update('users', $data);
	}

}