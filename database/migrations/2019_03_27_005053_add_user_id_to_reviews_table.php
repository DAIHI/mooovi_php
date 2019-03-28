<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('reviews', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign('reviews_user_id_foreign');
            $table->dropColumn('user_id');
        });

        Schema::enableForeignKeyConstraints();
    }
}
