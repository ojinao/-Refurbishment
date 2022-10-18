<?php

use Illuminate\Database\Seeder;
use App\Models\Users\Message;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {

            Message::create([
                'body' => $i . '番目のテキスト'
            ]);
        }
    }
}
