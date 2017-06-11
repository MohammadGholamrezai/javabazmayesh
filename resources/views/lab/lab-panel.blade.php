<html lang="fa" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>پنل آزمایشگاه</title>
<link type="text/css" rel="stylesheet" href="<?=url('css/panel/style.css')?>">
<link rel="stylesheet" href="<?= url("css/bootstrap.css") ?>" type="text/css" media="screen">
<link rel="stylesheet" href="<?= url("css/rtl-bootstrap.css") ?>" type="text/css" media="screen">

<script type="text/javascript" src="<?=url('js/jquery-1.9.1.min.js')?>"></script>
<script type="text/javascript" src="<?=url('js/panel/jquery.flot.js')?>"></script>
<script type="text/javascript" src="<?=url('js/panel/doc.js')?>"></script>
</head>
<style>
@font-face {
    font-family:"Yekan";
    src: url('../fonts/Yekan.ttf');
}
body{
  font-family: "Yekan";
}
.exit a{
  text-decoration: none;
}
.exit a:hover{
  text-decoration: none;
  color:red;
  font-weight: bold;
}
  </style>
  <script>
  function del()
  {
    alert("hiiiiiiiii");
  }
  </script>


<body dir="rtl" style="font-family:Yekan;">
	<div class="container-fluid">
		<div class="row" style="background-color:black;height:145px;padding-top:25px;">
			<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">


	                <div>
	                <span class="col-lg-offset-1 col-md-offset-1 col-sm-hidden col-xs-hidden"><img src="<?=url('upload/logo/'.$laboratory->lab_img)?>" style="width:100px;height:80px;border-radius:5px;margin-top:-3px;padding-bottom:1px;margin-right:30px;"></span>
	                <span class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2" style="color:white;font-size:26px;font-family:Yekan;"><?= $laboratory->lab_name ?></span>
									<span class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2" style="color:white;font-size:14px;font-family:Yekan;">تاریخ عضویت:  </span>
	                <span style="color:yellow;font-size:14px;font-family:Yekan;margin-right:-255px;"><?= $laboratory->register_date ?></span>
	                <span class="exit col-lg-offset-1 col-md-offset-0 col-sm-offset-1 col-xs-offset-1" style="margin-right:75px;font-family:Yekan;"><a style="font-family:Yekan;" href="<?=url('exitLab')?>">خروج <span class="glyphicon glyphicon-off" aria-hidden="true"></span></a></span>
	                </div>

			</div>
		</div>

	  <div class="row">
	    <div class="body_style">

	      <marquee style="margin-top:1px;margin-bottom:-10px;height:55px;font-size:14px;font-family:Yekan;background-color:gray;padding-top:15px;color:white;" direction="right" onmouseover="this.stop()" onmouseout="this.start()" scrolldelay="130" truespeed loop="-1">
	        اعلانات سایت:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	       <a style="" href=""></a>
	       </marquee>


			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="font-family:Yekan;">
	      <!-- menu  -->

	        <div class="nav">
	            <ul>
	                  <li>
	                    <div class="fix">
	                          <span class="ico"><img src="<?=url('images-panel/image/ico2.png')?>"></span>
	                          <span class="value" style="font-family:Yekan;">ارسال جواب آزمایش</span>
	                      </div>
	                      <ul>
	                        <li>
	                           <a href="<?=url('lab/send-answer')?>" target="frame" style="font-family:Yekan;">ارسال جواب آزمایش</a>
	                        </li>
	                      </ul>
	                  </li>
	                  <li>
	                  <div class="fix">
	                      <span class="ico"><img src="<?=url('images-panel/image/ico3.png')?>"></span>
	                      <span class="value" style="font-family:Yekan;">لیست آزمایش های ارسال شده</span>
	                  </div>
	                      <ul>
	                        <li>
	                           <a href="<?=url('lab/answers-list')?>" target="frame" style="font-family:Yekan;">آخرین لیست آزمایش های ارسالی</a>
                             <!-- <a href="<?=url('lab/mobile-answers')?>" target="frame" style="font-family:Yekan;">لیست آزمایش های ارسالی بر اساس فیلتر شماره همراه</a> -->

	                        </li>
	                      </ul>
	                  </li>
	                  <li>
	                  <div class="fix">
	                      <span class="ico"><img src="<?=url('images-panel/image/ico4.png')?>"></span>
	                      <span class="value" style="font-family:Yekan;">گزارش</span>
	                  </div>
	                      <ul>
	                        <li><a href="<?=url('lab/report')?>" target="frame" style="font-family:Yekan;">گزارش</a></li>
	                      </ul>
	                  </li>
	                  <li>
	                  <div class="fix">
	                       <span class="ico"><img src="<?=url('images-panel/image/ico5.png')?>"></span>
	                      <span class="value" style="font-family:Yekan;">حساب کاربری</span>
	                  </div>
	                      <ul>
	                                <li><a  href="lab-user-account.php" target="_blank" style="font-family:Yekan;">تمدید حساب</a></li>
	                                <li><a  href="account-transactions.php" target="frame" style="font-family:Yekan;">گردش حساب</a></li>
	                      </ul>
	                  </li>
	                  <li>
	                  <div class="fix">
	                       <span class="ico"><img src="<?=url('images-panel/image/ico6.png')?>"></span>
	                      <span class="value" style="font-family:Yekan;">ویرایش اطلاعات</span>
	                  </div>
	                  <ul>
	                    <li><a href="edit-profile.php" target="frame" style="font-family:Yekan;">ویرایش اطلاعات</a></li>
	                      <li><a href="edit-image.php" target="frame" style="font-family:Yekan;">ویرایش تصویر</a></li>
	                      <li><a href="change-pass.php" target="frame" style="font-family:Yekan;">تغییر کلمه عبور</a></li>


	                  </ul>
	                  </li>
	                  <li>
	                  <div class="fix">
	                       <span class="ico"><img src="<?=url('images-panel/image/ico6.png')?>"></span>
	                      <span class="value" style="font-family:Yekan;">درخواست پشتیبانی</span>
	                  </div>
	                  <ul>
	                    <li><a href="send-ticket.php" target="frame" style="font-family:Yekan;">ارسال تیکت</a></li>
	                    <li><a href="ticket-status.php" target="frame" style="font-family:Yekan;">وضعیت تیکت ها</a></li>
	                  </ul>
	                  </li>
	                  <li>
	                    <div class="fix">
	                          <span class="ico"><img src="<?=url('images-panel/image/ico7.png')?>"></span>
	                          <span class="value" style="font-family:Yekan;">خروج</span>
	                      </div>
	                      <ul>
	                        <li><a href="<?=url('exitLab')?>" target="_self" style="font-family:Yekan;">خروج</a></li>
	                      </ul>
	                  </li>
	              </ul>
	          </div>
	      <!-- end menu -->


	      <!-- notification -->
	     <div style="font-family:Yekan;">
	       <h2 style="font-family:Yekan;" >اعلانات ادمین</h2>
	       <div class="alert alert-info" role="alert" style="margin-bottom:2px;">این یک اعلان است.</div>
	       <div class="alert alert-info" role="alert" style="margin-bottom:2px;">این یک اعلان است.</div>
	       <div class="alert alert-info" role="alert" style="margin-bottom:2px;">این یک اعلان است.</div>
	       <div class="alert alert-info" role="alert" style="margin-bottom:2px;">این یک اعلان است.</div>
	     </div>
	      <!-- end notification -->
	    </div>

      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <!-- content -->
      <div class="content" style="margin-right:-15px;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h2 style="font-family:Yekan;">منو افقی</h2>
        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2" align="center">
        <ul data-collapse="collapse" class="quick">
            <li>
                <a href="#">
                    <img alt="" src="<?=url("images-panel/image/statistics.png")?>">
                    <span>وضعیت کلی</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <img alt="" src="<?=url("images-panel/image/order-149.png")?>">
                    <span>لیست فعالیت ها</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <img alt="" src="<?=url("images-panel/image/shipping.png")?>">
                    <span>مرسوله ها</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <img alt="" src="<?=url("images-panel/image/my-account.png")?>">
                    <span>مدیریت حساب</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <img alt="" src="<?=url("images-panel/image/full-time.png")?>">
                    <span>تنظیمات زمان</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <img alt="" src="<?=url("images-panel/image/date.png")?>">
                    <span>رخداد ها</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <img alt="" src="<?=url("images-panel/image/lock.png")?>">
                    <span>تنظیمات امنیتی</span>
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <img alt="" src="<?=url("images-panel/image/refresh.png")?>">
                    <span>خروج</span>
                </a>
            </li>
        </ul>
      </div>
      <!-- main-iframe -->
      <h2 ></h2>
      <div>

        <iframe class="col-lg-12 col-md-12 col-sm-12 col-xs-12" name="frame" scrolling="auto" frameborder="0" style="height:1000px;">
        </iframe>
      </div>
      <!-- end main-iframe -->
      </div>
      <!-- end content -->
          </div>


	  </div>
	</div>
	</div>
</body>
</html>
