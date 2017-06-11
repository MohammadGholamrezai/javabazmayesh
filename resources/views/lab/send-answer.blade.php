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
}
  </style>
@section('content')

@if(Session::has('answer-sent'))
{!! '<div class="alert alert-success" role="alert" align="center">جواب آزمایش با موفقیت ارسال شد</div>' !!}
@endif
@if(Session::has('pasvand-error'))
{!! '<div class="alert alert-danger" role="alert" align="center">فایل ارسالی باید از نوع تصویر یا pdf باشد!</div>' !!}
@endif
@if(Session::has('mobile-error'))
{!! '<div class="alert alert-danger" role="alert" align="center">کاربری با شماره همراه وارد شده ثبت نشده است!</div>' !!}
@endif
<div class="row" style="margin-top:50px;">
   <div class="box" style="font-family:Yekan;font-size:20px;margin-bottom:20px;" align="center">  <label >ارسال جواب آزمایش</label>  </div>
   <div class="box" style="margin-top:-15px;">
   <div class="col-lg-offset-4 col-md-offset-3 col-sm-offset-3" >
     <form id="sendAnswerFrm" name="answer"  action="<?= url('lab/send-answer') ?>"  method="post" class="form-horizontal" enctype="multipart/form-data">
       <input type="hidden" name="_token" value="{{ csrf_token() }}">
       <div class="form-group">
         <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label" dir="rtl"><span style="color:black;font-size:14px;font-family:Yekan;">تلفن همراه:  </span></label>
         <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
             <input type="text" class="form-control" name="mobile" id="mobile" maxlength="11" dir="ltr" onkeypress='numberValidate(event)' title='فقط بصورت عددی وارد شود' value="{{ old('mobile') }}">
             <span style="color:red;">
             @if($errors->has('mobile'))
             {!! $errors->first('mobile') !!}
             @endif
           </span>
         </div>
       </div>

       <div class="form-group">
         <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label"><span style="color:black;font-size:14px;font-family:Yekan;">بارگذاری جواب آزمایش:</span></label>
         <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
             <input type="file" name="file" id="file">
             <span style="color:red;">
             @if($errors->has('file'))
             {!! $errors->first('file') !!}
             @endif
           </span>
         </div>
       </div>

       <div class="form-group">
         <div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-12" align="right">
                     <button type="submit" name="btn-send-answer" id="btn-send-answer" style="width:90px;height:35px;font-size:13px;font-family:Yekan;" class="btn btn-primary text-center" aria-label="Right Align"> ارسال</button>

                 </div>
               </div>
             </form>
   </div>
 </div>

   </div>
@endsection
