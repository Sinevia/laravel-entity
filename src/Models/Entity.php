<?php

namespace Sinevia\Entities\Models;

class Entity extends \AdvancedModel {

    protected $table = 'snv_entities_entity';
    
    public function getField($key) {
        return Metas::get($this->Id, $key);
    }

    public function setField($key, $value) {
        return Metas::set($this->Id, $key, $value);
    }

    public function getChildren() {
        $result = self::where('ParentId', '=', $this->Id)
                ->orderBy('Position', 'ASC')
                ->get();
        if ($result == false) {
            return array();
        }
        return $result;
    }

    public function getParent() {
        $parent = self::find($this->ParentId);
        return $parent;
    }

    public function getPath() {
        $path = array();
        $path[] = $this;
        $parent = $this->getParent();
        if ($parent != null) {
            $path = array_merge($path, $parent->getPath());
        }
        return $path;
    }

    public function traverse() {
        $travsersed = array();
        $travsersed[] = $this;
        $children = $this->getChildren();
        foreach ($children as $child) {
            $travsersed = array_merge($travsersed, $child->traverse());
        }
        return $travsersed;
    }

    public static function traverseCategoryByCategoryId($category_id) {
        $category = self::getFaqCategoryById($category_id);
        $travsersed = array();
        $travsersed[] = $category;
        $children = self::getChildrenByCategoryId($category_id);
        foreach ($children as $child) {
            $travsersed = array_merge($travsersed, self::traverseCategoryByCategoryId($child['id']));
        }
        return $travsersed;
    }

    public static function traverseCategoryChildrenByCategoryId($category_id) {
        $travsersed = self::traverseCategoryByCategoryId($category_id);
        array_shift($travsersed);
        return $travsersed;
    }

    public static function getCategoryPathByCategoryId($category_id) {
        $category = self::getFaqCategoryById($category_id);
        $path = array();
        $path[] = $category;
        $parent_id = $category['pid'];
        if ($parent_id != '0')
            $path = array_merge(self::getCategoryPathByCategoryId($parent_id), $path);
        return $path;
    }

    public static function getCategoryPathAsIdsByCategoryId($category_id) {
        $category = self::getFaqCategoryById($category_id);
        $path = array();
        $path[] = $category_id;
        $parent_id = $category['pid'];
        if ($parent_id != '0') {
            $path = array_merge(self::getCategoryPathAsIdsByCategoryId($parent_id), $path);
        }
        return $path;
    }

    public static function tableCreate() {
        $o = new Category;

        if (\Schema::connection($o->connection)->hasTable($o->table) == true) {
            return true;
        }
        \Schema::connection($o->connection)->create($o->table, function (\Illuminate\Database\Schema\Blueprint $table) use ($o) {
            $table->engine = 'InnoDB';
            $table->string($o->primaryKey, 40)->primary();
            $table->string('Status', 12)->default('Active')->index();
            $table->string('Class', 40)->nullable()->default('Unknown')->index();
            $table->string('ParentId', 40)->nullable()->default(null)->index();
            $table->integer('Position')->nullable()->default(null)->index();
            $table->string('Title', 255)->nullable()->default(null)->index();
            $table->datetime('CreatedAt')->nullable()->default(null);
            $table->datetime('DeletedAt')->nullable()->default(null);
            $table->datetime('UpdatedAt')->nullable()->default(null);
        });
        return true;
    }

    public static function tableDelete() {
        $o = new Category;
        return \Schema::connection($o->connection)->dropIfExists($o->table);
    }

}
