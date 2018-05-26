<?php

namespace Sinevia\Entities\Models;

class Field extends \AdvancedModel {

    protected $table = 'snv_entities_field';
    
    public function scopeEntityId($query,$entityId){
        return $query->where('EntityId',$entityId);
    }
    
    public function scopeKey($query,$key){
        return $query->where('Key',$key);
    }
    
    /**
     * Returns the value
     * @param type $key
     * @return string
     */
    public function getValue() {
        return json_decode($this->Value, true);
    }

    /**
     * Saves the value
     * @param object $value
     * @return boolean
     */
    public function setValue($value) {
        $this->Value = json_encode($value);
        
        $isSaved = $this->save();
        if ($isSaved != false) {
            return true;
        }
        
        return false;
    }

    public static function tableCreate() {
        $o = new self;

        if (\Schema::connection($o->connection)->hasTable($o->table) == true) {
            return true;
        }
        \Schema::connection($o->connection)->create($o->table, function (\Illuminate\Database\Schema\Blueprint $table) use ($o) {
            $table->engine = 'InnoDB';
            $table->string($o->primaryKey, 40)->primary();
            $table->string('EntityId', 12)->index();
            $table->string('Key', 50)->index();
            $table->longtext('Value')->nullable()->default(null);
            $table->datetime('CreatedAt')->nullable()->default(null);
            $table->datetime('DeletedAt')->nullable()->default(null);
            $table->datetime('UpdatedAt')->nullable()->default(null);
            $table->index(['EntityId', 'Key']);
        });
        return true;
    }

    public static function tableDelete() {
        $o = new self;
        return \Schema::connection($o->connection)->dropIfExists($o->table);
    }

}
