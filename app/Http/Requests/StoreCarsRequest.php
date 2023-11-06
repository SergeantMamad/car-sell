<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'company'=>['required','max:30','in:BMW,Volkswagen,Honda'],
            'model'=>['required','max:50'],
            'mileage'=>['required'],
            'year'=>['required','max:4','min:4'],
            'price'=>['required'],
            'color'=>['required'],
            'engine'=>['required','max:20'],
            'gearbox'=>['required','in:Automatic,Manual'],
            'fuel'=>['required','in:Petrol,Electric,Plug In Hybrid'],
            'location'=>['required','max:30','min:7'],
            'feauters'=>['nullable'],
            'images'=>['nullable','mimes:jpeg,png,jpg,gif'],
            'description'=>['required']
        ];
    }
}
