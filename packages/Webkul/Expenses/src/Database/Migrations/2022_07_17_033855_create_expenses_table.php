<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
       
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->string('description')->nullable();
            $table->decimal('price', 12, 4)->default(0)->nullable();
            $table->integer('amount')->nullable();
            $table->decimal('tax_amount', 12, 4)->nullable();
            $table->decimal('sub_total', 12, 4)->nullable();
            $table->decimal('grand_total', 12, 4)->nullable();
            $table->datetime('date_transac')->nullable();

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
        Schema::dropIfExists('expenses');
    }
}
