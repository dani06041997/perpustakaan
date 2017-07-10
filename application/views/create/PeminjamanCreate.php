<?php 
$date = date('Y-m-d');
$jatuh_tempo = date('d-m-Y', strtotime('+2 weeks', strtotime($date)));
$jatuh_tempo_hidden = date('Y-m-d', strtotime('+2 weeks', strtotime($date)));
$username = ($this->session->userdata['logged_in']['username']);
 ?>

 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

 <script type='text/javascript' src='<?php echo base_url();?>assets/js/jquery-1.8.2.min.js'></script> 
    <script type='text/javascript' src='<?php echo base_url();?>assets/js/jquery.autocomplete.js'></script>

    <!-- Memanggil file .css untuk style saat data dicari dalam filed -->
    <link href='<?php echo base_url();?>assets/js/jquery.autocomplete.css' rel='stylesheet' />

    <!-- Memanggil file .css autocomplete_ci/assets/css/default.css -->
   

    <script type='text/javascript'>
        var site = "<?php echo site_url();?>";
        $(function(){
          $('.autocomplete').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/peminjaman/search',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {
                    $('#v_judul').val(''+suggestion.judul); // membuat id 'v_nim' untuk ditampilkan
                 // membuat id 'v_jurusan' untuk ditampilkan
                }
            });
        });
    </script>

      <script type='text/javascript'>
        var site = "<?php echo site_url();?>";
        $(function(){
          $('.autocomplete_anggota').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/peminjaman/search_anggota',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {
                    $('#v_nama').val(''+suggestion.nama); // membuat id 'v_nim' untuk ditampilkan
                   // membuat id 'v_jurusan' untuk ditampilkan
                }
            });
        });
    </script>



<div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->
         
              <!-- /form input mask -->

              <!-- form color picker -->

              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">

                    <h2>Pinjam Buku</h2>
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
                     <?php echo form_open('peminjaman/create'); ?>
                  <?php echo validation_errors(); ?>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Buku</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">

                          <input style="width: 250px;" type="text"  type="search" class='form-control autocomplete no_buku' id="autocomplete1" name="no_buku" placeholder="Kode Buku" />

                        </div>
                      </div>
                      <br>
                      <div style="margin-top: 30px;" class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Judul</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <div class="input-group demo2">
                            <input style="width: 350px;" type="text" class='form-control autocomplete' id="v_judul" name="judul" />
                           
                            <input type="hidden" value="<?php echo date('Y-m-d'); ?>" class="form-control" name="tanggal_pinjam"  >
                            <input type="hidden" value="<?php echo $jatuh_tempo_hidden?>" class="form-control" name="jatuh_tempo"  >
                            <input type="hidden" value="<?php echo $username?>" class="form-control" name="admin"  >
                            <input type="hidden" value="0" class="form-control" name="status"  >
                         


                          </div>
                        </div>
                      </div>
                 

                     

                   
                          <button type="submit" class="btn btn-success">Tambah</button>
                    
 <?php echo form_close(); ?>
                
                  </div>
                </div>
              </div>


         
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Peminjaman</h2>
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
                   <?php echo form_open('peminjaman/TransaksiPeminjaman'); ?>
                  <?php echo validation_errors(); ?>
                    <br />

                    <form class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Nomer Peminjaman</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input  name="no_peminjaman" id="No_peminjaman" type="hidden" class="form-control" value="<?php echo $noauto ?>" >
                          
                          <input  name="no_peminjaman2" id="No_peminjaman2" type="text" class="form-control" value="<?php echo $noauto ?>" disabled >


                           <input type="hidden" value="<?php echo date('Y-m-d'); ?>" class="form-control" name="tanggal_pinjam"  >
                           <input type="hidden" value="<?php echo $username?>" class="form-control" name="admin"  >
                      
                        </div>
                      </div>

                      <br><br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Pinjam</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" value="<?php echo date('d-m-Y'); ?>" class="form-control" disabled >
                        </div>
                      </div>

                      <br><br>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Jatuh Tempo</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" value="<?php echo $jatuh_tempo ?>" class="form-control" disabled >
                           <input type="hidden" value="<?php echo $jatuh_tempo_hidden?>" class="form-control" name="jatuh_tempo"  >
                        
                         
                        </div>
                        
                        
                      </div>

                      <br><br>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Nim</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input  type="search" class='form-control autocomplete_anggota id_user' id="autocomplete2" name="nim">
                         
                        </div>
                      </div>
                        
                        <br><br>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Anggota</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class='form-control autocomplete ' id="v_nama" name="nama"/>
                          
                        </div>
                      </div>
                          <br><br>  
                     <button style="margin-left: 360px;" type="submit"  class="btn btn-sm btn-warning">Simpan Transaksi</button>
                     
                       <?php echo form_close(); ?>
                                         </div>
                </div>
              </div>
              <!-- /form color picker -->

              <!-- form input knob -->
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Keranjang Buku</h2>
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
                 
                   <table id="datatable-buttons" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Kode Buku</th>
                    <th>judul</th>
                    <th>Tgl peminjaman</th>
                    <th>jatuh tempo</th>
                  <!--  <th>status</th> -->
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($keranjang_list as $key) { ?>
                  <tr>
                    <td><?php echo $key['fk_buku'] ?></td>
                    <td><?php echo $key['judul'] ?></td>
                    <td><?php echo date('d M Y', strtotime( $key['tanggal_pinjam'] ));?>
                    </td>
                    <td><?php echo date('d M Y', strtotime( $key['jatuh_tempo'] ));?></td>
                  <td>
                      <a href="<?php echo site_url('peminjaman/delete/'). $key['fk_buku']?>" type="button" class="btn btn-danger" onclick="return deletechecked();">Delete</a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>

            </div>
 
                  </div>
                </div>


              </div>
              <!-- /form input knob -->
           
            </div>




            <div class="row">
              <div class="col-md-12">

                <!-- form date pickers -->
                
