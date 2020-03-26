<div class="section_one" style="margin-top:100px;">
  <div class="container">
  <div class="row justify-content-md-center">
      <div class="col-lg-6 col-md-6 col-xs-12">
      <center><img width="350" src="<?php echo base_url() ?>assets/img/sipecut.png"></center>
      <br/>
      <br/>
        <form method="POST" action="<?php echo base_url('admin/submit_login'); ?>">
          <div class="card">
              <article class="card-body setpad">
                <?php
                    if($this->session->flashdata('error')){ ?>
                        <div class="alert alert-danger alert-dismissible"><?php echo $this->session->flashdata('error') ?>
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        </div>
                        <?php   }
                ?>
                <p class="lead"><? ?></p>
                    <div class="form-group">
                      <label>Nama</label>
                        <input name="p_nama" class="form-control" placeholder="***********" type="password" required>
                    </div> 
                    <div class="form-group">
                      <label>Username</label>
                        <input name="p_username" class="form-control" placeholder="Username" type="text" required>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                        <input name="p_username" class="form-control" placeholder="Username" type="text" required>
                    </div>
                    <div class="form-group">
                      <label>Your password</label>
                        <input name="p_password" class="form-control" placeholder="***********" type="password" required>
                    </div> 
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-block btn-dark" value="Sign In" style="padding-top:15px; padding-bottom:12px;"/>
                            </div>                                                      
                        </div>
                    </div>
              </article>
            </div>
          </form>
          <br/>
          <center>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                      <span>Punya akun ? </span>&nbsp;<a href="<?php echo base_url()?>">Login</a>
                </div>
            </div>
          </center>
      </div>
  </div>
  </div>
</div>
