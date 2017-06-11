<html lang="en" class="no-js">
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>سامانه جواب آزمایش</title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="<?= url("css/bootstrap.css") ?>" type="text/css" media="screen">
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

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<style type="text/css">
   @font-face{
   font-family:yekan;
   src:url(fonts/Yekan.ttf);
   }
    body
    {
  font-family:yekan;
    }
    </style>

  </head>
</head>
<body>

	<!-- Container -->
	<div id="container-fluid">
		<!-- Header
		    ================================================== -->
				<header class="clearfix">
          <!-- Static navbar -->
          <div class="navbar navbar-default navbar-fixed-top">
            <div class="top-line">
              <div class="container-fluid">

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
                <a class="navbar-brand" href="#"><img alt="" src="images/logo.png"></a>
              </div>
              <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">

                  <li><a href="<?=url('/')?>" style="margin-left:25px;"> صفحه نخست </a></li>
                  <li><a href=""> درباره ما </a></li>
                  <li><a href="">جستجوی پیشرفته</a></li>
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

		<!-- slider
			================================================== -->
		<div id="slider">
			<!--
			#################################
				- THEMEPUNCH BANNER -
			#################################
			-->

			<div class="fullwidthbanner-container">
				<div class="fullwidthbanner">
					<ul>
						<!-- THE FIRST SLIDE -->
						<li data-transition="3dcurtain-vertical" data-slotamount="10" data-masterspeed="300">
							<!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
							<img alt="" src="upload/slider-revolution/1.jpg" >

							<!-- THE CAPTIONS IN THIS SLDIE -->
							<div class="caption large_text sfb"
								 data-x="170"
								 data-y="128"
								 data-speed="600"
								 data-start="1200"
								 data-easing="easeOutExpo" data-end="7000" data-endspeed="300" data-endeasing="easeInSine" >قالب شرکتی کانورت</div>

							<div class="caption big_white sft stt"
								 data-x="370"
								 data-y="185"
								 data-speed="500"
								 data-start="1400"
								 data-easing="easeOutExpo" data-end="7100" data-endspeed="300" data-endeasing="easeInSine" ><span>کانورت</span> - طراحی خلاق</div>

							<div class="caption randomrotate"
								 data-x="0"
								 data-y="244"
								 data-speed="600"
								 data-start="1600"
								 data-easing="easeOutExpo" data-end="7200" data-endspeed="300" data-endeasing="easeInSine" ><img src="images/slider-icons/icon1.png" alt="Image 1"></div>

							<div class="caption modern_small_text_dark sft"
								 data-x="45"
								 data-y="360"
								 data-speed="600"
								 data-start="1700"
								 data-easing="easeOutExpo" data-end="7350" data-endspeed="300" data-endeasing="easeInSine" >طراحی زیبا</div>

							<div class="caption randomrotate"
								 data-x="200"
								 data-y="244"
								 data-speed="600"
								 data-start="1800"
								 data-easing="easeOutExpo" data-end="7400" data-endspeed="300" data-endeasing="easeInSine" ><img src="images/slider-icons/icon2.png" alt="Image 2"></div>

							<div class="caption modern_small_text_dark sft"
								 data-x="222"
								 data-y="360"
								 data-speed="600"
								 data-start="1900"
								 data-easing="easeOutExpo" data-end="7450" data-endspeed="300" data-endeasing="easeInSine" >قابل تنظیم</div>

							<div class="caption randomrotate"
								 data-x="400"
								 data-y="244"
								 data-speed="600"
								 data-start="2000"
								 data-easing="easeOutExpo" data-end="7500" data-endspeed="300" data-endeasing="easeInSine" ><img src="images/slider-icons/icon3.png" alt="Image 3"></div>

							<div class="caption modern_small_text_dark sft"
								 data-x="429"
								 data-y="360"
								 data-speed="600"
								 data-start="2100"
								 data-easing="easeOutExpo" data-end="7550" data-endspeed="300" data-endeasing="easeInSine" >بهینه سازی تصاویر</div>

							<div class="caption randomrotate"
								 data-x="600"
								 data-y="244"
								 data-speed="600"
								 data-start="2200"
								 data-easing="easeOutExpo" data-end="7600" data-endspeed="300" data-endeasing="easeInSine" ><img src="images/slider-icons/icon4.png" alt="Image 4"></div>

							<div class="caption modern_small_text_dark sft"
								 data-x="641"
								 data-y="360"
								 data-speed="600"
								 data-start="2300"
								 data-easing="easeOutExpo" data-end="7650" data-endspeed="300" data-endeasing="easeInSine" >پشتیبانی</div>

							<div class="caption randomrotate"
								 data-x="800"
								 data-y="244"
								 data-speed="600"
								 data-start="2400"
								 data-easing="easeOutExpo" data-end="7700" data-endspeed="300" data-endeasing="easeInSine" ><img src="images/slider-icons/icon5.png" alt="Image 5"></div>

							<div class="caption modern_small_text_dark sft"
								 data-x="838"
								 data-y="360"
								 data-speed="600"
								 data-start="2500"
								 data-easing="easeOutExpo" data-end="7750" data-endspeed="300" data-endeasing="easeInSine" >به روز</div>

							<div class="caption randomrotate"
								 data-x="1000"
								 data-y="244"
								 data-speed="600"
								 data-start="2600"
								 data-easing="easeOutExpo" data-end="7800" data-endspeed="300" data-endeasing="easeInSine" ><img src="images/slider-icons/icon6.png" alt="Image 6"></div>

							<div class="caption modern_small_text_dark sft"
								 data-x="1047"
								 data-y="360"
								 data-speed="600"
								 data-start="2700"
								 data-easing="easeOutExpo" data-end="7850" data-endspeed="300" data-endeasing="easeInSine" >بارگذاری سریع</div>
						</li>
						<!-- THE second SLIDE -->
						<li data-transition="papercut" data-slotamount="15" data-masterspeed="300">
							<!-- THE MAIN IMAGE IN THE second SLIDE -->
							<img alt="" src="upload/slider-revolution/2.jpg" >

							<!-- THE CAPTIONS IN THIS SLDIE -->

							<div class="caption randomrotate"
								 data-x="720"
								 data-y="130"
								 data-speed="600"
								 data-start="1200"
								 data-easing="easeOutExpo" data-end="7000" data-endspeed="300" data-endeasing="easeInSine" ><img src="images/slider-icons/image.png" alt="Image 1"></div>

							<div class="caption modern_medium_light sft stt"
								 data-x="110"
								 data-y="148"
								 data-speed="500"
								 data-start="1500"
								 data-easing="easeOutExpo" data-end="7100" data-endspeed="300" data-endeasing="easeInSine" ><i class="fa fa-list"></i>شورت کد</div>

							<div class="caption modern_medium_light sft stt"
								 data-x="394"
								 data-y="148"
								 data-speed="600"
								 data-start="1600"
								 data-easing="easeOutExpo" data-end="7300" data-endspeed="300" data-endeasing="easeInSine" ><i class="fa fa-building-o"></i>بهینه</div>

							<div class="caption modern_medium_light sft stt"
								 data-x="110"
								 data-y="294"
								 data-speed="600"
								 data-start="1800"
								 data-easing="easeOutExpo" data-end="7400" data-endspeed="300" data-endeasing="easeInSine" ><i class="fa fa-flag-o"></i>فونت فارسی</div>

							<div class="caption modern_medium_light sft stt"
								 data-x="394"
								 data-y="294"
								 data-speed="600"
								 data-start="2000"
								 data-easing="easeOutExpo" data-end="7500" data-endspeed="300" data-endeasing="easeInSine" ><i class="fa fa-laptop"></i>ریتینا</div>
						</li>

						<!-- THE third SLIDE -->
						<li data-transition="turnoff" data-slotamount="1" data-masterspeed="300">
							<!-- THE MAIN IMAGE IN THE third SLIDE -->
							<img alt="" src="upload/slider-revolution/3.jpg" >

							<!-- THE CAPTIONS IN THIS SLDIE -->
							<div class="caption large_text sfb"
								 data-x="0"
								 data-y="185"
								 data-speed="600"
								 data-start="1200"
								 data-easing="easeOutExpo" data-end="7000" data-endspeed="300" data-endeasing="easeInSine" >خوش آمدید<span>&nbspبه قالب کانورت</span></div>

							<div class="caption medium_grey sft stt"
								 data-x="0"
								 data-y="224"
								 data-speed="500"
								 data-start="1300"
								 data-easing="easeOutExpo" data-end="7100" data-endspeed="300" data-endeasing="easeInSine" >شرکتی HTML قالب</div>

							<div class="caption randomrotate"
								 data-x="0"
								 data-y="273"
								 data-speed="600"
								 data-start="1400"
								 data-easing="easeOutExpo" data-end="7200" data-endspeed="300" data-endeasing="easeInSine" ><img src="images/slider-icons/icon7.png" alt="Image 1"></div>

							<div class="caption randomrotate"
								 data-x="129"
								 data-y="273"
								 data-speed="600"
								 data-start="1500"
								 data-easing="easeOutExpo" data-end="7300" data-endspeed="300" data-endeasing="easeInSine" ><img src="images/slider-icons/icon8.png" alt="Image 2"></div>

							<div class="caption randomrotate"
								 data-x="259"
								 data-y="273"
								 data-speed="600"
								 data-start="1600"
								 data-easing="easeOutExpo" data-end="7400" data-endspeed="300" data-endeasing="easeInSine" ><img src="images/slider-icons/icon9.png" alt="Image 3"></div>

							<div class="caption randomrotate"
								 data-x="390"
								 data-y="273"
								 data-speed="600"
								 data-start="1700"
								 data-easing="easeOutExpo" data-end="7500" data-endspeed="300" data-endeasing="easeInSine" ><img src="images/slider-icons/icon10.png" alt="Image 4"></div>

							<div class="caption big_white sfb"
								 data-x="520"
								 data-y="337"
								 data-speed="600"
								 data-start="1900"
								 data-easing="easeOutExpo" data-end="7000" data-endspeed="300" data-endeasing="easeInSine" ><span>Retina</span> Ready Icons</div>

							<div class="caption randomrotate"
								 data-x="587"
								 data-y="387"
								 data-speed="600"
								 data-start="2100"
								 data-easing="easeOutExpo" data-end="7600" data-endspeed="300" data-endeasing="easeInSine" ><img src="images/slider-icons/icon12.png" alt="Image 5"></div>

							<div class="caption randomrotate"
								 data-x="684"
								 data-y="375"
								 data-speed="700"
								 data-start="2200"
								 data-easing="easeOutExpo" data-end="7900" data-endspeed="300" data-endeasing="easeInSine" ><img src="images/slider-icons/icon13.png" alt="Image 6"></div>

							<div class="caption randomrotate"
								 data-x="739"
								 data-y="348"
								 data-speed="600"
								 data-start="2300"
								 data-easing="easeOutExpo" data-end="8000" data-endspeed="300" data-endeasing="easeInSine" ><img src="images/slider-icons/icon14.png" alt="Image 7"></div>

							<div class="caption randomrotate"
								 data-x="808"
								 data-y="200"
								 data-speed="600"
								 data-start="2500"
								 data-easing="easeOutExpo" data-end="8300" data-endspeed="300" data-endeasing="easeInSine" ><img src="images/slider-icons/icon11.png" alt="Image 10"></div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End slider -->

		<!-- content
			================================================== -->
		<div id="content">

			<!-- welcome-box -->
			<div class="welcome-box">
				<div class="container">
					<h1>پروژه <span>آزمایشگاه</span></h1>
					<p>لورم ایپسوم یا طرح‌نما به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود</p>
				</div>
			</div>


			<div class="recent-works">
			  <div class="container">
			    <h3>برترین آزمایشگاه ها</h3>
			    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

			      <!-- Wrapper for slides -->
			      <div class="carousel-inner">

			        <div class="item active">
			          <div class="row">

			            <div class="col-md-3">
			              <div class="work-post">
			                <div class="work-post-gal">
			                  <img alt="" src="upload/image1.jpg">
			                  <div class="hover-box">
			                    <a class="zoom video" href="http://www.youtube.com/watch?v=XSGBVzeBUbk"></a>
			                    <a class="page" href="single-project.html"></a>
			                  </div>
			                </div>
			                <div class="work-post-content">
			                  <h5>آیفون</h5>
			                  <span>تلفن هوشمند</span>
			                </div>
			              </div>
			            </div>

			            <div class="col-md-3">
			              <div class="work-post">
			                <div class="work-post-gal">
			                  <img alt="" src="upload/image2.jpg">
			                  <div class="hover-box">
			                    <a class="zoom" href="upload/image2.jpg"></a>
			                    <a class="page" href="single-project.html"></a>
			                  </div>
			                </div>
			                <div class="work-post-content">
			                  <h5>باغ سبز</h5>
			                  <span>طبیعت</span>
			                </div>
			              </div>
			            </div>

			            <div class="col-md-3">
			              <div class="work-post">
			                <div class="work-post-gal">
			                  <img alt="" src="upload/image3.jpg">
			                  <div class="hover-box">
			                    <a class="zoom video" href="http://www.youtube.com/watch?v=6v2L2UGZJAM"></a>
			                    <a class="page" href="single-project.html"></a>
			                  </div>
			                </div>
			                <div class="work-post-content">
			                  <h5>بکگراند زیبا</h5>
			                  <span>پس زمینه</span>
			                </div>
			              </div>
			            </div>

			            <div class="col-md-3">
			              <div class="work-post">
			                <div class="work-post-gal">
			                  <img alt="" src="upload/image4.jpg">
			                  <div class="hover-box">
			                    <a class="zoom" href="upload/image4.jpg"></a>
			                    <a class="page" href="single-project.html"></a>
			                  </div>
			                </div>
			                <div class="work-post-content">
			                  <h5>بکگراند زیبا</h5>
			                  <span>فتوشاپ</span>
			                </div>
			              </div>
			            </div>

			          </div>
			        </div>

			        <div class="item">
			          <div class="row">

			            <div class="col-md-3">
			              <div class="work-post">
			                <div class="work-post-gal">
			                  <img alt="" src="upload/image1.jpg">
			                  <div class="hover-box">
			                    <a class="zoom video" href="http://vimeo.com/45878034"></a>
			                    <a class="page" href="single-project.html"></a>
			                  </div>
			                </div>
			                <div class="work-post-content">
			                  <h5>آیفون</h5>
			                  <span>تلفن هوشمند</span>
			                </div>
			              </div>
			            </div>

			            <div class="col-md-3">
			              <div class="work-post">
			                <div class="work-post-gal">
			                  <img alt="" src="upload/image2.jpg">
			                  <div class="hover-box">
			                    <a class="zoom" href="upload/image2.jpg"></a>
			                    <a class="page" href="single-project.html"></a>
			                  </div>
			                </div>
			                <div class="work-post-content">
			                  <h5>باغ سبز</h5>
			                  <span>طبیعت</span>
			                </div>
			              </div>
			            </div>

			            <div class="col-md-3">
			              <div class="work-post">
			                <div class="work-post-gal">
			                  <img alt="" src="upload/image3.jpg">
			                  <div class="hover-box">
			                    <a class="zoom video" href="http://www.youtube.com/watch?v=6v2L2UGZJAM"></a>
			                    <a class="page" href="single-project.html"></a>
			                  </div>
			                </div>
			                <div class="work-post-content">
			                  <h5>بکگراند زیبا</h5>
			                  <span>پس زمینه</span>
			                </div>
			              </div>
			            </div>

			            <div class="col-md-3">
			              <div class="work-post">
			                <div class="work-post-gal">
			                  <img alt="" src="upload/image4.jpg">
			                  <div class="hover-box">
			                    <a class="zoom" href="upload/image4.jpg"></a>
			                    <a class="page" href="single-project.html"></a>
			                  </div>
			                </div>
			                <div class="work-post-content">
			                  <h5>بکگراند زیبا</h5>
			                  <span>فتوشاپ</span>
			                </div>
			              </div>
			            </div>

			          </div>

			        </div>

			      </div>

			      <!-- Controls -->
			      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"></a>
			      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"></a>
			    </div>
			  </div>
			</div>



			<!-- partners box -->
			<div class="partners">
			  <div class="container">
			    <h3>برترین پزشکان</h3>
			    <div id="carousel-example-generic2" class="carousel slide" data-ride="carousel">

			      <!-- Wrapper for slides -->
			      <div class="carousel-inner">

			        <div class="item active">
			          <ul class="partner-list">
			            <li><img alt="" src="images/partners.png"></li>
			            <li><img alt="" src="images/partners.png"></li>
			            <li><img alt="" src="images/partners.png"></li>
			            <li><img alt="" src="images/partners.png"></li>
			            <li><img alt="" src="images/partners.png"></li>
			          </ul>
			        </div>

			        <div class="item">
			          <ul class="partner-list">
			            <li><img alt="" src="images/partners.png"></li>
			            <li><img alt="" src="images/partners.png"></li>
			            <li><img alt="" src="images/partners.png"></li>
			            <li><img alt="" src="images/partners.png"></li>
			            <li><img alt="" src="images/partners.png"></li>
			          </ul>
			        </div>

			      </div>

			      <!-- Controls -->
			      <a class="left carousel-control" href="#carousel-example-generic2" data-slide="prev"></a>
			      <a class="right carousel-control" href="#carousel-example-generic2" data-slide="next"></a>
			    </div>

			  </div>
			</div>



			<!-- login box -->
			<div class="why-convertible-box">
				<div class="convertible-banner">
					<div class="container">
						<div style="margin-right:400px;">
						<span><a href="user/login-user.php">ورود کاربران</a></span>
						<span><a href="<?=url('lab/login')?>">ورود آزمایشگاه ها</a></span>
						<span><a href="<?=url('lab/create')?>">ثبت نام آزمایشگاه</a></span>
					</div>
					</div>
				</div>
			</div>
			<!-- end login box -->

			<!-- Product Box -->
			<div class="product-box">
				<div class="container">
					<h3>ios اپلیکیشن های اندروید و</h3>
					<div id="carousel-example-generic4" class="carousel slide" data-ride="carousel">

		<!-- download apps -->
		<div class="carousel-inner">

		  <div class="item active">
		    <div class="row">
		      <div class="col-md-3">
		        <div class="product-post">
		          <div class="product-post-gal">
		            <img alt="" src="upload/image1.jpg">
		          </div>
		          <div class="product-post-content">
		            <h5>دانلود اپ اندروید کاربران</h5>
		            <ul class="product-list">
		              <li><a class="shop" href="#"><i class="fa fa-shopping-cart"></i></a></li>
		            </ul>
		          </div>
		        </div>
		      </div>

		      <div class="col-md-3">
		        <div class="product-post">
		          <div class="product-post-gal">
		            <img alt="" src="upload/image5.jpg">
		          </div>
		          <div class="product-post-content">
		            <h5>کاربران ios دانلود اپ</h5>
		            <ul class="product-list">
		              <li><a class="shop" href="#"><i class="fa fa-shopping-cart"></i></a></li>
		            </ul>
		          </div>
		        </div>
		      </div>

		      <div class="col-md-3">
		        <div class="product-post">
		          <div class="product-post-gal">
		            <img alt="" src="upload/image6.jpg">
		          </div>
		          <div class="product-post-content">
		            <h5>دانلود اپ اندروید پزشکان</h5>
		            <ul class="product-list">
		              <li><a class="shop" href="#"><i class="fa fa-shopping-cart"></i></a></li>
		            </ul>
		          </div>
		        </div>
		      </div>

		      <div class="col-md-3">
		        <div class="product-post">
		          <div class="product-post-gal">
		            <img alt="" src="upload/image7.jpg">
		          </div>
		          <div class="product-post-content">
		            <h5>پزشکان ios دانلود اپ</h5>
		            <ul class="product-list">
		              <li><a class="shop" href="#"><i class="fa fa-shopping-cart"></i></a></li>
		            </ul>
		          </div>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>

		<!-- Controls -->

		</div>
		</div>
		</div>

    <!-- end download apps -->

			<!-- Convertible-banner -->
			<div class="convertible-banner">
				<div class="container">
					<a href="#">اطلاعات بیشتر</a>
					<p><span></span>لورم ایپسوم یا طرح‌نما به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود</p>
				</div>
			</div>
			<!-- End Convertible-banner -->

		</div>
		<!-- End content -->


		<!-- footer -->
		<footer>
		  <div class="up-footer">
		    <div class="container">
		      <div class="row">

		        <div class="col-md-3">

		          <div class="widget footer-widgets info-widget">
		            <h4>اطلاعات تماس</h4>
		            <ul class="contact-list">
		              <li><a class="phone" href="#"><i class="fa fa-phone"></i> ٥٦٧٨ - ٩٠</a></li>
		              <li><a class="mail" href="#"><i class="fa fa-envelope"></i> contact@yourdomain.com</a></li>
		              <li><a class="address" href="#"><i class="fa fa-home"></i> آدرس - تهران - خیابان</a></li>
		            </ul>
		          </div>

		        </div>

		        <div class="col-md-3">
		          <div class="widget footer-widgets flickr-widget">
		            <h4>قوانین و مقررات</h4>
		            <ul class="flickr-list">
		            </ul>
		          </div>

		        </div>

		        <div class="col-md-3">
		          <div class="widget footer-widgets tag-widget">
		            <h4>همکاری با ما</h4>
		            <ul class="tag-widget-list">
		          </div>

		        </div>

		        <div class="col-md-3">
		          <div class="widget footer-widgets work-widget">
		            <h4>اطلاعیه ها</h4>
		            <p></p>
		            <p class="work-time"><span>ساعت کاری </span><span>شنبه تا چهارشنبه</span>: 9 صبح تا 18 عصر</p>
		          </div>

		        </div>

		      </div>
		    </div>
		  </div>

		  <div class="footer-line">
		    <div class="container">
		      <p>کلیه حقوق محفوظ است</p>
		      <a class="go-top" href="#"></a>
		    </div>
		  </div>

		</footer>
		<!-- End footer -->

	</div>
	<!-- End Container -->

	<!--
	##############################
	 - ACTIVATE THE BANNER HERE -
	##############################
	-->
	<script type="text/javascript">

	  var tpj=jQuery;
	  tpj.noConflict();

	  tpj(document).ready(function() {

	  if (tpj.fn.cssOriginal!=undefined)
	    tpj.fn.css = tpj.fn.cssOriginal;

	    var api = tpj('.fullwidthbanner').revolution(
	      {
	        delay:8000,
	        startwidth:1170,
	        startheight:580,

	        onHoverStop:"off",						// Stop Banner Timet at Hover on Slide on/off

	        thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
	        thumbHeight:50,
	        thumbAmount:3,

	        hideThumbs:0,
	        navigationType:"bullet",				// bullet, thumb, none
	        navigationArrows:"solo",				// nexttobullets, solo (old name verticalcentered), none

	        navigationStyle:"round",				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom


	        navigationHAlign:"center",				// Vertical Align top,center,bottom
	        navigationVAlign:"bottom",					// Horizontal Align left,center,right
	        navigationHOffset:30,
	        navigationVOffset: 40,

	        soloArrowLeftHalign:"left",
	        soloArrowLeftValign:"center",
	        soloArrowLeftHOffset:20,
	        soloArrowLeftVOffset:0,

	        soloArrowRightHalign:"right",
	        soloArrowRightValign:"center",
	        soloArrowRightHOffset:20,
	        soloArrowRightVOffset:0,

	        touchenabled:"on",						// Enable Swipe Function : on/off


	        stopAtSlide:-1,							// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
	        stopAfterLoops:-1,						// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

	        hideCaptionAtLimit:0,					// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
	        hideAllCaptionAtLilmit:0,				// Hide all The Captions if Width of Browser is less then this value
	        hideSliderAtLimit:0,					// Hide the whole slider, and stop also functions if Width of Browser is less than this value


	        fullWidth:"on",

	        shadow:1								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)

	      });


	      // TO HIDE THE ARROWS SEPERATLY FROM THE BULLETS, SOME TRICK HERE:
	      // YOU CAN REMOVE IT FROM HERE TILL THE END OF THIS SECTION IF YOU DONT NEED THIS !
	        api.bind("revolution.slide.onloaded",function (e) {


	          jQuery('.tparrows').each(function() {
	            var arrows=jQuery(this);

	            var timer = setInterval(function() {

	              if (arrows.css('opacity') == 1 && !jQuery('.tp-simpleresponsive').hasClass("mouseisover"))
	                arrows.fadeOut(300);
	            },3000);
	          })

	          jQuery('.tp-simpleresponsive, .tparrows').hover(function() {
	            jQuery('.tp-simpleresponsive').addClass("mouseisover");
	            jQuery('body').find('.tparrows').each(function() {
	              jQuery(this).fadeIn(300);
	            });
	          }, function() {
	            if (!jQuery(this).hasClass("tparrows"))
	              jQuery('.tp-simpleresponsive').removeClass("mouseisover");
	          })
	        });
	      // END OF THE SECTION, HIDE MY ARROWS SEPERATLY FROM THE BULLETS
	    });
	</script>
	<script>
	  jQuery(function(){
	    DevSolutionSkill.init('circle');
	    DevSolutionSkill.init('circle2');
	    DevSolutionSkill.init('circle3');
	    DevSolutionSkill.init('circle4');
	    DevSolutionSkill.init('circle5');
	    DevSolutionSkill.init('circle6');
	  });
	</script>
</body>
</html>
