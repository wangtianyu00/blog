<?php

use Illuminate\Database\Seeder;
use \App\Category;


class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Category::class, 6)->create();
        Category::create([
            'name'      => '日志',
            'slug'      => 'time',
            'path'      => '/category/time',
            'type'      => 'time',
        ]);
        Category::create([
            'name'      => '分类',
            'slug'      => 'arch',
            'path'      => '/category/arch',
            'type'      => 'arch',
        ]);

    }
}
