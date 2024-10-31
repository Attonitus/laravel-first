<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */


    public function up(): void
    {
        DB::table('card_listings')->truncate();

        Schema::table('card_listings', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id');
            $table->integer('value');
            $table->string('card_img');
            $table->string('illustrator')->nullable();
            $table->enum('type', ['Normal', 'Water', 'Grass', 'Fire', 'Psych', 'Fight', 'Steel', 'Dragon', 'Poison']);
            $table->string('country')->nullable();
            $table->enum('rarity', ['Normal', 'Holo', 'Special']);
            $table->enum('condition', ['Poor', 'Good', 'Perfect']);
            $table->boolean('bidding')->default(false);

            // Add user foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('card_listings', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropColumn('user_id');
            $table->dropColumn([
                'bidding',
                'condition',
                'rarity',
                'country',
                'type',
                'illustrator',
                'card_img',
                'value'
            ]);
        });
    }
};
