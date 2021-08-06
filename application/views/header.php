<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="application-name" content="<?php echo $header['application_name']; ?>">
	<meta name="author" content="<?php echo $header['author']; ?>">
	<meta name="description" content="<?php echo $header['description']; ?>">
	<meta name="keywords" content="<?php echo $header['keywords']; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="<?php echo $header['robots']; ?>">
	<meta property="og:url" content="<?php echo base_url(); ?>">
	<meta property="og:title" content="<?php echo $header['application_name']; ?>">
	<meta property="og:description" content="<?php echo $header['description']; ?>">
	<meta property="og:type" content="website">
	<meta property="og:image" content="<?php echo base_url("img/icons/icon-512x512.png"); ?>">
	<meta property="og:local" content="pt_BR">
	<title><?php echo $header['title']; ?></title>
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url("img/icons/icon-16x16.png"); ?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url("img/icons/icon-32x32.png"); ?>">
    <link rel="manifest" href="<?php echo base_url("js/manifest.json"); ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="<?php echo base_url("css/css.css"); ?>">
	<script src="https://www.w3schools.com/lib/w3.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<!--script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular.min.js" integrity="sha256-zBy1l2WBAh2vPF8rnjFMUXujsfkKjya0Jy5j6yKj0+Q=" crossorigin="anonymous"></script-->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="w3-light-gray">
	<noscript>
		<div class="w3-container w3-yellow">
			<div class="w3-panel">
				<h3>Atenção!</h3>
				<p>Seu Navegador está bloqueando o JavaScript, isso faz com o site não funcione direito.</p>
			</div>
		</div>
	</noscript>
