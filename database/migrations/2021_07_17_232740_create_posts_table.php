<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->nullable()->default(null)->comment('組織id（投稿者がチームユーザーの場合のみ）');
            $table->foreignId('user_id')->nullable()->default(null)->comment('ユーザーid（投稿者がユーザーの場合のみ）');
            $table->foreignId('group_id')->comment('グループid');
            $table->string('title')->comment('投稿のタイトル');
            $table->text('content')->comment('投稿の内容');
            $table->date('date')->comment('投稿の日付');
            $table->softDeletes()->comment('削除フラグ');
            $table->timestamps();

            $table->foreign('team_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('group_id')
                ->references('id')
                ->on('groups')
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
        Schema::dropIfExists('posts');
    }
}
