<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::create('data_table', function (Blueprint $table) {
        //     $table->id("data_id");
        //     $table->boolean('comfirm');
        //     $table->string('name',50)->nullable(true);
        //     $table->char('charName',20);
        //     $table->date('birthday');
        //     $table->dateTime('order_date');
        //     $table->timestamps('release_date');
        //     $table->float('amount')->default(10000);
        //     $table->integer('votes');
        //     $table->bigInteger('myVoting');
        //     $table->string('myText'); //255
        //     $table->text('description');
        //     $table->mediumText('myMediumText');
        //     $table->longText('mylongText');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_table');
    }
};
