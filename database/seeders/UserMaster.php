<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\UserMaster as UM;

class UserMaster extends Seeder
{
    
    public function run(): void
    {

        $users = [
            [
                'name' => 'superadmin',
            ],
            [
                'name' => 'admin',
            ],
            [
                'name' => 'merchant',
            ],
            [
                'name' => 'customer',
            ],
            [
                'name' => 'user',
            ],
        ];

        DB::table('user_masters')->insert($users);

    }

}
