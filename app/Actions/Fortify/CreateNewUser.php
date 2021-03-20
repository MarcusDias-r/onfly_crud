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
            'password' => ['required','string','confirmed','min:8'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ],[
            'name.required'      => 'Por favor, informe o seu nome',
            'name.max'           => 'O nome não pode conter mais que 255 caracteres',
            'email.required'     => 'Por favor, informe o seu email',
            'email.max'          => 'O email não pode conter mais que 255 caracteres',
            'email.email'  => 'Informe um endereço de email valido',
            'email.unique' => 'O email informado já é cadastrado',
            'password.required'  =>  'Por favor, informe a sua senha',
            'password.min'       => 'A senha deve ter no mínimo 8 dígitos',
            'password.confirmed' => 'A confirmação não corresponde à senha informada.'

        ]
        )->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
