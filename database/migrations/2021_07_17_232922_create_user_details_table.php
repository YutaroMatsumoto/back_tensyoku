<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->comment('ユーザーid（投稿者がユーザーの場合のみ）');
            $table->integer('age')->comment('年齢');
            $table->date('birthday')->comment('誕生日');
            $table->tinyInteger('sex')->length(1)->comment('性別（1:男性 / 2:女性 / 3:その他 / 4:無回答'); // サービスの成長に伴い考慮が必要となる？
            $table->text('goal')->comment('目標');
            $table->date('join')->comment('入社日');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
