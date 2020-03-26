<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    public function __construct() { 
            parent::__construct(); 
            $this->load->helper(array('form', 'url')); 
            if($this->session->userdata('status') != "login"){
              redirect(base_url("login"));
            }
    }

    public function index()
    {
        $data['title_bar'] = "Dashboard | BKN 7 Sistem Pengajuan Cuti";
        $data['header_page'] = "";
        $this->load->view('adminheader', $data );
        $this->load->view('adminbar', $data);
        $this->load->view('dashboard/users/home', $data);
        $this->load->view('adminfooter', $data);
    }

    public function profile()
    {
        $data['title_bar'] = "Profil | BKN 7 Sistem Pengajuan Cuti";
        $data['header_page'] = "";


        $this->load->view('adminheader', $data );
        $this->load->view('adminbar', $data);
        $this->load->view('dashboard/users/profile', $data);
        $this->load->view('adminfooter', $data);
    }

     // daftar persetujuan pengajuan users
     public function request_detail($id = null)
     {
        if(!isset($id)){
            redirect(base_url());
        }
        $data['title_bar'] = "Permintaan Persetujuan | BKN 7 Sistem Pengajuan Cuti";
        $data['header_page'] = "";
        $user_id = $this->session->userdata('user_id');

        $query = "SELECT a.*, b.fullname, c.nama as nama_bidang, b.nip FROM bkn_cuti a, bkn_users b, bkn_bidang c WHERE a.id_pegawai = b.user_id and a.id = $id and c.id = b.id_bidang";
        $query_result = $this->db->query($query)->result();
      
        $data['detail_pengajuan'] = $query_result;
        $this->load->view('adminheader', $data );
        $this->load->view('adminbar', $data);
        $this->load->view('dashboard/users/detail_pengajuan', $data);
        $this->load->view('adminfooter', $data);
     }


    // daftar persetujuan pengajuan pejabat
    public function request()
    {
        $data['title_bar'] = "Permintaan Persetujuan | BKN 7 Sistem Pengajuan Cuti";
        $data['header_page'] = "";
        $user_id = $this->session->userdata('user_id');

        $query = "SELECT a.*, a.id as cuti_id, b.fullname, c.nama as nama_bidang, b.nip FROM bkn_cuti a, bkn_users b, bkn_bidang c WHERE a.id_pegawai = b.user_id and a.pejabat_level_satu = $user_id and c.id = b.id_bidang";
        $query_result = $this->db->query($query)->result();
        
        $query2 = "SELECT a.*, a.id as cuti_id, b.fullname, c.nama as nama_bidang, b.nip FROM bkn_cuti a, bkn_users b, bkn_bidang c WHERE a.id_pegawai = b.user_id and a.pejabat_level_dua = $user_id and c.id = b.id_bidang";
                $query_result2 = $this->db->query($query2)->result();

        $query3 = "SELECT a.*, a.id as cuti_id, b.fullname, c.nama as nama_bidang, b.nip FROM bkn_cuti a, bkn_users b, bkn_bidang c WHERE a.id_pegawai = b.user_id and a.pejabat_level_tiga = $user_id and c.id = b.id_bidang";
        $query_result3 = $this->db->query($query3)->result();

        $data['daftar_pengajuan_level1'] = $query_result;
        $data['daftar_pengajuan_level2'] = $query_result2;
        $data['daftar_pengajuan_level3'] = $query_result3;
        $this->load->view('adminheader', $data );
        $this->load->view('adminbar', $data);
        $this->load->view('dashboard/users/persetujuan', $data);
        $this->load->view('adminfooter', $data);
    }

    public function response(){
      $level = $this->input->post('level', TRUE);
      $cuti_id = $this->input->post('cuti_id', TRUE);
      $status_approval = $this->input->post('status_approval', TRUE);
      if($status_approval == 1 || $status_approval == "1"){
          if($level == 1 || $level == "1"){
            $data = array(
              'status_level_satu' => 1,
            );
          }else if($level == 2 || $level == "2"){
            $data = array(
              'status_level_dua' => 1,
            );
          }else if($level == 3 || $level == "3"){
            $data = array(
              'status_level_tiga' => 1,
            );
          }
      }else{
        if($level == 1 || $level == "1"){
          $data = array(
            'status_level_satu' => 0,
          );
        }else if($level == 2 || $level == "2"){
          $data = array(
            'status_level_dua' => 0,
          );
        }else if($level == 3 || $level == "3"){
          $data = array(
            'status_level_tiga' => 0,
          );
        }
      }

      $this->db->where('id', $cuti_id);
      $this->db->update('bkn_cuti', $data);
      $affect_row = $this->db->affected_rows();
      if($affect_row > 0){
        $this->session->set_flashdata('message', 'Berhasil update konten');
      }else{
        $this->session->set_flashdata('error', 'Gagal update konten');
      }
      redirect(base_url("users/request"));
    }


    public function reject(){
      $level = $this->input->post('level', TRUE);
      $cuti_id = $this->input->post('cuti_id', TRUE);
      $status_approval = $this->input->post('status_approval', TRUE);
      if($status_approval == 1 || $status_approval == "1"){
          if($level == 1 || $level == "1"){
            $data = array(
              'status_level_satu' => 2,
            );
          }else if($level == 2 || $level == "2"){
            $data = array(
              'status_level_dua' => 2,
            );
          }else if($level == 3 || $level == "3"){
            $data = array(
              'status_level_tiga' => 2,
            );
          }
      }else{
        if($level == 1 || $level == "1"){
          $data = array(
            'status_level_satu' => 2,
          );
        }else if($level == 2 || $level == "2"){
          $data = array(
            'status_level_dua' => 2,
          );
        }else if($level == 3 || $level == "3"){
          $data = array(
            'status_level_tiga' => 2,
          );
        }
      }

      $this->db->where('id', $cuti_id);
      $this->db->update('bkn_cuti', $data);
      $affect_row = $this->db->affected_rows();
      if($affect_row > 0){
        $this->session->set_flashdata('message', 'Berhasil update konten');
      }else{
        $this->session->set_flashdata('error', 'Gagal update konten');
      }
      redirect(base_url("users/request"));
    }

    public function upload_image(){
        $get_user_id = $this->input->post('user_id', TRUE);
        $image_path = "";
        $config['upload_path'] = './assets/image_users/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('upload_image')){
          echo 'Gagal upload';
        }else{
          $image_path = $this->upload->data('file_name');
        }

        $data = array(
            'profile_image_path' => $image_path,
        );
        $this->db->where('user_id', $get_user_id);
        $this->db->update('bkn_users', $data);
        $affect_row = $this->db->affected_rows();
        if($affect_row > 0){
          $this->session->set_flashdata('message', 'Berhasil update konten');
        }else{
          $this->session->set_flashdata('error', 'Gagal update konten');
        }
        redirect(base_url());

    }

}
