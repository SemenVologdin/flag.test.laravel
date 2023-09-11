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
        Schema::table('movies', function(Blueprint $table){
            $table->index('genre_id');

            $table->foreign('genre_id', 'movies_genre_fk')
                ->on('genres')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movies', function(Blueprint $table){
            $table->dropIndex('genre_id');
            $table->dropConstrainedForeignId('movies_genre_fk');
        });
    }
};
