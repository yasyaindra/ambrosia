<?php

namespace App\Http\Requests;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    use PasswordValidationRules;
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
            "name" => ["required","string","max:255"],
            "email" => ["required","email","string","unique:users","max:255"],
            "password" => $this->passwordRules(),
            "address" => ["required",'string'],
            "roles" => ["required",'string','max:255','in:USER,ADMIN'],
            'houseNumber' => ['required','string','max:255'],
            'phoneNumber' => ['required','string','max:255'],
            'city' => ['required','string','max:255'],
        ];
    }
}
