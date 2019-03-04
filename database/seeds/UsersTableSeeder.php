<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Joel',
            'email' => 'joelimalive1994@gmail.com',
            'password' => bcrypt('joel1994'),
            'admin' => 1
        ]);

        Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/1.jpg',
            'about' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus saepe ducimus cupiditate accusamus quidem culpa, consectetur, explicabo praesentium deleniti ex dignissimos perspiciatis dolore voluptatum eos sapiente eius sunt aperiam fuga?',
            'facebook'  => 'facebook.com',
            'youtube'   => 'youtube.com'
        ]);
    }
}
