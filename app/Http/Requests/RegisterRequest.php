<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            //
                'over_name' => 'required|string|max:10',
                'under_name' => 'required|max:10|string',
                'over_name_kana' => 'required|max:30|string|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
                'under_name_kana' => 'required|max:30|string|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
                'mail_address' => 'required|max:100|email|unique:users',
                'sex' => 'required|in:1,2,3',
                'birth_day' => 'required|after_or_equal:2000-01-01|before_or_equal:today',
                'role' => 'required|in:1,2,3,4',
                'password' => 'required|min:8|max:30|confirmed',
        ];
    }

    protected function prepareForValidation()
    {
        // 誕生日をデータに追加
        $birthday = implode('-', $this->only(['old_year', 'old_month', 'old_day']));

        $this->merge([
           'birth_day' => $birthday,
        ]);
    }
}
