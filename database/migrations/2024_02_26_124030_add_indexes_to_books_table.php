<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // Add unique index for 'slug' if it doesn't exist
            $table->unique('slug');

            // Add index for other columns if it doesn't exist
            $table->index(['title', 'category_id', 'price', 'publication_date'], 'books_main_index');

            // Add unique index for 'isbn' if it doesn't exist
            $table->unique('isbn');

            // Add fulltext index for 'description' if it doesn't exist
            $table->index('description', 'fulltext_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropUnique('slug');
            $table->dropUnique('isbn');
            $table->dropIndex('title');
            $table->dropIndex('category_id');
            $table->dropIndex('price');
            $table->dropIndex('publication_date');
            $table->dropIndex('books_main_index');
            $table->dropIndex('fulltext_description');
        });
    }
};