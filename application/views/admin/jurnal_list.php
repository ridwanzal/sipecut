<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-xs-12 w-50">
                  <ul class="breadcrumbs">
                    <li><a href="<?php echo base_url('daftar_jurnal')?>"><span data-feather="home"></span>&nbsp;&nbsp;Home</a></li>
                    <li>Jurnal Umum</li>
                  </ul>
              </div>
          </div>
         <br/>  
          <div class="row">
              <div class="col-lg-10 col-md-10 col-xs-12">
                <button class="btn btn-sm btn-secondary" id="print_pdf">PDF</button>
              </div>
              <div class="col-lg-2 col-md-2 col-xs-12">
                  <div class="form-group">
                        <?php echo form_open_multipart('daftar_jurnal'); ?>
                        <div class="input-group">
                          <select class="form-control" id="seltype" name="tahun">
                                <option value="">-- Filter tahun -- </option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                          </select>
                          <div class="input-group-append">
                            <input class="input-group-text" type="submit" value="Filter">
                          </div>
                        </div>
                      <?php echo form_close();?>
                  </div>    
              </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="container_table_pdf">
                  <table class="table table-bordered responsive table-hover" id="table_pdf" width="100%">
                  <thead>
                      <tr style="background-color:#ffffff;">
                          <th>Tanggal</th>
                          <th>Keterangan</th>
                          <th>Reff</th>
                          <th>Debit</th>
                          <th>Kredit</th>
                      </tr>
                  </thead>        
                          <tbody>
                                  <!-- <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                  -->
                                  <?php 
                                      function rupiah($angka){
                                        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                        return $hasil_rupiah;
                                      }
                                      $check = isset($pendapatan);
                                      if($check){
                                          foreach($pendapatan as $list){?>
                                                  <tr>
                                                    <td rowspan="2"><?php echo $list->penda_tanggal; ?></td>
                                                    <td><?php echo 'Kas'; ?></td>
                                                    <td><?php echo '101'; ?></td> 
                                                    <td><?php echo $list->penda_harga; ?></td>
                                                    <td><?php echo '-' ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo 'Pendapatan' ; ?></td>
                                                    <td><?php echo '301' ?></td>
                                                    <td><?php echo '-'; ?></td>
                                                    <td><?php echo $list->penda_harga; ?></td>
                                                  </tr>
                                          <?php }?>
                                      <?php }
                                  ?>
                                  <?php 
                                      $check2 = isset($realisasi);
                                      if($check2){
                                          foreach($realisasi as $list){?>
                                                  <tr>
                                                    <td rowspan="2"><?php echo $list->real_tanggal; ?></td>
                                                    <td><?php echo $list->tipe_jurnal_nama . ' - ' . $list->real_nama . '' ;?></td>
                                                    <td><?php echo $list->tipe_jurnal;?></td>
                                                    <td><?php echo rupiah($list->real_total); ?></td>
                                                    <td><?php echo '-' ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo 'Kas' ; ?></td>
                                                    <td><?php echo '101' ?></td>
                                                    <td><?php echo '-'; ?></td>
                                                    <td><?php 
                                                    echo rupiah($list->real_total); ?></td>
                                                  </tr>
                                          <?php }?>
                                      <?php }
                                  ?>
                          </tbody>
                  </table>
                </div>
            </div>
          </div>
          <br/>
    </main> 
<script>
    $(document).ready(function(){
        $('#print_pdf').on('click', function(){
              // var doc = new jsPDF({
              //   orientation: 'landscape',
              //   unit: 'in',
              //   format: [4, 2]
              // })

              // doc.text('Hello world!', 1, 1)
              // doc.save('two-by-four.pdf')
              var doc = new jsPDF();

              var specialElementHandlers = {
                  '#editor': function(element, renderer){
                      return true;
                  }
              };
              // doc.fromHTML($('#table_pdf').get(0),15,20 , {
              //   'width': 600, 
              //   'elementHandlers': specialElementHandlers
              // });
              // doc.autoTableSetDefaults({
              //     addPageContent: function(data) {
              //       doc.text("Header", 10, 10);
              //     }
              // });
              var pageHeight = doc.internal.pageSize.height || doc.internal.pageSize.getHeight();
              var pageWidth = doc.internal.pageSize.width || doc.internal.pageSize.getWidth();
              let str = "Pemerintah Kabupaten Ogan Komering I";
              let str2 = "Dinas Pendidikan";
              let str3 = "SD Negeri Berkat 3";
              let str4 = "Alamat : Jalan Raya Desa Penyandingan Kec. SP. Padang, Kode pos : 30652";
              let str5 = "Jurnal Umum Tahun 2020"
              // let str2 = "Your footer text";
              doc.setFontSize(12);
              doc.text(str, pageWidth / 2, 10, 'center');
              doc.text(str2, pageWidth / 2, 18, 'center');
              doc.text(str3, pageWidth / 2, 26, 'center');
              doc.text(str4, pageWidth / 2, 34, 'center');
              doc.text(str5, pageWidth / 2, 42, 'center');
              // doc.text(str2, pageWidth / 2, pageHeight  - 10, 'center');
              doc.autoTable({ 
                html: '#table_pdf',
                margin: {top: 55},
              });
              doc.save('Laporan Jurnal Umum.pdf');
              doc.showHead('firstPage');  
        });
    });
    </script>
</script> 