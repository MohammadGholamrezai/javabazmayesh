<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\regRequest;
use App\Http\Requests\labLoginRequest;
use App\Users;
use App\labResults;
use App\userInsurance;
use App\usersStaff;
use DB;
use App\lib\jdf;
use Session;
use Excel;


class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lab/create');
    }

    public function login()
    {
        return view('lab/login');
    }

    public function sendAnswer()
    {
        return view('lab.send-answer');
    }

    public function checkLabLogin(labLoginRequest $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(regRequest $request)
    {
      $user=new Users();

      $name=$request->lab_name;
      $email=$request->email;
      $mobile=$request->mobile;
      $password=$request->password;
      $city_id=$request->city;
      $user_type_id=2;

      $user->name=$name;
      $user->email=$email;
      $user->mobile=$mobile;
      $user->Password=$password;
      $user->city_id=$city_id;
      $user->user_type_id=$user_type_id;
      if($user->save())
      {
        $lastLab=DB::table('users')->orderBy('id', 'DESC')->limit(1)->get();
        foreach($lastLab as $rows)
        {
          $lab_id=$rows->id;
        }

        $usersStaff=new usersStaff();
        $usersStaff->employer=$lab_id;
        $usersStaff->user_id=$lab_id;
        if($usersStaff->save())
        {
          $lastStaff=DB::table('users_staff')->where('employer', $lab_id)->orderBy('id', 'DESC')->get();
          foreach($lastStaff as $rows)
          {
            $staff_id=$rows->id;
          }

          $jdf=new Jdf();
          $date=$jdf->jdate('y/m/d');
          $time=$jdf->jdate('h:i:s:a');

          $labResults=new labResults();
          $reg_date=$date." ".$time;
          $user_id=$lab_id;
          $description=$request->comments;

          $labResults->lab_id=$lab_id;
          $labResults->reg_date=$reg_date;
          $labResults->user_id=$lab_id;
          $labResults->description=$description;
          $labResults->staff_id=$staff_id;

          if($labResults->save())
          {
            $userInsurance=new userInsurance();
            if($request->has('insurance'))
            {
              foreach($request->get('insurance') as $rows)
              {
                //$userInsurance->user_id=$lab_id;
                //$userInsurance->insurance_id=$rows;
                //$userInsurance->save();
                DB::table('user_insurances')->insert(['user_id'=>$lab_id, 'insurance_id'=>$rows]);

              }
            }
              session::flash('register-ok','1010');
              return redirect()->back();
          }
        }
       }
    }

    public function checkSendAnswer(Request $request)
    {

    }

    public function lastAnswersList()
    {

    }

    public function checkAnswersList(Request $request)
    {

    }

    public function report()
    {
      return view('lab.report');

    }

    public function checkReport(Request $request)
    {

    }

     public function getExcel()
     {

     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function exitLab()
    {
        return view('index');
    }
}
