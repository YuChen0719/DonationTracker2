<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Charity;
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
        $charityId = null;
        $userType = "user";
        if ($input["radCharity"] == "true") {
            $charity = new Charity;
            $charity->active = true;
            $charity->email = $input['email'];
            $charity->address = $input['address'];
            $charity->name = $input['charity_name'];
            $charity->description = $input['description'];
            $charity->phone = $input['phone'];
            $charity->save();

            $charityId = Charity::where('email', $input['email'])->first()->id;
        }

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'charity_id' => $charityId,
            'user_type' => $userType,
        ]);
    }
}
