<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('convoncus', function (Blueprint $table) {
            // Ajoute la colonne id auto-incrémentée seulement si elle n'existe pas déjà
            if (!Schema::hasColumn('convoncus', 'id')) {
                $table->id()->first(); // Ajoute en première colonne
            }
        });
    }

    public function down()
    {
        Schema::table('convoncus', function (Blueprint $table) {
            $table->dropColumn('id');
        });
    }
};
