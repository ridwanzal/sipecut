<div class="section_one" style="margin-top:100px;">
  <div class="container">
  <div class="row justify-content-md-center">
      <div class="col-lg-6 col-md-6 col-xs-12">
      <center><img width="250" src="<?php echo base_url() ?>assets/img/sipecutlogo.svg"></center>
      <br/>
      <br/>
        <form method="POST" action="<?php echo base_url('main/submit_login'); ?>">
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
                      <label>Username / NIP</label>
                        <input name="p_username" class="form-control" placeholder="Username / NIP" type="text" required>
                    </div> 
                    <div class="input-group mb-3" id="show_hide_password">
                      <input type="password" class="form-control" name="p_password" placeholder="Password" required>
                      <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2"><span id="icon_eyes" data-feather="eye"></span></span>
                      </div>
                    </div>
                    <div class="form-group"> 
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
                      <!-- <span>Belum punya akun ? </span>&nbsp;<a href="<?php base_url()?>admin/register">Daftar</a> -->
                </div>
            </div>
          </center>
      </div>
  </div>
  </div>
</div>
<style>
body{
  background : #f5f5f5;
}
</style>
<script>
  $(document).ready(function() {
    $(".input-group-text").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#icon_eyes').attr('data-feather', 'eye-off');
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#icon_eyes').attr('data-feather', 'eye');
        }
    });
});
</script>