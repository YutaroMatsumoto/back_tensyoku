<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->comment('組織id');
            $table->foreignId('user_id')->nullable()->default(null)->comment('ユーザーid（グループ作成者がユーザーの場合のみ）');
            $table->string('name', 100)->comment('グループ名');
            $table->text('detail')->comment('投稿の内容');
            $table->softDeletes()->comment('削除フラグ');
            $table->timestamps();

            $table->foreign('team_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_id')
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
        Schema::dropIfExists('groups');
    }
}
