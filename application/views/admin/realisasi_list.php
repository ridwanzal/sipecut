<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-xs-12 w-50">
                  <ul class="breadcrumbs">
                    <li><a href="<?php echo base_url('daftar_realisasi')?>"><span data-feather="home"></span>&nbsp;&nbsp;Home</a></li>
                    <li>Daftar Realisasi</li>
                  </ul>
              </div>
          </div>
          <br/>
          <br/>
          <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12">
              <?php
                  if($this->session->userdata('role') == "admin"){
                  ?>
                    <button onclick="window.location.href='<?php echo base_url('realisasi');?>' " class="btn btn-sm btn-primary"><span data-feather="plus"></span>&nbsp;&nbsp;Tambah Item Realisasi</a>
                  <?php } 
              ?>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12 float-right">
              <div class="form-group">
                    <?php echo form_open_multipart('realisasi/daftar_realisasi'); ?>
                    <div class="input-group">
                      <select class="form-control" id="seltype" name="tahun">
                            <option value="">-- Filter tahun -- </option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                      </select>
                      <select class="form-control" id="seltype" name="tipe_rencana">
                            <option value="">-- Filter tipe -- </option>
                            <option value="1001">1001 - Belanja Habis Pakai</option>
                            <option value="1002">1002 - Belanja Aset Tetap Modal Lain</option>
                            <option value="1003">1003 - Belanja Bahan Material</option>
                            <option value="1004">1004 - Belanja Cetak dan Pengadaan</option>
                            <option value="1005">1005 - Belanja Jasa Kantor</option>
                            <option value="1006">1006 - Belanja Makan dan Minum</option>
                            <option value="1007">1007 - Belanja Pemeliharaan</option>
                            <option value="1008">1008 - Belanja Peralatan dan Mesin</option>
                            <option value="1009">1009 - Belanja Pemeliharaan Kendaraan</option>
                            <option value="1010">1010 - Belanja Perjalanan Dinas</option>
                        </select>
                      <div class="input-group-append">
                        <input class="input-group-text" type="submit" value="Filter">
                      </div>
                    </div>
                  <?php echo form_close();?>
              </div>    
            </div>
            <!-- <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="form-group">
                      <?php echo form_open_multipart('realisasi/daftar_realisasi'); ?>
                      <div class="input-group mb-3">
                          <select class="form-control" id="seltype" name="tahun" required>
                              <option value="">-- Filter rencana berdasarkan tahun -- </option>
                              <option value="2020">2020</option>
                              <option value="2021">2021</option>
                              <option value="2022">2022</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                          </select>
                          <div class="input-group-append">
                            <input class="btn btn-outline-secondary" type="submit" value="Filter">
                          </div>
                      </div>
                    <?php echo form_close();?>
                </div>    
              </div>
              <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="form-group">
                      <?php echo form_open_multipart('realisasi/daftar_realisasi'); ?>
                      <div class="input-group mb-3">
                          <select class="form-control" id="seltype" name="tipe_rencana" required>
                              <option value="">-- Filter rencana berdasarkan tipe -- </option>
                              <option value="1001">1001 - Belanja Habis Pakai</option>
                              <option value="1002">1002 - Belanja Aset Tetap Modal Lain</option>
                              <option value="1003">1003 - Belanja Bahan Material</option>
                              <option value="1004">1004 - Belanja Cetak dan Pengadaan</option>
                              <option value="1005">1005 - Belanja Jasa Kantor</option>
                              <option value="1006">1006 - Belanja Makan dan Minum</option>
                              <option value="1007">1007 - Belanja Pemeliharaan</option>
                              <option value="1008">1008 - Belanja Peralatan dan Mesin</option>
                              <option value="1009">1009 - Belanja Pemeliharaan Kendaraan</option>
                              <option value="1010">1010 - Belanja Perjalanan Dinas</option>
                          </select>
                          <div class="input-group-append">
                            <input class="btn btn-outline-secondary" type="submit" value="Filter">
                          </div>
                      </div>
                    <?php echo form_close();?>
                </div>    
              </div> -->
          </div>
          <br/>
          
          <div class="row">
            <div class="col-lg-12 col-md-12">
                <table id="t_pengeluaran" class="table table-striped table-bordered responsive table-hover" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nomor Referensi</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Keterangan</th>
                        <th>Tipe</th>
                        <th>Tanggal</th>
                        <th>Upload Bukti</th>
                        <?php
                          if($this->session->userdata('role') == "admin"){
                              ?>
                                  <th>Aksi</th>
                              <?php }   
                        ?>
                    </tr>
                </thead>        
                        <tbody>
                            <?php if(isset($daftar_realisasi)) {
                              $total = 0;
                              ?>
                            <?php foreach($daftar_realisasi as $list) { 
                                $total = $total + $list->real_total;
                              ?>
                                <tr>
                                  <td><?php echo $list->real_id; ?></td>
                                  <td><?php echo $list->real_tipe;echo $list->penge_id; ?></td>
                                  <td><?php echo $list->real_nama; ?></td>
                                  <td><?php echo $list->real_harga; ?></td>
                                  <td title="<?php echo $list->real_jumlah;?>"><?php echo $list->real_jumlah; ?></td>
                                  <td><?php echo $list->real_total; ?></td>
                                  <td><?php 
                                        if($list->real_ket == null | $list->real_ket == ""){
                                          echo '-';
                                        }else{
                                          echo $list->real_ket;
                                        }
                                      ?>
                                  </td>
                                  <td><?php echo $list->real_tipe; ?></td>
                                  <td><?php echo $list->real_tanggal; ?></td>
                                  <td><img style="cursor" width="100" src='<?php echo base_url('assets/image_proof/'.$list->real_image_proof);?>'></td>
                                  <?php
                                    if($this->session->userdata('role') == "admin"){
                                      ?>
                                      <td>
                                            <button onclick="window.location.href='<?php echo base_url('realisasi_update/'.$list->real_id);?>' " class="btn btn-sm btn-success">Edit</a>
                                            <button onclick="window.location.href='<?php echo base_url('realisasi_delete/'.$list->real_id);?>' " class="btn btn-sm btn-danger" style="margin-left:10px;">Hapus</a>
                                      </td>
                                        <?php }   
                                  ?>
                                </tr>
                                <?php } ?> 
                            <?php } ?>
                              <tr>
                                  <td>Total : </td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td>
                                  <?php 
                                    function rupiah($angka){
                                      $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                      return $hasil_rupiah;
                                    }
                                    echo '<b>'.rupiah($total) .'</b>';?></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <?php
                                    if($this->session->userdata('role') == "admin"){
                                        ?>
                                            <td>
                                            </td>
                                        <?php }   
                                  ?>
                              </tr>
                        </tbody>
                </table>
            </div>
          </div>
    </main> 
