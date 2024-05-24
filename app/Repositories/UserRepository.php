<?php 

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function updateProfile(array $attributes, $path)  
    {
        $user = User::findOrFail(data_get($attributes, 'user_id'));

        $user->update([
            'first_name' => data_get($attributes, 'first_name'),
            'last_name' => data_get($attributes, 'last_name'),
            'profile' => $path,
            'phone' => data_get($attributes, 'phone'),
            'gender' => data_get($attributes, 'gender'),
            'email' => data_get($attributes, 'email'),
        ]);

        return $user;
    }
}