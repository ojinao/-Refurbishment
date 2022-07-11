<?php

use Illuminate\Database\Seeder;
use App\Models\Users\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::create([
            'over_name' => 'sample',
            'under_name' => '太郎',
            'over_name_kana' => 'サンプル',
            'under_name_kana' => 'タロウ',
            'mail_address' => 'sample@com',
            'sex' =>'1',
            'birth_day' => '1995-1-1',
            'role' => '4',
            'password' => bcrypt('password'),
            'created_at' => new DateTime(),
        ]);
    }
}
