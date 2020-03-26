<style>
</style>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-xs-12 w-50">
                  <ul class="breadcrumbs" style="position:fixed;">
                    <li><a href="<?php echo base_url()?>"><span data-feather="home"></span>&nbsp;&nbsp;Home</a></li>
                    <li><a href="<?php echo base_url()?>">Pengajuan Cuti</a></li>
                    <li>Detail Pengajuan</li>
                  </ul>
              </div>
          </div>
          <br/>
          <br/>
          <?php 
            $get_level_jabatan = $this->session->userdata('id_level_jabatan');
          ?>
          <table id="table_daftar_cuti" class="table table-striped table-bordered responsive table-hover" width="100%"> 
              <thead>
                  <tr>
                          <th>NIP</th>
                          <th>Nama Pegawai</th>
                          <th>Unit Kerja/ Bidang</th>
                          <th>Jenis Cuti</th>
                          <th>Alasan</th>
                          <th>Kakanreg</th>
                          <?php
                                if($get_level_jabatan > 2){
                                    ?>
                                        <th>Kabid/Kabag</th>
                                <?php }
                          ?>
                          <?php
                                if($get_level_jabatan > 4){
                                    ?>
                                        <th>Kasi/Kassubbag</th>
                                <?php }
                          ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                foreach($detail_pengajuan as $list){ ?>
                                     <tr>
                                        <td><?php echo $list->nip; ?></td>
                                        <td><?php echo $list->fullname; ?></td>
                                        <td><?php echo $list->nama_bidang; ?></td>
                                        <td><?php echo $list->jenis_cuti; ?></td>
                                        <td><?php echo $list->alasan; ?></td>
                                        <td><?php 
                                                if($list->status_level_satu == 0 || $list->status_level_satu == '0'){
                                                    echo '<span class="disapprove"><span data-feather="x"></span>&nbsp;Belum/ Masih diproses</span>';
                                                }else{
                                                    echo '<span class="approve"><span data-feather="check"></span>&nbsp;Disetujui</span>';
                                                }
                                            ?>
                                        </td>
                                        <?php
                                                if($get_level_jabatan > 2){
                                                    ?>
                                                        <td><?php 
                                                                if($list->status_level_dua == 0 || $list->status_level_dua == '0'){
                                                                    echo '<span class="disapprove"><span data-feather="x"></span>&nbsp;Belum/ Masih diproses</span>';
                                                                }else{
                                                                    echo '<span class="approve"><span data-feather="check"></span>&nbsp;Disetujui</span>';
                                                                }
                                                            ?>
                                                        </td>
                                                <?php }
                                        ?>
                                        <?php
                                                if($get_level_jabatan > 4){
                                                    ?>
                                                        <td><?php 
                                                                if($list->status_level_tiga == 0 || $list->status_level_tiga == '0'){
                                                                    echo '<span class="disapprove"><span data-feather="x"></span>&nbsp;Belum/ Masih diproses</span>';
                                                                }else{
                                                                    echo '<span class="approve"><span data-feather="check"></span>&nbsp;Disetujui</span>';
                                                                }
                                                            ?>
                                                        </td>

                                                <?php }
                                        ?>
                                    </tr>
                                <?php }
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