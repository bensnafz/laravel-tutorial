<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => ['required','string'],
            'email' => ['required','string'],
            'password' => ['required','string'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "กรุณารอกชื่อผู้ใช้งานช่องนี้",
            'name.string' => "กรุณารอกเป็นข้อความ",
            'email.required' => "กรุณารอกอีเมล์ผู้ใช้งานช่องนี้",
            'email.string' => "กรุณารอกเป็นอีเมล์",
            'password.required' => "กรุณารอกรหัสผู้ใช้งานช่องนี้",
            'password.string' => "กรุณารอกเป็นรหัสผ่าน",
        ];
    }
}
