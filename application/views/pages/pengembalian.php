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
                    <h2>Pengembalian <small></small></h2>
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
									
										<th>Jumlah Buku</th>
									<!-- 	<th>status</th> -->
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($pengembalian_list as $key) { ?>
									<tr>
										<td><?php echo $key['fk_peminjaman'] ?></td>
										<td><?php echo $key['nama'] ?></td>
										<td><?php echo $key['tanggal_pinjam'] ?></td>
										
										<td><?php echo $key['jumlah'] ?></td>
									<!--  <?php if ($key['status']>0){ ?>
											<td><?php echo "Dikembalikan" ?></td>
										<?php }else{?>
												<td><?php echo "Belum Dikembalikan" ?></td>

										<?php 	} ?>  -->
										<td>
									<?php if($key['jumlah_kurangi']<1){ ?>
									<a href="<?php echo site_url('pengembalian/create/').$key['fk_peminjaman'] ?>" type="button" class="btn btn-success">View</a>
											
									<?php }else{ ?>
											<a href="<?php echo site_url('pengembalian/create/').$key['fk_peminjaman'] ?>" type="button" class="btn btn-warning">Kembalikan</a>
									<?php } ?>
										</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
