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
        $names = ['Bitcoin', 'Admin', 'Mobile', 'LIMO'];
        // $names = ['Bitcoin', 'Payeer', 'Admin', 'Mobile', 'Ethereum', 'LIMO', 'Credit Card', 'Bank'];
        foreach ($names as $name) {
            Method::create(['name' => $name]);
        }
    }
}
