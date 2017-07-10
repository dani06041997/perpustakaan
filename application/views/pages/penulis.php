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
                    <h2>Master Penulis <small></small></h2>
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
                   <?=$this->session->flashdata('pesan')?>
                   <a href="<?php echo site_url('penulis/create') ?>" type="button" class="btn btn-success">Create</a>  
                   <table id="datatable-buttons" class="table table-striped table-bordered">

                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($Penulis_list as $key) { ?>
                  <tr>
                    <td><?php echo $key->id_penulis ?></td>
                    <td><?php echo $key->nama_penulis ?></td>
                    <td>
                      
                      <a href="<?php echo site_url('penulis/update/').$key->id_penulis ?>" type="button" class="btn btn-warning">Edit</a>
                      <a href="<?php echo site_url('penulis/delete/').$key->id_penulis ?>" type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
