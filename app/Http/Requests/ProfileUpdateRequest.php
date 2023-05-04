<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'age' => ['required', 'integer', 'min:0', 'max:150'],
            'gender' => ['required', 'string', 'in:male,female'],
            'height' => ['required', 'numeric', 'min:0', 'max:300'],
            'weight' => ['required', 'numeric', 'min:0', 'max:1000'],
            'goal' => ['required', 'string', 'in:lose_weight,gain_weight'],
            'activity' => ['required', 'string', 'in:low_activity,high_activity'],
        ];
    }

 

}
