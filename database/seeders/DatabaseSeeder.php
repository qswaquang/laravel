<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Permission;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Database\Seeders\PermissionSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        $this->call(PermissionSeeder::class);

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

        $permissions = Permission::all();

        Role::all()->each(function ($role) use ($permissions) {
            for ($i=0; $i < rand(1, 7); $i++) { 
                $role->permissions()->syncWithoutDetaching(
                    $permissions->random()->id
                );
            }
             
        });
    }
}
