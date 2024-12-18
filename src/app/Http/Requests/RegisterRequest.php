<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="RegisterRequest",
 *     title="RegisterRequest",
 *     @OA\Property(property="username", type="string", example="my-username"),
 *     @OA\Property(property="email", type="string", example="example@example.com"),
 *     @OA\Property(property="password", type="string", example="Password1!")
 * )
 */
class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'min:4'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8']
        ];
    }
}
