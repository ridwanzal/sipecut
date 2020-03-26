<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-xs-12 w-50">
                  <ul class="breadcrumbs" style="position:fixed;">
                    <li><a href="<?php echo base_url()?>"><span data-feather="home"></span>&nbsp;&nbsp;Home</a></li>
                    <li>Persetujuan Pengajuan</li>
                  </ul>
              </div>
          </div>
          <br/>
          <br/>
          <table id="table_daftar_cuti" class="table table-striped table-bordered responsive table-hover" width="100%"> 
              <thead>
                  <tr>
                          <th>NIP</th>
                          <th>Nama Pegawai</th>
                          <th>Unit Kerja</th>
                          <th>Jenis Cuti</th>
                          <th>Alasan</th>
                          <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $check_level = $this->session->userdata('id_level_jabatan');
                            if($check_level == 1 || $check_level == '1'){
                                foreach($daftar_pengajuan_level1 as $list){ ?>
                                <?php
                                ?>
                                     <tr>
                                        <td><?php echo $list->nip; ?></td>
                                        <td><?php echo $list->fullname; ?></td>
                                        <td><?php echo $list->nama_bidang; ?></td>
                                        <td><?php echo $list->jenis_cuti; ?></td>
                                        <td><?php echo $list->alasan; ?></td>
                                        <td>
                                            <?php 
                                                    if($list->status_level_satu == 1 || $list->status_level_satu == "1"){?>
                                                             <span class="approve"><span data-feather="check"></span>&nbsp;Disetujui</span>
                                                        <?php } else if($list->status_level_satu == 2 || $list->status_level_satu == "2"){ ?>
                                                            <span class="disapprove">Ditolak</span>
                                                        <?php }
                                                        else{
                                                            ?>
                                                        <div style="display:flex;">
                                                            <?php echo form_open_multipart('users/response'); ?>
                                                                <input type="hidden" value="<?php echo $list->cuti_id?>" name="cuti_id">
                                                                <input type="hidden" value="<?php echo $check_level; ?>" name="level">
                                                                <input type="hidden" value="1" name="status_approval">
                                                                <input type="submit" class="btn btn-sm btn-success" value="Setuju">
                                                                &nbsp;&nbsp;
                                                            <?php echo form_close();?>
                                                            <?php echo form_open_multipart('users/reject'); ?>
                                                                <input type="hidden" value="<?php echo $list->cuti_id?>" name="cuti_id">
                                                                <input type="hidden" value="<?php echo $check_level; ?>" name="level">
                                                                <input type="hidden" value="0" name="status_approval">
                                                                <input type="submit" class="btn btn-sm btn-danger" value="Tolak">
                                                            <?php echo form_close();?>
                                                        </div>
                                                    <?php }
                                            ?>
                                        </td>
                                    </tr>
                                <?php }
                            }else if($check_level == 2 || $check_level =='2'){
                                foreach($daftar_pengajuan_level2 as $list2){ ?>
                                    <tr>
                                        <td><?php echo $list2->nip; ?></td>
                                        <td><?php echo $list2->fullname; ?></td>
                                        <td><?php echo $list2->nama_bidang; ?></td>
                                        <td><?php echo $list2->jenis_cuti; ?></td>
                                        <td><?php echo $list2->alasan; ?></td>
                                        <td>
                                            <?php 
                                                    if($list2->status_level_dua == 1 || $list2->status_level_dua == "1"){?>
                                                             <span class="approve"><span data-feather="check"></span>&nbsp;Disetujui</span>
                                                        <?php } else if($list2->status_level_dua == 2 || $list2->status_level_dua == "2"){ ?>
                                                            <span class="disapprove">Ditolak</span>
                                                        <?php }
                                                        
                                                        else{
                                                            ?>
                                                        <div style="display:flex;">
                                                            <?php echo form_open_multipart('users/response'); ?>
                                                                <input type="hidden" value="<?php echo $list2->cuti_id?>" name="cuti_id">
                                                                <input type="hidden" value="<?php echo $check_level; ?>" name="level">
                                                                <input type="hidden" value="1" name="status_approval">
                                                                <input type="submit" class="btn btn-sm btn-success" value="Setuju">
                                                                &nbsp;&nbsp;
                                                            <?php echo form_close();?>
                                                            <?php echo form_open_multipart('users/reject'); ?>
                                                                <input type="hidden" value="<?php echo $list2->cuti_id?>" name="cuti_id">
                                                                <input type="hidden" value="<?php echo $check_level; ?>" name="level">
                                                                <input type="hidden" value="0" name="status_approval">
                                                                <input type="submit" class="btn btn-sm btn-danger" value="Tolak">
                                                            <?php echo form_close();?>
                                                        </div>
                                                    <?php }
                                            ?>
                                        </td>
                                    </tr>
                                <?php }
                            }else if($check_level == 3 || $check_level == '3'){
                                foreach($daftar_pengajuan_level3 as $list3){ ?>
                                    <tr>
                                        <td><?php echo $list3->nip; ?></td>
                                        <td><?php echo $list3->fullname; ?></td>
                                        <td><?php echo $list3->nama_bidang; ?></td>
                                        <td><?php echo $list3->jenis_cuti; ?></td>
                                        <td><?php echo $list3->alasan; ?></td>
                                        <td>
                                            <?php 
                                                    if($list3->status_level_tiga == 1 || $list3->status_level_tiga == "1"){?>
                                                             <span class="approve"><span data-feather="check"></span>&nbsp;Disetujui</span>
                                                        <?php } else if($list3->status_level_tiga == 2 || $list3->status_level_tiga == "2"){ ?>
                                                            <span class="disapprove">Ditolak</span>
                                                        <?php }
                                                        
                                                        else{
                                                            ?>
                                                        <div style="display:flex;">
                                                            <?php echo form_open_multipart('users/response'); ?>
                                                                <input type="hidden" value="<?php echo $list3->cuti_id?>" name="cuti_id">
                                                                <input type="hidden" value="<?php echo $check_level; ?>" name="level">
                                                                <input type="hidden" value="1" name="status_approval">
                                                                <input type="submit" class="btn btn-sm btn-success" value="Setuju">
                                                                &nbsp;&nbsp;
                                                            <?php echo form_close();?>
                                                            <?php echo form_open_multipart('users/reject'); ?>
                                                                <input type="hidden" value="<?php echo $list3->cuti_id?>" name="cuti_id">
                                                                <input type="hidden" value="<?php echo $check_level; ?>" name="level">
                                                                <input type="hidden" value="0" name="status_approval">
                                                                <input type="submit" class="btn btn-sm btn-danger" value="Tolak">
                                                            <?php echo form_close();?>
                                                        </div>
                                                    <?php }
                                            ?>
                                        </td>
                                    </tr>
                                <?php }
                            }
                        ?>
                    </tbody>
            </table>
</main> 
<script>
  $( document ).ready(function() {
        $("#calendar").zabuto_calendar({language: "en"});
        $('#table_daftar_cuti').DataTable({});
  });
</script>