<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('rating', 15, 2);
            $table->string('comment');
            $table->boolean('published')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
