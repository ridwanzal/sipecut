<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="row">
              <div class="col-lg-12 col-md-12 col-xs-12 w-50">
                  <ul class="breadcrumbs">
                    <li><a href="<?php echo base_url('daftar_pendapatan')?>"><span data-feather="home"></span>&nbsp;&nbsp;Home</a></li>
                    <li><a href="<?php echo base_url('daftar_pengeluaran')?>">Daftar Rencana Pengeluaran</a></li>
                    <li>Tambah Tipe Rencana Pengeluaran</li>
                  </ul>
              </div>
          </div>
          <br/>
          <br/>
        <h6 style="margin-bottom:20px;">Tambah Menu Rencana Pengeluaran</h6>
          <div class="row">
            <div class="col-md-6 col-lg-6 col-xs-12">
              <div class="card">
                <div class="card-body">
                <?php echo form_open('pengeluaran/submit_pengeluaran_tipe'); ?> 
                        <?php
                            if($this->session->flashdata('message')){ ?>
                                <div class="alert alert-success alert-dismissible"><?php echo $this->session->flashdata('message') ?>
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                </div>
                                <?php    }else if($this->session->flashdata('error')){ ?>
                                    <div class="alert alert-danger alert-dismissible"><?php echo $this->session->flashdata('error') ?>
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                </div>
                                    <?php
                                }
                        ?>
                          <div class="row">
                              <div class="col-lg-12 col-md-12 col-xs-12">
                              <div class="form-group">
                                  <label>Nama Tipe</label>
                                  <input type="text" placeholder="Silahkan masukkan tipe rencana pengeluaran" name="nama_tipe" class="form-control" id="nama_tipe" required>
                              </div>    
                            </div>
                        </div>
                        <input type="submit" value="Tambah" class="btn btn-sm btn-success" style="width:200px;" name="submit1" id="submit_tipe"/> 
                  <?php echo form_close();?>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-xs-12">
              <div class="card">
                <div class="card-body">
                  <ul class="list-group list-group-flush"  style="height:630px;overflow-y:scroll;">
                      <?php if(isset($daftar_tipe)) {
                        foreach($daftar_tipe as $list){
                          ?> 
                            <li class="list-group-item"><?php echo $list->id .' - ' .$list->nama; ?>&nbsp;
                            <!-- <?php echo form_open('edittipe_pengeluaran'); ?>
                              <input type="submit" value="Delete" class="btn btn-sm btn-danger float-right" style="margin-left:20px;width:60px;" id="sedit_tipe2"/>
                            <?php echo form_close();?> -->
                            <?php echo form_open('edittipe_pengeluaran'); ?>
                              <input type="hidden" name="id_tipe" value="<?php echo $list->id;?>"/>
                              <input type="hidden" name="nama_tipe" value="<?php echo $list->nama;?>"/>
                              <input value="Edit" type="submit" class="btn btn-sm btn-primary float-right" style="width:60px;" id="sedit_tipe"/>
                              <?php echo form_close();?>
                            </li>
                          <?php
                        }
                      }?>
                  </ul>
              </div>
            </div>
          </div>
        <br/>
    </main> 
