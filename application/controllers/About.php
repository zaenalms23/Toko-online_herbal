<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    public function index()
    {
        $this->load->view('layout/home/header',);
        $this->load->view('about_view');
        $this->load->view('layout/home/footer');
    }
}
