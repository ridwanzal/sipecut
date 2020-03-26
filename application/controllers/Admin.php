<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() { 
            parent::__construct(); 
            $this->load->helper(array('form', 'url')); 
    }

    public function index()
    {
        $data['title_bar'] = "Dashboard | BKN 7 Sistem Pengajuan Cuti";
        $data['header_page'] = "";
        $this->load->view('adminheader', $data );
        $this->load->view('adminbar', $data);
        $this->load->view('dashboard/home', $data);
        $this->load->view('adminfooter', $data);
    }

    public function adduser(){
        $data['title_bar'] = "Dashboard | BKN 7 Sistem Pengajuan Cuti";
        $data['header_page'] = "";
        $query4 = "SELECT 
                a.user_id, 
                a.username,
                a.role,
                a.nip,
                a.email,
                a.fullname, 
                a.profile_image_path,
                b.id as id_jabatan,
                b.nama as nama_jabatan,
                c.id as id_bidang,
                c.nama as nama_bidang
                from bkn_users a INNER JOIN bkn_level_jabatan b 
                INNER JOIN bkn_bidang c on b.id = a.id_level_jabatan AND c.id = a.id_bidang AND a.id_level_jabatan = 1 ";
                $query4_result = $this->db->query($query4)->result();

        $query5 =  "SELECT 
                a.user_id, 
                a.username,
                a.role,
                a.nip,
                a.email,
                a.fullname, 
                a.profile_image_path,
                b.id as id_jabatan,
                b.nama as nama_jabatan,
                c.id as id_bidang,
                c.nama as nama_bidang
                from bkn_users a INNER JOIN bkn_level_jabatan b 
                INNER JOIN bkn_bidang c on b.id = a.id_level_jabatan AND c.id = a.id_bidang AND a.id_level_jabatan = 2 ";
        $query5_result = $this->db->query($query5)->result();

        $query6 =  "SELECT 
                a.user_id, 
                a.username,
                a.role,
                a.nip,
                a.email,
                a.fullname, 
                a.profile_image_path,
                b.id as id_jabatan,
                b.nama as nama_jabatan,
                c.id as id_bidang,
                c.nama as nama_bidang
                from bkn_users a INNER JOIN bkn_level_jabatan b 
                INNER JOIN bkn_bidang c on b.id = a.id_level_jabatan AND c.id = a.id_bidang AND a.id_level_jabatan = 3 ";
                $query6_result = $this->db->query($query6)->result();

        $query7 = "SELECT id, nama from bkn_bidang ";
        $query7_result = $this->db->query($query7)->result();

        $query8 = "SELECT id, nama from bkn_level_jabatan";
        $query8_result = $this->db->query($query8)->result();

        $data['level1'] = $query4_result;
        $data['level2'] = $query5_result;
        $data['level3'] = $query6_result;
        $data['unit_kerja'] = $query7_result;
        $data['level_jabatan'] = $query8_result;
        $this->load->view('adminheader', $data );
        $this->load->view('adminbar_admin', $data);
        $this->load->view('dashboard/admin/tambah_pegawai', $data);
        $this->load->view('adminfooter', $data);
    }

    public function submit_add(){
        $nip = $this->input->post('p_nip', TRUE);
        $username = $this->input->post('p_username', TRUE);
        $fullname = $this->input->post('p_fullname', TRUE);
        $unit_kerja = $this->input->post('p_unitkerja', TRUE);
        $jabatan = $this->input->post('p_leveljabatan', TRUE);
        $data = array(
          'role' => 'pegawai',
          'username' => $username,
          'nip' => $nip,
          'fullname' => $fullname,
          'password' => sha1('123'),
          'id_bidang' => $unit_kerja,
          'id_level_jabatan' => $jabatan,
        );
    
        $this->db->insert('bkn_users', $data);
        $affect_row = $this->db->affected_rows();
        if($affect_row > 0){
          $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
        }else{
          $this->session->set_flashdata('error', 'Gagal menambahkan data');
        }
        redirect(base_url());     
    }

}
