<?php


use \Migration\Migration;
use \Illuminate\Database\Schema\Blueprint ;
class CreatePostsTable extends Migration
{
    public function up(){
//        $this->schema::defaultStringLength(255);
        $this->schema->create('posts' , function (Blueprint $table){
           $table->increments('id');
           $table->string('title');
           $table->text('body');
           $table->timestamps();
        });
    }

    public function down(){
        $this->schema->drop('posts');
    }
}
