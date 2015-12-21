<!--
Author: WebThemez
Author URL: http://webthemez.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>free-educational-responsive-web-template-webEdu</title>
	<link rel="favicon" href="<?php echo base_url() ?>assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="<?php echo base_url() ?>assets/js/html5shiv.js"></script>
	<script src="<?php echo base_url() ?>assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body dir="rtl">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="">
					<img src="<?php echo base_url() ?>assets/images/logo.png" alt="Techro HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
                                        <li class="active"><a href="<?php echo base_url() ?>index.php/home/logout">تسجيل خروج</a></li>
					<li ><a href="<?php echo base_url() ?>">About</a></li>
					<li ><a href="<?php echo base_url() ?>">Courses</a></li>
					<li ><a href="<?php echo base_url() ?>">Price</a></li>
					<li ><a href="<?php echo base_url() ?>index.php/Tree_Sub">Videos</a></li>
                                        <li ><a href="<?php echo base_url() ?>index.php/subj">بيانات مواد</a></li>
					<li ><a href="<?php echo base_url() ?>index.php/home">تنزيل مواد</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

		<header id="head" class="secondary">
            <div class="container">
                    <h1>مرحبا  ... <?php echo $user_name;?></h1>
                    <p>الادراة المنتي اليها : <?php echo $user_Management;?> , القسم المنتمي اليه : <?php echo $user_Section;?><br>صلاحيته :<?php echo $user_jod;?> </p>
                </div>
    </header>
