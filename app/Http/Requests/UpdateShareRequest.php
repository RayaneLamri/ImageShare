<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShareRequest extends FormRequest
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
            'image' => 'required|mimes:jpeg,png|file',
            'title' => 'required|max:10',
            'description' => 'required|max:140',
        ];
    }

    /**
     * Returns messages of validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'image.required' => 'The image is required',
            'image.max' => 'The image is too big',
            'title.required' => 'The titre is required',
            'title.max' => 'Maximum 5 letters please!',
            'description.required' => 'The description is required',
            'description.max' => 'Maximum 140 characters please!',
        ];
    }
}
