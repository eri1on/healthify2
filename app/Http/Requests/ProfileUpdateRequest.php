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
            'name' => ['required', 'string', 'max:255',                            'regex:/^[a-zA-z]{2,}/'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed',              'regex:/^.{8,}$/'],
            'age' => ['required', 'numeric', 'min:18',                              'regex:/^\d{2}$/'],
            'gender' => ['required', 'in:male,female',                              'regex:/^(male|female)$/i'],
            'height' => ['required', 'numeric', 'min:100', 'max:350',                 'regex:/^(?:[1-2]\d{2}|3[0-4]\d|350)$/'],
            'weight' => ['required', 'numeric', 'min:30', 'max:400',                 'regex:/^([3-9][0-9]{1}|[1-9][0-9]{2}|400)$/'],
            'goal' => ['required', 'in:lose_weight,gain_weight',                    'regex:/^(lose_weight|gain_weight)$/i'],
            'activity' => ['required', 'in:high_activity,low_activity',             'regex:/^(high_activity|low_activity)$/i'],
        ];
    }

 

}
