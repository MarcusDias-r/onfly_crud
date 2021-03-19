<?php

namespace App\Actions\Fortify;

use App\Models\User;
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();
       
        // $rules = [
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|confirmed|min:8',
        // ];

        // $message = [
        //     'name.required'      => 'Por favor, informe o seu nome',
        //     'email.required'     => 'Por favor, informe o seu email',
        //     'email.email'  => 'Informe um endereço de email valido',
        //     'email.unique' => 'O email informado já é cadastrado',
        //     'password.required'  =>  'Por favor, informe a sua senha',
        //     'password.min'       => 'A senha deve ter no mínimo 8 digitos',
        //     'password.confirmed' => 'A confirmação não corresponde à senha informada'

        // ];

        // $request->validate($rules, $message);
    

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
