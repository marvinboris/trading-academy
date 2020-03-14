<?php

use App\Method;
use Illuminate\Database\Seeder;

class MethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $names = ['Bitcoin' => 0, 'Admin' => 1, 'Mobile' => 1, 'LIMO' => 0];
        $names = ['Bitcoin' => 0, 'Payeer' => 0, 'Admin' => 1, 'Mobile' => 1, 'Ethereum' => 0, 'LIMO' => 0, 'Credit Card' => 0, 'Bank' => 0];
        foreach ($names as $name => $is_active) {
            Method::create([
                'name' => $name,
                'is_active' => $is_active
            ]);
        }
    }
}
