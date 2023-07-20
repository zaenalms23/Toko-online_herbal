<?php
defined('BASEPATH') or exit('No Direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['Model_user', 'Model_invoice', 'Model_kategori', 'Model_pembayaran']);
    }

    public function laporan_penjualan()
    {
        $data['judul'] = 'Laporan Data Penjualan';
        $data['user'] = $this->Model_user->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['laporan'] = $this->db->query("SELECT t.*, u.*, c.*, p.*
                                    FROM transaction t
                                    JOIN user u ON t.id_user = u.id_user
                                    JOIN cart c ON t.order_id = c.id_invoice
                                    JOIN product p ON c.id_brg = p.id_brg")->result_array();
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/laporan/laporan_penjualan', $data);
        $this->load->view('layout/admin/footer');
    }

    public function cetak_laporan_penjualan()
    {
        $data['laporan'] = $this->db->query("SELECT t.*, u.*, c.*, p.*
                                    FROM transaction t
                                    JOIN user u ON t.id_user = u.id_user
                                    JOIN cart c ON t.order_id = c.id_invoice
                                    JOIN product p ON c.id_brg = p.id_brg")->result_array();
        $this->load->view('cetak/penjualan/print-penjualan', $data);
    }

    public function laporan_penjualan_pdf()
    { {
            $this->load->library('dompdf_gen');

            $data['laporan'] = $this->db->query("SELECT t.*, u.*, c.*, p.*
                                    FROM transaction t
                                    JOIN user u ON t.id_user = u.id_user
                                    JOIN cart c ON t.order_id = c.id_invoice
                                    JOIN product p ON c.id_brg = p.id_brg")->result_array();

            $this->load->view('cetak/penjualan/pdf-penjualan', $data);

            $paper_size  = 'A4'; // ukuran kertas
            $orientation = 'landscape'; //tipe format kertas potrait atau landscape
            $html = $this->output->get_output();

            $this->dompdf->set_paper($paper_size, $orientation);
            //Convert to PDF
            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $this->dompdf->stream("laporan data penjualan.pdf", array('Attachment' => 0));
            // nama file pdf yang di hasilkan
        }
    }

    public function export_excel_penjualan()
    {
        $data = array(
            'title' => 'Laporan Data Penjualan',
        );
        $data['laporan'] = $this->db->query("SELECT t.*, u.*, c.*, p.*
        FROM transaction t
        JOIN user u ON t.id_user = u.id_user
        JOIN cart c ON t.order_id = c.id_invoice
        JOIN product p ON c.id_brg = p.id_brg")->result_array();

        $this->load->view('cetak/penjualan/excel-penjualan', $data);
    }

    public function laporan_anggota()
    {
        $data['judul'] = 'Laporan Anggota';
        $data['user'] = $this->Model_user->cekData(['email' => $this->session->userdata('email')])->row_array();
        $roleid = ['level' => 2];
        $data['anggota'] = $this->Model_user->getuserwhere($roleid)->result();
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/laporan/laporan_anggota', $data);
        $this->load->view('layout/admin/footer');
    }

    public function cetak_laporan_anggota()
    {
        $roleid = ['level' => 2];
        $data['anggota'] = $this->Model_user->getuserwhere($roleid)->result();
        $this->load->view('cetak/anggota/laporan_print_anggota', $data);
    }

    public function laporan_anggota_pdf()
    {
        $this->load->library('Dompdf_gen');
        $roleid = ['level' => 2];
        $data['anggota'] = $this->Model_user->getuserwhere($roleid)->result();

        $this->load->view('cetak/anggota/laporan_pdf_anggota', $data);

        $paper = 'A4';
        $orien = 'landscape';
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paper, $orien);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('laporan_data_anggota.pdf');
    }

    public function export_excel_anggota()
    {
        $roleid = ['level' => 2];
        $data = array(
            'title' => 'Laporan Data Anggota',
            'anggota' => $this->Model_user->getuserwhere($roleid)->result()
        );
        $this->load->view('cetak/anggota/export_excel_anggota', $data);
    }
}
