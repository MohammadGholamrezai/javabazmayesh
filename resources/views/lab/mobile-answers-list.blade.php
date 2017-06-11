@extends('layouts.panel')
<style type="text/css">
@font-face {
    font-family:"Yekan";
    src: url('../fonts/Yekan.ttf');
}
body{
  font-family: "Yekan";
}
.box{
  border:1px solid white;
  border-radius:5px;
  margin-left:45px;
  margin-right: 45px;
  padding: 10px;
  height: auto;
}
  </style>
  <script type="text/javascript" src="<?=url('js/jquery-1.9.1.min.js')?>"></script>
@section('content')

  <div class="row">
    <div class="box" style="margin-top:25px;">
     <div style="font-size:20px;" align="center">  <label>لیست آزمایش های ارسالی</label>  </div>
    </div>
    <div class="box" style="margin-top:5px;">
        <form id="sendAnswerFrm" name="answer"  action="<?=url('mobile-list')?>"  method="post" class="form-horizontal">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <span>
            <label class="col-lg-4 col-md-4 col-sm-5 col-xs-12 control-label"><span style="color:black;font-size:14px;">تلفن همراه:  </span></label>
            <div class="col-lg-3 col-md-4 col-sm-8 col-xs-12">
                <input type="text" class="form-control" name="mobile" id="mobile" maxlength="11" dir="ltr" onkeypress='numberValidate(event)' title='فقط بصورت عددی وارد شود'>
            </div>
          </span>
          <span style="color:red;">
          @if($errors->has('mobile'))
          {!! $errors->first('mobile') !!}
          @endif
         </span>
         </div>

         <div class="form-group">
              <span class="col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-5">
                <button type="submit" name="btn-search" id="btn-search" style="margin-right:15px;width:70px;margin-top:-2px;height:35px;font-size:12px;"
                class="btn btn-primary text-center" aria-label="Right Align">جستجو</button>
              </span>
        </div>
         </form>
    </div>
     </div>


         <div id="search">
         <div style="font-size:16px;font-weight:bold;" align="center"><span> آزمایش های ارسال شده برای شماره </span><span style="color:red;">@if(Session::has('mobile')) {{ $mobile=Session::get('mobile') }} @endif</span></div>
         <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
         <div class="item news-item col-lg-10 col-md-12 col-sm-12 col-xs-12" style="background-color:#9abbec;border:1px;border-radius:5px;padding-top:15px;padding:7px;margin-left:5px;margin-right:5px;margin-bottom:2px;
         margin-bottom:-10px;border:1px solid #cecdcd;">
         <span class="col-lg-2 col-md-2 col-sm-1 col-xs-1"><p style="color:black;font-weight:bold;">شماره همراه</p></span>
         <span class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><p style="color:black;font-weight:bold;">تاریخ</p></span>
         <span class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><p style="color:black;font-weight:bold;">ساعت</p></span>
         <span class="col-lg-5 col-md-5 col-sm-6 col-xs-6"><p style="color:black;font-weight:bold;">فایل</p></span>
         <span class="col-lg-1 col-md-1 col-sm-1 col-xs-1"><p style="color:black;font-weight:bold;">حذف</p></span>
         </div>
         </div>

              <?php
              if(Session::has('dedicatedAnswers'))
              {
                $dedicatedAnswers=Session::get('dedicatedAnswers');
                foreach($dedicatedAnswers as $rows2)
                {
                  echo '

               <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-12">
               <div class="item news-item col-lg-10 col-md-12 col-sm-12 col-xs-12" style="background-color:#e1e2e8;border:1px;border-radius:5px;padding-top:15px;padding:7px;margin-left:5px;margin-right:5px;margin-bottom:1px;
               border:1px solid #cecdcd;margin-bottom:-12px;">
               <span class="col-lg-2 col-md-2 col-sm-1 col-xs-1"><p style="color:black;font-weight:bold;">'.$rows2->mobile.'</p></span>
               <span class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><p style="color:black;font-weight:bold;">'.$rows2->datetime.'</p></span>
               <span class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><p style="color:black;font-weight:bold;">'.$rows2->time.'</p></span>
               <span class="col-lg-5 col-md-5 col-sm-6 col-xs-6"><p style="color:black;font-weight:bold;font-size:10px;">'.$rows2->file_url.'</p></span>
               </div>
               </div>
               ';
             }
              echo '
             <!-- paging -->
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
             ';
               echo $dedicatedAnswers->render();
            echo '
             </div>
             <!-- end paging -->
             </div>
             ';
             }
            ?>


@endsection
