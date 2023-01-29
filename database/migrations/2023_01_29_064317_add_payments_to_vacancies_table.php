<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table->foreignId('payment_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->String('company');
            $table->date('last_day');
            $table->text('description');
            $table->string('image');
            $table->boolean('is_published')->default(1);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vacancies', function (Blueprint $table) {
            //Borra la relación o restricción Foreign
            $table->dropForeign('vacancies_payment_id_foreign');
            $table->dropForeign('vacancies_category_id_foreign');
            $table->dropForeign('vacancies_user_id_foreign');

            //Borra la columna
            $table->dropColumn('payment_id');
            $table->dropColumn('category_id');
            $table->dropColumn('company');
            $table->dropColumn('last_day');
            $table->dropColumn('description');
            $table->dropColumn('image');
            $table->dropColumn('is_published');
            $table->dropColumn('user_id');
        });
    }
};
