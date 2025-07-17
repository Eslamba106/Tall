<?php

// app/Repositories/UserRepository.php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function updateUser(User $user, array $data): bool
    {
        if (isset($data['email']) && $user->email !== $data['email']) {
            $user->email_verified_at = null;
        }

        return $user->fill($data)->save();
    }

    public function deleteUser(User $user): bool
    {
        return $user->delete();
    }
    public function changePassword($user, string $newPassword): bool
    {
        $user->password = Hash::make($newPassword);
        return $user->save();
    }
}
