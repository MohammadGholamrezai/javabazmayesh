<html>
<head>
  <meta charset="utf-8">
  <title>صفحه ورود آزمایشگاه</title>
  <link rel="stylesheet" href="<?php echo url('css/style_login.css') ?>">
  <link href="<?= url('css/bootstrap.css') ?>" rel="stylesheet">
   <link href="<?= url('css/rtl-bootstrap.min.css')?>" rel="stylesheet">
   <link href="<?= url('css/bootstrapValidator.min.css')?>" rel="stylesheet">

   <script src="<?=url('js/jquery.min.js')?>"></script>
   <script src="<?=url('js/bootstrap.min.js')?>"></script>
   <script src="<?= url('js/bootstrapValidator.min.js')?>"></script>
   <script language="javascript" src="<?= url('editor/editor/ckeditor.js')?>"></script>




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


   <script type="text/javascript" src="<?=url("js/jquery.min.js")?>"></script>
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






   <style type="text/css">
   @font-face {
       font-family:"Yekan";
       src: url('../fonts/Yekan.ttf');
   }
   body{
     font-family: "Yekan";
     font-size:14px;
     background-color: #e0e0e0;
   }
     </style>

</head>
<body>
  @if(Session::has('loginError'))
  {!! '<div class="alert alert-danger" role="alert" align="center">نام کاربری یا کلمه عبور اشتباه است</div>' !!}
  @endif
<div class="container" style="margin-right:800px;margin-top:70px;border:1px solid #e8e4e4;width:320px;border-radius:5px;">


  <header class="clearfix">
    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="top-line">
        <div class="container">

          <p>
            <span><i class="fa fa-phone"></i>١٢٣٤ - ٥٦٧٨ - ٩٠</span>
            <span><i class="fa fa-envelope-o"></i>support@domainname.com</span>
          </p>
  <ul class="social-icons">

            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a class="rss" href="#"><i class="fa fa-rss"></i></a></li>
            <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a class="pinterest" href="#"><i class="fa fa-telegram"></i></a></li>
          </ul>


        </div>
      </div>
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img alt="" src="<?=url('images/logo.png')?>"></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">

            <li><a href="<?=url('/')?>" style="margin-left:25px;"> صفحه نخست </a></li>
            <li><a href="about.html"> درباره ما </a></li>
            <li><a href="pro-search.php?page=0">جستجوی پیشرفته</a></li>
            <li class="drop"><a href="#">دیگر صفحات</a>
              <ul class="drop-down">
                <li><a href="single-post.html">نوشته تکی</a></li>
                <li><a href="single-project.html">پروژه</a></li>
              </ul>
            </li>

            <li class="drop"><a href="blog-right-sidebar.html">وبلاگ</a>
              <ul class="drop-down">
                <li><a href="blog-one-col.html">وبلاگ تک ستونه</a></li>
                <li><a href="blog-two-col.html">وبلاگ 2 ستونه</a></li>
                <li><a href="blog-right-sidebar.html">وبلاگ با سایدبار راست</a></li>
                <li><a href="blog-nosidebar.html">وبلاگ بدون سایدبار</a></li>
              </ul>
            </li>
            <li class="drop"><a href="portfolio-4col.html">نمونه کار</a>
              <ul class="drop-down">
                <li><a href="portfolio-2col.html">نمونه کار 2 ستونه</a></li>
                <li><a href="portfolio-3col.html">نمونه کار 3 ستونه</a></li>
                <li><a href="portfolio-4col.html">نمونه کار 4 ستونه</a></li>
              </ul>
            </li>
            <li class="drop"><a href="index.html">اسلایدر</a>
              <ul class="drop-down">
                <li><a href="index.html">اسلایدر پیشرفته</a></li>
                <li><a href="flexslider.html">اسلایدر ساده</a></li>
              </ul>
            </li>

            <li class="drop"><a class="active" href="index.html">صفحه نخست</a>
              <ul class="drop-down">

                <li><a href="home-boxed.html">صفحه اصلی جعبه ای</a></li>
                </li>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </header>
<!-- End Header -->


  <div class="row">
    <div class="cl-lg-12" style="margin-right:8px;padding:7px;margin-top:150px;">
<div class="sheader">
  <div style="padding:8px;color:green;margin-bottom:10px;" align="center"><span class="glyphicon glyphicon-user"></span><span>ورود آزمایشگاه</span></div>
</div><!-- end sheader-->
<span style="color:red;">
@if($errors->has('login_error'))
{{ $errors->first('login_error') }}
@endif
</span>
<div class="sbody">
<form method="post" action="<?=url('lab/login')?>" class="form-horizontal">
  <div class="form-group">
    <div class="col-md-6" style="width:97%;">
    {{ csrf_field() }}
    <input type="text" name="username" class="form-control" placeholder="نام کاربری ..." value="{{old('username')}}" autofocus>
    <span style="color:red;">
    @if($errors->has('username'))
    {{ $errors->first('username') }}
    @endif
    </span>
  </div>
  </div>
  <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12" style="width:97%;">
    <input type="password" name="password" class="form-control" placeholder="کلمه عبور ...">
    <span style="color:red;">
    @if($errors->has('password'))
    {{ $errors->first('password') }}
    @endif
    </span>
  </div>
  </div>

  <div class="form-group">
    <div class="col-md-12">
      <img style="width:40%;width:160px;height:55px;margin-right:65px;" src="<?=url('Captcha')?>">
  </div>
  </div>

  <div class="form-group">
    <div class="col-md-12" style="width:97%;">
    <input type="text" name="captcha" class="form-control" placeholder="کد امنیتی ...">
    <span style="color:red;">
    @if($errors->has('captcha'))
    {{ $errors->first('captcha') }}
    @endif
    </span>
  </div>
  </div>

  <div class="form-group">
    <div class="col-md-12" style="width:99%;">
    <span><input type="checkbox" class="checkbox" name="remeber" class="form-control">مرا به خاطر بسپار </span>
  </div>
  </div>
  <div class="form-group">
    <button class="btn btn-info" name="btn-login" style="width:80px;margin-right:10px;">ورود</button>
  </div>
</form>


</div><!--end sbody-->
</div>
</div>
</div>
</body>
</html>
