<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('card_listings', function (Blueprint $table) {
            // Cambia el ENUM a los nuevos valores
            $table->dropColumn('type');
            $table->enum('type', ['Normal', 'Water', 'Grass', 'Fire', 'Psych', 'Fight', 'Steel', 'Dragon', 'Poison'])->after('illustrator');
        });
    }

    public function down()
    {
        Schema::table('card_listings', function (Blueprint $table) {
            // Puedes revertir el cambio aquí si es necesario
            $table->dropColumn('type');
            $table->enum('type', ['Normal, Water, Grass, Fire, Psych, Fight, Steel, Dragon, Poison'])->after('illustrator');
        });
    }
};
