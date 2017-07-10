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
                    <h2>Master Member <small></small></h2>
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
                     <a href="<?php echo site_url('Member/create') ?>" type="button" class="btn btn-success">Create</a> 
							<table id="datatable-buttons" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>id user</th>
										<th>nim</th>
										<th>nama</th>
										<th>alamat</th>
										<th>no telp</th>
										<th>foto</th>
										<th>tanggal lahir</th>
										<th>level</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($member_list as $key) { ?>
									<tr>
										<td><?php echo $key->id_user ?></td>
										<td><?php echo $key->nim_nip ?></td>
										<td><?php echo $key->nama ?></td>
										<td><?php echo $key->alamat ?></td>
										<td><?php echo $key->no_telp ?></td>
										<td><?php echo $key->foto ?></td>
										<td><?php echo $key->tanggal_lahir ?></td>
										<td><?php echo $key->level ?></td>
										
										<td>
											
											<a href="<?php echo site_url('member/update/').$key->id_user ?>" type="button" class="btn btn-warning">Edit</a>
											<a href="<?php echo site_url('member/delete/').$key->nim_nip ?>" type="button" class="btn btn-danger" onclick="return deletechecked();">Delete</a>
										</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
