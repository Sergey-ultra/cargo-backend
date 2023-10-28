<?php

namespace App\Http\Requests;


class RegisterRequest extends JsonApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed|min:6|max:48',
        ];
    }
}
