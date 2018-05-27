<?php

class PackageSineviaEntitiesTablesCreate extends Illuminate\Database\Migrations\Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Sinevia\Entities\Models\Entity::tableCreate();
        Sinevia\Entities\Models\Attribute::tableCreate();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Sinevia\Entities\Models\Entity::tableDelete();
        Sinevia\Entities\Models\Attribute::tableDelete();
    }

}
