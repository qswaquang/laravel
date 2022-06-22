<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(CategorySeeder::class);
        Product::factory()->count(50)->create();
        $this->call(RoleSeeder::class);
        User::factory()->count(50)->create();
        $this->call(OrderStatusSeeder::class);
        $this->call(OrderSeeder::class);

        $products = Product::all();

        Order::all()->each(function ($order) use ($products) {
            $arr = array();
            for ($i=0; $i < rand(1, 3); $i++) { 
                $arr[$products->random()->id] = ['quantity' => rand(1, 5)];
            }
            $order->products()->attach(
                $arr
            ); 
        });
    }
}
