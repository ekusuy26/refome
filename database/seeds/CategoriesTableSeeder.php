<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foodCategories = array('穀物・いも類', 'まめ類', '野菜', '果実', 'きのこ', '海草', '魚', '海産', '肉', '卵・乳製品', 'お菓子', '飲み物', '調味料', 'その他' );
        foreach ($foodCategories as $foodCategory){
            DB::table('categories')->insert([
                'name' => $foodCategory,
            ]);
        }
    }
}
