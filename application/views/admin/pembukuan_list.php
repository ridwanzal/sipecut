<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-xs-12 w-50">
                  <ul class="breadcrumbs">
                    <li><a href="<?php echo base_url('daftar_pembukuan')?>"><span data-feather="home"></span>&nbsp;&nbsp;Home</a></li>
                    <li>Buku Besar</li>
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
                        <?php echo form_open_multipart('daftar_pembukuan'); ?>
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
                <h4>Kas</h4>
                <table id="table1" class="table table-bordered responsive table-hover" width="100%">
                <thead>
                    <tr style="background-color:#ffffff;">
                        <th>Tanggal</th>
                        <th>Debit</th>
                        <th>Tanggal</th>
                        <th>Kredit</th>
                    </tr>
                </thead>        
                        <tbody>
                                 <?php 
                                    function rupiah($angka){
                                        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                        return $hasil_rupiah;
                                    }
                                    $check = isset($pembukuan_kas);
                                    if($check){
                                        $i = 0;
                                        $total_kredit = 0;
                                        $total_uang = 0;
                                        foreach($pembukuan_kas as $list){
                                            $i++;
                                            $total_kredit =  $total_kredit  + $list->real_total;
                                            $total_uang = $list->penda_harga;
                                            ?>
                                                <tr>
                                                <td><?php 
                                                            if($i > 1){
                                                                echo ""; 
                                                            }else{
                                                                echo $list->penda_tanggal;
                                                            }
                                                        ?>
                                                  </td>
                                                  <td><?php 
                                                            if($i > 1){
                                                                echo ""; 
                                                            }else{
                                                                echo rupiah($list->penda_harga);
                                                            }
                                                        ?>
                                                  </td>
                                                  <td><?php echo $list->real_tanggal; ?></td>
                                                  <td><?php echo rupiah($list->real_total); ?></td>
                                                </tr>
                                        <?php }?>
                                    <?php }else{
                                        ?>
                                            <tr></tr>
                                        <?php
                                    }
                                    ?>
                                    <tr style="background-color:#f9f9f9;">   
                                       <td>Total</td>
                                       <td><?php echo rupiah($total_uang); ?></td>
                                       <td><?php echo rupiah($total_kredit); ?></td>
                                       <td></td>
                                    </tr>
                                    <tr style="background-color:#efefef;">   
                                       <td>Sisa Saldo</td>
                                       <td colspan=3> <?php 
                                           $sisa_saldo = $total_uang - $total_kredit;
                                           echo ''.rupiah($sisa_saldo); ?></td>
                                    </tr>
                        </tbody>
                </table>

                <br/>

                <h4>Penjualan</h4>
                <table id="table1" class="table table-bordered responsive table-hover" width="100%">
                <thead>
                    <tr style="background-color:#ffffff;">
                        <th>Tanggal</th>
                        <th>Debit</th>
                        <th>Tanggal</th>
                        <th>Kredit</th>
                    </tr>
                </thead>        
                        <tbody>
                                 <?php 
                                    $check = isset($pembukuan_kas);
                                    if($check){
                                        $i = 0;
                                        $total_kredit = 0;
                                        $total_uang = 0;
                                        foreach($pembukuan_kas as $list){
                                            $i++;
                                            $total_kredit =  $total_kredit  + $list->real_total;
                                            $total_uang = $list->penda_harga;
                                            ?>
                                                <tr>
                                                <td><?php 
                                                            if($i > 1){
                                                                echo ""; 
                                                            }else{
                                                                echo $list->penda_tanggal;
                                                            }
                                                        ?>
                                                  </td>
                                                  <td><?php 
                                                            if($i > 1){
                                                                echo ""; 
                                                            }else{
                                                                echo rupiah($list->penda_harga);
                                                            }
                                                        ?>
                                                  </td>
                                                  <td><?php echo $list->real_tanggal; ?></td>
                                                  <td><?php echo rupiah($list->real_total); ?></td>
                                                </tr>
                                        <?php }?>
                                    <?php }else{
                                        ?>
                                            <tr></tr>
                                        <?php
                                    }
                                    ?>
                                    <tr style="background-color:#f9f9f9;">   
                                       <td>Total</td>
                                       <td><?php echo rupiah($total_uang); ?></td>
                                       <td><?php echo rupiah($total_kredit); ?></td>
                                       <td></td>
                                    </tr>
                                    <tr style="background-color:#efefef;">   
                                       <td>Sisa Saldo</td>
                                       <td colspan=3> <?php 
                                           $sisa_saldo = $total_uang - $total_kredit;
                                           echo ''.rupiah($sisa_saldo); ?></td>
                                    </tr>
                        </tbody>
                </table>
            </div>
          </div>
          <hr/> <!-- -->
          <br/>  
          <div class="row">
            <div class="col-lg-12 col-md-12">
                <h4>Peralatan</h4>
                <table id="table2" class="table table-bordered responsive" width="100%">
                <thead>
                    <tr style="background-color:#ffffff;">
                        <th>Tanggal</th>
                        <th>Debit</th>
                        <th>Tanggal</th>
                        <th>Kredit</th>
                    </tr>
                </thead>        
                        <tbody>
                                 <?php 
                                    $check2 = isset($pembukuan_peralatan);
                                    if($check2){
                                        $i = 0;
                                        $total_debit = 0;
                                        foreach($pembukuan_peralatan as $list2){
                                            $i++;
                                            $total_debit =  $total_debit  + $list->real_total;
                                            ?>
                                                <tr>
                                                  <td><?php echo $list->penda_tanggal; ?></td>
                                                  <td><?php echo rupiah($list->real_total); ?></td>
                                                  <td><?php echo $list->real_tanggal; ?></td>
                                                  <td><?php echo '-'; ?></td>
                                                </tr>
                                        <?php }?>
                                    <?php }
                                 ?>
                                 <tr style="background-color:#f9f9f9;">   
                                    <td>Total</td>
                                    <td><?php echo rupiah($total_debit);?></td>
                                    <td><?php echo "" ?></td>
                                    <td></td>
                                 </tr>
                                 <tr style="background-color:#efefef;">   
                                    <td>Sisa Saldo</td>
                                    <td colspan=3>  <?php 
                                        $sisa_saldo = $total_debit;
                                        echo ''.rupiah($sisa_saldo); ?>
                                        </td>
                                 </tr>
                        </tbody>
                </table>
            </div>
          </div>
          <hr/> <!-- -->
          <br/>  
          <div class="row">
            <div class="col-lg-12 col-md-12">
                <h4>Pembelian</h4>
                <table id="table3" class="table table-bordered responsive" width="100%">
                <thead>
                    <tr style="background-color:#ffffff;">
                        <th>Tanggal</th>
                        <th>Debit</th>
                        <th>Tanggal</th>
                        <th>Kredit</th>
                    </tr>
                </thead>        
                        <tbody>
                                 <?php 
                                    $check3 = isset($pembukuan_pembelian);
                                    if($check3){
                                        $i = 0;
                                        $total_debit = 0;
                                        foreach($pembukuan_pembelian as $list){
                                            $i++;
                                            $total_debit =  $total_debit  + $list->real_total;
                                            ?>
                                                <tr>
                                                  <td><?php echo $list->penda_tanggal; ?></td>
                                                  <td><?php echo rupiah($list->real_total); ?></td>
                                                  <td><?php echo $list->real_tanggal; ?></td>
                                                  <td><?php echo '-'; ?></td>
                                                </tr>
                                        <?php }?>
                                    <?php }
                                 ?>
                                 <tr style="background-color:#f9f9f9;">   
                                    <td>Total</td>
                                    <td><?php echo rupiah($total_debit);?></td>
                                    <td><?php echo "" ?></td>
                                    <td></td>
                                 </tr>
                                 <tr style="background-color:#efefef;">   
                                    <td>Sisa Saldo</td>
                                    <td colspan=3> 
                                            <?php 
                                            $sisa_saldo = $total_debit;
                                            echo ''.rupiah($sisa_saldo); ?>
                                        </td>
                                 </tr>
                        </tbody>
                </table>
            </div>
          </div>
          <hr/> <!-- -->
          <br/>  
          <div class="row">
            <div class="col-lg-12 col-md-12">
                <h4>Beban</h4>
                <table id="table4" class="table table-bordered responsive" width="100%">
                <thead>
                    <tr style="background-color:#ffffff;">
                        <th>Tanggal</th>
                        <th>Debit</th>
                        <th>Tanggal</th>
                        <th>Kredit</th>
                    </tr>
                </thead>        
                        <tbody>
                                 <?php 
                                    $check4 = isset($pembukuan_beban);
                                    if($check4){
                                        $i = 0;
                                        $total_debit = 0;
                                        foreach($pembukuan_beban as $list){
                                            $i++;
                                            $total_debit =  $total_debit  + $list->real_total;
                                            ?>
                                                <tr>
                                                  <td><?php echo $list->penda_tanggal; ?></td>
                                                  <td><?php echo rupiah($list->real_total); ?></td>
                                                  <td><?php echo $list->real_tanggal; ?></td>
                                                  <td><?php echo '-'; ?></td>
                                                </tr>
                                        <?php }?>
                                    <?php }
                                 ?>
                                 <tr style="background-color:#f9f9f9;">   
                                    <td>Total</td>
                                    <td><?php echo rupiah($total_debit);?></td>
                                    <td><?php echo "" ?></td>
                                    <td></td>
                                 </tr>
                                 <tr style="background-color:#efefef;">   
                                    <td>Sisa Saldo</td>
                                    <td colspan=3> 
                                        <?php 
                                            $sisa_saldo = $total_debit;
                                            echo ''.rupiah($sisa_saldo); ?>
                                        </td>
                                 </tr>
                        </tbody>
                </table>
            </div>
          </div>
          <hr/> <!-- -->
          <br/>  
          <div class="row">
            <div class="col-lg-12 col-md-12">
                <h4>Perlengkapan</h4>
                <table id="table5" class="table table-bordered responsive" width="100%">
                <thead>
                    <tr style="background-color:#ffffff;">
                        <th>Tanggal</th>
                        <th>Debit</th>
                        <th>Tanggal</th>
                        <th>Kredit</th>
                    </tr>
                </thead>        
                        <tbody>
                                 <?php 
                                    $check5 = isset($pembukuan_perlengkapan);
                                    if($check5){
                                        $i = 0;
                                        $total_debit = 0;
                                        foreach($pembukuan_perlengkapan as $list){
                                            $i++;
                                            $total_debit =  $total_debit  + $list->real_total;
                                            ?>
                                                <tr>
                                                  <td><?php echo $list->penda_tanggal; ?></td>
                                                  <td><?php echo rupiah($list->real_total); ?></td>
                                                  <td><?php echo $list->real_tanggal; ?></td>
                                                  <td><?php echo '-'; ?></td>
                                                </tr>
                                        <?php }?>
                                    <?php }
                                 ?>
                                 <tr style="background-color:#f9f9f9;">   
                                    <td>Total</td>
                                    <td><?php echo rupiah($total_debit);?></td>
                                    <td><?php echo "" ?></td>
                                    <td></td>
                                 </tr>
                                 <tr style="background-color:#efefef;">   
                                    <td>Sisa Saldo</td>
                                    <td colspan=3> 
                                        <?php 
                                            $sisa_saldo = $total_debit;
                                            echo ''.rupiah($sisa_saldo); ?>
                                        </td>
                                 </tr>
                        </tbody>
                </table>
            </div>
          </div>
    </main> 
