<?php

use Illuminate\Database\Seeder;
use App\Models\{
    Admin,
    User,
    News
};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            "email" => "admin@admin.com",
            "password" => \Hash::make("12345678")
        ]);

        for($i=0;$i<10;$i++){
            User::create([
                "username" => "user".$i,
                "email" => "user".$i."@user.com",
                "password" => \Hash::make("12345678")
            ]);
        }

        for($i=0;$i<20;$i++){
            News::create([
                "title" => "title".$i,
                "content" => "content".$i
            ]);
        }
    }
}
