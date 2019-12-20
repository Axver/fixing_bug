<?php

//	echo $this->session->userdata("nip");
if ($this->session->userdata("privilage")) {
	if ($this->session->userdata("privilage") == 2) { } else {
		redirect(base_url());
	}
} else {
	redirect(base_url());
}



?>

<!DOCTYPE html>
<html lang="en">

<head>

	<?php $this->load->view('component/header') ?>


</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<?php $this->load->view('component/sidebar_user'); ?>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>



					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - Search Dropdown (Visible Only XS) -->
						<li class="nav-item dropdown no-arrow d-sm-none">
							<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-search fa-fw"></i>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
								<form class="form-inline mr-auto w-100 navbar-search">
									<div class="input-group">
										<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
										<div class="input-group-append">
											<button class="btn btn-primary" type="button">
												<i class="fas fa-search fa-sm"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</li>





						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->


					</ul>

				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
					</div>

					<!-- Content Row -->
					<?php $this->load->view('admin_content/card_list_user'); ?>

					<!-- Content Row -->

					<div class="row">

						<!-- Area Chart -->
						<div class="col-xl-12 col-lg-12">
							<div class="card shadow mb-12">
								<!-- Card Header - Dropdown -->
								<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
									<h6 class="m-0 font-weight-bold text-primary">Daftar Gambar Laporan Pertahap</h6>
									<div class="dropdown no-arrow">
										<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
										</a>

									</div>
								</div>
								<!-- Card Body -->
								<div class="card-body">



									<table id="example" class="display" style="width:100%">
										<thead>
											<tr>
												<th>Gambar</th>
												<th>Jenis Pekerjaan</th>
												<th>Tahun</th>
												<th>Paket</th>

												<th>Bulan Awal</th>
												<th>Bulan Akhir</th>
												<th>Hapus</th>

											</tr>
										</thead>
										<tbody>


											<?php
											$this->db->select('*');
											$this->db->from('gambar_tahap');
											$this->db->join('paket', 'gambar_tahap.id_paket = paket.id_paket');
											$this->db->join('jenis_pekerjaan', 'gambar_tahap.jenis_pekerjaan = jenis_pekerjaan.id');

											$data = $this->db->get()->result();

											$count = count($data);

											$i = 0;

											while ($i < $count) {
												?>


												<tr>
													<td><img style="width:100px;height:100px;" src="<?php echo base_url('gambar/' . $data[$i]->gambar) ?>"></td>
													<td><?php echo $data[$i]->nama_jenis; ?></td>
													<td><?php echo $data[$i]->tahun; ?></td>
													<td><?php echo $data[$i]->nama; ?></td>
													<td><?php echo $data[$i]->bulan_start; ?></td>
													<td><?php echo $data[$i]->bulan_end; ?></td>
													<td><button class="btn btn-danger" onclick="hapus('<?php echo $data[$i]->gambar ?>')">Delete</button></td>
												</tr>
											<?php


												$i++;
											}



											?>

										</tbody>

									</table>




								</div>

								<script>
									$(document).ready(function() {
										$('#example').DataTable();
									});
								</script>
							</div>
						</div>


					</div>



				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; Your Website 2019</span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="login.html">Logout</a>
				</div>
			</div>
		</div>
	</div>



	<script>
		function hapus(img) {

			//   alert(img);


			$.ajax({
				type: "POST",
				url: "http://localhost/pupr_new/catur_wulan_gambar/hapus_gambar",
				data: {
					"image": img
				},
				dataType: "text",
				cache: false,
				success: function(data) {
					// alert(data); //as a debugging message.

					// Refresh Current Page
					location.reload();
				}
			});

		}
	</script>









</body>

</html>
