<?php 
$username = ($this->session->userdata['logged_in']['username']);
$level = ($this->session->userdata['logged_in']['level']);
?>
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
                    <h2>Master Buku <small></small></h2>
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
                    <!-- <p class="text-muted font-13 m-b-30">
                      The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                    </p> -->
                    <?php if($level=="admin"){ ?>
                    <a href="<?php echo site_url('Buku/create') ?>" type="button" class="btn btn-success">Create</a>  
                  <?php   }else{

                    }?>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                         <th>kode buku</th>
                    <th>judul</th>
                    <th>kategori</th>
                    <th>penerbit</th>
                    <th>penulis</th>
                    <th>Copy Ke </th>
                    <th>status</th>
                    <?php 
                      if($level=="admin"){
                        ?>
                         <th>Action</th>
                        <?php
                      }else{

                      }
                     ?>
                   
                        </tr>
                      </thead>


                      <tbody>
                        <?php foreach ($buku_list as $key) { ?>
                  <tr>
                    <td><?php echo $key->no_buku ?></td>
                    <td><?php echo $key->Judul ?></td>
                    <td><?php echo $key->nama_kategori ?></td>
                    <td><?php echo $key->penerbit ?></td>
                    <td><?php echo $key->penulis ?></td>
                    <td><?php echo $key->copy ?></td>
                    <?php if ($key->status<1){ ?>
                       <td><span class="label label-danger pull-center"><?php echo "Dipinjam" ?></span></td>
                    <?php }else{?>
                        <td><span class="label label-success pull-center"><?php echo "Ada" ?></span></td>

                    <?php   } ?>
                    <?php if($level=="admin"){ ?>
                    <td width="15%">
                      
                      <a href="<?php echo site_url('buku/update/').$key->kd_buku ?>" type="button" class="btn btn-sm btn-warning ">Edit</a>

                      <a href="<?php echo site_url('buku/delete/').$key->no_buku ?>" type="button" class="btn btn-sm btn-danger" onclick="return deletechecked();">Delete</a>
                    </td>
                    <?php }else{ 

                    }?>
                  </tr>
                <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              