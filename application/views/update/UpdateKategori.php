<div class="right_col" role="main">

 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tambah kategori <small></small></h2>
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
     <?php echo form_open('kategori/update/'.$this->uri->segment(3)); ?>
        <?php echo validation_errors(); ?>
        <div class="form-group">
         <label for="">Nama</label>
         <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $kategori[0]->nama_kategori ?>" placeholder="Nama">
        </div>
       
        
       
        <button type="submit" class="btn btn-primary">Submit</button>
     <?php echo form_close(); ?>
     </div>
     </div>
     </div>
     </div>