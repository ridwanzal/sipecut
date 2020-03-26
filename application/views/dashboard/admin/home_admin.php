<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-xs-12 w-50">
                  <ul class="breadcrumbs" style="position:fixed;">
                    <li><a href="<?php echo base_url()?>"><span data-feather="home"></span>&nbsp;&nbsp;Home</a></li>
                    <li>Pengelolaan Pegawai</li>
                  </ul>
              </div>
          </div>
          <br/>
          <br/>
          <a href="<?php echo base_url()?>pegawai/add"><button class="btn btn-sm btn-primary">Tambah Daftar Pegawai</button></a>
          <br/>
          <br/>
          <table id="table_daftar_cuti" class="table table-striped table-bordered responsive table-hover" width="100%"> 
                    <thead>
                        <tr>
                          <th>User ID</th>
                          <th>NIP</th>
                          <th>Username</th>
                          <th>Fullname</th>
                          <th>Unit Kerja</th>
                          <th>Email</th>
                          <th>Sisa Cuti Tahunan</th>
                          <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($userlist as $list){ ?>
                                <tr>
                                    <td><?php echo $list->user_id; ?></td>
                                    <td><?php echo $list->nip; ?></td>
                                    <td><?php echo $list->username; ?></td>
                                    <td><?php echo $list->fullname; ?></td>
                                    <td><?php echo $list->nama_bidang; ?></td>
                                    <td><?php 
                                        if($list->email == ''){
                                            echo '-'; 
                                        }else{
                                            echo $list->email; 
                                        }
                                            
                                    ?></td>
                                    <td><?php echo $list->sisa_cuti_tahunan; ?></td>
                                    <td><a href="#">Lihat detail</a></td>
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