<script>
  $( document ).ready(function() {
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
            doc.text("Kas", pageWidth / 2, 55, 'center');
            var res = doc.autoTableHtmlToJson(document.getElementById('table1'));
            doc.autoTable(res.columns, res.data, {margin: {top: 65}});
            doc.text("Peralatan", pageWidth / 2, doc.lastAutoTable.finalY + 15, 'center');
            var res2 = doc.autoTableHtmlToJson(document.getElementById('table2'));
            doc.autoTable(res2.columns, res2.data, {
                startY: doc.lastAutoTable.finalY + 20
            });
            doc.text("Pembelian", pageWidth / 2, doc.lastAutoTable.finalY + 15, 'center');
            var res3 = doc.autoTableHtmlToJson(document.getElementById('table3'));
            doc.autoTable(res3.columns, res3.data, {
                startY: doc.lastAutoTable.finalY + 20
            });
            doc.text("Beban", pageWidth / 2, doc.lastAutoTable.finalY + 15, 'center');
            var res4 = doc.autoTableHtmlToJson(document.getElementById('table4'));
            doc.autoTable(res4.columns, res4.data, {
                startY: doc.lastAutoTable.finalY + 20
            });
            doc.text("Perlengkapan", pageWidth / 2, doc.lastAutoTable.finalY + 15, 'center');
            var res5 = doc.autoTableHtmlToJson(document.getElementById('table5'));
            doc.autoTable(res5.columns, res5.data, {
                startY: doc.lastAutoTable.finalY + 20
            });
              doc.save('Laporan Buku Besar.pdf');
              doc.showHead('firstPage');  
        });
  });
</script>