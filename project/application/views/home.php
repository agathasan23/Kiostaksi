<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en">

<head>
	<title>Sistem Parkir Bandara</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/ap.ico">
</head>

<body>
<!-- WRAPPER -->
<div id="wrapper">
	<!-- NAVBAR -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="brand">
			<img src="assets/img/ap.ico"  width="35">
			<a href="index.html">Angkasa Pura 1</a>
		</div>
		<div class="container-fluid">
			<div class="navbar-btn">
				<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
			</div>
			<div id="navbar-menu">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/ap.png" class="img-circle" alt="Avatar"> <span><?php echo $this->session->userdata('email'); ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
						<ul class="dropdown-menu">
							<li><a href="logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- END NAVBAR -->
	<!-- LEFT SIDEBAR -->
	<div id="sidebar-nav" class="sidebar">
		<div class="sidebar-scroll">
			<nav>
				<ul class="nav">
					<li><a href="tables.html" class="active"><i class="lnr lnr-dice"></i> <span>Tables</span></a></li>
				</ul>
			</nav>
		</div>
	</div>
	<!-- END LEFT SIDEBAR -->
	<!-- MAIN -->
	<div class="main">
		<!-- MAIN CONTENT -->
		<div class="main-content">
			<div class="container-fluid" class="align-right">
				<h3 class="page-title" class="align-center">Admin Ngurah Rai taxi</h3>
			</div>
			<div class="row">
				<div class="col-md-push-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">List Taksi</h3>
						</div>
						<div class="panel-body">
							<table class="table table-bordered">
								<thead>
								<tr>
									<th>ID Taksi</th>
									<th>Nomor Kendaraan</th>
									<th>Operator</th>
									<th>Pengendapan</th>
									<th>ReadyLineIn</th>
									<th>ReadyLineOut</th>
									<th>Tol In</th>
									<th>Tol Out</th>
									<th>ID Member</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($trans as $data): ?>
								<?php foreach ($sql as $a): ?>
									<?php
									if($data->pengendapan_in==NULL OR $data->readyline_in==NULL OR $data->readyline_out==NULL){
											$ban="<a href='Parkir/banning/$a->id_member' class='btn btn-danger' title='Ban'><i class='fa-ban'></i></a>";
									}else{
										$ban="";
									}
									if($data->pengendapan_in!=NULL){
										$pengendapan_in = date("D, j M Y - h:i A",strtotime($data->pengendapan_in));
									}else{
										$pengendapan_in = "";
									}
									if($data->readyline_in!=NULL){
										$readyline_in = date("D, j M Y - h:i A",strtotime($data->readyline_in));
									}
									else{
										$readyline_in = "";
									}
									if($data->readyline_out!=NULL){
										$readyline_out=date("D, j M Y - h:i A",strtotime($data->readyline_out));
									}
									else{
										$readyline_out="";
									}

									?>

									<tr>
										<td><?=$data->id_taksi?></td>
										<td><?=$data->no_taksi?></td>
										<td><?=$data->nama_operator?></td>
										<td><?=$pengendapan_in?></td>
										<td><?=$readyline_in?></td>
										<td><?=$readyline_out?></td>
										<td><?=$a->tol_in?></td>
										<td><?=$a->tol_out?></td>
										<td><?=$a->id_member?></td>
										<td>
											<div class="btn-group">
												<?php echo $ban; ?>
												<button type="submit" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Unban!" ><i class="fa-unlock"></i></button>
											</div>
										</td>
									</tr>
								<?php endforeach ?>
								<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<div class="clearfix"></div>
<footer>
	<div class="container-fluid">
		<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
	</div>
</footer>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>
