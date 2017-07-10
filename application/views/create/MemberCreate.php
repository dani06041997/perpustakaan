  <link href="<?php echo base_url('') ?>assets2/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('') ?>assets2/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('') ?>assets2/nprogress/nprogress.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('') ?>assets2/build/css/custom.min.css" rel="stylesheet">
    <?php echo form_open_multipart ('member/create'); ?>
        <?php echo validation_errors(); ?>
<form class="form-horizontal form-label-left" novalidate>
<div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tambah Member </h2>
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
                    

                      <div class="item form-group">
                  <label for="">Nim</label>
                  <input type="tel" class="form-control" id="no" name="nim" placeholder="Nim" required="required" data-validate-length-range="8,20">

                </div>
                <div class="item form-group">
                  <label for="">Nama </label>
                   <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nama" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
                </div>
          
                
                <div class="item form-group">
                  <label for="">Alamat</label>
                  <textarea placeholder="Alamat" name="alamat"  class="form-control" required="required"></textarea>
                 
                </div>
                <div class="item form-group">
                        <label for="">No Telp</label>
                          <input type="text" name="no_telp" class="form-control" data-inputmask="'mask' : '(999) 999-999-999'" data-validate-length-range="8,20" required="required">
                      </div>

                <div class="form-group">
                  <label for="">Foto </label>
                 <input type="file" name="userfile" size="20">
                </div>
                      <div class="ln_solid"></div>

                      

                   
                  </div>
                </div>
              </div>
              <!-- /form input mask -->

              <!-- form color picker -->
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2></h2>
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
                   
                  <div class="item form-group">
                  <label for="">Email </label>
                  <input type="email" class="form-control" id="judul" name="email" placeholder="anonymous@gmail.com" required="required">
                </div>
                    <div class="form-group">
                  <label for="">Tanggal Lahir </label>
                  <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                <input name="tgl_lahir" style="margin-left: -10px;" type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="First Name" aria-describedby="inputSuccess2Status4">

                                <span style="margin-left: -10px;" class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                              </div>
                </div>
                <div class="item form-group">
                  <label for="">Username  </label>
                  <input type="text" class="form-control" id="stok" name="username" placeholder="Username" required="required" data-validate-length-range="6,15" >
                </div>
                <div class="item form-group">
                  <label for="">Password </label>
                   <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
                   <input type="hidden" name="level" value="user">
                </div>

                <div class="item form-group">
                  <label for="">Konfirmasi Password </label>
                  <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                </div>

                <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                                     </div>
                </div>
              </div>
              <!-- /form color picker -->

              <!-- form input knob -->
              
            </div>

 </form>
 <?php echo form_close(); ?>


            <div class="row">
              <div class="col-md-12">

                <!-- form date pickers -->
                
 <script src="<?php echo base_url('') ?>assets2/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('') ?>assets2/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('') ?>assets2/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('') ?>assets2/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="<?php echo base_url('') ?>assets2/validator/validator.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('') ?>assets2/js/custom.min.js"></script>