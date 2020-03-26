<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->helper(array('form', 'url')); 
  }

  public function index(){
      if($this->session->userdata('status') != "login"){
        redirect(base_url("login"));
      }else{  
        $data['title_bar'] = "Dashboard | BKN 7 Sistem Pengajuan Cuti";
        $data['header_page'] = "";

        $check_role = $this->session->userdata('role') == "admin";
        if($check_role){
          // ADMIN
          $query2 = "SELECT 
                a.user_id, 
                a.username,
                a.role,
                a.nip,
                a.email,
                a.fullname,
                a.sisa_cuti_tahunan,
                a.profile_image_path,
                b.id as id_jabatan,
                b.nama as nama_jabatan,
                c.id as id_bidang,
                c.nama as nama_bidang
                from bkn_users a INNER JOIN bkn_level_jabatan b INNER JOIN bkn_bidang c on b.id = a.id_level_jabatan AND c.id = a.id_bidang";
          $query2_result = $this->db->query($query2)->result();
          $data['userlist'] = $query2_result;
          $this->load->view('adminheader', $data );
          $this->load->view('adminbar_admin', $data);
          $this->load->view('dashboard/admin/home_admin', $data);
          $this->load->view('adminfooter', $data);
        }else{
          // NON ADMIN
          $get_user_id = $this->session->userdata('user_id');
          $get_level_jabatan = $this->session->userdata('id_level_jabatan');
          // $query_cuti = "SELECT * FROM bkn_cuti where id_pegawai = ".$get_user_id."  ";
          $query_cuti = "";
          if($get_level_jabatan == 1){
            $query_cuti = "SELECT
                          a.*,
                          IF(a.status_level_satu = 1,'Disetujui','Belum disetujui') as approvement
                          FROM
                          bkn_cuti a,
                          bkn_users b
                          WHERE
                          a.id_pegawai = b.user_id and  a.id_pegawai = ".$get_user_id." ";
          }else if($get_level_jabatan == 2){
            $query_cuti = "SELECT
                          a.*,
                          IF(a.status_level_satu = 1,'Disetujui','Belum disetujui') as approvement
                          FROM
                          bkn_cuti a,
                          bkn_users b
                          WHERE
                          a.id_pegawai = b.user_id and  a.id_pegawai = ".$get_user_id." ";
          }else if($get_level_jabatan == 3 ){
            $query_cuti = "SELECT
                          a.*,
                          IF(a.status_level_satu = 1 && a.status_level_dua = 1,'Disetujui','Belum disetujui') as approvement
                          FROM
                          bkn_cuti a,
                          bkn_users b
                          WHERE
                          a.id_pegawai = b.user_id and  a.id_pegawai = ".$get_user_id." ";
          }else if($get_level_jabatan == 4){
            $query_cuti = "SELECT
                            a.*,
                            IF(a.status_level_satu = 1 && a.status_level_dua = 1,'Disetujui','Belum disetujui') as approvement
                            FROM
                            bkn_cuti a,
                            bkn_users b
                            WHERE
                            a.id_pegawai = b.user_id and  a.id_pegawai = ".$get_user_id." ";
          }else if($get_level_jabatan == 5){
              $query_cuti = "SELECT
                              a.*,
                              IF(a.status_level_satu = 1 && a.status_level_dua = 1 && a.status_level_tiga = 1,'Disetujui','Belum disetujui') as approvement
                              FROM
                              bkn_cuti a,
                              bkn_users b
                              WHERE
                              a.id_pegawai = b.user_id and  a.id_pegawai = ".$get_user_id." ";
          }
          $query_cuti_result = $this->db->query($query_cuti)->result_array();
          $data['cuti_details'] = $query_cuti_result;
          $this->load->view('adminheader', $data);
          $this->load->view('adminbar', $data);
          $this->load->view('dashboard/users/home', $data);
          $this->load->view('adminfooter', $data);
        }
      }
  }

  public function login(){
    $data['title_bar'] = "Login | BKN 7 Sistem Pengajuan Cuti";
    $data['header_page'] = "";
    $this->load->view('adminheader', $data );
    $this->load->view('adminlogin', $data);
    $this->load->view('adminfooter', $data);
  }

  public function register(){
    $data['title_bar'] = "Register | Admin";
    $data['header_page'] = "";
    $this->load->view('adminheader', $data );
    $this->load->view('adminregister', $data);
    $this->load->view('adminfooter', $data);
  }

  public function submit_login(){
    $username = $this->input->post('p_username', TRUE);
    $password = $this->input->post('p_password', TRUE);
    $encrypted_mypassword=sha1($password);

    $query="SELECT * FROM bkn_users where username = '$username' AND password = '$encrypted_mypassword' OR nip = '$username' AND password = '$encrypted_mypassword' ";
    $query_result = $this->db->query($query)->result_array();

    if($query_result){
         
            $query2 = "SELECT 
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
                  from bkn_users a INNER JOIN bkn_level_jabatan b INNER JOIN bkn_bidang c on b.id = a.id_level_jabatan AND c.id = a.id_bidang AND a.user_id =  " .$query_result[0]['user_id']." ";
          $query2_result = $this->db->query($query2)->result_array();


          // $query3 = "SELECT * FROM bkn_cuti where id_pegawai = ".$query_result[0]['user_id']."  ";
          $query3 = "SELECT
                      a.*,
                      IF(a.status_level_satu = 1 && a.status_level_dua = 1 && a.status_level_tiga = 1,'Disetujui','Belum disetujui') as approvement
                      FROM
                      bkn_cuti a,
                      bkn_users b
                      WHERE
                      a.id_pegawai = b.user_id and  a.id_pegawai = ".$query_result[0]['user_id']." ";
          $query3_result = $this->db->query($query3)->result_array();



          $query4 =  "SELECT 
                    a.user_id, 
                    a.username,
                    a.role,
                    a.nip,
                    a.email,
                    a.fullname, 
                    a.profile_image_path,
                    b.id as id_jabatan,
                    b.nama as nama_jabatan
                    from bkn_users a INNER JOIN bkn_level_jabatan b on b.id = a.id_level_jabatan AND a.id_level_jabatan = 1 ";
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
                    a.id_level_jabatan,
                    a.profile_image_path,
                    b.id as id_jabatan,
                    b.nama as nama_jabatan,
                    c.id as id_bidang,
                    c.nama as nama_bidang
                    from bkn_users a INNER JOIN bkn_level_jabatan b 
                    INNER JOIN bkn_bidang c on b.id = a.id_level_jabatan AND c.id = a.id_bidang AND a.id_level_jabatan = 3 ";
          $query6_result = $this->db->query($query6)->result();
      
          if(count($query_result) > 0){
            for($i=0; $i<count($query_result); $i++){ 
              $data_session = array(
                'name' => $username,
                'nip' => $query_result[$i]['nip'],
                'user_id' => $query_result[$i]['user_id'],
                'username' => $query_result[$i]['username'],
                'fullname' =>  $query_result[$i]['fullname'],
                'id_level_jabatan' => $query_result[$i]['id_level_jabatan'],
                'email' =>  $query_result[$i]['email'],
                'role' => $query_result[$i]['role'],
                'status' => 'login',
                'user_details' => $query2_result,
                'cuti_details' => $query3_result,
                'level1' => $query4_result,
                'level2' => $query5_result,
                'level3' => $query6_result,
              );
            }
            $this->session->set_flashdata('key', 1);
            $this->session->set_userdata($data_session);	
            redirect(base_url());
          }else{
            $this->session->set_flashdata('error', 'Maaf, Login Gagal');
            redirect(base_url("login"));
          }
    }else{
      $this->session->set_flashdata('error', 'Maaf, Login Gagal');
        redirect(base_url("login"));
    }
  }

  public function submit_logout(){
    $this->session->unset_userdata($newdata);
    $this->session->sess_destroy();
    redirect(base_url("login"));
  }

}

?>