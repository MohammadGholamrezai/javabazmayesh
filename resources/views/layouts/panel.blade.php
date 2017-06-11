<html lang="en" class="no-js">
<head>
  <meta lang="fa" dir="rtl">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>سامانه جواب آزمایش</title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="<?= url("css/bootstrap.css") ?>" type="text/css" media="screen">
  <link rel="stylesheet" href="<?= url("css/rtl-bootstrap.min.css") ?>" type="text/css" media="screen">

    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="<?=url("css/fullwidth.css")?>" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?=url("css/settings.css")?>" media="screen" />

	<link rel="stylesheet" type="text/css" href="<?=url("css/magnific-popup.css")?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?=url("css/owl.carousel.css")?>" media="screen">
    <link rel="stylesheet" type="text/css" href="<?=url("css/owl.theme.css")?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?=url("css/jquery.bxslider.css")?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?=url("css/font-awesome.css")?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?=url("css/font-awesome.min")?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?=url("css/style.css")?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?=url("css/responsive.css")?>" media="screen">


  <script type="text/javascript" src="<?=url('js/jquery-1.9.1.min.js')?>"></script>
	<script type="text/javascript" src="<?=url("js/jquery.migrate.js")?>"></script>
	<script type="text/javascript" src="<?=url("js/jquery.magnific-popup.min.js")?>"></script>
	<script type="text/javascript" src="<?=url("js/bootstrap.js")?>"></script>
	<script type="text/javascript" src="<?=url("js/owl.carousel.min.js")?>"></script>
	<script type="text/javascript" src="<?=url("js/raphael-min.js")?>"></script>
	<script type="text/javascript" src="<?=url('js/DevSolutionSkill.min.js')?>"></script>
	<script type="text/javascript" src="<?=url('js/retina-1.1.0.min.js')?>"></script>
	<script type="text/javascript" src="<?=url('js/jquery.bxslider.min.js')?>"></script>
	<script type="text/javascript" src="<?=url('js/plugins-scroll.js')?>"></script>

     <!-- jQuery KenBurn Slider  -->
    <script type="text/javascript" src="<?=url('js/jquery.themepunch.revolution.min.js')?>"></script>
	<script type="text/javascript" src="<?=url('js/script.js')?>"></script>

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<style type="text/css">
  @font-face {
      font-family:"Yekan";
      src: url('fonts/Yekan.ttf');
  }
  body{
    font-family: "Yekan";
  }
    </style>

  </head>
</head>
<body style="margin-top:-160px;">
  <!-- Container -->
  <div id="container">
  </div>
  <!-- End container -->
@yield('content')

</body>
</html>
