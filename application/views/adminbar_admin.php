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
                        <span data-feather="users"></span>
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
                      <a href="<?php echo base_url(); ?>" class="btn btn-default"><span data-feather="book" style="position:relative;top:-3px;margin-right:10px;"></span>Pengelolaan Pegawai</a>
                    </h5>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <a href="<?php echo base_url(); ?>" class="btn btn-default"><span data-feather="archive" style="position:relative;top:-3px;margin-right:10px;"></span>Pengelolaan Cuti</a>
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
