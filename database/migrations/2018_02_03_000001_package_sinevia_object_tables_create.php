<?php

class PackageSineviaObjectTablesCreate extends Illuminate\Database\Migrations\Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Sinevia\Object\Models\Object::tableCreate();
        Sinevia\Object\Models\Field::tableCreate();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Sinevia\Object\Models\Object::tableDelete();
        Sinevia\Object\Models\Field::tableDelete();
    }

}
