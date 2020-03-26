<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="row">
              <div class="col-lg-12 col-md-12 col-xs-12 w-50">
                  <ul class="breadcrumbs">
                    <li><a href="<?php echo base_url('daftar_pendapatan')?>"><span data-feather="home"></span>&nbsp;&nbsp;Home</a></li>
                    <li><a href="<?php echo base_url('daftar_pengeluaran')?>">Daftar Rencana Pengeluaran</a></li>
                    <li><a href="<?php echo base_url('tipe_pengeluaran')?>">Tambah Tipe Rencana Pengeluaran</a></li>
                    <li>Edit Tipe Rencana Pengeluaran</li>
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
                  <?php echo form_open('pengeluaran/submit_pengeluaran_tipeedit'); ?>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12">
                             <div class="form-group">
                                  <label>Id Tipe</label>
                                  <input type="text" readonly value="<?php echo $id_tipe;?>" placeholder="Silahkan masukkan tipe rencana pengeluaran" name="id_tipe2" class="form-control" id="nama_tipe">
                              </div>
                              <div class="form-group">
                                  <label>Nama Tipe</label>
                                  <input type="text" value="<?php echo $nama_tipe;?>" placeholder="Silahkan masukkan tipe rencana pengeluaran" name="nama_tipe2" class="form-control" id="nama_tipe">
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
                  <ul class="list-group list-group-flush">
                      <?php if(isset($daftar_tipe)) {
                        foreach($daftar_tipe as $list){
                          ?> 
                            <li class="list-group-item"><?php echo $list->id .' - ' .$list->nama; ?>&nbsp;
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
