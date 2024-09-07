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
        Schema::create('currency_pairs', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_currency')
                ->unsigned();
            $table->foreign('id_currency')
                ->references('id')
                ->on('currencies')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->bigInteger('id_source')
                ->unsigned();
            $table->foreign('id_source')
                ->references('id')
                ->on('sources')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('origin_code_currency');
            $table->string('destination_code_currency');
            $table->string('name_source');
            $table->double('rate_buy');
            $table->double('rate_sell');
            $table->timestamp('time');
            $table->boolean('status');
            $table->timestamps();
            $table->softDeletes();

            // $table->string('origin_code_currency');
            // $table->foreign('origin_code_currency')
            //     ->references('code')
            //     ->on('currencies');
            // // ->onDelete('cascade');

            // $table->string('destination_code_currency');
            // $table->foreign('destination_code_currency')
            //     ->references('code')
            //     ->on('currencies');
            // // ->onDelete('cascade');

            // $table->string('name_source');
            // $table->foreign('name_source')
            //     ->references('name')
            //     ->on('sources');
            // // ->onDelete('cascade');

            // $table->double('rate_buy');
            // $table->double('rate_sell');
            // $table->timestamp('time');
            // $table->string('status');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currency_pairs');
    }
};
