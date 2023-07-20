<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends CI_Controller
{
	
	public function herbs()
	{
		$data['title'] = 'Herbs Categories';
		$data['herbs'] = $this->model_kategori->herbs()->result();
		$this->load->view('layout/home/header', $data);
		$this->load->view('herbs', $data);
		$this->load->view('layout/home/footer');
	}

	public function cosmetic()
	{
		$data['title'] = 'Cosmetic Categories';
		$data['cosmetic'] = $this->model_kategori->cosmetic()->result();
		$this->load->view('layout/home/header', $data);
		$this->load->view('cosmetic', $data);
		$this->load->view('layout/home/footer');
	}

	public function beverages()
	{
		$data['title'] = 'Beverages Categories';
		$data['beverages'] = $this->model_kategori->beverages()->result();
		$this->load->view('layout/home/header', $data);
		$this->load->view('beverages', $data);
		$this->load->view('layout/home/footer');
	}
}
