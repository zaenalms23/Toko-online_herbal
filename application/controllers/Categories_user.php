<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categories_user extends CI_Controller
{
	
	public function herbs()
	{
		$data['title'] = 'Herbs Categories';
		$data['herbs'] = $this->model_kategori->herbs()->result();
		$this->load->view('layout/user/header', $data);
		$this->load->view('categories/herbs', $data);
		$this->load->view('layout/user/footer');
	}

	public function cosmetic()
	{
		$data['title'] = 'Cosmetic Categories';
		$data['cosmetic'] = $this->model_kategori->cosmetic()->result();
		$this->load->view('layout/user/header', $data);
		$this->load->view('categories/cosmetic', $data);
		$this->load->view('layout/user/footer');
	}

	public function beverages()
	{
		$data['title'] = 'Beverages Categories';
		$data['beverages'] = $this->model_kategori->beverages()->result();
		$this->load->view('layout/user/header', $data);
		$this->load->view('categories/beverages', $data);
		$this->load->view('layout/user/footer');
	}
}
