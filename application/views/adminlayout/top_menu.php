<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Koperasi Pramuka Kwarcab Kabupaten Kuningan</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>

    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- tinymce -->
    <script src="<?php echo base_url() ?>assets/tinymce/tinymce.min.js"></script>

    <!-- Datetimepicker -->
    <link href="<?php echo base_url() ?>assets/datepicker/default.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/datepicker/default.date.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url() ?>assets/datepicker/jquery.1.7.0.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/datepicker/picker.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/datepicker/picker.date.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/datepicker/legacy.js"></script>

    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/pramuka.png">


</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-merah navbar-fixed-top" role="navigation" id="atas" >
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header" >
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="tombol-menu"><span class="fa fa-fw fa-bars"></span></i>
                    
                </button>
            <a class="navbar-brand" href="<?php echo base_url() ?>index.php/users">Koperasi Pramuka</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <?php 
                    $user=$this->session->userdata('nama_users');
                ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $user?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href=""><i class="fa fa-fw fa-gear"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo base_url() ?>index.php/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="<?php echo base_url() ?>index.php/home"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li> 
                <li class="active">
                    <a href="<?php echo base_url() ?>index.php/kwarran"><i class="fa fa-fw fa-bookmark"></i> Kwarran</a>
                </li>
               <li class="active">
                    <a href="<?php echo base_url() ?>index.php/users"><i class="fa fa-fw fa-users"></i> Anggota</a>
                </li>
                <li class="active">
                    <a href="<?php echo base_url() ?>index.php/simpanan"><i class="fa fa-fw fa-files-o"></i> Transaksi Simpanan</a>
                </li>
                <li class="active">
                    <a href="<?php echo base_url() ?>index.php/pinjaman"><i class="fa fa-fw fa-briefcase"></i> Transaksi Pinjaman</a>
                </li>
                

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">