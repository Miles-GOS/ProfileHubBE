<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::truncate();

        $user1 = User::create([
            'salutation' => 'Mr.',
            'user_id' => 'john123',
            'password' => bcrypt('password'),
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'home_address' => '123 Main St',
            'country' => 'USA',
            'postal_code' => '12345',
            'date_of_birth' => '1990-01-01',
            'gender' => 'Male',
            'marital_status' => 'Married',
            'hobbies' => 'Reading,Traveling',
            'favorite_sports' => 'Soccer,Basketball',
            'preferred_music_genres' => 'Rock,Jazz',
            'preferred_movies_tv' => 'Action,Drama',
        ]);

        $user2 = User::create([
            'salutation' => 'Mrs.',
            'user_id' => 'jane456',
            'password' => bcrypt('password'),
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'email' => 'jane@example.com',
            'home_address' => '123 Main St',
            'country' => 'USA',
            'postal_code' => '12345',
            'date_of_birth' => '1992-02-02',
            'gender' => 'Female',
            'marital_status' => 'Married',
            'spouse_id' => $user1->id,
            'hobbies' => 'Cooking,Running',
            'favorite_sports' => 'Tennis',
            'preferred_music_genres' => 'Pop,Classical',
            'preferred_movies_tv' => 'Romance,Comedy',
        ]);

        $user1->update(['spouse_id' => $user2->id]);

        User::create([
            'salutation' => 'Ms.',
            'user_id' => 'alice789',
            'password' => bcrypt('password'),
            'first_name' => 'Alice',
            'last_name' => 'Smith',
            'email' => 'alice@example.com',
            'home_address' => '456 Broadway',
            'country' => 'Canada',
            'postal_code' => 'A1B2C3',
            'date_of_birth' => '1995-05-15',
            'gender' => 'Female',
            'marital_status' => 'Single',
            'hobbies' => 'Photography',
            'favorite_sports' => 'Swimming',
            'preferred_music_genres' => 'Indie',
            'preferred_movies_tv' => 'Sci-Fi,Thriller',
        ]);
    }
}
