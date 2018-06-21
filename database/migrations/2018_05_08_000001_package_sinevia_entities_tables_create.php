<?php
class EntityNonAbstract extends Sinevia\Entities\Models\Entity{
}
class PackageSineviaEntitiesTablesCreate extends Illuminate\Database\Migrations\Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        EntityNonAbstract::tableCreate();
        Sinevia\Entities\Models\Field::tableCreate();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Sinevia\Entities\Models\Field::tableDelete();
        EntityNonAbstract::tableDelete();        
    }

}
