<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        DB::table('categories')->insert([
            ['name' => '穀物・いも類'],
            ['name' => 'まめ類'],
            ['name' => '野菜'],
            ['name' => '果実'],
            ['name' => 'きのこ'],
            ['name' => '海草'],
            ['name' => '魚'],
            ['name' => '海産'],
            ['name' => '肉'],
            ['name' => '卵・乳製品'],
            ['name' => 'お菓子'],
            ['name' => '飲み物'],
            ['name' => '調味料'],
            ['name' => 'その他'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
