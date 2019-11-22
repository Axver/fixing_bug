
<?php

//	echo $this->session->userdata("nip");
if($this->session->userdata("privilage"))
{
	if($this->session->userdata("privilage")==2)
	{

	}
	else
	{
		redirect(base_url());
	}
}
else
{
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


				<!-- Content Row -->

				<div class="row">

					<!-- Area Chart -->
					<div class="col-xl-12 col-lg-12">
						<div class="card shadow mb-12">
							<!-- Card Header - Dropdown -->
							<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
								<h6 class="m-0 font-weight-bold text-primary">View User Pengawasan</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<button class="btn btn-info" onclick="generatePDF()">Generate PDF</button>

							<div class="card-body" id="cetak_tabel">
								<center><b><h2>LAPORAN PENGAWASAN MINGGU <?php echo $this->uri->segment("5"); ?></h2></b></center>

								<br/>
								<div class="row">
									<div class="col-sm-2">Nama Paket</div>
									<div class="col-sm-1">:</div>
									<div class="col-sm-2">
										<?php
//										Ambil Id Paket Dahulu
										$per=$this->db->get_where("lap_perencanaan",array("id_lap_perencanaan"=>$this->uri->segment("4")))->result();
										$count=count($per);
										$i=0;

										while($i<$count)
										{
											$paket=$this->db->get_where("paket",array("id_paket"=>$per[$i]->id_paket))->result();
											$count1=count($paket);
											$ii=0;

											while($ii<$count1)
											{
												echo $paket[$ii]->nama;

												$ii++;
											}

											$i++;
										}
										?>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-2">Lokasi Pekerjaan</div>
									<div class="col-sm-1">:</div>
									<div class="col-sm-2">			<?php
										//										Ambil Id Paket Dahulu
										$per=$this->db->get_where("lap_perencanaan",array("id_lap_perencanaan"=>$this->uri->segment("4")))->result();
										$count=count($per);
										$i=0;

										while($i<$count)
										{
											$paket=$this->db->get_where("paket",array("id_paket"=>$per[$i]->id_paket))->result();
											$count1=count($paket);
											$ii=0;

											while($ii<$count1)
											{
												echo $paket[$ii]->lokasi;

												$ii++;
											}

											$i++;
										}
										?></div>
								</div>

								<div class="row">
									<div class="col-sm-2">Periode Pengawasan</div>
									<div class="col-sm-1">:</div>
									<div class="col-sm-2"></div>
								</div>

								<div class="row">
									<div class="col-sm-2">Tanggal</div>
									<div class="col-sm-1">:</div>
									<div class="col-sm-2"><?php echo $this->uri->segment("3"); ?></div>
								</div>

								<div class="row">
									<div class="col-sm-2">Tahun Anggaran</div>
									<div class="col-sm-1">:</div>
									<div class="col-sm-2">
										<?php
										//										Ambil Id Paket Dahulu
										$per=$this->db->get_where("lap_perencanaan",array("id_lap_perencanaan"=>$this->uri->segment("4")))->result();
										$count=count($per);
										$i=0;

										while($i<$count)
										{
											$paket=$this->db->get_where("paket",array("id_paket"=>$per[$i]->id_paket))->result();
											$count1=count($paket);
											$ii=0;

											while($ii<$count1)
											{
												echo $paket[$ii]->tahun_anggaran;

												$ii++;
											}

											$i++;
										}
										?>
									</div>
								</div>

								<br/>
								<b>Rekapitulasi Hasil Pengawasan</b>

								<table class="tg table table-bordered" id="tabel_pengawasan">
									<tr>
										<th class="tg-cly1" rowspan="2">Jenis Pekerjaan</th>
										<th class="tg-cly1" rowspan="2">Jumlah Pekerja</th>
										<th class="tg-cly1" colspan="3">Jumlah Satuan</th>
										<th class="tg-cly1" rowspan="2">Progress Pekerjaan (%)</th>
									</tr>
									<tr>
										<td class="tg-cly1">Jenis</td>
										<td class="tg-cly1">Satuan</td>
										<td class="tg-cly1">Jumlah</td>
									</tr>
									<?php
									$hitung=count($data);
									$i=0;
									while($i<$hitung)
									{
										?>
										<tr>
											<td><?php echo $data[$i]->jenis_pekerjaan; ?></td>
											<td><?php echo $data[$i]->jumlah_pekerja; ?></td>
											<td><?php echo $data[$i]->jenis_satuan; ?></td>
											<td><?php echo $data[$i]->satuan; ?></td>
											<td><?php echo $data[$i]->jumlah_satuan; ?></td>
											<td><?php echo $data[$i]->progres; ?></td>
										</tr>
									<?php

										$i++;
									}
									?>


								</table>

								<br/>
								<br/>

								<div class="row">
									<div class="col-sm-1"></div>
									<div class="col-sm-3"><center><b>Diperiksa Oleh</b></center></div>
									<div class="col-sm-4"></div>
									<div class="col-sm-3"><center><b>Dibuat Oleh</b></center></div>
									<div class="col-sm-1"></div>
								</div>

								<br/>
								<br/>
								<br/>
								<div class="row">
									<div class="col-sm-1"></div>
									<div class="col-sm-3"><center><b>
												<?php
												$x=$this->db->get_where("ttd_pengawasan",array("id_pengawasan"=>$this->uri->segment("3"),"id_perencanaan"=>$this->uri->segment("4"),"minggu"=>$this->uri->segment("5")))->result();
												$count=count($x);
												$i=0;

												while($i<$count)
												{
//													Select Lagi
													$data=$this->db->get_where("konfigurasi",array("id_konfigurasi"=>$x[$i]->id_diperiksa))->result();
													$count1=count($data);
													$ii=0;

													while($ii<$count1)
													{
														echo $data[$ii]->nama;

														$ii++;
													}
													$i++;
												}
												?>
											</b></center></div>
									<div class="col-sm-4"></div>
									<div class="col-sm-3"><center><b>
												<?php
												$x=$this->db->get_where("ttd_pengawasan",array("id_pengawasan"=>$this->uri->segment("3"),"id_perencanaan"=>$this->uri->segment("4"),"minggu"=>$this->uri->segment("5")))->result();
												$count=count($x);
												$i=0;

												while($i<$count)
												{
//													Select Lagi
													$data=$this->db->get_where("account",array("nip"=>$x[$i]->id_dibuat))->result();
													$count1=count($data);
													$ii=0;

													while($ii<$count1)
													{
														echo $data[$ii]->nama;

														$ii++;
													}
													$i++;
												}
												?>
											</b></center></div>
									<div class="col-sm-1"></div>
								</div>






							</div>


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
    function generatePDF() {
        // Choose the element that our invoice is rendered in.
        const element = document.getElementById("cetak_tabel");
        // Choose the element and save the PDF for our user.
        var opt = {
            margin:       1,
            filename:     'myfile.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'A3', orientation: 'landscape' }
        };
        // Choose the element and save the PDF for our user.
        html2pdf().set(opt).from(element).save();
    }
</script>











</body>

</html>
