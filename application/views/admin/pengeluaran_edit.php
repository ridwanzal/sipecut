<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <?php echo form_open_multipart('pengeluaran/submit_update_rencana_pengeluaran'); ?>
        <div class="row">
              <div class="col-lg-6 col-md-6 col-xs-12 w-50">
                  <ul class="breadcrumbs">
                    <li><a href="<?php echo base_url('daftar_pendapatan')?>"><span data-feather="home"></span>&nbsp;&nbsp;Home</a></li>
                    <li>Tambah Rencana Pengeluaran</li>
                  </ul>
              </div>
          </div>
          <br/>
          <br/>
        <h6 style="margin-bottom:20px;">Tambah Menu Rencana Pengeluaran</h6>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
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
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <div class="form-group">
                                  <label>Nama Barang</label>
                                  <input type="hidden" placeholder="Silahkan input nama dana" name="penge_id" class="form-control" id="judul" value="<?php echo $pengeluaran[0]->penge_id?>" required>
                                  <input type="text" placeholder="Silahkan input nama dana" name="nama_barang" class="form-control" id="judul" value="<?php echo $pengeluaran[0]->penge_nama?>" required>
                              </div>    
                            </div>
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <div class="form-group">
                                  <label>Harga</label>
                                  <input type="text" placeholder="Silahkan input harga" name="harga" id="harga" onchange="sumdata();" class="form-control" id="judul"  value="<?php echo $pengeluaran[0]->penge_harga?>"  required>
                              </div>    
                            </div>
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <div class="form-group">
                                    <label for="seltype">Pilih Tipe Rencana</label>
                                    <select class="form-control" id="seltype" name="tipe_rencana"  value="<?php echo $pengeluaran[0]->penge_tipe?>"  required>
                                        <?php
                                          foreach($tipe_pengeluaran as $list){
                                            ?>
                                              <option value="<?php echo $list->id?>"><?php echo $list->id .' - ' .$list->nama?></option>
                                          <? }
                                        ?>
                                    </select>
                              </div>    
                            </div>
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <div class="form-group">
                                    <label for="seltype">Pilih Tipe Jurnal</label>
                                    <select class="form-control" id="seltype1" name="tipe_jurnal" required>
                                        <option value="102">Pembelian</option>
                                        <option value="103">Perlengkapan</option>
                                        <option value="104">Peralatan</option>
                                        <option value="105">Beban</option>
                                    </select>
                              </div>    
                            </div>
                            <div class="col-lg-12 col-md-12 col-xs-12" id="beban_detail" style="display:none;">
                              <div class="form-group">
                                    <label for="seltype">Pilih Detail Beban</label>
                                    <select class="form-control" id="seltype2" name="tipe_jurnal_ext">
                                        <option value="">Silahkan pilih detail beban</option>
                                        <option value="Beban Serba Serbi">Beban Serba Serbi</option>
                                        <option value="Beban Material">Beban Material</option>
                                        <option value="Beban Listrik">Beban Listrik</option>
                                        <option value="Beban PDAM">Beban PDAM</option>
                                        <option value="Beban Gaji">Beban Gaji</option>
                                        <option value="Beban Konsumsi">Beban Konsumsi</option>
                                        <option value="Beban Servis">Beban Gaji</option>
                                        <option value="Beban Bahan Bakar">Beban Bahan Bakar</option>
                                    </select>
                              </div>    
                            </div>
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <div class="form-group">
                                  <label>Jumlah</label>
                                  <input type="number" placeholder="Silahkan input harga" name="jumlah" id="jumlah" onchange="sumdata();" class="form-control" id="judul"  value="<?php echo $pengeluaran[0]->penge_jumlah?>"  required>
                              </div>    
                            </div>
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <div class="form-group">
                                  <label>Total</label>
                                  <input type="number" placeholder="Silahkan input harga" name="total" id="total" ="sumdata();" class="form-control" id="judul"  value="<?php echo $pengeluaran[0]->penge_total?>"  required>
                              </div>    
                            </div>
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <div class="form-group">
                                  <label>Keterangan</label>
                                  <input type="text" placeholder="Silahkan input harga" name="keterangan" class="form-control" id="judul"  value="<?php echo $pengeluaran[0]->penge_ket?>">
                              </div>    
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12">
                              <div class="form-group">
                                  <label>Tanggal</label>
                                  <input type="date" name="tanggal" class="form-control"  value="<?php echo $pengeluaran[0]->penge_tanggal?>" required>
                              </div>    
                            </div>
                        </div>
                        <input type="submit" value="Simpan" class="btn btn-sm btn-success" style="width:200px;" name="submit1" id="submit_pdpt"/> 
                  <?php echo form_close();?>
              </div>
            </div>
          </div>
        <br/>

      <!-- Tab panes -->

    </main> 
    <script>
      $(document).ready(function(){
          seltype1 = $('#seltype1');
          seltype1.on('change', function(){
              value = $(this).val();
              if(value == 105 || value == "105"){
                $('#beban_detail').fadeIn();
              }else{
                $('#beban_detail').fadeOut();
              }
          });
      });
      
      function sumdata(){
        let harga = $('#harga').val();
        let jumlah = $('#jumlah').val();
        let total = $('#total').val();
        
        let result = parseFloat(harga) * parseFloat(jumlah);
        if(!isNaN(result)){
          $('#total').val(result);
        }
      }
    </script>