<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/datatable/datatables.css' ?>">
    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/datatable/jquery.dataTables.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/datatable/datatables.js'; ?>"></script>
</head>
<body>
<div id="topheader">
<nav class="navbar navbar-default">
<div class="container-fluid">
<!-- Brand and toggle get grouped for better mobile
display -->
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed btn btn-navbar" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#">Rental Mobil</a>
</div>
<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav mr-auto">
<li class="nav-item"><a href="<?php echo base_url().'admin'; ?>"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
<li class="nav-item"><a href="<?php echo base_url().'admin/mobil'; ?>"><span class="glyphicon glyphicon-folder-open"></span> Data Mobil</a></li>
<li class="nav-item"><a href="<?php echo base_url().'admin/kostumer'; ?>"><span class="glyphicon glyphicon-user"></span> Data Kostumer</a></li>
<li class="nav-item"><a href="<?php echo base_url().'admin/transaksi'; ?>"><span class="glyphicon glyphicon-sort"></span> Transaksi Rental</a></li>
<li class="nav-item"><a href="<?php echo base_url().'admin/laporan'; ?>"><span class="glyphicon glyphicon-list-alt"></span> Laporan</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
<li><a href="<?php echo base_url().'admin/logout'; ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo "Halo, <b>".$this->session->userdata('nama'); ?></b><span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li>
            <a href="<?php echo base_url().'admin/ganti_password' ?>"><i class="glyphicon glyphicon-lock"></i> Ganti Password</a>
        </li>
    </ul>
</li>
</ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
</div>
<div class="container">