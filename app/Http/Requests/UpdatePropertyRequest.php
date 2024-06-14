<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class UpdatePropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'thumbnail' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
            'price' => ['required', 'numeric', 'min:0'],
            'location'=> ['required', 'string', 'max:255'],
            'bedroom' => ['required', 'numeric', 'min:0'],
            'bathroom' => ['required', 'numeric', 'min:0'],
            'garage' => ['required', 'numeric', 'min:0'],
            'floor' => ['required', 'numeric', 'min:0'],
            'type' => ['required', 'string', 'max:255'],
            'facility' => ['nullable'],
            'images' => ['nullable'],
        ];
    }
}
