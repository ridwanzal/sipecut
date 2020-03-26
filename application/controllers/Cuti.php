<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Controller {
    public function __construct() { 
            parent::__construct(); 
            $this->load->helper(array('form', 'url')); 
    }

    public function add()
    {
        $user_id = $this->input->post('p_user_id', TRUE);
        $jenis_cuti = $this->input->post('p_jenis_cuti', TRUE);
        $tanggal_awal = $this->input->post('p_tanggal_awal', TRUE);
        $tanggal_akhir = $this->input->post('p_tanggal_akhir', TRUE);
        $alasan = $this->input->post('p_alasan', TRUE);
        $atasan_satu = $this->input->post('p_atasan_level_satu', TRUE);
        $atasan_dua = $this->input->post('p_atasan_level_dua', TRUE);
        $atasan_tiga = $this->input->post('p_atasan_level_tiga', TRUE);
        $data = array(
          'id_pegawai' => $user_id,
          'tanggal_awal' => $tanggal_awal,
          'tanggal_akhir' => $tanggal_akhir,
          'total_sisa_cuti_tahunan' => '12',
          'jenis_cuti' => $jenis_cuti,
          'alasan' => $alasan,
          'pejabat_level_satu' => $atasan_satu,
          'pejabat_level_dua' => $atasan_dua,
          'pejabat_level_tiga' => $atasan_tiga,
          'status_level_satu' => '0',
          'status_level_dua' => '0',
          'status_level_tiga' => '0',
        );
    
        $this->db->insert('bkn_cuti', $data);
        $affect_row = $this->db->affected_rows();
        if($affect_row > 0){
          $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
        }else{
          $this->session->set_flashdata('error', 'Gagal menambahkan data');
        }
        redirect(base_url());
    }

    public function update(){

    }

    public function delete(){

    }



}
