<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'Nam',
            'published' => true,
            'slug' => 'dong-ho-nam',
        ]);

        DB::table('categories')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'loại dây',
            'published' => true,
            'parent_id' => 1,
            'slug' => 'dong-ho-nam-day',
        ]);

        DB::table('categories')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'dây da',
            'published' => true,
            'parent_id' => 2,
            'slug' => 'dong-ho-nam-day-da',
        ]);

        DB::table('categories')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'dây kim loại',
            'published' => true,
            'parent_id' => 2,
            'slug' => 'dong-ho-nam-day-kim-loai',
        ]);

        DB::table('categories')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'dây nhựa',
            'published' => true,
            'parent_id' => 2,
            'slug' => 'dong-ho-nam-day-nhựa',
        ]);

        DB::table('categories')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'loại máy',
            'published' => true,
            'parent_id' => 1,
            'slug' => 'dong-ho-nam-may',
        ]);

        DB::table('categories')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'máy bin',
            'published' => true,
            'parent_id' => 6,
            'slug' => 'dong-ho-nam-may-bin',
        ]);

        DB::table('categories')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'máy bin',
            'published' => true,
            'parent_id' => 6,
            'slug' => 'dong-ho-nam-may-cơ',
        ]);

        DB::table('categories')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'Nữ',
            'published' => true,
            'slug' => 'dong-ho-nu',
        ]);

        DB::table('categories')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'loại dây',
            'published' => true,
            'parent_id' => 9,
            'slug' => 'dong-ho-nam-day',
        ]);

        DB::table('categories')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'dây da',
            'published' => true,
            'parent_id' => 10,
            'slug' => 'dong-ho-nam-day-da',
        ]);

        DB::table('categories')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'dây kim loại',
            'published' => true,
            'parent_id' => 10,
            'slug' => 'dong-ho-nam-day-kim-loai',
        ]);

        DB::table('categories')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'loại máy',
            'published' => true,
            'parent_id' => 9,
            'slug' => 'dong-ho-nam-may',
        ]);

        DB::table('categories')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'máy bin',
            'published' => true,
            'parent_id' => 13,
            'slug' => 'dong-ho-nam-may-bin',
        ]);

        DB::table('categories')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'máy bin',
            'published' => true,
            'parent_id' => 13,
            'slug' => 'dong-ho-nam-may-cơ',
        ]);

        DB::table('categories')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'máy Eco Drive',
            'published' => true,
            'parent_id' => 13,
            'slug' => 'dong-ho-nam-may-eco-drive',
        ]);

        DB::table('categories')->insert([
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'name' => 'Trẻ em',
            'published' => true,
            'slug' => 'dong-ho-tre-em',
        ]);
    }
}
