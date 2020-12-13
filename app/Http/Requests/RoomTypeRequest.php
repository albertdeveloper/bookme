<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomTypeRequest extends FormRequest
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
            'title' => 'required|unique:room_types,title,'.$this->id,
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title required',
            'title.unique' => 'Title already exist',
            'description.required' => 'Description required',
        ];
    }

}
