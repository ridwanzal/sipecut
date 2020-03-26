<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <?php
            $username = $this->session->userdata['user_details'][0]['username'];
            $user_id = $this->session->userdata['user_details'][0]['user_id'];
            $nama = $this->session->userdata['user_details'][0]['fullname'];
            $jabatan = $this->session->userdata['user_details'][0]['nama_jabatan'];
            $bidang = $this->session->userdata['user_details'][0]['nama_bidang'];
            $nip = $this->session->userdata['user_details'][0]['nip'];
            $profile_image_path = $this->session->userdata['user_details'][0]['profile_image_path'];
          ?>
          <div class="row">
              <div class="col-lg-6 col-md-6 col-xs-12 w-50">
                  <ul class="breadcrumbs">
                    <li><a href="<?php echo base_url();?>"><span data-feather="home"></span>&nbsp;&nbsp;Home</a></li>
                    <li>Detail Profil</li>
                  </ul>
              </div>
          </div>
          <br/>
          <br/>
          <div class="row">
            <div class="col-lg-2 col-md-2 col-xs-12">
                <?php
                    if($profile_image_path != ""){
                      ?>
                        <img class="image_profile" src="<?php echo base_url()?>/assets/image_users/<?php echo $profile_image_path; ?>" style="border-radius:200px;">
                    <?php }else{
                      ?>
                        <img  class="image_profile" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRh93q9bQrftdhkeO2_r6P2z6sE8FD9EyQXI5okbkQRWpTToRls" style="border-radius:200px;">
                    <?php }
                ?>
                <br/>
                <br/>
                  <?php echo form_open_multipart('users/upload_image'); ?>
                    <div class="form-group">
                      <label for="exampleFormControlFile1">Uploade/ Edit Profile Image</label>
                      <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                      <input type="file" class="form-control-file" name="upload_image" required>
                    </div>
                    <input type="submit" class="btn btn-success btn-sm btn-block" value="Upload foto" style="padding-top:10px;padding-bottom:10px;"/>
                  <?php echo form_close();?>
            </div>
            <div class="col-lg-10 col-md-10 col-xs-12">
                <div class="row">
                      <div class="col-lg-4 col-md-4 col-xs-12">
                          <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input name="p_date_awal" class="form-control"  value="<?php echo  $nama; ?>" required>
                          </div> 
                          <div class="form-group">
                            <label>Jabatan</label>
                            <input name="p_date_awal" class="form-control" value="<?php echo  $jabatan; ?>" type="text" required>
                          </div>
                          <div class="form-group">
                            <label>Unit Kerja</label>
                            <input name="p_date_awal" class="form-control" value="<?php echo  $bidang; ?>" type="text" required>
                          </div>
                          <div class="form-group">
                            <label>NIP</label>
                            <input name="p_date_awal" class="form-control" value="<?php echo  $nip; ?>" type="text" required>
                          </div> 
                      </div>
                </div>
            </div>
        </div>
    </main> 
<script>
  $( document ).ready(function() {
  });
</script>