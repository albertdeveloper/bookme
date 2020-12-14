<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'room_type' => 'required',
            'name' => 'required|unique:rooms,name,'.$this->id,
            'description' =>'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }
}
