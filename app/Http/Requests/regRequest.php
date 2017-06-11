<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class regRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
          'lab_name'=>'required',
          'logo'=>'required|image',
          //'username'=>'required|unique:Laboratory,username',
          'password'=>'required|min:6',
          'rePass'=>'required|same:password|min:6',
          'insurance'=>'required',
          'email'=>'required|email|unique:users,email',
          'mobile'=>'required|numeric|unique:users,mobile',
          'telephone'=>'required|numeric',
          'postal_code'=>'required|numeric',
          'address'=>'required',
          'azmayesh'=>'required',
      ];
    }

    public function messages()
    {
      return [
        'lab_name.required'=>'نام محصول را وارد نمایید',
        'logo.required'=>'لوگو آزمایشگاه آپلود نشده است',
        'logo.image'=>'تنها فایل با فرمت تصویر باید انتخاب شود',
        'username.required'=>'نام کاربری را وارد نمایید',
        //'username.unique'=>'این نام کاربری قبلا انتخاب شده است',
        'password.required'=>'کلمه عبور را وارد نمایید',
        'password.min'=>'کلمه عبور حداقل باید 6 کاراکتر باشد',
        'rePass.required'=>'تکرار کلمه عبور را وارد نمایید',
        'rePass.same'=>'کلمه عبور با تکرار آن مطابقت ندارد',
        'insurance.required'=>'بیمه های طرف قرارداد خود را انتخاب نمایید',
        'email.required'=>'ایمیل خود را وارد نمایید',
        'email.email'=>'فرمت ایمیل وارد شده معتبر نمی باشد',
        'email.unique'=>'آدرس ایمیل وارده شده قبلا در سامانه ثبت شده است',
        'mobile.required'=>'شماره تلفن همراه خود را وارد نمایید',
        'mobile.numeric'=>'شماره تلفن همراه حتما باید بصورت عددی باشد',
        'mobile.unique'=>'شماره همراه وارد شده قبلا در سامانه ثبت شده است',
        'telephone.required'=>'شماره تلفن ثابت خود را وارد نمایید',
        'telephone.numeric'=>'شماره تلفن حتما باید بصورت عددی باشد',
        'postal_code.required'=>'کد پستی خود را وارد نمایید',
        'postal_code.numeric'=>'کد پستی حتما باید بصورت عددی باشد',
        'address.required'=>'آدرس خود را وارد نمایید',
        'azmayesh.required'=>'آزمایش های تخصصی انجام شده توسط آزمایشگاه خود را وارد نمایید',
      ];
    }
}
