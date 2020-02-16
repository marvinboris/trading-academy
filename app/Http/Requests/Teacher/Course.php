<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class Course extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'title' => 'required|unique:courses|max:250',
            'description' => 'required',
            'path' => 'required',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
            'level_rank' => 'required|between:1,3',
            'level_name' => 'required',
        ];
    }
}