<script>
  $( document ).ready(function() {
        // $('#t_pengeluaran').DataTable({
        //   "responsive" : true,
        // });
 
        // $('#t_pengeluaran').DataTable({
        //   "responsive" : true,
        //   "dom": 'Bfrtip',
        //   "buttons": [
        //       'excel', 'pdf', 'print'
        //   ],
        //   "pagingType": "full_numbers",
        //   "paging": true,
        //   "lengthMenu": [10, 25, 50, 75, 100],
        // });       

        $('#t_pengeluaran').DataTable({
          "dom": 'Bfrtip',
          "buttons": [
            {
                extend: 'pdfHtml5',
                title : 'Pemerintah Kabupaten Ogan Komering Ilir',
                filename : 'Laporan Realisasi',
                orientation: 'portrait',
                autowidth: 'true',
                pageSize : 'A4',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7,8]
                },
                customize: function ( doc ) {
                    // Splice the image in after the header, but before the tabl
                    doc.defaultStyle.fontSize = 9,
                    doc.styles.tableHeader.fontSize = 9,
                    doc.styles.title.fontSize = 14,
                    doc.content[0].text = doc.content[0].text.trim(),
                    doc.pageMargins = [80,80,80,80],
                    doc.content.splice( 1, 0, 
                        {
                          margin: [ 0, 0, 0, 2  ],
                          alignment: 'center',
                          text : 'Dinas Pendidikan'
                        }
                    ),
                    doc.content.splice( 2, 0, 
                        { 
                          margin: [ 0, 0, 0, 2  ],
                          alignment: 'center',
                          text : 'SD Negeri Berkat 3'
                        }
                    ),
                    doc.content.splice( 3, 0, 
                        {
                          margin: [ 0, 0, 0, 20  ],
                          alignment: 'center',
                          text : 'Alamat : Jalan Raya Desa Penyandingan Kec. SP. Padang, Kode pos : 30652'
                        }
                    ),
                    doc.content.splice(4, 0, 
                        {
                          margin: [ 0, 0, 0, 25  ],
                          alignment: 'center',
                          text : 'Laporan Realisasi Tahun 2020'
                        }
                    )
                    // Data URL generated by http://dataurl.net/#dataurlmaker
                }

            }
          ],
          "pagingType": "full_numbers",
          "paging": true,
          "lengthMenu": [10, 25, 50, 75, 100],
        });
  });
</script>