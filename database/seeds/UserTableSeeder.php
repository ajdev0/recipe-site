<?php
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::where('email','abrar.adam.09@gmail.com')->first();
        if(!$user) {
            User::create([
                'name' => 'abrar adam',
                'email' => 'abrar.adam.09@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('abrar099')
            ]);
        }  
    }
}
