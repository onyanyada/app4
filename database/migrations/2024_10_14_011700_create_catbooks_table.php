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
        Schema::create('catbooks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')   // booksテーブルの外部キー
                ->constrained('books')     // booksテーブルに関連付け
                ->onDelete('cascade');     // 本が削除されたら関連する行も削除

            $table->foreignId('category_id')  // categoriesテーブルの外部キー
                ->constrained('categories')   // categoriesテーブルに関連付け
                ->onDelete('cascade');        // カテゴリが削除されたら関連する行も削除
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catbooks');
    }
};
