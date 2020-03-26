<body>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap" style="padding-top:10px; padding-bottom:10px;">
    <a class="col-sm-3 col-md-2 mr-0" href="<?php echo base_url() ?>admin">
                <span>
                <img width="200px;"src="<?php echo base_url();?>assets/img/navbar_logo.svg">
                </span>
    </a>
    <span style="width:100%;
                color:#fff;white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;">
                  <?php
                     $profile_image_path = $this->session->userdata['user_details'][0]['profile_image_path'];
                     if(isset($profile_image_path)){
                        if($profile_image_path != ""){
                          ?>
                          <img width="30px;" src="<?php echo base_url()?>/assets/image_users/<?php echo $profile_image_path; ?>" style="border-radius:200px;padding:5px;">
                          <?php
                        }else{?>
                            <span data-feather="users"></span>
                        <?php }
                     }
                    //  var_dump($this->session->userdata['user_details'][0]);
                    //  exit;
                ?>

                &nbsp;<?php
                    print_r('Halo  ' .'<b>'.$this->session->userdata['fullname'].'</b>'. ', selamat datang kembali. Lihat aktivitas pengajuan cutimu.');
                  ?>
              </span>
    <form class="form-inline">
    <span style="color:#ffffff;display:flex;background:#565758;padding:5px 15px 5px 15px;border-radius:8px;cursor:pointer;"><span data-feather="bell"></span>&nbsp;&nbsp;<span>Notifikasi</span></span>
    </form>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky" style="position:relative;top:35px;">
              <div id="accordion">
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <a href="<?php echo base_url(); ?>" class="btn btn-default"><span data-feather="book" style="position:relative;top:-3px;margin-right:10px;"></span>Pengajuan Cuti</a>
                    </h5>
                  </div>
                </div>
                <?php
                  $user_id = $this->session->userdata['user_details'][0]['user_id'];
                  $username = $this->session->userdata['user_details'][0]['username'];
                  $nama = $this->session->userdata['user_details'][0]['fullname'];
                  $jabatan = $this->session->userdata['user_details'][0]['nama_jabatan'];
                  $bidang = $this->session->userdata['user_details'][0]['nama_bidang'];
                  $nip = $this->session->userdata['user_details'][0]['nip'];
                  $role = $this->session->userdata['user_details'][0]['role'];
                  $level_jabatan = $this->session->userdata['user_details'][0]['id_jabatan'];
                  $nama_level_jabatan = $this->session->userdata['user_details'][0]['nama_jabatan'];
                ?>
                <?php 
                  if($level_jabatan < 4){
                    ?>
                   <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                          <a href="<?php echo base_url(); ?>users/request" class="btn btn-default"><span data-feather="inbox" style="position:relative;top:-3px;margin-right:10px;"></span>Meminta persetujuan</a>
                        </h5>
                      </div>
                    </div>
                  <?php }
                
                ?>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <a href="<?php echo base_url(); ?>" class="btn btn-default"><span data-feather="archive" style="position:relative;top:-3px;margin-right:10px;"></span>Riwayat Cuti</a>
                    </h5>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <a href="<?php echo base_url(); ?>users/profile" class="btn btn-default"><span data-feather="user" style="position:relative;top:-3px;margin-right:10px;"></span>Pengaturan Profil</a>
                    </h5>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          <a href="#" id="logout" style="color:#212529;">
                            <span data-feather="log-out"></span>
                            Logout
                          </a>
                      </button>
                    </h5>
                  </div>
                </div>
              </div>
        </div>
      </nav>
      <style>
       
      </style>