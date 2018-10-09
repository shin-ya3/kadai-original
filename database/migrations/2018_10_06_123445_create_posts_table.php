<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name'); //投稿者
            $table->text('comment'); //コメント
            $table->ipAddress('ip'); //ipアドレス
            $table->integer('inner_id'); //スレッド内投稿番号
            $table->string('password'); //パスワード
            $table->integer('thread_id')->unsigned()->index();
            $table->timestamps();
            
            //外部キー設定
            $table->foreign('thread_id')->references('id')->on('threads');
            
             //inner_idとthread_idの組み合わせの重複を許さない
            $table->unique(['inner_id', 'thread_id']);
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
