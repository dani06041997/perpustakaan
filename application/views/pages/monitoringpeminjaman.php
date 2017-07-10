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
                serviceUrl: site+'/autocomplete/search',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {
                    $('#v_nim').val(''+suggestion.nim); // membuat id 'v_nim' untuk ditampilkan
                    $('#v_jurusan').val(''+suggestion.jurusan); // membuat id 'v_jurusan' untuk ditampilkan
                }
            });
        });
    </script>


<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
               
              </div>

              <div class="title_right">
             
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
				 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Peminjaman <small></small></h2>
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
										<th>kode Transaksi</th>
										<th>Nama Peminjam</th>
										<th>Tgl peminjaman</th>
										<th>jatuh tempo</th>
										<th>Judul Buku</th>
                    <th>Status</th>
									<!-- 	<th>status</th> -->
									
									</tr>
								</thead>
								<tbody>
								<?php foreach ($Monitoring_user as $key) { ?>
									<tr>
										<td><?php echo $key['fk_peminjaman'] ?></td>
										<td><?php echo $key['nama'] ?></td>
										<td><?php echo $key['tanggal_pinjam'] ?></td>
										<td><?php echo $key['jatuh_tempo'] ?></td>
										<td><?php echo $key['Judul'] ?></td>
                    <?php if($key['status']>0){ ?>
                   
                    <td><span class="label label-success pull-center">
                    Sudah Dikembalikan</span>
                    <?php }else{ ?>
                     <td><span class="label label-danger pull-center">Belum Dikembalikan</td></span>
                    
                    </td>
                    <?php } ?>
										
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
