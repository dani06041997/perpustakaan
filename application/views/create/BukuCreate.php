<script type='text/javascript' src='<?php echo base_url();?>assets/js/jquery-1.8.2.min.js'></script> 
    <script type='text/javascript' src='<?php echo base_url();?>assets/js/jquery.autocomplete.js'></script>

    <link href='<?php echo base_url();?>assets/js/jquery.autocomplete.css' rel='stylesheet' />
   

    <script type='text/javascript'>
        var site = "<?php echo site_url();?>";
        $(function(){
          $('.autocomplete').autocomplete({
                serviceUrl: site+'/buku/search',
                onSelect: function (suggestion) {
                    $('#v_judul').val(''+suggestion.judul); 
                }
            });
        });
    </script>

     <script type='text/javascript'>
        var site = "<?php echo site_url();?>";
        $(function(){
          $('.autocomplete_penerbit').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/buku/search_penerbit',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {
                    $('#v_nama').val(''+suggestion.nama); // membuat id 'v_nim' untuk ditampilkan
                   // membuat id 'v_jurusan' untuk ditampilkan
                }
            });
        });
    </script>

<div class="right_col" role="main">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tambah Buku <small></small></h2>
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
					<?php echo form_open('buku/create'); ?>
							<?=$this->session->flashdata('pesan')?>
								<?php echo validation_errors(); ?>

								<div class="form-group">
									<label for="">No Buku</label>
									<input type="text" class="form-control" id="no" name="no" placeholder="No Buku">
								</div>
								<div class="form-group">
									<label for="">Judul</label>
									<input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Buku">
								</div>
								<div class="form-group">
									<label for="">Kategori</label>
                        

                         <input type="text"  type="search" class='form-control autocomplete no_buku' id="autocomplete1" name="no_buku" placeholder="Kategori" />
                         <input type="hidden" style="width: 350px;" type="text" class='form-control autocomplete' id="v_judul" name="kategori" />
							
								
								<div class="form-group">
									<label for="">Penerbit</label>
									
                          <input  type="search" class='form-control autocomplete_penerbit penerbit' id="autocomplete2" name="penerbit" placeholder="penerbit">
								</div>
								

                <div class="form-group">
									<label for="">Penulis</label>
									<input type="text" class="form-control" id="penulis" name="penulis" placeholder="penulis">
								</div>


								<div class="form-group">
									<label for="">Copy </label>
									<input type="text" class="form-control" id="stok" name="copy" placeholder="copy">
								</div>
								
							
								
							
								<button type="submit" class="btn btn-primary">Submit</button>
					<?php echo form_close(); ?>
					</div>
					</div>
					</div>

</div>