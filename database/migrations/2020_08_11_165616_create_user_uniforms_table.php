<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserUniformsTable extends Migration
{
    protected $sizes = ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL'];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_uniforms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->string('pant_size');
            $table->string('belt_size');
            $table->string('shirt_size');
            $table->enum('sweatshirt_size', $this->sizes);
            $table->enum('coat_size', $this->sizes);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_uniforms');
    }
}
