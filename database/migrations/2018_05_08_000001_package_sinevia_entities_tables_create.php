<?php

class PackageSineviaEntitiesTablesCreate extends Illuminate\Database\Migrations\Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Sinevia\Entities\Models\Entity::tableCreate();
        Sinevia\Entities\Models\Field::tableCreate();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Sinevia\Entities\Models\Entity::tableDelete();
        Sinevia\Entities\Models\Field::tableDelete();
    }

}
