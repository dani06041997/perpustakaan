  <?php   
  function IntervalDays($CheckIn,$CheckOut){
$CheckInX = explode("-", $CheckIn);
$CheckOutX =  explode("-", $CheckOut);
$date1 =  mktime(0, 0, 0, $CheckInX[1],$CheckInX[2],$CheckInX[0]);
$date2 =  mktime(0, 0, 0, $CheckOutX[1],$CheckOutX[2],$CheckOutX[0]);
$interval =($date2 - $date1)/(3600*24);
// returns numberofdays
return  $interval ;
}
  ?>

  <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                   
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pengembalian Buku</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <?php echo form_open('pengembalian/PengembalianFinal'); ?>
                    
                    <?php foreach ($pengembaliandetail_list as $key) { ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Peminjaman 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $key['kd_transaksi'] ?>" disabled>
                        </div>
                      </div>
                      <br><br>
                      <div style="margin-top: 5px;"  class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kode Peminjaman 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $key['fk_peminjaman'] ?>" disabled>
                        </div>
                      </div>
                        <br><br>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?php echo $key['nama'] ?>" disabled>
                        </div>
                      </div>
                       <br><br>
                        <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Peminjaman</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php    
                        $format=date('d-m-Y', strtotime($key['tanggal_pinjam']));
                        ?>
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?php echo $format ?>" disabled>
                        </div>
                      </div>
                       <br><br>
                       <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Kembali</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo date('d-m-Y') ?>" name="middle-name" disabled>
                        </div>
                      </div>
                      <?php } ?>
                      <table class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>kode Buku</th>
                    <th>Judul</th>
                    <th>jatuh tempo</th>
                    <th>terlambat</th>
                    <th>Denda</th>
                  <!--  <th>status</th> -->
                    <th>Tools</th>

                  </tr>
                </thead>
                <tbody>
                <?php   
                $a=1;

                 
                 ?>
                
                <?php foreach ($pengembalianbuku_list as $key) { ?>
                <?php   
                $Date=date('Y-m-d');
                $denda=100;     
                $b=0;    
                $param = 0;    

                $date2=$key['jatuh_tempo']; 

                $format2=date('d-m-Y', strtotime($key['jatuh_tempo']));
                $selisih=IntervalDays($date2,$Date);

                $denda=($selisih-3)*500;

                 ?>
                  <tr>
                    <td><?php  echo $a++; ?></td>
                    <td><?php echo $key['kd_buku'] ?></td>
                    <input type="hidden" name="kd_buku[]" value="<?php echo $key['kd_buku'] ?>">
                    <td><?php echo $key['Judul'] ?></td>
                    <td><?php echo $format2?></td>
                   <?php  if($selisih>3){?>
                          <td><?php echo $selisih ?> hari</td>
                          <td><?php echo $denda ?></td>
                          <input type="hidden" name="denda" value="<?php echo $denda ?>">
                          <input type="hidden" name="terlambat" value="<?php echo $selisih ?>">

                   <?php  }else{ ?>
                            <td><?php echo $b ?></td>
                            <td><?php echo $b ?></td>
                    <?php   } ?>

                    
                    <td>
                    <?php if($key['status']==1){ 
                      
                      ?>
                       <?php echo "<span class='label label-success pull-center'>Sudah Dikembalikan</span>"; ?>   
                    
                         <?php }else{
                              $param=$param+1;
                          ?> 

                                   <div class="checkbox">
                            <label>
                              <div class="icheckbox_flat-green" style="position: relative;"><input name="kembali[]" value="<?php echo $key['id'] ?>" type="checkbox" class="flat"></div> Kembalikan
                            </label>
                          </div>               
  
                          <?php  }?>
                    </td>
                  </tr>

                  <?php } ?>
                </tbody>
              </table>
                     
                      
                <?php
        if($param>0){?>
         <button type="submit" class="btn btn-success">Kembalikan</button>
     <?php } ?>

                    
                      
 <?php echo form_close(); ?>
                  </div>
                </div>
              </div>
