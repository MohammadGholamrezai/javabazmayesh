@extends('layouts.panel')
<style type="text/css">
@font-face {
    font-family:"Yekan";
    src: url('../fonts/Yekan.ttf');
}
body{
  font-family: "Yekan";
  font-size:14px;
}
.box{
  border:1px solid white;
  border-radius:5px;
  margin-left:45px;
  margin-right: 45px;
  padding: 10px;
}
.box2{
  border:1px;
  border-radius:5px;
  margin-left:45px;
  margin-right: 45px;
  padding: 10px;
}
  </style>
@section('content')
<div class="container-fluid">
  <div class="row" style="margin-top:20px;">
     <div style="font-family:Yekan;font-size:20px;" align="center"> </div>
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom:10px;">
       <form id="reportFrm" name="report"  action="<?=url('lab/check-report')?>"  method="get" class="form-horizontal">

         <div class="form-group" align="center">
           <div class="box" style="margin-right:35px;">
           <div style="font-size:16px;font-weight:bold;font-family:Yekan;">گزارش گیری</div>
         </div>
       </div>


         <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
         <div  class="col-lg-11 col-md-11 col-sm-11 col-xs-11" style="border:1px solid #4f4cc7;border-radius:3px;padding:5px;padding-top:10px;">
         <div class="form-group col-lg-8 col-md-8 col-sm-10 col-xs-12">
           <span>
           <label class="col-lg-1 col-md-1 col-sm-1 col-xs-12 control-label"><span style="color:black;font-size:14px;font-family:Yekan;margin-right:5px;">روز</span></label>
           <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
               <select name="day" class="form-control" >
                 <option>01</option>
                 <option>02</option>
                 <option>03</option>
                 <option>04</option>
                 <option>05</option>
                 <option>06</option>
                 <option>07</option>
                 <option>08</option>
                 <option>09</option>
                 <option>10</option>
                 <option>11</option>
                 <option>12</option>
                 <option>13</option>
                 <option>14</option>
                 <option>15</option>
                 <option>16</option>
                 <option>17</option>
                 <option>18</option>
                 <option>19</option>
                 <option>20</option>
                 <option>21</option>
                 <option>22</option>
                 <option>23</option>
                 <option>24</option>
                 <option>25</option>
                 <option>26</option>
                 <option>27</option>
                 <option>28</option>
                 <option>29</option>
                 <option>30</option>
                 <option>31</option>

               </select>
           </div>
          </span>

         <span>
         <label class="col-lg-1 col-md-1 col-sm-1 col-xs-12 control-label"><span style="color:black;font-size:14px;font-family:Yekan;margin-right:5px;">ماه</span></label>
         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
             <select name="month" class="form-control" >
               <option>01</option>
               <option>02</option>
               <option>03</option>
               <option>04</option>
               <option>05</option>
               <option>06</option>
               <option>07</option>
               <option>08</option>
               <option>09</option>
               <option>10</option>
               <option>11</option>
               <option>12</option>
            </select>
         </div>
        </span>

       <span>
       <label class="col-lg-1 col-md-1 col-sm-1 col-xs-12 control-label"><span style="color:black;font-size:14px;font-family:Yekan;margin-right:5px;">سال </span></label>
       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
           <select name="year" class="form-control" >
             <option>96</option>
             <option>97</option>
             <option>98</option>
             <option>99</option>
          </select>
       </div>
      </span>
    </div>

        <div class="form-group">
             <span class="col-lg-2 col-md-1 col-sm-2 col-xs-12" >
               <button type="submit" name="btn-report" style="width:70px;margin-top:-2px;height:35px;font-size:12px;font-family:Yekan;margin-right:15px;"
               class="btn btn-primary text-center" aria-label="Right Align">جستجو</button>
             </span>
       </div>
       </form>
    </div>
  </div>
</div>

        @if(isset($report))
        <div class="row">
          <div class="box2 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
          <form id="reportFrm" name="report"  action="<?=url('lab/answersList/export')?>"  method="get" class="form-horizontal">

            <span class="form-group col-lg-1">
                 <span style="margin-top:5px;">
                   <button type="submit" name="btn-excel" style="margin-right:15px;width:85px;margin-top:-2px;height:35px;font-size:12px;font-family:Yekan;"
                   class="btn btn-default text-center" aria-label="Right Align">گزارش Excel</button>
                 </span>
           </span>
          </form>
        </div>
      </div>
        @endif


       </div>




<div class="row" style="font-size:14px;">
                   @if(isset($report))
                     <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
                     <div class="item news-item col-lg-11 col-md-11 col-sm-11 col-xs-11" style="background-color:#9abbec;border:1px;border-radius:5px;padding-top:15px;padding:7px;margin-left:5px;margin-right:5px;margin-bottom:2px;
                     border:1px solid #cecdcd;margin-bottom:-10px;">
                       <span class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><p style="color:black;font-weight:bold;font-family:Yekan;">شماره همراه</p></span>
                       <span class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><p style="color:black;font-weight:bold;font-family:Yekan;">تاریخ</p></span>
                       <span class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><p style="color:black;font-weight:bold;font-family:Yekan;">ساعت</p></span>
                       <span class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><p style="color:black;font-weight:bold;font-family:Yekan;">فایل ارسال شده</p></span>
                     </div>
                   </div>

                     @foreach($report as $rows)
                       <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
                       <div class="item news-item col-lg-11 col-md-11 col-sm-11 col-xs-11" style="background-color:#e1e2e8;border:1px;border-radius:5px;padding-top:15px;padding:7px;margin-left:5px;margin-right:5px;
                       margin-bottom:1px;border:1px solid #cecdcd;margin-bottom:-12px;">
                         <span class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><p style="color:black;font-family:Yekan;font-size:14px;">{{ $rows->mobile }}</p></span>
                         <span class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><p style="color:black;font-family:Yekan;font-size:14px;">{{ $rows->datetime }}</p></span>
                         <span class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><p style="color:black;font-family:Yekan;font-size:14px;">{{ $rows->time }}</p></span>
                         <span class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><p style="color:black;font-family:Yekan;font-size:10px;">{{ $rows->file_url }}</p></span>
                       </div>
                       </div>
                       @endforeach

                      <!-- paging -->
                      <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php if(isset($render)) echo $render ?>
                      </div>
                    </div>
                    @endif
                      <!-- end paging -->




   </div>
  </div>
@endsection
