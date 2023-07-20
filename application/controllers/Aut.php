<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aut extends CI_Controller
{

    public function index()
    {
        $this->form_validation->set_rules('nama_user', 'Full Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password_1', 'Password', 'required|matches[password_2]');
        $this->form_validation->set_rules('password_2', 'Password', 'required|matches[password_1]');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Register Account';
            $this->load->view('autentifikasi', $data);
        } else {
            $data = array(
                'id_user'   => '',
                'nama_user' => $this->input->post('nama_user'),
                'email'     => $this->input->post('email'),
                'password'  => md5($this->input->post('password_1')),
                'level'     => 1,
                'avatar'    => 'user.jpg',
            );

            $this->db->insert('user', $data);

            $insert_id = $this->db->insert_id();

            // Mengupdate level pengguna menjadi 1
            $update_data = array(
                'level' => 1
            );
            $this->db->where('id_user', $insert_id);
            $this->db->update('user', $update_data);

            $_SESSION["sukses"] = 'Anda berhasil melakukan registrasi';
            redirect('welcome');
        }
    }
}