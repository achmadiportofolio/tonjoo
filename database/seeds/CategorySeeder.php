<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \Illuminate\Support\Facades\DB::table('category')->truncate();

        ( new \App\Category(['id'=>0, 'category_name'=>'Expense']))->save();
        \Illuminate\Support\Facades\DB::unprepared("UPDATE category SET id=0");

        ( new \App\Category(['id'=>1, 'category_name'=>'Income']))->save();

        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
