<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagenotfound extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('group') != '1'){
			$this->session->set_flashdata('error','Sorry, you are not logged in!');
			redirect('login');
		}
		
		//load model -> 
	}

	public function index()
	{
		$this->load->view('admin/page_not_found');
	}

}
