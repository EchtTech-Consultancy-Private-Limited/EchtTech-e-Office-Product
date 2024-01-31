<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Str;

class CompanyHelper
{
    public static function generateUniqueUsername($name, $email): string
    {
        // Get the first 4 characters of the name
        $namePart = Str::limit($name, 4, '');

        // Get the first 4 characters of the email
        $emailPart = Str::limit($email, 4, '');

        // Combine the name and email parts to form the initial username
        $username = $namePart . $emailPart;

        // Check if the username already exists
        while (self::usernameExists($username)) {
            // If it exists, generate a new username with 4 characters from the name and 4 random characters
            $namePart = Str::limit($name, 4, '');
            $randomPart = Str::random(4);
            $username = $namePart . $randomPart;
        }

        return $username;
    }

    private static function usernameExists($username): bool
    {
        // Replace 'username' with the actual column name in your User model that stores the username
        return User::where('username', $username)->exists();
    }
}
