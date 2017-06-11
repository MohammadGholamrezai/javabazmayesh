@extends('layouts.index')
<style type="text/css">
@font-face {
    font-family:"Yekan";
    src: url('../fonts/Yekan.ttf');
}
body{
  font-family: "Yekan";
}
  </style>
@section('content')

@if(Session::has('register-ok'))
{!! '<div class="alert alert-success" role="alert" align="center">ثبت نام شما با موفقیت انجام شد</div>' !!}
@endif
		<div id="content" style="margin-top:15px;">
      <div class="container"  align="center">
        <div class="row" align="center">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
          <center><div class="txtcbody">

      <form id="register" name="register"  action="<?=url('lab/store')?>"  method="post" class="form-horizontal" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
      <div class="form-group">
        <label class="col-lg-5 col-md-5 col-sm-5 col-xs-12 control-label"><span style="color:black;font-size:14px;">نام آزمایشگاه: </span></label>
        <div class="col-lg-3 col-md-5 col-sm-10 col-xs-12">
            <input type="text" class="form-control persian" name="lab_name" id="lab_name" value="{{ old('lab_name') }}">
        </div>
        <span style="color:red;">
        @if ($errors->has('lab_name'))
        {!! $errors->first('lab_name') !!}
        @endif
       </span>
      </div>

      <div class="form-group">
        <label class="col-lg-5 col-md-5 col-sm-5 col-xs-12 control-label"><span style="color:black;font-size:14px;">آپلود لوگو:  </span></label>
        <div class="col-lg-3 col-md-5 col-sm-10 col-xs-12">
            <input type="file" name="logo" id="logo" value="{{ old('logo') }}">
        </div>
        <span style="color:red;">
        @if ($errors->has('logo'))
        {!! $errors->first('logo') !!}
        @endif
       </span>
      </div>

      <div class="form-group">
        <label class="col-lg-5 col-md-5 col-sm-5 col-xs-12 control-label"><span style="color:black;font-size:14px;"> نام کاربری: </span></label>
        <div class="col-lg-3 col-md-5 col-sm-10 col-xs-12">
            <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}">
        </div>
        <span style="color:red;">
        @if ($errors->has('username'))
        {!! $errors->first('username') !!}
        @endif
       </span>
      </div>

      <div class="form-group">
        <label class="col-lg-5 col-md-5 col-sm-5 col-xs-12 control-label"><span style="color:black;font-size:14px;"> کلمه عبور:   </span></label>
        <div class="col-lg-3 col-md-5 col-sm-10 col-xs-12">
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <span style="color:red;">
        @if ($errors->has('password'))
        {!! $errors->first('password') !!}
        @endif
       </span>
      </div>

      <div class="form-group">
        <label class="col-lg-5 col-md-5 col-sm-5 col-xs-12 control-label"><span style="color:black;font-size:14px;">تکرار کلمه عبور:  </span></label>
        <div class="col-lg-3 col-md-5 col-sm-10 col-xs-12">
            <input type="password" class="form-control" name="rePass" id="rePass">
        </div>
        <span style="color:red;">
        @if ($errors->has('rePass'))
        {!! $errors->first('rePass') !!}
        @endif
       </span>
      </div>

      <div class="form-group">
        <label class="col-lg-offset-0 col-md-5 col-sm-5 col-xs-12 control-label"><span style="color:black;font-size:14px;">بیمه های طرف قرارداد:   </span></label>
        <div class="col-lg-3 col-md-5 col-sm-10 col-xs-12">
              <?php
              $results=DB::select('SELECT * FROM `insurances`ORDER BY `id` DESC');
              foreach($results as $rows)
              {
                echo '<span><input type="checkbox" class=" persian" name="insurance[]" id="insurance" value="'.$rows->id.'"></span>&nbsp;<span>'.$rows->name.'</span>&nbsp;&nbsp;&nbsp;';
              }
               ?>

        </div>
        <span style="color:red;">
        @if ($errors->has('insurance'))
        {!! $errors->first('insurance') !!}
        @endif
       </span>
       </div>

      <div class="form-group">
        <label class="col-lg-5 col-md-5 col-sm-5 col-xs-12 control-label"><span style="color:black;font-size:14px;">ایمیل:  </span></label>
        <div class="col-lg-3 col-md-5 col-sm-10 col-xs-12">
            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
        </div>
        <span style="color:red;">
        @if ($errors->has('email'))
        {!! $errors->first('email') !!}
        @endif
       </span>
      </div>

      <div class="form-group">
        <label class="col-lg-5 col-md-5 col-sm-5 col-xs-12 control-label"><span style="color:black;font-size:14px;">تلفن همراه:  </span></label>
        <div class="col-lg-3 col-md-5 col-sm-10 col-xs-12">
            <input type="text" class="form-control" name="mobile" id="mobile" maxlength="11" dir="ltr" onkeypress='numberValidate(event)' title='فقط بصورت عددی وارد شود' value="{{ old('mobile') }}">
        </div>
        <span style="color:red;">
        @if ($errors->has('mobile'))
        {!! $errors->first('mobile') !!}
        @endif
       </span>
      </div>

      <div class="form-group">
        <label class="col-lg-5 col-md-5 col-sm-5 col-xs-12 control-label"><span style="color:black;font-size:14px;">تلفن: </span></label>
        <div class="col-lg-3 col-md-5 col-sm-10 col-xs-12">
            <input type="text" class="form-control" name="telephone" id="telephone" dir="ltr" maxlength="8" onkeypress='numberValidate(event)' title='فقط بصورت عددی وارد شود' value="{{ old('telephone') }}">
        </div>
        <span style="color:red;">
        @if ($errors->has('telephone'))
        {!! $errors->first('telephone') !!}
        @endif
       </span>
      </div>

      <div class="form-group">
        <label class="col-lg-5 col-md-5 col-sm-5 col-xs-12 control-label"><span style="color:black;font-size:14px;">کد پستی (10 رقمی): </span></label>
        <div class="col-lg-3 col-md-5 col-sm-10 col-xs-12">
            <input type="text" class="form-control" name="postal_code" id="postal_code" maxlength="10" onkeypress='numberValidate(event)' title='فقط بصورت عددی وارد شود' value="{{ old('postal_code') }}">
        </div>
        <span style="color:red;">
        @if ($errors->has('postal_code'))
        {!! $errors->first('postal_code') !!}
        @endif
       </span>
      </div>

      <div class="form-group">
        <label class="col-lg-5 col-md-5 col-sm-5 col-xs-12 control-label"><span style="color:black;font-size:14px;"> استان: </span></label>
        <div class="col-lg-3 col-md-5 col-sm-10 col-xs-12">
          <select name="province" id="province"  class="form-control" >
            <<option value="تهران">تهران</option>
          </select>
              </div>
      </div>

      <div class="form-group">
        <label class="col-lg-5 col-md-5 col-sm-5 col-xs-12 control-label"><span style="color:black;font-size:14px;"> شهر:  </span></label>
        <div class="col-lg-3 col-md-5 col-sm-10 col-xs-12">
          <select name="city" id="city"  class="form-control" >
            <option>تهران</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-5 col-md-5 col-sm-5 col-xs-12 control-label"><span style="color:black;font-size:14px;"> منطقه / محله: </span></label>
        <div class="col-lg-3 col-md-5 col-sm-10 col-xs-12">
          <input type="text" class="form-control" name="part" id="part" value="{{ old('part') }}">
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-5 col-md-5 col-sm-5 col-xs-12 control-label"><span style="color:black;font-size:14px;"> آدرس:  </span></label>
        <div class="col-lg-3 col-md-5 col-sm-10 col-xs-12">
          <textarea name="address" id="address" rows="4" cols="40" class="form-control" >{{ old('address') }}</textarea>
        </div>
        <span style="color:red;">
        @if ($errors->has('address'))
        {!! $errors->first('address') !!}
        @endif
       </span>
      </div>

      <div class="form-group">
        <label class="col-lg-5 col-md-5 col-sm-5 col-xs-12 control-label"><span style="color:black;font-size:14px;"> آدرس وب سایت:  </span></label>
        <div class="col-lg-3 col-md-5 col-sm-10 col-xs-12">
            <input type="text" class="form-control" name="lab_site" id="lab_site" dir="ltr" value="{{ old('lab_site') }}">
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-5 col-md-5 col-sm-5 col-xs-12 control-label"><span style="color:black;font-size:14px;">آزمایشهای تخصصی:   </span></label>
        <div class="col-lg-3 col-md-5 col-sm-10 col-xs-12">
          <textarea name="azmayesh" id="azmayesh" rows="4" cols="40" class="form-control">{{ old('azmayesh')}} </textarea>
        </div>
        <span style="color:red;">
        @if ($errors->has('azmayesh'))
        {!! $errors->first('azmayesh') !!}
        @endif
       </span>
      </div>

      <div class="form-group">
        <label class="col-lg-5 col-md-5 col-sm-5 col-xs-12 control-label"><span style="color:black;font-size:14px;">توضییحات:   </span></label>
        <div class="col-lg-3 col-md-5 col-sm-10 col-xs-12">
          <textarea name="comments" id="comments" rows="4" cols="40" class="form-control">{{ old('comments') }}</textarea>
        </div>
      </div>

      <div class="form-group">
        <div class="col-lg-offset-1 col-md-offset-3 col-sm" align="center">
                    <button type="submit" name="btn-register-lab" id="btn-register-lab" style="width:100px;font-size:14px;" class="btn btn-primary text-center" aria-label="Right Align">ثبت </button>

                </div>
              </div>
      </form>

      <script>
      $(document).ready(function(){
        $( 'body' ).on( 'keypress', 'input.persian', function( e ) {
    // backspace, delete, tab, escape, enter
    if ( $.inArray(e.keyCode, [ 46, 8, 9, 27, 13 ]) !== -1 ||
       // Ctrl+A
      ( ( e.charCode == 65 || e.charCode == 97 ) && e.ctrlKey === true ) ||
       // home, end, left, right
      ( e.keyCode >= 35 && e.keyCode <= 39 ) ) {
         return;
    }
    if ( -1 == $.inArray( String.fromCharCode( e.charCode ), ['‌', ' ', 'آ','ا','ب','پ','ت','ث','ج','چ','ح','خ','د','ذ','ر','ز','ژ','س','ش','ص','ض','ط','ظ','ع','غ','ف','ق','ک','گ','ل','م','ن','و','ه','ی','ي','ك','ة'] ) ) {
      e.preventDefault();
    }

  } );
      });
      </script>

      </div>
    </center>
      </div>
      </div>
      </div>

	  </div>
	<!-- End Content -->
  @endsection
