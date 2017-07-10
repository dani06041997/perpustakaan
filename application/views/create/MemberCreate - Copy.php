  <link href="<?php echo base_url('') ?>assets2/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('') ?>assets2/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('') ?>assets2/nprogress/nprogress.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('') ?>assets2/build/css/custom.min.css" rel="stylesheet">

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
                    <form class="form-horizontal form-label-left">

                      <div class="form-group">
                  <label for="">Nim</label>
                  <input type="text" class="form-control" id="no" name="no" placeholder="Nim">
                </div>
                <div class="form-group">
                  <label for="">Nama </label>
                  <input type="text" data-validate-length-range="6" data-validate-words="2" class="form-control" id="judul" name="judul" placeholder="Nama Lengkap">
                </div>
          
                
                <div class="form-group">
                  <label for="">Alamat</label>
                  <textarea placeholder="Alamat"  class="form-control"></textarea>
                 
                </div>
                <div class="form-group">
                        <label for="">Phone mask</label>
                          <input type="text" class="form-control" data-inputmask="'mask' : '(999) 999-999-999'">
                      </div>

                <div class="form-group">
                  <label for="">Foto </label>
                  <input type="text" class="form-control" id="stok" name="copy" placeholder="copy">
                </div>
                      <div class="ln_solid"></div>

                      

                    </form>
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
                    <form class="form-horizontal form-label-left">
                  <div class="form-group">
                  <label for="">Email </label>
                  <input type="text" class="form-control" id="judul" name="judul" placeholder="anonymous@gmail.com">
                </div>
                    <div class="form-group">
                  <label for="">Tanggal Lahir </label>
                  <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                <input style="margin-left: -10px;" type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="First Name" aria-describedby="inputSuccess2Status4">

                                <span style="margin-left: -10px;" class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                              </div>
                </div>
                <div class="form-group">
                  <label for="">Username  </label>
                  <input type="text" class="form-control" id="stok" name="copy" placeholder="Username">
                </div>
                <div class="form-group">
                  <label for="">Password </label>
                  <input type="Password" class="form-control" id="Password" name="Password" data-validate-length="6,8" required="required" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="">Konfirmasi Password </label>
                  <input type="Password" class="form-control" id="Password2" name="Password2" data-validate-linked="password" placeholder="Password">
                </div>
                <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
              <!-- /form color picker -->

              <!-- form input knob -->
              
            </div>




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