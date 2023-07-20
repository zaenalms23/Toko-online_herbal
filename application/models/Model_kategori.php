<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_kategori extends CI_Model
{

	public function herbs()
	{
		return $this->db->get_where('product', array('kategori' => 'Herbs'));
	}
 
	public function cosmetic()
	{
		return $this->db->get_where('product', array('kategori' => 'Cosmetic'));
	}

	public function beverages()
	{
		return $this->db->get_where('product', array('kategori' => 'Beverages'));
	}
}
