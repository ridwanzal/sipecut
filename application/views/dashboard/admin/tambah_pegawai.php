<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-xs-12 w-50">
                  <ul class="breadcrumbs" style="position:fixed;">
                    <li><a href="<?php echo base_url()?>"><span data-feather="home"></span>&nbsp;&nbsp;Home</a></li>
                    <li><a href="<?php echo base_url()?>"></span>Pengelolaan Pegawai</a></li>
                    <li>Daftarkan Pegawai</li>
                  </ul>
              </div>
          </div>
          <br/>
          <br/>
          <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12">
                <form method="POST" action="<?php echo base_url('admin/submit_add'); ?>">
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
                            <label>NIP</label>
                              <input name="p_nip" class="form-control" placeholder="NIP" type="text" required>
                          </div> 
                          <div class="form-group">
                            <label>Username</label>
                              <input name="p_username" class="form-control" placeholder="Username" type="text" required>
                          </div> 
                          <div class="form-group">
                            <label>FullName</label>
                              <input name="p_fullname" class="form-control" placeholder="Fullname" type="text" required>
                          </div> 
                          <div class="form-group">
                            <label>Unit Kerja</label>
                                <select name="p_unitkerja" class="form-control" id="exampleFormControlSelect1" required>
                                  <?php
                                      foreach($unit_kerja as $list) { ?>
                                          <option value="<? echo $list->id;?>"><?php echo $list->nama; ?></option>
                                      <?php }
                                    
                                  ?>
                                </select>
                          </div> 
                          <div class="form-group">
                            <label>Jabatan</label>
                              <select name="p_leveljabatan" class="form-control" id="exampleFormControlSelect1" required>
                                <?php
                                      foreach($level_jabatan as $list2) { ?>
                                          <option value="<? echo $list2->id;?>"><?php echo $list2->nama; ?></option>
                                      <?php }
                                    
                                  ?>
                              </select>  
                          </div> 
                          <p style="color:#b80d57;">Password akan di generate otomatis dengan default '123'. Silahkan himbau pengguna untuk mengganti password setelah melakukan proses pendaftaran.</p>
                          <div class="form-group"> 
                          </div> 
                          <div class="row">
                              <div class="col-lg-12 col-md-12">
                                  <div class="form-group">
                                      <input type="submit" class="btn btn-primary btn-block btn-dark" value="Daftarkan Pegawai" style="padding-top:15px; padding-bottom:12px;"/>
                                  </div>                                                     
                              </div>
                          </div>
                    </article>
                  </div>
                </form>
            </div>
          </div>
</main> 
<script>
  $( document ).ready(function() {
        $("#calendar").zabuto_calendar({language: "en"});
        $('#table_daftar_cuti').DataTable({});
  });
</script>