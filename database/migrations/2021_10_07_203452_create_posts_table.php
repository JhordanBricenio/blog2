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
            $table->string('name');
            $table->string('slug');
            $table->text('extract')->nullable();//Para poder hace dos validaciones al crar un nuevo post
            $table->longText('body')->nullable();//cuerpo del blog 
            $table->enum('status',[1,2])->default(1);//Estado del post 1 borrador 2:-publicado
            $table->unsignedBigInteger('user_id');//Campos para las relaciones
            $table->unsignedBigInteger('category_id');

            //Rstriccion de llave foranea
            //el campo user_id hace refercia al campo id de la tabla users y cuando este se de baja todo debe borarse
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->timestamps();
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
