<div class="container-fluid">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a href="<?php echo site_url('Buku/create') ?>" type="button" class="btn btn-success">Create</a>								
							</div>
						</div>
					</div>	
					<br>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="table-responsive">
							<table class="table table-hover" id="example">
								<thead>
									<tr>
										<th>kode buku</th>
										<th>judul</th>
										<th>kategori</th>
										<th>penerbit</th>
										<th>penulis</th>
										<th>status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($buku_list as $key) { ?>
									<tr>
										<td><?php echo $key->kd_buku ?></td>
										<td><?php echo $key->Judul ?></td>
										<td><?php echo $key->nama_kategori ?></td>
										<td><?php echo $key->penerbit ?></td>
										<td><?php echo $key->penulis ?></td>
										<?php if ($key->jumlah<1){ ?>
											<td><?php echo "Dipinjam" ?></td>
										<?php }else{?>
												<td><?php echo "Ada" ?></td>

										<?php 	} ?>
										<td>
											
											<a href="<?php echo site_url('buku/update/').$key->kd_buku ?>" type="button" class="btn btn-warning">Edit</a>
											<a href="<?php echo site_url('buku/delete/').$key->kd_buku ?>" type="button" class="btn btn-danger" onclick="return deletechecked();">Delete</a>
										</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
