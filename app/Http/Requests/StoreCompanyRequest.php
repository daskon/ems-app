<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' =>'required|max:255',
            'email' =>'nullable|email|max:255|unique:users',
            'logo' =>'nullable|image|mimes:jpg,png,jpeg|dimensions:max_width=100,max_height=100',
            'website' =>'nullable|max:255|url'
        ];
    }
}
