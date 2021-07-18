<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHopesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hopes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->default(null)->comment('ユーザーid（投稿者がユーザーの場合のみ）');
            $table->text('goal')->comment('希望（アサイン・技術等）');
            $table->softDeletes()->comment('削除フラグ');
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
        Schema::dropIfExists('hopes');
    }
}
