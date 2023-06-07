<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\user_info;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            'current_address' => ['required'],
            'current_city' => ['required'],
            'blood_group' => ['required'],
            'gender' => ['required'],
            'dob' => ['required'],

            'password' => $this->passwordRules(),
            //'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $user=User::create([
            'name' => $input['name'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        user_info::insert([
            'user_id' => $user->id,
            'current_address' => $input['current_address'],
            'city_id' => $input['current_city'],
            'blood_group' => $input['blood_group'],
            'gender' => $input['gender'],
            'dob' => $input['dob'],
        ]);

        return $user;
    }
}
