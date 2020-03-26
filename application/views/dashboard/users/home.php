<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
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
            $level1 = $this->session->userdata['level1'];
            $level2 = $this->session->userdata['level2'];
            $level3 = $this->session->userdata['level3'];
          ?>
          <div class="row">
              <div class="col-lg-6 col-md-6 col-xs-12 w-50">
                  <ul class="breadcrumbs" style="position:fixed;">
                    <li><a href="<?php echo base_url()?>"><span data-feather="home"></span>&nbsp;&nbsp;Home</a></li>
                    <li>Pengajuan Cuti</li>
                  </ul>
              </div>
              <?php
                if($level_jabatan == 1){
                  ?>
                <?php }else{ ?>
                  <div class="col-lg-6 col-md-6 col-xs-12 w-50">
                      <ul class="breadcrumbs" style="position:fixed;">
                        <li><span data-feather="calendar"></span>&nbsp;&nbsp;Kalendar</li>
                      </ul>
                  </div>
                <?php }
             
             ?>
          </div>
          <br/>
          <br/>
          <?php echo form_open('cuti/add'); ?>
          <div class="row">
            <?php
                if($level_jabatan == 1){
                  ?>
                    
                  <?php
                }else{
                  ?>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                                  <div class="row">
                                      <div class="col-lg-12 col-md-12 col-xs-12">
                                          <?php
                                              if($this->session->flashdata('message')){ ?>
                                                  <div class="alert alert-success alert-dismissible"><?php echo $this->session->flashdata('message') ?>
                                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                  </div>
                                                  <?php   }else if($this->session->flashdata('error')){ ?>
                                                      <div class="alert alert-danger alert-dismissible"><?php echo $this->session->flashdata('error') ?>
                                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                  </div>
                                                      <?php
                                                  }
                                          ?>
                                          <div class="card">
                                            <div class="card-header">
                                              Data Pegawai
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                  <div class="card-body">
                                                    <div class="form-group">
                                                      <label>Nama</label>
                                                      <input type="hidden" name="p_user_id" class="form-control" value="<?php echo  $user_id; ?>">
                                                      <input readonly name="p_name" class="form-control" value="<?php echo  $nama; ?>">
                                                    </div> 
                                                    <div class="form-group">
                                                      <label>Jabatan</label>
                                                      <input readonly name="p_name" class="form-control" value="<?php echo  $jabatan; ?>">
                                                    </div> 
                                                  </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                  <div class="card-body">
                                                    <div class="form-group">
                                                      <label>Unit Kerja</label>
                                                      <input readonly name="p_name" class="form-control" value="<?php echo  $bidang; ?>">
                                                    </div> 
                                                    <div class="form-group">
                                                      <label>NIP</label>
                                                      <input readonly name="p_name" class="form-control" value="<?php echo  $nip; ?>">
                                                    </div> 
                                                  </div>
                                                </div>
                                            </div>
                                          </div>
                                      </div>
                                  </div>
                                  <br/>
                                  <div class="form-group">
                                      <label for="exampleFormControlSelect1">Jenis Cuti yang Diambil *</label>
                                      <select class="form-control" name="p_jenis_cuti" id="exampleFormControlSelect1" required>
                                      <option value="">- Pilih jenis Cuti - </option>
                                        <option value="tahunan">Cuti Tahunan</option>
                                        <option value="besar">Cuti Besar</option>
                                        <option value="sakit">Cuti Sakit</option>
                                        <option value="melahirkan">Cuti Melahirkan</option>
                                        <option value="penting">Cuti Karena Alasan Penting</option>
                                        <option value="tanggungan_negara">Cuti Luar Tanggungan Negara</option>
                                      </select>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6 col-md-6 col-xs-12">
                                      <label for="exampleFormControlSelect1">Masa Cuti *</label>
                                          <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon1">Awal</span>
                                            </div>
                                            <input name="p_tanggal_awal" type="date" id="date_awal" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                                          </div>
                                      </div>
                                      <div class="col-lg-6 col-md-6 col-xs-12">
                                      <label for="exampleFormControlSelect1" style="visibility:hidden;">askdasdsa</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon1">Akhir</span>
                                            </div>
                                            <input name="p_tanggal_akhir" type="date" id="date_akhir" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Alasan</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Ajukan alasan cuti" rows="3" name="p_alasan"></textarea>
                                  </div>

                                  <?php
                                      if($level_jabatan == 1){
                                        ?>
                                          
                                        <?php
                                      }
                                      else if($level_jabatan == 2){
                                      ?>
                                          <div class="form-group" style="display:none;">
                                              <label for="exampleFormControlSelect1">Ajukan ke Atasan setara Kepala Seksi / Kepala Sub Bagian * </label>
                                              <select name="p_atasan_level_tiga" class="form-control"  required>
                                                            <option value="0"></option>
                                              </select>
                                          </div>
                                          <div class="form-group" style="display:none;">
                                              <label for="exampleFormControlSelect1">Ajukan ke Atasan setara Kepala Seksi / Kepala Sub Bagian * </label>
                                              <select name="p_atasan_level_dua" class="form-control"  required>
                                                            <option value="0"></option>
                                              </select>
                                          </div>
                                          <div class="form-group">
                                              <label for="exampleFormControlSelect1">Ajukan ke Atasan setara Kepala Kantor Regional * </label>
                                              <select name="p_atasan_level_satu" class="form-control" id="exampleFormControlSelect1" required>
                                                <?php
                                                    foreach($level1 as $list) { ?>
                                                        <option value="<? echo $list->user_id ?>"><?php echo $list->fullname . ' - ' . ' Kepala Kantor Regional' ;?></option>
                                                    <?php }
                                                  
                                                ?>
                                              </select>
                                            </div>
                                      <?php
                                      }else if($level_jabatan == 3 || $level_jabatan == 4){
                                        ?>
                                          <div class="form-group" style="display:none;">
                                              <label for="exampleFormControlSelect1">Ajukan ke Atasan setara Kepala Seksi / Kepala Sub Bagian * </label>
                                              <select name="p_atasan_level_tiga" class="form-control"  required>
                                                            <option value="0"></option>
                                              </select>
                                          </div>
                                            <div class="form-group">
                                                  <label for="exampleFormControlSelect1">Ajukan ke Atasan setara Kepala Bidang/ Kepala Bagian * </label>
                                                  <select name="p_atasan_level_dua" class="form-control" id="exampleFormControlSelect1" required>
                                                    <?php
                                                        foreach($level2 as $list) { ?>
                                                            <option value="<? echo $list->user_id ?>"><?php echo $list->fullname . ' - ' . ' Kepala Seksi/Subbag ' .$list->nama_bidang; ?></option>
                                                        <?php }
                                                      
                                                    ?>
                                                  </select>
                                              </div>
                                              <div class="form-group">
                                                  <label for="exampleFormControlSelect1">Ajukan ke Atasan setara Kepala Kantor Regional * </label>
                                                  <select name="p_atasan_level_satu" class="form-control" id="exampleFormControlSelect1" required>
                                                    <?php
                                                        foreach($level1 as $list) { ?>
                                                            <option value="<? echo $list->user_id ?>"><?php echo $list->fullname . ' - ' . ' Kepala Kantor Regional ';  ?></option>
                                                        <?php }
                                                      
                                                    ?>
                                                  </select>
                                              </div>
                                        <?php
                                      }else{ ?>
                                          <div class="form-group">
                                              <label for="exampleFormControlSelect1">Ajukan ke Atasan setara Kepala Seksi / Kepala Sub Bagian * </label>
                                              <select name="p_atasan_level_tiga" class="form-control"  required>
                                                  <?php  
                                                        foreach($level3 as $list) { ?>
                                                            <option value="<?php echo $list->user_id ?>"><?php echo $list->fullname . ' - ' . ' Kepala Seksi/Subbag ' .$list->nama_bidang; ?></option>
                                                        <?php }
                                                    ?>
                                              </select>
                                          </div>
                                          <div class="form-group">
                                              <label for="exampleFormControlSelect1">Ajukan ke Atasan setara Kepala Bidang/ Kepala Bagian * </label>
                                              <select name="p_atasan_level_dua" class="form-control" required>
                                                    <?php
                                                        foreach($level2 as $list) { ?>
                                                            <option value="<?php echo $list->user_id ?>"><?php echo $list->fullname . ' - ' . ' Kepala Bidang/Bagian ' .$list->nama_bidang; ?></option>
                                                        <?php }
                                                    ?>
                                              </select>
                                          </div>
                                          <div class="form-group">
                                              <label for="exampleFormControlSelect1">Ajukan ke Atasan setara Kepala Kantor Regional * </label>
                                              <select name="p_atasan_level_satu" class="form-control" required>
                                                  <?php
                                                        foreach($level1 as $list) { ?>
                                                            <option value="<?php echo $list->user_id ?>"><?php echo $list->fullname . ' - ' . ' Kepala Kantor Regional' ; ?></option>
                                                        <?php }
                                                    ?>
                                              </select>
                                          </div>
                                      <?php
                                      }
                                  ?>
                                  <div class="form-group">
                                      <input type="submit" class="btn btn-success btn-block" value="Ajukan Cuti" style="padding-top:15px; padding-bottom:12px;"/>
                                  </div>   
                              </div>

                  <?php
                }
            
            ?>
         
            <div class="col-lg-6 col-md-6 col-xs-12">
              <div id="calendar"></div>
              <br/>
              <ul class="breadcrumbs">
                <li>
                    Daftar Pengajuan
                </li>
              </ul> 
              <br/>
              <br/>
              <table id="table_daftar_cuti_pengguna" class="table table-striped table-bordered responsive table-hover" width="100%"> 
                    <thead>
                        <tr>
                          <th>id</th>
                          <th>Tanggal Awal</th>
                          <th>Tanggal Akhir</th>
                          <th>Jenis</th>
                          <th>Status</th>
                          <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                     if(sizeof($cuti_details) > 0 && isset($cuti_details)){
                        foreach($cuti_details as $list) { ?>
                          <tr>
                                      <td><?php echo $list['id']; ?></td>
                                      <td><?php echo $list['tanggal_awal']; ?></td>
                                      <td><?php echo $list['tanggal_akhir']; ?></td>
                                      <td><?php echo $list['jenis_cuti']; ?></td>
                                      <td><?php
                                            if($list['approvement'] == 'Disetujui'){?> 
                                              <span class="approve"><span data-feather="check"></span>&nbsp;<?php echo $list['approvement']; ?></span>
                                            <?php }else{
                                                ?> 
                                                <span class="disapprove"><span data-feather="x"></span>&nbsp;<?php echo $list['approvement']; ?></span>
                                            <?php }
                                          ?></td>
                                      <!-- <button onclick="window.location.href='<?php echo base_url('pendapatan_update/'.$list->penda_id);?>' " class="btn btn-sm btn-success">Edit</a> -->
                                      <th><a href="<?php echo base_url('users/request_detail/'.$list['id']);?>">Lihat detail</a></th>
                        </tr>
                        <?php } ?>
                     <?php  }else{
                        ?>
                          <tr >
                              <td colspan="6"> 
                                Tidak ada data
                              </td>
                          </tr>                        
                     <?php } ?>
                    </tbody>
              </table>
            </div>
          </div>
    </main> 
