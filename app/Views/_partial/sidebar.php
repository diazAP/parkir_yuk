<?php $service = service('uri'); ?>
<ul class="navbar-nav bg-py-red sidebar sidebar-dark accordion" id="accordionSidebar">
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('home'); ?>">
		<div class="sidebar-brand-icon rotate-n-90">
			<img src="assets/img/logo-white.png" width="45" height="45">
		</div>
		<div class="sidebar-brand-text mx-3">Dashboard</div>
	</a>
	<li class="nav-item <?= $service->getSegment(1) == 'home' ? 'active' : ''; ?>">
		<a class="nav-link" href="<?= base_url('home'); ?>">
			<i class="fas fa-fw fa-home"></i>
			<span>Beranda</span></a>
	</li>
	<li class="nav-item <?= $service->getSegment(1) == 'history' ? 'active' : ''; ?>">
		<a class="nav-link" href="<?= base_url('history'); ?>">
			<i class="fas fa-fw fa-history"></i>
			<span>Riwayat Parkir</span></a>
	</li>
	<li class="nav-item <?= $service->getSegment(1) == 'report' ? 'active' : ''; ?>">
		<a class="nav-link" href="<?= base_url('report'); ?>">
			<i class="fas fa-fw fa-chart-pie"></i>
			<span>Laporan Parkir</span></a>
	</li>
	<li class="nav-item <?= $service->getSegment(1) == 'user' ? 'active' : ''; ?>">
		<a class="nav-link" href="<?= base_url('user'); ?>">
			<i class="fas fa-fw fa-user"></i>
			<span>Daftar Pengguna</span></a>
	</li>
	<hr class="sidebar-divider d-none d-md-block">
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>
</ul>