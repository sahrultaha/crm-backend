<?php

namespace Database\Seeders;

use App\Models\User as Model;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $email = env('ADMIN_EMAIL');
        if (! $email) {
            throw new \RuntimeException('ADMIN_EMAIL not set in .env');
        }
        $passwd = env('ADMIN_PASSWORD');
        if (! $passwd) {
            throw new \RuntimeException('ADMIN_PASSWORD not set in .env');
        }
        $user = Model::create([
            'name' => 'admin',
            'email' => $email,
            'password' => Hash::make($passwd),
        ]);
        event(new Registered($user));
    }
}