<script>
  $( document ).ready(function() {
        // $('#evoCalendar').evoCalendar({
        //     todayHighlight: true,
        //     sidebarToggler: true,
        //     eventListToggler: true,
        //     canAddEvent: false,
        //     calendarEvents: [
        //         // { name: "New Year", date: "Wed Jan 01 2020 00:00:00 GMT-0800 (Pacific Standard Time)", type: "holiday", everyYear: true },
        //         // { name: "Valentine's Day", date: "Fri Feb 14 2020 00:00:00 GMT-0800 (Pacific Standard Time)", type: "holiday", everyYear: true },
        //         // { name: "Patient #1", date: "February/3/2020", type: "event" },
        //         // { name: "Patient #3", date: "February/3/2020", type: "event" },
        //         // { name: "Patient #4", date: "February/3/2020", type: "event" },
        //         // { name: "Holiday #3", date: "February/3/2020", type: "holiday" },
        //         // { name: "Birthday #2", date: "February/3/2020", type: "birthday" },
        //         // { name: "Author's Birthday", date: "February/15/2020", type: "birthday", everyYear: true },
        //         // { name: "Holiday #4", date: "February/15/2020", type: "event" },
        //         // { name: "Patient #2", date: "February/8/2020", type: "event" },
        //         // { name: "Leap day", date: "February/29/2020", type: "holiday", everyYear: true }
        //     ],
        //     onSelectDate: function() {
        //         // console.log('onSelectDate!')
        //     },
        //     onAddEvent: function() {
        //         console.log('onAddEvent!')
        //     }
        // });
        $("#calendar").zabuto_calendar({language: "en"});

         var today = new Date();
          var dd = today.getDate();
          var mm = today.getMonth()+1; //January is 0!
          var yyyy = today.getFullYear();
          if(dd<10){
                  dd='0'+dd
              } 
              if(mm<10){
                  mm='0'+mm
              } 

          today = yyyy+'-'+mm+'-'+dd;
          $("#date_awal" ).attr('min', today);
          $("#date_akhir" ).attr('min', today);

        $('#table_daftar_cuti_pengguna').DataTable({});
  });
</script>